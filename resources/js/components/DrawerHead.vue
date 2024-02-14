<template>	
    <div class="drawer-header">
            <svg
                @click="closeDrawer" 
                class="drawwer-arrow" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 7H14.7143" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.71436 1L14.7144 7L8.71436 13" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
             </svg>
            <h2>Корзина</h2>
    </div>
      
</template>

<script setup>
import {inject} from 'vue'
const {closeDrawer} = inject('cartActions')
</script>
<style>
.drawer{
    height: 100vh;
    width: 100%;
    background:black;
    z-index:10;
    opacity:45%;
}
.drawer-bg{
    background-color:white;
    width:50%;
    height: 100vh;
    position:fixed;
    top:0;
    right:0;
    z-index:20;
    padding:10px;
}
.drawer-header{
    display:flex;
    align-items: center;
}
.drawwer-arrow{
    margin-right:5px;
    opacity:30%;
    cursor: pointer;
    transform: rotate(180deg);
    transition: 1s;
}
.drawwer-arrow:hover{
    opacity:100%;
}
</style>