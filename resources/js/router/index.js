import { createRouter, createWebHistory } from '@ionic/vue-router';

import HomePage from '../views/Home.vue';
// import login from '../views/auth/login.vue';

const routes = [
  {
    
    path: '/',
    name: 'Home',
    component: HomePage,
  },
  {
    path: '/login',
    name: 'Login',
    component: login ,
  },
  
  {
    path: '/account',
    name: 'Account',
    component: () => import('@//views/user/account.vue'),
  },
  {
    path: '/home',
    name: 'home',
    redirect: '/',
  },

];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;