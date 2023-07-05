<?php

namespace App\Http\Controllers;
use App\Models\LabKomputer;
use Illuminate\Http\Request;

class BrokenController extends Controller
{
    public function index()
    {
        $komputers = LabKomputer::where('kondisi', 'Rusak')->get();
        return view('laptop.broken', [
            'title' => 'broken',
            'komputers' => $komputers,
        ]);
    }
}
