<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die('Access denied.');

// Add content element
if (!isset($GLOBALS['TCA']['tt_content']['types']['syntax'])) {
    $GLOBALS['TCA']['tt_content']['types']['syntax'] = [];
}

// Add content element to selector list
ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:syntax/Resources/Private/Language/locallang_be.xlf:content_element.syntax.title',
        'syntax',
        'content-element-syntax',
        'syntax',
    ]
);

// Assign icon
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['syntax'] = 'content-element-syntax';

// Configure element type
$GLOBALS['TCA']['tt_content']['types']['syntax'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['syntax'],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                syntax_language,
                bodytext;LLL:EXT:syntax/Resources/Private/Language/locallang_be.xlf:field.bodytext,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        ',
    ]
);

// Register fields
$GLOBALS['TCA']['tt_content']['columns'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['columns'],
    [
        'syntax_language' => [
            'label' => 'LLL:EXT:syntax/Resources/Private/Language/locallang_be.xlf:field.syntax_language',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'Plain Text',
                        'value' => 'none',
                    ],
                    [
                        'label' => 'Apache Configuration',
                        'value' => 'apacheconf',
                    ],
                    [
                        'label' => 'C-like',
                        'value' => 'clike',
                    ],
                    [
                        'label' => 'CSS',
                        'value' => 'css',
                    ],
                    [
                        'label' => 'Git',
                        'value' => 'git',
                    ],
                    [
                        'label' => 'HTML',
                        'value' => 'html',
                    ],
                    [
                        'label' => 'JavaScript',
                        'value' => 'javascript',
                    ],
                    [
                        'label' => 'JSON',
                        'value' => 'json',
                    ],
                    [
                        'label' => 'Markup',
                        'value' => 'markup',
                    ],
                    [
                        'label' => 'Less',
                        'value' => 'less',
                    ],
                    [
                        'label' => 'Markdown',
                        'value' => 'markdown',
                    ],
                    [
                        'label' => 'MathML',
                        'value' => 'mathml',
                    ],
                    [
                        'label' => 'nginx',
                        'value' => 'nginx',
                    ],
                    [
                        'label' => 'PHP',
                        'value' => 'php',
                    ],
                    [
                        'label' => 'Sass',
                        'value' => 'sass',
                    ],
                    [
                        'label' => 'Scss',
                        'value' => 'scss',
                    ],
                    [
                        'label' => 'SVG',
                        'value' => 'svg',
                    ],
                    [
                        'label' => 'TypoScript',
                        'value' => 'typoscript',
                    ],
                    [
                        'label' => 'XML',
                        'value' => 'xml',
                    ],
                    [
                        'label' => 'YAML',
                        'value' => 'yaml',
                    ],
                ],
                'default' => 'none',
            ],
            'l10n_mode' => 'exclude',
        ],
    ]
);

// v12
if (ExtensionManagementUtility::isLoaded('t3editor')) {
    $GLOBALS['TCA']['tt_content']['types']['syntax']['columnsOverrides'] = [
        'bodytext' => [
            'config' => [
                'renderType' => 't3editor',
                'wrap' => 'off',
            ],
        ],
    ];
}

// v13 onwards
if ((new Typo3Version)->getMajorVersion() >= 13) {
    $GLOBALS['TCA']['tt_content']['types']['syntax']['columnsOverrides'] = [
        'bodytext' => [
            'config' => [
                'renderType' => 'codeEditor',
                'wrap' => 'off',
            ],
        ],
    ];
}
