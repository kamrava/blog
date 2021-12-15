<?php

namespace Tests\Unit;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * Create new Comment
     *
     * @return void
     */
    public function test_create_new_comment()
    {
        $formParams = [
            'user' => $this->faker->firstName(),
            'body' => $this->faker->sentence(),
        ];

        $headers = [
            'Accept' => 'application/json'
        ];

        $this->json('POST', route('comments.store'), $formParams, $headers)
            ->assertStatus(200)
            ->assertJson(['message' => 'Comment Created Successfully']);
    }

    /**
     * Create new Comment With Wrong Param
     *
     * @return void
     */
    public function test_create_new_comment_with_wrong_param()
    {
        $formParams = [
            'wrong1' => $this->faker->firstName(),
            'wrong2' => $this->faker->sentence(),
        ];

        $headers = [
            'Accept' => 'application/json'
        ];

        $this->json('POST', route('comments.store'), $formParams, $headers)
            ->assertStatus(422)
            ->assertJson(['message' => 'The given data was invalid.']);
    }

    /**
     * List all Comments
     *
     * @return void
     */
    public function test_list_all_comments()
    {
        $headers = [
            'Accept' => 'application/json'
        ];

        $this->json('GET', route('comments.list'), [], $headers)
            ->assertStatus(200)
            ->assertJson(['data' => []]);
    }

    /**
     * Reply to a comment
     *
     * @return void
     */
    public function test_reply_to_a_comment()
    {
        $comment = Comment::factory()->create();

        $formParams = [
            'user' => $this->faker->firstName(),
            'body' => $this->faker->sentence(),
            'parent_id' => $comment->id
        ];

        $headers = [
            'Accept' => 'application/json'
        ];

        $this->json('POST', route('comments.store'), $formParams, $headers)
            ->assertStatus(200)
            ->assertJson(['message' => 'Comment Created Successfully']);
    }
}
