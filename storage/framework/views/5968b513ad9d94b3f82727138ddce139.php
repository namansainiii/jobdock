<form method="GET" action="<?php echo e(route('jobs.search')); ?>" class="block mx-5 space-y-2 md:mx-auto md:space-x-2">
    <input type="text" name="keywords" placeholder="Keywords" class="text-white border border-white w-full md:w-72 px-4 py-3 focus:outline-none"/>
    <input type="text" name="location" placeholder="Location" class="text-white border border-white w-full md:w-72 px-4 py-3 focus:outline-none"/>
    <button class="w-full md:w-auto bg-blue-700 hover:bg-blue-600 text-white px-4 py-3 focus:outline-none">
        <i class="fa fa-search mr-1"></i> Search
    </button>
</form><?php /**PATH /Users/namanpreetkaur/Herd/workopia/resources/views/components/search.blade.php ENDPATH**/ ?>