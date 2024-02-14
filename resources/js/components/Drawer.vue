<template>
    <div class=" fixed-top fixed-left drawer">
    </div>

    <div class="drawer-bg container-fluid main card">
        <DrawerHead />
        <CardItemListMed />

        <div class="">
            <div class="d-flex justify-content-between">
                <span>итого:</span>
                <b>12339 руб</b>
            </div>
            <div class="d-flex justify-content-between">
                <span>налог 5%:</span>
                <b>123 руб</b>
            </div>
            <button class="btn btn-success w-25">Заказать</button>
        </div>
    </div>
</template>

<script>
import DrawerHead from "./DrawerHead.vue";
import CardItemListMed from "./CardItemListMed.vue"

export default {
	components:{
        DrawerHead,
        CardItemListMed
    }
}
</script>
