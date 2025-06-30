<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //peralihan login sesuai role
        if ($user->isAdmin == 1) {
            return redirect('admin');
        } else {
            return redirect ('/');
        }
        //return view ('homr)
    }
}
