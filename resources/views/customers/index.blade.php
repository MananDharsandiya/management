@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Customers</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-success">Add Customer</a>
</div>

<!-- Form for sending messages -->
<form action="{{ route('customers.send-message') }}" method="POST">
    @csrf
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>
                    <input type="checkbox" id="select-all">
                </th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>
                        <input type="checkbox" name="selected_customers[]" value="{{ $customer->id }}" class="customer-checkbox">
                    </td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->contact }}</td>
                    <td>{{ ucfirst($customer->status) }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('conversations.index', ['customer_id' => $customer->id]) }}" class="btn btn-info btn-sm">Conversations</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Message Input -->
    <div class="mb-3" id="message-box" style="display: none;">
        <textarea name="message" class="form-control" placeholder="Enter your message..." required></textarea>
    </div>

    <!-- Send Message Button (Hidden by Default) -->
    <button type="submit" class="btn btn-primary" id="send-message-btn" style="display: none;">
        Send Message
    </button>
</form>

<!-- JavaScript for "Select All" Feature -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let checkboxes = document.querySelectorAll('.customer-checkbox');
        let messageBox = document.getElementById('message-box');
        let sendButton = document.getElementById('send-message-btn');
        let selectAll = document.getElementById('select-all');

        function toggleMessageBox() {
            let checkedCount = document.querySelectorAll('.customer-checkbox:checked').length;
            if (checkedCount > 0) {
                messageBox.style.display = 'block';
                sendButton.style.display = 'block';
            } else {
                messageBox.style.display = 'none';
                sendButton.style.display = 'none';
            }
        }

        // Attach event listeners to all checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', toggleMessageBox);
        });

        // Handle "Select All" checkbox
        selectAll.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            toggleMessageBox();
        });
    });
</script>

@endsection
