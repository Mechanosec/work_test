<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function apiResponse($data, int $code = 200, $type = 'default')
    {
        switch ($type) {
            case 'default':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                    'data' => $data,
                ];
                break;

            case 'auth':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                    'auth_token' => $data,
                ];
                break;

            case 'empty':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                ];
                break;

            case 'error':
                $out = [
                    'result' => [
                        'status' => false,
                    ],
                    'error' => $data
                ];
                break;

            case 'jsonable':
                $out = [
                    'result' => [
                        'status' => true,
                    ],
                    'data' => $data,
                    'meta' => [
                        'current_page' => $data->currentPage(),
                        'from' => $data->firstItem(),
                        'to' => $data->firstItem() + $data->count() - 1,
                        'last_page' => $data->lastPage(),
                        'per_page' => $data->perPage(),
                        'total' => $data->total(),
                    ]
                ];
                break;

            default:
                throw new Exception('Response type not found');
        }


        if($code === 0)
            $code = 500;

        return response()->json($out, $code);
    }
}
