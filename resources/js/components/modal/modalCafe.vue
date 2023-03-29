<template>
    <transition name="modal-animation">
        <div v-show="modalActive" class="modal-cafe">
            <transition name="modal-animation-inner">
                <div v-show="modalActive" class="modal-inner-cafe">
                    <div class=" modal-content-cafe">
                        <div class="col col-12 col-md-6 hotels-inf-item">
                            <div class="section-label">
                                <h2>Услуги</h2>
                                <hr>
                            </div>
                            <form-picker ref="formDate"></form-picker>
                            <div class="service-list">
                                <!-- <div class="service-item"> -->
                                <div v-for="list in lists" class="category fadeInUp wow animated"
                                     style="visibility: visible; animation-name: fadeInUp;">
                                    <label v-if="list.user_id === card.user_id"><span :id="`${list.title}`"></span>{{
                                            list.title
                                        }}</label>

                                    <cafe-list-item
                                        v-for="( subcat ,index) in items"
                                        :ref="`item-${index}`"
                                        :subcat="subcat"
                                        :key="`item-${index}`"
                                        :list="list"
                                        :card="card"
                                        :items="items"
                                        :index="index"
                                        :products="products"
                                    ></cafe-list-item>
                                </div>
                                <!-- </div> -->
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn badge-btn btn-price" @click.prevent="price">стоимость:</button>
                                <p class="price-total ">{{ totalPrice }}</p>
                            </div>

                            <button class="btn btn-success mt-3 btn-price" @click.prevent="orderCafe">
                                {{message}}
                            </button>
                        </div>
                        <button class="btn btn-danger modal-close" @click.prevent="close"
                        >Close</button>
                    </div>

                </div>
            </transition>
        </div>
    </transition>
</template>

<script>

import cafeListItem from "./cafe/cafeListItem.vue";
import FormPicker from "./FormPicker.vue";


export default {
    name: "modalCafe",
    components: {cafeListItem, FormPicker},
    props: ['modalActive', 'lists', 'items', 'products', 'card'],
    setup(props, {emit}) {
        const close = () => {
            emit('close');
        }
        return {close}
    },
    data() {
        return {
            date: [],
            people: [],
            totalPrice: null,
            message:'Добавить',
        }
    },
    methods: {
        price() {
            const raws = localStorage.getItem('cafeProduct')
            const product = JSON.parse(raws)

            const calculatePrice = (total) => {
                if (total === null) {
                    return 0;
                } else if (total.length === 0) {
                    return 0;
                } else {
                    return total.reduce((acc, curr) => (Number(acc) + Number(curr.price)), 0);
                }
            }

            const rawsList = localStorage.getItem('cafeProductList')
            const productList = JSON.parse(rawsList)
            const calculatePriceList = (totals) => {
                if (totals === null) {
                    return 0;
                } else if (totals.length === null) {
                    return 0;
                } else {
                    return totals.reduce((acc, curr) => (Number(acc) + Number(curr.price)), 0);
                }
            }
            if (calculatePrice(product) === 0) {
                this.totalPrice = 0 + calculatePriceList(productList)
            } else if (calculatePriceList(productList) === 0) {
                this.totalPrice = 0 + calculatePrice(product)
            } else if (calculatePrice(product) === 0 && calculatePriceList(productList) === 0) {
                this.totalPrice = 0
            } else {
                this.totalPrice = calculatePrice(product) + calculatePriceList(productList)
            }
        },
        orderCafe() {
             this.message='Заказ добавлен в корзину'
            const raws = localStorage.getItem('cafeProduct')
            const product = JSON.parse(raws)

            const rawsList = localStorage.getItem('cafeProductList')
            const productList = JSON.parse(rawsList)
            const calculatePrice = (total) => {
                if (total === null) {
                    return 0;
                } else if (total.length === 0) {
                    return 0;
                } else {
                    return total.reduce((acc, curr) => (Number(acc) + Number(curr.price)), 0);
                }
            }
            const calculatePriceList = (totals) => {
                if (totals === null) {
                    return 0;
                } else if (totals.length === null) {
                    return 0;
                } else {
                    return totals.reduce((acc, curr) => (Number(acc) + Number(curr.price)), 0);
                }
            }
            if (calculatePrice(product) === 0) {
                this.totalPrice = 0 + calculatePriceList(productList)
            } else if (calculatePriceList(productList) === 0) {
                this.totalPrice = 0 + calculatePrice(product)
            } else if (calculatePrice(product) === 0 && calculatePriceList(productList) === 0) {
                this.totalPrice = 0
            } else {
                this.totalPrice = calculatePrice(product) + calculatePriceList(productList)
            }
            const totalPrice = this.totalPrice
            const order = {
                date: this.$refs.formDate.date,
                people: this.$refs.formDate.countPeople,
                product: product,
                productList: productList,
                totalPrice: this.totalPrice
            }

            localStorage.setItem('orderProductCafe', JSON.stringify(order))
            const raw = localStorage.getItem('order')
            const orderProductCafe = JSON.parse(raw)
        },
    },
    mounted() {
        console.log(this.$refs.formDate.countPeople);
        console.log(this.$refs.formDate.date);

    }

}
</script>

<style scoped>
.modal-close {
    float: right;
    margin-top: -35px;
    text-decoration: none;

}

.modal-animation-enter-active,
.modal-animation-leave-active {
    transition: opacity .8s cubic-bezier(.52, .02, .19, 1.02);

}

.modal-animation-enter-from,
.modal-animation-leave-to {
    opacity: 0;
}

.modal-cafe {

    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0, 0, 0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

.modal-content-cafe {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.hide {
    display: none;
}

.price-total {
    margin: 0 !important;
    padding-left: 20px;
    font-size: 24px;
}

.btn-price {
    margin: 0;
}
.disabled{
    pointer-events: none !important;
    opacity: 0.3;
}
</style>
