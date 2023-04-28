<template>
    <button :class="counts === 0 ? 'btn-control disabled' :'btn-control' " @click.prevent="$emit('minus')">
        -
    </button>
    <p class="counts">{{ counts }}</p>
    <button class="btn-control" @click.prevent="$emit('plus')">
        +
    </button>
</template>

<script>
export default {
    name: "productControls",
    props: ['counts'],
    emits: ['plus', 'minus'],
}
</script>

<style scoped>
.btn-control{
    width: 30px;
    background-color: #51D3B7;
    border: none;
    border-radius: 3px;
    text-align: center;
    align-items: center;
}
.counts{
    padding: 0px 5px;
}
</style>
