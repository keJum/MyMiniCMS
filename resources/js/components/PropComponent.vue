<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
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
        props: [
            'urlData'
        ],
        mounted() {
            this.update()
        },
        methods: {
            update: function(){
                console.log(this.urlData)
            }
        }
    }
</script>
