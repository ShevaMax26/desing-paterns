<?php

namespace App\DesignPatterns;

class PatternFactory
{
    public static array $available = [
        'property-container' => \App\DesignPatterns\Fundamental\PropertyContainer\AboutPattern::class,
        'delegation-pattern' => \App\DesignPatterns\Fundamental\DelegationPattern\AboutPattern::class,
    ];

    /**
     * @throws \Exception
     */
    public function handle(string $url): AboutPattern
    {
        if (!array_key_exists($url, self::$available)) {
            throw new \Exception('Pattern description does not exist!');
        }
        return new self::$available[$url]();
    }

    public static function make(): PatternFactory
    {
        return new self();
    }
}
