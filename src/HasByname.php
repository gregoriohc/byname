<?php

namespace Gregoriohc\Byname;

use Gregoriohc\StaticCache\Cache;

trait HasByname
{
    /**
     * @return string
     */
    protected static function bynameSuffix() {
        return null;
    }

    /**
     * @return string
     */
    protected static function bynamePrefix() {
        return null;
    }

    /**
     * @return string
     */
    protected static function bynameValue() {
        return null;
    }

    /**
     * @return string
     */
    public static function byname()
    {
        return Cache::remember('byname.' . static::class . '.byname', function() {
            $bynamePrefix = static::bynamePrefix();
            $bynamePrefix = is_string($bynamePrefix) ? strlen($bynamePrefix) : ($bynamePrefix ?: 0);
            $bynameSuffix = static::bynameSuffix();
            $bynameSuffix = is_string($bynameSuffix) ? strlen($bynameSuffix) : ($bynameSuffix ?: 0);

            $name = static::bynameValue() ?: Utils::classBasename(static::class);

            if ($bynameSuffix) {
                $name = substr($name, $bynamePrefix ?: 0, -$bynameSuffix);
            } else {
                $name = substr($name, $bynamePrefix ?: 0);
            }

            return $name;
        });
    }

    /**
     * @param string $delimiter
     * @return string
     */
    public static function bynameSnake($delimiter = '_')
    {
        return Cache::remember('byname.' . static::class . '.bynameSnake', function() use ($delimiter) {
            return Utils::stringToSnake(static::byname(), $delimiter);
        });
    }

    /**
     * @return string
     */
    public static function bynameStudly()
    {
        return Cache::remember('byname.' . static::class . '.bynameStudly', function() {
            return Utils::stringToStudly(static::byname());
        });
    }

    /**
     * @return string
     */
    public static function bynameCamel()
    {
        return Cache::remember('byname.' . static::class . '.bynameCamel', function() {
            return Utils::stringToCamel(static::byname());
        });
    }
}
