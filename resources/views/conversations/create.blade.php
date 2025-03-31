@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Conversation</h2>
    <form action="{{ route('conversations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="datetime-local" name="time" id="time" class="form-control">
        </div>
        <div class="mb-3">
            <label for="communication_medium" class="form-label">Communication Medium</label>
            <select name="communication_medium" id="communication_medium" class="form-control">
                <option value="Call">Call</option>
                <option value="Email">Email</option>
                <option value="SMS">SMS</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Conversation</button>
    </form>
</div>

<div class="container mt-5">
    <h2>Send Message</h2>
    <form action="{{ route('messages.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="select_all" class="form-label">Select All</label>
            <input type="checkbox" id="select_all">
        </div>
        <div class="mb-3">
            <label for="customer_ids" class="form-label">Select Customers</label>
            <select name="customer_ids[]" id="customer_ids" class="form-control" multiple>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="message_content" class="form-label">Message</label>
            <textarea name="message_content" id="message_content" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Send Message</button>
    </form>
</div>

<script>
    document.getElementById('select_all').addEventListener('change', function() {
        let options = document.getElementById('customer_ids').options;
        for (let i = 0; i < options.length; i++) {
            options[i].selected = this.checked;
        }
    });
</script>
@endsection