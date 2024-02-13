<template>
    <div class="container-fluid slider-block">
        <navCart />
        <div class="search fadeInUp wow">
            <UiFilter ref="index"></UiFilter>
        </div>
    </div>
    <newBaner />    
    <blog></blog>
</template>

<script>

import blog from "../components/homeComponents/blog.vue";
import UiFilter from "../components/homeComponents/UiFilter.vue";
import newBaner from "../components/homeComponents/newBaner.vue";
import navCart from "../components/homeComponents/navCart.vue";

export default {
    name: "Home",
    components: {
        newBaner,
        UiFilter,
        blog,
        navCart,
    },
}
</script>

<style scoped>
.color_baner {
    color: #08366A !important;
}
</style>
