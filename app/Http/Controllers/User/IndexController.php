<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function aboutUs(){
        return view('user.about-us');
    }
    public function Contact(){
        return view('user.contact');
    }
    public function rooms(){
        return view('user.rooms');
    }
    public function blog(){
        return view('user.blog');
    }
    public function booking(){
        return view('user.booking');
    }
    
}
