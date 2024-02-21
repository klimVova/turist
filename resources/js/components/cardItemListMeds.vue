<template>
    <div class="col">
        <h4 v-if="cart.length != 0">{{ title }}</h4>
    </div>
    <cardItemMed v-for="item in cart"
        :key="item.id"
        :title="item.title"
        :price="item.price"
        :qty="item.qty"
        :cart_id='item.medical_todo_list_id'
        :user_id='userId'
        :titleOrg="titleOrg"
        @onClickRemove="()=>removeFromCart(item)"
        @onClickPlusik = "()=>plusCount(item)"
        @onClickMinus = "()=>minusCount(item)"
        @onCkickremoveId="()=>removeCardID(card)"   />
</template>

<script setup>
import {inject} from "vue";
import cardItemMed  from "./cardItemMed.vue";
const props = defineProps({
    title: String,
    user_id:Number,
    card:Array,
})
const titleOrg=props.title;
const userId=props.user_id
const card = props.card
const {cart , removeFromCart, plusCount, minusCount} = inject('cart')
const {id , removeCardID} = inject('id')

</script>