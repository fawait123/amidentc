<div class="space-y-6 w-full">

    <div>
        <x-input-label for="title" :value="__('Judul')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post?->title)"
            autocomplete="title" placeholder="Title" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>
    <div>
        <x-text-input id="content" name="content" type="hidden" class="mt-1 block w-full" :value="old('content', $post?->content)"
            autocomplete="content" placeholder="Content" />
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
    </div>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Toolbar -->
        <div class="flex space-x-2 mb-4">
            <button type="button" id="boldButton"
                class="px-4 py-2 border rounded hover:bg-gray-200 transition">Bold</button>
            <button type="button" id="italicButton"
                class="px-4 py-2 border rounded hover:bg-gray-200 transition">Italic</button>
            <button type="button" id="headingButton"
                class="px-4 py-2 border rounded hover:bg-gray-200 transition">Heading</button>
            <button type="button" id="undoButton"
                class="px-4 py-2 border rounded hover:bg-gray-200 transition">Undo</button>
            <button type="button" id="redoButton"
                class="px-4 py-2 border rounded hover:bg-gray-200 transition">Redo</button>
        </div>

        <!-- Editor -->
        <div id="editor" class="border p-4 min-h-[150px] rounded-lg"></div>
        <textarea id="content" name="content" hidden></textarea>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button type="button" id="btn-posts">Submit</x-primary-button>
    </div>
</div>

@push('customjs')
    <script type="module">
        import {
            Editor
        } from 'https://esm.sh/@tiptap/core';
        import StarterKit from 'https://esm.sh/@tiptap/starter-kit';

        // Inisialisasi editor TipTap
        const editor = new Editor({
            element: document.querySelector('#editor'),
            extensions: [StarterKit],
            content: '<p>Welcome to TipTap!</p>',
            onUpdate: ({
                editor
            }) => {
                document.querySelector('#content').value = editor.getHTML(); // Simpan konten ke textarea
            }
        });

        // Menangani tombol toolbar
        document.querySelector('#boldButton').addEventListener('click', () => {
            editor.chain().focus().toggleBold().run();
        });

        document.querySelector('#italicButton').addEventListener('click', () => {
            editor.chain().focus().toggleItalic().run();
        });

        document.querySelector('#headingButton').addEventListener('click', () => {
            editor.chain().focus().toggleHeading({
                level: 2
            }).run();
        });

        document.querySelector('#undoButton').addEventListener('click', () => {
            editor.chain().focus().undo().run();
        });

        document.querySelector('#redoButton').addEventListener('click', () => {
            editor.chain().focus().redo().run();
        });
    </script>
@endpush
