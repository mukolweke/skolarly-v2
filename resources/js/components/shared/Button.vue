<script setup>

defineProps({
    label: String,
    danger: Boolean,
})
</script>

<template>
    <button
        :class="{'bg-red-500': danger, 'bg-primary': !danger}"
        class="text-white font-karla hover:bg-opacity-80 transition-all p-2.5 px-5 rounded-lg capitalize"
    >
        {{ label }}
    </button>
</template>
