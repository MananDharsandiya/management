@extends('layouts.app')
@section('content')
<div class="card mx-auto mt-5" style="max-width: 600px;">
    <div class="card-body">
        <h3 class="card-title text-center">Send Message</h3>
        <form method="POST" action="{{ route('messages.send') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Select Customers</label>
                <select name="customer_ids[]" class="form-control" multiple>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Message</button>
        </form>
    </div>
</div>
@endsection