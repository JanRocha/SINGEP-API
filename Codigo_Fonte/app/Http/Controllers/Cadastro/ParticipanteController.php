<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cadastro\ParticipanteController;


/**
 * Controller responsável pelo API do cadastro de Participantes
 * @author Renato Reboucas
 * @copyright Fabrica de Aplicativos
 * @since 12/05/2018
 * @version 0.0.10
 */
class ParticipanteController extends Controller
{
  /**
 * Lista os Tipos de Eventos
 * @param Request $request Dados de Requisição
 * @return App/Model/Evento/TipoEvento Coleção de Tipos de Eventos
 */
public function listar(Request $request){
  return ParticipanteController::get()->paginate(10);
}

/**
 * Retorna o registro do Tipo de Evento
 * @param Request $request Dados de Requisição
 * @return App/Model/Evento/TipoEvento Coleção de Tipos de Eventos
 */
public function ficha($id){
  return TipoEvento::find($id);
}

/**
 * Adiciona um Tipo novo de Evento
 * @param Request $request Dados de Requisição
 */
public function adicionar(Request $request){
  if(TipoEvento::create($request->input()))
    return Response(['mensagem'=>'Cadastrado com sucesso'],201);
  else
    return Response(['mensagem'=>'Não foi possivel cadastrar'],304);
}

/**
 * Altera um Tipo novo de Evento
 * @param Integer $id Id do tipo de evento a ser alterado
 * @param Request $request Dados de Requisição
 */
public function alterar($id,Request $request){
  TipoEvento::where('id',$id)->update($request->input());
}

/**
 * Apaga um Tipo novo de Evento
 * @param Integer $id Id do Tipo de Evento a ser apagado
 */
public function apagar($id){
  TipoEvento::where('id',$id)->delete();
}
}
