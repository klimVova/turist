<template>
    <div class="service-list">
        <h1>Категория</h1>
        <cardMed 
        title='zxc' 
        price='123' 
        :isAdded="false"
        :onClickAdd="onClickAdd"/>   
    </div>   
</template>

<script>
import cardMed from "./cardMed.vue";
export default {
    components: {
        cardMed,
    },
    setup() {
        const onClickAdd = () => {
            alert('Добавить');
        }
        return {onClickAdd};
    },
}
</script>
