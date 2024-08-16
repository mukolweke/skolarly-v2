<script setup>

defineProps({
    label: String,
})
</script>

<template>
    <button
        class="bg-primary hover:bg-opacity-80 transition-all text-white w-1/2 p-2.5 rounded-lg"
    >
        {{ label }}
    </button>
</template>
