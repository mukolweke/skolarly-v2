<script setup>
import { ref } from "vue";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    modelValue: String,
    label: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(["update:modelValue"]);

const passwordVisible = ref(false);

const toggleVisibility = () => {
    passwordVisible.value = !passwordVisible.value;
};

const updateValue = (event) => {
    emit("update:modelValue", event.target.value);
};
</script>

<template>
    <div class="flex flex-col mb-5 relative w-full">
        <label :for="label" class="mb-2 text-sm capitalize">{{ label }}</label>
        <div class="w-full flex items-center">
            <input
                :type="passwordVisible ? 'text' : 'password'"
                :id="label"
                :name="label"
                :value="modelValue"
                @input="updateValue"
                placeholder="********"
                autocomplete="off"
                class="h-12 border border-primary focus:border-secondary w-full rounded-lg px-5 text-sm"
            />

            <div
                class="flex items-center cursor-pointer -mx-10"
                @click="toggleVisibility"
            >
                <component
                    :is="passwordVisible ? EyeSlashIcon : EyeIcon"
                    class="h-5 w-5 text-gray-500"
                />
            </div>
        </div>
    </div>
</template>
