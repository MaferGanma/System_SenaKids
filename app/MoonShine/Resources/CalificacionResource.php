<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Calificacion;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;

/**
 * @extends ModelResource<Calificacion>
 */
class CalificacionResource extends ModelResource
{
    protected string $model = Calificacion::class;

    protected string $title = 'Calificacions';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Select::make('Estudiantes','estudiante_id')
                ->options(
                    \App\Models\Estudiante::all()->mapWithKeys(fn($e) => [$e->id => $e->nombre . ' ' . $e->apellido])->toArray()
                )
                ->searchable()
                ->required(),
                // Number::make('juego id','juego_id'),
                Select::make('Actividad','juego_id')
                ->options(
                    \App\Models\Actividad::pluck('tema_juego', 'id')->toArray()
                )
                ->searchable()
                ->required(),

                Select::make('Actividad','juego_id')
                ->options(
                    \App\Models\Actividad::pluck('nombre_juego', 'id')->toArray()
                )
                ->searchable()
                ->required(),
                Number::make('Puntaje','puntaje'),
                Number::make('Intentos','intentos'),
            ]),
        ];
    }

    /**
     * @param Calificacion $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
