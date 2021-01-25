<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function getPendingPost();

    public function find($id);
}
