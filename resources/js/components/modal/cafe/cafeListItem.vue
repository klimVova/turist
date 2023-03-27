<template>
    <div class="subcategory">
        <div class="d-flex col justify-content-between align-items-center">
            <div
                v-if="subcat.cafe_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
                <label>{{ subcat.title }}</label>
            </div>
            <div class="d-flex align-items-center"
                 v-if="subcat.cafe_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
                <div :class="subcat.price !== null ? 'd-flex' : 'd-none'">
                    <label class="price-margin">{{ subcat.price }} руб.</label>
                    <div class="align-items-center">
                        <product-controls
                            :counts="counts"
                            @minus="minus" @plus="plus"></product-controls>
                    </div>
                </div>
            </div>
        </div>
        <cafe-product-item
            v-for="product in products"
            :product="product"
            :key="`item-${index}`"
            :lists="Prlists"
            :card="Prcards"
            :items="subcat"
            :index="index"
        ></cafe-product-item>
    </div>

</template>

<script>
import cafeProductItem from "./cafeProductItem.vue";
import productControls from "./control/productControls.vue";

export default {
    name: "cafeListItem",
    components: {cafeProductItem, productControls},
    props: ['subcat', 'index', 'list', 'card', 'products'],
    data() {
        return {
            counts: 0,
            Prproducts: this.products,
            Pritems: this.subcat,
            Prcards: this.card,
            Prlists: this.list,
        }
    },
    methods: {
        plus() {
            this.counts = this.counts + 1;

            let cafeProductList = localStorage.getItem('cafeProductList')
            let newCafeProductList = [{
                'id': this.subcat.id,
                'product': this.subcat.title,
                'price': this.subcat.price,
                'qty': 1,
            },]

            if (!cafeProductList) {
                localStorage.setItem('cafeProductList', JSON.stringify(newCafeProductList))
            } else {
                cafeProductList = JSON.parse(cafeProductList)

                cafeProductList.forEach(productInCafe => {
                    if (productInCafe.id === this.subcat.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.subcat.price
                        newCafeProductList = null
                    }
                })

                Array.prototype.push.apply(cafeProductList, newCafeProductList)
                localStorage.setItem('cafeProductList', JSON.stringify(cafeProductList))

            }
        },
        minus() {
            this.counts = this.counts - 1;
            let cafeProductList = localStorage.getItem('cafeProductList')

            let newCafeProductList = [{
                'id': this.subcat.id,
                'product': this.subcat.title,
                'price': this.subcat.price,
                'qty': this.counts,
            },
            ]
            if (!cafeProductList) {
                localStorage.setItem('cafeProductList', JSON.stringify(newCafeProductList))
            } else {
                cafeProductList = JSON.parse(cafeProductList)

                cafeProductList.forEach(productInCafe => {
                    if (productInCafe.id === this.subcat.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.subcat.price
                        newCafeProductList = null
                    }
                })
                Array.prototype.push.apply(cafeProductList, newCafeProductList)
                localStorage.setItem('cafeProductList', JSON.stringify(cafeProductList))

                // console.log(cafeProduct);
            }
        },
    },
}
</script>

<style scoped>
.price-margin {
    margin-right: 20px !important;
}
</style>
