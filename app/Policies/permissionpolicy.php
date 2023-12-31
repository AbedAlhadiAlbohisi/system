<?php

namespace App\Policies;

use App\Models\Admin;
// use App\Models\permission;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class permissionpolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny($permission)
    {
        //
        return $permission->hasPermissionTo('Read-Permissions')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($permission)
    {
        //
        return $permission->hasPermissionTo('Read-Permissions')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create($permission)
    {
        //
        return $permission->hasPermissionTo('Create-Permission')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update($permission)
    {
        //
        return $permission->hasPermissionTo('Update-Permission')
            ? $this->allow()
            : $this->deny(__('cms.permissionreadeeroor'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete($permission)
    {
        //
        return $permission->hasPermissionTo('Delete-Permission')
            ? $this->allow()
            : $this->deny(__('cms.permissiondelete'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, permission $permission)
    {
        //
    }
}
