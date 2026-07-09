<x-layout>
    <x-slot name="title">Register — JobDock</x-slot>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 w-full md:max-w-md mx-auto mt-12 overflow-hidden">
        {{-- Header styling simple white --}}
        <div class="px-8 pt-8 text-center bg-white">
            <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-3 border border-amber-200/60">
                <i class="fas fa-user-plus text-amber-600 text-lg"></i>
            </div>
            <h2 class="text-2xl font-black tracking-tight text-gray-900">Create Account</h2>
            <p class="text-xs text-gray-500 mt-1">Join JobDock today to find your dream role or hire talent</p>
        </div>

        <form method="POST" action="{{ route('register.store') }}" class="px-8 pb-8 pt-6 space-y-4">
            @csrf

            {{-- Role selector --}}
            <div x-data="{ role: '{{ old('role', 'employee') }}' }">
                <input type="hidden" name="role" :value="role">
                <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wider">I want to register as a:</label>
                <div class="flex rounded-xl border border-gray-250 p-1 bg-gray-50/50">
                    <button 
                        type="button" 
                        @click="role = 'employee'"
                        :class="role === 'employee' ? 'bg-amber-600 text-white shadow-sm' : 'bg-transparent text-gray-600 hover:bg-gray-100'"
                        class="w-1/2 py-2 text-center text-xs font-extrabold rounded-lg transition-all duration-150 focus:outline-none cursor-pointer">
                        <i class="fas fa-user mr-1 text-[10px]"></i> Job Seeker
                    </button>
                    <button 
                        type="button" 
                        @click="role = 'company'"
                        :class="role === 'company' ? 'bg-amber-600 text-white shadow-sm' : 'bg-transparent text-gray-600 hover:bg-gray-100'"
                        class="w-1/2 py-2 text-center text-xs font-extrabold rounded-lg transition-all duration-150 focus:outline-none cursor-pointer border-l border-gray-200">
                        <i class="fas fa-building mr-1 text-[10px]"></i> Employer
                    </button>
                </div>
                @error('role')
                    <p class="text-red-500 text-xs mt-1.5 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1 uppercase tracking-wider">Full Name</label>
                <x-input.text id="name" name="name" placeholder="John Doe" />
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1 uppercase tracking-wider">Email Address</label>
                <x-input.text id="email" type="email" name="email" placeholder="john@example.com" />
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1 uppercase tracking-wider">Password</label>
                <x-input.text id="password" type="password" name="password" placeholder="••••••••" />
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1 uppercase tracking-wider">Confirm Password</label>
                <x-input.text id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" />
            </div>

            <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-4 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 cursor-pointer mt-6 text-sm">
                <i class="fas fa-user-plus text-xs"></i> Sign Up
            </button>

            <div class="text-center pt-4 border-t border-gray-100 text-xs text-gray-500">
                Already have an account?
                <a class="text-amber-600 font-bold hover:underline" href="{{ route('login') }}">Sign In</a>
            </div>
        </form>
    </div>
</x-layout>