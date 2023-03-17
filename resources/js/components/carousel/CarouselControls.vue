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
    name: "CarouselControls",
    emits:['prev','next']
}
</script>

<style scoped>
.carousel-control{
    background-color: rgba(0,0,0, .1);
    border: none;
    display: inline-block;
    position: absolute;
    height: 20px;
    width: 40px;
    top: calc(40% - 25px);
    color: #f3f3f3;
    cursor: pointer;

}
.left{
    left: 0;
}
.right{
    right: 0;
}
.arrow-right{
    width: 20px;
    height: 20px;
}
.arrow-left{
     transform: rotate(180deg);
    width: 20px;
    height: 20px;
}
@media (max-width: 480px){
    .carousel-control{
        top: calc(50% - 25px);
    }
}
</style>
