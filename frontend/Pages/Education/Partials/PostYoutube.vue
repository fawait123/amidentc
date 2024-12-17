<script setup>
const props = defineProps({
    src: { type: String }
})

</script>

<template>
    <div class="w-full flex justify-center items-center">
        <iframe width="560" height="315" :src="props.src" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</template>
