<?php

// UserPolicy.php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewHome(User $user)
    {
    
        return true; // Mặc định, tất cả User đều có quyền truy cập trang Home
    }
}

