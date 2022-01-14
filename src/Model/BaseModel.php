<?php

namespace OxidSolutionCatalysts\PayPal\Api\Model;

use Error;

trait BaseModel
{
    public function jsonSerialize()
    {
        return (object) array_filter((array) $this, static function ($var) {
            return isset($var);
        });
    }

    public function __set($name, $value)
    {
        throw new Error("Cant set $name on " . static::class);
    }
}
