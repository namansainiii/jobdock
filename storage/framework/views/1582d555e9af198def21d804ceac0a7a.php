<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'Looking to hire?', 
'heading' => 'Post your job listing now and find the perfect candidate.']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => 'Looking to hire?', 
'heading' => 'Post your job listing now and find the perfect candidate.']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section class="w-full">
    <div class="bg-blue-800 text-white pl-4 pr-4 pt-2 pb-2 flex items-center justify-between flex-col md:flex-row gap-4 mt-4 mb-2">
        <div>
            <h2 class="text-xl font-semibold"><?php echo e($title); ?></h2>
            <p class="text-gray-200 text-lg mt-2">
                <?php echo e($heading); ?>

            </p>
        </div>

        <?php if(auth()->guard()->check()): ?>

        <?php if (isset($component)) { $__componentOriginale21d90f41251e682846d7af3e3cbbb3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale21d90f41251e682846d7af3e3cbbb3b = $attributes; } ?>
<?php $component = App\View\Components\ButtonLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ButtonLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'edit','url' => '/jobs/create']); ?>Create Job <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale21d90f41251e682846d7af3e3cbbb3b)): ?>
<?php $attributes = $__attributesOriginale21d90f41251e682846d7af3e3cbbb3b; ?>
<?php unset($__attributesOriginale21d90f41251e682846d7af3e3cbbb3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale21d90f41251e682846d7af3e3cbbb3b)): ?>
<?php $component = $__componentOriginale21d90f41251e682846d7af3e3cbbb3b; ?>
<?php unset($__componentOriginale21d90f41251e682846d7af3e3cbbb3b); ?>
<?php endif; ?>

        <?php else: ?>

        <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/login','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('login')),'icon' => 'user']); ?>
            Login
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63)): ?>
<?php $attributes = $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63; ?>
<?php unset($__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63)): ?>
<?php $component = $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63; ?>
<?php unset($__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63); ?>
<?php endif; ?>

        <?php endif; ?>

    </div>
</section><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/components/bottom-banner.blade.php ENDPATH**/ ?>