<script setup>
	import { defineAsyncComponent } from 'vue'
	import { ArrowDownIcon } from '@heroicons/vue/20/solid'

	const FeaturedCard = defineAsyncComponent(() =>
		import('./partials/FeaturedCard.vue')
	)
	const BlogListing = defineAsyncComponent(() =>
		import('./partials/ListingCard.vue')
	)

	const BannerIntro = defineAsyncComponent(() =>
		import('../../components/banner/Intro.vue')
	)
</script>

<template>
	<!-- banner intro -->
	<BannerIntro title="Blogs." />

	<!-- featured articles -->
	<section class="bg-primary-darker">
		<div class="lx-container py-20">
			<p class="font-karla text-gray-400 flex items-center gap-2 mb-8">
				<span class="font-bold">-</span> <span>Featured blogs</span>
			</p>

			<div class="flex items-center flex-col md:flex-row gap-10">
				<div
					class="w-full md:w-3/4 relative block h-[250px] md:h-[500px] rounded-md transition-all transform hover:-translate-y-4 cursor-pointer overflow-hidden"
				>
					<featured-card></featured-card>
				</div>
				<div class="w-full md:w-1/4 h-[500px]">
					<div class="flex flex-col h-full gap-10">
						<div
							class="flex-1 h-1/2 rounded-md relative overflow-hidden"
						>
							<featured-card hide-excerpt></featured-card>
						</div>
						<div
							class="flex-1 h-1/2 rounded-md relative overflow-hidden"
						>
							<featured-card hide-excerpt></featured-card>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- article listing -->

	<section class="bg-primary">
		<div class="lx-container py-20">
			<p class="font-karla text-gray-400 flex items-center gap-2 mb-8">
				<span class="font-bold">-</span> <span>Recent blogs</span>
			</p>

			<div
				class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-y-20"
			>
				<div
					v-for="blog in [1, 2, 3, 4, 5, 6, 7, 8, 9]"
					:key="blog"
					class="w-full rounded-md"
				>
					<blog-listing :blog="blog"></blog-listing>
				</div>
			</div>

			<div class="flex items-center justify-center mt-20">
				<button
					class="text-secondary hover:text-secondary-lighter text-xl tracking-wider leading-loose p-1 px-8 rounded-md flex items-center gap-2"
				>
					More Post
					<ArrowDownIcon class="size-6 animate-bounce" />
				</button>
			</div>
		</div>
	</section>
</template>
