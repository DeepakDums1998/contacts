<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalContacts' => Contact::count(),
            'recentContacts' => Contact::latest()->limit(5)->get(),
        ]);
    }
}
