<template>

    <div class="d-flex col justify-content-between align-items-center"
         v-if="product.cafe_todo_item_id === items.id && items.cafe_todo_list_id === lists.id && lists.user_id === card.user_id && product.deleted_at === null ">
        <p>{{ product.title }}</p>
        <div class="d-flex align-items-center">
            <label class="price-margin">{{ product.price }} руб.</label>
            <div class="align-items-center">
                <product-controls
                    :counts="counts"
                    @minus="minus" @plus="plus"></product-controls>
            </div>

        </div>
    </div>

</template>

<script>
import productControls from "./control/productControls.vue";

export default {
    name: "cafeProductItem",
    components: {productControls},
    props: ['product', 'index', 'lists', 'card', 'items'],
    data() {
        return {
            counts: 0
        }
    },
    methods: {
        plus() {
            this.counts = this.counts + 1;
        },
        minus() {
            this.counts = this.counts - 1;
        }
    }
}
</script>

<style scoped>
.price-margin{
    margin-right: 20px !important;
}
</style>
