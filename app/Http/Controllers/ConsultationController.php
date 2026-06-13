<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    /**
     * Show consultation form
     */
    public function create()
    {
        return view('pages.consultation');
    }
    
    /**
     * Store consultation request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'project_type' => 'required|string|max:100',
            'message' => 'required|string|min:20|max:2000',
        ]);
        
        // Save to database
        $consultation = Consultation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'project_type' => $request->project_type,
            'message' => $request->message,
            'status' => 'pending',
        ]);
        
        // Send email notification to admin
        $this->sendNotificationEmail($consultation);
        
        // Send auto-reply to customer
        $this->sendAutoReplyEmail($consultation);
        
        return redirect()->route('consultation')
            ->with('success', 'Terima kasih! Tim kami akan segera menghubungi Anda dalam 1x24 jam.');
    }
    
    /**
     * Send notification email to admin
     */
    private function sendNotificationEmail($consultation)
    {
        try {
            $adminEmail = config('mail.admin_email', 'admin@spaceint.id');
            
            Mail::send('emails.consultation-notification', [
                'consultation' => $consultation
            ], function($mail) use ($adminEmail, $consultation) {
                $mail->to($adminEmail)
                    ->subject('Konsultasi Baru dari ' . $consultation->name);
            });
            
            Log::info('Consultation notification sent to admin for: ' . $consultation->email);
        } catch (\Exception $e) {
            Log::error('Failed to send consultation notification: ' . $e->getMessage());
        }
    }
    
    /**
     * Send auto-reply email to customer
     */
    private function sendAutoReplyEmail($consultation)
    {
        try {
            Mail::send('emails.consultation-autoreply', [
                'consultation' => $consultation
            ], function($mail) use ($consultation) {
                $mail->to($consultation->email)
                    ->subject('Terima kasih telah menghubungi SpaceINT');
            });
            
            Log::info('Auto-reply email sent to: ' . $consultation->email);
        } catch (\Exception $e) {
            Log::error('Failed to send auto-reply email: ' . $e->getMessage());
        }
    }
    
    /**
     * Get consultation statistics (for admin)
     */
    public function getStats()
    {
        $stats = [
            'total' => Consultation::count(),
            'pending' => Consultation::where('status', 'pending')->count(),
            'processed' => Consultation::where('status', 'processed')->count(),
            'completed' => Consultation::where('status', 'completed')->count(),
        ];
        
        $recent = Consultation::latest()->limit(10)->get();
        
        return response()->json([
            'success' => true,
            'stats' => $stats,
            'recent' => $recent
        ]);
    }
    
    /**
     * Update consultation status (for admin)
     */
    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,processed,completed'
        ]);
        
        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => $request->status]);
        
        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui'
        ]);
    }
}