Vue.component('componente-table',{
  props:['titulos','registros'],
  template:'<table class="table">'+
    '<thead>'+
      '<tr>'+
        '<th v-for="titulo in titulos">{{titulo}}</th>'+
      '</tr>'+
    '</thead>'+
    '<tbody>'+
      '<tr v-for="registro in registros">'+
        '<td v-for="item in registro">{{item}}</td>'+
      '</tr>'+
    '</tbody>'+
  '</table>'
});
