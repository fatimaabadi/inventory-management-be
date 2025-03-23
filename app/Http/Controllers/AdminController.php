<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Dashboard
    public function dashboard() {
        return view('admin.pages.dashboard');
    }

}
