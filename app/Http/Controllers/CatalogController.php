<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    /**
     * Display list of catalogs
     */
    public function index(Request $request)
    {
        $query = Catalog::where('is_active', true);
        
        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        // Search
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $catalogs = $query->orderBy('order', 'asc')
            ->paginate(12);
        
        // Get all categories for filter
        $categories = Catalog::where('is_active', true)
            ->distinct()
            ->pluck('category');
        
        return view('pages.catalog.index', compact('catalogs', 'categories'));
    }
    
    /**
     * Display single catalog detail
     */
    public function show($id)
    {
        $catalog = Catalog::where('is_active', true)
            ->findOrFail($id);
        
        // Get related catalogs
        $relatedCatalogs = Catalog::where('is_active', true)
            ->where('category', $catalog->category)
            ->where('id', '!=', $catalog->id)
            ->limit(4)
            ->get();
        
        return view('pages.catalog.show', compact('catalog', 'relatedCatalogs'));
    }
    
    /**
     * Download catalog PDF
     */
    public function download($id)
    {
        $catalog = Catalog::findOrFail($id);
        
        if (!$catalog->pdf_file) {
            return redirect()->back()->with('error', 'File PDF tidak tersedia');
        }
        
        $filePath = storage_path('app/public/' . $catalog->pdf_file);
        
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
        
        return response()->download($filePath, $catalog->name . '.pdf');
    }
    
    /**
     * Get catalog data for API (AJAX)
     */
    public function getCatalogData($id)
    {
        $catalog = Catalog::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'catalog' => [
                'id' => $catalog->id,
                'name' => $catalog->name,
                'description' => $catalog->description,
                'image_url' => $catalog->image ? Storage::url($catalog->image) : null,
                'pdf_url' => $catalog->pdf_file ? Storage::url($catalog->pdf_file) : null,
            ]
        ]);
    }
}