<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Commentaire
 *
 * @property int $id
 * @property string $titre
 * @property string $contenu
 * @property int $user_id
 * @property int $oeuvre_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Oeuvre $salle
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CommentaireFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereContenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereOeuvreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commentaire whereUserId($value)
 * @mixin \Eloquent
 */
class Commentaire extends Model {
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function oeuvre() {
        return $this->belongsTo(Oeuvre::class);
    }
}
