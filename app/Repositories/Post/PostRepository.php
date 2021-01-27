<?php
namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
    }

    public function getPendingPost()
    {
        return $this->model
            ->with('author')
            ->where('status', config('number_status_post.status'))
            ->latest()
            ->paginate(config('number_status_post.paginate_home'));
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
