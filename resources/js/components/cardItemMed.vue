<template>
    <div class="d-flex cardItem justify-content-between mt-md-3">
        <p>{{title}}</p>
        <p class="ml-3">{{price}}</p>
        <span @click="emit('onClickPusik')">+</span>
        <p >{{ qty }}</p>
        <img @click="emit('onClickRemove')" class="itemRemove" src="assets/img/close.svg" alt="">
    </div>
</template>

<script setup>
import {ref} from 'vue'
const emit = defineEmits(['onClickRemove','onClickPusik'])


const props = defineProps({
    id:Number,
    title: String,
    price: String,
    qty: Number,
    })

const count = ref(props.qty)

const plus = function(){
   const qty = count.value++;
}

</script>
<style>
.itemRemove{
    width: 25px;
    height: 25px;
}
</style>
