<header class="bg-blue-900 text-white p-4" x-data="{open : false}">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-semibold">
                    <a href=<?php echo e(url('/')); ?>>Workopia</a>
                </h1>
                <nav class="hidden md:flex items-center space-x-4"> 

                    <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('/'))]); ?>
                        Home
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

                    <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/jobs','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('jobs'))]); ?>
                        All Jobs
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

                    <?php if(auth()->guard()->check()): ?>

                    <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/bookmarks','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('bookmarks'))]); ?>
                        Saved Jobs
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

                    

                    <?php if (isset($component)) { $__componentOriginal57d76ca91af442349cecf6cad0238dd1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal57d76ca91af442349cecf6cad0238dd1 = $attributes; } ?>
<?php $component = App\View\Components\LogoutButton::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('logout-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LogoutButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal57d76ca91af442349cecf6cad0238dd1)): ?>
<?php $attributes = $__attributesOriginal57d76ca91af442349cecf6cad0238dd1; ?>
<?php unset($__attributesOriginal57d76ca91af442349cecf6cad0238dd1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal57d76ca91af442349cecf6cad0238dd1)): ?>
<?php $component = $__componentOriginal57d76ca91af442349cecf6cad0238dd1; ?>
<?php unset($__componentOriginal57d76ca91af442349cecf6cad0238dd1); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginale21d90f41251e682846d7af3e3cbbb3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale21d90f41251e682846d7af3e3cbbb3b = $attributes; } ?>
<?php $component = App\View\Components\ButtonLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ButtonLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/jobs/create','icon' => 'edit']); ?>
                        Create Job
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale21d90f41251e682846d7af3e3cbbb3b)): ?>
<?php $attributes = $__attributesOriginale21d90f41251e682846d7af3e3cbbb3b; ?>
<?php unset($__attributesOriginale21d90f41251e682846d7af3e3cbbb3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale21d90f41251e682846d7af3e3cbbb3b)): ?>
<?php $component = $__componentOriginale21d90f41251e682846d7af3e3cbbb3b; ?>
<?php unset($__componentOriginale21d90f41251e682846d7af3e3cbbb3b); ?>
<?php endif; ?>

                    <div class="flex items-center space-x-3">
                        <a href="<?php echo e(route('dashboard.index')); ?>">
                            <?php if(Auth::user()->avatar): ?>
                                <img src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="<?php echo e(Auth::user()->avatar); ?>" class="w-10 h-10 object-cover rounded-full"/>

                            <?php else: ?>
                                <img src="<?php echo e(asset('storage/app/public/avatar/profile.png')); ?>" alt="<?php echo e(Auth::user()->avatar); ?>" class="w-10 h-10 object-cover rounded-full" />

                            <?php endif; ?>
                        </a>
                    </div>

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

                    <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/register','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('register'))]); ?>
                        Register
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

                </nav>
                <button @click="open = !open" id="hamburger" class="text-white md:hidden flex items-center">
                    <i class="fa fa-bars text-2xl"></i>
                </button>
            </div>
            <!-- Mobile Menu -->
            <nav x-show="open" @click.outside="open = false" id="mobile-menu" class="md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2">
                <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/jobs','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('jobs')),'mobile' => true]); ?>
                    All Jobs
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

                <?php if(auth()->guard()->check()): ?>

                <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/bookmarks','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('bookmarks')),'mobile' => true]); ?>
                    Saved Jobs
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

                <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/dashboard','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('dashboard')),'icon' => 'gauge','mobile' => true]); ?>
                    Dashboard
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

                <?php if (isset($component)) { $__componentOriginal57d76ca91af442349cecf6cad0238dd1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal57d76ca91af442349cecf6cad0238dd1 = $attributes; } ?>
<?php $component = App\View\Components\LogoutButton::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('logout-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LogoutButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal57d76ca91af442349cecf6cad0238dd1)): ?>
<?php $attributes = $__attributesOriginal57d76ca91af442349cecf6cad0238dd1; ?>
<?php unset($__attributesOriginal57d76ca91af442349cecf6cad0238dd1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal57d76ca91af442349cecf6cad0238dd1)): ?>
<?php $component = $__componentOriginal57d76ca91af442349cecf6cad0238dd1; ?>
<?php unset($__componentOriginal57d76ca91af442349cecf6cad0238dd1); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginale21d90f41251e682846d7af3e3cbbb3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale21d90f41251e682846d7af3e3cbbb3b = $attributes; } ?>
<?php $component = App\View\Components\ButtonLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ButtonLink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/jobs/create','icon' => 'edit','block' => true]); ?>
                    Create Job
                 <?php echo $__env->renderComponent(); ?>
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
<?php $component->withAttributes(['url' => '/login','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('login')),'mobile' => true]); ?>
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

                <?php if (isset($component)) { $__componentOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a8d92aa9b7c8777043bf88836ff5c63 = $attributes; } ?>
<?php $component = App\View\Components\Navlink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navlink'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navlink::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => '/register','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->is('register')),'mobile' => true]); ?>
                    Register
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
            </nav>
        </header><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/components/header.blade.php ENDPATH**/ ?>