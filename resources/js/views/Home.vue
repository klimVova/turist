<template>
  <div class="container-fluid main">
    <div class="welcome">
      <div class="text">
        <div>
          <h1>Настало время восстановления и отдыха!</h1>
          <p>200+ курортов<br>23+ санаториев</p>
          <p>для Вас и Вашей семьи!</p>
          <p>Поможем с выбором, учтем все пожелания!</p>
        </div>
        <div class="sale">
          <p>Скидки до</p>
          <label>30%</label>
        </div>
      </div>
    </div>

    <div class="search fadeInUp wow">
     <UiFilter ref="index"></UiFilter>
    </div>
  </div>
  <div class="container-fluid">
    <div class="main about">
      <p>Цифровая платформа ТурМедДрайвер - это единая экосистема, обеспечивающая всесезонность туризма в регионах
        России.</p>
      <div class="row about-items">
        <div class="about-item col col-12 col-md-4 zoomIn wow" data-wow-offset='0'
             data-wow-delay='0.2s'
             data-wow-duration='0.5s'>
          <img src="assets/img/eco.svg">
          <p>Это <b>здоровая и комфортная среда</b>, улучшающая качество жизни.</p>
        </div>
        <div class="about-item col col-12 col-md-4 zoomIn wow " data-wow-offset='0'
             data-wow-delay='0.5s'
             data-wow-duration='1s'>
          <img src="assets/img/ok.svg">
          <p>Это удобный сервер, <b>решающий</b> простым способом <b>все задачи, связанные с туризмом</b>.</p>
        </div>
        <div class="about-item col col-12 col-md-4 zoomIn wow " data-wow-offset='0'
             data-wow-delay='0.8s'
             data-wow-duration='1s'>
          <img src="assets/img/grow.svg">
          <p>Это возможность оптимального <b>развития компаний</b>, вступивших на эту платформу. </p>
        </div>
      </div>
      <p><b>ТурМедДрайвер - это здоровый и комфортный мир!</b></p>
    </div>
  </div>
  <blog></blog>
</template>

<script>
import blog from "../components/blog.vue";
import UiFilter from "../components/UiFilter.vue";

export default {
  name: "Home",
  components: {
    UiFilter,
    blog,
  },
}
</script>

<style scoped>

</style>