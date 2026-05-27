<x-layout>
    <div class="div gg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 py-12 p-8">
        <h2 class="h2 text-4xl text-center font-bold mb-4">Login</h2>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <x-input.text id="email" type="email" name="email" placeholder="Enter Email Address" />
            <x-input.text id="password" type="password" name="password" placeholder="Type Your Password" />
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white w-full text-center p-2 rounded focus:outline-none">Login</button>
            <div class="p text-gray-500 t-4">
                Don't have an account?
                <a class="text-blue-900" href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>

</x-layout>