<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle title="Edukasi" @onClick="router.get(route('welcome'))" />
        <EducationItem
            v-for="education in props.educations"
            :key="education.id"
            :title="education.title"
            @onClick="router.get(route('education.show', education.id))"
        />
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import CardTitle from "@/composable/CardTitle.vue";
import { router } from "@inertiajs/vue3";
import EducationItem from "./Partials/EducationItem.vue";

defineOptions({
    layout: WelcomeLayout,
});

const props = defineProps({
    educations: { type: Array },
});
</script>

<style lang="scss" scoped></style>
