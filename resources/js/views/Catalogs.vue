<template>
  <div>
    <div class="container-fluid main catalog">
      <div class="section-label">
        <h2>Каталог</h2>
        <hr>

      </div>
      <div class="row sort">
        <div class="col  col-md-2"></div>
        <div class="col  col-md-10">
          <div class="org-type-sort">
            <ul>
                <router-link
                    active-class="active"
                    :to="{name:'med'}">
                  <li>Медцентры</li>
                </router-link>
              <router-link
                  active-class="active"
                  :to="{name:'spa'}">
                <li>СПА\Бьюти</li>
              </router-link>
              <router-link
                  active-class="active"
                  :to="{name:'cafe'}">
                <li>Рестораны/Кафе</li>
              </router-link>
              <router-link
                  active-class="active"
                  :to="{name:'hotel'}">
                <li>Отели</li>
              </router-link>
              <router-link
                  active-class="active"
                  :to="{name:'sanatorium'}">
                <li>Санатории</li>
              </router-link>
                <router-link
                    active-class="active"
                    :to="{name:'tur'}">
                    <li>Туроператоры </li>
                </router-link>
                <router-link
                    active-class="active"
                    :to="{name:'sport'}">
                    <li>Cпортивные базы </li>
                </router-link>
            </ul>
          </div>
        </div>
        <div class="container-fluid">
        <router-view></router-view>
        </div>
      </div>

      </div>
  </div>
</template>

<script>
export default {
  name: "Catalogs",
}
</script>

<style scoped>

</style>
