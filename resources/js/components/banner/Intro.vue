<script setup>
defineProps({
    title: String,
})
</script>

<template>
    <section class="lx-container">
        <div class="flex flex-col md:flex-row item-start py-10 md:py-40">
          <div class="flex-1">
            <h1
              class="text-white text-6xl xl:text-8xl font-bold leading-tight w-full mb-8 select-none"
            >
              {{ title }}
            </h1>
            <div class="block bg-secondary w-20 h-2 md:h-3"></div>
          </div>

          <div class="w-full md:w-1/2 xl:w-1/3"></div>
        </div>
      </section>
</template>