<template>
    <button :class="counts === 0 ? 'btn btn-secondary disabled' :'btn btn-secondary' "  @click.prevent="$emit('minus')">
        -
    </button>
    {{counts}}
    <button class="btn btn-secondary" @click.prevent="$emit('plus')">
        +
    </button>
</template>

<script>
export default {
    name: "productControls",
    props:['counts'],
    emits:['plus','minus']
}
</script>

<style scoped>

</style>
