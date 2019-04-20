<template>
   <AccordionMenu :contents="contents"></AccordionMenu>
</template>
<script>
   import { AccordionMenu } from 'vue-accordion-menu'  
   export default {
      components: {
         AccordionMenu
      },
      data () {
         return {
            contents: [
            {
               title: 'How are you?',
               msg: 'Test for fun!',
            },
            {
               title: 'Who let the dog out?',
               msg: 'I do not know, dude.',
            },
            {
               title: '肚子好餓?',
               msg: '吃芭樂啦！',
            },
            {
               title: 'Find hotels?',
               msg: 'Trivago！',
            },
            ],
         }
      }
   }
</script>