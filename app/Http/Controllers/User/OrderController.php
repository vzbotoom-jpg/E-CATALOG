<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $consultations = Consultation::where('email', Auth::user()->email)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.orders', compact('consultations'));
    }

    public function show($id)
    {
        $consultation = Consultation::where('email', Auth::user()->email)
            ->where('id', $id)
            ->firstOrFail();

        return view('user.order-detail', compact('consultation'));
    }
}