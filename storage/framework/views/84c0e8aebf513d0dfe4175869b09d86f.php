<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'Find Your Dream Job']));

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

foreach (array_filter((['title' => 'Find Your Dream Job']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section
            class="hero relative bg-cover bg-center bg-no-repeat h-80 flex items-center"
        >
            <div class="overlay"></div>
            <div class="container mx-auto text-center z-10">
                <h2 class="text-4xl md:text-5xl text-white font-bold mb-8">
                    <?php echo e($title); ?>

                </h2>
                <?php if (isset($component)) { $__componentOriginal465912bafb53d2799b51398725f2e117 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal465912bafb53d2799b51398725f2e117 = $attributes; } ?>
<?php $component = App\View\Components\Search::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Search::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal465912bafb53d2799b51398725f2e117)): ?>
<?php $attributes = $__attributesOriginal465912bafb53d2799b51398725f2e117; ?>
<?php unset($__attributesOriginal465912bafb53d2799b51398725f2e117); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal465912bafb53d2799b51398725f2e117)): ?>
<?php $component = $__componentOriginal465912bafb53d2799b51398725f2e117; ?>
<?php unset($__componentOriginal465912bafb53d2799b51398725f2e117); ?>
<?php endif; ?>
            </div>
        </section><?php /**PATH /Users/namanpreetkaur/Herd/jobdock/resources/views/components/hero.blade.php ENDPATH**/ ?>