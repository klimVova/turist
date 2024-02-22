<template>
    <div class="section-label">
        <h2>Услуги</h2>
        <CardButtons
            :onClickAddId="()=>emit('addToCartId', card)"
            :isAddedId="false"
        />
        <hr>
    </div>
</template>

<script setup>
import CardButtons from "./CardButtons.vue";
const emit = defineEmits(['addToCartId'])

defineProps({
    items:Object  ,
    categories:Object  ,
    card:Object  ,
})
</script>

<style scoped>

</style>
