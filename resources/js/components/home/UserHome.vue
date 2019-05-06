<template>
    <div class="content">
        <nav class="my-3 navbar nav-tabs navbar-expand-lg navbar-light bg-success ">
            <a class="navbar-brand" href="#">Laravel</a>
            <router-link :to="{ name: 'courses' }" class="nav-link text-white">Courses</router-link>
            <router-link :to="{ name: 'students' }" class="nav-link text-white">Students</router-link>
            <router-link :to="{ name: 'enrolments' }" class="nav-link text-white">Enrolments</router-link>
            <a v-on:click="logout()" class="btn btn-outline-danger ml-auto my-2 my-sm-0 text-white">Logout</a>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
            }
        },
        mounted() {
            var app = this;
            if (localStorage.getItem('token') === null) {
                app.$router.replace({name: 'login'});
            }
            app.$router.push({name: 'courses'});
        },
        methods: {
            logout() {
                var app = this;
                var token = localStorage.removeItem('token');
                app.$router.push({ name: 'login' });
            }
        }
    }
</script>
