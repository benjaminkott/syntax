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

defined('TYPO3') or die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][CodeEditorFormatDataProvider::class] = [
    'depends' => [
        TcaColumnsOverrides::class,
        EvaluateDisplayConditions::class,
    ],
];
