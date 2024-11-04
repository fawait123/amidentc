<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle title="Quiz" @onClick="router.get(route('welcome'))" />
        <QuizItem
            v-for="quiz in props.quizes"
            :key="quiz.id"
            :title="quiz.title"
            :score="90"
            :is-complete="true"
            @onClick="router.get(route('quiz.work', quiz.id))"
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

const props = defineProps({
    quizes: { type: Array },
});
</script>

<style lang="scss" scoped></style>
