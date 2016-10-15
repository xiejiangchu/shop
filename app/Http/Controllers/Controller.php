<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const PAGE_SIZE = 20;

    protected function getUid()
    {
        return Auth::user()->id;
    }

    protected function getUser()
    {
        return Auth::user();
    }

    protected function success()
    {
        return response()->json(array(
            'status'  => 0,
            'message' => '',
        ));
    }

    protected function fail($code, $message = 'fail')
    {
        return response()->json(array(
            'status'  => $code,
            'message' => $message,
        ));
    }

    protected function orderNO($len, $chars = null)
    {
        if (is_null($chars)) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }
        mt_srand(10000000 * (double) microtime());
        for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
            $str .= $chars[mt_rand(0, $lc)];
        }
        return $str;
    }

}
