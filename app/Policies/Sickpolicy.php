<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\sick;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Sickpolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($sick)
    {
        //
        return $sick->hasPermissionTo('Read-Sikes')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sick  $sick
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($sick)
    {
        //
        return $sick->hasPermissionTo('Read-Sikes')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($sick)
    {
        //
        return $sick->hasPermissionTo('Create-Sike')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sick  $sick
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($sick)
    {
        //
        return $sick->hasPermissionTo('Update-Sike')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sick  $sick
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($sick)
    {
        //
        return $sick->hasPermissionTo('Delete-Sike')
            ? $this->allow()
            : $this->deny(__('cms.permissiondelete'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sick  $sick
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, sick $sick)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\sick  $sick
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, sick $sick)
    {
        //
    }
}
