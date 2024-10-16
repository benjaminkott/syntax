<?php

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace BK2K\Syntax\EventListener;

use TYPO3\CMS\RteCKEditor\Form\Element\Event\BeforePrepareConfigurationForEditorEvent;

class RteConfigEnhancer
{
    public function beforePrepareConfiguration(BeforePrepareConfigurationForEditorEvent $event): void
    {
        $configuration = $event->getConfiguration();
        $configuration['toolbar']['items'][] = 'codeBlock';
        $configuration['importModules'][] = [
            'module' => '@ckeditor/ckeditor5-code-block',
            'exports' => [
                'CodeBlock',
            ],
        ];

        $configuration['codeBlock'] = [
            'languages' => [
                [
                    'label' => 'Plain Text',
                    'language' => 'plaintext',
                    'class' => '',
                ],
                [
                    'label' => 'Apache Configuration',
                    'language' => 'apacheconf',
                    'class' => 'language-apacheconf',
                ],
                [
                    'label' => 'C-like',
                    'language' => 'clike',
                    'class' => 'language-clike',
                ],
                [
                    'label' => 'CSS',
                    'language' => 'css',
                    'class' => 'language-css',
                ],
                [
                    'label' => 'Git',
                    'language' => 'git',
                    'class' => 'language-git',
                ],
                [
                    'label' => 'HTML',
                    'language' => 'html',
                    'class' => 'language-html',
                ],
                [
                    'label' => 'JavaScript',
                    'language' => 'javascript',
                    'class' => 'language-javascript',
                ],
                [
                    'label' => 'JSON',
                    'language' => 'json',
                    'class' => 'language-json',
                ],
                [
                    'label' => 'Markup',
                    'language' => 'markup',
                    'class' => 'language-markup',
                ],
                [
                    'label' => 'Less',
                    'language' => 'less',
                    'class' => 'language-less',
                ],
                [
                    'label' => 'Markdown',
                    'language' => 'markdown',
                    'class' => 'language-markdown',
                ],
                [
                    'label' => 'MathML',
                    'language' => 'mathml',
                    'class' => 'language-mathml',
                ],
                [
                    'label' => 'nginx',
                    'language' => 'nginx',
                    'class' => 'language-nginx',
                ],
                [
                    'label' => 'PHP',
                    'language' => 'php',
                    'class' => 'language-php',
                ],
                [
                    'label' => 'Sass',
                    'language' => 'sass',
                    'class' => 'language-sass',
                ],
                [
                    'label' => 'Scss',
                    'language' => 'scss',
                    'class' => 'language-scss',
                ],
                [
                    'label' => 'SVG',
                    'language' => 'svg',
                    'class' => 'language-svg',
                ],
                [
                    'label' => 'TypoScript',
                    'language' => 'typoscript',
                    'class' => 'language-typoscript',
                ],
                [
                    'label' => 'XML',
                    'language' => 'xml',
                    'class' => 'language-xml',
                ],
                [
                    'label' => 'YAML',
                    'language' => 'yaml',
                    'class' => 'language-yaml',
                ],
            ],
        ];

        $event->setConfiguration($configuration);
    }
}
