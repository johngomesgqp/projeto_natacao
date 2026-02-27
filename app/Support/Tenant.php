<?php

namespace App\Support;

use App\Models\Projeto;

class Tenant
{
    protected static ?Projeto $projeto = null;

    public static function set(Projeto $projeto): void
    {
        self::$projeto = $projeto;
    }

    public static function get(): ?Projeto
    {
        return self::$projeto;
    }

    public static function id(): ?int
    {
        return self::$projeto?->id;
    }
}