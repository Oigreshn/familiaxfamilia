<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function index()
    {
        return view('avatar.index');
    }
}
 