<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Syntax Highlighting',
    'description' => 'Lightweight, robust, elegant syntax highlighting based on PrismJS',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
            'rte_ckeditor' => '10.4.0-11.5.99'
        ]
    ],
    'autoload' => [
        'psr-4' => [
            'BK2K\\Syntax\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Benjamin Kott',
    'author_email' => 'info@bk2k.info',
    'author_company' => 'private',
    'version' => '2.0.0',
];
