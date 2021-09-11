<?php

namespace src\controllers;

use \core\Controller;
use src\models\Cep;

class HomeController extends Controller{

    public function index(){
        if (isset($_POST['cep'])) {
            $cep = filter_input(INPUT_POST, 'cep');
            $cep = HomeController::validaCep($cep);
            if (HomeController::verificaCep($cep)) {
                //faz a consulta na api
                $endereco = HomeController::pegaCep($cep);

                //busca o CEP no banco
                $ceps = HomeController::buscaCep($endereco);
                if (property_exists($endereco, 'erro')) {
                    $endereco = HomeController::enderecoVazio();
                    $endereco->cep = 'Cep Não encontrado';
                }
            } else {
                $endereco = HomeController::enderecoVazio();
                $endereco->cep = 'CEP Inválido, for favor informe um cep válido';
            }
        } else {
            $endereco = HomeController::enderecoVazio();

        }
        $this->render('home',[
            'endereco' =>$endereco
        ]);
    }

    function enderecoVazio()
    {
        return (object)[
            'cep' => '',
            'logradouro' => '',
            'complemento' => '',
            'bairro' => '',
            'localidade' => '',
            'uf' => ''
        ];
    }

    public function buscaCep($endereco){

      
        $data = Cep::select()->where('cep', $endereco->cep)->get();
         
        if (count($data) > 0) {
            echo "encontrou registro no banco";

var_dump($endereco);
exit;
        } else {
            $cep = $endereco->cep;
            $logradouro = $cep->logradouro;
            if($logradouro == ''){
                $logradouro  = "Sem Logradouro Registrado";
            }
            $complemento = $cep->complemento;
            if($complemento == ''){
                $complemento  = "Sem Complemento Registrado";
            }
            $bairro = $cep->bairro;
            $localidade = $cep->localidade;
            $uf = $endereco->uf;

            Cep::insert([
                'cep' => $endereco->cep,
                'logradouro'=>$endereco->logradouro,
                'complemento'=>$endereco->complemento,
                'bairro' => $endereco->bairro,
                'localidade' => $endereco->localidade,
                'uf'=>$endereco->uf
            ])->execute();
            return $endereco;
        }
    }

    function validaCep($cep): String
    {
        return preg_replace('/[^0-9]/', '', $cep);
    }
    
    function verificaCep($cep): bool
    {
        return preg_match('/^[0-9]{5}-?[0-9]{3}$/', $cep);
    }
    
    function pegaCep($cep){

        $url = "https://viacep.com.br/ws/{$cep}/xml/";
    
     
        return simplexml_load_file($url);

    }
}
