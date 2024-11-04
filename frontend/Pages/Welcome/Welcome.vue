<template>
    <div class="flex flex-col items-center gap-4">
        <MenuItem
            title="EDUKASI"
            :icon="Stethoscope"
            @handleClick="router.get(route('education'))"
        />
        <MenuItem
            title="QUIZ"
            :icon="MessageCircleQuestion"
            @handleClick="router.get(route('quiz'))"
        />
        <MenuItem
            title="CHATT BOT"
            :icon="BotIcon"
            @handleClick="router.get(route('chattbot'))"
        />
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import { BotIcon, MessageCircleQuestion, Stethoscope } from "lucide-vue-next";
import MenuItem from "./Partials/MenuItem.vue";
import { router } from "@inertiajs/vue3";

defineOptions({
    layout: WelcomeLayout,
});
</script>

<style lang="scss" scoped></style>
