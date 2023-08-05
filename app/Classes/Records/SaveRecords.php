<?php

declare(strict_types=1);

namespace App\Classes\Records;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

abstract class SaveRecords
{
    /**
     * @return \Illuminate\Database\Eloquent\Model;
     */
    public function handler(Model $model)
    {
        try {
            if ($model->save()) {
                return $model;
            }

        } catch (QueryException $exception) {
            return response()->json($exception);
        }
    }
}
