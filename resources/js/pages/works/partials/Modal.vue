<template>
	<div
		v-if="isOpen"
		@click="closeModal"
		class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-90"
	>
		<div
			@click.stop
			class="bg-primary-darker p-10 rounded-md w-[600px] h-auto mx-auto"
		>
			<div class="w-full h-[300px] rounded-md overflow-hidden mb-8">
				<img
					:src="imageSrc"
					:alt="title"
					class="w-full h-full object-cover mb-4 grayscale"
				/>
			</div>
			<h4 class="text-white text-2xl mb-8">
				{{ title }}
			</h4>
			<p class="text-gray-400 font-karla mb-8">
				{{ description }}
			</p>

			<router-link
				@click="closeModal"
				to="/contact"
				class="font-bold text-right text-secondary-lighter text-sm tracking-wider leading-loose underline underline-offset-4 flex items-center gap-2"
			>
				<span>Get a quote</span>
				<ArrowRightIcon class="size-5" />
			</router-link>
		</div>
	</div>
</template>

<script setup>
	import { ArrowRightIcon } from '@heroicons/vue/20/solid'

    
	const props = defineProps({
		isOpen: Boolean,
		imageSrc: String,
		title: String,
		description: String,
	})

	const emit = defineEmits(['close'])

	const closeModal = () => {
		emit('close')
	}
</script>
