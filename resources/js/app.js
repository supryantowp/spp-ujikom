require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'

const router = new VueRouter({ routes, mode: 'history' })

Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    router
})
