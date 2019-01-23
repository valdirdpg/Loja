<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EscolaController extends Controller
{
    public function index(){
        $title = "Inicio";
        return view('escola.home.index', compact('title'));

    }
    /*public function login(){
        $title = "Login";
        return view('auth.login', compact('title'));

    }*/
}
