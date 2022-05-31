<template>
    <!--header-->
    <div class="container mt-3 ">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-3">
                <router-link to="/" class="btn btn-success btn-sm"><i class="bi bi-arrow-left-circle"></i> Customer List</router-link>
            </div>
            <div class="col-sm-3">
                <router-link :to="{ name: 'EditCustomer', params: { id: customer.id } }" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </router-link>
            </div>  
        </div>
        
    </div>
 
    <!--body-->
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col text-center">
                <h2>View Customer</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <!--form-->
                <form>
                    <fieldset>
                        <div class="form-group">
                            <label class="form-label mt-3">
                                First Name:
                            </label>
                            <input type="text" class="form-control" placeholder="First Name" v-model="customer.firstName" readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-3">
                                Last Name:
                            </label>
                            <input type="text" class="form-control" placeholder="Last Name" v-model="customer.lastName" readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-3">
                                Address:
                            </label>
                            <input type="text" class="form-control" placeholder="Address" v-model="customer.address" readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-3">
                                Mobile Number:
                            </label>
                            <input type="text" class="form-control" placeholder="Mobile Number" v-model="customer.mobile" readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-3">
                                Email Address:
                            </label>
                            <input type="email" class="form-control" placeholder="Email Address" v-model="customer.email" readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-3">
                                Date of Birth:
                            </label>
                            <input type="date" class="form-control" v-model="customer.dateOfBirth" readonly />
                        </div>
                    </fieldset>
                </form>
            </div>
            <!--image-->
            <div class="col-md-4">
                <img :src="customer.photoURL" alt="" class="customer-img" />
                <!--dymamic display of photo-->
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'ViewCustomer',
        data() {
            return {
                customer: {},
                firstName: '',
                lastName: '',
                photoURL: '',
                address: '',
                mobile: '',
                email: '',
                dateOfBirth: '',
            }
        },
        created() {
            this.getCustomerById();
        },
        methods: {
            async getCustomerById() {
                //define api url
                let url = `http://127.0.0.1:8000/api/get_customer/${this.$route.params.id}`;
                //define axios
                await axios.get(url).then(response => {
                    console.log(response);
                    this.customer = response.data;
                });
            },
        }
    }
</script>

<style scoped>
</style>