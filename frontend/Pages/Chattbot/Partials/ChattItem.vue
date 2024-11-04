<template>
    <div :class="['flex', props.left ? 'justify-start' : 'justify-end']">
        <div
            :class="[
                'max-w-[60%] min-w-[60%] p-2 rounded-xl text-[12px]',
                props.left
                    ? 'bg-primary text-white'
                    : 'bg-slate-300 text-black',
            ]"
        >
            {{ props.text }}
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    text: { type: String },
    left: { type: Boolean },
});
</script>

<style lang="scss" scoped></style>
