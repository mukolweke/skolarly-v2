<script setup>
import { defineAsyncComponent, ref } from "vue";
import { ListBulletIcon } from "@heroicons/vue/24/outline";

const Breadcrumb = defineAsyncComponent(() =>
    import("../../../components/shared/Breadcrumb.vue")
);

const ButtonView = defineAsyncComponent(() =>
    import("../../../components/shared/Button.vue")
);
const SearchBar = defineAsyncComponent(() =>
    import("../../../components/shared/SearchBar.vue")
);
const TableView = defineAsyncComponent(() =>
    import("../../../components/shared/Table.vue")
);
const Pagination = defineAsyncComponent(() =>
    import("../../../components/shared/Pagination.vue")
);
const ModalWrapper = defineAsyncComponent(() =>
    import("../../../components/shared/ModalWrapper.vue")
);
const CreateForm = defineAsyncComponent(() => import("./Form.vue"));

const articles = ref([
    {
        id: 1,
        title: "Lorem Ipsum",
        author: "John Doe",
        date: "2022-01-01",
        actions: "",
    },
    // Other articles
]);

const currentPage = ref(1);
const handlePageClick = (page) => {
    currentPage.value = page;
};

const showModal = ref(false);

const toggleShowModal = () => {
    showModal.value = !showModal.value;
};

const createFormRef = ref(null);

const submitForm = () => {
    if (createFormRef.value && typeof createFormRef.value.saveArticle === 'function') {
        createFormRef.value.saveArticle()
            .then(() => {
                toggleShowModal();
            })
            .catch(error => {
                console.error('Error saving article:', error);
            });
    } else {
        console.error('saveArticle method is not available on CreateForm');
    }
};
</script>

<template>
    <breadcrumb
        class="mb-10"
        name="Articles"
        :links="[
            { name: 'Home', to: '/admin' },
            { name: 'Articles', to: '/admin/articles' },
        ]"
        :icon="ListBulletIcon"
    />

    <div class="border p-5 rounded-lg">
        <div class="flex items-center justify-between">
            <search-bar label="Search articles" />

            <button-view
                @click="toggleShowModal"
                class="w-1/6"
                label="Create Article"
            />
        </div>
        <div class="mt-10">
            <!-- Articles Table Listing -->
            <table-view
                class="mb-5"
                :items="articles"
                :headers="['id', 'title', 'author', 'date', 'actions']"
            ></table-view>

            <!-- Pagination -->
            <pagination
                :pages="[1, 2, 3, 4, 5]"
                :currentPage="currentPage"
                @page-click="handlePageClick"
            />
        </div>
    </div>

    <modal-wrapper
        title="Create Article"
        :show-modal="showModal"
        @cancel="toggleShowModal"
        @confirm="submitForm"
        confirm-label="Create"
    >
        <CreateForm ref="createFormRef" />
    </modal-wrapper>
</template>
