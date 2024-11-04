<template>
    <div class="flex justify-center items-center flex-col gap-4">
        <CardTitle
            title="Menjaga kehamilan yang baik"
            @onClick="router.get(route('education'))"
        />
        <div
            class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-4 text-justify text-[12px]"
        >
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga maxime
            recusandae maiores excepturi illum facilis doloremque. Quia in hic
            dolores excepturi aliquam reiciendis neque deserunt nihil eligendi
            repudiandae, atque delectus at! Eum corrupti rem officiis voluptatem
            necessitatibus quod voluptatum molestias id quis. Ipsam beatae illo
            alias explicabo reprehenderit dignissimos. Omnis eius fuga
            temporibus, ipsum excepturi ipsam quos architecto modi sapiente
            suscipit tenetur aliquid recusandae voluptates ad aperiam impedit
            non optio repudiandae perferendis laboriosam tempore! Inventore
            repellat quibusdam praesentium, amet debitis, quasi enim sit,
            architecto delectus aut libero voluptatem consequuntur reprehenderit
            iste! Rem quam sit, voluptatem unde dolore suscipit optio! Maiores?
        </div>
    </div>
</template>

<script setup>
import WelcomeLayout from "@/layouts/WelcomeLayout.vue";
import CardTitle from "@/composable/CardTitle.vue";
import { router } from "@inertiajs/vue3";

defineOptions({
    layout: WelcomeLayout,
});
</script>

<style lang="scss" scoped></style>
