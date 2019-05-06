<template>
    <div class="row">
        <div class="col-md-5 mb-2">
            <div class="card card-default bg-dark">
                <div class="card-header text-white"><h1>{{student.name}}</h1></div>
                <div class="card-body">
                    <table class="table table-striped table-dark table-bordered table-hover">
                        <tr>
                            <th scope="row">Address:</th>
                            <td>{{student.address}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{student.email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td>{{student.phone}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-default bg-dark">
                <div class="card-header text-white"><h3>Enrolments</h3></div>
                <div class="card-body">
                    <table class="table table-striped table-dark table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Student</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr :key="enrolment.date" v-for="enrolment in student.enrolments">
                                <th scope="row"><router-link class="text-white" :to="{ name: 'courses.view', params: { id: enrolment.course.id } }">{{enrolment.course.title}}</router-link></th>
                                <td>{{enrolment.status}}</td>
                                <td>{{enrolment.date}}</td>
                                <td>{{enrolment.time}}</td>
                                <td>
                                    <router-link :to="{ name: 'enrolments.edit', params: { id: enrolment.id } }" class="btn btn-sm btn-primary">Edit</router-link>
                                    <router-link :to="{ name: 'enrolments.delete', params: { id: enrolment.id } }" class="btn btn-sm btn-danger">Delete</router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                student: {
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                },
                errors: {},
            }
        },

        mounted() {
            var app = this;
            var id = app.$route.params.id;
            var token = localStorage.getItem('token');
            
            var xhr = axios.get('/api/students/' + id, {
                headers: { Authorization: "Bearer " + token }
            });
            xhr = xhr.then(function (resp) {
                console.log(resp.data);
                app.student = resp.data;
            });
            xhr = xhr.catch(function (resp) {
                console.log(resp);
                alert('Could not load student');
            });
        },

        methods: {
            
        }
    }
</script>
