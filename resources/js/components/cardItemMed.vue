<template>
        <div v-for="cat in cats" :key="cat.id">
            <div v-if="user_id === cat.user_id && cart_id === cat.id && isAdd === true"  class="d-flex cardItem justify-content-between mt-md-3 row">
                <div  class="col-8 d-flex">
                     <div class="col">
                    <p>{{title}}</p>
                     </div>
                     <div class="col text-center">
                         <p class="ml-3">{{price*qty}}</p>
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <div class="col">
                        <div class="d-flex row">
                            <span class="plus" @click="emit('onClickPlusik')">+</span>
                            <p >{{ qty }}</p>
                            <span :class="qty<=1 ? 'disabled disabled-minus minus' : 'minus' " @click="emit('onClickMinus')">-</span>
                        </div>
                    </div>
                    <div  class="col">
                     <img  @click="emit('onClickRemove')" class="itemRemove" src="assets/img/close.svg" alt="">
                     <img @click="emit('onCkickremoveId')" class="itemRemove" src="assets/img/close.svg" alt="">
                    </div>
                </div>
            </div>
        </div>

</template>

<script setup>
import {onMounted, ref} from 'vue'
import axios from "axios";
import {inject} from "vue";


const {id} = inject('id')
const emit = defineEmits(['onClickRemove','onClickPusik', 'onClickMinus', 'removeCardID'])

const props = defineProps({
    id:Number,
    title: String,
    price: String,
    qty: Number,
    cart_id:Number,
    user_id:Number,
    elem:Number,
    i:Number,
    isAdd:Boolean
})
const lists = ref([]);
const cats = ref([]);
onMounted(
    async ()=>{
    try {
        const {data} = await axios.get('/api/item')
        lists.value=data.data
    }catch (e){};
    try {
        const {data} = await axios.get('/api/list')
        cats.value=data.data
        }catch (e){};
        })
</script>
<style>
.itemRemove{
    width: 25px;
    height: 25px;
}
.plus{
    border:1px solid black;
    width: 25px;
    height: 25px;
    text-align: center;
    opacity:40%;
    margin-right: 20px;
    cursor: pointer;
}
.minus{
    border:1px solid black;
    width: 25px;
    height: 25px;
    text-align: center;
    opacity:40%;
    margin-left: 20px;
    cursor: pointer;
}
.plus:hover,
.minus:hover{
    opacity: 100%;
    transition: 0.3s;
    transform: scale(1.1);
}
.disabled-minus{
    opacity: 10%;
}
</style>
