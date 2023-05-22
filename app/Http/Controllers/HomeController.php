<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class HomeController extends Controller
{
    public function index() 
    {
        $contacts = Contact::all();
        return view('home.index', compact('contacts'));
    }
}
 