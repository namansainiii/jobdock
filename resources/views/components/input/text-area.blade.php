@props([
    'label' => null,
    'id', 
    'cols' => '30',
    'rows' => '7',
    'name',
    'placeholder' => '',
    'value' => ''
]) 
 
 <div class="mb-4">
    @if($label)
    <label class="block text-gray-700" for="{{$id}}">{{$label}}</label>
    @endif
    <textarea
        cols="{{$cols}}"
        rows="{{$rows}}"
        id="{{$id}}"
        name="{{$name}}"
        class="w-full px-4 py-2.5 border border-gray-250 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all text-sm resize-none @error($name) border-red-500 @enderror"
        placeholder="{{$placeholder}}"
            
    >{{old($name,$value)}}</textarea>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror
</div>