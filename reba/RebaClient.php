<?php

require_once('internal/util/HttpUtils.php');
require_once('common/RebaApiException.php');

class RebaClient
{
    public $serverUrl;
    public $apikey;

    public function __construct($serverUrl, $apikey)
    {
        $this->serverUrl = $serverUrl;
        $this->apikey = $apikey;
    }

    public function smsBatchSubmit($submits)
    {
        return $this->execute((object) array('submits' => $submits), '/sms/batchSubmit');
    }

    public function smsPullStatusReport()
    {
        return $this->execute((object) array(), '/sms/pullStatusReport');
    }

    public function smsPullReplyMessage()
    {
        return $this->execute((object) array(), '/sms/pullReply');
    }

    public function userInfo()
    {
        return $this->execute((object) array(), '/user/get');
    }

    protected function execute($request, $urlPath)
    {
        $request->apikey = $this->apikey;
        $reqJson = json_encode($request);
        $reqUrl = $this->serverUrl . $urlPath;
        $resJson = HttpUtils::postJson($reqUrl, $reqJson);
        $res = json_decode($resJson);
        if ($res->code === 200) {
            return $res->response;
        }
        throw new RebaApiException($res->message, $res->code);
    }

}