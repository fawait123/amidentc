<template>
    <div>
        <!-- Canvas untuk menampilkan PDF -->
        <canvas ref="pdfCanvas" class="w-full"></canvas>

        <!-- Kontrol navigasi -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-4 my-4">
            <button @click="prevPage" :disabled="currentPage <= 1"
                :class="['font-bold cursor-pointer', currentPage <= 1 ? 'text-gray-500' : 'text-blue-500']">Sebelumnya</button>
            <span>Halaman {{ currentPage }} dari {{ totalPages }}</span>
            <button @click="nextPage" :disabled="currentPage >= totalPages"
                :class="['font-bold cursor-pointer', currentPage >= totalPages ? 'text-gray-500' : 'text-blue-500']">Selanjutnya</button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import * as pdfjsLib from 'pdfjs-dist';
import { shallowRef } from 'vue';

// Atur workerSrc untuk PDF.js
pdfjsLib.GlobalWorkerOptions.workerSrc = `https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.9.179/pdf.worker.min.js`;

// Props: URL PDF
const props = defineProps({
    pdfUrl: {
        type: String,
        required: true,
    },
});

// Refs dan state
const pdfDoc = shallowRef(null);
const currentPage = ref(1);
const totalPages = ref(0);
const pdfCanvas = ref(null);

// Fungsi untuk memuat PDF
const loadPdf = async () => {
    try {
        pdfDoc.value = await pdfjsLib.getDocument(props.pdfUrl).promise;
        totalPages.value = pdfDoc.value.numPages;
        renderPage(currentPage.value);
    } catch (error) {
        console.error('Error loading PDF:', error);
    }
};

// Fungsi untuk merender halaman tertentu
const renderPage = async (pageNumber) => {
    const page = await pdfDoc.value.getPage(pageNumber);
    const canvas = pdfCanvas.value;
    const context = canvas.getContext('2d');
    const viewport = page.getViewport({ scale: 1.5 });

    canvas.width = viewport.width;
    canvas.height = viewport.height;

    const renderContext = {
        canvasContext: context,
        viewport,
    };

    await page.render(renderContext).promise;
};

// Navigasi halaman
const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
        renderPage(currentPage.value);
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
        renderPage(currentPage.value);
    }
};

// Lifecycle: Memuat PDF saat komponen di-mount
onMounted(() => {
    loadPdf();
});
</script>
