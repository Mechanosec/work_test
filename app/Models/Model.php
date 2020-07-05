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
     * @return Model
     */
    public static function findBy($field, $value)
    {
        return self::where($field, $value)->first();
    }

    /**
     * Поиск  модели по произвольному полю или вернуть новый экземпляр, если не найден
     * @param $field
     * @param $value
     * @return Model
     */
    public static function findByOrNew($field, $value)
    {
        return static::findBy($field, $value) ?: new static;
    }
}
