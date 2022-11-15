<?php

namespace App\libs;

class ServiceResponse
{
    protected $status = false;
    protected $data = [];
    protected $msg = '';
    protected $code = 500;

    public function response($status, $data, $msg, $code)
    {
        $this->status = $status;
        $this->data = $data;
        $this->msg = $msg;
        $this->code = $code;
    }

    public function responseCompose($info)
    {
        if ($info == null || empty($info)) {
            $this->response(false, null, "", 400);
        } else {
            $this->response(true, $info, "", 200);
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function getDataWS()
    {
        return [
            'success' => $this->status,
            'data' => $this->data,
            'code' => $this->getRestCode(),
            'msg' => $this->msg
        ];
    }

    public function getRestCode()
    {
        return $this->code;
    }

    public function HTTPresponse()
    {
        return response()->json($this->getDataWS(), $this->getRestCode());
    }


    /**
     * ResponseError401 function
     *
     * @param string $msg
     * @param array $info
     * @return mixed
     */
    public function responseError401(string $msg = "Error 401", array $info = [])
    {
        $this->response(false, $info, $msg, 401);
        return $this;
    }

    /**
     * ResponseSuccess function
     *
     * @param array $info
     * @param string $msg
     * @return mixed
     */
    public function responseSuccess($info, string $msg = "Success")
    {
        $this->response(true, $info, $msg, 200);
        return $this;
    }

//    public function generateLog($module, $data)
//    {
//        Logs::guardarLog($module, $data);
//    }

}
