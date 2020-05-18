<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasPermission:admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function test(){
        return "teste";
    }
}
