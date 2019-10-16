import Vue from 'vue'
import VueRouter from 'vue-router'

import { userKey } from '../global'

import Auth from '../components/auth/Auth'
import Home from '../components/home/Home'

Vue.use(VueRouter)

const routes = [{
  name: 'auth',
  path: '/auth',
  component: Auth
},{
  name: 'home',
  path: '/home',
  component: Home,
  meta: { requiresSession: true }
}]

const router = new VueRouter({
  mode: 'history',
  routes
})

router.beforeEach((to, from, next) => {
  const session = to.matched.some(record => record.meta.requiresSession)
  const user = localStorage.getItem(userKey)

  if (!session) {
    next()
  }

  if (user) {
    to.name === 'auth' ? next({ name: 'home' }) : next()
  } else {
    next({ name: 'auth' })
  }

})

export default router