<template>
    <div class="wrapper">
        <Drawer :totalPrice="totalPrice" v-if="drawerOpen" />
        <Header :totalPrice="totalPrice" @openDrawer="openDrawer" />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script setup>
import {ref , provide, computed} from 'vue'
import Header from "./components/Header.vue"
import user from "./user";
import Drawer from "./components/Drawer.vue"
import Footer from "./components/Footer.vue";
import cafeProductItemVue from './components/modal/cafe/cafeProductItem.vue';

const state = user;
const cart= ref([])
const id= ref([])

const drawerOpen=ref(false)

const closeDrawer = () => {
    drawerOpen.value = false
}

const openDrawer = () => {
    drawerOpen.value = true
}

const addToCart = (card,category,item) => {
    cart.value.push(item)
    item.isAdded = true
    const el = JSON.parse(JSON.stringify(cart.value))
        if(card.id === 2 && item.medical_todo_list_id === category.id && category.user_id === card.user_id && item.deleted_at === null){   
            let arr =el;
            let len = arr.length;
            for (let i = 0; i < len; i++) {
                card.products=[arr[i]]
            console.log(card.products);
        }
    }
}
const pushAddCard = (card,category,item) => {
    id.value.push(card)
    card.isAddedId = true
    console.log(card.products)
}
const removeCardID = (card , index, item, cart) => {
    id.value.splice(id.value.indexOf(card), 1)
    card.isAddedId = false
    removeFromCart(item)
}
const addToCartId = (card, category,item) => {
    if(!card.isAddedId){
        pushAddCard(card,category,item)
    }else{
        //removeCardID(card)
    }
}

const removeFromCart = (item) => {
    cart.value.splice(cart.value.indexOf(item), 1)
    item.isAdded = false
    item.qty = 1
}

const onClickAddPlus = (card, category,item) => {
    if(!item.isAdded){
       addToCart(card, category,item)
    }else{
        removeFromCart(item)
    }
}

const plusCount = (item) => {
    item.qty++
}

const minusCount = (item) => {
    item.qty--
}

const totalPrice = computed(() => cart.value.reduce((acc,item) => acc + Number(item.price)*Number(item.qty), 0))

provide('cart',{
    cart,
    closeDrawer,
    openDrawer,
    onClickAddPlus,
    removeFromCart,

    plusCount,
    minusCount,

})
provide('id',{
    id,
    addToCartId,
       removeCardID,
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
