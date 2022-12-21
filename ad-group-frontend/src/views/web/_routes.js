
const webRoutes = [
    {
        path: '/Home',
        name: 'Home',
        component: () => import('./pages/home/Home.vue'),
        meta: {
            title: 'Home'
        }
    },
];

export default webRoutes;
