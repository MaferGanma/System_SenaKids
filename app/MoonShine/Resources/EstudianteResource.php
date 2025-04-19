<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Estudiante;
use App\Models\Paralelo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use MoonShine\Models\MoonshineUser;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;

class EstudianteResource extends ModelResource
{
    protected string $model = Estudiante::class;
    protected string $title = 'Estudiantes';

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailModal = false;
    protected bool $withPolicy = false;

    public function redirectAfterSave(): string
    {
        $referer = Request::header('referer');
        return $referer ?: '/';
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nombre', 'nombre')->required(),
                Text::make('Apellido', 'apellido')->required(),
                Text::make('Carnet', 'carnet')->required(),
                Text::make('Género', 'genero'),
                Text::make('Edad', 'edad'),
                Select::make('Paralelo', 'paralelo_id')
                    ->options(Paralelo::pluck('nombre', 'id')->toArray())
                    ->searchable()
                    ->required(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function afterSave(Model $item): void
    {
        dd('Se ejecutó afterSave');
    }

    // protected function afterSave(Model $item): void
    // {
    //     Log::info("afterSave ejecutado para estudiante: {$item->nombre}");

    //     try {
    //         $email = strtolower($item->nombre . '.' . $item->apellido . '@gmail.com');

    //         if (!MoonshineUser::where('email', $email)->exists()) {
    //             MoonshineUser::create([
    //                 'moonshine_user_role_id' => 2,
    //                 'name' => $item->nombre . ' ' . $item->apellido,
    //                 'email' => $email,
    //                 'password' => Hash::make($item->carnet),
    //             ]);

    //             Log::info("✅ Usuario creado para: $email");
    //         } else {
    //             Log::info("⚠️ Ya existe usuario con email: $email");
    //         }
    //     } catch (\Exception $e) {
    //         Log::error("❌ Error al crear usuario: " . $e->getMessage());
    //         Log::error("❌ Trace: " . $e->getTraceAsString());
    //     }
    // }
}
