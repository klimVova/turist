<template >
    <div v-show="turPost">
            <div class="details" v-if="post.id === contentId">
                <div class="day">
                    <p v-html="post.post"></p>
                </div>
            </div>
    </div>
</template>

<script>
export default {
    name: "turPost",
    props: ['turPost', 'post' , 'index', 'contentId'],
}
</script>

<style scoped>
</style>
