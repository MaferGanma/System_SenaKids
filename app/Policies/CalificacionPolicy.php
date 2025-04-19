<?php

namespace App\Policies;

use App\Models\Calificacion;
use App\Models\MoonshineUser;
use Illuminate\Auth\Access\Response;

class CalificacionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(MoonshineUser $moonshineUser): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(MoonshineUser $moonshineUser, Calificacion $calificacion): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(MoonshineUser $moonshineUser): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(MoonshineUser $moonshineUser, Calificacion $calificacion): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(MoonshineUser $moonshineUser, Calificacion $calificacion): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(MoonshineUser $moonshineUser, Calificacion $calificacion): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(MoonshineUser $moonshineUser, Calificacion $calificacion): bool
    {
        //
    }
}
