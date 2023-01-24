<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {

        //page controller che gestirà tutte le rotte degli utenti guest senza gestione del log in

        return view('guest.home');
    }
}
