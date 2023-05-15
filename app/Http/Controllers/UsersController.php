<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Modules\Users\UserController;
use App\Http\Requests\DatatablesRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends Controller
{   

    public function __construct(
        private readonly UsersService $service
    )
    {

    }

    public function index(DatatablesRequest $request): JsonResponse
    {
        try {
            return response()->json(this->service->index($request->data()));
        } catch (Exception $e) {
            return response()->json(
                [
                    "exception" => get_class($error),
                    "error" => $error->getMessage()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

    }
    
}