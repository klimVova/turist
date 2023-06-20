<template >
        <carouselBaner :slides=images></carouselBaner>
</template>
<script>
import CarouselBaner from "./carousel/CarouselBaner.vue"

export default {

    name: "swiperBaner",
    components: {CarouselBaner},
    props: ['images'],
    data() {
        return {
            slide: this.images,
        }
    }
}
</script>
