<script setup>
import { defineAsyncComponent, onMounted, ref, watch } from "vue";
import { ListBulletIcon } from "@heroicons/vue/24/outline";
import axios from "axios";

// Async component imports
const Breadcrumb = defineAsyncComponent(() => import("../../../components/shared/Breadcrumb.vue"));
const ButtonView = defineAsyncComponent(() => import("../../../components/shared/Button.vue"));
const SearchBar = defineAsyncComponent(() => import("../../../components/shared/SearchBar.vue"));
const TableView = defineAsyncComponent(() => import("../../../components/shared/Table.vue"));
const Pagination = defineAsyncComponent(() => import("../../../components/shared/Pagination.vue"));
const ModalWrapper = defineAsyncComponent(() => import("../../../components/shared/ModalWrapper.vue"));
const CreateForm = defineAsyncComponent(() => import("./Form.vue"));

const articles = ref([]);
const pages = ref([]);
const currentPage = ref(1);
const showModal = ref(false);
const createFormRef = ref(null);
const searchQuery = ref('');

// Toggle modal visibility
const toggleShowModal = () => {
    showModal.value = !showModal.value;
    document.body.classList.toggle('fixed');
};

// Submit form
const submitForm = async () => {
    if (createFormRef.value?.saveArticle) {
        try {
            await createFormRef.value.saveArticle();
            // toggleShowModal();
        } catch (error) {
            console.error("Error saving article:", error);
        }
    } else {
        console.error("saveArticle method is not available on CreateForm");
    }
};

// Fetch articles
const getArticles = async () => {
    try {
        const { data } = await axios.get(`/articles?page=${currentPage.value}&search=${searchQuery.value}`);
        articles.value = data;
        pages.value = Array.from({ length: data.last_page }, (_, i) => i + 1);
    } catch (error) {
        console.error("Error fetching articles:", error);
    }
};

const onSearch = (query) => {
    searchQuery.value = query;
    currentPage.value = 1;  // Reset to the first page on new search
    getArticles();
};

// Watch for page changes and fetch articles accordingly
watch(currentPage, getArticles);
watch(showModal, (value) => {
    if (!value) {
        getArticles()
    }
});

// Initial fetch on mount
onMounted(getArticles);
</script>

<template>
    <Breadcrumb
        class="mb-10"
        name="Articles"
        :links="[
            { name: 'Home', to: '/admin' },
            { name: 'Articles', to: '/admin/articles' }
        ]"
        :icon="ListBulletIcon"
    />

    <div class="border p-5 rounded-lg">
        <div class="flex items-end justify-between gap-6">
            <SearchBar label="Search articles" @search="onSearch" />
            <ButtonView @click="toggleShowModal" class="w-1/2 lg:w-1/6" label="Create Article" />
        </div>

        <div class="mt-10">
            <TableView
                class="mb-5"
                :items="articles.data"
                :headers="['id', 'title', 'slug', 'author', 'published_date']"
            />

            <Pagination
                v-if="articles.total > articles.per_page"
                :pages="pages"
                :currentPage="currentPage"
                @page-click="currentPage = $event"
                @prev-click="currentPage--"
                @next-click="currentPage++"
            />
        </div>
    </div>

    <ModalWrapper
        title="Create Article"
        :show-modal="showModal"
        @cancel="toggleShowModal"
        @confirm="submitForm"
        confirm-label="Create"
    >
        <CreateForm ref="createFormRef" @success="toggleShowModal" />
    </ModalWrapper>
</template>
