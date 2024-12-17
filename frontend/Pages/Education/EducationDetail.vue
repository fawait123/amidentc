<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle :title="props.education" @onClick="router.get(route('education'))" />
        <PostCarousel />
        <div class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-0 md:p-4 text-justify text-[12px]">
            <component :is="component" :src="src" />
        </div>
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import CardTitle from "@/composable/CardTitle.vue";
import { router } from "@inertiajs/vue3";
import { educationData } from "@/constant/education";
import { computed } from "vue";
import NotFound from "./Partials/NotFound.vue"
import PostCarousel from "./Partials/PostCarousel.vue";
import { ref } from "vue";


defineOptions({
    layout: WelcomeLayout,
});

const props = defineProps({
    education: { type: String, }
})
const src = ref(null)

const component = computed(() => {
    const find = educationData.find((el) => el.title.toLowerCase() == props.education.toLowerCase())
    if (find) {
        if (find.src) {
            src.value = find.src
        }
        return find.component
    }

    return NotFound
})

</script>

<style lang="scss" scoped></style>
