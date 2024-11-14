<?php

namespace App\Config;

class PostMenu extends SidebarMenu
{
    public static function getMenu()
    {
        $menu = [
            self::item('Berita', 'admin/post', 'fas fa-newspaper'),
        ];

        return $menu;
    }
}
