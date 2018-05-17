/**
 * Script para pagina de cadastro do tipo de evento
 * @author Renato Rebouças da Silva
 * @copyright Fabrica de APP
 * @since 12/05/2018
 * @version 0.0.10
 */
import Vue from 'vue'
import VueResource from 'vue-resource'
import moment from 'moment'

Vue.use(VueResource)

new Vue(
  {
    el:'#part',
    data:{
    response:{data:[]},
    erro:null,
    },
    filters:{

    },
    computed:{

    },
    methods:{
    listar:function(){
      this.$http.get('/cadastro/listar/').then(
        function(response){
          this.$set(this,"registros",response.data)
        },
        function(response){
          this.$set(this,"erro",response.data)
        },
      )
    },

    },
    mounted(){
      this.listar();
    }
  }
)
