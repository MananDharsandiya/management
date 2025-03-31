@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Conversations</h2>
    <a href="{{ route('conversations.create') }}" class="btn btn-primary">Add Conversation</a>
</div>
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>Customer</th>
            <th>Time</th>
            <th>Medium</th>
        </tr>
    </thead>
    <tbody>
        @foreach($conversations as $conversation)
            <tr>
                <td>{{ $conversation->customer->name }}</td>
                <td>{{ $conversation->time }}</td>
                <td>{{ ucfirst($conversation->communication_medium) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

