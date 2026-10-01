
<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h2 class="text-center ext-3xl m-4 font-bold border border-gray-300 p-3">Welcome to JobDock</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
       <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
           <?php if (isset($component)) { $__componentOriginal4b4d8e8aa2e43718c01c10af520950c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b4d8e8aa2e43718c01c10af520950c5 = $attributes; } ?>
<?php $component = App\View\Components\JobCard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('job-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\JobCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['job' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($job)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4b4d8e8aa2e43718c01c10af520950c5)): ?>
<?php $attributes = $__attributesOriginal4b4d8e8aa2e43718c01c10af520950c5; ?>
<?php unset($__attributesOriginal4b4d8e8aa2e43718c01c10af520950c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b4d8e8aa2e43718c01c10af520950c5)): ?>
<?php $component = $__componentOriginal4b4d8e8aa2e43718c01c10af520950c5; ?>
<?php unset($__componentOriginal4b4d8e8aa2e43718c01c10af520950c5); ?>
<?php endif; ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
           <p1>No job present</p1>
       <?php endif; ?>
    </div>
    <a href="<?php echo e(route('jobs.index' , $job->id)); ?>" class="block text-xl text-center ">
        <i class="fa fa-arrow-alt-circle-right"></i>Show All Jobs</a>
    
    <?php if (isset($component)) { $__componentOriginald1f9e770aac5dfb615f1de456f01f9e3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald1f9e770aac5dfb615f1de456f01f9e3 = $attributes; } ?>
<?php $component = App\View\Components\BottomBanner::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bottom-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\BottomBanner::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald1f9e770aac5dfb615f1de456f01f9e3)): ?>
<?php $attributes = $__attributesOriginald1f9e770aac5dfb615f1de456f01f9e3; ?>
<?php unset($__attributesOriginald1f9e770aac5dfb615f1de456f01f9e3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald1f9e770aac5dfb615f1de456f01f9e3)): ?>
<?php $component = $__componentOriginald1f9e770aac5dfb615f1de456f01f9e3; ?>
<?php unset($__componentOriginald1f9e770aac5dfb615f1de456f01f9e3); ?>
<?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>

    
<?php /**PATH /Users/namanpreetkaur/Herd/jobdock/resources/views/pages/index.blade.php ENDPATH**/ ?>