<x-layout>
    <div class="div bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 py-12 p-8">
        <h2 class="h2 text-4xl text-center font-bold mb-4">Register</h2>
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div x-data="{ role: '{{ old('role', 'employee') }}' }" class="mb-4">
                <input type="hidden" name="role" :value="role">
                <div class="flex rounded border border-gray-300 overflow-hidden">
                    <button 
                        type="button" 
                        @click="role = 'employee'"
                        :class="role === 'employee' ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
                        class="w-1/2 py-2 text-center text-sm font-semibold transition-colors duration-150 focus:outline-none">
                        Job Seeker (Employee)
                    </button>
                    <button 
                        type="button" 
                        @click="role = 'company'"
                        :class="role === 'company' ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100'"
                        class="w-1/2 py-2 text-center text-sm font-semibold transition-colors duration-150 focus:outline-none border-l border-gray-300">
                        Employer (Company)
                    </button>
                </div>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <x-input.text id="name" name="name" placeholder="Enter Your Name" />
            <x-input.text id="email" type="email" name="email" placeholder="Enter Email Address" />
            <x-input.text id="password" type="password" name="password" placeholder="Type Your Password" />
            <x-input.text id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-Type Your Password"/>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white w-full text-center p-2 rounded focus:outline-none">Register</button>
            <div class="p text-gray-500 t-4">
                Already have an account?
                <a class="text-blue-900" href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>

</x-layout>