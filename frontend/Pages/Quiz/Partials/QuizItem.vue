<template>
    <div class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-2 flex justify-between items-center">
        <span class="text-sm font-semibold text-muted-foreground">{{
            props.title
        }}</span>
        <span class="text-sm">Score {{ props.score }}/100</span>
        <span :class="[
            'text-sm px-1 text-white rounded-md',
            props.isComplete
                ? 'bg-blue-200 text-blue-600'
                : 'bg-red-200 text-red-600',
        ]">{{ props.isComplete ? "Selesai" : "Belum Mengikuti" }}</span>
        <ArrowRight v-show="!props.isComplete" :size="12" class="cursor-pointer text-primary font-bold"
            @click="onClick" />
    </div>
</template>

<script setup>
import { ArrowRight } from "lucide-vue-next";

const props = defineProps({
    title: { type: String },
    score: { type: Number },
    isComplete: { type: Boolean },
});

const emmit = defineEmits();

const onClick = () => {
    emmit("onClick");
};
</script>

<style lang="scss" scoped></style>
