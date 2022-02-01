const home = () =>import ( '../components/ExampleComponent.vue')

export default [
    {
        path: '/home',
        component: home,
        name: 'home',
    },
]