require('./bootstrap')

window.axios = require("axios")
window.Vue = require('vue')

import './config/msgs'
import store from './config/store'
import router from './config/router'
  
import 'font-awesome/css/font-awesome.css'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import VueRouter from "vue-router"
import Vuetify from 'vuetify'


const App = Vue.component('App', require('./components/App').default)

Vue.use(VueRouter)
Vue.use(Vuetify)
Vue.use(Vuetify,{ iconfont: 'fa4' })

new Vue({
    store,
    router,
    vuetify: new Vuetify(),
    render: h => h(App),
}).$mount('#app')
