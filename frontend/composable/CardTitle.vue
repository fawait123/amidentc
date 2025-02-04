<template>
    <div class="w-full xl:min-w-[50%] xl:max-w-[50%] bg-white rounded-xl p-4">
        <div class="flex justify-center gap-4 items-center">
            <h1 class="text-sm md:text-[24px] text-muted-foreground font-bold first-letter:uppercase">
                {{ capitalizeFirstLetterOfEachWord(props.title) }}
            </h1>
            <Undo class="text-primary cursor-pointer w-[30px]" @click="handleClick" />
        </div>
    </div>
</template>

<script setup>
import { capitalizeFirstLetterOfEachWord } from "@/lib/utils";
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
