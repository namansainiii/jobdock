<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['job']));

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

foreach (array_filter((['job']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="rounded-lg shadow-md bg-white p-4 m-4">
    <div class="flex items-center space-between gap-4">
        <?php if($job->company_logo): ?>
        <img
            src="/storage/<?php echo e($job->company_logo); ?>"
            alt="<?php echo e($job->company_name); ?>"
            class="w-14"
        />
        <?php endif; ?>
        <div>
            <h2 class="text-xl font-semibold">
                <?php echo e($job->title); ?>

            </h2>
            <p class="text-sm text-gray-500"><?php echo e($job->job_type); ?></p>
        </div>
    </div>
    <p class="text-gray-700 text-m mt-2">
        <?php echo e(Str::limit($job->description , 200)); ?>

    </p>
    <ul class="my-4 bg-gray-100 p-4 rounded">
        <li class="mb-2"><strong>Salary: </strong>Rs <?php echo e($job->salary); ?></li>
        <li class="mb-2">
            <strong>Location:</strong> <?php echo e($job->city); ?>, <?php echo e($job->state); ?>

            <span class="text-xs bg-red-500 text-white rounded-full px-2 py-1 ml-2"><?php echo e($job->job_type); ?> </span>
        </li>
        <?php if($job->tags): ?>
            <li class="mb-2">
                <strong>Tags:</strong> <?php echo e(ucwords(str_replace(',', ', ' , $job->tags))); ?>

            </li>
        <?php endif; ?>

    </ul>
    <a href="<?php echo e(route('jobs.show' , $job->id )); ?>" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">Details</a>
</div><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/components/job-card.blade.php ENDPATH**/ ?>