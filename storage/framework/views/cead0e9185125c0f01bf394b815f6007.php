
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-3">
    <h2>Customers</h2>
    <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-success">Add Customer</a>
</div>

<!-- Form for sending messages -->
<form action="<?php echo e(route('customers.send-message')); ?>" method="POST">
    <?php echo csrf_field(); ?>
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
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <input type="checkbox" name="selected_customers[]" value="<?php echo e($customer->id); ?>" class="customer-checkbox">
                    </td>
                    <td><?php echo e($customer->name); ?></td>
                    <td><?php echo e($customer->email); ?></td>
                    <td><?php echo e($customer->contact); ?></td>
                    <td><?php echo e(ucfirst($customer->status)); ?></td>
                    <td>
                        <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php echo e(route('conversations.index', ['customer_id' => $customer->id])); ?>" class="btn btn-info btn-sm">Conversations</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\management\resources\views/customers/index.blade.php ENDPATH**/ ?>