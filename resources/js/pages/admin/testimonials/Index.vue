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

const testimonials = ref([
    {
        id: 1,
        name: "John Doe",
        email: "johndoe@gmailc.om",
        actions: "",
    },
    // Other testimonials
]);

const currentPage = ref(1)

const handlePageClick = (page) => {
    currentPage.value = page;
};
</script>

<template>
    <breadcrumb
        class="mb-10"
        name="Testimonials"
        :links="[
            { name: 'Home', to: '/admin' },
            { name: 'Testimonials', to: '/admin/testimonials' },
        ]"
        :icon="ListBulletIcon"
    />

    <div class="border p-5 rounded-lg">
        <div class="flex items-center justify-between">
            <search-bar label="Search testimonials" />

            <button-view class="w-1/6" label="Create Testimonial" />
        </div>
        <div class="mt-10">
            <!-- Testimonials Table Listing -->
            <table-view class="mb-5" :items="testimonials" :headers="['id', 'name', 'email', 'actions']"></table-view>

            <!-- Pagination -->
            <pagination
                :pages="[1, 2, 3, 4, 5]"
                :currentPage="currentPage"
                @page-click="handlePageClick"
            />
        </div>
    </div>
</template>
