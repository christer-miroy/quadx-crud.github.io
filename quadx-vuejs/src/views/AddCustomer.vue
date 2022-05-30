<template>
    <!--header-->
    <div class="container text-center mt-3">
        <div class="row">
            <div class="col">
                <h2>Add Customer</h2>
            </div>
            <div class="col">
                <router-link to="/" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left-circle"></i> Back to Customer List</router-link>
            </div>
        </div>
    </div>

    <!--body-->
    <div class="container mt-3">
        <div class="row">
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
                <form @submit.prevent="saveCustomer" novalidate>
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
                        <button class="btn btn-primary btn-sm mt-4"><i class="bi bi-check-circle"></i> Submit</button>
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
        name: 'AddCustomer',
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
        methods: {
            async saveCustomer() {
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
                    let url = 'http://127.0.0.1:8000/api/save_customer';
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
            }            
        }
    }
</script>

<style scoped>

</style>