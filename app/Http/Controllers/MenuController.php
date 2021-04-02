<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        // dd('list menus');
        return view('menus.index');
    }

    public function create() {
        return view('menus.add');
    }
}
