<?php

namespace App\Facades;

use App\Facades\BaseFacade;

/**
 * @method static \Illuminate\Http\JsonResponse all(string $sort_name, string $sort_direction, integer $per_page, int $parent_id)
 * @method static \Illuminate\Http\JsonResponse find(integer $comment_id)
 * @method static \Illuminate\Http\JsonResponse store(array $attributes)
 *
 * @see \App\Repositories\CommentRepository
 */
class CommentRepoFacade extends BaseFacade
{
}
