<template>
   <header>
            <div class="nav">
                <router-link :to="{name: 'home'}"><img src="assets/img/logo-s.png"></router-link>
                <div class="div">
                    <img class="burger" src="assets/img/menu.svg">
                    <div id="mob-menus" class="menu">
                        <ul>
                            <li>
                                <router-link :to="{name: 'med'}">Каталог</router-link>
                            </li>
                            <li><a href="#">О проекте</a>
                                <ul>
                                    <li>
                                        <router-link :to="{name: 'fororganization'}">Для организаций</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'forclient'}">Для клиентов</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'ecosistem'}">Экосистема ТурМедДрайвер</router-link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <router-link :to="{name:'const'}">Консалтинг</router-link>
                            </li>
                            <li>
                                <router-link :to="{name:'contact'}">Контакты</router-link>
                            </li>
                            <li @click="()=>emit('openDrawer')">
                                <img src="assets/img/basket.png" style="width: 20px;height: 20px;" alt="">
                            </li> 
                        </ul>
                        <login></login>
                    </div>
                </div>
                <div onclick="openBlockMenu('mob-menu')" class="mob-menu-div">
                    <img class="burger" src="assets/img/menu.svg">
                    <div id="mob-menu" class="menu">
                        <ul>
                            <li>
                                <router-link :to="{name: 'med'}">Каталог</router-link>
                            </li>
                            <li><a href="#">О проекте
                                <ul>
                                    <li>
                                        <router-link :to="{name: 'fororganization'}">Для организаций</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'forclient'}">Для клиентов</router-link>
                                    </li>
                                    <li>
                                        <router-link :to="{name: 'ecosistem'}">Экосистема ТурМедДрайвер</router-link>
                                    </li>
                                </ul>
                            </a>
                            </li>
                            <li>
                                <router-link :to="{name:'constaling'}">Консалтинг</router-link>

                            </li>
                            <li>
                                <router-link :to="{name:'payment'}">Оплата</router-link>
                            </li>
                            <li>
                                <router-link :to="{name:'contact'}">Контакты</router-link>
                            </li>
                        </ul>
                        <login></login>
                    </div>
                </div>
            </div>
        </header>	
</template>


<script setup>
import {ref} from 'vue';
import Login from "./login.vue";
const emit = defineEmits(['openDrawer'])
</script>