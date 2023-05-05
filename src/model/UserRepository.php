<?php

namespace src\lib\model;

use src\lib\dto\RegisterDto;
use src\lib\util\Image;
use src\lib\util\StringUtil;

class UserRepository extends BaseRepository
{

    /**
     * @param RegisterDto $registerDto
     * @return bool
     */
    public function registerUser(RegisterDto $registerDto)
    {
        $statement = $this->getConnection()->prepare('
        INSERT INTO user 
            (email, pseudo, name, firstName, password, salt, profilePictureUrl)
        VALUES
            (:email, :pseudo, :name, :firstName, :password, :salt, :profilePictureUrl)
        ');
        $statement->bindValue(':email', $registerDto->get('email'));
        $statement->bindValue(':pseudo', $registerDto->get('pseudo'));
        $statement->bindValue(':name', $registerDto->get('name'));
        $statement->bindValue(':firstName', $registerDto->get('firstName'));

        $salt = bin2hex(openssl_random_pseudo_bytes(16));
        $hashedPassword = password_hash($registerDto->get('password'), PASSWORD_DEFAULT, [
            'salt' => $salt
        ]);

        $statement->bindValue(':password', $hashedPassword);
        $statement->bindValue(':salt', $salt);

        $image = $registerDto->get('profilePicture');
        $imageNameInfo = pathinfo($image['name']);
        $uniqImageName = StringUtil::generateUniqueString($imageNameInfo['filename']) . '.' . $imageNameInfo['extension'];

        $statement->bindValue(':profilePictureUrl', $uniqImageName);
        try {
            if ($statement->execute() && $statement->rowCount() == 1) {
                $newPath = 'upload/profilePicture/' . $uniqImageName;
                Image::cropImageToSquare($image['tmp_name'], $newPath);
                return true;
            }
        } catch (\PDOException $e){ }
        return false;
    }


    public function getUser($email)
    {

    }


}