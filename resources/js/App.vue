<template>
    <div class="wrapper">
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
        <router-view></router-view>
        <footer>
            <div>
                <div class="menu">
                    <ul>
                        <li>
                            <router-link :to="{name:'med'}">Каталог</router-link>
                        </li>
                        <li><a href="#">О компании</a></li>
                        <li>
                            <router-link :to="{name:'constaling'}">Консалтинг</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'contact'}">Контакты</router-link>
                        </li>
                    </ul>
                </div>
                <div class="media">
                    <router-link :to="{name: 'home'}"><img class="f-logo" src="assets//img/logo-l.png"></router-link>
                    <img src="assets/img/vk.svg">
                    <img src="assets/img/telegram.svg">
                </div>
            </div>

            <img class="payment-img" src="assets//img/payment.png">
        </footer>
    </div>
</template>

<script>

import Login from "./components/login.vue";

export default {
    components: {Login},
    name: 'App',

}
</script>

<style>

@media (min-width: 481px) {
    .mob-menu-div {
        display: none;
    }
}

@media (max-width: 481px) {
    .div {
        display: none;
    }

    .menu ul li a ul:hover {
        display: block;
    }
}
</style>
