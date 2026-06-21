@props([
    'label' => null,
    'id', 
    'type' => 'text',
    'name',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'readonly' => false,
    'hidden' => false,
    'width' => 'w-full',
])


<div class="mb-4">
    @if($label)
    <label {{ $hidden ? 'hidden' : '' }} class="block text-gray-700" for={{$id}}>{{$label}}</label>
    @endif
    <input
        id="{{$id}}"
        type="{{$type}}"
        name="{{$name}}"
        class="{{$width}} px-4 py-2 border rounded focus:outline-none @error($name) border-red-500 @enderror"
        placeholder="{{$placeholder}}"
        value="{{ old($name , $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $readonly ? 'readonly' : '' }}
        {{ $hidden ? 'hidden' : '' }}
    />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror
</div>