<?php

declare(strict_types=1);

/*
 * This file is part of the package bk2k/syntax.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace BK2K\Syntax\Form\DataProvider;

use TYPO3\CMS\Backend\Form\FormDataProviderInterface;

class CodeEditorFormatDataProvider implements FormDataProviderInterface
{
    public function addData(array $result): array
    {
        if ($result['tableName'] !== 'tt_content' || $result['recordTypeValue'] !== 'syntax') {
            return $result;
        }

        // @todo refactor when core provides api to retrieve registered packages or gracefully fallbacks
        $syntaxLanguage = $result['databaseRow']['syntax_language'][0] ?? '';
        if (in_array($syntaxLanguage, ['css', 'html', 'javascript', 'json', 'php', 'sql', 'typoscript', 'xml'])) {
            $result['processedTca']['columns']['bodytext']['config']['format'] = $syntaxLanguage;
        }

        return $result;
    }
}
