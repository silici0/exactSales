<?php namespace silici0\ExactSales;

use Curl\Curl;

class ExactSales {
	private $config;
	private $curl;
	private $token;
	private $apiUrl = "api.spotter.exactsales.com.br/api/v2";
	private $apiProcotol = "https://";

	public function __construct($token)
	{
		echo 'ENTROU';
		$this->curl = new Curl();
		$this->token = $token;
	}

	private function inserirLead($parameters, $validar_duplicidade = 1, $addcampospersonalizados = 0)
	{
		$this->curl->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
		$this->curl->setOpt(CURLOPT_HEADER, FALSE);
		$this->curl->setOpt(CURLOPT_HEADER, TRUE);
		$this->curl->setOpt(CURLOPT_HTTPHEADER, array(
				"Content-Type: application/json",
  				"token_exact: ".$this->token
			)
		);
		$this->curl->setOpt(CURLOPT_POSTFIELDS, $parameters);
		$this->curl->post($this->apiProcotol.$this->apiUrl."/leads");
		var_dump($this->curl->response);
	}
}