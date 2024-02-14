<template>
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
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>

</style>
