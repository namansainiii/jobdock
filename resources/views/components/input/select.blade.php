@props([
    'label' => null,
    'id',
    'name',
    'value' => '',
    'options' => []
])

<div class="mb-4">
    @if($label)
    <label class="block text-gray-700" for="{{$id}}">{{$label}}</label>
    @endif

    <select
        id="{{$id}}"
        name="{{$name}}"
        class="w-full px-4 py-2.5 border border-gray-250 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all text-sm bg-white @error($name) border-red-500 @enderror">
        @foreach($options as $optionValue => $optionLabel)
        <option value="{{$optionValue}}" {{ old($name , $value)  == $optionValue ? 'selected' : ''}}>{{$optionLabel}}</option>
        @endforeach
    </select>
     @error($name)
        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror
</div>