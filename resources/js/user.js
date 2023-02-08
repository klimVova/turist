import {reactive} from "vue";

const article = document.getElementById('app');
const users = article.dataset.user
const state = reactive({
    user: users
})
export default {state};