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
    <section class="max-w-8xl mx-auto flex flex-col md:flex-row gap-4 px-4 py-6">
        <div class="bg-white p-8 rounded-lg shadow-md w-full mx-auto ">
            <h3 class="h3 text-3xl text-center font-bold mb-4">
                My Profile
            </h3>
            <?php if($user->avatar): ?>
            <div class="div mt-2 flex justify-center">
                <img src="<?php echo e(asset('storage/' . $user->avatar)); ?>" alt="<?php echo e($user->name); ?>" class="w-32 h-32 object-cover rounded-full">
            </div>
            <?php endif; ?>
            <form method="POST" action=<?php echo e(route('profile.update')); ?> enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Name','id' => 'name','name' => 'name','value' => ''.e($user->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Name','id' => 'name','name' => 'name','value' => ''.e($user->name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald577c7dec18d40f4620a29a9f4a40645)): ?>
<?php $attributes = $__attributesOriginald577c7dec18d40f4620a29a9f4a40645; ?>
<?php unset($__attributesOriginald577c7dec18d40f4620a29a9f4a40645); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald577c7dec18d40f4620a29a9f4a40645)): ?>
<?php $component = $__componentOriginald577c7dec18d40f4620a29a9f4a40645; ?>
<?php unset($__componentOriginald577c7dec18d40f4620a29a9f4a40645); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Email','id' => 'email','type' => 'email','name' => 'email','value' => ''.e($user->email).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Email','id' => 'email','type' => 'email','name' => 'email','value' => ''.e($user->email).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald577c7dec18d40f4620a29a9f4a40645)): ?>
<?php $attributes = $__attributesOriginald577c7dec18d40f4620a29a9f4a40645; ?>
<?php unset($__attributesOriginald577c7dec18d40f4620a29a9f4a40645); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald577c7dec18d40f4620a29a9f4a40645)): ?>
<?php $component = $__componentOriginald577c7dec18d40f4620a29a9f4a40645; ?>
<?php unset($__componentOriginald577c7dec18d40f4620a29a9f4a40645); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc19cf60a9600fd7945f97dda8651004a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc19cf60a9600fd7945f97dda8651004a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.file','data' => ['label' => 'Upload Avatar','id' => 'avatar','name' => 'avatar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Upload Avatar','id' => 'avatar','name' => 'avatar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc19cf60a9600fd7945f97dda8651004a)): ?>
<?php $attributes = $__attributesOriginalc19cf60a9600fd7945f97dda8651004a; ?>
<?php unset($__attributesOriginalc19cf60a9600fd7945f97dda8651004a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc19cf60a9600fd7945f97dda8651004a)): ?>
<?php $component = $__componentOriginalc19cf60a9600fd7945f97dda8651004a; ?>
<?php unset($__componentOriginalc19cf60a9600fd7945f97dda8651004a); ?>
<?php endif; ?>
                
                <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 border rounded hover:bg-green-600 focus:outline-none">Save</button>

            </form>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md w-full mx-auto">
            <h3 class="h3 text-3xl text-center font-bold mb-4">
                My Job Listings
            </h3>
            <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex justify-between items-center order-b-2 border-t border-gray-300 py-2">
                <div>
                    <h3 class="text-xl font-semibold"><?php echo e($job->title); ?> <span class="text-sm">(<?php echo e($job->job_type); ?>)</span></h3>
                    <p class="text-gray-700"><?php echo e($job->description); ?></p>
                </div>
                <div class="flex space-x-3">
                    <a href="<?php echo e(route('jobs.edit', ['job' => $job->id, 'from' => 'dashboard'])); ?>" class="bg-blue-500 text-white px-4 py-2 rounded text-sm">Edit</a>
                    <form method="POST" action="<?php echo e(route('jobs.destroy' , $job->id)); ?>?from=dashboard" onsubmit="return confirm('Are you sure you want to delete this Job?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="mb-2 pl-3 pt-2 pb-2 bg-gray-100 rounded-md">
                <h4 class="text-lg font-semibold mb-2">Applicants</h4>
                <?php $__empty_2 = true; $__currentLoopData = $job->applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                <div class="py-2">
                    <p class="text-gray-800">
                        <strong>Name: </strong><?php echo e($applicant->full_name); ?>

                    </p>
                    <?php if($applicant->contact_phone): ?>
                        <p class="text-gray-800">
                            <strong>Phone: </strong><?php echo e($applicant->contact_phone); ?>

                        </p>
                    <?php endif; ?>
                    <p class="text-gray-800">
                        <strong>Email: </strong><?php echo e($applicant->contact_email); ?>

                    </p>
                    <?php if($applicant->location): ?>
                        <p class="text-gray-800">
                            <strong>Location: </strong><?php echo e($applicant->location); ?>

                        </p>
                    <?php endif; ?>

                    <?php if($applicant->message): ?>
                        <p class="text-gray-800">
                            <strong>Messgae: </strong><?php echo e($applicant->message); ?>

                        </p>
                    <?php endif; ?>

                    <div class="flex items-center gap-6 my-4 text-sm">
                        <a href="<?php echo e(asset('storage/' . $applicant->resume_path )); ?>" target="_blank" class="text-blue-500 hover:underline">
                            <i class="fas fa-eye"></i>View Resume
                        </a>
                        <a href="<?php echo e(asset('storage/' . $applicant->resume_path )); ?>" target="_blank" class="text-blue-500 hover:underline" download>
                            <i class="fas fa-download"></i>Download Resume
                        </a>
                        <form method="POST" action="<?php echo e(route('applicants.destroy' , $applicant->id)); ?>" onsubmit="return confirm('Are you sure you want to delete the Applicant?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-500 hover:underline cursor-pointer"><i class="fas fa-trash"></i>Delete The Applicant</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <p class="text-gray-700 mb-6">No Applicants For This Job</p>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-700 text-center mt-10">YOU HAVE NO JOB LISTINGS</p>
            <?php endif; ?>
        </div>
    </section>
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
<?php endif; ?><?php /**PATH /Users/namanpreetkaur/Herd/jobdock/resources/views/dashboard/index.blade.php ENDPATH**/ ?>