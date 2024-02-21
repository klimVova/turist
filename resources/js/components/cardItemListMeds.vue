<template>
    <div class="col">
        <h4 v-if="cart.length != 0">{{ title }}{{index}}</h4>
    </div>
    <cardItemMed v-for="item in cart"
                 :key="item.id"
                 :title="item.title"
                 :price="item.price"
                 :qty="item.qty"
                 :cart_id='item.medical_todo_list_id'
                 :isAdd="item.isAdded"
                 :user_id='userId'
                 :elem="cart.length"
                 :i="index"
                 @onClickRemove="()=>removeFromCart(item , card)"
                 @onClickPlusik="()=>plusCount(item)"
                 @onClickMinus="()=>minusCount(item)"
                 @onCkickremoveId="()=>removeCardID(card, index , item, cart)"/>
</template>

<script setup>
import {inject} from "vue";
import cardItemMed from "./cardItemMed.vue";

const props = defineProps({
    title: String,
    user_id: Number,
    card: Array,
    index:Number
})
const titleOrg = props.title;
const userId = props.user_id
const card = props.card
const index= props.index
const {cart, removeFromCart, plusCount, minusCount} = inject('cart')
const {id, removeCardID} = inject('id')

</script>
