<template>
    <!--header-->
    <div class="container text-center mt-3">
        <div class="row">
            <div class="col">
                <router-link :to="{ name: 'ViewCustomer', params: { id: customer.id } }" class="btn btn-primary btn-sm" @click="alertClick">
                    <i class="bi bi-pencil"></i> View Customer Data
                </router-link>
            </div>
            <div class="col">
                <router-link to="/" class="btn btn-danger btn-sm" @click.prevent="deleteCustomer(customer.id)">
                    <i class="bi bi-trash"></i> Delete
                </router-link>
            </div>
        </div>
    </div>

    <!--body-->
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col text-center">
                <h2>Edit Customer</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <!--error messages-->
                <div class="alert alert-danger mt-4" v-if="errors.length">
                    <!-- v-if: display the errors when true-->
                    <ul class="mb-0">
                        <li v-for="(error, index) in errors" :key="index">
                            <!-- v-for directive is similar to for loop-->
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <!--form-->
                <form @submit.prevent="updateCustomer" novalidate>
                    <fieldset>
                        <div class="form-group">
                            <label class="form-label mt-4">
                                First Name:
                            </label>
                            <input type="text" class="form-control" placeholder="First Name" v-model="customer.firstName" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-4">
                                Last Name:
                            </label>
                            <input type="text" class="form-control" placeholder="Last Name" v-model="customer.lastName" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-4">
                                Photo URL:
                            </label>
                            <input type="text" class="form-control" placeholder="Photo URL" v-model="customer.photoURL" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-4">
                                Address:
                            </label>
                            <input type="text" class="form-control" placeholder="Address" v-model="customer.address" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-4">
                                Mobile Number:
                            </label>
                            <input type="text" class="form-control" placeholder="Mobile Number" v-model="customer.mobile" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-4">
                                Email Address:
                            </label>
                            <input type="email" class="form-control" placeholder="Email Address" v-model="customer.email" />
                        </div>
                        <div class="form-group">
                            <label class="form-label mt-4">
                                Date of Birth:
                            </label>
                            <input type="date" class="form-control" v-model="customer.dateOfBirth" />
                        </div>
                        <button class="btn btn-success btn-sm mt-4"><i class="bi bi-check-circle"></i> Submit</button>
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
        name: 'EditCustomer',
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
                errors: []
            }
        },
        created() {
            this.getCustomerById();
        },
        methods: {
            //alert when view customer data is clicked
            async alertClick() {
                alert('Update customer cancelled.');
            },
            //populate the fields
            async getCustomerById() {
                let url = `http://127.0.0.1:8000/api/get_customer/${this.$route.params.id}`;
                //define axios
                await axios.get(url).then(response => {
                    console.log(response);
                    this.customer = response.data;
                });
            },
            async updateCustomer() {
                this.errors = [];
                if (!this.customer.firstName) {
                    //display error message when returned as empty field
                    this.errors.push('First name is required')
                }
                if (!this.customer.lastName) {
                    this.errors.push('Last name is required')
                }
                if (!this.customer.photoURL) {
                    this.errors.push('Photo URL is required')
                }if (!this.customer.address) {
                    this.errors.push('Address is required')
                }
                if (!this.customer.mobile) {
                    this.errors.push('Mobile number is required')
                }
                if (!this.customer.email) {
                    this.errors.push('Email Address is required')
                }
                if (!this.customer.dateOfBirth) {
                    this.errors.push('Date of birth is required')
                }
                //no errors
                if (!this.errors.length) {
                    let formData = new FormData();
                    formData.append('firstName', this.customer.firstName);
                    formData.append('lastName', this.customer.lastName);
                    formData.append('photoURL', this.customer.photoURL);
                    formData.append('address', this.customer.address);
                    formData.append('mobile', this.customer.mobile);
                    formData.append('email', this.customer.email);
                    formData.append('dateOfBirth', this.customer.dateOfBirth);
                    let url = `http://127.0.0.1:8000/api/update_customer/${this.$route.params.id}`;
                    //access url via axios
                    await axios.post(url,formData).then((response) => {
                        console.log(response);
                        if (response.status == 200) {
                            alert(response.data.message);
                            //refresh the values
                            this.customer.firstName = '';
                            this.customer.lastName = '';
                            this.customer.photoURL = '';
                            this.customer.address = '';
                            this.customer.mobile = '';
                            this.customer.email = '';
                            this.customer.dateOfBirth = '';
                        } else {
                            //display errors
                            console.log('error');
                        }
                    }).catch(error => {
                        this.errors.push(error.response);
                    });
                }
            },
            async deleteCustomer(id) {
                if (confirm('Are you sure you want to delete this customer?') == true){
                    let url = `http://127.0.0.1:8000/api/delete_customer/${id}`;
                    await axios.delete(url).then(response => {
                        if (response.data.code == 200) {
                            alert(response.data.message);
                            this.getCustomers();

                        }
                    }).catch(error => {
                        console.log(error);
                    });
                } else {
                    alert('Delete cancelled');
                }
                
            }
        },
        mounted: function() {
            console.log('Edit component loaded successfully');
        }
    }
</script>

<style scoped>

</style>