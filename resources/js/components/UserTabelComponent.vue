<template>

    <table-component 
        :data="table"
        sort-by="songs"
        sort-order="asc"
        filterNoResults="Пользоавтели не найдены"
        filterPlaceholder="Поиск по пользователям"
        tableClass="table"
        filter-input-class="form-control-plaintext"
        show-caption="false"
        >
        
        <!-- <table-column show="ID" label="Номер задачи" data-type="numeric"></table-column> -->
        <table-column show="id" lable="id"></table-column>
        <table-column show="name" label="Имя" ></table-column>
        <table-column show="role" label="Роль"></table-column>
        <table-column show="department" label="Отдел"></table-column>
        <table-column show="email" label="Почта"></table-column>
        <table-column show="message" label=""></table-column>
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
         table:[]
      }
   },
   mounted(){
      this.update()
   },
   methods:{
        update:function(){
            axios.post('/user_managment/user/list').then((response)=>{
                console.log(response);
                var table = this.table;
                Object.keys(response.data).forEach(function (key) {
                    var item = response.data[key];
                    table.push({
                        'id' : item.id,
                        'role' : item.role,
                        'department' : item.department,
                        'name': '<a href="/user_managment/user/'+item.id+'">'+ item.name + '</a>',
                        'email': item.email,
                        'message': '<a  class="btn btn-primary" href="/user_managment/message/create/'+item.id+'">'+ 
                                        '<i class="far fa-envelope"></i>' +' Написать'+
                                    '</a>'
                    });
                });
            });
        }
    }
}
</script>