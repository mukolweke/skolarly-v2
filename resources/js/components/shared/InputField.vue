<script setup>
const props = defineProps({
    modelValue: String,
    label: {
        type: String,
        required: true,
    },
    inputType: {
        type: String,
        default: 'text',
    },
    helpText: {
        type: String,
        default: "",
    }
});

const emit = defineEmits(["update:modelValue"]);

const updateValue = (event) => {
    emit("update:modelValue", event.target.value);
};
</script>

<template>
    <div class="flex flex-col mb-5 relative w-full">
        <label :for="label" class="mb-2 text-sm capitalize">{{ label }}</label>
        <div class="w-full flex items-center">
            <input
                :type="inputType"
                :id="label"
                :name="label"
                :value="modelValue"
                @input="updateValue"
                :placeholder="label"
                autocomplete="off"
                class="h-12 border border-primary focus:border-secondary w-full rounded-lg px-5 text-sm placeholder:capitalize"
            />
        </div>
        <p v-if="helpText" class="text-xs mt-px text-gray-500 font-karla font-medium">{{ helpText }}</p>
    </div>
</template>
