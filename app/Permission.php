<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'edit_users_self',

            'view_tasks',
            'add_tasks',
            'edit_tasks',
            'delete_tasks',

            'view_tasks_self',
            'add_tasks_self',
            'edit_tasks_self',
            'delete_tasks_self',

        ];
    }
}
