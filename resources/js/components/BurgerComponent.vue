
<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <Slide>
                    <avatar   
                        v-bind:radius="radius" 
                        v-bind:username="username" 
                        v-bind:fullname="fullname" 
                        v-bind:size="size" 
                        v-bind:image="image" 
                    >
                    </avatar>
                    <br>
                    {{username}}
                    <span v-for="url in urlData" :key="url.id"> 
                        <i v-bind:class="url.icon" aria-hidden="true" style="margin-right: 10px;"></i>
                        <a v-bind:href="url.url">
                            {{url.title}}
                        </a>
                    </span>
                </Slide>
            </div>
        </div>
    </div>
</template>


<script>
    import { Slide } from 'vue-burger-menu'
    import  Avatar  from 'vue-avatar-component'  
    export default {
        components: {
            Slide, // Register your component
            Avatar
        },
        data:function(){
            return{
                userData:[],
                radius : 0,
                username : '__',
                fullname : '__',
                size : 120,
                image : '/storage/defualt/noneImage.png'
            }
        },
        props: [
            'urlData'
        ],

        mounted() {
            this.update()
        },
        methods: {
            update: function(){
                axios.post('/ajax/user').then((response)=>{
                    console.log(response.data);
                    this.image = '/storage/'+response.data.image_link;
                    this.username = response.data.name;
                    // userData = response;
                })
            }
        }
    }
</script>