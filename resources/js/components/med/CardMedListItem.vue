<template>
    <div class="d-flex" >
        <p>{{ title }}</p>
        <p class="ml-3">{{price}} руб</p>
        <img @click.prevent="onClickAddId(),onClickAdd()" class="icon-plus ml-3" :src="!isAdded  ? 'assets/img/plus.png' : 'assets/img/check-list.svg'" alt="">
    </div>
</template>

<script setup>
defineProps({
    title: String,
    price: Number,
    isAdded: Boolean,
    id:Number,
    onClickAdd:Function,
    onClickAddId:Function,
})
</script>
<style>
.icon-plus {
    width: 25px;
    height: 25px;
}
</style>
