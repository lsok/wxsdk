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

class DeleteTag extends Api
{
	public $access_token;
	public $id;

	public function setParams($params)
	{
		if(isset($params['access_token']))
		{
			$this->access_token = $params['access_token'];
		}
		if(isset($params['id']))
		{
			$this->id = $params['id'];
		}
	}

	public function request()
	{
		$client = new Client();
		$rs = $client->request('POST', 'https://api.weixin.qq.com/cgi-bin/tags/delete', [
			'query' => ['access_token' => $this->access_token],
			'body' => Json::encode([
				'tag' => [
					'id' => $this->id,
				],
			]),
		]);
		$response = new response\DeleteTag();
		$this->processResponse($response, $rs);
		return $response;
	}
}