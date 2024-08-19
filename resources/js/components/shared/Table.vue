<template>
    <table class="w-full border-none">
        <thead class="border-b">
            <tr>
                <th v-for="header in headers" :key="header" class="p-4 font-medium font-karla text-left capitalize">
                    {{ header.replace('_', ' ') }}
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
                <td v-for="header in headers" :key="header" class="p-4 text-left font-light text-base">
                    {{ item[header] }}
                </td>
                <td class="p-4 text-left font-light text-base">

                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
defineProps({
    items: Array,
    headers: Array,
});
</script>
