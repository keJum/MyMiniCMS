<template>

    <table-component
        :data="table"
        sort-by="songs"
        sort-order="asc"
        filterNoResults="Задачи не найдены"
        filterPlaceholder="Поиск по задачам"
        tableClass="table"
        filter-input-class="form-control-plaintext"
        show-caption="false"
        >
        
        <!-- <table-column show="ID" label="Номер задачи" data-type="numeric"></table-column> -->
        <table-column show="name" label="Имя" ></table-column>
        <table-column show="status" label="Статус"  ></table-column>
    </table-component>
</template>
<script>
import { TableComponent, TableColumn } from 'vue-table-component';
export default {
   components:{
      TableComponent,
      TableColumn
   },
   data:function(){
      return{
         table:[
            // { ID: '1', name: 'lexa', status: 3, edit: '<a href="#"> edit </a>' },
            // { ID: '2', name: '18/06/1942', status: 70 },
            // { ID: '4', name: '25/02/1943', status: 22 },
            // { ID: '3', name: '07/07/1940', status: 2 },
         ]
      }
   },
   mounted(){
      this.update()
   },
   methods:{
      update:function(){
         axios.post('ajax/userTask').then((response)=>{
            response.data.forEach(item => {
                var strStatus ='';
                switch (Number.parseInt(item.status)) {
                        case 0:
                        strStatus = 'задача на распределении   '
                        break;
                        case 1:
                        strStatus = 'задача на проверке   '
                        break;
                        case 2:
                        strStatus = 'задача на переработки   '
                        break;
                        case 3:
                        strStatus = 'задача прошла проверку    '
                        break;
                        case 4:
                        strStatus = ' задача потвердена    '
                        break;
                        case 5:
                        return
                        break;
                        default:
                        strStatus = 'Не известный статус '
                        break;
                }
                console.log('<a href="/task_managment/task/'+item.id+'">'+ item.name + '</a>');
                this.table.push({
                    //   'ID': item.id,
                    'name': '<a href="/task_managment/task/'+item.id+'">'+ item.name + '</a>',
                    'status': strStatus
                });
            });
         })
      }
   }
}
</script>