<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {
        // Profile
        $this->dashboard->menu
            ->add(Menu::PROFILE,
                ItemMenu::label('Action')
                    ->icon('icon-compass')
                    ->badge(function () {
                        return 6;
                    })
            )
            ->add(Menu::PROFILE,
                ItemMenu::label('Another action')
                    ->icon('icon-heart')
            );

        // Main
        $this->dashboard->menu
            ->add(Menu::MAIN,
                ItemMenu::label('Examples')
                    ->slug('example-menu')
                    ->icon('icon-code')
                    ->childs()
            )
            ->add('example-menu',
                ItemMenu::label('Example screen')
                    ->icon('icon-monitor')
                    ->route('platform.example')
                    ->title('Navigation')
            )
            ->add('example-menu',
                ItemMenu::label('Basic Elements')
                    ->title('Form controls')
                    ->icon('icon-note')
                    ->route('platform.example.fields')
            )
            ->add('example-menu',
                ItemMenu::label('Advanced Elements')
                    ->icon('icon-briefcase')
                    ->route('platform.example.advanced')
            )
            ->add('example-menu',
                ItemMenu::label('Text Editors')
                    ->icon('icon-list')
                    ->route('platform.example.editors')
            )
            ->add('example-menu',
                ItemMenu::label('Overview layouts')
                    ->title('Layouts')
                    ->icon('icon-layers')
                    ->route('platform.example.layouts')
            )
            ->add('example-menu',
                ItemMenu::label('Chart tools')
                    ->icon('icon-bar-chart')
                    ->route('platform.example.charts')
            )
            ->add('example-menu',
                ItemMenu::label('Cards')
                    ->icon('icon-grid')
                    ->route('platform.example.cards')
            );
    }
}
