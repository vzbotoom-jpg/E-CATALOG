<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::latest()->paginate(10);
        return view('admin.catalogs.index', compact('catalogs'));
    }

    public function create()
    {
        return view('admin.catalogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name) . '-' . Str::random(5);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('catalogs', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $data['pdf_file'] = $request->file('pdf_file')->store('catalogs/pdf', 'public');
        }

        Catalog::create($data);

        return redirect()->route('admin.catalogs.index')
            ->with('success', 'Katalog berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $catalog = Catalog::findOrFail($id);
        return view('admin.catalogs.edit', compact('catalog'));
    }

    public function update(Request $request, $id)
    {
        $catalog = Catalog::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->except(['image', 'pdf_file']);

        if ($request->hasFile('image')) {
            if ($catalog->image) {
                Storage::disk('public')->delete($catalog->image);
            }
            $data['image'] = $request->file('image')->store('catalogs', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            if ($catalog->pdf_file) {
                Storage::disk('public')->delete($catalog->pdf_file);
            }
            $data['pdf_file'] = $request->file('pdf_file')->store('catalogs/pdf', 'public');
        }

        $catalog->update($data);

        return redirect()->route('admin.catalogs.index')
            ->with('success', 'Katalog berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $catalog = Catalog::findOrFail($id);
        
        if ($catalog->image) {
            Storage::disk('public')->delete($catalog->image);
        }
        if ($catalog->pdf_file) {
            Storage::disk('public')->delete($catalog->pdf_file);
        }
        
        $catalog->delete();

        return redirect()->route('admin.catalogs.index')
            ->with('success', 'Katalog berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $catalog = Catalog::findOrFail($id);
        $catalog->update(['is_active' => !$catalog->is_active]);

        return response()->json(['success' => true]);
    }
}