<?php

/**
 * Returns the address of project root directory
 *
 * @param bool $slash
 * @return string
 */
function getProjectRoot($slash = false)
{
    return dirname(__FILE__, 3) . ($slash ? '/' : '');
}

/**
 * Returns the address of public directory
 *
 * @param bool $slash
 * @return string
 */
function getPublicRoot($slash = false)
{
    return getProjectRoot(true) . 'wwwroot' . ($slash ? '/' : '');
}

/**
 * Returns the address of app directory
 *
 * @param bool $slash
 * @return string
 */
function getAppRoot($slash = false)
{
    return getProjectRoot(true) . 'app' . ($slash ? '/' : '');
}

/**
 * Redirects to the passed location by setting the header
 *
 * @param string $location
 */
function redirectTo($location)
{
    if( $location != null ) {
        header("Location: {$location}");
        exit;
    }
    return;
}

/**
 * Check whether the passed file is included
 *
 * @param string $filename
 * @return bool
 */
function isIncluded($filename)
{
    $f = get_included_files();
    if (in_array($filename, $f))
        return true;
    else
        return false;
}

/**
 * Escapes single quotes in the passed string
 *
 * @param string $str
 * @return mixed
 */
function escapeSingleQuotes($str)
{
    return str_replace("'", "\\'", $str);
}

/**
 * Performs a cast
 *
 * @param $destination
 * @param \stdClass $source
 * @return mixed
 */
function cast($destination, \stdClass $source)
{
    $sourceReflection = new \ReflectionObject($source);
    $sourceProperties = $sourceReflection->getProperties();
    foreach ($sourceProperties as $sourceProperty) {
        $name = $sourceProperty->getName();
        $destination->{$name} = $source->$name;
    }
    return $destination;
}

/**
 * Checks whether the current request is using HTTP GET verb
 *
 * @return bool
 */
function isGet() : bool
{
    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        return true;
    }
    return false;
}

/**
 * Checks whether the current request is using HTTP POST verb
 *
 * @return bool
 */
function isPost() : bool
{
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        return true;
    }
    return false;
}

/**
 * Checks whether the current request is secured by HTTPS
 *
 * @return bool
 */
function isSsl() : bool
{
    if ( isset($_SERVER['HTTPS']) ) {
        if ( 'on' == strtolower($_SERVER['HTTPS']) )
            return true;
        if ( '1' == $_SERVER['HTTPS'] )
            return true;
    } elseif ( isset($_SERVER['SERVER_PORT']) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
        return true;
    }
    return false;
}