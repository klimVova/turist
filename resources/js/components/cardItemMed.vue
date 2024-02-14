<template>
    <div class="d-flex cardItem justify-content-between mt-md-3">
        <p>{{title}}</p>
        <p class="ml-3">{{price}}</p>
        <img @click="emit('onClickRemove')" class="itemRemove" src="assets/img/close.svg" alt="">
    </div>
</template>

<script setup>
const emit = defineEmits(['onClickRemove'])
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
