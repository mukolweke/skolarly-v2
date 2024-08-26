<script setup>
import { ListBulletIcon, ChatBubbleBottomCenterTextIcon, BuildingOfficeIcon } from "@heroicons/vue/24/outline";
</script>

<template>
    <div class="my-10">
        <h1 class="text-2xl capitalize">Welcome back lex</h1>

        <section class="mt-10 flex items-center flex-wrap gap-4">
            <router-link to="/admin/articles" class="flex-1 h-52 bg-green-500 bg-opacity-15 text-green-500 rounded-md p-5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <h4 class="font-medium font-karla uppercase ">Articles</h4>
                    <ListBulletIcon class="size-10"/>
                </div>
                <div class="flex items-center justify-between">
                    <div class="mt-5 flex items-baseline">
                        <div class="text-7xl font-karla">28</div>
                        <div class="text-primary font-medium uppercase text-sm">
                            Published
                        </div>
                    </div>
                    <div class="mt-5 flex items-baseline">
                        <div class="text-7xl font-karla">02</div>
                        <div class="text-primary font-medium uppercase text-sm">
                            Unpublished
                        </div>
                    </div>
                </div>
            </router-link>
            <router-link to="/admin/testimonials" class="flex-1 h-52 bg-purple-500 bg-opacity-15 text-purple-500 rounded-md p-5 flex flex-col justify-between">
                <div class="flex items-center justify-between">
                    <h4 class="font-medium font-karla uppercase ">Testimonials</h4>
                    <ChatBubbleBottomCenterTextIcon class="size-10"/>
                </div>
                <div class="flex items-center justify-end">
                    <div class="mt-5 flex items-baseline">
                        <div class="text-7xl font-karla">28</div>
                        <div class="text-primary font-medium uppercase text-sm">
                            Posted
                        </div>
                    </div>
                </div>
            </router-link>
        </section>

        <section class="mt-10 w-1/2">
            <h4 class="font-semibold font-karla uppercase mb-10">Latest emails</h4>

            <!-- Table -->
            <div class="flex items-center text-2xl uppercase">
                <BuildingOfficeIcon class="size-10"/>

            <h4>Coming Soon</h4>
            </div>
        </section>
    </div>
</template>
