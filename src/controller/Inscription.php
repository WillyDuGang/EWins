<?php

namespace src\controller;

use core\router\Router;
use src\lib\database\Database;
use src\lib\dto\RegisterDto;
use src\lib\model\UserRepository;
use src\lib\response\RedirectResponse;
use src\lib\util\Format;

class Inscription implements IController
{
    const RETURN_FIELD = ['name', 'firstName', 'email', 'pseudo'];

    public function __construct($method, $params = [], $queries = [])
    {
        switch ($method) {
            case Router::METHODS['GET']:
                require('template/inscription.php');
                break;
            case Router::METHODS['POST']:
                $this->onRegister();
                break;
        }
    }

    private function onRegister()
    {
        $data = array_merge($_POST, $_FILES);
        $registerDto = new RegisterDto($data);
        if (!$registerDto->isValidDto()) {
            new RedirectResponse(['Erreur de syntaxe de requête'], '', false);
        }
        if ($registerDto->get('password') !== $registerDto->get('confirmPassword')) {
            new RedirectResponse(
                ['Le mot de passe ne correspond pas au mot de passe de confirmation.'],
                '',
                false,
                $registerDto->toArray(self::RETURN_FIELD)
            );
        }
        if ($errors = $this->matchPassword($registerDto->get('password'))) {
            new RedirectResponse(
                $errors,
                '',
                false,
                $registerDto->toArray(self::RETURN_FIELD)
            );
        }
        $userRepository = new UserRepository();
        if (!$userRepository->registerUser($registerDto)){
            new RedirectResponse(
                ["L'email ou le pseudo est déjà utilisé."],
                '',
                false,
                $registerDto->toArray(self::RETURN_FIELD)
            );
        }
        new RedirectResponse(['Votre compte a été crée avec succés. Connectez-vous pour continuer.'], '/connexion');
    }


    private function matchPassword($password)
    {
        $errors = [];
        if (strlen($password) < 8) {
            $errors[] = 'Le mot de passe doit contenir au moins 8 caractères.';
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Le mot de passe doit contenir au moins une lettre majuscule.';
        }
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'Le mot de passe doit contenir au moins une lettre minuscule.';
        }
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = 'Le mot de passe doit contenir au moins un chiffre.';
        }
        return empty($errors) ? null : $errors;
    }
}