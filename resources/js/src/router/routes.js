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
        name: 'admin.category.index',
        component: () => import("../pages/Admin/Category/CategoryIndex.vue")
    },
    {
        path: '/admin/categories/:id',
        name: 'admin.category.edit',
        component: () => import("../pages/Admin/Category/CategoryEdit.vue")
    },
    {
        path: '/admin/categories/create',
        name: 'admin.category.create',
        component: () => import("../pages/Admin/Category/CategoryCreate.vue")
    },
    {
        path: '/admin/categories/copy/:id',
        name: 'admin.category.copy',
        component: () => import("../pages/Admin/Category/CategoryCopy.vue")
    },
    {
        path: '/admin/article',
        name: 'admin.article',
        component: () => import("../pages/Admin/Article.vue")
    },
    {
        path: '/admin/instanions',
        name: 'admin.instation.index',
        component: () => import("../pages/Admin/Instation/InstationIndex.vue")
    },
    {
        path: '/admin/instanions/:id',
        name: 'admin.instation.edit',
        component: () => import("../pages/Admin/Instation/InstationEdit.vue")
    },
    {
        path: '/admin/instanions/create',
        name: 'admin.instation.create',
        component: () => import("../pages/Admin/Instation/InstationCreate.vue")
    },
]

export default routes;
