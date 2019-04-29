<template>
  <modal name="hello-world" @before-open="beforeOpen">
    <div class="wrapper">
      <p>{{ itemToShow }}</p>
    </div>
  </modal>
</template>

<script>
  export default {
    name: 'HelloWorld',

    data: function () {
      return {
          item: ''
      }
    },

    computed: {
      itemToShow: function () {
        return this.item
      }
    },

    methods: {
      beforeOpen (event) {
        this.item = event.params.item;
      }
    }
  }
</script>

<style scoped>
  .wrapper {
    height: 100%;
    width: 100%;
    background-color: black;
  }
</style>
