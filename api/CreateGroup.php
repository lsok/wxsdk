<?php
/**
 * Created by PhpStorm.
 * User: lixiang
 * Date: 16/2/23
 * Time: 14:17
 */

namespace imxiangli\wxsdk\api;


use GuzzleHttp\Client;
use yii\helpers\Json;

class CreateGroup extends Api
{
	public $access_token;
	public $name;

	public function setParams($params)
	{
		if(isset($params['access_token']))
		{
			$this->access_token = $params['access_token'];
		}
		if(isset($params['name']))
		{
			$this->name = $params['name'];
		}
	}

	public function request()
	{
		$client = new Client();
		$rs = $client->request('POST', 'https://api.weixin.qq.com/cgi-bin/groups/create', [
			'query' => ['access_token' => $this->access_token],
			'body' => Json::encode([
				'group' => [
					'name' => $this->name,
				],
			]),
		]);
		$response = new response\CreateGroup();
		$this->processResponse($response, $rs);
		return $response;
	}
}