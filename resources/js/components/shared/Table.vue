<template>
    <table class="w-full border-none">
        <thead class="border-b">
            <tr>
                <th class="p-4 font-medium text-lg text-left">Title</th>
                <th class="p-4 font-medium text-lg text-left">Author</th>
                <th class="p-4 font-medium text-lg text-left">Date</th>
                <th class="p-4 font-medium text-lg text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="item in items"
                :key="item.id"
                class="border-b transition-all hover:bg-primary hover:bg-opacity-10"
            >
                <td class="p-4 text-left font-light text-sm">
                    <!-- {{ article.title }} -->
                    lorem ipsum
                </td>
                <td class="p-4 text-left font-light text-sm">
                    <!-- {{ article.author }} -->
                    lorem ipsum
                </td>
                <td class="p-4 text-left font-light text-sm">
                    <!-- {{ article.date }} -->
                    lorem ipsum
                </td>
                <td class="p-4 text-left font-light text-sm">
                    <!-- {{ article.actions }} -->
                    lorem ipsum
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
defineProps({
    items: {
        type: Array,
        required: true,
    },
});
</script>
