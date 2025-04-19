<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use App\Models\Paralelo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;


class ParaleloResource extends ModelResource
{
    protected string $model = Paralelo::class;

    protected string $title = 'Colegio/Paralelo';

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailModal = false;

    protected bool $withPolicy = false;

    //Definiir el orden de la tabla
    protected string $sortColumn = 'id';
    protected string $sortDirection = 'ASC';
    protected int $itemsPerPage = 5;

    //Funcion de acciones permitidas
    public function getActiveActions(): array{
        return ['create', 'view', 'update', 'delete', 'massDelete'];
    }

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
                Text::make('Nombre paralelo', 'nombre')->sortable(),

                // Usamos Select para relacionar con el modelo Curso
                Select::make('Curso', 'curso_id')
                ->options(\App\Models\Curso::pluck('nombre', 'id')->toArray()) // Convertimos la colección a un array
                ->searchable()
                ->required()->sortable(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
