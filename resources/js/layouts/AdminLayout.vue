<template>
    <div class="flex h-dvh bg-white">
        <!-- Left Sidebar -->
        <nav class="bg-transparent w-[250px] border-r p-5 py-10 relative">
            <div class="mb-10">
                <img :src="logo" class="w-48" alt="Skolarly" />
            </div>

            <div class="mb-5">
                <p class="font-semibold uppercase text-primary-lighter text-sm mb-2">
                    Home
                </p>
                <ul class="space-y-5">
                    <li
                        class="h-12 flex rounded-md transition-all"
                        :class="isActive('/admin') ? 'bg-primary text-gray-100' : 'hover:bg-primary hover:bg-opacity-20 text-primary-lighter'"
                    >
                        <router-link to="/admin" class="w-full h-full px-4 flex items-center gap-3">
                            <HomeIcon class="size-6" />
                            Dashboard
                        </router-link>
                    </li>
                </ul>
            </div>

            <div class="mb-5">
                <p class="font-semibold uppercase text-primary-lighter text-sm mb-2">
                    Page
                </p>
                <ul class="space-y-5">
                    <li
                        class="h-12 flex rounded-md transition-all"
                        :class="isActive('/admin/articles') ? 'bg-primary text-gray-100' : 'hover:bg-primary hover:bg-opacity-20 text-primary-lighter'"
                    >
                        <router-link to="/admin/articles" class="w-full h-full px-4 flex items-center gap-3">
                           <ListBulletIcon class="size-6"/>
                            Articles
                        </router-link>
                    </li>
                    <li
                        class="h-12 flex rounded-md transition-all"
                        :class="isActive('/admin/testimonials') ? 'bg-primary text-gray-100' : 'hover:bg-primary hover:bg-opacity-20 text-primary-lighter'"
                    >
                        <router-link to="/admin/testimonials" class="w-full h-full px-4 flex items-center gap-3">
                            <ChatBubbleBottomCenterTextIcon class="size-6"/>
                            Testimonials
                        </router-link>
                    </li>
                </ul>
            </div>

            <div>
                <p class="font-semibold uppercase text-primary-lighter text-sm mb-2">
                    User
                </p>
                <ul class="space-y-5">
                    <li
                        class="h-12 flex rounded-md transition-all"
                        :class="isActive('/admin/profile') ? 'bg-primary text-gray-100' : 'hover:bg-primary hover:bg-opacity-20 text-primary-lighter'"
                    >
                        <router-link to="/admin/profile" class="w-full h-full px-4 flex items-center gap-3">
                            <UserIcon class="size-6" />
                            Profile
                        </router-link>
                    </li>
                </ul>
            </div>

            <div class="absolute bottom-10 right-5 left-5 bg-secondary bg-opacity-30 p-2 py-4 rounded-md">
                <div class="flex items-center gap-2 w-full">
                    <UserIcon class="size-8" />
                    <div class="flex-1">
                        <h4 class="text-primary-lighter font-medium font-karla">Johnny</h4>
                        <p class="text-primary-lighter text-xs font-karla">User</p>
                    </div>
                    <PowerIcon class="size-5"/>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="top-bar flex items-center justify-end gap-10 py-8 px-5 ">
                <BellAlertIcon class="size-8" />
                    <UserIcon class="size-8" />

            </header>

            <!-- Router View / Slot for Page Content -->
            <main class="px-10 flex-1">
                <router-view></router-view>
            </main>
        </div>
    </div>
</template>

<script setup>
import { UserIcon, ListBulletIcon, HomeIcon, ChatBubbleBottomCenterTextIcon, PowerIcon, BellAlertIcon } from "@heroicons/vue/24/outline";
import { useRoute } from "vue-router";

const route = useRoute();

const isActive = (path) => {
  return route.path === path;
};

const logo = new URL("../../assets/images/logo.png", import.meta.url).href;
</script>
