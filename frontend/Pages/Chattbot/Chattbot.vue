<template>
    <div class="flex items-center justify-center">
        <div
            class="w-full md:min-w-[40%] md:max-w-[40%] bg-white rounded-xl min-h-[70vh] max-h-[70vh] relative p-4"
        >
            <div
                class="absolute top-0 shadow-sm left-0 right-0 px-4 flex justify-between items-center"
            >
                <div class="flex items-center gap-4">
                    <Bot :size="40" class="text-primary" />
                    <span class="font-bold text-muted-foreground"
                        >GEMINI API BOT</span
                    >
                </div>
                <Undo
                    class="text-primary cursor-pointer"
                    @click="router.get(route('welcome'))"
                />
            </div>
            <div
                class="my-10 flex flex-col gap-4 min-h-[53vh] max-h-[53vh] overflow-scroll"
            >
                <ChattItem :left="true" text="Bagaimana menjaga kehamilan ?" />
                <ChattItem
                    :left="false"
                    text="Pastikan mengonsumsi makanan bergizi tinggi, seperti sayuran, buah-buahan, protein, dan karbohidrat kompleks. Hindari makanan yang berlemak tinggi, berminyak, atau terlalu manis."
                />
                <ChattItem :left="true" text="Bagaimana menjaga kehamilan ?" />
                <ChattItem
                    :left="false"
                    text="Pastikan mengonsumsi makanan bergizi tinggi, seperti sayuran, buah-buahan, protein, dan karbohidrat kompleks. Hindari makanan yang berlemak tinggi, berminyak, atau terlalu manis."
                />
                <ChattItem :left="true" text="Bagaimana menjaga kehamilan ?" />
                <ChattItem
                    :left="false"
                    text="Pastikan mengonsumsi makanan bergizi tinggi, seperti sayuran, buah-buahan, protein, dan karbohidrat kompleks. Hindari makanan yang berlemak tinggi, berminyak, atau terlalu manis."
                />
                <ChattItem :left="true" text="Bagaimana menjaga kehamilan ?" />
                <ChattItem
                    :left="false"
                    text="Pastikan mengonsumsi makanan bergizi tinggi, seperti sayuran, buah-buahan, protein, dan karbohidrat kompleks. Hindari makanan yang berlemak tinggi, berminyak, atau terlalu manis."
                />
                <ChattItem :left="true" text="Bagaimana menjaga kehamilan ?" />
                <ChattItem
                    :left="false"
                    text="Pastikan mengonsumsi makanan bergizi tinggi, seperti sayuran, buah-buahan, protein, dan karbohidrat kompleks. Hindari makanan yang berlemak tinggi, berminyak, atau terlalu manis."
                />
            </div>
            <div class="absolute bottom-0 right-0 left-0">
                <div class="flex justify-between items-center gap-3 p-4">
                    <Input
                        placeholder="Masukan pertanyaan anda..."
                        class="flex-grow w-full"
                    />
                    <Button class="flex-shrink">
                        <Send />
                    </Button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { Send, Bot, Undo } from "lucide-vue-next";
import ChattItem from "./Partials/ChattItem.vue";
import { router } from "@inertiajs/vue3";

defineOptions({
    layout: WelcomeLayout,
});
</script>

<style lang="scss" scoped></style>
