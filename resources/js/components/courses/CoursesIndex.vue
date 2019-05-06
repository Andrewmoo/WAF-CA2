<template>
    <div class="container mt-40 text-white">
        <table class="table table-striped table-dark table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Code</th>
                    <th scope="col">Points</th>
                    <th scope="col">Level</th>
                </tr>
            </thead>
            <tbody>
                <tr  :key="course.title" v-for="course in courses">
                    <td><router-link class="text-white text-uppercase" :to="{ name: 'courses.view', params: { id: course.id } }">{{course.title}}</router-link></td>
                    <td>{{course.code}}</td>
                    <td>{{course.points}}</td>
                    <td>{{course.level}}</td>
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
            axios.get('/api/courses', {
                headers: { Authorization: "Bearer " + token }
            })
            .then(function (resp) {
                console.log(resp.data);
                app.courses = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert('Could not load courses');
            });
        },
        data() {
            return {
                courses: []
            }
        }
    }
</script>
