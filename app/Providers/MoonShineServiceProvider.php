<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\PlayerResource;
use App\MoonShine\Resources\TeamResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;
use MoonShine\Menu\MenuDivider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),
            MenuDivider::make(),
            MenuItem::make('Cursos/Paralelos', new TeamResource)->icon('heroicons.outline.user-group'),
            //MenuItem::make('Curso', new TeamResource)->icon('heroicons.outline.flag'),
            MenuItem::make('Estudiantes', new PlayerResource)->icon('heroicons.user'),

            MenuDivider::make(),
            // Menú para cada categoría
        MenuGroup::make('Alfabeto Dactilológico', [
            MenuItem::make('Diversión en Pantalla', '/alfabeto-dactilologico/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/alfabeto-dactilologico/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/alfabeto-dactilologico/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/alfabeto-dactilologico/explora'),
            MenuItem::make('Juguemos', '/alfabeto-dactilologico/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),

        MenuGroup::make('Los Números', [
            MenuItem::make('Diversión en Pantalla', '/los-numeros/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/los-numeros/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/los-numeros/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/los-numeros/explora'),
            MenuItem::make('Juguemos', '/los-numeros/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),

        MenuGroup::make('Los Colores', [
            MenuItem::make('Diversión en Pantalla', '/los-colores/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/los-colores/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/los-colores/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/los-colores/explora'),
            MenuItem::make('Juguemos', '/los-colores/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),

        MenuGroup::make('Miembros de la Familia', [
            MenuItem::make('Diversión en Pantalla', '/miembros-familia/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/miembros-familia/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/miembros-familia/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/miembros-familia/explora'),
            MenuItem::make('Juguemos', '/miembros-familia/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),

        MenuGroup::make('Verbos y Pronombres', [
            MenuItem::make('Diversión en Pantalla', '/verbos-pronombres/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/verbos-pronombres/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/verbos-pronombres/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/verbos-pronombres/explora'),
            MenuItem::make('Juguemos', '/verbos-pronombres/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),

        MenuGroup::make('Alimentos y Bebidas', [
            MenuItem::make('Diversión en Pantalla', '/alimentos-bebidas/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/alimentos-bebidas/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/alimentos-bebidas/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/alimentos-bebidas/explora'),
            MenuItem::make('Juguemos', '/alimentos-bebidas/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),

        MenuGroup::make('Días de la Semana', [
            MenuItem::make('Diversión en Pantalla', '/dias-semana/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/dias-semana/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/dias-semana/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/dias-semana/explora'),
            MenuItem::make('Juguemos', '/dias-semana/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),

        MenuGroup::make('Trabajos y Oficios', [
            MenuItem::make('Diversión en Pantalla', '/trabajos-oficios/diversion'),
            MenuItem::make('Tarjetas Mágicas', '/trabajos-oficios/tarjetas'),
            MenuItem::make('El Cuentacuentos', '/trabajos-oficios/cuentacuentos'),
            MenuItem::make('Explora y Aprende', '/trabajos-oficios/explora'),
            MenuItem::make('Juguemos', '/trabajos-oficios/juguemos'),
            ])->icon('heroicons.outline.academic-cap'),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [
            'colors' => [
                'primary' => '#FFA62F',
                'secondary' => 'rgb(236, 65, 118)',
                'body' => '#300135',
                'dark' => [
                    'DEFAULT' => 'rgb(30, 31, 67)',
                    50 => '#FFA62F',
                    100 => '#FFA62F',
                    200 => '#FFA62F',
                    300 => '#300135',
                    400 => 'rgb(48, 61, 93)',
                    500 => '#7E4351',
                    600 => '#773A59',
                    700 => '#591E4C',
                    800 => '#300135',
                    900 => 'rgb(15, 23, 42)',
                ],
 
                'success-bg' => 'rgb(0, 170, 0)',
                'success-text' => 'rgb(255, 255, 255)',
                'warning-bg' => 'rgb(255, 220, 42)',
                'warning-text' => 'rgb(139, 116, 0)',
                'error-bg' => 'rgb(224, 45, 45)',
                'error-text' => 'rgb(255, 255, 255)',
                'info-bg' => 'rgb(0, 121, 255)',
                'info-text' => 'rgb(255, 255, 255)',
            ],
            'darkColors' => [
                'body' => '#300135',
                'success-bg' => 'rgb(17, 157, 17)',
                'success-text' => 'rgb(178, 255, 178)',
                'warning-bg' => 'rgb(225, 169, 0)',
                'warning-text' => 'rgb(255, 255, 199)',
                'error-bg' => 'rgb(190, 10, 10)',
                'error-text' => 'rgb(255, 197, 197)',
                'info-bg' => 'rgb(38, 93, 205)',
                'info-text' => 'rgb(179, 220, 255)',
            ]
        ];
    }
}
