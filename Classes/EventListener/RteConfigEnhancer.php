<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace BK2K\Syntax\EventListener;

use TYPO3\CMS\RteCKEditor\Form\Element\Event\AfterPrepareConfigurationForEditor;
use TYPO3\CMS\RteCKEditor\Form\Element\Event\BeforePrepareConfigurationForEditor;

class RteConfigEnhancer
{
    public function afterPrepareConfiguration(AfterPrepareConfigurationForEditor $event): void
    {
        $configuraton = $event->getConfiguration();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($configuraton, 'after');
    }

    public function beforePrepareConfiguration(BeforePrepareConfigurationForEditor $event): void
    {
        $configuraton = $event->getConfiguration();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($configuraton, 'before');
    }
}
