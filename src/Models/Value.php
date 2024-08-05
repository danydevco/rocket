<?php

namespace Danydevco\Rocket\Models;


use Danydevco\Rocket\Http\Request\StoreValueRequest;
use Danydevco\Rocket\Http\Request\UpdateValueRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;


/**
 * App\Value
 *
 * @property int         $id
 * @property string      $name
 * @property string      $state
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Value newModelQuery()
 * @method static Builder|Value newQuery()
 * @method static Builder|Value query()
 * @method static Builder|Value whereCreatedAt($value)
 * @method static Builder|Value whereId($value)
 * @method static Builder|Value whereName($value)
 * @method static Builder|Value whereState($value)
 * @method static Builder|Value whereDescription($value)
 * @method static Builder|Value whereUpdatedAt($value)
 * @method static Builder|Value search($searchTerm)
 * @method static Builder|Value state($state)
 */
class Value extends Model {

    protected $fillable = ['name', 'description'];

    /**
     * Relation One To Much
     *
     * @return HasMany
     */
    public function parameters(): HasMany {
        return $this->hasMany(Parameter::class)->orderBy('id', 'desc');
    }


    /**
     * @param $query
     * @param $search
     *
     * @return mixed
     */
    public function scopeSearch($query, $search): mixed {
        return $query
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc');
    }

    public static function store(StoreValueRequest $request): void {
        $value              = new Value();
        $value->name        = $request->get('name');
        $value->description = $request->get('description');
        $value->save();
    }

    public static function modified(UpdateValueRequest $request, Value $value): void {
        $value->name        = $request->get('name');
        $value->description = $request->get('description');
        $value->save();
    }


}
