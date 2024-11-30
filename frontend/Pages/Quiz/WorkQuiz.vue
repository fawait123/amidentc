<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle :title="props.quiz.title" @onClick="router.get(route('quiz'))" />
        <SelectionItem :errorMessage="form.errors.answer_id" v-model="form.answer_id"
            v-for="question in props.questions.data" :key="question.id" :title="question.question_text" :options="question.answers.map((item) => {
                return { label: item.answer_text, value: item.id };
            })
                " />
        <div class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-4 flex justify-end">
            <div class="flex gap-4">
                <Button variant="outline" :disabled="props.questions.prev_page_url == null ? true : false
                    " @click="router.visit(props.questions.prev_page_url)">Sebelumnya</Button>
                <Button :disabled="props.questions.next_page_url == null ? true : false
                    " @click="handleNext" v-if="props.questions.next_page_url != null">Selanjutnya</Button>

                <Button @click="handleComplete" v-else>Selesaikan Ujian</Button>
            </div>
        </div>
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import { router } from "@inertiajs/vue3";
import SelectionItem from "./Partials/SelectionItem.vue";
import { Button } from "@/components/ui/button";
import CardTitle from "@/composable/CardTitle.vue";
import { useForm } from "@inertiajs/vue3";

defineOptions({
    layout: WelcomeLayout,
});

const props = defineProps({
    quiz: { type: Object },
    questions: { type: Object },
});

const form = useForm({
    answer_id: null,
    question_id: props.questions.data[0]?.id,
    quiz_id: props.quiz.id,
});

const handleNext = (question) => {
    form.post(route("quiz.post"), {
        onSuccess: () => {
            router.visit(props.questions.next_page_url);
        },
    });
};

const handleComplete = (question) => {
    form.post(route("quiz.post"), {
        onSuccess: () => {
            router.visit(route('quiz'));
        },
    });
};
</script>

<style lang="scss" scoped></style>
