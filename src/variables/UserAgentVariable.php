<?php
/**
 * User Agent plugin for Craft CMS 3.x
 *
 * Support for user agent sniffing.
 *
 * @link      https://github.com/bhuvidya
 * @copyright Copyright (c) 2020 bhu Boue vidya
 */

namespace bhuvidya\useragent\variables;

use bhuvidya\useragent\UserAgent;

use Craft;

/**
 * User Agent Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.userAgent }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    bhu Boue vidya
 * @package   UserAgent
 * @since     1.0.0
 */
class UserAgentVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.userAgent.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.userAgent.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */

    public function browser()
    {
        return UserAgent::$plugin->userAgent->getBrowser()['browser'];
    }

    public function ua()
    {
        return UserAgent::$plugin->userAgent->getUA();
    }
}
