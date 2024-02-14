<template>
    <div class="service-list">
        <h1>Категория</h1>
        <cardItemMed v-for="item in cart"
        :key="item.id"
        :title="item.title"
        :price="item.price"
        @onClickRemove="()=>removeFromCart(item)"/>
    </div>
</template>

<script setup>
import {inject} from "vue";
import cardItemMed  from "./cardItemMed.vue";
const {cart , removeFromCart} = inject('cart')

</script>
