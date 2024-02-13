<template>	
    <div class=" fixed-top fixed-left drawer">
    </div>

    <div class="drawer-bg container-fluid main card">
        <DrawerHead />
        <CardItemMed />
    </div>
</template>

<script>
import DrawerHead from "./DrawerHead.vue";
import CardItemMed from "./cardItemMed.vue"
export default {
	components:{
        DrawerHead,
        CardItemMed
    }
}
</script>
