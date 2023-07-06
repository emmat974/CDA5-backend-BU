<?php

namespace App\Controllers;

final class LoginController extends Controller
{
    public function login()
    {

        $errors = array();
        if (isset($_POST['submit']) && !empty($_POST['submit'])) {

            $email = "test@test.com";
            $password = "test";

            if ($_POST['email'] === $email && $_POST['password'] === $password) {
                $_SESSION['user'] = $email;
                $this->redirectionTo('ordinateurs');
            } else {
                $errors = [
                    'message' => 'Identifiant/Mot de passe incorrect'
                ];
            }
        }

        require dirname(__DIR__) . "/views/login/login.view.php";
    }

    public function logout()
    {
        session_destroy();

        $this->redirectionTo("login");
    }
}
