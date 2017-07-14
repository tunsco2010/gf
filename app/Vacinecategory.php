<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vacinecategory
 *
 * @package App
 * @property string $name
*/
class Vacinecategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    
    
    public function vacine() {
        return $this->hasMany(Vacine::class, 'category_id');
    }
}
