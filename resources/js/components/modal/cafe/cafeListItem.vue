<template>
    <div class="subcategory">
        <div class="med-list  col">
            <div
                v-if="subcat.cafe_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
                <label class="med-list-title">{{ subcat.title }}</label>
            </div>
            <div class="med-list-item"
                 v-if="subcat.cafe_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
                <div :class="subcat.price !== null ? 'd-flex' : 'd-none'">
                    <label class="price-margin">{{ subcat.price }} руб.</label>
                    <div class="list-control ">
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

            }
        },
    },
}
</script>

<style scoped>
.price-margin {
    margin-right: 20px !important;
}
.med-list{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.med-list-item{
    display:flex;
    align-items: center;
}
.list-control{
    display: flex;
    align-items: center;
}
@media (max-width: 480px){
    .med-list{
        display: flex;
        align-items: start;
        justify-content: space-between;
    }
    .med-list-item{
        display:flex;

        justify-content: space-between;
    }
    .med-list-title{

    }
    .price-margin{
        margin: 0;
        width: 50px;
    }
    .list-control{
        display: flex;
    }
}
</style>
