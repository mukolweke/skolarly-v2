<script setup></script>

<template>
	<div>
		<div
			class="h-[250px] rounded-md overflow-hidden cursor-pointer relative"
		>
			<router-link to="/blogs/blog-slug-here">
				<img
					src="https://images.pexels.com/photos/955389/pexels-photo-955389.jpeg?auto=compress&cs=tinysrgb&w=600"
					class="w-full h-full object-cover"
					alt=""
				/>
				<div
					class="absolute bottom-0 left-0 w-full h-full bg-black bg-opacity-70 z-10"
				></div>
			</router-link>
		</div>
		<div class="">
			<router-link to="/blogs/blog-slug-here">
				<h4
					class="py-4 text-xl font-medium text-white hover:underline cursor-pointer transition-all"
				>
					Building your API Stack
				</h4>
			</router-link>
			<p class="pb-4 text-gray-400">
				Lorem, ipsum dolor sit amet consectetur adipisicing elit.
				Tempora, eligendi perspiciatis nobis animi magnam qui
				praesentium necessitatibus
			</p>

			<div
				class="flex items-center text-secondary text-[10px] md:text-xs font-semibold"
			>
				<span class="block">Alex</span>
				<span class="block ml-1">.</span>
				<span class="block ml-1">Feb 26 2024</span>
			</div>
		</div>
	</div>
</template>
