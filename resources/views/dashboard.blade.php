@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Dashboard Title (Aligned to the Right) -->
        <h2 class="ml-auto">Dashboard</h2>
        
        <!-- View All Customers Button (Aligned to the Left) -->
        <a href="{{ route('customers.index') }}" class="btn btn-primary">View All Customers</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text">{{ $customerCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Conversations</h5>
                    <p class="card-text">{{ $conversationCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Messages Sent</h5>
                    <p class="card-text">{{ $messageCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
