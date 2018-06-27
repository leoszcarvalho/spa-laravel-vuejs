<template>
    <div class="panel panel-default">
        <div class="panel-heading">Cadastrado em {{ user.created_at }} - Última atualização: {{ user.updated_at }}</div>

        <div class="panel-body">

            <label v-if="editMode" for="name">Nome:</label>
            <input v-if="editMode" name="name" type="text" class="form-control" v-model="user.name">

            <label v-if="editMode" for="email">E-mail:</label>
            <input v-if="editMode" name="email" type="text" class="form-control" v-model="user.email">

            <label v-if="editMode" for="password">Password:</label>
            <input v-if="editMode" name="password" id="password" ref="passp"  class="form-control" :type="'password'">

            <p v-else>
                            
                <strong>Usuário:</strong> {{ user.name }}
                <br>
                <strong>E-mail:</strong> {{ user.email }}
                <br>

            </p>

        </div>

        <div class="panel-footer">
            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">
                Salvar
            </button>
            <button v-else class="btn btn-default" v-on:click="onClickEdit()">
                Editar
            </button>

            <button class="btn btn-danger" v-on:click="onClickDelete()">
                Eliminar
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {

                if (confirm("Deseja mesmo deletar este usuário?")) {

                    axios.delete(`/users/${this.user.id}`).then(() => {
                        this.$emit('delete');
                    });

                }
            
            },
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {

                const params = {
                    id: this.user.id,
                    name: this.user.name,
                    email: this.user.email,
                    password: this.$refs.passp.value,
                };
                axios.put(`/users/${this.user.id}`, params)
                .then((response) => {
                    this.editMode = false;
                    const user = response.data;
                    this.$emit('update', user);
                })
                .catch(error => {
                
                    //alert("Não foi possível salvar os dados!");

                    if (error.response.data.errors !== undefined) {
                        if (error.response.data.errors.name !== undefined) {
                            alert(error.response.data.errors.name);
                        }

                        if (error.response.data.errors.email !== undefined) {
                            alert(error.response.data.errors.email);
                        }

                        if (error.response.data.errors.password !== undefined) {
                            alert(error.response.data.errors.password);
                        }

                    }


                    console.log(error.response)
                
                });
            }
        }
    }
</script>
