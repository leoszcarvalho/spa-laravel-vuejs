<template>
    <div class="panel panel-default">
        <div class="panel-heading">Cadastrar Novo Usuário</div>

        <div class="panel-body">
            <form action="" v-on:submit.prevent="newUser()">
                <div class="form-group">
                    
                    <!--
                    <label for="thought">Ahora estoy pensando en:</label>
                    <input type="text" class="form-control" name="thought" v-model="description">
                    -->

                    <label for="name">Nome:</label>
                    <input name="name" type="text" class="form-control" v-model="name">

                    <label for="email">E-mail:</label>
                    <input name="email" type="text" class="form-control" v-model="email">

                    <label for="password">Password:</label>
                    <input name="password" id="password" ref="passp" v-model="password"  class="form-control" :type="'password'">

                </div>
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newUser() {

 

                console.log(this.name + "---");
                const params = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                };


                axios.post('/users', params)
                    .then((response) => {

                        alert("Usuário incluído com sucesso!");
        
                        this.name = '';
                        this.email = '';
                        this.password = '';

                        console.log(response);

                            const user = response.data;
                            this.$emit('new', user);

                    
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

                        }else{

                            alert("Este e-mail já existe no banco de dados");
                            
                        }


                        console.log(error.response)
                    
                    });
            }
        }
    }


</script>
