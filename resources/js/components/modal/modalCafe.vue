<template>
    <transition name="modal-animation">
        <div v-show="modalActive" class="modal-cafe">
            <transition name="modal-animation-inner">
                <div v-show="modalActive" class="modal-inner-cafe">
                    <div class=" modal-content-cafe">
                        <div class="col col-12 col-md-6 hotels-inf-item">
                            <div class="section-label section-label-mob">
                                <h2>Меню</h2>
                                <hr>
                            </div>
                            <form-picker ref="formDate"></form-picker>
                            <div class="service-list service-list-modal">
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
                                <button class="btn-total" @click.prevent="price">Cтоимость:</button>
                                <p class="price-total ">{{ totalPrice }}</p>
                            </div>

                            <button class="btn-price" @click.prevent="orderCafe">
                                {{message}}
                            </button>
                            <input class="hide" v-model="role" name="medical">
                        </div>
                        <button class="btn modal-close" @click.prevent="close"
                        >Закрыть</button>
                    </div>

                </div>
            </transition>
        </div>
    </transition>
</template>

<script>

import cafeListItem from "./cafe/cafeListItem.vue";
import FormPicker from "./FormPicker.vue";
import user from "../../user";


export default {
    name: "modalCafe",
    components: {cafeListItem, FormPicker},
    props: ['modalActive', 'elems', 'items', 'products', 'card' , 'lists'],
    setup(props, {emit}) {
        const {state} = user;
        const close = () => {
            emit('close');
        }
        return {close , state}
    },
    data() {
        return {
            date: [],
            people: [],
            totalPrice: null,
            message:'Добавить',
            order: [],
            role: 'cafe',
        }
    },
    methods: {
        storePreOreder() {
            this.axios.post('/api/preOrder', {
                'total_price': this.totalPrice,
                'date': this.$refs.formDate.date,
                'products': this.order,
                'user_id': this.state.user,
                'name_product': this. card.title,
                'image_product':this.card.image_url,
                'role' : this.role,
                'organization_email': this.card.email
            })
                .then(res => {
                    localStorage.clear()
                })
        },

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
            if (this.$refs.formDate.date === undefined) {
                this.message = 'выберите дату и время'
            }
            else if(this.$refs.formDate.date != undefined)
            {
                this.message = 'Заказ добавлен в корзину'
            }
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
            this.order = {
                date: this.$refs.formDate.date,
                people: this.$refs.formDate.countPeople,
                product: product,
                productList: productList,
                totalPrice: this.totalPrice
            }

            localStorage.setItem('orderProductCafe', JSON.stringify(this.order))
            const raw = localStorage.getItem('order')
            const orderProductCafe = JSON.parse(raw)

            this.storePreOreder()
        },
    },
    mounted() {

    }

}
</script>

<style scoped>
.modal-close {
    float: right;
    margin-top: -35px;
    text-decoration: none;
    color: #fff;
    background-color: #a11f34 !important;
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
    width: 130px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51D3B7;
}
.btn-total{
    width: 130px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51D3B7;
}
@media (max-width: 480px) {
    .modal-content-cafe {
        width: 100%;
        padding: 10px;
    }
    .section-label-mob{
        padding: 0;
    }
    .modal-close {
        float: right;
        margin-top: -45px;
        text-decoration: none;
        border-radius: 3px;
        border: none;
        z-index: 99999999999;
        position: relative;
        background-color: #a11f34 !important;
    }
    .service-list-modal{
        padding: 0;
    }

}
</style>
