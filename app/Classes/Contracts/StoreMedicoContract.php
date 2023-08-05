<?php

declare(strict_types=1);

namespace App\Classes\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface StoreMedicoContract
{
    public function create(array $data): JsonResource;
}
