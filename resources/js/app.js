require('./bootstrap')

window.axios = require("axios")
window.Vue = require('vue')

import store from './config/store'
  
import 'font-awesome/css/font-awesome.css'
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import VueRouter from "vue-router"
import Vuetify from 'vuetify'


const app = Vue.component('App', require('./components/App').default)

Vue.use(VueRouter)
Vue.use(Vuetify)
Vue.use(Vuetify,{ iconfont: 'mdi' })

new Vue({
    store,
    vuetify: new Vuetify(),
    data:{

	},
    render: h => h(app),
	mounted(){
	}
}).$mount('#app')
