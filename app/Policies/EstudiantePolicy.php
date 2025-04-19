<?php

namespace App\Policies;

use App\Models\Estudiante;
use MoonShine\Models\MoonshineUser; // Cambiado para usar el modelo de MoonShine
use Illuminate\Auth\Access\Response;

class EstudiantePolicy
{
    public function viewAny(MoonshineUser $moonshineUser): bool
    {
        // En MoonShine, los roles se manejan diferente, no con una propiedad 'role'
        // sino con la relación moonshineUserRole
        return $moonshineUser->moonshineUserRole->name === 'Admin';
    }

    public function view(MoonshineUser $moonshineUser, Estudiante $estudiante): bool
    {
        return $moonshineUser->moonshineUserRole->name === 'Admin';
    }

    public function create(MoonshineUser $moonshineUser): bool
    {
        return $moonshineUser->moonshineUserRole->name === 'Admin';
    }

    public function update(MoonshineUser $moonshineUser, Estudiante $estudiante): bool
    {
        return $moonshineUser->moonshineUserRole->name === 'Admin';
    }

    public function delete(MoonshineUser $moonshineUser, Estudiante $estudiante): bool
    {
        return $moonshineUser->moonshineUserRole->name === 'Admin';
    }

    public function restore(MoonshineUser $moonshineUser, Estudiante $estudiante): bool
    {
        return $moonshineUser->moonshineUserRole->name === 'Admin';
    }

    public function forceDelete(MoonshineUser $moonshineUser, Estudiante $estudiante): bool
    {
        return $moonshineUser->moonshineUserRole->name === 'Admin';
    }
}
