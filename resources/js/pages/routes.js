import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from "../stores/auth";

const routes = [
    {
        path: "/",
        component: () => import("./home/Index.vue"),
        meta: { layout: "DefaultLayout" },
    },
    {
        path: "/services",
        component: () => import("./services/Index.vue"),
        meta: { layout: "DefaultLayout" },
    },
    {
        path: "/works",
        component: () => import("./works/Index.vue"),
        meta: { layout: "DefaultLayout" },
    },
    {
        path: "/blogs",
        component: () => import("./blogs/Index.vue"),
        meta: { layout: "DefaultLayout" },
    },
    {
        path: "/blogs/:slug",
        component: () => import("./blogs/Show.vue"),
        meta: { layout: "DefaultLayout" },
    },
    {
        path: "/contact",
        component: () => import("./contact/Index.vue"),
        meta: { layout: "DefaultLayout" },
    },
    {
        path: "/login",
        component: () => import("./auth/Index.vue"),
        meta: { layout: null },
    },
    {
        path: "/admin",
        component: () => import("./admin/Index.vue"),
        meta: { layout: "AdminLayout", requiresAuth: true },
    },
    {
        path: "/admin/articles",
        component: () => import("./admin/articles/Index.vue"),
        meta: { layout: "AdminLayout", requiresAuth: true },
    },
    {
        path: "/admin/testimonials",
        component: () => import("./admin/testimonials/Index.vue"),
        meta: { layout: "AdminLayout", requiresAuth: true },
    },
    {
        path: "/admin/profile",
        component: () => import("./admin/profile/Index.vue"),
        meta: { layout: "AdminLayout", requiresAuth: true },
    },
    {
        path: "/:pathMatch(.*)*",
        component: () => import("./errors/NotFound.vue"),
        meta: { layout: "DefaultLayout" },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return { top: 0 };
    },
});

router.beforeEach((to, from, next) => {
    const authStore = useAuthStore();
    const requiresAuth = to.meta.requiresAuth;

    if (requiresAuth && !authStore.isAuthenticated) {
        next({ path: "/login", query: { redirect: to.fullPath } });
    } else {
        if (to.meta.layout === undefined) {
            to.meta.layout = "DefaultLayout";
        }
        next();
    }
});

export default router
