<script setup>
import { ArrowRightIcon } from '@heroicons/vue/20/solid';

import RedirectLink from '../../../components/layout/RedirectLink.vue';

</script>

<template>
  <section class="bg-primary-darker">
    <div
      class="lx-container flex flex-col gap-10 md:gap-0 md:flex-row item-start py-10 md:py-40 md:pb-72"
    >
      <div class="flex-1">
        <div class="w-full md:w-3/5">
          <p class="font-karla text-gray-400 flex items-center gap-2 mb-8">
            <span class="font-bold">-</span> <span>Contact</span>
          </p>

          <p class="mb-10 text-white text-3xl">
            Any type of query & Discussion
          </p>

          <p class="text-gray-400 font-karla mb-10">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>

          <RedirectLink title="hi@alex.com" href="/contact" />
        </div>
      </div>

      <div class="flex-1">
        <div class="w-full md:w-4/6">
          <p class="mb-10 text-white text-3xl">
            You can't use up creativity, the more you use, more you have in your
            significant mind.
          </p>

          <p class="text-gray-400 font-karla mb-10">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>


          <div class="flex justify-between">
            <div class="flex items-end md:w-1/3 gap-4">
                <p class="text-secondary-lighter text-5xl md:text-7xl font-karla p-0 m-0 -mb-2">14</p>
                <p class="text-gray-300 font-semibold text-xs md:text-sm">Years of Experience</p>
            </div>
            <div class="flex items-end md:w-1/3 gap-4">
                <p class="text-secondary-lighter text-5xl md:text-7xl font-karla p-0 m-0 -mb-2">295</p>
                <p class="text-gray-300 font-semibold text-xs md:text-sm">Satisfied Clients</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
