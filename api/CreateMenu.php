<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 16/2/20
 * Time: 16:23
 */

namespace imxiangli\wxsdk\api;


use GuzzleHttp\Client;

class CreateMenu extends Api
{
	public $access_token;
	public $menu_data;

	public function setParams($params)
	{
		if(isset($params['access_token']))
		{
			$this->access_token = $params['access_token'];
		}
		if(isset($params['menu_data']))
		{
			$this->menu_data = $params['menu_data'];
		}
	}

	public function request()
	{
		$client = new Client();
		$rs = $client->request('POST', 'https://api.weixin.qq.com/cgi-bin/menu/create', [
			'query' => ['access_token' => $this->access_token],
			'body' => $this->menu_data,
		]);
		$response = new response\CreateMenu();
		$this->processResponse($response, $rs);
		return $response;
	}
}