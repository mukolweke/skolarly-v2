<script setup>
	defineProps({
		hideExcerpt: {
			type: Boolean,
			default: false,
		},
	})
</script>

<template>
	<router-link to="/blogs/blog-slug-here">
		<img
			src="https://images.pexels.com/photos/955389/pexels-photo-955389.jpeg?auto=compress&cs=tinysrgb&w=600"
			alt="Blog Background"
			class="absolute inset-0 w-full h-full object-cover z-0"
		/>
		<div
			class="absolute bottom-0 left-0 w-full h-full bg-black bg-opacity-70 z-10"
		></div>
		<div class="absolute bottom-0 left-0 text-white text-left p-5 z-20">
			<h3
				class="py-4 text-xl font-medium text-white hover:underline cursor-pointer"
			>
				Your Title Here
			</h3>
			<p v-if="!hideExcerpt" class="pb-4 text-gray-300 md:w-1/2">
				Lorem, ipsum dolor sit amet consectetur adipisicing elit.
				Tempora, eligendi perspiciatis nobis animi magnam qui
				praesentium necessitatibus
			</p>
			<div
				class="flex items-center text-secondary text-[10px] md:text-xs font-bold"
			>
				<span class="block">Alex</span>
				<span class="block ml-1">.</span>
				<span class="block ml-1">Feb 26 2024</span>
			</div>
		</div>
	</router-link>
</template>
