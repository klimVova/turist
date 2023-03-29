<template>
    <transition name="modal-animation">
        <div v-show="modalActive" class="modal-cafe">
            <transition name="modal-animation-inner">
                <div v-show="modalActive" class="modal-inner-cafe">
                    <div class=" modal-content-cafe">
                        <div class="col col-12 col-md-12 hotels-inf-item">
                            <div class="section-label">
                                <h2>Номера</h2>
                                <hr>
                            </div>
                            <form-picker-select ref="formDate"></form-picker-select>
                            <div class="rooms" v-for="post in posts">
                                <template v-if="post.id === modalPost">
                                    <div v-if="post.user_id === card.user_id" class="rooms-item  mb-5" id="rooms-item">
                                        <div class="rooms-item__line">
                                            <div class='slides'>
                                                <swiper
                                                    :images="post.image_post"
                                                ></swiper>
                                            </div>
                                        </div>
                                        <label :id="`${post.category}`">{{ post.category }}<br>({{ post.berth }}
                                            спальное
                                            место)</label>
                                        <ul>
                                            <li v-for="tag in post.tags"><img
                                                src="assets/img/check-list.svg">{{ tag.title }}
                                            </li>
                                        </ul>
                                        <label class="cost">{{ post.price }}р за сутки</label>
                                        <label :class="sumPrice === null ? 'hide' : 'cost'">Общая стоимость {{ sumPrice }}р</label>
                                        <input type="submit" @click.prevent="orderHostel(post.id)"
                                               :class="(this.$refs.formDate.date === undefined ||
                                               this.$refs.formDate.date === null
                                               ) ? 'disabled' : ''"
                                               :value="post.id === id ? message: 'Забронировать'">
                                    </div>
                                </template>
                            </div>
                        </div>
                        <button class="btn btn-danger modal-close" @click.prevent="close"
                        >Close
                        </button>
                    </div>

                </div>
            </transition>
        </div>
    </transition>
</template>

<script>


import swiper from "../swiper.vue";
import FormPickerSelect from "./FormPickerSelect.vue";

export default {
    name: "modalHostel",
    components: {FormPickerSelect, swiper},
    props: ['modalActive', 'posts', 'card', 'modalPost'],
    setup(props, {emit}) {
        const close = () => {
            emit('close');
        }
        return {close}
    },
    data() {
        return {
            date: [],
            post: this.posts,
            title: null,
            price: null,
            category: null,
            id:null,
            message: 'Забронировать',
            sumPrice:null,
            start: null,
            end:null,
            srartnMM:null,
            endMM:null,
            days:null,
        }
    },
    methods: {
        orderHostel(id) {

            this.days = this.$refs.formDate.date

            this.start =  Number(this.days[0].substr(0,2))
            this.end =  Number(this.days[1].substr(0,2))
            this.startMM = Number(this.days[0].substr(3,2))
            this.endMM = Number(this.days[1].substr(3,2))

            if(this.endMM > this.startMM && this.startMM === 3 || this.startMM === 1 || this.startMM === 5 || this.startMM === 7 || this.startMM === 8 ||this.startMM === 10||this.startMM === 12) {
                this.day = (this.end  - this.start)+32
            }else if(this.endMM > this.startMM && this.startMM === 2){
                this.day =(this.end  - this.start)+29
            } else if(this.endMM > this.startMM && this.startMM === 4 || this.startMM === 6 || this.startMM === 9 || this.startMM === 11 ){
                this.day =(this.end  - this.start)+31
            } else {
                this.day = this.end  - this.start
            }
            console.log( this.day);

            this.message = 'Номер добавлен в корзину'
            this.posts.forEach(post => {
                if (post.id === id) {
                    this.id = post.id
                    this.title = post.title
                    this.price = post.price
                    this.category = post.category
                }
            })
         if(this.$refs.formDate.date === undefined){
            this.message = 'Укажите дату'
         }
         this.sumPrice = this.price*this.day
            const order = {
                date: this.$refs.formDate.date,
                id: this.id,
                title: this.title,
                price: this.sumPrice,
                category: this.category
            }

            localStorage.setItem('orderHostel', JSON.stringify(order))
            const raw = localStorage.getItem('order')
            const orderHostel = JSON.parse(raw)

        },
    },
    mounted() {
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
.disabled{
    pointer-events: none !important;
    opacity: 0.3;
}
</style>
