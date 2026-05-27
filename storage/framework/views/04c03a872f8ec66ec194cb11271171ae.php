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
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <section class="md:col-span-2">
        <div class="rounded-lg shadow-md bg-white p-3">
            <div class="flex justify-between items-center">
                <a class="block p-4 text-blue-700" href="<?php echo e(route('jobs.index')); ?>">
                    <i class="fa fa-arrow-alt-circle-left"></i>
                    Back To Listings
                </a>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update' , $job)): ?>
                <div class="flex space-x-3 ml-4">
                    <a href="<?php echo e(route('jobs.edit' , $job->id)); ?>" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                        Edit
                    </a>
                    <!-- Delete Form -->
                    <form method="POST" action="<?php echo e(route('jobs.destroy' , $job->id)); ?>" onsubmit="return confirm('Are you sure you want to delete this Job?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                            Delete
                        </button>
                    </form>
                    <!-- End Delete Form -->
                </div>
                <?php endif; ?>
                
            </div>
            <div class="p-4">
                <h2 class="text-xl font-semibold"><?php echo e($job->title); ?></h2>
                <p class="text-gray-700 text-lg mt-2"><?php echo e($job->description); ?></p>
                <ul class="my-4 bg-gray-100 p-4">
                <li class="mb-2">
                    <strong>Job Type:</strong> <?php echo e($job->job_type); ?>

                </li>
                <li class="mb-2">
                    <strong>Remote:</strong> <?php echo e($job->remote ? 'Yes' : 'No'); ?>

                </li>
                <li class="mb-2">
                    <strong>Salary:</strong> $<?php echo e($job->salary); ?>

                </li>
                <li class="mb-2">
                    <strong>Site Location:</strong> <?php echo e($job->city); ?>, <?php echo e($job->state); ?>

                </li>
                <?php if($job->tags): ?>
                    <li class="mb-2">
                        <strong>Tags:</strong>
                        <?php echo e(ucwords(str_replace(',', ', ' ,$job->tags))); ?>

                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="container mx-auto p-4">
            <?php if($job->requirements || $job->benefits): ?>
            <h2 class="text-xl font-semibold mb-4">Job Details</h2>
            <div class="rounded-lg shadow-md bg-white p-4">
                <h3 class="text-lg font-semibold mb-2 text-blue-500">
                    Job Requirements
                </h3>
                <p><?php echo e($job->requirements); ?></p>
                <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">
                    Benefits
                </h3>
                <p><?php echo e($job->benefits); ?></p>
            </div>
            <?php endif; ?>
            <p class="my-5">
                
            </p>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->id != $job->user_id): ?>
                    <div class="grid grid-cols-2 gap-4">
                        <?php if(!\App\Models\Applicant::where('user_id', auth()->id())->where('job_id', $job->id)->exists()): ?>
                            <div x-data="{ open: false }" id="applicant-form">
                                <button @click="open = true" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                    Apply Now
                                </button>
            
                                <div x-cloak x-show="open" class="fixed inset-0 flex items-center justify-center bg-transparent">
                                    <div @click.away="open = false" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md border border-black-200">
                                        <h3 class="text-lg font-semibold mb-4">
                                            Apply for <?php echo e($job->title); ?>

                                        </h3>
                                        <form method="POST" action="<?php echo e(route('applicants.store' , $job->id)); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php if (isset($component)) { $__componentOriginald577c7dec18d40f4620a29a9f4a40645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald577c7dec18d40f4620a29a9f4a40645 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Full Name','id' => 'full_name','name' => 'full_name','required' => true,'placeholder' => 'Full Name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Full Name','id' => 'full_name','name' => 'full_name','required' => true,'placeholder' => 'Full Name']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Phone Number','id' => 'contact_phone','name' => 'contact_phone','placeholder' => 'Phone Number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Phone Number','id' => 'contact_phone','name' => 'contact_phone','placeholder' => 'Phone Number']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Email Address','id' => 'contact_email','name' => 'contact_email','required' => true,'placeholder' => 'Email Address']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Email Address','id' => 'contact_email','name' => 'contact_email','required' => true,'placeholder' => 'Email Address']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text-area','data' => ['label' => 'Remark','id' => 'message','rows' => '2','name' => 'message','placeholder' => 'Enter Your Message For The Company']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text-area'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Remark','id' => 'message','rows' => '2','name' => 'message','placeholder' => 'Enter Your Message For The Company']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.text','data' => ['label' => 'Location','id' => 'location','name' => 'location','placeholder' => 'Location']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Location','id' => 'location','name' => 'location','placeholder' => 'Location']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.file','data' => ['label' => 'Upload Your Resume(pdf)','id' => 'resume_path','name' => 'resume_path','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Upload Your Resume(pdf)','id' => 'resume_path','name' => 'resume_path','required' => true]); ?>
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
        
                                            <button type="button" @click="open = false" class="mr-3 ml-40 bg-gray-300 hover:bg-gray-400 text-black px-2 py-2 rounded-md">Cancel</button>
            
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-2 rounded-md">Submit Application</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <button type="button" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-200">
                                Already Applied
                            </button>
                        <?php endif; ?>
                        <a href="mailto:<?php echo e($job->contact_email); ?>" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer bg-gray-300 hover:bg-gray-400">
                            Send An Email To The Company
                        </a>
                    </div>
                <?php else: ?>
                    <div x-data="{ opened: false }">
                        <button @click="opened = true" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer bg-gray-300 hover:bg-gray-400">
                            View Applications 
                        </button>
                        <div x-cloak x-show="opened" class="fixed inset-0 flex items-center justify-center bg-transparent">
                            <div @click.away="opened = false" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md border border-black-200">
                                <h3 class="text-lg font-semibold mb-4">
                                    Applications for <?php echo e($job->title); ?>

                                </h3>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medicursor-pointer text-black-700 bg-gray-100 hover:bg-gray-200">
                    Login To Apply For The Job
                </a>
            <?php endif; ?>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <div id="map"></div>
        </div>
    </section>
    <aside class="bg-white rounded-lg shadow-md p-3">
        <h3 class="text-xl text-center mb-4 font-bold">
            Company Info
        </h3>
        <?php if($job->company_logo): ?>
            <img src="/storage/<?php echo e($job->company_logo); ?>" alt="<?php echo e($job->company_name); ?>" class="w-50 rounded-lg mb-4 m-auto"/>
        <?php endif; ?>
        <h4 class="text-lg font-bold"><?php echo e($job->company_name); ?></h4>
        <p class="text-gray-700 text-lg my-3"><?php echo e($job->description); ?></p>
        <?php if($job->company_website): ?>
            <a href="<?php echo e($job->company_website); ?>" target="_blank" class="text-blue-500">Visit Website</a>
        <?php endif; ?>

        <?php
            $isBookmarked = auth()->check() &&
            auth()->user()->bookmarkedJobs->contains($job->id);
        ?>
        <?php if(auth()->guard()->guest()): ?>
            <p class="mt-10 bg-gray-200 text-gray-700 font-bold w-full py-2 px-4 rounded-full text-center">
                <i class="fas fa-bookmark mr-3"></i>
                You must be logged in to bookmark a job
            </p>
        <?php else: ?>
            <?php if($isBookmarked): ?>
                <form method="POST" action="<?php echo e(route('bookmarks.destroy', $job->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                        class="mt-10 bg-gray-300 text-gray-800 font-bold w-full py-2 px-4 rounded-full">
                        <i class="fas fa-bookmark mr-3"></i>
                        Bookmarked
                    </button>
                </form>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('bookmarks.store', $job->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="mt-10 bg-blue-500 hover:bg-blue-600 text-white font-bold w-full py-2 px-4 rounded-full">
                        <i class="fas fa-bookmark mr-3"></i>
                        Bookmark
                    </button>
                </form>
            <?php endif; ?>
        <?php endif; ?> 
    </aside>
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
<?php endif; ?>


<link
  href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css"
  rel="stylesheet"
/>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Your Mapbox access token
    mapboxgl.accessToken = "<?php echo e(env('MAPBOX_API_KEY')); ?>";

    // Initialize the map
    const map = new mapboxgl.Map({
      container: 'map', // ID of the container element
      style: 'mapbox://styles/mapbox/streets-v11', // Map style
      center: [-74.5, 40], // Default center
      zoom: 9, // Default zoom level
    });

    // Get address from Laravel view
    const city = '<?php echo e($job->city); ?>';
    const state = '<?php echo e($job->state); ?>';
    const address = city + ', ' + state;

    // Geocode the address
    fetch(`/geocode?address=${encodeURIComponent(address)}`)
      .then((response) => response.json())
      .then((data) => {
        if (data.features.length > 0) {
          const [longitude, latitude] = data.features[0].center;

          // Center the map and add a marker
          map.setCenter([longitude, latitude]);
          map.setZoom(14);

          new mapboxgl.Marker().setLngLat([longitude, latitude]).addTo(map);
        } else {
          console.error('No results found for the address.');
        }
      })
      .catch((error) => console.error('Error geocoding address:', error));
  });
</script><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/jobs/show.blade.php ENDPATH**/ ?>