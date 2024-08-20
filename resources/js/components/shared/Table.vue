<template>
    <table class="w-full border-none">
        <thead class="border-b">
            <tr>
                <th
                    v-for="header in headers"
                    :key="header"
                    class="p-4 font-medium font-karla text-left capitalize"
                >
                    {{ header.replace("_", " ") }}
                </th>
                <th class="p-4 font-medium font-karla text-left capitalize">
                    actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="item in items"
                :key="item.id"
                class="border-b transition-all hover:bg-primary hover:bg-opacity-10"
            >
                <td v-for="header in headers" :key="header" class="p-4 text-left font-light">
                    <slot :name="header" :item="item">
                        {{ item[header] }}
                    </slot>
                </td>
                <td class="p-4 text-left font-light text-base">
                    <div class="flex items-center gap-5">
                        <EyeIcon
                            @click="toggleShowViewModal(item)"
                            title="View"
                            aria-label="View"
                            class="size-5 hover:text-secondary cursor-pointer"
                        />
                        <PencilSquareIcon
                            @click="toggleShowEditModal(item)"
                            title="Edit"
                            aria-label="Edit"
                            class="size-5 hover:text-secondary cursor-pointer"
                        />
                        <TrashIcon
                            @click="toggleShowDeleteModal(item)"
                            title="Delete"
                            aria-label="Delete"
                            class="size-5 hover:text-secondary cursor-pointer"
                        />
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <view-wrapper
        title="Item Details"
        :show-modal="showViewModal"
        @cancel="toggleShowViewModal"
        @confirm="toggleShowViewModal"
        hide-cancel
        confirm-label="Close"
    >
        <div class="m-5">
            <slot name="details" :item="activeItem"></slot>
        </div>
    </view-wrapper>

    <edit-wrapper
        title="Update Details"
        :show-modal="showEditModal"
        @cancel="toggleShowEditModal"
        @confirm="updateForm"
        confirm-label="Update"
    >
        <div class="m-5">
            <slot name="update" :item="activeItem"></slot>
        </div>
    </edit-wrapper>

    <delete-wrapper
        title="Confirm Delete"
        :show-modal="showDeleteModal"
        @cancel="toggleShowDeleteModal"
        @confirm="confirmDelete"
        confirm-label="delete"
    >
        <div class="m-10">
            <p>Are you sure you want to delete this item?</p>
        </div>
    </delete-wrapper>
</template>

<script setup>
import {
    TrashIcon,
    EyeIcon,
    PencilSquareIcon,
} from "@heroicons/vue/24/outline";
import { defineAsyncComponent, ref } from "vue";

const ViewWrapper = defineAsyncComponent(() => import("./ModalWrapper.vue"));
const EditWrapper = defineAsyncComponent(() => import("./ModalWrapper.vue"));
const DeleteWrapper = defineAsyncComponent(() => import("./ModalWrapper.vue"));

const activeItem = ref(null);
const showViewModal = ref(false);
const showEditModal = ref(false);
const showDeleteModal = ref(false);

// Toggle modal visibility
const toggleShowViewModal = (item) => {
    activeItem.value = item;
    showViewModal.value = !showViewModal.value;
    document.body.classList.toggle("fixed");
};

const toggleShowEditModal = (item) => {
    activeItem.value = item;
    showEditModal.value = !showEditModal.value;
    document.body.classList.toggle("fixed");
};

const toggleShowDeleteModal = (item) => {
    activeItem.value = item;
    showDeleteModal.value = !showDeleteModal.value;
    document.body.classList.toggle("fixed");
};

const emit = defineEmits(["delete", "update"]);

const confirmDelete = () => {
    emit("delete", activeItem.value, (result) => {
        if (result) {
            showDeleteModal.value = false;
        }
    });
};

const updateForm = async () => {
    return new Promise((resolve) => {
        emit("update", resolve);
    }).then((result) => {
        showEditModal.value = result;
    });
};

defineProps({
    items: Array,
    headers: Array,
});
</script>
