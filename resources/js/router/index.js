import {createRouter, createWebHistory} from 'vue-router'


const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/Home.vue')
        },
        {
            path: '/catalog',
            name: 'catalogs',
            component: () => import('../views/Catalogs.vue'),
            children: [
                {
                    path: 'medical',
                    name: 'med',
                    component: () => import('../views/Medical.vue')
                },
                {
                    path: 'spa',
                    name: 'spa',
                    component: () => import('../views/Spa.vue')
                },
                {
                    path: 'cafe',
                    name: 'cafe',
                    component: () => import('../views/Cafe.vue')
                },
            ]
        },
        {
            path: '/medical/:id',
            name: 'med_card',
            component: () => import('../views/medicalCard.vue')
        },
        {
            path: '/spa/:id',
            name: 'spa_card',
            component: () => import('../views/spaCard.vue')
        },
        {
            path: '/cafe/:id',
            name: 'cafe_card',
            component: () => import('../views/cafeCard.vue')
        },
        {
            path: '/blog/:id',
            name: 'single_blog',
            component: () => import('../views/blogItem.vue')
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('../../views/layouts/app.blade.php')
        }
    ],
    mode: 'history'
})

export default router
