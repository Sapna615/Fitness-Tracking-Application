<?php
namespace App\Http\Controllers;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller {
    public function index() { return view('contact'); }
    public function store(Request $request) {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        ContactMessage::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return back()->with('success', 'Your message has been sent to our trainers!');
    }
}
