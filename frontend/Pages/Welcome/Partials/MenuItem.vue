<template>
    <div
        class="bg-white w-full md:max-w-[50%] md:min-w-[50%] rounded-2xl p-4 flex flex-col gap-4 justify-center items-center cursor-pointer"
        @click="onClick"
    >
        <h1 class="text-[16px] font-bold">{{ props.title }}</h1>
        <component :is="props.icon" class="text-primary" :size="50" />
    </div>
</template>

<script setup>
const props = defineProps({
    title: { type: String },
    icon: { type: String },
});

const emmit = defineEmits();

const onClick = () => {
    emmit("handleClick");
};
</script>

<style lang="scss" scoped></style>
