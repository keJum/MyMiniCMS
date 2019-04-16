<template>
  <avatar   
            v-bind:radius="radius" 
            v-bind:username="username" 
            v-bind:fullname="fullname" 
            v-bind:size="size" 
            v-bind:image="image" 
  >
  </avatar>
</template>

<script>
  import Avatar from 'vue-avatar-component'
  export default {
    components: { 
      Avatar 
    },
    props:[
        // 'imageJson'
    ],
    data:function(){
      return{
        // imageJson : [],
        radius : 0,
        username : 'Jon',
        fullname : 'Jon China',
        size : 40,
        image : '/storage/defualt/noneImage.png'
      }
    },
    mounted(){
      // console.log(imageJson);
    }        
  }
</script>