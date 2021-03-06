<?php
namespace Aoe\FeloginBruteforceProtection\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2019 AOE GmbH <dev@aoe.com>
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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * @package Aoe\FeloginBruteforceProtection\\Domain\Model
 *
 * @author Kevin Schu <kevin.schu@aoe.com>
 * @author Andre Wuttig <wuttig@portrino.de>
 *
 */
class Entry extends AbstractEntity
{
    /**
     * @var string
     */
    protected $tstamp;

    /**
     * @var string
     */
    protected $crdate;

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $identifier;

    /**
     * @var integer
     * @validate NotEmpty
     */
    protected $failures;

    /**
     * @param string $crdate
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }

    /**
     * @return string
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @param string $tstamp
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return string
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * @return string $identifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     * @return void
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return integer $failures
     */
    public function getFailures()
    {
        return $this->failures;
    }

    /**
     * @param integer $failures
     * @return void
     */
    public function setFailures($failures)
    {
        $this->failures = $failures;
    }

    /**
     * @return void
     */
    public function increaseFailures()
    {
        $this->setFailures($this->getFailures() + 1);
    }
}
