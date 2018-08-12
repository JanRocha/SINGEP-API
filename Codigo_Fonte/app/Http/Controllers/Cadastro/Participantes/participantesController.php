<?php

namespace App\Http\Controllers\Cadastro\Participantes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Usuario\participante as part;

/**
 * Controller responsável pelo API do cadastro de Centro de Distribuição
 * @author Renato Rebouças da Silva
 * @copyright Fabrica de Apps
 * @since 11/08/2018
 * @version
 */

class participantesController extends Controller{

  /**
     * Lista os Participantes
     * @param Request $request Dados de Requisição
     * @return App\Model\Usuario\participante as part Coleção de participante
     */

public function list(Request $request){
  $query = part::get();
  // dd($query);
  return $query;
}
public function save(Request $request){
  // dd("entrou");
  $registros = $request->input('registro');
  // dd($registros);
  part::create($registros);
  // $consulta = part::where('cpf', $registro['cpf'])->first();
// part::create($request->input('registro'));
//   if(part::create($request->input('registro'))) {
//   return Response(['mensagem'=>'Cadastrado com sucesso'],201);
// }else{
//   return Response(['mensagem'=>'Não foi possivel cadastrar'],304);
// }
    }

  /**
   * Altera um Participante
   * @param Integer $id Id do Participantes a ser alterado
   * @param Request $request Dados de Requisição
   */
  public function alterar($id,Request $request){
    TipoEvento::where('id',$id)->update($request->input());
  }

  /**
  * Apaga um Participante
  * @param Integer $id Id do Participante a ser apagado
  */
    public function delete($id){
   part::where('id',$id)->delete();
 }

}
