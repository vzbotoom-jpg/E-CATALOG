<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Catalog;
use App\Models\Portfolio;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_consultations' => Consultation::count(),
            'pending_consultations' => Consultation::where('status', 'pending')->count(),
            'total_catalogs' => Catalog::count(),
            'total_portfolios' => Portfolio::count(),
            'total_users' => User::where('is_admin', false)->count(),
        ];

        $recentConsultations = Consultation::latest()->limit(5)->get();
        $recentUsers = User::where('is_admin', false)->latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentConsultations', 'recentUsers'));
    }
}