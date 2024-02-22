<template>
    <img @click.prevent="onClickAddId()" class="icon-plus ml-3" :src="!isAddedId  ? 'assets/img/plus.png' : 'assets/img/check-list.svg'" alt="">
</template>

<script setup>
defineProps({
    onClickAddId:Function,
    isAddedId: Boolean,
})
</script>

<style scoped>

</style>
