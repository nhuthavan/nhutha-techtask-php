<?php

namespace App\Responses;


use Symfony\Component\HttpFoundation\JsonResponse;

class PrepareForResponse
{
    
    protected $code = 200;
    protected $error = false;
    protected $message;
    protected $data;
    
    public function setCode($ode)
    {
        $this->code = $code;
        return $this;
    }
    public function getCode(){
        return $this->code;
    }
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }
    public function getError(){
        return $this->error;
    }
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    public function getMessage(){
        return $this->message;
    }
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    public function getData(){
        return $this->data;
    }

    public function reponseToJson()
    {
        return new JsonResponse([
            'error' => $this->error,
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data,
        ]);
    }
}
