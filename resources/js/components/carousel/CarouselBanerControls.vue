<template>
    <button class="carousel-control left" @click="$emit('prev')">
        <img  class="arrow-left" src="assets/img/right.svg" alt=""/>
    </button>
    <button class="carousel-control right" @click="$emit('next')">
        <img  class="arrow-right" src="assets/img/right.svg" alt=""/>
    </button>
</template>

<script>
export default {
    name: "CarouselBanerControls",
    emits:['prev','next']
}
</script>

<style scoped>
.carousel-control{
    background-color: rgba(0,0,0, 0);
    border: none;
    display: inline-block;
    position: absolute;
    height: 320px;
    width: 50px;
    top: calc(20% - 15px);

    cursor: pointer;

}
.left{
    left: 0;
}
.right{
    right: 0;
}
.arrow-right{
    width: 50px;
    height: 320px;
    opacity: 0.3;
    margin-left: -5px;
}
.arrow-left{
    transform: rotate(180deg);
    width: 50px;
    height: 220px;
    opacity: 0.3;
    margin-left: 5px;
}
@media (max-width: 480px){
    .carousel-control{
        top: calc(50% - 25px);
    }
}
</style>
