<template>
    <transition name="modal-animation">
        <div v-show="modalActive" class="modal-cafe">
            <transition name="modal-animation-inner">
                <div v-show="modalActive" class="modal-inner-cafe">
                    <div class=" modal-content-cafe">
                        <form action="">
                            <div class="col col-12 col-md-12 hotels-inf-item d-flex justify-content-sm-center">
                                <div class="section-label section-label-mob">
                                    <div class="profile-data-item">
                                        <label class="input_text">Название компании</label>
                                        <input class="edit-dis" type="text" name="surname" v-model="company_name" >
                                    </div>
                                    <div class="profile-data-item">
                                        <label class="input_text">Сообщение</label><br>
                                        <textarea class="edit-dis-text" type="text" name="messages"
                                                  v-model="messages" ></textarea>
                                    </div>
                                    <div>
                                    <input class="button_form"
                                           type="submit"
                                           :value="message"
                                           @click.prevent ='getOrder'
                                    />
                                </div>
                            </div>
                    </div>

                    <button class="btn  modal-close" @click.prevent="close"
                    >Закрыть
                    </button>
                    </form>
                </div>
        </div>
    </transition>
    </div>

    </transition>
</template>

<script>

import swiper from "../swiper.vue";
import FormPickerSelect from "./FormPickerSelect.vue";
import SportListItem from "./sport/sportListItem.vue";
import user from "../../user";

export default {
    name: "modalConstaling",
    components: {SportListItem, FormPickerSelect, swiper},
    props: ['modalActive', 'card'],
    setup(props, {emit}) {
        const {state} = user;
        const close = () => {
            emit('close');
        }
        return {close, state}
    },
    data() {
        return {
            order: [],
            role: 'const',
            messages: null,
            company_name: null,
            users: null,
            message: 'Отправить заявку'
        }
    },
    methods: {
        getUsers() {
            this.axios.get('/api/users/')
                .then(res => {
                    this.users = res.data.data;
                })
        },
        getOrder() {
            this.axios.post(`/api/consulting/orders`, {
                'messages': this.messages,
                'company_name': this.company_name,
                'card_id': this.card.id,
                'user_id': this.state.user,
            })
                .then(res => {
                    if(this.messages != null || this.company_name != null){
                    this.messages = ''
                    this.company_name = ''
                    this.message = 'Заявка отправлена'}
                })
        },

    },
    mounted() {
        this.getUsers()
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
    z-index: 99999999999;
    position: relative;
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
    left: 25%;
    top: 10%;
    width: 40%; /* Full width */
    height: 65%; /* Full height */
    background-color: rgb(0, 0, 0); /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    overflow: hidden; /* Скрываем scrollbars */
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

.price-total-san {
    font-size: 14px;
    font-weight: 700;
    color: #505050;
    margin: 0;
    padding-top: 12px;
    padding-bottom: 12px;
}

.btn-price-san {
    width: 230px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51D3B7;
}

.btn-total {
    width: 130px;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    background-color: #51D3B7;
}

.slides {
    width: 170px;
}

.input_text {
    font-weight: 700;
    font-size: 12px;
    color: rgba(81, 211, 183, 1);
}

.button_form {
    width: 200px;
    height: 50px;
    background-color: rgba(81, 211, 183, 1);
    border-radius: 3px;
    border: none;
    color: #fff;
    padding: 12px 24px;
}

.edit-dis-text {
    display: block;
    width: 201px;
    border: 2px solid #51D3B7;
    padding: 4px 12px;
}

@media (max-width: 480px) {
    .modal-content-cafe {
        width: 100%;
        padding: 10px;
    }

    .section-label-mob {
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

    .service-list-modal {
        padding: 0;
    }

    .item-hostel {
        width: 100%;
        margin-left: 0;
    }

    .price-total {
        margin: 0 !important;
        padding-left: 0px;
        font-size: 12px;
    }

    .slides {
        width: 100%;
    }

    .btn-price-san {
        width: 150px;
        border: none;
        padding: 5px;
        margin-top: 5px;
        border-radius: 3px;
        background-color: #51D3B7;
        font-size: 16px;
    }

}
</style>


