<template>
    <div class="w-full space-y-4 p-10 md:space-y-8 md:p-20">
        <div class="h-full flex-1 flex-col md:flex bg-primary py-4 px-6 rounded-2xl">
            <div class="flex items-center justify-between space-y-2">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-white">
                        Selamat Datang, di Amidentc!
                    </h2>
                    <p class="text-muted-foreground text-slate-300">
                        Aminah Dental Health Education.
                    </p>
                </div>
                <div class="flex items-center space-x-2">
                    <UserNav />
                </div>
            </div>
            <div class="my-8 w-full">
                <transition name="slide" mode="out-in">
                    <slot />
                </transition>
            </div>
            <div class="flex justify-between mt-20">
                <h1 class="text-white text-[12px]">BY AMINAH</h1>
                <div class="flex items-center gap-4">
                    <Globe class="text-white" :size="12" />
                    <span class="text-white text-[12px]">www.amidentc.com</span>
                </div>
                <div class="flex items-center gap-4">
                    <PhoneCall class="text-white" :size="12" />
                    <span class="text-white text-[12px]">+62 872 7282 2723</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import UserNav from "./Partials/UserNav.vue";
import { Globe, PhoneCall } from "lucide-vue-next";
</script>

<style>
/* Definisikan animasi slide */
.slide-enter-active,
.slide-leave-active {
    transition: transform 0.5s ease;
}

.slide-enter {
    transform: translateX(-100%);
}

.slide-leave-to {
    transform: translateX(100%);
}
</style>
