<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use App\Models\Curso;
use App\Models\Colegio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;


class CursoResource extends ModelResource
{
    protected string $model = Curso::class;

    protected string $title = 'Colegio/Curso';

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailModal = false;

    protected bool $withPolicy = false;

    public function redirectAfterSave(): string
    {
        $referer = Request::header('referer');
        return $referer ?: '/';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        //FUNCION PARA INSERTAR CON MODAL
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nombre curso', 'nombre'),

                // Usamos Select para relacionar con el modelo Curso
                Select::make('Colegio', 'colegio_id')
                ->options(\App\Models\Colegio::pluck('nombre', 'id')->toArray()) // Convertimos la colección a un array
                ->searchable()
                ->required(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
