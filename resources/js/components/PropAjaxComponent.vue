<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <button v-on:click="update" class=" btn btn-defualt " v-if="!is_refresh"> Обновить {{id}} </button>
                    <span v-if="is_refresh">Обновление...</span>
                    <table>
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="url in urlData" :key="url.id"> 
                                <td> {{url.title}}</td>
                                <td> {{url.url}} </td>
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
        data:function(){
            return{
                urlData:[],
                is_refresh: false,
                id:0
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function(){
                this.is_refresh = true;
                axios.get('/home/ajax').then((response)=>{
                    console.log(response);
                    this.urlData = response.data;
                    this.is_refresh = false;
                    this.id++;
                })
            }
        }
    }
</script>
