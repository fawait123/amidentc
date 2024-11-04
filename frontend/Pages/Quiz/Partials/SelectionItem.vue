<template>
    <div class="w-full md:min-w-[50%] md:max-w-[50%] bg-white rounded-xl p-4">
        <Label class="text-[12px]">{{ props.title }}</Label>
        <RadioGroup class="mt-4">
            <div class="grid grid-cols-2 gap-2">
                <div
                    class="flex items-center space-x-2"
                    v-for="option in props.options"
                    :key="option.key"
                >
                    <RadioGroupItem
                        :id="option.value"
                        :value="option.value"
                        v-model="model"
                    />
                    <Label :for="option.value" class="text-[12px]">{{
                        option.label
                    }}</Label>
                </div>
            </div>
        </RadioGroup>
    </div>
</template>

<script setup>
import RadioGroupItem from "@/components/ui/radio-group/RadioGroupItem.vue";
import RadioGroup from "@/components/ui/radio-group/RadioGroup.vue";
const model = defineModel();
const props = defineProps({
    title: { type: String },
    options: { type: [] },
});
</script>

<style lang="scss" scoped></style>
