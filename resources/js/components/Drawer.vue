<template>
    <div class=" fixed-top fixed-left drawer">
    </div>
    <div class="drawer-bg container-fluid main card">
        <DrawerHead />
        <CardItemListMed />
        <div class="">
            <div class="d-flex justify-content-between">
                <span>итого:</span>
                <b>{{ totalPrice }}</b>
            </div>
            <button class="btn btn-success w-25">Заказать</button>
        </div>
    </div>
</template>

<script setup>
import DrawerHead from "./DrawerHead.vue";
import CardItemListMed from "./CardItemListMed.vue"

defineProps({
    totalPrice: Number,
})
</script>
<style>
   .drawer-bg {overflow-y: auto;} 
</style>