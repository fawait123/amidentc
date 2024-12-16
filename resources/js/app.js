import './bootstrap';
import Alpine from 'alpinejs';
import { Editor } from '@tiptap/core';
import StarterKit from '@tiptap/starter-kit';

window.Alpine = Alpine;

Alpine.data('tiptapEditor', () => ({
    editor: null,
    content: '',

    init() {
        if (this.editor) return;
        // Cegah inisialisasi ulang
        this.editor = new Editor({
            element: this.$refs.editorElement,
            extensions: [StarterKit],
            content: this.content || '',
            onUpdate: () => {
                this.content = this.editor.getHTML();
            }
        });
    },

    destroy() {
        if (this.editor) {
            this.editor.destroy();  // Hancurkan editor sebelum menghapus elemen DOM
            this.editor = null;
        }
    },

    // Fungsi untuk tombol toolbar
    isActive(type) {
        return this.editor.isActive(type);
    },
    format(command, opts = {}) {
        console.log(this.editor.commands)
        this.editor.commands.setBold()
    },
}));

Alpine.start();
