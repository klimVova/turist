<template>
    <div class="wrapper">
        <Drawer v-if="drawerOpen" />
        <Header @openDrawer="openDrawer" />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script setup>
import {ref , provide} from 'vue'
import Header from "./components/Header.vue"
import user from "./user";
import Drawer from "./components/Drawer.vue"
import Footer from "./components/Footer.vue";

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
    item.isAdded = true
}
const removeFromCart = (item) => {
    cart.value.splice(cart.value.indexOf(item), 1)
    item.isAdded = false
}
const onClickAddPlus = (item) => {
    if(!item.isAdded){
       addToCart(item)
    }else{
        removeFromCart(item)
    }
    console.log(cart)
}
provide('cart',{
    cart,
    closeDrawer,
    openDrawer,
    onClickAddPlus,
    removeFromCart
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
