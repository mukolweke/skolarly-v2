<script setup>
const props = defineProps({
    modelValue: String,
    label: {
        type: String,
        required: true,
    },
    helpText: {
        type: String,
        default: "",
    },
    error: {
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
        <div class="w-full">
            <textarea
                type="text"
                :id="label"
                :name="label"
                :value="modelValue"
                @input="updateValue"
                :placeholder="label"
                autocomplete="off"
                rows="6"
                class="border resize-none border-primary focus:border-secondary w-full rounded-lg p-5 text-sm placeholder:capitalize"
            ></textarea>
            <p v-if="helpText" class="text-xs mt-px text-gray-500 font-karla font-medium">{{ helpText }}</p>
            <p v-if="error" class="text-xs mt-px text-red-500 font-karla font-medium">{{ error }}</p>
        </div>
    </div>
</template>
