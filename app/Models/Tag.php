<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $intitule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Oeuvre[] $oeuvres
 * @property-read int|null $oeuvres_count
 * @method static \Database\Factories\TagFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereIntitule($value)
 * @mixin \Eloquent
 */
class Tag extends Model {
    use HasFactory;

    public $timestamps = false;

    public function oeuvres() {
        return $this->belongsToMany(Oeuvre::class);
    }
}
