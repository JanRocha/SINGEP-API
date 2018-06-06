<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

class AuthLoginController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(UserRepository $repository, UserValidator $validator)
  {
      $this->repository = $repository;
      $this->validator  = $validator;
  }

  public function auth(){
    echo "entrou";
  }
}
