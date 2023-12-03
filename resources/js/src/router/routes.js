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
        name: 'admin.city.index',
        component: () => import("../pages/Admin/City/CityIndex.vue")
    },
    {
        path: '/admin/cities/:id',
        name: 'admin.city.edit',
        component: () => import("../pages/Admin/City/CityEdit.vue")
    },
    {
        path: '/admin/cities/create',
        name: 'admin.city.create',
        component: () => import("../pages/Admin/City/CityCreate.vue")
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
