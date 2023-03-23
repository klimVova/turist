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
                            <form-picker></form-picker>
                            <div class="service-list">
                                <!-- <div class="service-item"> -->
                                <div v-for="list in lists" class="category fadeInUp wow animated"
                                     style="visibility: visible; animation-name: fadeInUp;">
                                    <label v-if="list.user_id === card.user_id"><span :id="`${list.title}`"></span>{{
                                            list.title
                                        }}</label>

                                  <cafe-list-item
                                      v-for="( subcat ,index) in items"
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

                        </div>
                        <button class="btn btn-danger modal-close" @click.prevent="close">Close</button>
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
    props:['modalActive','lists','items','products', 'card', "products"],
    setup(props, {emit}){
        const close = () => {
            emit('close');
        }
        return {close}
    },

}
</script>

<style scoped>
.modal-close{
    float: right;
    margin-top: -35px;
    text-decoration: none;

}
.modal-animation-enter-active,
.modal-animation-leave-active{
    transition: opacity .8s cubic-bezier(.52,.02,.19, 1.02);

}
.modal-animation-enter-from,
.modal-animation-leave-to{
    opacity: 0;
}
.modal-cafe{

    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
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

</style>
