<script setup>
	import { MapPinIcon, EnvelopeIcon, PhoneIcon } from '@heroicons/vue/20/solid'
	import { defineAsyncComponent, onMounted, ref } from 'vue'
	const logo = new URL('@/assets/images/logo.png', import.meta.url).href

	const currentYear = ref(new Date().getFullYear())

	onMounted(() => {
		const year = new Date().getFullYear()
		currentYear.value = year
	})

	const Socials = defineAsyncComponent(() => import('./Socials.vue'))

	const routes = ref([
		{ path: '/', name: 'Home' },
		{ path: '/services', name: 'Services' },
		{ path: '/works', name: 'Works' },
		{ path: '/blogs', name: 'Blogs' },
		{ path: '/contact', name: 'Contact' },
	])
</script>

<template>
	<footer class="">
		<div class="lx-container p-10 md:pt-20">
			<div class="text-center py-10">
				<div class="flex items-start flex-col lg:flex-row justify-between gap-8">
					<div class="w-full lg:w-1/3">
						<div class="w-48 mb-10 mx-auto lg:mx-0">
							<img :src="logo" alt="Skolarly" />
						</div>

						<ul
							class="flex flex-wrap justify-center items-center gap-4"
						>
							<li
								v-for="(link, index) in routes"
								:key="link.name"
								class="flex items-center gap-4"
							>
								<router-link :to="link.path" class="nav-link">
									<p
										class="flex items-center gap-4 md:flex-col md:gap-px"
									>
										<span
											class="text-gray-300 text-sm block hover:text-secondary transition-all mt-px"
										>
											{{ link.name }}
										</span>
									</p>
								</router-link>
								<span
									v-if="index != routes.length - 1"
									class="hidden md:block text-secondary-lighter"
									>&#x2022;</span
								>
							</li>
						</ul>
					</div>
					<div class="w-full lg:w-1/3 mx-auto">
						<ul class="flex flex-col items-center lg:items-start justify-center gap-y-4">
							<li class="flex items-center lg:items-start gap-4">
								<MapPinIcon class="size-9 text-secondary-lighter"/>
								<span class="w-full text-gray-300 text-sm block hover:text-secondary transition-all text-left">
									P.O Box 3085-00100, Westpark Suites, Ojijo Road, Parklands Nairobi, Kenya
								</span>
							</li>
							<li class="flex items-center gap-4">
								<PhoneIcon class="size-9 text-secondary-lighter"/>
								<span class="w-full text-gray-300 text-sm block hover:text-secondary transition-all text-left">
									(+254) 722-000-000
								</span>
							</li>
							<li class="flex items-center gap-4">
                <EnvelopeIcon class="size-9 text-secondary-lighter"/>
								<span class="w-full text-gray-300 text-sm block hover:text-secondary transition-all text-left">
									contact@gmail.co.ke
								</span>
							</li>
						</ul>
					</div>
					<div class="lg:w-1/3 mx-auto lg:mx-0">
            <Socials />
          </div>
				</div>

				<p class="text-gray-400 text-xs mt-10">
					Alex Christopher © {{ currentYear }}. All rights reserved.
				</p>
			</div>
		</div>
	</footer>
</template>
