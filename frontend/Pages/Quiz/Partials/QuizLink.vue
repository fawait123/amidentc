<template>
    <div class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-2 flex justify-between items-center">
        <span class="text-sm font-semibold text-muted-foreground">{{
            props.title
            }}</span>
        <span class="text-sm font-semibold text-muted-foreground">Quiz Fun Dental Education</span>
        <ArrowRight :size="12" class="cursor-pointer text-primary font-bold" @click="onClick" />
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
