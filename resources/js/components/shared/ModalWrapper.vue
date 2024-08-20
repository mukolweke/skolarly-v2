<script setup>
import { defineAsyncComponent, ref, watch } from "vue";

const ButtonView = defineAsyncComponent(() => import("./Button.vue"));

const props = defineProps({
    title: String,
    showModal: Boolean,
    hideCancel: Boolean,
    confirmLabel: {
        type: String,
        default: "Confirm",
    }
});

const emit = defineEmits(["cancel", "confirm"]);
</script>

<template>
    <transition name="fade">
        <div
            v-if="showModal"
            class="absolute inset-0 bg-black bg-opacity-25 flex items-center justify-center"
        >
            <section class="bg-white w-auto p-5 rounded-lg">
                <h1 class="font-karla font-medium uppercase">
                    {{ title }}
                </h1>

                <section class="py-5">
                    <slot />
                </section>

                <section class="flex justify-end gap-5">
                    <button-view
                        @click="emit('cancel')"
                        :class="{ hidden: hideCancel }"
                        class="bg-transparent !text-primary hover:bg-primary hover:!bg-opacity-10"
                        label="Cancel"
                    />
                    <button-view
                        @click="emit('confirm')"
                        :danger="confirmLabel === 'delete'"
                        :label="confirmLabel"
                    />
                </section>
            </section>
        </div>
    </transition>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
}
.fade-enter-to, .fade-leave-from {
    opacity: 1;
}
</style>
