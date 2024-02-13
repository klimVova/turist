<template>
    <div class="service-list">
        <h1>Категория </h1>
        <cardItemMed />
        <cardItemMed />
        <cardItemMed />
        <cardItemMed />
    </div>
</template>

<script>
import cardItemMed  from "./cardItemMed.vue";

export default {
    components: {
        cardItemMed,
    },
}
</script>
