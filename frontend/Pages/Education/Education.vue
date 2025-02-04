<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle title="Amidentc (Aminah Dental Health Education)" @onClick="router.get(route('welcome'))" />
        <div class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-4 cursor-pointer flex justify-between items-center"
            @click="gotoDetail(education.title)" v-for="education in educationData" :key="education.title">
            <span class="font-bold text-[12px] md:text-[18px] text-muted-foreground uppercase">{{ education.title
                }}</span>
            <component :is="education.icon" class="text-primary" />
        </div>
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import CardTitle from "@/composable/CardTitle.vue";
import { router } from "@inertiajs/vue3";
import { educationData } from "@/constant/education";

defineOptions({
    layout: WelcomeLayout,
});

const props = defineProps({
    educations: { type: Array },
});

const gotoDetail = (title) => {
    router.get(route('education.show', { education: title.toLowerCase() })); // Replace with actual route
}
</script>

<style lang="scss" scoped></style>
