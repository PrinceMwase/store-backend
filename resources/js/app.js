

import { createApp } from 'vue'

import welcome from './components/welcome.vue';

// import './tailwind/index.css'


window.Vue = require('vue');



// router
import router from './router/index';




const Main = {
    data(){
        return{
            name: "Store"
        }
    }
}


const App = createApp({})

App.component('welcome', welcome);


App.mount('#app')

// VueRouter.isReady().then( ()=>{
//     App.mount('#app')
// } )



