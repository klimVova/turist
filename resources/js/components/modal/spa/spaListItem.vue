<template>
    <div class="subcategory">
        <div class="med-list  col">
            <div
                v-if="subcat.spa_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
                <label class="med-list-title">{{ subcat.title }}</label>
            </div>
            <div class="med-list-item"
                 v-if="subcat.spa_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
                <div :class="subcat.price !== null ? 'd-flex' : 'd-none'">
                    <label class="price-margin">{{ subcat.price }} руб.</label>
                    <div class="list-control">
                        <product-controls
                            :counts="counts"
                            @minus="minus" @plus="plus"></product-controls>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import productControls from "../cafe/control/productControls.vue";
export default {
    name: "spaListItem",
    components: {productControls},
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

            let spaProductList = localStorage.getItem('spaProductList')
            let newCafeProductList = [{
                'id': this.subcat.id,
                'product': this.subcat.title,
                'price': this.subcat.price,
                'qty': 1,
            },]

            if (!spaProductList) {
                localStorage.setItem('spaProductList', JSON.stringify(newCafeProductList))
            } else {
                spaProductList = JSON.parse(spaProductList)

                spaProductList.forEach(productInCafe => {
                    if (productInCafe.id === this.subcat.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.subcat.price
                        newCafeProductList = null
                    }
                })

                Array.prototype.push.apply(spaProductList, newCafeProductList)
                localStorage.setItem('spaProductList', JSON.stringify(spaProductList))

            }
        },
        minus() {
            this.counts = this.counts - 1;
            let spaProductList = localStorage.getItem('spaProductList')

            let newCafeProductList = [{
                'id': this.subcat.id,
                'product': this.subcat.title,
                'price': this.subcat.price,
                'qty': this.counts,
            },
            ]
            if (!spaProductList) {
                localStorage.setItem('spaProductList', JSON.stringify(newCafeProductList))
            } else {
                spaProductList = JSON.parse(spaProductList)

                spaProductList.forEach(productInCafe => {
                    if (productInCafe.id === this.subcat.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.subcat.price
                        newCafeProductList = null
                    }
                })
                Array.prototype.push.apply(spaProductList, newCafeProductList)
                localStorage.setItem('spaProductList', JSON.stringify(spaProductList))

                // console.log(spaProduct);
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
