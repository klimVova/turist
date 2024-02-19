<template>
    <div class="service-list">
        <h1>Категория</h1>
        <cardItemMed v-for="item in cart"
        :key="item.id"
        :title="item.title"
        :price="item.price"
        :qty="item.qty"
        @onClickRemove="()=>removeFromCart(item)" 
        @onClickPlusik = "()=>plusCount(item)"
        @onClickMinus = "()=>minusCount(item)"   />
    </div>
</template>

<script setup>

import {inject} from "vue";
import cardItemMed  from "./cardItemMed.vue";


const {cart , removeFromCart, plusCount, minusCount} = inject('cart')

</script>
