<?php

namespace App\Http\Responses;

use Illuminate\Http\Response;

class AndroidResponse
{
    public function serverError($msg = null, $status = 500)
    {
        $msg = $msg ?: 'Server Error!';

        $this->error($msg, $status);
    }

    public function error($msg = null, $status = 412)
    {
        response()->json($this->errorMsg($msg), $status)->throwResponse();
    }

    public function successWithNoContent()
    {
        response()->json(null, Response::HTTP_NO_CONTENT)->throwResponse();
    }

    public function success($data, $status = 200)
    {
        response()->json($data, $status)->throwResponse();
    }

    private function errorMsg($msg)
    {
        return ['error' => $msg];
    }
}
