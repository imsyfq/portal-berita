<?php

namespace App\Config;

class CategoryMenu extends SidebarMenu
{
    public static function getMenu()
    {
        $menu = [
            // ['header' => 'Kategori'],
            self::item('Kategori', 'admin/category', 'fas fa-list'),
        ];

        return $menu;
    }
}
