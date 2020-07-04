<?php


namespace App\Http\Controllers;


use App\Http\Requests\AuthRequest;
use App\Service\AuthService;
use Illuminate\Support\Facades\App;

class AuthController extends Controller
{

    /**
     * @var AuthService
     */
    protected $authService;

    public function __construct()
    {
        $this->authService = App::make(AuthService::class);
    }

    /**
     * @param AuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function login(AuthRequest $request)
    {
        $response = $this->authService->login($request);
        if($response) {
            return $this->apiResponse($response, 200, 'auth');
        } else {
            return $this->apiResponse('возникла ошибка при авторизации', 500, 'error');
        }
    }
}
