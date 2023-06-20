
<template>
    <div class="carousel">
        <div class="carousel-inner">
            <carousel-item
                v-for="(slide , index) in slides"
                :slide="slide"
                :key="`item-${index}`"
                :current-slide='currentSlide'
                :index="index"
                :direction="direction"
                @mouseenter="stopSlideTimer"
                @mouseout="startSlideTimer"
            ></carousel-item>
            <carousel-baner-controls v-if="slides.length > 1" @prev="prev" @next="next"></carousel-baner-controls>
        </div>
    </div>
</template>

<script>

import CarouselItem from "./CarouselItem.vue";
import CarouselBanerControls from "./CarouselBanerControls.vue";

export default {
    name: "CarouselBaner",
    components: {CarouselItem, CarouselBanerControls},
    props: ['slides'],
    data: () => ({
        currentSlide: 0,
        slideInterval: null,
        direction: 'right'
    }),
    methods: {
        setCurrentSlide(index) {
            this.currentSlide = index;
        },
        prev() {
            const index = this.currentSlide > 0 ? this.currentSlide - 1 : this.slides.length - 1;
            this.setCurrentSlide(index);
            this.direction = 'left';
            this.startSlideTimer()
        },
        _next(){
            const index = this.currentSlide < this.slides.length - 1 ? this.currentSlide + 1 : 0;
            this.setCurrentSlide(index);
            this.direction = 'right';
        },
        next() {
            this._next();
            this.startSlideTimer()
        },
        startSlideTimer() {
            this.stopSlideTimer()
            this.slideInterval = setInterval(() => {
                this._next()
            }, 5000)
        },
        stopSlideTimer(){
            clearInterval(this.slideInterval)
        }
    },
    mounted() {
        this.startSlideTimer()
    },
    beforeUnmount() {
        this.stopSlideTimer();
    }

}
</script>

<style scoped>
.carousel {
    display: flex;
    justify-content: center;
}

.carousel-inner {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}
</style>
