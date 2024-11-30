@props(['name', 'options' => [], 'placeholder' => 'Pilih opsi', 'value' => null])

<div class="relative">
    <select name="{{ $name }}" id="{{ $name }}" {{ $attributes }}
        class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-slate-200 focus:border-slate-500">
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $key => $label)
            <option value="{{ $key }}" {{ $value == $key ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
