<template >
        <carousel :slides=images></carousel>
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
