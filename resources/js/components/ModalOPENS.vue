<template>
  <div id="app">
    <img src="./assets/logo.png">
    <Modal />
    <button @click="onClick">
      CLICK HERE!
    </button>
  </div>
</template>

<script>
  import Modal from '/VueModal.vue'

  export default {
    name: 'app',
    components: {
      Modal: Modal
    },
    methods: {
      onClick() {
        this.$modal.show('hello-world', {item: 'Hello world'});
      }
    }
  }
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>