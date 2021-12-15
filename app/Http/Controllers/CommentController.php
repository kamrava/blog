<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Resources\CommentsTransformer;
use App\Facades\CommentRepoFacade;
use App\Facades\Responder;

class CommentController extends Controller
{
    /**
     * Return a list of the Comment resource
     * @return Responsable
     */
    public function index()
    {
        [$per_page, $sort_by, $sort_type] = $this->getSortingInfo();

        $comments = CommentRepoFacade::all($sort_by, $sort_type, $per_page);
        $data = new CommentsTransformer($comments);
        Responder::success($data);
    }

    /**
     * Create new Comment
     * @return Responsable
     */
    public function store(CommentStoreRequest $request)
    {
        CommentRepoFacade::store($request->all());

        Responder::success([
            'message' => 'Comment Created Successfully'
        ]);
    }
}
