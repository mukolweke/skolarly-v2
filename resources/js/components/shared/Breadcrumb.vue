<script setup>
import { defineProps } from "vue";

const props = defineProps({
    name: String,
    links: {
        type: Array,
        required: true,
        default: () => [],
    },
    icon: {
        type: Function,
        required: false,
        default: null,
    },
});
</script>

<template>
    <div
        class="bg-primary bg-opacity-10 rounded-lg p-5 px-10 flex justify-between items-center"
    >
        <div>
            <h1 class="text-xl font-medium mb-5">{{ name }}</h1>

            <ul class="flex space-x-2">
                <li
                    v-for="(link, index) in links"
                    :key="index"
                    class="flex items-center"
                >
                    <router-link :to="link.to">{{ link.name }}</router-link>
                    <span v-if="index < links.length - 1" class="mx-2">.</span>
                </li>
            </ul>
        </div>

        <div v-if="icon">
            <component :is="icon" class="size-16" />
        </div>
    </div>
</template>
