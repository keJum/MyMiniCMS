
<template>
   <kanban-board :stages="stages" :blocks="blocks" @update-block="updateBlock">
      <div v-for="stage in stages" :slot="stage" :key="stage.key" >
         <h2>{{ stage }}</h2>
      </div>
      <div v-for="block in blocks" :slot="block.id" :key="block.key" >
         <div>
            <strong>id:</strong> {{ block.id }}
         </div>
         <div>
            {{ block.title }}
         </div>
      </div>
   </kanban-board>
</template>


<script>
    import vueKanban from 'vue-kanban'  
    export default {
        components: {
           vueKanban
        },
        data() {
         return {
            stages: ['on-hold', 'in-progress', 'needs-review', 'approved'],
            blocks: [
               {
                  id: 1,
                  status: 'on-hold',
                  title: 'Test',
               },
            ],
         };
      }
    }
</script>