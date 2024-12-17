<template>
    <div class="flex flex-col items-center gap-4 relative">
        <MenuItem title="EDUKASI" :icon="TootIcon" @handleClick="router.get(route('education'))" />
        <MenuItem title="QUIZ" :icon="MessageCircleQuestion" @handleClick="router.get(route('quiz'))" />
        <MenuItem title="CHATT BOT" :icon="BotIcon" @handleClick="router.get(route('chattbot'))" />
        <img src="/public/assets/images/Picture1.png" class="w-[100px] md:w-[200px] absolute left-0 bottom-0"
            alt="Image 1">
        <img src="/public/assets/images/Picture2.png" class="w-[100px] md:w-[200px] absolute right-0 top-0"
            alt="Image 1">
        <img src="/public/assets/images/Picture3.png"
            class="w-[100px] md:w-[200px] absolute right-0 md:right-[20%] top-[40%] md:top-1/4" alt="Image 1">
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import { BotIcon, MessageCircleQuestion } from "lucide-vue-next";
import MenuItem from "./Partials/MenuItem.vue";
import { router } from "@inertiajs/vue3";
import TootIcon from "./Partials/TootIcon.vue";

defineOptions({
    layout: WelcomeLayout,
});
</script>

<style lang="scss" scoped></style>
