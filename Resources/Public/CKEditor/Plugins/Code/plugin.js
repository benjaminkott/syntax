'use strict';

(function () {

    CKEDITOR.plugins.add('syntax_code', {
        lang: 'en,de',
        requires: 'widget,dialog',
        icons: 'code',
        hidpi: true,
        onLoad: function () {
            CKEDITOR.dialog.add('code', this.path + 'dialogs/code.js');
        },
        init: function (editor) {
            editor.addContentsCss(this.path + 'styles/code.css');
            editor.widgets.add('code', {
                button: 'Insert Code Block',
                template: '<pre><code class="language-none"></code></pre>',
                parts: {
                    pre: 'pre',
                    code: 'code'
                },
                allowedContent: 'pre(line-numbers); code(language-*)',
                requiredContent: 'pre',
                styleableElements: 'pre',
                dialog: 'code',
                mask: true,
                upcast: function (element) {
                    if (element.name != 'pre') {
                        return;
                    }
                    var children = element.children.filter(
                        child => child.type != CKEDITOR.NODE_TEXT
                    );
                    if (children.length != 1 || children[0].name != 'code') {
                        return;
                    }
                    var code = children[0];
                    if (code.children.length != 1 || code.children[0].type != CKEDITOR.NODE_TEXT) {
                        return;
                    }
                    return element;
                },
                downcast: function (element) {
                    var code = element.getFirst('code');
                    code.children.length = 0;
                    code.add(new CKEDITOR.htmlParser.text(CKEDITOR.tools.htmlEncode(this.data.code)));
                    return element;
                },
                init: function () {
                    this.data.code = CKEDITOR.tools.htmlDecode(this.parts.code.getHtml());
                    this.data.lang = this.parts.code.getAttribute('class') ?? 'language-none';
                    this.data.linenumbers = this.parts.pre.hasClass('line-numbers');
                },
                data: function () {
                    if (this.data.lang) {
                        this.parts.code.removeAttribute(['class'])
                        this.parts.code.addClass(this.data.lang);
                    }
                    if (this.data.linenumbers) {
                        this.parts.pre.addClass('line-numbers');
                    } else {
                        this.parts.pre.removeClass('line-numbers');
                    }
                    if (this.data.code) {
                        this.parts.code.setHtml(CKEDITOR.tools.htmlEncode(this.data.code));
                    }
                }
            });
        }
    });

})();
