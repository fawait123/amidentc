<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle title="Quiz" @onClick="router.get(route('welcome'))" />
        <QuizItem
            title="Kesehatan ibu hamil"
            :score="90"
            :is-complete="true"
            @onClick="router.get(route('quiz.work', 'sadfasf'))"
        />
        <QuizItem
            title="Menjaga kandungan"
            :score="0"
            :is-complete="false"
            @onClick="router.get(route('quiz.work', 'sadfasf'))"
        />
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import { router } from "@inertiajs/vue3";
import QuizItem from "./Partials/QuizItem.vue";
import CardTitle from "@/composable/CardTitle.vue";

defineOptions({
    layout: WelcomeLayout,
});
</script>

<style lang="scss" scoped></style>
