<script setup>
import { defineAsyncComponent, onMounted, ref, watch } from "vue";
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

const ManageForm = defineAsyncComponent(() => import("./Form.vue"));
const ShowView = defineAsyncComponent(() => import("./Show.vue"));

const testimonials = ref([]);
const pages = ref([]);
const currentPage = ref(1);
const showModal = ref(false);
const createFormRef = ref(null);
const updateFormRef = ref(null);
const searchQuery = ref("");
const showEditModal = ref(false);

const handlePageClick = (page) => {
  currentPage.value = page;
};

const toggleShowModal = () => {
  showModal.value = !showModal.value;
};

const submitForm = async () => {
  if (createFormRef.value?.saveTestimonial) {
    try {
      await createFormRef.value.saveTestimonial();
    } catch (error) {
      console.error("Error saving testimonial:", error);
    }
  } else {
    console.error("Testimonial method is not available on CreateForm");
  }
};

const updateTestimonial = async (resolve) => {
  if (updateFormRef.value?.saveTestimonial) {
    try {
      const res = await updateFormRef.value.saveTestimonial();
      getTestimonials();
      resolve(showEditModal.value);
    } catch (error) {
      resolve(showEditModal.value);
    }
  } else {
    resolve(showEditModal.value);
  }
};

// Fetch testimonials
const getTestimonials = async () => {
  try {
    const { data } = await axios.get(
      `/testimonials?page=${currentPage.value}&search=${searchQuery.value}`
    );
    testimonials.value = data;
    pages.value = Array.from({ length: data.last_page }, (_, i) => i + 1);
  } catch (error) {
    console.error("Error fetching testimonials:", error);
  }
};

// Search: Update the search query
const onSearch = (query) => {
  searchQuery.value = query;
  currentPage.value = 1; // Reset to the first page on new search
  getTestimonials();
};

const deleteTestimonial = async (testimonial, callback) => {
  try {
    const response = await axios.delete(`/testimonials/${testimonial.id}`);

    if (response.status == 204) {
      getTestimonials();
      callback(true);
    }
  } catch (error) {
    console.error("Error fetching testimonials:", error);
    callback(false);
  }
};

// Watch for page changes and fetch testimonials accordingly
watch(currentPage, getTestimonials);
watch(showModal, (value) => {
  if (!value) {
    getTestimonials();
  }
});

// Initial fetch on mount
onMounted(getTestimonials);
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
      <search-bar label="Search testimonials" @search="onSearch" />

      <button-view @click="toggleShowModal" class="w-1/6" label="Create Testimonial" />
    </div>
    <div class="mt-10">
      <!-- Testimonials Table Listing -->
      <table-view
        :items="testimonials.data"
        :headers="['id', 'name', 'content', 'updated_date']"
        @delete="deleteTestimonial"
        @update="updateTestimonial"
      >
        <template v-slot:details="{ item }">
          <show-view :testimonial="item" />
        </template>

        <template v-slot:update="{ item }">
          <manage-form
            class="max-w-[900px]"
            ref="updateFormRef"
            method-type="put"
            @success="() => (showEditModal = false)"
            @error="() => (showEditModal = true)"
            :testimonial="item"
          />
        </template>
      </table-view>

      <!-- Pagination -->
      <Pagination
        v-if="testimonials.total > testimonials.per_page"
        class="mt-5"
        :pages="pages"
        :currentPage="currentPage"
        @page-click="currentPage = $event"
        @prev-click="currentPage--"
        @next-click="currentPage++"
      />
    </div>
  </div>

  <modal-wrapper
    title="Create Testimonial"
    :show-modal="showModal"
    @cancel="toggleShowModal"
    @confirm="submitForm"
    confirm-label="Create"
  >
    <manage-form ref="createFormRef" @success="toggleShowModal" />
  </modal-wrapper>
</template>
