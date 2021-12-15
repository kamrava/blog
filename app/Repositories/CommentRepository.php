<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository {

    /**
     * Return collection of Comment
     * @return Comment collection
     */
	public function all(string $sort_name, $sort_type, $per_page)
	{
        // info('asda', [
        //     'comments' => Comment::orderBy($sort_name, $sort_type)
        //     ->withDepth()
        //     ->with('ancestors')
		// 	->paginate($per_page)
        // ]);
		return Comment::orderBy($sort_name, $sort_type)
            ->withDepth()
            ->with('ancestors')
			->get()
            ->toFlatTree();
	}

    /**
     * Store a Comment
     * @param array $inputs
     * @return Boolean
     */
	public function store($inputs)
	{
		return Comment::create($inputs);
	}
}
