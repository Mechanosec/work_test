<?php


namespace App\Http\Controllers;

use App\Http\Requests\User\AddToEventUserRequest;
use App\Http\Requests\User\GetUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    public function __construct()
    {
        $this->userService = App::make(UserService::class);
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function get(int $id=0)
    {
        $user = $this->userService->get($id);

        if(!is_null($user)) {
            return $this->apiResponse($user, 200, 'default');
        } else {
            return $this->apiResponse('возникла ошибка при получении пользователя', 500, 'error');
        }
    }

    /**
     * @param GetUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getList(GetUserRequest $request)
    {
        $users = $this->userService->getList($request);

        if(!is_null($users)) {
            return $this->apiResponse($users, 200, 'default');
        } else {
            return $this->apiResponse('возникла ошибка при получении пользователя', 500, 'error');
        }
    }

    /**
     * @param StoreUserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function onStore(StoreUserRequest $request, int $id=0)
    {
        $response = $this->userService->onStore($request, $id);

        if(!isset($response['error'])) {
            return $this->apiResponse('', 200, 'empty');
        } else {
            return $this->apiResponse($response['error'], 500, 'error');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(int $id=0)
    {
        if( User::onDelete($id)) {
            return $this->apiResponse('', 200, 'empty');
        } else {
            return $this->apiResponse('возникла ошибка при получении пользователя', 500, 'error');
        }
    }

    /**
     * @param AddToEventUserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function addToEvent(AddToEventUserRequest $request, int $id=0)
    {
        $response = $this->userService->addToEvent($request, $id);

        if(!isset($response['error'])) {
            return $this->apiResponse('', 200, 'empty');
        } else {
            return $this->apiResponse($response['error'], 500, 'error');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delFromEvent(int $id=0)
    {
        $response = $this->userService->delFromEvent($id);

        if(!isset($response['error'])) {
            return $this->apiResponse('', 200, 'empty');
        } else {
            return $this->apiResponse($response['error'], 500, 'error');
        }
    }


}
