const routes = [
    {
        path: '/admin',
        name: 'home',
        component: () => import("../pages/Home.vue")
    },
    {
        path: '/admin/about',
        name: 'about',
        component: () => import("../pages/About.vue")
    },
    {
        path: '/admin/cities',
        name: 'admin.city',
        component: () => import("../pages/Admin/City.vue")
    },
    {
        path: '/admin/categories',
        name: 'admin.category',
        component: () => import("../pages/Admin/Category.vue")
    },
    {
        path: '/admin/article',
        name: 'admin.article',
        component: () => import("../pages/Admin/Article.vue")
    }
]

export default routes;
