<?php
/**
 * User Agent plugin for Craft CMS 3.x
 *
 * Support for user agent sniffing.
 *
 * @link      https://github.com/bhuvidya
 * @copyright Copyright (c) 2020 bhu Boue vidya
 */

namespace bhuvidya\useragent\services;

use bhuvidya\useragent\UserAgent;

use Craft;
use craft\base\Component;

/**
 * UserAgent Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    bhu Boue vidya
 * @package   UserAgent
 * @since     1.0.0
 */
class UserAgentService extends Component
{
    // Public Methods
    // =========================================================================

    public function getUA()
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    }

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     UserAgent::$plugin->userAgent->exampleService()
     *
     * @return mixed
     */
    public function getBrowser()
    {
        $ua = $this->getUA();

        $ret = [
            'browser' => 'unknown',
            'version' => 'unknown',
        ];

        if (preg_match('/msie ([0-9\.]+)/i', $ua, $matches)) {
            // IE up to version 10
            $ret['browser'] = 'ie';
            $ret['version'] = static::parseVersion($matches[1]);
        } elseif (preg_match('/trident.*rv[ :]([0-9\.]+)/i', $ua, $matches)) {
            // IE from version 11 onwards
            $ret['browser'] = 'ie';
            $ret['version'] = static::parseVersion($matches[1]);
        } elseif (preg_match('/firefox\/([0-9\.]+)/i', $ua, $matches)) {
            $ret['browser'] = 'firefox';
            $ret['version'] = static::parseVersion($matches[1]);
        } elseif (preg_match('/chrome\/([0-9\.]+)/i', $ua, $matches)) {
            $ret['browser'] = 'chrome';
            $ret['version'] = static::parseVersion($matches[1]);
        } elseif (preg_match('/safari\/[0-9\.]+/i', $ua)) {
            if (preg_match('/version\/([0-9\.]+)/', $ua, $matches)) {
                $ret['browser'] = 'safari';
                $ret['version'] = static::parseVersion($matches[1]);
            }
        } elseif (preg_match('/opera\/[0-9\.]+/', $ua)) {
            if (preg_match('/version\/([0-9\.]+)/', $ua, $matches)) {
                $ret['browser'] = 'opera';
                $ret['version'] = static::parseVersion($matches[1]);
            }
        }

        return $ret;
    }
}
