@props([
    'name',
    'index' => 0,
    'options' => [], // Array of options (key => value)
    'label' => '', // Optional label for the radio group
    'selected' => null, // Selected option
    'editable' => false,
])

<div class="mb-4">
    <div class="grid grid-cols-2 gap-4 my-4">
        @foreach ($options as $value => $optionLabel)
            <label class="inline-flex items-center">
                <input type="radio" name="{{ $name }}" value="{{ $value }}"
                    class="form-radio text-slate-600 focus:ring-slate-500 focus:ring-2 focus:ring-offset-2"
                    {{ $selected == $value ? 'checked' : '' }} {{ $attributes }}>
                @if ($editable)
                    <!-- Input untuk label yang dapat diedit -->
                    <input type="text" name="options[{{ $index }}][{{ $value }}]"
                        value="{{ $optionLabel }}"
                        class="ml-2 border-b border-gray-300 focus:outline-none focus:border-slate-500 options" />
                @else
                    <!-- Label biasa -->
                    <span class="ml-2 text-gray-700">{{ $optionLabel }}</span>
                @endif
            </label>
        @endforeach
    </div>
</div>
