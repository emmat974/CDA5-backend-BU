<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\OrdinateurModel;

final class HomeController extends Controller
{

    public function home()
    {
        $rep = new OrdinateurModel;

        $this->render('home', [
            'ordinateurs' => $rep->readAll()
        ], 'Accueil');
    }
}
