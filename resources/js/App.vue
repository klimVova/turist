<template>
  <div>
    <header>
      <div class="nav">
        <router-link :to="{name: 'home'}"><img src="assets/img/logo-s.png"></router-link>
        <div class="menu">
          <ul>
            <li><router-link :to="{name: 'med'}">Каталог</router-link></li>
            <li><a href="#">О компании</a></li>
            <li><a href="#">Консалтинг</a></li>
            <li><a href="#">Контакты</a></li>
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
            <li><router-link :to="{name:'med'}">Каталог</router-link></li>
            <li><a href="#">О компании</a></li>
            <li><a href="#">Консалтинг</a></li>
            <li><a href="#">Контакты</a></li>
          </ul>
        </div>
        <div class="media">
          <img src="assets/img/vk.svg">
          <img src="assets/img/telegram.svg">
          <img src="assets/img/youtube.svg">
        </div>
      </div>
      <img class="f-logo" src="assets/img/logo-l.png">
    </footer>
    <div v-for="user in persons">
    <template v-if="Number(state.user) === user.id && user.role === 0  && state.user !== ''">
    </template>
    </div>
  </div>
</template>

<script>

import Login from "./components/login.vue";

export default {
  components: {Login},
  name:'App',

}
</script>

<style>

</style>
