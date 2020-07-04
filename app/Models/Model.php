<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * @param $field
     * @param $value
     */
    public static function findBy($field, $value)
    {
        return self::where($field, $value)->first();
    }
}
