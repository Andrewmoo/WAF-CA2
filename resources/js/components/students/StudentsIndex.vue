<template>
    <div class="container mt-40 text-white">
        <table class="table table-striped table-dark table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr :key="student.title" v-for="student in students">
                    <th scope="row">{{student.id}}</th>
                    <td><router-link class="text-white" :to="{ name: 'students.view', params: { id: student.id } }">{{student.name}}</router-link></td>
                    <td>{{student.address}}</td>
                    <td>{{student.email}}</td>
                    <td>{{student.phone}}</td>
                    <td>
                        <router-link :to="{ name: 'students.delete', params: { id: student.id } }" class="btn btn-sm btn-danger">Delete</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            var app = this;
            var token = localStorage.getItem('token');
            axios.get('/api/students', {
                headers: { Authorization: "Bearer " + token }
            })
            .then(function (resp) {
                console.log(resp.data);
                app.students = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert('Could not load students');
            });
        },
        data() {
            return {
                students: []
            }
        }
    }
</script>
