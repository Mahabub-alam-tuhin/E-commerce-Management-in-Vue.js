// setup  files
import './bootstrap';
// import swal from 'sweetalert2';
// window.Swal = swal;
import {
    createApp
} from 'vue';
import {
    createRouter,
    createWebHistory
} from 'vue-router';

import HomeApp from './frontend/HomoApp.vue';
import HomePage from './frontend/Home/Home.vue';
import AboutPage from './frontend/About/About.vue';
import Layout from './frontend/partials/Layout.vue';


// roters
const router = createRouter({
    history: createWebHistory(),
    routes: [{
            path: "/",
            component: HomeApp,
            children: [
                {
                    path: "",
                    component: Layout,
                    children:[
                        {
                            path: "",
                            name: "HomePage",
                            component: HomePage
                        },
                        {
                            path: "about",
                            name: "AboutPage",
                            component: AboutPage
                        }
                    ]
                },
                
            ]
        },

    ]
})
// previous route store
router.beforeEach((to, from, next) => {
    to.href.length > 2 &&
        window.sessionStorage.setItem('prevurl', to.href);
    next();
});

// render component

const app = createApp({});

app.component('app', HomeApp);

app.use(router);
app.mount('#app')
