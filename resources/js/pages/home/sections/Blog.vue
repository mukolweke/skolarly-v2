<script setup>
	import { ref } from 'vue'

	import { ArrowRightIcon } from '@heroicons/vue/20/solid'
	import RedirectLink from '../../../components/layout/RedirectLink.vue'
	const items = ref([1, 2, 3, 4, 5])
</script>

<template>
	<section class="bg-primary-darker">
		<div
			class="lx-container flex flex-col md:flex-row item-start py-10 md:pt-40"
		>
			<div
				class="flex flex-col md:flex-row gap-1 lg:gap-20 item-start mb-10 w-full"
			>
				<div class="flex-1">
					<div class="w-full">
						<p
							class="font-karla text-gray-400 flex items-center gap-2 mb-8"
						>
							<span class="font-bold">-</span> <span>Blog</span>
						</p>

						<p class="mb-10 text-white text-3xl capitalize">
							What's new? <br />
							My blog and news
						</p>

						<RedirectLink title="Read More" href="/blogs" />
					</div>
				</div>

				<div class="lg:w-1/2">
					<div
						v-for="(item, index) in [1, 2, 3, 4, 5]"
						:key="item"
						:class="[
							'flex items-center gap-3 md:gap-5 py-10',
							{
								'border-b border-[#484848]':
									index !== items.length - 1,
							},
						]"
					>
						<div
							class="flex items-center text-gray-400 text-[10px] md:text-xs font-semibold w-[45%]"
						>
							<span class="block">Feb 26</span>
							<span class="block ml-1">.</span>
							<span class="block ml-1">Blog</span>
						</div>

						<h4
							class="text-white font-medium cursor-pointer hover:underline w-full"
						>
							Let this be a lesson to you
						</h4>

						<a
							href="#"
							class="font-bold text-secondary-lighter text-xl tracking-wider leading-loose underline underline-offset-4 ml-auto"
						>
							<ArrowRightIcon class="size-6" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>
