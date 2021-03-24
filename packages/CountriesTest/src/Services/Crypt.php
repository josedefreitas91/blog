<?php 

namespace CountriesTest\Services;

class Crypt{

	private $cvv = 8888;

	public function decrypt($cvv){

		$cvv_array = explode('-', $cvv);

		$cvv_length = reset($cvv_array);
		
		unset($cvv_array[0]);

		$cvv = implode('-', $cvv_array);

		$cvv = (base64_decode($cvv)/$this->cvv);
	    if(strlen($cvv)===1) $cvv = '00'.$cvv;
	    else if(strlen($cvv)===2) $cvv = '0'.$cvv;
	    if(strlen($cvv)===3 && $cvv_length==4) $cvv = '0'.$cvv;
	    return $cvv;
	}
}