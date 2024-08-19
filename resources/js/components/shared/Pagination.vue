<template>
    <div class="flex gap-5 items-center mt-10 max-w-sm mx-auto">
        <div
            @click="$emit('prev-click')"
            class="hover:bg-secondary hover:bg-opacity-10 p-3 cursor-pointer flex items-center justify-center rounded-full"
        >
            <ChevronLeftIcon class="size-4" />
        </div>

        <ul class="flex items-center gap-5">
            <li
                v-for="page in pages"
                :key="page"
                @click="$emit('page-click', page)"
                :class="[
                    'text-sm flex items-center justify-center p-2 rounded-full px-4 cursor-pointer transition-all',
                    page === currentPage ? 'bg-secondary text-white' : 'hover:bg-secondary hover:bg-opacity-10'
                ]"
            >
                {{ page }}
            </li>
        </ul>

        <div
            @click="$emit('next-click')"
            class="hover:bg-secondary hover:bg-opacity-10 p-3 cursor-pointer flex items-center justify-center rounded-full"
        >
            <ChevronRightIcon class="size-4" />
        </div>
    </div>
</template>

<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/vue/24/outline";

defineProps({
    pages: {
        type: Array,
        required: true,
    },
    currentPage: {
        type: Number,
        required: true,
    },
});

// const emit = defineEmits(['page-click', 'prev-click', 'next-click']);
</script>
