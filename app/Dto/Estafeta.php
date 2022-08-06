<?php
namespace App\Dto;

use Log;

use App\Dto\Estafeta\Label;
use App\Dto\Estafeta\LabelDescriptionList;
use App\Dto\Estafeta\OriginInfo;
use App\Dto\Estafeta\DestinationInfo;
use App\Dto\Estafeta\DrAlternativeInfo;


/**
 * 
 */
class Estafeta 
{
	
	function __construct()
	{
		// code...
	}

	function init(){

		Log::info(__CLASS__." ".__FUNCTION__); 

		$originInfo = new OriginInfo();
		$destinationInfo = new DestinationInfo();
		$Dralternativeinfo = new DrAlternativeInfo();

		$tmp = array("originInfo" => $originInfo
					,"destinationInfo"	=> $destinationInfo
					,"Dralternativeinfo"=> $Dralternativeinfo	
					);

		$labelDescriptionList = new LabelDescriptionList($tmp);
        $data = array("labelDescriptionList" => $labelDescriptionList);//$request->all();

       
        try{

            /* Se inicializa el WS para DEV*/
            $wsdl = config('ltd.estafeta');
            $path_to_wsdl = sprintf("%s%s",resource_path(), $wsdl );
            Log::debug($path_to_wsdl);
            $client = new \SoapClient($path_to_wsdl, array('trace' => 1));
            ini_set("soap.wsdl_cache_enabled", "0");
            
            $labelDTO = new Label($data);
			
            $response =$client->createLabel($labelDTO);
            dd($response);
            return response()->json([
                'codigo' => $response->globalResult->resultCode,
                'descripcion' => $response->globalResult->resultDescription
                ,'pdf'  => base64_encode($response->labelPDF)
            ]);
                 

        } catch (DataTransferObjectError $exception) {

             return response()->json([
                'codigo' => "11",
                'descripcion' => $exception->getMessage()
                ,'pdf'  => null
                ]);

        } catch(Exeption $e){

        	return response()->json([
                'codigo' => "11",
                'descripcion' => $e->getMessage()
                ,'pdf'  => null
                ]);
        }


	}
}

?>