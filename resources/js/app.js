// setup  files
import './bootstrap';
// import swal from 'sweetalert2';
// window.Swal = swal;
import {
    createApp
} from 'vue';
import {
    createRouter,
    createWebHashHistory
} from 'vue-router';

import App from './backend/App.vue';
import Layout from './backend/partials/Layout.vue';
import Dashboard from './backend/management/Dashboard.vue';
import CreateUser from './backend/management/User/CreateUser.vue';
import AllUser from './backend/management/User/AllUser.vue';
import EditUser from './backend/management/User/EditUser.vue';
import CreateCategories from './backend/management/Categories/CreateCategories.vue';
import AllCategories from './backend/management/Categories/AllCategories.vue';
import EditCategories from './backend/management/Categories/EditCategories.vue';
import CreateProduct from './backend/management/Product/CreateProduct.vue';
import AllProduct from './backend/management/Product/AllProduct.vue';
import EditProducts from './backend/management/Product/EditProducts.vue';
import AllOrders from './backend/management/Order/AllOrders.vue';
import DetailsOrders from './backend/management/Order/DetailsOrders.vue';



// roters
const router = createRouter({
    history: createWebHashHistory(),
    routes: [{
        path: "/",
        name: "home",
        component: App,
        children: [{
                path: "",
                component: Layout,
                children: [{
                        path: "dashboard",
                        name: "Dashboard",
                        component: Dashboard,
                    },
                    {
                        path: "create-User",
                        name: "CreateUser",
                        component: CreateUser,
                    },
                    {
                        path: "all-users",
                        name: "AllUser",
                        component: AllUser,
                    },
                    {
                        path: "edit-user/:id",
                        name: "EditUser",
                        component: EditUser,
                    },
                    {
                        path: "create-categories",
                        name: "CreateCategories",
                        component: CreateCategories,
                    },
                    {
                        path: "all-categories",
                        name: "AllCategories",
                        component: AllCategories,
                    },
                    {
                        path: "edit-categories/:id",
                        name: "EditCategories",
                        component: EditCategories,
                    },

                    {
                        path: "create-products",
                        name: "CreateProduct",
                        component: CreateProduct,
                    },
                    {
                        path: "all-products",
                        name: "AllProduct",
                        component: AllProduct,
                    },
                    {
                        path: "edit-products/:id",
                        name: "EditProducts",
                        component: EditProducts,
                    },
                    {
                        path: "all-orders",
                        name: "AllOrders",
                        component: AllOrders,
                    },
                    {
                        path: "details-orders/:id",
                        name: "DetailsOrders",
                        component: DetailsOrders,
                    },

                ]
            },


        ]

    }, ]
})
// previous route store
router.beforeEach((to, from, next) => {
    to.href.length > 2 &&
        window.sessionStorage.setItem('prevurl', to.href);
    next();
});

// render component

const app = createApp({});

app.component('app', App);

app.use(router);
app.mount('#app')
