<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            'User' => [
                ['name' => 'user.index', 'name_translate' => 'خواندن'],
                ['name' => 'user.create', 'name_translate' => 'ایجاد'],
                ['name' => 'user.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'user.delete', 'name_translate' => 'حذف']
            ],
            'Role' => [
                ['name' => 'role.index', 'name_translate' => 'خواندن'],
                ['name' => 'role.create', 'name_translate' => 'ایجاد'],
                ['name' => 'role.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'role.delete', 'name_translate' => 'حذف']
            ],
            'Permission' => [
                ['name' => 'permission.index', 'name_translate' => 'خواندن'],
                ['name' => 'permission.create', 'name_translate' => 'ایجاد'],
                ['name' => 'permission.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'permission.delete', 'name_translate' => 'حذف']
            ],
            'News' => [
                ['name' => 'news.index', 'name_translate' => 'خواندن'],
                ['name' => 'news.create', 'name_translate' => 'ایجاد'],
                ['name' => 'news.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'news.delete', 'name_translate' => 'حذف']
            ],
            'Category' => [
                ['name' => 'category.index', 'name_translate' => 'خواندن'],
                ['name' => 'category.create', 'name_translate' => 'ایجاد'],
                ['name' => 'category.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'category.delete', 'name_translate' => 'حذف']
            ],
            'Ticket' => [
                ['name' => 'ticket.index', 'name_translate' => 'خواندن'],
                ['name' => 'ticket.create', 'name_translate' => 'ایجاد'],
                ['name' => 'ticket.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'ticket.delete', 'name_translate' => 'حذف']
            ],
            'Configuration' => [
                ['name' => 'configuration.index', 'name_translate' => 'خواندن'],
                ['name' => 'configuration.create', 'name_translate' => 'ایجاد'],
                ['name' => 'configuration.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'configuration.delete', 'name_translate' => 'حذف']
            ],
            'NotificationConfiguration' => [
                ['name' => 'notification_configuration.index', 'name_translate' => 'خواندن'],
                ['name' => 'notification_configuration.create', 'name_translate' => 'ایجاد'],
                ['name' => 'notification_configuration.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'notification_configuration.delete', 'name_translate' => 'حذف']
            ],
            'Menu' => [
                ['name' => 'menu.index', 'name_translate' => 'خواندن'],
                ['name' => 'menu.create', 'name_translate' => 'ایجاد'],
                ['name' => 'menu.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'menu.delete', 'name_translate' => 'حذف']
            ],
            'Comment' => [
                ['name' => 'comment.index', 'name_translate' => 'خواندن'],
                ['name' => 'comment.create', 'name_translate' => 'ایجاد'],
                ['name' => 'comment.edit', 'name_translate' => 'ویرایش'],
                ['name' => 'comment.delete', 'name_translate' => 'حذف']
            ]
        ];

        foreach ($models as $model => $permissions) {
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission['name'], 'name_translate' => $permission['name_translate'],
                    'model' => $model, 'model_translate' => getModelsTranslate($model)]);
            }
        }
    }
}
