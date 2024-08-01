<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

// Import the quote icon
const quoteIcon = new URL('../../../../assets/icons/quote-icon.svg', import.meta.url).href;

// Testimonials data
const testimonials = ref([
  {
    text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore similique odit eaque repellat nam officia ea magnam. Assumenda, odit fugiat facere temporibus eligendi velit quam rem officiis nam voluptatibus sit.",
    name: "James Bond",
    image: "https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
  },
  {
    text: "Aliquid, reiciendis? Temporibus itaque nihil fugit corporis architecto perferendis delectus voluptas, necessitatibus voluptatum.",
    name: "Ethan Hunt",
    image: "https://images.pexels.com/photos/769746/pexels-photo-769746.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
  },
  {
    text: "Qui quos atque aperiam maiores. Excepturi rerum numquam quibusdam voluptatem.",
    name: "Jason Bourne",
    image: "https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
  },
  {
    text: "Nihil tenetur fugiat, doloremque perspiciatis cumque natus distinctio nostrum voluptatum commodi.",
    name: "Jack Reacher",
    image: "https://images.pexels.com/photos/769746/pexels-photo-769746.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
  }
]);

const currentIndex = ref(0);
let intervalId;

const nextTestimonial = () => {
  currentIndex.value = (currentIndex.value + 1) % testimonials.value.length;
};

onMounted(() => {
  intervalId = setInterval(nextTestimonial, 5000); // Change testimonial every 5 seconds
});

onUnmounted(() => {
  clearInterval(intervalId);
});
</script>

<template>
  <section class="bg-primary-darker">
    <div class="lx-container flex flex-col md:flex-row item-center pb-10 md:pb-40">
      <div class="w-full sm:w-[400px] mx-auto">
        <img
          :src="testimonials[currentIndex].image"
          alt=""
          class="rounded-md grayscale h-[200px] md:h-[400px] w-full object-cover"
        />
      </div>

      <div class="w-full md:ml-20 mt-5 md:mt-0 flex flex-col justify-around">
        <div class="text-center md:text-left">
          <div class="flex items-center justify-center md:justify-start">
            <div class="h-20 w-20">
                <img :src="quoteIcon" class="h-full w-full" alt="Quote Icon" />
              </div>
          </div>

          <p class="mb-10 text-white text-xl md:text-3xl">
            {{ testimonials[currentIndex].text }}
          </p>

          <p class="text-gray-400 font-medium">{{ testimonials[currentIndex].name }}</p>
        </div>

        <div class="flex items-center justify-center md:justify-start gap-5 mt-14">
          <div
            v-for="(testimonial, index) in testimonials"
            :key="index"
            :class="{
              'block h-2 w-10 sm:w-20 rounded-md': true,
              'bg-secondary': currentIndex === index,
              'bg-primary': currentIndex !== index
            }"
          ></div>
        </div>
      </div>
    </div>
  </section>
</template>

