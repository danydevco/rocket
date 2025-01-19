@if($style === 'solid')
    <div class="space-y-1">

        @if($label)
            <label for="{{ $id }}" class="block text-sm font-bold text-slate-600">{{ $label }}</label>
        @endif

        <input {!! $mInputId !!} type="{{ $type }}" class="{{ $mClass }}" {!! $mAttributes !!}>

        @if($errors->has($name))
            <span class="text-red-500 text-xs italic">{{ $errors->first($name) }}</span>
        @endif

    </div>

@else

@endif

