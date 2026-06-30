<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MainanAnak;

class PublicController extends Controller
{
    public function index()
    {
        $mainans = MainanAnak::latest()->get();
        return view('public.index', compact('mainans'));
    }
}
