<?php
namespace Skeleton;

if (! function_exists('Skeleton\env'))
{
    function env($variableName, $defaultValue = null): string 
    {
        return getenv($variableName) ?: $defaultValue;
    }
}

if (! function_exists('Skeleton\debug'))
{
    function debug(): bool
    {
        $env = env('APP_DEBUG', false);

        return false !== $env;
    }
}