<?php

namespace App\Facades;

use App\Facades\BaseFacade;

/**
 * @method static \Illuminate\Http\JsonResponse serverError(string $msg = null, $status = 500)
 * @method static \Illuminate\Http\JsonResponse error(string $msg = null, $status = 412)
 * @method static \Illuminate\Http\JsonResponse successWithNoContent()
 * @method static \Illuminate\Http\JsonResponse success(string|array $data, $status = 200)
 */
class Responder extends BaseFacade
{
}
