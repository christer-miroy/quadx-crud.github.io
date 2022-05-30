<template>
    <!--header-->
    <div class="container text-center mt-3">
        <div class="row">
            <div class="col">
                <h2>Edit Customer</h2>
            </div>
            <div class="col">
                <router-link to="/customer_list/view_customer/:id" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Back to View Customer</router-link>
            </div>
        </div>
    </div>

    <!--body-->
        <!--body-->
    <div class="container mt-3">
        <div class="row">
            <!--details-->
            <div class="col-md-6">
                <form>
                    <div class="mb-2">
                        <label>First Name: </label>
                        <input type="text" class="form-control" placeholder="First Name" />
                    </div>
                    <div class="mb-2">
                        <label>Last Name: </label>
                        <input type="text" class="form-control" placeholder="Last Name" />
                    </div>
                    <div class="mb-2">
                        <label>Photo URL: </label>
                        <input type="text" class="form-control" placeholder="Photo URL" />
                    </div>
                    <div class="mb-2">
                        <label>Address: </label>
                        <input type="text" class="form-control" placeholder="Address" />
                    </div>
                    <div class="mb-2">
                        <label>Mobile Number: </label>
                        <input type="number" class="form-control" placeholder="Mobile Number" />
                    </div>
                    <div class="mb-2">
                        <label>Email Address: </label>
                        <input type="email" class="form-control" placeholder="Email Address" />
                    </div>
                    <div class="mb-2">
                        <label>Date of Birth: </label>
                        <input type="date" class="form-control"/>
                    </div>
                    <div class="mb-2">
                        <input type="submit" class="btn btn-success" value="Edit Customer"/>
                    </div>
                </form>
            </div>
            <!--image-->
            <div class="col-md-4">
                <img src="https://cdn5.vectorstock.com/i/1000x1000/19/89/male-profile-icon-white-on-the-blue-background-vector-3451989.jpg" alt="" class="customer-img" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'EditCustomer'
    }
</script>

<style scoped>

</style>