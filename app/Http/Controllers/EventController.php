<?php


namespace App\Http\Controllers;


use App\Http\Requests\Event\AddUserEventRequest;
use App\Service\EventService;
use App\Http\Resources\Event as EventResource;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    /**
     * @var EventService
     */
    protected $eventService;

    public function __construct()
    {
        $this->eventService = App::make(EventService::class);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function get(int $id=0)
    {
        $event = $this->eventService->get($id);

        if(!is_null($event)) {
            return $this->apiResponse(new EventResource($event), 200, 'default');
        } else {
            return $this->apiResponse('возникла ошибка при получении евента', 500, 'error');
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function getList()
    {
        $event = $this->eventService->getList();

        if(!is_null($event)) {
            return $this->apiResponse(EventResource::collection($event), 200, 'default');
        } else {
            return $this->apiResponse('возникла ошибка при получении евента', 500, 'error');
        }
    }
}
