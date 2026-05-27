<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' , 'message' , 'timeout' => 5000
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
    'type' , 'message' , 'timeout' => 5000
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>




<div x-data="{ show: true }" x-init="setTimeout(() => show = false , <?php echo e($timeout); ?> )" x-show="show" class="ml-4 mr-4 p-4 mb-4 text-sm text-white rounded <?php echo e($type == 'success' ? 'bg-green-500' : 'bg-red-500'); ?>">
<?php echo e($message); ?>

</div>

<?php /**PATH /Users/namanpreetkaur/Herd/jobdock/resources/views/components/alert.blade.php ENDPATH**/ ?>