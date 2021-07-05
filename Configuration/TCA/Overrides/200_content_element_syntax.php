<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') or die('Access denied.');

// Add content element
if (!is_array($GLOBALS['TCA']['tt_content']['types']['syntax'])) {
    $GLOBALS['TCA']['tt_content']['types']['syntax'] = [];
}

// Add content element to selector list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:syntax/Resources/Private/Language/locallang_be.xlf:content_element.syntax.title',
        'syntax',
        'content-element-syntax',
        'syntax'
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
        '
    ]
);

// Register fields
$GLOBALS['TCA']['tt_content']['columns'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['columns'],
    [
        'syntax_language' => [
            'label' => 'LLL:EXT:syntax/Resources/Private/Language/locallang_be.xlf:field.syntax_language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'None',
                        'none'
                    ],
                    ['Apache Configuration', 'apacheconf'],
                    ['C-like', 'clike'],
                    ['CSS', 'css'],
                    ['Git', 'git'],
                    ['HTML', 'html'],
                    ['JavaScript', 'javascript'],
                    ['JSON', 'json'],
                    ['Markup ', 'markup'],
                    ['Less', 'less'],
                    ['Markdown', 'markdown'],
                    ['MathML', 'mathml'],
                    ['nginx', 'nginx'],
                    ['PHP', 'php'],
                    ['Sass', 'sass'],
                    ['Scss', 'scss'],
                    ['SVG', 'svg'],
                    ['TypoScript', 'typoscript'],
                    ['XML', 'xml'],
                    ['YAML', 'yaml'],
                ],
                'default' => 'none',
            ],
            'l10n_mode' => 'exclude'
        ]
    ]
);

// Activate t3editor if extension is activated
if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('t3editor')) {
    $GLOBALS['TCA']['tt_content']['types']['syntax']['columnsOverrides'] = [
        'bodytext' => [
            'config' => [
                'renderType' => 't3editor',
                'wrap' => 'off'
            ]
        ]
    ];
}
