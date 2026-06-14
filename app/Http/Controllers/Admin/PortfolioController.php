<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->except(['image', 'gallery']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = $galleryImage->store('portfolios/gallery', 'public');
            }
            $data['gallery'] = json_encode($galleryPaths);
        }

        Portfolio::create($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'order' => 'nullable|integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $data = $request->except(['image', 'gallery']);

        if ($request->hasFile('image')) {
            if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        if ($request->hasFile('gallery')) {
            // Delete old gallery
            if ($portfolio->gallery) {
                $oldGallery = json_decode($portfolio->gallery, true);
                foreach ($oldGallery as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = $galleryImage->store('portfolios/gallery', 'public');
            }
            $data['gallery'] = json_encode($galleryPaths);
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        if ($portfolio->image) Storage::disk('public')->delete($portfolio->image);
        
        if ($portfolio->gallery) {
            $gallery = json_decode($portfolio->gallery, true);
            foreach ($gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update(['is_active' => !$portfolio->is_active]);
        return response()->json(['success' => true]);
    }

    public function toggleFeatured($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update(['is_featured' => !$portfolio->is_featured]);
        return response()->json(['success' => true]);
    }
}