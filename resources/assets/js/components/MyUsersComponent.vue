<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form-component @new="addUsers"></form-component>

            <users-component
                v-for="(user, index) in users"
                :key="user.id"
                :user="user"
                @update="updateUser(index, ...arguments)"
                @delete="deleteUser(index)">
            </users-component>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            }
        },

        mounted() {
            axios.get('/users').then((response) => {
                this.users = response.data;
            });
        },

        methods: {
            addUsers(user) {
                this.users.push(user);
            },
            updateUser(index, user) {
                this.users[index] = user;
            },
            deleteUser(index) {
                this.users.splice(index, 1);
            }
        }
    }
</script>
