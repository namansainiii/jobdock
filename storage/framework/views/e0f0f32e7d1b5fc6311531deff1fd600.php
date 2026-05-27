<form method="POST" action="<?php echo e(route('logout')); ?>">
    <?php echo csrf_field(); ?>
    <button type="submit" class="text-white">
        <i class="fa fa-sign-out"></i>Logout
    </button>
</form><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/components/logout-button.blade.php ENDPATH**/ ?>