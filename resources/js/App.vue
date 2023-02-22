<template>
  <div class="wrapper">
    <header>
      <div class="nav">
        <router-link :to="{name: 'home'}"><img src="assets/img/logo-s.png"></router-link>
        <div class="menu">
          <ul>
            <li>
              <router-link :to="{name: 'med'}">Каталог</router-link>
            </li>
            <li><a href="#">О компании</a></li>
            <li><a href="#">Консалтинг</a></li>
            <li>
              <router-link :to="{name:'contact'}">Контакты</router-link>
            </li>
          </ul>
          <login></login>
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
            <li><a href="#">Консалтинг</a></li>
            <li>
              <router-link :to="{name:'contact'}">Контакты</router-link>
            </li>
          </ul>
        </div>
        <div class="media">
          <img src="assets/img/vk.svg">
          <img src="assets/img/telegram.svg">
        </div>
      </div>
      <img class="f-logo" src="assets//img/logo-l.png">
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

</style>
