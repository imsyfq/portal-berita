<?php

namespace App\Config;

/**
 * Configure admin dashboard sidebar menu.
 * Documentation: https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration.
 */
class SidebarMenu
{
    /**
     * Seperated menu items for each features.
     *
     * @return array
     */
    public static function getChildrenMenu()
    {
        return [
            ...CategoryMenu::getMenu(),
        ];
    }

    /**
     * Get all menu items.
     *
     * @return array
     */
    public static function getMenu()
    {
        $navbarItems = [
            /* [
                'type' => 'navbar-search',
                'text' => 'search',
                // 'topnav_right' => true,
            ], */
            [
                'type' => 'fullscreen-widget',
                'topnav_right' => true,
            ],
        ];

        $sidebarItems = [
            [
                'type' => 'sidebar-menu-search',
                'text' => 'Cari Menu',
            ],

            self::item('Dashboard', 'admin/dashboard', 'fas fa-home'),

            ['header' => 'MANAGEMENT DATA'],
            ...self::getChildrenMenu(),

            /* ['header' => 'account_settings'],
            [
                'text' => 'profile',
                'url' => 'admin/settings',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'change_password',
                'url' => 'admin/settings',
                'icon' => 'fas fa-fw fa-lock',
            ],
            [
                'text' => 'multilevel',
                'icon' => 'fas fa-fw fa-share',
                'submenu' => [
                    [
                        'text' => 'level_one',
                        'url' => '#',
                    ],
                    [
                        'text' => 'level_one',
                        'url' => '#',
                        'submenu' => [
                            [
                                'text' => 'level_two',
                                'url' => '#',
                            ],
                            [
                                'text' => 'level_two',
                                'url' => '#',
                                'submenu' => [
                                    [
                                        'text' => 'level_three',
                                        'url' => '#',
                                    ],
                                    [
                                        'text' => 'level_three',
                                        'url' => '#',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'text' => 'level_one',
                        'url' => '#',
                    ],
                ],
            ],
            ['header' => 'labels'],
            [
                'text' => 'important',
                'icon_color' => 'red',
                'url' => '#',
            ],
            [
                'text' => 'warning',
                'icon_color' => 'yellow',
                'url' => '#',
            ],
            [
                'text' => 'information',
                'icon_color' => 'cyan',
                'url' => '#',
            ], */
        ];

        return array_merge($sidebarItems, $navbarItems);
    }

    /**
     * Generate new menu item.
     *
     * @param  $text,  $url, $icon, $icon_color, $label, $label_color, $submenu
     * @return array
     */
    public static function item(
        ?string $text = null,
        ?string $url = null,
        ?string $icon = null,
        ?string $icon_color = null,
        ?string $label = null,
        ?string $label_color = null,
        ?array $submenu = null
    ) {
        $menu = [
            'text' => $text,
            'url' => $url,
            'icon' => $icon,
            'icon_color' => $icon_color,
            'label' => $label,
            'label_color' => $label_color,
            'submenu' => $submenu,
            // add more params and keys if needed.
        ];

        return array_filter($menu);
    }
}
