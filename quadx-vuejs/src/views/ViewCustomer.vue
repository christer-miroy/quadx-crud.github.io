<template>
    <!--header-->
    <div class="container mt-3">
        <div class="row">
            <div class="col text-center">
                <h2>View Customer</h2>
            </div>
            <div class="col d-flex justify-content-end">
                <router-link to="/" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Back to Customer List</router-link>
                <router-link to="/customer_list/edit_customer/:id" class="btn btn-warning fw-bold">
                    <i class="bi bi-pencil"></i> Edit Customer Details
                </router-link>
                
            </div>        
        </div>
    </div>

    <!--body-->
    <div class="container mt-3">
        <div class="row align-items-center">
            <!--image-->
            <div class="col-md-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Betty-boop-opening-title.jpg" alt="" class="customer-img-big" />
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">Name: <span class="fw-bold">Last Name, First Name</span></li>
                    <li class="list-group-item">Photo URL: <span class="fw-bold">Photo URL</span></li>
                    <li class="list-group-item">Address: <span class="fw-bold">Address</span></li>
                    <li class="list-group-item">Mobile Number: <span class="fw-bold">Mobile Number</span></li>
                    <li class="list-group-item">Email Address: <span class="fw-bold">Email Address</span></li>
                    <li class="list-group-item">Date of Birth: <span class="fw-bold">Date of Birth</span></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'ViewCustomer',
        methods: {
            
        }
    }
</script>

<style scoped>

</style>