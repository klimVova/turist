<template>
    <div class="d-flex cardItem justify-content-between mt-md-3">
        <p>{{title}}</p>
        <p class="ml-3">{{price}}</p>
        <span @click="emit('onClickPlusik')">+</span>
        <p >{{ qty }}</p>
        <span :class="qty<=1 ? 'disabled' : '' " @click="emit('onClickMinus')">-</span>
        <img @click="emit('onClickRemove')" class="itemRemove" src="assets/img/close.svg" alt="">
    </div>
</template>

<script setup>
import {ref} from 'vue'
const emit = defineEmits(['onClickRemove','onClickPusik', 'onClickMinus'])


const props = defineProps({
    id:Number,
    title: String,
    price: String,
    qty: Number,
    })

</script>
<style>
.itemRemove{
    width: 25px;
    height: 25px;
}
.disabled{
    display:none;
}
</style>
