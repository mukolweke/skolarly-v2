<script setup>
import { ref } from 'vue';

defineProps({
    article: Object
})

const showMore = ref(false);

const toggleShowMore = () => {
      showMore.value = !showMore.value;
    }
</script>

<template>
    <div class="overflow-x-auto w-[1000px]">
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Id
            </div>
            <div class="px-4 py-2">
                {{ article.id }}
            </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Title
            </div>
            <div class="px-4 py-2">
                {{ article.title }}
            </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Slug
            </div>
            <div class="px-4 py-2">
                {{ article.slug }}
            </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Author
            </div>
            <div class="px-4 py-2">
                {{ article.author }}
            </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Excerpt
            </div>
            <div class="px-4 py-2">
                {{ article.excerpt }}
            </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Content
            </div>
            <div class="px-4 py-2 w-2/3">
                <div
                  :class="['overflow-hidden', { 'h-0': !showMore, 'h-auto': showMore }]"
                  class="max-h-[400px] overflow-y-auto "
                  v-html="article.content"
                ></div>
                <button
                  @click="toggleShowMore"
                  class="mt-2 text-blue-500 font-medium hover:underline"
                >
                  {{ showMore ? 'View Less' : 'View More' }}
                </button>
              </div>
        </div>
        <div class="flex items-start">
            <div
                class="px-4 py-4 font-medium capitalize w-1/3"
            >
                Published Date
            </div>
            <div class="px-4 py-2">
                {{ article.published_date }}
            </div>
        </div>
    </div>
</template>
