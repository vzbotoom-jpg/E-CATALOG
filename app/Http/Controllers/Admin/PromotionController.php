<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::latest()->paginate(10);
        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'discount_type' => 'required|in:percentage,nominal',
            'discount_value' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after:valid_from',
            'min_purchase' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        Promotion::create($request->all());

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promo berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'discount_type' => 'required|in:percentage,nominal',
            'discount_value' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after:valid_from',
            'min_purchase' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $promotion->update($request->all());

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promo berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promo berhasil dihapus!');
    }
}