@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Customer</h2>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" name="contact" id="contact" value="{{ old('contact', $customer->contact) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" id="address" required>{{ old('address', $customer->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="lead" {{ $customer->status == 'lead' ? 'selected' : '' }}>Lead</option>
                <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Customer</button>
    </form>
</div>
@endsection
