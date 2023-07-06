<?php

namespace App\Controllers;

class Controller
{
    protected function redirectionTo(string $path): void
    {
        Header("Location: " . URL . $path);
    }

    protected function render(string $path, array $data, string $title = "Réservation ordinateur"): void
    {
        compact($data);
        ob_start();
        require dirname(__DIR__) . "/views/" . $path . ".view.php";
        $content = ob_get_clean();

        require dirname(__DIR__) . "/views/layouts/template.view.php";
    }
}
