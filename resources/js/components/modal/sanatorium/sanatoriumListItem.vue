<template>
    <div class="subcategory">
        <div class="d-flex col justify-content-between align-items-center">
            <div
                v-if="subcat.sanatorium_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
                <label>{{ subcat.title }}</label>
            </div>
            <div class="d-flex align-items-center"
                 v-if="subcat.sanatorium_todo_list_id === list.id && list.user_id === card.user_id && subcat.deleted_at === null">
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
    </div>
</template>

<script>
import productControls from "../cafe/control/productControls.vue";
export default {
    name: "sanatoriumListItem",
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

            let sanatoriumProductList = localStorage.getItem('sanatoriumProductList')
            let newCafeProductList = [{
                'id': this.subcat.id,
                'product': this.subcat.title,
                'price': this.subcat.price,
                'qty': 1,
            },]

            if (!sanatoriumProductList) {
                localStorage.setItem('sanatoriumProductList', JSON.stringify(newCafeProductList))
            } else {
                sanatoriumProductList = JSON.parse(sanatoriumProductList)

                sanatoriumProductList.forEach(productInCafe => {
                    if (productInCafe.id === this.subcat.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.subcat.price
                        newCafeProductList = null
                    }
                })

                Array.prototype.push.apply(sanatoriumProductList, newCafeProductList)
                localStorage.setItem('sanatoriumProductList', JSON.stringify(sanatoriumProductList))

            }
        },
        minus() {
            this.counts = this.counts - 1;
            let sanatoriumProductList = localStorage.getItem('sanatoriumProductList')

            let newCafeProductList = [{
                'id': this.subcat.id,
                'product': this.subcat.title,
                'price': this.subcat.price,
                'qty': this.counts,
            },
            ]
            if (!sanatoriumProductList) {
                localStorage.setItem('sanatoriumProductList', JSON.stringify(newCafeProductList))
            } else {
                sanatoriumProductList = JSON.parse(sanatoriumProductList)

                sanatoriumProductList.forEach(productInCafe => {
                    if (productInCafe.id === this.subcat.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.subcat.price
                        newCafeProductList = null
                    }
                })
                Array.prototype.push.apply(sanatoriumProductList, newCafeProductList)
                localStorage.setItem('sanatoriumProductList', JSON.stringify(sanatoriumProductList))

                // console.log(sanatoriumProduct);
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
