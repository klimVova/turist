<template>
    <div>
        <div class="main-slider">
            <div class="slider">
                <div class="slider-item">
                    <swiperBaner
                        :images="baners"
                    ></swiperBaner>
                </div>
            </div>
            <div class="text">
                <div>
                    <h1>Настало время восстановления и отдыха!</h1>
                    <div class="slogan">
                        <p class="slogan1">Бронируйте сейчас!</p>
                        <p class="slogan2">Отдыхайте круглый год!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import swiperBaner from '../components/swiperBaner.vue';


export default {
    components: {swiperBaner},
    name: "baner",
    data() {
        return {
            baners: [],
        }
    },
    methods: {
    getBaners()
    {
        this.axios.get('/api/baners')
            .then(res => {
                this.baners = res.data.data
            })
            .catch(error => console.log(error))
    }
,
}
,
mounted()
{
    this.getBaners()
}
}
</script>

<style scoped>

</style>
