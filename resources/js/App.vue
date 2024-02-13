<template>
    <div class="wrapper">
        <Drawer />
        <Header />
        <router-view></router-view>
        <footer />
    </div>
</template>

<script>
import Header from "./components/Header.vue"
import user from "./user";
import footer from "./components/footer.vue"
import Drawer from "./components/Drawer.vue"


export default {
    components: {Header, footer, Drawer},
    name: 'App',
    
    setup() {
        const {state} = user;
        return {state};
    },
}
</script>

<style>

@media (min-width: 481px) {
    .mob-menu-div {
        display: none;
    }
}

@media (max-width: 481px) {
    .div {
        display: none;
    }

    .menu ul li a ul:hover {
        display: block;
    }
}
</style>
