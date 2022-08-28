<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as Controller;
use Illuminate\Http\Request;
use Log;

class GuiaController extends Controller
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function Creacion(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);

        $success = array('exito' => 'todo en orden', );
        return $this->sendResponse($success, 'User login successfully.');
    }
}
