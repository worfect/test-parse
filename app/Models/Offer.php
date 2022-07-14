<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use SimpleXMLElement;

/**
 * App\Models\Offer.
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $order_id
 * @property string|null $mark
 * @property string|null $model
 * @property string|null $generation
 * @property string|null $year
 * @property int|null $run
 * @property string|null $color
 * @property string|null $body_type
 * @property string|null $engine_type
 * @property string|null $transmission
 * @property string|null $gear_type
 * @property int|null $generation_id
 * @mixin \Eloquent
 */
final class Offer extends Model
{
    protected $fillable = [
        'order_id',
        'mark',
        'model',
        'generation',
        'year',
        'run',
        'color',
        'body_type',
        'engine_type',
        'transmission',
        'gear_type',
        'generation_id',
    ];

    public function addOffer(SimpleXMLElement $data): void
    {
        $this->create([
            'order_id' => $data->id,
            'mark' => empty($data->mark) ? null : $data->mark,
            'model' => empty($data->model) ? null : $data->model,
            'generation' => empty($data->generation) ? null : $data->generation,
            'year' => empty($data->year) ? null : $data->year,
            'run' => empty($data->run) ? null : $data->run,
            'color' => empty($data->color) ? null : $data->color,
            'body_type' => empty($data->{'body-type'}) ? null : $data->{'body-type'},
            'engine_type' => empty($data->{'engine-type'}) ? null : $data->{'engine-type'},
            'transmission' => empty($data->transmission) ? null : $data->transmission,
            'gear_type' => empty($data->{'gear-type'}) ? null : $data->{'gear-type'},
            'generation_id' => empty($data->generation_id) ? null : $data->generation_id,
        ]);
    }

    public function updateOffer(SimpleXMLElement $data): void
    {
        $this->where('order_id', $data->id)
            ->update([
                'order_id' => $data->id,
                'mark' => empty($data->mark) ? null : $data->mark,
                'model' => empty($data->model) ? null : $data->model,
                'generation' => empty($data->generation) ? null : $data->generation,
                'year' => empty($data->year) ? null : $data->year,
                'run' => empty($data->run) ? null : $data->run,
                'color' => empty($data->color) ? null : $data->color,
                'body_type' => empty($data->{'body-type'}) ? null : $data->{'body-type'},
                'engine_type' => empty($data->{'engine-type'}) ? null : $data->{'engine-type'},
                'transmission' => empty($data->transmission) ? null : $data->transmission,
                'gear_type' => empty($data->{'gear-type'}) ? null : $data->{'gear-type'},
                'generation_id' => empty($data->generation_id) ? null : $data->generation_id,
            ]);
    }
}
