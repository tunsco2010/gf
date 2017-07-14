<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vacine
 *
 * @package App
 * @property string $name
 * @property string $category
 * @property enum $interval
 * @property string $description
 * @property string $last_vacine_date
 * @property string $next_vacine_date
*/
class Vacine extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'interval', 'description', 'last_vacine_date', 'next_vacine_date', 'category_id'];
    

    public static $enum_interval = ["one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five", "six" => "Six", "seven" => "Seven", "eight" => "Eight", "nine" => "Nine", "ten" => "Ten", "eleven" => "Eleven", "twelve" => "Twelve"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCategoryIdAttribute($input)
    {
        $this->attributes['category_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setLastVacineDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['last_vacine_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['last_vacine_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getLastVacineDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setNextVacineDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['next_vacine_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['next_vacine_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getNextVacineDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
    public function category()
    {
        return $this->belongsTo(Vacinecategory::class, 'category_id')->withTrashed();
    }
    
}
