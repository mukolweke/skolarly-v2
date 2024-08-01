<script setup>
	import { ref, watch } from 'vue'
	import { defineAsyncComponent } from 'vue'
	import { ArrowRightIcon } from '@heroicons/vue/20/solid'

	const BannerIntro = defineAsyncComponent(() =>
		import('../../components/banner/Intro.vue')
	)
	const ImageWrapper = defineAsyncComponent(() =>
		import('./partials/ImageCard.vue')
	)
	const Modal = defineAsyncComponent(() => import('./partials/Modal.vue'))

	const modalOpen = ref(false)
	const modalImageSrc = ref('')
	const modalDescription = ref('')
	const modalTitle = ref('')

	const openModal = ({ imageSrc, title, description }) => {
		modalImageSrc.value = imageSrc
		modalDescription.value = description
		modalTitle.value = title
		modalOpen.value = true
	}

	watch(modalOpen, (newValue) =>
		document.body.classList.toggle('overflow-hidden', newValue)
	)

	const closeModal = () => {
		modalOpen.value = false
	}
</script>

<template>
	<!-- banner intro -->
	<BannerIntro title="Works." />

	<section class="bg-primary-darker">
		<div class="lx-container pt-10 md:pt-20 lg:pt-32">
			<div
				class="flex flex-col items-center gap-8 h-full md:h-[500px] md:flex-row"
			>
				<ImageWrapper
					image-src="https://images.pexels.com/photos/261621/pexels-photo-261621.jpeg?auto=compress&cs=tinysrgb&w=600"
					alt-text="Image 1"
					title="Work Title 1"
					description="This is a description for image 1."
					@open-modal="openModal"
				/>
				<div
					class="flex flex-col gap-8 w-full h-full md:w-[40%] lg:w-[30%]"
				>
					<ImageWrapper
						image-src="https://images.pexels.com/photos/1765033/pexels-photo-1765033.jpeg?auto=compress&cs=tinysrgb&w=600"
						alt-text="Image 2"
						title="Work Title 2"
						description="This is a description for image 2."
						@open-modal="openModal"
					/>
					<ImageWrapper
						image-src="https://images.pexels.com/photos/955389/pexels-photo-955389.jpeg?auto=compress&cs=tinysrgb&w=600"
						alt-text="Image 3"
						title="Work Title 3"
						description="This is a description for image 3."
						@open-modal="openModal"
					/>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-primary-darker">
		<div class="lx-container py-10 md:py-20">
			<div
				class="flex flex-col items-center gap-8 h-full md:h-[250px] md:flex-row"
			>
				<ImageWrapper
					image-src="https://images.pexels.com/photos/259006/pexels-photo-259006.jpeg?auto=compress&cs=tinysrgb&w=600"
					alt-text="Image 4"
					title="Work Title 4"
					description="This is a description for image 4."
					@open-modal="openModal"
				/>
				<ImageWrapper
					image-src="https://images.pexels.com/photos/261621/pexels-photo-261621.jpeg?auto=compress&cs=tinysrgb&w=600"
					alt-text="Image 5"
					title="Work Title 5"
					description="This is a description for image 5."
					@open-modal="openModal"
				/>
				<ImageWrapper
					image-src="https://images.pexels.com/photos/955389/pexels-photo-955389.jpeg?auto=compress&cs=tinysrgb&w=600"
					alt-text="Image 6"
					title="Work Title 6"
					description="This is a description for image 6."
					@open-modal="openModal"
				/>
			</div>
		</div>
	</section>

	<section class="bg-primary-darker">
		<div class="lx-container pb-10 md:pb-20 lg:pb-32">
			<div
				class="flex flex-col items-center gap-8 h-full md:h-[500px] md:flex-row"
			>
				<div
					class="flex flex-col gap-8 w-full h-full md:w-[40%] lg:w-[30%]"
				>
					<ImageWrapper
						image-src="https://images.pexels.com/photos/955389/pexels-photo-955389.jpeg?auto=compress&cs=tinysrgb&w=600"
						alt-text="Image 7"
						title="Work Title 7"
						description="This is a description for image 7."
						@open-modal="openModal"
					/>
					<ImageWrapper
						image-src="https://images.pexels.com/photos/1765033/pexels-photo-1765033.jpeg?auto=compress&cs=tinysrgb&w=600"
						alt-text="Image 8"
						title="Work Title 8"
						description="This is a description for image 8."
						@open-modal="openModal"
					/>
				</div>
				<ImageWrapper
					image-src="https://images.pexels.com/photos/259006/pexels-photo-259006.jpeg?auto=compress&cs=tinysrgb&w=600"
					alt-text="Image 9"
					title="Work Title 9"
					description="This is a description for image 9."
					@open-modal="openModal"
				/>
			</div>
		</div>
	</section>

	<section class="bg-primary-darker flex items-center justify-center pb-10">
		<router-link
			to="/contact"
			class="font-bold text-secondary text-xl tracking-wider leading-loose underline underline-offset-4 flex items-center gap-2"
		>
			<span>Get a quote</span>
			<ArrowRightIcon class="size-8" />
		</router-link>
	</section>

	<Modal
		:isOpen="modalOpen"
		:imageSrc="modalImageSrc"
		:description="modalDescription"
		:title="modalTitle"
		@close="closeModal"
	/>
</template>
