<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'attribute-list',
            'attribute-create',
            'attribute-edit',
            'attribute-delete',
            'attribute_family-list',
            'attribute_family-create',
            'attribute_family-edit',
            'attribute_family-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'advertisement-list',
            'advertisement-create',
            'advertisement-edit',
            'advertisement-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            'contact-list',
            'contact-delete',
            'district-list',
            'district-create',
            'district-edit',
            'district-delete',
            'feature-list',
            'feature-create',
            'feature-edit',
            'feature-delete',
            'item-list',
            'item-create',
            'item-edit',
            'item-delete',
            'option-list',
            'option-create',
            'option-edit',
            'option-delete',
            'owner-list',
            'owner-create',
            'owner-edit',
            'owner-delete',
            'report-list',
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',
            'service_request-list',
            'service_request-delete',
            'setting-list',
            'setting-create',
            'setting-edit',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'notify-monthly',
            'notify-all',
        ];
 
 
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name' => 'admin']);
         }
    }
}
