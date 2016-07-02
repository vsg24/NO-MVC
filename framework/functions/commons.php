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
 * Generates a hashed string for the passed password using PHP's internal password_hash()
 *
 * @param string $password
 * @return bool|string
 */
function passwordHash($password)
{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    return $hash;
}

/**
 * Checks whether the provided password matches the provided hash string
 *
 * @param string $password
 * @param string $hash
 * @return bool
 */
function passwordVerify($password, $hash)
{
    $stat = password_verify($password, $hash);
    return $stat ? true : false;
}

/**
 * Checks whether the first passed hash string is equal to the second passed hash string
 *
 * @param string $hashed_input
 * @param string $hashed_password
 * @return bool
 */
function hashedPasswordVerify($hashed_input, $hashed_password)
{
    if($hashed_input === $hashed_password)
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