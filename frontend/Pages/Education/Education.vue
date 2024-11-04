<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle title="Edukasi" @onClick="router.get(route('welcome'))" />
        <EducationItem
            title="Menjaga kehamilan yang baik"
            @onClick="router.get(route('education.show', '23424fsdf'))"
        />
        <EducationItem
            title="Makanan yang baik buat ibu hamil"
            @onClick="router.get(route('education.show', '23424fsdf'))"
        />
        <EducationItem
            title="Begini kalau kita tidak menjaga kehamilan"
            @onClick="router.get(route('education.show', '23424fsdf'))"
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
</script>

<style lang="scss" scoped></style>
