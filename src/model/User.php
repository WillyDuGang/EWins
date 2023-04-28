<?php

namespace src\lib\model;

use PDO;
use src\lib\database\Database;

class UserRepository extends BaseRepository {

    /**
     * @param array $registerDto
     * @return void
     */
    public function registerUser(array $registerDto){

        $statement = $this->getConnection()->prepare('
            INSERT INTO utilisateur 
            VALUES (null, :email, :pseudo, :name, :firstName, :password, :profilePictureUrl)
        ');
        $statement->bindValue(':email', $registerDto['email']);
        $statement->bindValue(':pseudo', $registerDto['pseudo']);
        $statement->bindValue(':name', $registerDto['name']);
        $statement->bindValue(':firstName', $registerDto['firstName']);
        $statement->bindValue(':password', $registerDto['password']);
        $statement->bindValue(':profilePictureUrl', $registerDto['profilePicture']);
    }


    public function getUser($email){

    }


}