<div class="space-y-6 w-full">

    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post?->title)"
            autocomplete="title" placeholder="Title" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>
    <div>
        <x-text-input id="content" name="content" type="hidden" class="mt-1 block w-full" :value="old('content', $post?->content)"
            autocomplete="content" placeholder="Content" />
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
    </div>
    <div id="editor">

        <p>Tuliskan konten anda <strong>disini</strong></p>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button type="button" id="btn-posts">Submit</x-primary-button>
    </div>
</div>
