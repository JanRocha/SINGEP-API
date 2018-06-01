// Vue.component('componente-table',{
//   props:['titulos','registros'],
//   template:'<table class="table">'+
//     '<thead>'+
//       '<tr>'+
//         '<th v-for="titulo in titulos">{{titulo}}</th>'+
//       '</tr>'+
//     '</thead>'+
//     '<tbody>'+
//       '<tr v-for="registro in registros">'+
//         '<td v-for="item in registro">{{item}}</td>'+
//       '</tr>'+
//     '</tbody>'+
//   '</table>'
// });
var cadastro =new Vue({
el:'#cadastro',
data:{
meuTitulo:'Esse é o titulo',
registros:[
  {titulo:'Titulo',email:'email@mail.com.br',idade:'1'},
  {titulo:'Titulo2',email:'email2@mail.com.br',idade:'12'},
  {titulo:'Titulo3',email:'email3@mail.com.br',idade:'13'},
  {titulo:'Titulo4',email:'email4@mail.com.br',idade:'14'},
]
},
})
