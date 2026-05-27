

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['url' => '/' , 'active' => false , 'icon' => null , 'mobile' => null]));

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

foreach (array_filter((['url' => '/' , 'active' => false , 'icon' => null , 'mobile' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if($mobile): ?>
<a href=<?php echo e($url); ?> class="block px-4 py-2 hover:bg-blue-700 <?php echo e($active ? 'text-yellow-500 font-bold' : ''); ?>">
    <?php if($icon): ?>
    <i class="fa fa-<?php echo e($icon); ?> mr-1"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

</a>
<?php else: ?>
<a href=<?php echo e($url); ?> class="text-white hover:underline py-2 <?php echo e($active ? 'text-yellow-500 font-bold' : ''); ?>">
    <?php if($icon): ?>
    <i class="fa fa-<?php echo e($icon); ?> mr-1"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

</a>
<?php endif; ?><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/components/navlink.blade.php ENDPATH**/ ?>