<?php

namespace App\Singlenton;

use GuzzleHttp\Client;
use Log;

use App\Models\LtdSesion;
use Carbon\Carbon;

class Fedex {

    private static $instance;

    private $token;

    private function __construct(int $ltd_id){

        try{

            $sesion = LtdSesion::where('ltd_id', $ltd_id)
                    ->where('expira_en','>', Carbon::now())
                    ->first();

            if (!is_null($sesion)) {
                $this->token = $sesion->token;

            }else {
                Log::info(__CLASS__." ".__FUNCTION__." ClientException");
                $client = new Client(['base_uri' => 'https://apis-sandbox.fedex.com/']);

                $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
                    
                $body = "grant_type=client_credentials&client_id=l7640a59a8ce1c4dfea7bb2d302febc882&client_secret=2bc10d1d2f3b4b6ab55a0e63518c306e";

                $response = $client->request('POST', 'oauth/token', [
                        'headers'   => $headers
                        ,'body'     => $body
                        
                    ]);

                $contenido = json_decode($response->getBody()->getContents());
                Log::debug(print_r($contenido,true));

                $this->token = $contenido->access_token;
                $insert = array('empresa_id' => auth()->user()->empresa_id
                    ,'ltd_id'   => $ltd_id
                    ,'token'    => $this->token
                    ,'expira_en'=> Carbon::now()->addSeconds(3660)
                     );
                $id = LtdSesion::create($insert)->id;
                Log::info(__CLASS__." ".__FUNCTION__." ID LTD SESION $id");
            }

           

        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." ClientException");
            $response = json_decode($ex->getResponse()->getBody()->getContents());
            Log::debug(print_r($response->errors,true));
            
        } catch (\GuzzleHttp\Exception\InvalidArgumentException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." InvalidArgumentException");
            Log::debug($ex->getBody());
           
        } catch (HttpException $ex) {
            Log::info(__CLASS__." ".__FUNCTION__." HttpException");
            $resultado = $ex;
            $mensaje = "La guia no pudo ser creada";
           
        }
        
    }

    public static function getInstance( int $ltd_id){
        if (!self::$instance) {
            self::$instance = new self($ltd_id);
        }

        return self::$instance;
    }

    public function setToken($value){
        $this->token = $value;
    }

    public function getToken(){
        return $this->token;
    }
}

?>