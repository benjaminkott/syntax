<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use BK2K\Syntax\Form\DataProvider\CodeEditorFormatDataProvider;
use TYPO3\CMS\Backend\Form\FormDataProvider\EvaluateDisplayConditions;
use TYPO3\CMS\Backend\Form\FormDataProvider\TcaColumnsOverrides;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die('Access denied.');

// PageTS
ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:syntax/Configuration/TsConfig/Page/All.tsconfig">'
);

// Register Icon
$iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
$iconRegistry->registerIcon(
    'content-element-syntax',
    SvgIconProvider::class,
    ['source' => 'EXT:syntax/Resources/Public/Icons/ContentElements/content-element-syntax.svg']
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][CodeEditorFormatDataProvider::class] = [
    'depends' => [
        TcaColumnsOverrides::class,
        EvaluateDisplayConditions::class,
    ],
];
