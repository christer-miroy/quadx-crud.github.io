<template>
    <nav class="navbar m-4">
        <div class="container-fluid d-flex justify-content-center">
            <router-link class="navbar-brand" to="/">{{ title }}</router-link>
        </div>
    </nav>
    <router-view></router-view>
</template>

<script>
    export default {
        name: 'NavBar',
        props: {
            title: String
        }
    }
</script>

<style scoped>

</style>