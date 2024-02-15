<template>
    <div class="d-flex cardItem justify-content-between mt-md-3">
        <p>{{title}}</p>
        <p class="ml-3">{{price}}</p>
        <img @click="emit('onClickRemove')" class="itemRemove" src="assets/img/close.svg" alt="">
        <p>{{ counts }}</p>
        <button @click="plusProd">+</button>
    </div>
</template>

<script setup>
import {ref} from 'vue'
const emit = defineEmits(['onClickRemove'])
const counts = ref(0)
function plusProd (){
    counts.value++
}
    defineProps({
        id:Number,
        title: String,
        price: String,

    })
</script>
<style>
.itemRemove{
    width: 25px;
    height: 25px;
}
</style>
