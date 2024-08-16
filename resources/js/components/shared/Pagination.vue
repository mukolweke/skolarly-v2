<template>
    <div class="flex gap-5 items-center mt-10 max-w-sm mx-auto">
        <div
            class="hover:bg-secondary hover:bg-opacity-10 p-3 cursor-pointer flex items-center justify-center rounded-full"
        >
            <chevron-left-icon class="size-4" />
        </div>
        <div>
            <ul class="flex items-center gap-5">
                <li
                    v-for="page in pages"
                    :key="page"
                    @click="$emit('page-click', page)"
                    :class="{
                        'text-sm flex items-center justify-center p-2 rounded-full bg-secondary text-white px-4':
                            page === currentPage,
                        'text-sm flex items-center justify-center p-2 rounded-full px-4 hover:bg-secondary hover:bg-opacity-10 transition-all cursor-pointer':
                            page !== currentPage,
                    }"
                >
                    {{ page }}
                </li>
            </ul>
        </div>
        <div
            class="hover:bg-secondary hover:bg-opacity-10 p-3 cursor-pointer flex items-center justify-center rounded-full"
        >
            <chevron-right-icon class="size-4" />
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
</script>
