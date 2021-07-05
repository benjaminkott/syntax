<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die('Access denied.');

// Add content element group to selector list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup(
    'tt_content',
    'CType',
    'syntax',
    'LLL:EXT:syntax/Resources/Private/Language/locallang_be.xlf:extension.title',
    'after:default'
);
