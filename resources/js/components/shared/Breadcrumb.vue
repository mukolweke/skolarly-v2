<script setup>
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
            <h1 class="text-lg font-semibold mb-5 uppercase font-karla">{{ name }}</h1>

            <ul class="flex space-x-2">
                <li
                    v-for="(link, index) in links"
                    :key="index"
                    class="flex items-center"
                >
                    <router-link :to="link.to">{{ link.name }}</router-link>
                    <span v-if="index < links.length - 1" class="ml-2 font-karla">-</span>
                </li>
            </ul>
        </div>

        <div v-if="icon">
            <component :is="icon" class="size-16" />
        </div>
    </div>
</template>
