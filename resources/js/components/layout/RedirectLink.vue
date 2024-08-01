<script setup>
import { ArrowRightIcon } from '@heroicons/vue/20/solid';

defineProps({
    title: String,
    href: String
})
</script>

<template>
	<router-link
		:to="href"
		class="font-bold text-secondary-lighter text-xl tracking-wider leading-loose underline underline-offset-4 flex items-center gap-2"
	>
		<span>{{ title }}</span>
		<ArrowRightIcon class="size-8 animate-pulse" />
	</router-link>
</template>
