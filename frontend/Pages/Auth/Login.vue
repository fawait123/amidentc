<template>
    <div class="flex flex-col items-center justify-center">
        <LogoComponent />
        <div
            class="w-full md:max-w-[30%] md:min-w-[30%] grid grid-cols-1 gap-4"
        >
            <div class="grid grid-cols-1 gap-2">
                <Label for="nama" class="text-white">Nama</Label>
                <Input placeholder="Masukan nama anda" id="nama" />
            </div>
            <Button
                @click="router.get(route('welcome'))"
                variant="outline"
                class="w-full text-primary hover:text-primary"
            >
                MASUK
                <ScanFace />
            </Button>
        </div>
    </div>
</template>

<script setup>
import AuthLayout from "@/layouts/AuthLayout.vue";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { ScanFace } from "lucide-vue-next";
import { Button } from "@/components/ui/button";
import LogoComponent from "@/composable/LogoComponent.vue";
import { router } from "@inertiajs/vue3";

defineOptions({
    layout: AuthLayout,
});
</script>

<style lang="scss" scoped></style>
