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
        <table-column show="id" label="id"></table-column>
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
         table:[/**jfksdjfksjfksdjfksdjfks */]
      }
   },
   mounted(){
      this.update()
   },
   methods:{
      update:function(){
         axios.post('/ajax/userTask').then((response)=>{
            var table = this.table;
            Object.keys(response.data).forEach(function (key) {
                var item = response.data[key];
                console.log(item);
                var strStatus ='';
                switch (Number.parseInt(item.status)) {
                        case 0:
                            strStatus = 'задача на распределении   '
                            return
                        break;
                        case 1:
                            strStatus = 'задача на проверке   '
                            return
                        break;
                        case 2:
                            strStatus = 'задача на переработки   '
                            return
                        break;
                        case 3:
                            strStatus = 'задача прошла проверку    '
                            return
                        break;
                        case 4:
                            strStatus = ' задача потвердена    '
                            return
                        break;
                        case 5:
                        strStatus = 'задача в архиве'
                        break;
                        default:
                        strStatus = 'Не известный статус '
                        break;
                }
                table.push({
                    'id' : item.id,
                    'name': '<a href="/task_managment/task/'+item.id+'">'+ item.name + '</a>',
                    'status': strStatus
                });
            });
         })
      }
   }
}
</script>