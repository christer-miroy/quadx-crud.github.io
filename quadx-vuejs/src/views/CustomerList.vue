<template>
    <!--Header-->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <router-link to="/add_customer" class="btn btn-success btn-sm fw-bold">
                        <i class="bi bi-person-plus"></i> New Customer
                </router-link>
            </div>
        </div> 
    </div>

    <!--body-->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <h2><i class="bi bi-person-lines-fill"></i> Customer List</h2>
            </div>
        </div>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-for="customer in customers" :key="customer.id">
                <tr class="my-2">
                    <td>{{ customer.id }}</td>
                    <td>{{ customer.lastName }}, {{ customer.firstName }}</td>
                    <td>{{ customer.email }}</td>
                    <td>
                        <router-link :to="{ name: 'ViewCustomer', params: { id: customer.id } }" class="btn btn-primary btn-sm fw-bold">
                            <i class="bi bi-pencil"></i> View
                        </router-link>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CustomerList',
        data() {
            return {
                customers : Array
            }
        },
        created() {
            //whenever an object is created
            this.getCustomers()
        },
        methods: {
            async getCustomers() {
                let url = 'http://127.0.0.1:8000/api/customers';
                await axios.get(url).then(response => {
                    this.customers = response.data.customers;
                    console.log(this.customers);
                }).catch(error => {
                    console.log(error);
                });
            }
        },
        mounted() {
            console.log('Customer List Component Mounted');
        }
    }
</script>

<style scoped>

</style>