<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle
            :title="props.education.title"
            @onClick="router.get(route('education'))"
        />
        <div
            class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-4 text-justify text-[12px]"
            v-html="props.education.content"
        ></div>
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import CardTitle from "@/composable/CardTitle.vue";
import { router } from "@inertiajs/vue3";

defineOptions({
    layout: WelcomeLayout,
});

const props = defineProps({
    education: { type: Object },
});
</script>

<style lang="scss" scoped></style>
