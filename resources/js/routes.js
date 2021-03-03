import Vue from 'vue'

import Screen from './pages/Screen.vue'
import Ticket from './pages/Ticket.vue'

Vue.component('screen', Screen)
Vue.component('ticket', Ticket)

const routes = [
    { path: '/screen', component: Screen, name: 'screen' },
    { path: '/ticket', component: Ticket, name: 'ticket' },
]

export default routes
