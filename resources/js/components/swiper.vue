<template >
        <carousel :slides=images></carousel>
<div></div>
</template>
<script>
import Carousel from "./carousel/Carousel.vue"

export default {

    name: "swiper",
    components: {Carousel},
    props: ['images'],
    data() {
        return {
            slide: this.images,
        }
    }
}
</script>
