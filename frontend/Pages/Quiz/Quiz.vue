<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle title="Quiz" @onClick="router.get(route('welcome'))" />
        <QuizItem v-for="quiz in props.quizes" :key="quiz.id" :title="quiz.title"
            :score="(quiz.total / quiz.total_question * 100).toFixed(2)" :is-complete="quiz.total_submit > 0"
            @onClick="router.get(route('quiz.work', quiz.id))" />
        <QuizLink :title="quiz.title" v-for="quiz in quizData" :key="quiz.title" @onClick="openNewTab(quiz.link)" />
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import { router } from "@inertiajs/vue3";
import QuizItem from "./Partials/QuizItem.vue";
import QuizLink from "./Partials/QuizLink.vue";
import CardTitle from "@/composable/CardTitle.vue";
import { quizData } from "@/constant/quiz";

defineOptions({
    layout: WelcomeLayout,
});

const openNewTab = (link) => {
    window.open(link, "_blank");
};

const props = defineProps({
    quizes: { type: Array },
});
</script>

<style lang="scss" scoped></style>
