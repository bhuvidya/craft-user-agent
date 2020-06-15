<?php
/**
 * User Agent plugin for Craft CMS 3.x
 *
 * Support for user agent sniffing.
 *
 * @link      https://github.com/bhuvidya/craft-user-agent
 * @copyright Copyright (c) 2020 bhu Boue vidya
 */

namespace bhuvidya\useragent\variables;

use bhuvidya\useragent\UserAgent;

use Craft;

/**
 * User Agent Variable
 *
 * @author    bhu Boue vidya
 * @package   UserAgent
 * @since     1.0.0
 */
class UserAgentVariable
{
    /**
     * Get browser as a simple string (e.g. "chrome", "ie-edge", etc
     *
     * @return string
     */
    public function browser()
    {
        return UserAgent::$plugin->userAgent->getBrowser()['browser'];
    }

    /**
     * Get the User Agent string.
     *
     * @return string
     */
    public function ua()
    {
        return UserAgent::$plugin->userAgent->getUA();
    }
}
