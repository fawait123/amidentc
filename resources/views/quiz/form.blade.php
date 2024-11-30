<div class="space-y-6">

    <div>
        <x-input-label for="title" :value="__('Judul')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $quiz?->title)"
            autocomplete="title" placeholder="Title" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Deskripsi')" />
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $quiz?->description)"
            autocomplete="description" placeholder="Description" />
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
