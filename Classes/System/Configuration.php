<?php
namespace Aoe\FeloginBruteforceProtection\System;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Kevin Schu <kevin.schu@aoe.com>, AOE GmbH
 *  (c) 2014 André Wuttig <wuttig@portrino.de>, portrino GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use JsonSchema\Exception\InvalidArgumentException;

/**
 * Class Configuration
 *
 * @package Aoe\FeloginBruteforceProtection\\System
 */
class Configuration
{
    /**
     * @var string
     */
    const CONF_MAX_FAILURES = 'max_failures';

    /**
     * @var string
     */
    const CONF_DISABLED = 'disabled';

    /**
     * @var string
     */
    const CONF_RESTRICTION_TIME = 'restriction_time';

    /**
     * @var string
     */
    const CONF_SECONDS_TILL_RESET = 'seconds_till_reset';

    /**
     * @var string
     */
    const LOGGING_ENABLED = 'logging_enabled';

    /**
     * @var string
     */
    const LOGGING_LEVEL = 'logging_level';

    /**
     * @var array
     */
    private $configuration = array();

    /**
     * Initialize configuration array
     */
    public function __construct()
    {
        $conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['felogin_bruteforce_protection']);
        if (is_array($conf)) {
            $this->configuration = $conf;
        }
    }

    /**
     * Tells if the protection is enabled.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        if ('1' === $this->get(self::CONF_DISABLED)) {
            return false;
        }
        return true;
    }

    /**
     * Returns the maximum number of allowed failures for an ip.
     *
     * @return integer
     */
    public function getMaximumNumberOfFailures()
    {
        return (integer)$this->get(self::CONF_MAX_FAILURES);
    }

    /**
     * Returns the number of seconds of the restriction time.
     *
     * @return integer
     */
    public function getRestrictionTime()
    {
        return (integer)$this->get(self::CONF_RESTRICTION_TIME);
    }

    /**
     * Returns the number of seconds after an entry is resetted.
     *
     * @return integer
     */
    public function getResetTime()
    {
        return (integer)$this->get(self::CONF_SECONDS_TILL_RESET);
    }

    /**
     * @return boolean
     */
    public function isLoggingEnabled()
    {
        return (boolean)$this->get(self::LOGGING_ENABLED) == 1;
    }

    /**
     * @return int
     */
    public function getLogLevel()
    {
        return (integer)$this->get(self::LOGGING_LEVEL);
    }

    /**
     * @param string $key
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function get($key)
    {
        if (array_key_exists($key, $this->configuration)) {
            return $this->configuration[$key];
        }
        throw new \InvalidArgumentException('Configuration key "' . $key . '" does not exist.');
    }
}
