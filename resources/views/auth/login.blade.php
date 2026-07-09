<x-layout>
    <x-slot name="title">Login — JobDock</x-slot>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 w-full md:max-w-md mx-auto mt-12 overflow-hidden">
        {{-- Header styling simple white --}}
        <div class="px-8 pt-8 text-center bg-white">
            <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-3 border border-amber-200/60">
                <i class="fas fa-lock text-amber-600 text-lg"></i>
            </div>
            <h2 class="text-2xl font-black tracking-tight text-gray-900">Welcome Back</h2>
            <p class="text-xs text-gray-500 mt-1">Sign in to your JobDock account to continue</p>
        </div>

        <form method="POST" action="{{ route('login.authenticate') }}" class="px-8 pb-8 pt-6 space-y-5">
            @csrf
            
            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wider">Email Address</label>
                <x-input.text id="email" type="email" name="email" placeholder="name@company.com" />
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="block text-xs font-bold text-gray-600 uppercase tracking-wider">Password</label>
                </div>
                <x-input.text id="password" type="password" name="password" placeholder="••••••••" />
            </div>

            <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-4 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 cursor-pointer mt-6 text-sm">
                <i class="fas fa-right-to-bracket text-xs"></i> Sign In
            </button>

            <div class="text-center pt-4 border-t border-gray-100 text-xs text-gray-500">
                Don't have an account yet?
                <a class="text-amber-600 font-bold hover:underline" href="{{ route('register') }}">Create an account</a>
            </div>
        </form>
    </div>
</x-layout>