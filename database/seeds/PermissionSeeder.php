<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permission = [
            [
                'name' => 'create',
                'display_name' => 'Create',
                'description' => 'Create'
            ],
            [
                'name' => 'update',
                'display_name' => 'Update',
                'description' => 'Update'
            ],
            [
                'name' => 'delete',
                'display_name' => 'Delete',
                'description' => 'Delete'
            ],
            [
                'name' => 'display',
                'display_name' => 'Display',
                'description' => 'Display'
            ],

        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
