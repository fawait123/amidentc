<template>
    <div class="flex flex-col items-center justify-center">
        <LogoComponent />
        <div class="w-full md:max-w-[30%] md:min-w-[30%] grid grid-cols-1 gap-4">
            <div class="grid grid-cols-1 gap-2">
                <Label for="nama" class="text-white">Nama</Label>
                <Input placeholder="Masukan nama anda" id="nama" v-model="form.name" />
                <span class="text-sm text-red-500">{{ form.errors.name }}</span>
            </div>
            <Button @click="handleLogin" variant="outline" class="w-full text-primary hover:text-primary">
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
import { router, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
});

defineOptions({
    layout: AuthLayout,
});

const handleLogin = () => {
    form.post(route("frontend.login.post"), {
        onSuccess: () => {
            router.get(route("welcome"));
        },
    });
};
</script>

<style lang="scss" scoped></style>
