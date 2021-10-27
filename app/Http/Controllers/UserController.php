<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    
    public function homepage() {
        $users=User::get(); 
        return view('home', array('users' => $users));
    }
    
}
