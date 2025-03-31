

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Edit Customer</h2>
    <form action="<?php echo e(route('customers.update', $customer->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name', $customer->name)); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo e(old('email', $customer->email)); ?>" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" name="contact" id="contact" value="<?php echo e(old('contact', $customer->contact)); ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" id="address" required><?php echo e(old('address', $customer->address)); ?></textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="lead" <?php echo e($customer->status == 'lead' ? 'selected' : ''); ?>>Lead</option>
                <option value="active" <?php echo e($customer->status == 'active' ? 'selected' : ''); ?>>Active</option>
                <option value="inactive" <?php echo e($customer->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Customer</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\management\resources\views/customers/edit.blade.php ENDPATH**/ ?>