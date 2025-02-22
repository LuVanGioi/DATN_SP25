<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admins.home");
    }
}
