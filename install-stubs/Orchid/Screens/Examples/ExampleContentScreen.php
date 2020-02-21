<?php

namespace App\Orchid\Screens\Examples;

use App\User;
use Faker\Factory;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layout;
use Orchid\Screen\Presenters\Cardable;
use Orchid\Screen\Presenters\Compactable;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Templates\Compact;
use Orchid\Screen\Templates\Compendium;
use Orchid\Screen\Templates\Facepile;

class ExampleContentScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Stencils for 7.0';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Ready-made templates for displaying your data';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'card'        => new class implements Cardable {
                /**
                 * @return string
                 */
                public function title(): string
                {
                    return 'Title of a longer featured blog post';
                }

                /**
                 * @return string
                 */
                public function descriptions(): string
                {
                    return 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a
                  little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This
                  content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional
                  content. This content is a little bit longer.';
                }

                /**
                 * @return string
                 */
                public function image(): ?string
                {
                    return 'https://picsum.photos/600/300';
                }

                /**
                 * @return mixed
                 */
                public function status()
                {
                    return 'success';
                }

                /**
                 * @return mixed
                 */
                public function users()
                {
                    return [];
                }
            },
            'table'       => [
                new Repository([
                    'compact'    => new class implements Compactable {

                        /**
                         * @inheritDoc
                         */
                        public function id(): ?string
                        {
                            return (string) random_int(143543, 343543);
                        }

                        /**
                         * @inheritDoc
                         */
                        public function image(): ?string
                        {
                            return 'https://picsum.photos/600/300?test=rege';
                        }
                    },
                    'text'       => Factory::create()->text(),
                    'avatarList' => User::limit(10)->get()->map->presenter(),
                ]),
            ],
            'compendium'  => [
                'В прошлом месяце'  => '30 0000 руб',
                'Проектов в работе' => 14,
                'Просрочек'         => '1',
                'Клиентов'          => '10',
                'Сотрудников'       => '21',
            ],
            'compendium2' => [
                'Type'                               => 'electric stove',
                'Model'                              => 'dream 251CH',
                'Main color'                         => 'white',
                'Complementary color'                => 'none',
                'Color declared by the manufacturer' => 'white',
            ],
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return array
     * @throws \Throwable
     *
     */
    public function layout(): array
    {
        return [
            Layout::view('h1', ['text' => 'Card']),

            new \Orchid\Screen\Templates\Card('card', [
                Button::make('Example Button')
                    ->method('example')
                    ->icon('icon-bag'),
                Button::make('Example Button')
                    ->method('example')
                    ->icon('icon-bag'),
            ]),

            Layout::view('h1', ['text' => 'Compact & Facepile']),

            Layout::table('table', [

                TD::set('compact')
                    ->width('150px')
                    ->render(function ($repository) {
                        return new Compact($repository->get('compact'));
                    }),

                TD::set('text'),

                TD::set('Facepile')
                    ->render(function ($repository) {
                        return new Facepile($repository->get('avatarList'));
                    }),

            ]),

            Layout::view('h1', ['text' => 'Compendium']),

            new Compendium('compendium2'),
        ];
    }
}
