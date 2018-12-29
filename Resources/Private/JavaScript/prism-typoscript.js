Prism.languages.typoscript = {

    // Comments
    'comment': [
        {
            pattern: /(^|[^\\])\/\*[\s\S]*?(?:\*\/|$)/,
            lookbehind: true
        },
        {
            pattern: /(^|[^\\:])\/\/.*/,
            lookbehind: true,
            greedy: true
        },
        {
            pattern: /(^|[^\\])#.*/,
            lookbehind: true,
        }
    ],

    // Tags
    'typoscript-include': {
        pattern: /<INCLUDE_TYPOSCRIPT:?(?!\d)[^\s>\/=$<%]+(?:\s+[^\s>\/=]+(?:=(?:("|')(?:\\[\s\S]|(?!\1)[^\\])*\1|[^\s'">=]+))?)*\s*\/?>/,
        alias: 'tag',
        inside: {
            'attr-value': {
                pattern: /=(?:("|')(?:\\[\s\S]|(?!\1)[^\\])*\1|[^\s'">=]+)/i,
                inside: {
                    'punctuation': [
                        /^=/,
                        {
                            pattern: /(^|[^\\])["']/,
                            lookbehind: true
                        }
                    ]
                }
            },
            'punctuation': /\/?>/,
            'attr-name': {
                pattern: /[^\s>\/]+/,
                inside: {
                    'namespace': /^[^\s>\/:]+:/
                }
            }
        }
    },

    // Keywords
    'typoscript-cobject': {
        pattern: /\b(?:CASE|COA|COA_INT|CONTENT|EDITPANEL|FILE|FILES|FLUIDTEMPLATE|HMENU|TMENU|IMAGE|IMG_RESOURCE|LOAD_REGISTER|RECORDS|RESTORE_REGISTER|SVG|TEMPLATE|TEXT|USER|USER_INT|PAGE)\b/,
        alias: 'keyword'
    },
    'typoscript-constant': {
        pattern: /{\$.*}/,
        alias: 'keyword'
    },

    // Strings
    'typoscript-value': {
        pattern: /(=\s?)(.*)(?:\n)/,
        lookbehind: true,
        alias: 'string',
    },
    'single-quoted-string': {
        pattern: /'(?:\\[\s\S]|[^\\'])*'/,
        greedy: true,
        alias: 'string'
    },
    'double-quoted-string': {
        pattern: /"(?:\\[\s\S]|[^\\"])*"/,
        greedy: true,
        alias: 'string'
    },

    // Operator
    'operator': {
        pattern: /--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/,
    }

};
