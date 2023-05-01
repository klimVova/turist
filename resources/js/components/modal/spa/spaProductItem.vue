<template>
    <div>
        <div class="d-flex col justify-content-between align-items-center"
             v-if="product.spa_todo_item_id === items.id && items.spa_todo_list_id === lists.id && lists.user_id === card.user_id && product.deleted_at === null ">
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

    </div>
</template>

<script>
import productControls from "../cafe/control/productControls.vue";

export default {
    name: "spaProductItem",
    components: {productControls},
    props: ['product', 'index', 'lists', 'card', 'items'],
    data() {
        return {
            counts: 0,
            col: 12,
        }
    },
    methods: {
        plus() {
            this.counts = this.counts + 1;

            let spaProduct = localStorage.getItem('spaProduct')
            let newCafeProduct = [{
                'id': this.product.id,
                'product': this.product.title,
                'price': this.product.price,
                'qty': 1,
            },]

            if (!spaProduct) {
                localStorage.setItem('spaProduct', JSON.stringify(newCafeProduct))
            } else {
                spaProduct = JSON.parse(spaProduct)

                spaProduct.forEach(productInCafe => {
                    if (productInCafe.id === this.product.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.product.price
                        newCafeProduct = null
                    }
                })

                Array.prototype.push.apply(spaProduct, newCafeProduct)
                localStorage.setItem('spaProduct', JSON.stringify(spaProduct))

            }
        },
        minus() {
            this.counts = this.counts - 1;
            let spaProduct = localStorage.getItem('spaProduct')

            let newCafeProduct = [{
                'id': this.product.id,
                'product': this.product.title,
                'price': this.product.price,
                'qty': this.counts,
            },
            ]
            if (!spaProduct) {
                localStorage.setItem('spaProduct', JSON.stringify(newCafeProduct))
            } else {
                spaProduct = JSON.parse(spaProduct)

                spaProduct.forEach(productInCafe => {
                    if (productInCafe.id === this.product.id) {
                        productInCafe.qty = this.counts
                        productInCafe.price = Number(productInCafe.qty) * this.product.price
                        newCafeProduct = null
                    }
                })
                Array.prototype.push.apply(spaProduct, newCafeProduct)
                localStorage.setItem('spaProduct', JSON.stringify(spaProduct))

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
