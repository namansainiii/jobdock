<form method="GET" action="{{ route('jobs.search') }}" class="flex flex-col md:flex-row items-center justify-center gap-3 max-w-4xl mx-auto px-4">
    <div class="relative w-full md:w-72">
        <i class="fas fa-briefcase absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
        <input type="text" name="keywords" placeholder="Job title, keywords..." 
            class="w-full pl-11 pr-4 py-3 bg-white/10 backdrop-blur-md border border-white/25 rounded-xl text-white placeholder-slate-350 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" 
            value="{{request('keywords')}}" />
    </div>
    <div class="relative w-full md:w-72">
        <i class="fas fa-map-marker-alt absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
        <input type="text" name="location" placeholder="City, state or remote..." 
            class="w-full pl-11 pr-4 py-3 bg-white/10 backdrop-blur-md border border-white/25 rounded-xl text-white placeholder-slate-350 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" 
            value="{{request('location')}}"/>
    </div>
    <button class="w-full md:w-auto bg-amber-600 hover:bg-amber-700 text-white font-bold px-7 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 cursor-pointer">
        <i class="fa fa-search text-sm"></i> Search
    </button>
</form>