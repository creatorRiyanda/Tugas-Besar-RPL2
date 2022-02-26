<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;

class ApiController extends Controller
{
	private $url = "https://api.rajaongkir.com/";
	private $key = "6d7864d58a3833ee1623f52c1e69184b";

    public function getProvince()
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->url."starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ".$this->key
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$ress = json_decode($response);
			$row = "<option disabled selected>-- Pilih Provinsi --</option>";
			foreach($ress->rajaongkir->results as $value){
				$row .= "<option value='".$value->province_id."'>".$value->province."</option>";
			}
			return $row;
		  	// return $response;
		}
    }

    public function getCity($province_id)
    {
    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->url."starter/city?province=".$province_id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ".$this->key
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$ress = json_decode($response);
			$row = "<option disabled selected>-- Pilih Kota --</option>";
			foreach($ress->rajaongkir->results as $value){
				$row .= "<option value='".$value->city_id."'>".$value->type." ". $value->city_name ."</option>";
			}
			return $row;
		  	// return $response;
		}
    }

    public function getCost($city_id, $kurir)
    {
    	$getAwal = Address::where('id', 1)->first();
    	$origin = $getAwal->kota_id;

    	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->url."starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=$origin&destination=$city_id&weight=1000&courier=$kurir",
		  CURLOPT_HTTPHEADER => array(
		    "key: ".$this->key
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$ress = json_decode($response);
			$row = "";
			foreach($ress->rajaongkir->results as $value){
				foreach($value->costs as $val2){
					foreach($val2->cost as $val3){
						$row .= "<input type='radio' class='jenis_ekspedisi' data-price='".$val3->value."' name='jenis_ekspedisi' value='".$value->code."-".$val2->service."-".$val3->value."'> <strong>" . $val2->service . " (" . $val3->etd . ") - (". $val3->value . ")</strong><br>";
					}
				}
			}
			return $row;
		  	// return $response;
		}
    }
}
