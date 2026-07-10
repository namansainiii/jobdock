@props(['mobile' => false])

<form method="POST" action="{{ route('logout') }}" class="{{ $mobile ? 'w-full' : 'inline-block' }}">
    @csrf
    <button type="submit" class="text-white hover:text-slate-200 cursor-pointer flex items-center {{ $mobile ? 'w-full px-4 py-2 hover:bg-slate-800 text-sm' : 'hover:underline py-2' }}">
        <i class="fa fa-sign-out mr-1.5"></i>Logout
    </button>
</form>