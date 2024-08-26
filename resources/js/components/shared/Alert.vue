<template>
    <transition name="fade">
        <div
            v-if="visible"
            :class="alertClass"
            class="absolute right-5 top-5 p-4 rounded-md w-[400px]"
        >
            <div class="w-[400px]">
                <div class="flex items-center justify-between mb-2">
                    <h5
                        class="font-medium capitalize text-base flex items-center gap-2"
                    >
                        <component :is="icon" class="size-5" />
                        {{ props.type }}
                    </h5>
                    <button @click="close" class="font-light">
                        <XMarkIcon class="size-5" />
                    </button>
                </div>
                <div>
                    <span>{{ message }}</span>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { ref, computed } from "vue";
import {
    XMarkIcon,
    InformationCircleIcon,
    ExclamationTriangleIcon,
    ShieldExclamationIcon,
} from "@heroicons/vue/24/outline";

const props = defineProps({
    type: {
        type: String,
        required: true,
        validator: (value) => ["success", "warning", "danger"].includes(value),
    },
    message: {
        type: String,
        required: true,
    },
});

const visible = ref(true);

const alertClass = computed(() => {
    const baseClasses = "w-full text-sm";
    switch (props.type) {
        case "success":
            return `${baseClasses} bg-green-100 text-green-700 border border-green-400`;
        case "warning":
            return `${baseClasses} bg-yellow-100 text-yellow-700 border border-yellow-400`;
        case "danger":
            return `${baseClasses} bg-red-100 text-red-700 border border-red-400`;
        default:
            return "";
    }
});

const icon = computed(() => {
    switch (props.type) {
        case "success":
            return InformationCircleIcon;
        case "warning":
            return ExclamationTriangleIcon;
        case "danger":
            return ShieldExclamationIcon;
        default:
            return "";
    }
});

const close = () => {
    visible.value = false;
};
</script>

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
