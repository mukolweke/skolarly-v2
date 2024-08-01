<script setup>

const facebookIcon = new URL(
		'../../../assets/icons/facebook-icon.svg',
		import.meta.url
	).href
	const instagramIcon = new URL(
		'../../../assets/icons/instagram-icon.svg',
		import.meta.url
	).href
	const linkedinIcon = new URL(
		'../../../assets/icons/linkedIn-icon.svg',
		import.meta.url
	).href

</script>

<template>
    <div class="flex items-center justify-center md:justify-start gap-5">
        <img
          :src="facebookIcon"
          class="size-8 lg:size-10 fill-primary text-primary cursor-pointer"
          alt=""
        />
        <img
          :src="instagramIcon"
          class="size-8 lg:size-10 fill-primary text-primary cursor-pointer"
          alt=""
        />
        <img
          :src="linkedinIcon"
          class="size-6 lg:size-7 fill-primary text-primary cursor-pointer"
          alt=""
        />
      </div>
</template>
