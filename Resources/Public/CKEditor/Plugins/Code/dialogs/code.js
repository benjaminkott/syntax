CKEDITOR.dialog.add('code', function () {

    var clientHeight = document.documentElement.clientHeight;
    var size = CKEDITOR.document.getWindow().getViewPaneSize();
    var width = Math.min(size.width - 70, 800);
    var height = size.height / 2;

    if (clientHeight < 650) {
        height = clientHeight - 220;
    }

    return {
        title: 'Code',
        minWidth: 200,
        minHeight: 100,
        contents: [
            {
                id: 'info',
                elements: [
                    {
                        id: 'lang',
                        type: 'select',
                        label: 'Language',
                        items: [
                            ['None', 'language-none'],
                            ['Apache Configuration', 'language-apacheconf'],
                            ['C-like', 'language-clike'],
                            ['CSS', 'language-css'],
                            ['Git', 'language-git'],
                            ['HTML', 'language-html'],
                            ['JavaScript', 'language-javascript'],
                            ['JSON', 'language-json'],
                            ['Markup ', 'language-markup'],
                            ['Less', 'language-less'],
                            ['Markdown', 'language-markdown'],
                            ['MathML', 'language-mathml'],
                            ['nginx', 'language-nginx'],
                            ['PHP', 'language-php'],
                            ['Sass', 'language-sass'],
                            ['Scss', 'language-scss'],
                            ['SVG', 'language-svg'],
                            ['TypoScript', 'language-typoscript'],
                            ['XML', 'language-xml'],
                            ['YAML', 'language-yaml'],
                        ],
                        setup: function (widget) {
                            this.setValue(widget.data.lang);
                        },
                        commit: function (widget) {
                            widget.setData('lang', this.getValue());
                        }
                    },
                    {
                        id: 'linenumbers',
                        type: 'checkbox',
                        label: 'Linenumbers',
                        default: true,
                        setup: function (widget) {
                            this.setValue(widget.data.linenumbers);
                        },
                        commit: function (widget) {
                            widget.setData('linenumbers', this.getValue());
                        }
                    },
                    {
                        id: 'code',
                        type: 'textarea',
                        label: 'Code',
                        setup: function (widget) {
                            this.setValue(widget.data.code);
                        },
                        commit: function (widget) {
                            widget.setData('code', this.getValue());
                        },
                        required: true,
                        validate: CKEDITOR.dialog.validate.notEmpty('Code cannot be empty.'),
                        inputStyle: 'cursor:auto;' +
                            'tab-size:4;' +
                            'width:' + width + 'px;' +
                            'height:' + height + 'px;' +
                            'padding: 1em;' +
                            'text-align:left;',
                    }
                ]
            }
        ]
    };
});
