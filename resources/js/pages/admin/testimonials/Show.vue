<script setup>
defineProps({
    testimonial: Object
})
</script>

<template>
    <div class="overflow-x-auto w-[1000px]">
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Id
            </div>
            <div class="px-4 py-2">
                {{ testimonial.id }}
            </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Title
            </div>
            <div class="px-4 py-2">
                {{ testimonial.name }}
            </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Slug
            </div>
            <div class="px-4 py-2">
                {{ testimonial.content }}
            </div>
        </div>
    </div>
</template>
