<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\city;
use Illuminate\Auth\Access\HandlesAuthorization;

class citypolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($user)
    {
        //
        return $user->hasPermissionTo('Read-cities')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($user, city $city)
    {
        //
        return $user->hasPermissionTo('Read-cities')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($user)
    {
        //
        return $user->hasPermissionTo('Create-city')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($user, city $city)
    {
        //
        return $user->hasPermissionTo('Update-city')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($user, city $city)
    {
        //
        return $user->hasPermissionTo('Delete-city')
            ? $this->allow()
            : $this->deny(__('cms.permissiondelete'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, city $city)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\city  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, city $city)
    {
        //
    }
}
