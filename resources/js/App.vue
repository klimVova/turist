<template>
    <div class="wrapper">
        <Drawer v-if="drawerOpen" /> 
        <Header @openDrawer="openDrawer" />
        <router-view></router-view>
        <footer />
    </div>
</template>

<script setup>
import {ref , provide} from 'vue'
import Header from "./components/Header.vue"
import user from "./user";
import footer from "./components/footer.vue"
import Drawer from "./components/Drawer.vue"

const state = user;
const cart= ref([])



const drawerOpen=ref(false)
const closeDrawer = () => {
    drawerOpen.value = false
}
const openDrawer = () => {
    drawerOpen.value = true
}

const addToCart = (item) => {
    cart.value.push(item)
    console.log(item)
}

provide('cartActions',{
    closeDrawer,
    openDrawer,
    addToCart
})
</script>

<style>

@media (min-width: 481px) {
    .mob-menu-div {
        display: none;
    }
}

@media (max-width: 481px) {
    .div {
        display: none;
    }

    .menu ul li a ul:hover {
        display: block;
    }
}
</style>
