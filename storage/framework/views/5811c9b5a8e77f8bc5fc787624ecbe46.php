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
     <?php $__env->slot('title', null, []); ?> Create Jobs <?php $__env->endSlot(); ?>
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
                <h2 class="text-4xl text-center font-bold mb-4">
                    Create Job
                </h2>
                <form
                    method="POST"
                    action="/jobs"
                    enctype="multipart/form-data"
                >
                <?php echo csrf_field(); ?>
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Job Info
                    </h2>

                    <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Job Title','id' => 'title','name' => 'title','placeholder' => 'Software Engineer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Job Title','id' => 'title','name' => 'title','placeholder' => 'Software Engineer']); ?>
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

                    <?php if (isset($component)) { $__componentOriginalf3265e11323811dfd197ba170d84d4b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf3265e11323811dfd197ba170d84d4b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text-area','data' => ['label' => 'Job Description','id' => 'description','cols' => '30','rows' => '7','name' => 'description','placeholder' => 'We are seeking a skilled and motivated Software Developer to join our growing development team...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Job Description','id' => 'description','cols' => '30','rows' => '7','name' => 'description','placeholder' => 'We are seeking a skilled and motivated Software Developer to join our growing development team...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $attributes = $__attributesOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $component = $__componentOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__componentOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Annual Salary','id' => 'salary','type' => 'number','name' => 'salary','placeholder' => '90000']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Annual Salary','id' => 'salary','type' => 'number','name' => 'salary','placeholder' => '90000']); ?>
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

                    <?php if (isset($component)) { $__componentOriginalf3265e11323811dfd197ba170d84d4b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf3265e11323811dfd197ba170d84d4b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text-area','data' => ['label' => 'Requirements','id' => 'requirements','rows' => '2','name' => 'requirements','placeholder' => 'Bachelor\'s degree in Computer Science']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Requirements','id' => 'requirements','rows' => '2','name' => 'requirements','placeholder' => 'Bachelor\'s degree in Computer Science']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $attributes = $__attributesOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $component = $__componentOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__componentOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalf3265e11323811dfd197ba170d84d4b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf3265e11323811dfd197ba170d84d4b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text-area','data' => ['label' => 'Benefits','id' => 'benefits','rows' => '2','name' => 'benefits','placeholder' => 'Health insurance, 401k, paid time off']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Benefits','id' => 'benefits','rows' => '2','name' => 'benefits','placeholder' => 'Health insurance, 401k, paid time off']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $attributes = $__attributesOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $component = $__componentOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__componentOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Tags (comma-separated)','id' => 'tags','name' => 'tags','placeholder' => 'development,coding,java,python']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Tags (comma-separated)','id' => 'tags','name' => 'tags','placeholder' => 'development,coding,java,python']); ?>
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

                    <?php if (isset($component)) { $__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.select','data' => ['label' => 'Job Type','id' => 'job_type','name' => 'job_type','options' => [
                        'Full-Time' => 'Full-Time' , 
                        'Part-Time' => 'Part-Time' 
                        // 'Contract' => 'Contract' , 
                        // 'Temporary' => 'Temporary' , 
                        // 'Internship' => 'Internship' , 
                        // 'Volunteer' => 'Volunteer' , 
                        // 'On-Call' => 'On-Call' 
                    ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Job Type','id' => 'job_type','name' => 'job_type','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                        'Full-Time' => 'Full-Time' , 
                        'Part-Time' => 'Part-Time' 
                        // 'Contract' => 'Contract' , 
                        // 'Temporary' => 'Temporary' , 
                        // 'Internship' => 'Internship' , 
                        // 'Volunteer' => 'Volunteer' , 
                        // 'On-Call' => 'On-Call' 
                    ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d)): ?>
<?php $attributes = $__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d; ?>
<?php unset($__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d)): ?>
<?php $component = $__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d; ?>
<?php unset($__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.select','data' => ['label' => 'Remote','id' => 'remote','name' => 'remote','options' => [
                        '0' => 'No' , 
                        '1' => 'Yes' 
                    ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Remote','id' => 'remote','name' => 'remote','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                        '0' => 'No' , 
                        '1' => 'Yes' 
                    ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d)): ?>
<?php $attributes = $__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d; ?>
<?php unset($__attributesOriginalec0f377b60f1e2ad7b17ff3295f4376d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d)): ?>
<?php $component = $__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d; ?>
<?php unset($__componentOriginalec0f377b60f1e2ad7b17ff3295f4376d); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Address','id' => 'address','name' => 'address','placeholder' => '123 Main St']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Address','id' => 'address','name' => 'address','placeholder' => '123 Main St']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'City','id' => 'city','name' => 'city','placeholder' => 'Albany']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'City','id' => 'city','name' => 'city','placeholder' => 'Albany']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'State','id' => 'state','name' => 'state','placeholder' => 'NY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'State','id' => 'state','name' => 'state','placeholder' => 'NY']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'ZIP Code','id' => 'zipcode','name' => 'zipcode','placeholder' => '12201']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'ZIP Code','id' => 'zipcode','name' => 'zipcode','placeholder' => '12201']); ?>
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

                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Company Info
                    </h2>

                    <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Company Name','id' => 'company_name','name' => 'company_name','placeholder' => 'Company Name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Company Name','id' => 'company_name','name' => 'company_name','placeholder' => 'Company Name']); ?>
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

                    <?php if (isset($component)) { $__componentOriginalf3265e11323811dfd197ba170d84d4b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf3265e11323811dfd197ba170d84d4b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text-area','data' => ['label' => 'Company Description','id' => 'company_description','rows' => '2','name' => 'company_description','placeholder' => 'Company Description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Company Description','id' => 'company_description','rows' => '2','name' => 'company_description','placeholder' => 'Company Description']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $attributes = $__attributesOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__attributesOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf3265e11323811dfd197ba170d84d4b8)): ?>
<?php $component = $__componentOriginalf3265e11323811dfd197ba170d84d4b8; ?>
<?php unset($__componentOriginalf3265e11323811dfd197ba170d84d4b8); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Company Website','id' => 'company_website','type' => 'url','name' => 'company_website','placeholder' => 'Enter website']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Company Website','id' => 'company_website','type' => 'url','name' => 'company_website','placeholder' => 'Enter website']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Contact Phone','id' => 'contact_phone','name' => 'contact_phone','placeholder' => 'Enter phone Number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Contact Phone','id' => 'contact_phone','name' => 'contact_phone','placeholder' => 'Enter phone Number']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Contact Email','id' => 'contact_email','type' => 'email','name' => 'contact_email','placeholder' => 'Email where you want to receive applications']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Contact Email','id' => 'contact_email','type' => 'email','name' => 'contact_email','placeholder' => 'Email where you want to receive applications']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.file','data' => ['label' => 'Contact Logo','id' => 'company_logo','name' => 'company_logo']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Contact Logo','id' => 'company_logo','name' => 'company_logo']); ?>
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

                    <button
                        type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                        Save
                    </button>
                </form>
            </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/jobs/create.blade.php ENDPATH**/ ?>