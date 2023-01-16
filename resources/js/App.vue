<template>
  <div>
    <header>
      <div class="nav">
        <router-link :to="{name: 'home'}"><img src="assets/img/logo-s.png"></router-link>
        <div class="menu">
          <ul>
            <li><router-link :to="{name: 'med'}">Каталог</router-link></li>
            <li><a href="#">О компании</a></li>
            <li><a href="#">Контакты</a></li>
          </ul>
          <router-link :to="{name: 'home'}"><img src="assets/img/office.svg"></router-link>
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
            <li><a href="#">Контакты</a></li>
          </ul>
        </div>
        <div class="media">
          <img src="assets/img/vk.svg">
          <img src="assets/img/fb.svg">
        </div>
      </div>
      <img class="f-logo" src="assets/img/logo-l.png">
    </footer>
  </div>
</template>

<script>
export default {
  name:'App',
}
</script>

<style>

</style>
