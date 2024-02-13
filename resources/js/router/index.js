import {createRouter, createWebHistory} from 'vue-router'


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/Home.vue')
        },
        {
            path: '/consultings',
            name: 'constaling',
            component: () => import('../views/Constaling.vue')
        },
        {
            path: '/constaling',
            name: 'const',
            component: () => import('../views/Constaling.vue')
        },
        {
            path: '/about-company/rules-organization',
            name: 'fororganization',
            component: () => import('../views/ForOrganization.vue'),
            children: [
                {
                    path: 'instruction-cafe',
                    name: 'instruction-cafe',
                    component: () => import('../views/instruction/Cafe.vue')
                },
                {
                    path: 'instruction-hotel',
                    name: 'instruction-hotel',
                    component: () => import('../views/instruction/Hotel.vue')
                },
                {
                    path: 'instruction-medical',
                    name: 'instruction-medical',
                    component: () => import('../views/instruction/Medical.vue')
                },
                {
                    path: 'instruction-spa',
                    name: 'instruction-spa',
                    component: () => import('../views/instruction/Spa.vue')
                },
                {
                    path: 'instruction-sanatorium',
                    name: 'instruction-sanatorium',
                    component: () => import('../views/instruction/Sanatorium.vue')
                },
                {
                    path: 'instruction-tur',
                    name: 'instruction-tur',
                    component: () => import('../views/instruction/Tur.vue')
                },
                {
                    path: 'instruction-sport',
                    name: 'instruction-sport',
                    component: () => import('../views/instruction/Sport.vue')
                },
            ]
        },
        {
            path: '/about-company/rules-client',
            name: 'forclient',
            component: () => import('../views/ForClient.vue')
        },
        {
            path: '/about-company/ecosistem',
            name: 'ecosistem',
            component: () => import('../views/Ecosistem.vue')
        },
        {
            path: '/contact',
            name: 'contact',
            component: () => import('../views/Contact.vue')
        },
        {
            path: '/basket',
            name: 'basket',
            component: () => import('../components/Basket.vue')
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
                {
                    path: 'hotel',
                    name: 'hotel',
                    component: () => import('../views/Hostel.vue')
                },
                {
                    path: 'sanatorium',
                    name: 'sanatorium',
                    component: () => import('../views/Sanatoruim.vue')
                },
                {
                    path: 'tur',
                    name: 'tur',
                    component: () => import('../views/Tur.vue')
                },
                {
                    path: 'sport',
                    name: 'sport',
                    component: () => import('../views/Sport.vue')
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
            path: '/hotel/:id',
            name: 'hotel_card',
            component: () => import('../views/hostelCard.vue')
        },
        {
            path: '/sanatorium/:id',
            name: 'sanatorium_card',
            component: () => import('../views/sanatoriumCard.vue')
        },
        {
            path: '/sport/:id',
            name: 'sport_card',
            component: () => import('../views/sportCard.vue')
        },
        {
            path: '/tur/:id',
            name: 'tur_card',
            component: () => import('../views/turCard.vue')
        },
        {
            path: '/blog/:id',
            name: 'single_blog',
            component: () => import('../views/blogItem.vue')
        },
        {
            path: '/consult/:id',
            name: 'constaling_card',
            component: () => import('../views/constalingCard.vue')
        },
        {
            path: '/police',
            name: 'police',
            component: () => import('../views/Police.vue')
        },
        {
            path: '/payment',
            name: 'payment',
            component: () => import('../views/Payment.vue')
        },
    ],
    mode: 'history'
})

export default router
