<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $links = auth()->user()->links;
    
        return view('links.index',compact('links'));
    }
    public function allLink(){
        $links = ShortUrl::get();
        return view('links.all-link',compact('links'));
    }

   


}