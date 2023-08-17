<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        // Xác định quyền xem bài viết
        return true; // Bất kỳ người dùng nào đều có quyền xem bài viết
    }

    public function create(User $user)
    {
        // Xác định quyền tạo bài viết
        return $user->hasPermissionTo('create-post');
    }

    public function update(User $user, Post $post)
    {
        // Xác định quyền cập nhật bài viết
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        // Xác định quyền xóa bài viết
        return $user->id === $post->user_id;
    }
}
