<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // You might need to create this view later or use a generic one
    }

    public function storeConsultation(Request $request)
    {
        // Validation and storing logic...
        return back()->with('success', 'Konsultasi berhasil dikirim.');
    }
}
