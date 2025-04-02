<?php
namespace App\Traits;

trait permissionTrait {
    public function hasPermission() {
        //For Departments
        if(!isset(auth()->user()->role->permission['name']['department']['can-add']) && 
            \Route::is('departments.create')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['department']['can-list']) && 
            \Route::is('departments.index')) {
                return abort(401);
        }

        // if(!isset(auth()->user()->role->permission['name']['department']['can-edit']) && 
        //     \Route::is('departments.edit')) {
        //         return abort(401);
        // }

        if(!isset(auth()->user()->role->permission['name']['department']['can-delete']) && 
            \Route::is('departments.destroy')) {
                return abort(401);
        }

        //For Users
        if(!isset(auth()->user()->role->permission['name']['user']['can-add']) && 
            \Route::is('users.create')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['user']['can-list']) && 
            \Route::is('users.index')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['user']['can-edit']) && 
            \Route::is('users.edit')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['user']['can-delete']) && 
            \Route::is('users.destroy')) {
                return abort(401);
        }

        //For Role
        if(!isset(auth()->user()->role->permission['name']['role']['can-add']) && 
            \Route::is('roles.create')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['role']['can-list']) && 
            \Route::is('roles.index')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['role']['can-edit']) && 
            \Route::is('roles.edit')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['role']['can-delete']) && 
            \Route::is('roles.destroy')) {
                return abort(401);
        }

        //For Permissions 
        if(!isset(auth()->user()->role->permission['name']['permission']['can-add']) && 
            \Route::is('permissions.create')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['permission']['can-list']) && 
            \Route::is('permissions.index')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['permission']['can-edit']) && 
            \Route::is('permissions.edit')) {
                return abort(401);
        }

        if(!isset(auth()->user()->role->permission['name']['permission']['can-delete']) && 
            \Route::is('permissions.destroy')) {
                return abort(401);
        }

        //approve-reject staff leave
        if(!isset(auth()->user()->role->permission['name']['leave']['can-list']) && 
            \Route::is('leaves.index')) {
                return abort(401);
        }
    }
}
