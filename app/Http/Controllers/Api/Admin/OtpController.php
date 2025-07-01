<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class OtpController extends Controller
{
    public function index()
    {
        $keys=Redis::connection('otp')->client()->keys('mobile:*');
        $data = [];

        foreach ($keys as $key) {
            $number = str_replace('bashgah_database_mobile:', '', $key);
            $value = Redis::connection('otp')->client()->get('mobile:'.$number);

            $data[] = [
                'cellphone' => $number,
                'code' => $value
            ];
        }

        return response()->json(["otp"=>$data]);
    }
}
