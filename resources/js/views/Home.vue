<template>
    <div class="container-fluid slider-block">
        <div class="row main-cat-blocks">
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			<router-link
                    :to="{name:'med'}">
                    <div class="section-item">
                        <img src="assets/img/med-main.png">
                        <p>Медицинские центры</p>
                    </div>
                </router-link>
		</a></div>
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			 <router-link
                    active-class="active"
                    :to="{name:'spa'}">
                    <div class="section-item">
                        <img src="assets/img/spa-main.png">
                        <p>SPA/Бьюти</p>
                    </div>
                </router-link>
		</a></div>
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			 <router-link
                    :to="{name:'hotel'}">
                    <div class="section-item">
                        <img src="assets/img/hotel-main.png">
                        <p>Отели</p>
                    </div>
                </router-link>
		</a></div>
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			 <router-link
                    :to="{name:'sport'}">
                    <div class="section-item">
                        <img src="assets/img/sport-main.png">
                        <p>Спорт</p>
                    </div>
                </router-link>
		</a></div>
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			 <router-link
                    :to="{name:'tur'}">
                    <div class="section-item">
                        <img src="assets/img/tour-main.png">
                        <p>Туроператоры</p>
                    </div>
                </router-link>
		</a></div>
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			 <router-link
                    :to="{name:'sanatorium'}">
                    <div class="section-item">
                        <img src="assets/img/san-main.png">
                        <p>Санатории</p>
                    </div>
                </router-link>
		</a></div>
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			<router-link
                    :to="{name:'cafe'}">
                    <div class="section-item">
                        <img src="assets/img/cafe-main.png">
                        <p>Рестораны/Кафе</p>
                    </div>
                </router-link>
		</a></div>
		<div class=" col col-6 col-md-3 main-cat-blocks-item"><a href="">
			 <router-link
                    :to="{name:'constaling'}">
                    <div class="section-item">
                        <img src="assets/img/cons-main.png">
                        <p>Консалтинг</p>
                    </div>
                </router-link>
		</a></div>
	</div>
       <!-- <baners></baners>-->
        <div class="search fadeInUp wow">
            <UiFilter ref="index"></UiFilter>
        </div>
    </div>
    <div class="container-fluid">
        <div class="main about">
            <p>Цифровая платформа ТурМедДрайвер - это единая экосистема, обеспечивающая оздоровление и всесезонность туризма в регионах России.</p>
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
    <div class="container-fluid advertisement-block-asd">
        <div class="advertisement">
            <img src="assets/img/ad.png">
            <p>Мы с нетерпением ждем,<br>когда здесь появится Ваша реклама!</p>
        </div>
    </div>
    <!--<div class="container-fluid mp-services-blocks">
        <div class="row">
            <div class="col col-12 col-md-3">
                <router-link
                    :to="{name:'med'}">
                    <div class="section-item">
                        <img src="assets/img/med-main.png">
                        <p>Медицинские центры</p>
                    </div>
                </router-link>
            </div>
            <div class="col col-12 col-md-3">
                <router-link
                    active-class="active"
                    :to="{name:'spa'}">
                    <div class="section-item">
                        <img src="assets/img/spa-main.png">
                        <p>SPA/Бьюти</p>
                    </div>
                </router-link>
            </div>
            <div class="col col-12 col-md-3">
                <router-link
                    :to="{name:'cafe'}">
                    <div class="section-item">
                        <img src="assets/img/cafe-main.png">
                        <p>Рестораны/Кафе</p>
                    </div>
                </router-link>
            </div>
            <div class="col col-12 col-md-3">
                <router-link
                    :to="{name:'hotel'}">
                    <div class="section-item">
                        <img src="assets/img/hotel-main.png">
                        <p>Отели</p>
                    </div>
                </router-link>
            </div>
            <div class="col col-12 col-md-3">
                <router-link
                    :to="{name:'tur'}">
                    <div class="section-item">
                        <img src="assets/img/tour-main.png">
                        <p>Туроператоры</p>
                    </div>
                </router-link>
            </div>
            <div class="col col-12 col-md-3">
                <router-link
                    :to="{name:'sanatorium'}">
                    <div class="section-item">
                        <img src="assets/img/san-main.png">
                        <p>Санатории</p>
                    </div>
                </router-link>
            </div>
            <div class="col col-12 col-md-3">
                <router-link
                    :to="{name:'sport'}">
                    <div class="section-item">
                        <img src="assets/img/sport-main.png">
                        <p>Спорт</p>
                    </div>
                </router-link>
            </div>
            <div class="col col-12 col-md-3">
                <router-link
                    :to="{name:'constaling'}">
                    <div class="section-item">
                        <img src="assets/img/cons-main.png">
                        <p>Консалтинг</p>
                    </div>
                </router-link>
            </div>
        </div>
    </div>-->
    <blog></blog>
</template>

<script>
import blog from "../components/blog.vue";
import UiFilter from "../components/UiFilter.vue";
import Baners from "../components/baners.vue";

export default {
    name: "Home",
    components: {
        Baners,
        UiFilter,
        blog,
    },
}
</script>

<style scoped>
.color_baner {
    color: #08366A !important;
}
</style>
