<?php

namespace BaseExample\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use BaseExample\Services\Crypt;

/**
 * @group Base
 *
 */
class BaseController extends Controller {

	private $request;

	public function __construct(Request $request){

		$this->request = $request;
	}

	public function countries(Crypt $crypt, $id=null){

		return jsend_success($crypt->decrypt('3-OTk1NDU2'));

		dd($this->request->all());
	}
}