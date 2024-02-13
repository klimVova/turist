<template>
    <div class=" fixed-top fixed-left drawer">
    </div>

    <div class="drawer-bg container-fluid main card">
        <DrawerHead />
        <CardItemListMed />
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
