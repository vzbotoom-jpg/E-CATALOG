<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::latest()->paginate(10);
        
        $stats = [
            'total' => Consultation::count(),
            'pending' => Consultation::where('status', 'pending')->count(),
            'processed' => Consultation::where('status', 'processed')->count(),
            'completed' => Consultation::where('status', 'completed')->count(),
        ];
        
        return view('admin.consultations.index', compact('consultations', 'stats'));
    }

    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processed,completed'
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return redirect()->route('admin.consultations.index')
            ->with('success', 'Konsultasi berhasil dihapus!');
    }
}