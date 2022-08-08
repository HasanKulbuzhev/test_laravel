<?php

namespace App\Services;

use App\Models\CarModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductService
{
    public function productFilter(Builder $builder, Request $request, ?int $brandId = null, ?int $carModelId = null): Builder
    {
            $builder->whereRelation('model', static function(Builder $builder) use($carModelId, $brandId, $request) {
                /** @see CarModel::scopeWhereIsNotNull() */
                $builder->whereIsNotNull('car_models.drive_type', $request->get('drive_type'));
                $builder->whereIsNotNull('car_models.engine_type', $request->get('engine_type'));
                $builder->whereisNotNull('car_models.id', $carModelId);

                if ($brandId !== null) {
                    $builder->whereRelation('brand', static function (Builder $builder) use($brandId) {
                        $builder->where('brands.id', $brandId);
                    });
                }
            });

            return $builder;
    }
}
