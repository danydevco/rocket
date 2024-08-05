<?php


namespace Danydevco\Rocket\Models;

use Danydevco\Rocket\Http\Request\StoreParameterRequest;
use Danydevco\Rocket\Http\Request\UpdateParameterRequest;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int         $id
 * @property int         $value_id
 * @property int         $code
 * @property string      $name
 * @property string      $state
 * @property string      $description
 * @property string      $msg
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Parameter newModelQuery()
 * @method static Builder|Parameter newQuery()
 * @method static Builder|Parameter query()
 * @method static Builder|Parameter whereCreatedAt($value)
 * @method static Builder|Parameter whereDescription($value)
 * @method static Builder|Parameter whereMsg($value)
 * @method static Builder|Parameter whereId($value)
 * @method static Builder|Parameter whereName($value)
 * @method static Builder|Parameter whereState($value)
 * @method static Builder|Parameter whereUpdatedAt($value)
 * @method static Builder|Parameter whereValueId($value)
 * @method static Builder|Parameter whereCodeId($value)
 * @method static Builder|Parameter states()
 * @method static Builder|Parameter typeDni()
 * @mixin Eloquent
 */
class Parameter extends Model {

    public static function store(StoreParameterRequest $request, Value $value): void {
        $parameter              = new Parameter();
        $parameter->value_id    = $value->id;
        $parameter->code        = $request->get('code');
        $parameter->name        = $request->get('name');
        $parameter->description = $request->get('description');
        $parameter->msg         = $request->get('msg');
        $parameter->state       = 1;
        $parameter->save();
    }

    public static function modified(UpdateParameterRequest $request, Value $value, Parameter $parameter): void {
        $parameter->code        = $request->get('code');
        $parameter->name        = $request->get('name');
        $parameter->description = $request->get('description');
        $parameter->msg         = $request->get('msg');
        $parameter->state       = $request->get('state');
        $parameter->update();
    }

    public function scopeSearch($query, $search) {
        return $query->where('name', 'like', '%' . $search . '%');
    }

    public function scopeSearchAndOrderBy($query, $search) {
        return $query->search($search)
            ->orderBy('id', 'desc')
            ->select(['id', 'value_id', 'name', 'description', 'msg', 'state'])
            ->get();
    }

}