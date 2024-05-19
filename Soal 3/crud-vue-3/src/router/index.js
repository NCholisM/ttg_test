// Import vue router
import { createRouter, createWebHistory } from 'vue-router';

// Define routes
const routes = [
    {
        path: '/', // Sesuaikan path dengan folder Anda
        name: 'produk.index',
        component: () => import(/* webpackChunkName: "produk.index" */ '@/views/produk/Index.vue')
    },
    {
        path: '/produk/create', // Sesuaikan path dengan folder Anda
        name: 'produk.create',
        component: () => import(/* webpackChunkName: "produk.create" */ '@/views/produk/Create.vue')
    },
    {
        path: '/produk/edit/:id', // Sesuaikan path dengan folder Anda
        name: 'produk.edit',
        component: () => import(/* webpackChunkName: "produk.edit" */ '@/views/produk/Edit.vue')
    },
    {
        path: '/produk/detail/:id', // Sesuaikan path dengan folder Anda
        name: 'produk.detail',
        component: () => import(/* webpackChunkName: "produk.detail" */ '@/views/produk/Detail.vue')
    }
];

// Create router
const router = createRouter({
    history: createWebHistory(),
    routes  // Config routes
});

export default router;
