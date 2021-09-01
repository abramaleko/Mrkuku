<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{

    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        DB::transaction(function () use ($user) {
            $this->revokeRoles($user);
            $user->deleteProfilePhoto();
            $user->tokens->each->delete();
            $user->delete();
        });
    }

    /**
     * Revoke all roles attached to the user.
     *
     * @param  mixed  $user
     * @return void
     */
    protected function revokeRoles($user)
    {
        $user->syncRoles([]);
    }
}
