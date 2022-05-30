import CustomerList from '../views/CustomerList.vue'
import AddCustomer from '../views/AddCustomer.vue'
import EditCustomer from '../views/EditCustomer.vue'
import ViewCustomer from '../views/ViewCustomer.vue'
import PageNotFound from '../views/PageNotFound.vue'
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        name: 'Home',
        path: '/',
        redirect: '/customer_list'
    },
    {
        name: 'CustomerList',
        path: '/customer_list',
        component: CustomerList
    },
    {
        name: 'AddCustomer',
        path: '/add_customer',
        component: AddCustomer
    },
    {
        name: 'EditCustomer',
        path: '/customer_list/edit_customer/:id',
        component: EditCustomer
    },
    {
        name: 'ViewCustomer',
        path: '/customer_list/view_customer/:id',
        component: ViewCustomer
    },
    {
        name: 'PageNotFound',
        path: '/:pathMatch(.*)*',
        component: PageNotFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;