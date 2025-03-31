
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Add Conversation</h2>
    <form action="<?php echo e(route('conversations.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <form action="<?php echo e(route('messages.send')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="select_all" class="form-label">Select All</label>
            <input type="checkbox" id="select_all">
        </div>
        <div class="mb-3">
            <label for="customer_ids" class="form-label">Select Customers</label>
            <select name="customer_ids[]" id="customer_ids" class="form-control" multiple>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\management\resources\views/conversations/create.blade.php ENDPATH**/ ?>