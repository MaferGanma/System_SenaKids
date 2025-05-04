<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Estudiante;
use App\Models\Curso;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Grid;
use MoonShine\Metrics\ValueMetric;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
        $totalEstudiantes = Estudiante::count();
        $totalCursos = Curso::count();
		return [
            Grid::make([
                ValueMetric::make('Estudiantes Registrados')
                    ->value($totalEstudiantes)
                    ->icon('heroicons.user'),
                ValueMetric::make('Cursos Registrados')
                    ->value($totalCursos)
                    ->icon('heroicons.users'),
            ])
        ];
	}
}
