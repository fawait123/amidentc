<template>
    <div class="w-full xl:min-w-[50%] xl:max-w-[50%] bg-white rounded-xl p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-[24px] text-muted-foreground font-bold">
                {{ props.title }}
            </h1>
            <Undo class="text-primary cursor-pointer" @click="handleClick" />
        </div>
    </div>
</template>

<script setup>
import { Undo } from "lucide-vue-next";
const emmit = defineEmits();
const props = defineProps({
    title: { type: String },
});

const handleClick = () => {
    emmit("onClick");
};
</script>

<style lang="scss" scoped></style>
