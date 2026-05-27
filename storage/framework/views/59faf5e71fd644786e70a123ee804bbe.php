
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'url' => '/' , 
    'icon' => null , 
    'bgClass' => 'bg-yellow-500' , 
    'hoverClass' => 'hover:bg-yellow-600' , 
    'textClass' => 'text-black',
    'block' => false
]));

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

foreach (array_filter(([
    'url' => '/' , 
    'icon' => null , 
    'bgClass' => 'bg-yellow-500' , 
    'hoverClass' => 'hover:bg-yellow-600' , 
    'textClass' => 'text-black',
    'block' => false
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<a href=<?php echo e($url); ?> class=" <?php echo e($bgClass); ?> <?php echo e($hoverClass); ?> <?php echo e($textClass); ?> px-4 py-2 rounded hover:shadow-md transition duration-300 <?php echo e($block ? 'block' : ' '); ?> ">
    <?php if($icon): ?>
    <i class="fa fa-<?php echo e($icon); ?>"></i>
    <?php endif; ?>
    <?php echo e($slot); ?>

</a><?php /**PATH /Users/namanpreetkaur/Herd/jobdock/resources/views/components/button-link.blade.php ENDPATH**/ ?>