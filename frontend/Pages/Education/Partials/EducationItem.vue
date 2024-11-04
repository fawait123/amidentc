<template>
    <div
        class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-4 flex items-center justify-between"
    >
        <div class="flex items-center gap-4">
            <Stethoscope class="text-primary" />
            <span class="font-semibold text-[14px]">{{ props.title }}</span>
        </div>
        <PlayCircle class="text-primary cursor-pointer" @click="onClick" />
    </div>
</template>

<script setup>
import { Stethoscope, PlayCircle } from "lucide-vue-next";

const props = defineProps({
    title: { type: String },
});

const emmit = defineEmits();

const onClick = () => {
    emmit("onClick");
};
</script>

<style lang="scss" scoped></style>
