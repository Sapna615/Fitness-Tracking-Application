@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-lg rounded-5 p-5">
            <h2 class="fw-black italic mb-2">ASK A TRAINER</h2>
            <p class="text-muted mb-4">Have a question about your plan? Send us a message and our expert trainers will get back to you.</p>
            
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label text-muted small fw-bold uppercase">Subject</label>
                    <input type="text" name="subject" class="form-control rounded-4 py-3" placeholder="e.g. Question about squat form" required>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted small fw-bold uppercase">Your Message</label>
                    <textarea name="message" class="form-control rounded-4 py-3" rows="5" placeholder="Type your message here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-4 shadow-sm">Send Message &rarr;</button>
            </form>
        </div>
    </div>
</div>
@endsection
