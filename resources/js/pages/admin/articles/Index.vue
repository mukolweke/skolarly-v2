<script setup>
import { defineAsyncComponent, ref } from "vue";
import { ListBulletIcon, MagnifyingGlassIcon } from "@heroicons/vue/24/outline";

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

const handlePageClick = () => {};
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

            <button-view class="w-1/6" label="Create Article" />
        </div>
        <div class="mt-10">
            <!-- Articles Table Listing -->
            <table-view class="mb-5" :items="articles"></table-view>

            <!-- Pagination -->
            <pagination
                :pages="[1, 2, 3, 4, 5]"
                :currentPage="1"
                @page-click="handlePageClick"
            />
        </div>
    </div>
</template>
