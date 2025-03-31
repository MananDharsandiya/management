@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add New Customer</h2>
    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" class="form-control" name="contact" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-control" name="status">
                <option value="Lead">Lead</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection