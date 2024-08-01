<script setup>

import { ArrowRightIcon } from '@heroicons/vue/20/solid';
const sampleProject = new URL('@/assets/images/sample-project.png', import.meta.url).href

import RedirectLink from '../../../components/layout/RedirectLink.vue';
</script>

<template>
  <section>
    <div class="lx-container py-10 md:pb-28">
      <div class="flex flex-col md:flex-row gap-20 item-start mb-10">
        <div class="flex-1">
          <div class="w-full md:w-3/5">
            <p class="font-karla text-gray-400 flex items-center gap-2 mb-8">
              <span class="font-bold">-</span> <span>Portfolio</span>
            </p>

            <p class="mb-10 text-white text-3xl capitalize">
              All Creative works, selected projects
            </p>

            <p class="text-gray-400 font-karla mb-10">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem
              ipsum dolor sit amet, consectetur adipisicing elit.
            </p>

            <RedirectLink title="Explore More" href="/works" />
          </div>
        </div>

        <div class="flex-1">
          <div
            class="w-full md:w-4/5 ml-auto bg-primary-darker h-[550px] p-10 rounded-md overflow-hidden shadow-lg cursor-pointer"
          >
            <div class="flex items-end justify-between">
              <h4 class="text-gray-400 text-xl">Project Title</h4>
              <p class="text-gray-400 text-sm">Project Type</p>
            </div>

            <div
              class="bg-transparent h-full relative -rotate-[20deg] mt-40 -ml-12 w-[150%]"
            >
              <img :src="sampleProject" alt="" />
            </div>
          </div>
        </div>
      </div>

      <div
        class="flex flex-col md:flex-row gap-10 md:gap-20 item-start md:-mt-28"
      >
        <div class="flex-1">
          <div
            class="w-full md:w-4/5 mr-auto bg-primary-darker h-[550px] rounded-md overflow-hidden shadow-lg cursor-pointer"
          >
            <div class="flex items-end justify-between p-10">
              <h4 class="text-gray-400 text-xl">Project Title</h4>
              <p class="text-gray-400 text-sm">Project Type</p>
            </div>

            <div
              class="bg-transparent h-full relative -rotate-[20deg] mt-24 w-[150%]"
            >
              <img :src="sampleProject" alt="" />
            </div>
          </div>
        </div>
        <div class="flex-1">
          <div class="clearfix w-full block bg-transparent"></div>
        </div>
      </div>
      <div
        class="flex flex-col md:flex-row gap-0 md:gap-20 item-start md:-mt-80"
      >
        <div class="flex-1"></div>
        <div class="flex-1">
          <div
            class="w-full md:w-4/5 ml-auto bg-primary-darker h-[550px] p-10 rounded-md overflow-hidden shadow-lg cursor-pointer"
          >
            <div class="flex items-end justify-between">
              <h4 class="text-gray-400 text-xl">Project Title</h4>
              <p class="text-gray-400 text-sm">Project Type</p>
            </div>

            <div
              class="bg-transparent h-full relative -rotate-[20deg] mt-40 -ml-12 w-[150%]"
            >
              <img :src="sampleProject" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
