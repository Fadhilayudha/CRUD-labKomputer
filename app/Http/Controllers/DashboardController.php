<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabKomputer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'dashboard',
        ]);
    }
}