<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\OrdinateurController;
use App\Controllers\ReservationController;
use App\Controllers\UtilisateurController;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

if (!isset($_SESSION['user']) && empty($_SESSION)) {
    $controller = new LoginController;
    $controller->login();
    return;
} else {
    if (empty($_GET['page'])) {
        $controller = new HomeController;
        $controller->home();
    } else {

        $url = explode("/", $_GET["page"]);
        switch ($url[0]) {
            case "ordinateurs":
                $controller = new OrdinateurController;
                if (empty($url[1])) {
                    $controller->readAll();
                } else if ($url[1] === "detail") {
                    $controller->read((int) $url[2]);
                } else if ($url[1] === "create") {
                    $controller->create();
                } else if ($url[1] === "edit") {
                    $controller->edit((int) $url[2]);
                } else if ($url[1] === "remove") {
                    $controller->delete((int) $url[2]);
                }
                break;
            case "utilisateurs":
                $controller = new UtilisateurController;
                if (empty($url[1])) {
                    $controller->readAll();
                } else if ($url[1] === "detail") {
                    $controller->read((int) $url[2]);
                } else if ($url[1] === "create") {
                    $controller->create();
                } else if ($url[1] === "edit") {
                    $controller->edit((int) $url[2]);
                } else if ($url[1] === "remove") {
                    $controller->delete((int) $url[2]);
                }
                break;
            case "reservations":
                $controller = new ReservationController;
                if (empty($url[1])) {
                    $controller->home();
                } else if ($url[1] === "create") {
                    $controller->create();
                } else if ($url[1] === "remove") {
                    $controller->delete((int) $url[2]);
                }
                break;
            case "logout":
                $controller = new LoginController;
                $controller->logout();
                break;
        }
    }
}
