<script setup>
	import { defineAsyncComponent } from 'vue'

	const BannerIntro = defineAsyncComponent(() =>
		import('../../components/banner/Intro.vue')
	)

	const Socials = defineAsyncComponent(() => import('../../components/layout/Socials.vue'))
</script>

<template>
	<!-- banner intro -->
	<BannerIntro title="Contact." />

	<section class="bg-primary-darker">
		<div class="lx-container py-20">
			<div
				class="flex items-center justify-between flex-col md:flex-row gap-10"
			>
				<div
					class="w-full md:w-1/3 p-20 bg-primary px-5 lg:px-10 rounded-md"
				>
					<h2
						class="text-white text-2xl md:text-base lg:text-2xl text-center mb-4 font-karla"
					>
						+254-722-000000
					</h2>
					<p class="text-center text-gray-400 text-sm font-karla">
						Monday - Saturday from 7am - 5pm
					</p>
				</div>

				<div
					class="w-full md:w-1/3 p-20 bg-primary px-5 lg:px-10 rounded-md"
				>
					<h2
						class="text-white text-2xl md:text-base lg:text-2xl text-center mb-4 font-karla"
					>
						Nairobi, Kenya
					</h2>
					<p class="text-center text-gray-400 text-sm font-karla">
						Rosemaed, UK 91117
					</p>
				</div>

				<div
					class="w-full md:w-1/3 p-20 bg-primary px-5 lg:px-10 rounded-md"
				>
					<h2
						class="text-white text-2xl md:text-base lg:text-2xl text-center mb-4 font-karla"
					>
						contact@domain.com
					</h2>
					<p class="text-center text-gray-400 text-sm font-karla">
						Contact me every time!
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-secondary bg-opacity-90">
		<div class="lx-container py-20">
			<div class="flex items-start justify-center flex-col md:flex-row gap-10">
				<div class="w-full">
					<h4 class="text-3xl text-primary-lighter mb-1">
						Get in touch
					</h4>

					<div class="block bg-primary-lighter w-20 h-1 mb-10"></div>

					<form action="" method="post">
						<div class="flex flex-col mb-10">
							<label
								class="text-primary-lighter font-bold text-xl mb-2"
								for="clientName"
								>What's your name?</label
							>
							<input
								type="text"
								id="clientName"
								name="clientName"
								class="py-2 bg-transparent transition-all outline-none border-b border-primary text-xl text-primary-lighter"
								autocomplete="off"
							/>
						</div>
						<div class="flex flex-col mb-10">
							<label
								class="text-primary-lighter font-bold text-xl mb-2"
								for="clientEmail"
								>Your fancy email</label
							>
							<input
								type="text"
								id="clientEmail"
								name="clientEmail"
								class="py-2 bg-transparent transition-all outline-none border-b border-primary text-xl text-primary-lighter"
								autocomplete="off"
							/>
						</div>
						<div class="flex flex-col mb-10">
							<label
								class="text-primary-lighter font-bold text-xl mb-2"
								for="message"
								>Tell me about your project</label
							>
							<textarea
								type="text"
								id="message"
								rows="8"
								cols="50"
								maxlength="200"
								class="bg-transparent transition-all outline-none border-b border-primary text-xl text-primary-lighter resize-none"
							></textarea>
						</div>

						<div class="flex mt-10">
							<button
								type="submit"
								class="bg-primary-lighter p-4 rounded-md w-full text-center text-white text-xl"
							>
								Send Message
							</button>
						</div>
					</form>
				</div>

				<div class="w-full md:w-1/3">

          	<Socials />

        </div>
			</div>
		</div>
	</section>
</template>
