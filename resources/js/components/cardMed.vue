<template>	
    <div class="d-flex">
        <p>{{ title }}</p>
        <p class="ml-3">{{price}}</p>
        <img @click.prevent="onClickAdd" class="icon-plus ml-3" :src="!isAdded ? 'assets/img/plus.png' : 'assets/img/check-list.svg'" alt="">
    </div>   
</template>

<script setup>
defineProps({
    title: String,
    price: String, 
    isAdded: Boolean,
    onClickAdd:Function,
})
</script>
<style>
.icon-plus {
    width: 25px;
    height: 25px;
}
</style>