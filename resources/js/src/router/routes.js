import Home from "../pages/Home.vue";
import About from "../pages/About.vue";

const routes = [
    {
        path: '/admin',
        name: 'home',
        component: Home
    },
    {
        path: '/admin/about',
        name: 'about',
        component: About
    }
]

export default routes;
