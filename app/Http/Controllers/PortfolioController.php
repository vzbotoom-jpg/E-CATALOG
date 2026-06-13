<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display list of portfolios
     */
    public function index(Request $request)
    {
        $query = Portfolio::where('is_active', true);
        
        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        // Filter by year
        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }
        
        // Check if 'order' column exists before using it
        $portfolios = $query->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        // Get all categories and years for filter
        $categories = Portfolio::where('is_active', true)
            ->distinct()
            ->pluck('category');
        
        $years = Portfolio::where('is_active', true)
            ->whereNotNull('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        
        // Get featured portfolios with error handling
        $featuredPortfolios = collect();
        try {
            // Check if 'is_featured' column exists
            if (\Schema::hasColumn('portfolios', 'is_featured')) {
                $featuredPortfolios = Portfolio::where('is_active', true)
                    ->where('is_featured', true)
                    ->orderBy('order', 'asc')
                    ->limit(3)
                    ->get();
            } else {
                // If column doesn't exist, get latest 3 portfolios
                $featuredPortfolios = Portfolio::where('is_active', true)
                    ->latest()
                    ->limit(3)
                    ->get();
            }
        } catch (\Exception $e) {
            // Fallback: get latest 3 portfolios
            $featuredPortfolios = Portfolio::where('is_active', true)
                ->latest()
                ->limit(3)
                ->get();
        }
        
        return view('pages.portfolio.index', compact('portfolios', 'categories', 'years', 'featuredPortfolios'));
    }
    
    /**
     * Display single portfolio detail
     */
    public function show($id)
    {
        $portfolio = Portfolio::where('is_active', true)
            ->findOrFail($id);
        
        // Update view count (check if column exists)
        try {
            if (\Schema::hasColumn('portfolios', 'view_count')) {
                $portfolio->increment('view_count');
            }
        } catch (\Exception $e) {
            // Column doesn't exist, skip increment
        }
        
        // Get related portfolios (same category)
        $relatedPortfolios = Portfolio::where('is_active', true)
            ->where('category', $portfolio->category)
            ->where('id', '!=', $portfolio->id)
            ->limit(3)
            ->get();
        
        return view('pages.portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }
    
    /**
     * Get portfolio data for API (AJAX)
     */
    public function getPortfolioData($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'portfolio' => [
                'id' => $portfolio->id,
                'title' => $portfolio->title,
                'description' => $portfolio->description,
                'category' => $portfolio->category,
                'location' => $portfolio->location,
                'year' => $portfolio->year,
                'image_url' => $portfolio->image ? Storage::url($portfolio->image) : null,
                'image_gallery' => $portfolio->gallery ? json_decode($portfolio->gallery) : [],
            ]
        ]);
    }
    
    /**
     * Export portfolio as PDF (for admin/customer)
     */
    public function exportPdf($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        // You can implement PDF generation here using DomPDF or similar
        // For now, return a simple response
        return response()->json([
            'success' => false,
            'message' => 'PDF export feature coming soon'
        ]);
    }
    
    /**
     * Get portfolio statistics (for admin)
     */
    public function getStats()
    {
        try {
            $stats = [
                'total' => Portfolio::where('is_active', true)->count(),
                'byCategory' => Portfolio::where('is_active', true)
                    ->selectRaw('category, count(*) as total')
                    ->groupBy('category')
                    ->get(),
                'totalViews' => \Schema::hasColumn('portfolios', 'view_count') ? Portfolio::sum('view_count') : 0,
                'mostViewed' => \Schema::hasColumn('portfolios', 'view_count') 
                    ? Portfolio::where('is_active', true)
                        ->orderBy('view_count', 'desc')
                        ->limit(5)
                        ->get(['id', 'title', 'view_count'])
                    : collect(),
            ];
        } catch (\Exception $e) {
            $stats = [
                'total' => Portfolio::where('is_active', true)->count(),
                'byCategory' => collect(),
                'totalViews' => 0,
                'mostViewed' => collect(),
            ];
        }
        
        return response()->json([
            'success' => true,
            'stats' => $stats
        ]);
    }
}