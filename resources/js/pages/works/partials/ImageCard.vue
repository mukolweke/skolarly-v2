<template>
	<div
		class="h-full w-full overflow-hidden transition-all transform hover:-translate-y-4 cursor-pointer rounded-md"
		@click="openModal"
	>
		<img
			:src="imageSrc"
			class="h-full w-full object-cover grayscale hover:grayscale-0 transition-all"
			:alt="altText"
		/>
	</div>
</template>

<script setup>
	const props = defineProps({
		imageSrc: String,
		altText: String,
		description: String,
		title: String,
	})

	const emit = defineEmits(['open-modal'])

	const openModal = () => {
		emit('open-modal', {
			imageSrc: props.imageSrc,
			title: props.title,
			description: props.description,
		})
	}
</script>
