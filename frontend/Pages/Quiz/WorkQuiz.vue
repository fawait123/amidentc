<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle
            title="Quiz Kesehatan"
            @onClick="router.get(route('quiz'))"
        />
        <SelectionItem
            title="Makanan yang baik bagi ibu hamil adalah ?"
            :options="options"
        />
        <div
            class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-4 flex justify-end"
        >
            <div class="flex gap-4">
                <Button variant="outline">Sebelumnya</Button>
                <Button>Selanjutnya</Button>
            </div>
        </div>
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import { router } from "@inertiajs/vue3";
import SelectionItem from "./Partials/SelectionItem.vue";
import { ref } from "vue";
import { Button } from "@/components/ui/button";
import CardTitle from "@/composable/CardTitle.vue";

defineOptions({
    layout: WelcomeLayout,
});

const options = ref([
    {
        label: "Susu",
        value: "susu",
    },
    {
        label: "Keju",
        value: "keju",
    },
    {
        label: "Makanan Pedas",
        value: "makanan-pedas",
    },
    {
        label: "Makanan Manis",
        value: "makanan-manis",
    },
]);
</script>

<style lang="scss" scoped></style>
