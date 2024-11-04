<template>
    <div class="w-full space-y-4 p-10 md:space-y-8 md:p-20">
        <div
            class="h-full flex-1 flex-col md:flex bg-primary py-4 px-6 rounded-2xl"
        >
            <div>
                <h1 class="text-white font-semibold my-10">Hello!</h1>
                <div class="flex flex-col my-10">
                    <h1 class="text-[30px] text-white font-bold inline">
                        Amidentc
                    </h1>
                    <span class="text-[12px] text-white"
                        >Aminah Dental Health Education</span
                    >
                </div>
            </div>
            <div class="my-8 w-full">
                <transition name="fade">
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
                    <span class="text-white text-[12px]"
                        >+62 872 7282 2723</span
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import UserNav from "./Partials/UserNav.vue";
import { Globe, PhoneCall } from "lucide-vue-next";
</script>

<style lang="scss" scoped></style>
