
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between mb-3">
    <h2>Conversations</h2>
    <a href="<?php echo e(route('conversations.create')); ?>" class="btn btn-primary">Add Conversation</a>
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
        <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($conversation->customer->name); ?></td>
                <td><?php echo e($conversation->time); ?></td>
                <td><?php echo e(ucfirst($conversation->communication_medium)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\management\resources\views/conversations/index.blade.php ENDPATH**/ ?>