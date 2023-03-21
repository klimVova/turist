
import {createApp} from 'vue'
import App from './App.vue'
import router from './router'
import axios from "axios";
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap and BootstrapVue CSS files (order is important)
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
//
// import 'bootstrap';

const app = createApp(App)

app.use(router)
app.config.globalProperties.axios = axios
app.mount('#app')
