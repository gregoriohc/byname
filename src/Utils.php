<?php

namespace Gregoriohc\Byname;

class Utils
{
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param string|object $class
     * @return string
     */
    public static function classBasename($class)
    {
        if (function_exists('class_basename')) {
            return class_basename($class);
        }

        return basename(str_replace('\\', '/', (is_object($class) ? get_class($class) : $class)));
    }

    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    public static function stringToSnake($value, $delimiter = '_')
    {
        if (function_exists('snake_case')) {
            return snake_case($value, $delimiter);
        }

        if (! ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = mb_strtolower(preg_replace('/(.)(?=[A-Z])/u', '$1'.$delimiter, $value), 'UTF-8');
        }

        return $value;
    }

    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    public static function stringToStudly($value)
    {
        if (function_exists('studly_case')) {
            return studly_case($value);
        }

        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)));
    }

    /**
     * Convert a value to camel case.
     *
     * @param  string  $value
     * @return string
     */
    public static function stringToCamel($value)
    {
        if (function_exists('camel_case')) {
            return camel_case($value);
        }

        return lcfirst(static::stringToStudly($value));
    }
}
