<?php

namespace App\Policies;

use App\Models\User;
use App\Models\job;
use Illuminate\Auth\Access\Response;

class jobPolicy
{
    public function edit(User $user, job $job)
    {
        return $job->employer->User->is($user);
    }

    public function destroy(User $user, job $job)
    {
        return $job->employer->User->is($user);
    }
}