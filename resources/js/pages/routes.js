import { createRouter, createWebHistory } from 'vue-router'

const routes = [
	{
		path: '/',
		component: () => import('./home/Index.vue'),
	},
	{
		path: '/services',
		component: () => import('./services/Index.vue'),
	},
	{
		path: '/works',
		component: () => import('./works/Index.vue'),
	},
	{
		path: '/blogs',
		component: () => import('./blogs/Index.vue'),
	},
	{
		path: '/blogs/:slug',
		component: () => import('./blogs/Show.vue'),
	},
	{
		path: '/contact',
		component: () => import('./contact/Index.vue'),
	},
]

const router = createRouter({
	history: createWebHistory(),
	routes,
	scrollBehavior(to, from, savedPosition) {
		return { top: 0 }
	},
})

router.beforeEach((to, from, next) => {
	if (to.meta.layout) {
		to.meta.layout = to.meta.layout
	} else {
		to.meta.layout = null
	}
	next()
})

export default router
