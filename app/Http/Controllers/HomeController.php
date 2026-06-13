<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Portfolio;

class HomeController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // Get latest catalogs for homepage
        $latestCatalogs = Catalog::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        // Get featured portfolios
        $featuredPortfolios = Portfolio::where('is_active', true)
            ->orderBy('order', 'asc')
            ->limit(3)
            ->get();
        
        // Stats for homepage
        $stats = [
            'projects' => Portfolio::where('is_active', true)->count(),
            'clients' => 25, // Can be dynamic from consultations table
            'experience' => 5,
        ];
        
        return view('pages.home', compact('latestCatalogs', 'featuredPortfolios', 'stats'));
    }
}