<?php

declare(strict_types=1);

namespace App\Classes\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

interface ListCidadeContract
{
    public function index(): JsonResource;
}
