<template>
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
</template>

<script>
export default {
	
}
</script>


