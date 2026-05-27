
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
  <div class="bg-blue-900 h-24 mb-4 flex justify-center items-center"><?php if (isset($component)) { $__componentOriginal465912bafb53d2799b51398725f2e117 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal465912bafb53d2799b51398725f2e117 = $attributes; } ?>
<?php $component = App\View\Components\Search::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Search::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal465912bafb53d2799b51398725f2e117)): ?>
<?php $attributes = $__attributesOriginal465912bafb53d2799b51398725f2e117; ?>
<?php unset($__attributesOriginal465912bafb53d2799b51398725f2e117); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal465912bafb53d2799b51398725f2e117)): ?>
<?php $component = $__componentOriginal465912bafb53d2799b51398725f2e117; ?>
<?php unset($__componentOriginal465912bafb53d2799b51398725f2e117); ?>
<?php endif; ?></div>
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
  <?php echo e($jobs->links()); ?>

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
<?php /**PATH /Users/namanpreetkaur/Herd/jobdock/resources/views/jobs/index.blade.php ENDPATH**/ ?>