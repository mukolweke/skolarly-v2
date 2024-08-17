<script setup>
import { defineAsyncComponent } from "vue";

const ButtonView = defineAsyncComponent(() => import("./Button.vue"));

defineProps({
    title: String,
    showModal: Boolean,
    confirmLabel: {
        type: String,
        default: "Confirm",
    }
});

const emit = defineEmits(["cancel", "confirm"]);
</script>

<template>
    <div
        v-if="showModal"
        class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center"
    >
        <section class="bg-white max-w-4xl w-full p-5 rounded-lg">
            <h1 class="font-karla font-medium uppercase">
                {{ title }}
            </h1>

            <section class="py-5">
                <slot />
            </section>

            <section class="flex gap-5">
                <button-view
                    @click="emit('cancel')"
                    class="bg-transparent !text-primary hover:bg-primary hover:!bg-opacity-10"
                    label="Cancel"
                />
                <button-view @click="emit('confirm')" :label="confirmLabel" />
            </section>
        </section>
    </div>
</template>
