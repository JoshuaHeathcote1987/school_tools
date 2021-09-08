<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index()
    {
        Session::flush();
        // $request->session()->invalidate();
        return redirect('/');
    }
}
