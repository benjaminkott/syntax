<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace BK2K\Syntax\EventListener;

use TYPO3\CMS\RteCKEditor\Form\Element\Event\AfterGetExternalPlugins;
use TYPO3\CMS\RteCKEditor\Form\Element\Event\AfterPrepareConfigurationForEditor;
use TYPO3\CMS\RteCKEditor\Form\Element\Event\BeforeGetExternalPlugins;
use TYPO3\CMS\RteCKEditor\Form\Element\Event\BeforePrepareConfigurationForEditor;

class RteConfigEnhancer
{
    public function beforeGetExternalPlugins(BeforeGetExternalPlugins $event): void
    {
        $configuration = $event->getConfiguration();
        $configuration['syntax_code'] = [
            'resource' => 'EXT:syntax/Resources/Public/CKEditor/Plugins/Code/plugin.js'
        ];
        $event->setConfiguration($configuration);
    }

    public function beforePrepareConfiguration(BeforePrepareConfigurationForEditor $event): void
    {
        $configuration = $event->getConfiguration();
        $configuration['extraPlugins'][] = 'syntax_code';
        $event->setConfiguration($configuration);
    }
}
