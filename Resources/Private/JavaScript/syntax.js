function loadCssFiles(files) {
    if (files.length > 0) {
        var path = files.shift();
        var element = document.createElement('link');
        element.rel = 'stylesheet';
        element.type = 'text/css';
        element.href = path;
        document.body.appendChild(element);
        loadCssFiles(files);
    }
}

function loadJsFiles(files) {
    if (files.length > 0) {
        var path = files.shift();
        var element = document.createElement('script');
        element.src = path;
        element.async = false;
        document.body.appendChild(element);
        loadJsFiles(files);
    }
}

function loadPrism() {
    var cssFiles = [];
    var jsFiles = [];

    // Prism
    jsFiles.push('/typo3conf/ext/syntax/Resources/Public/JavaScript/prism.min.js');
    cssFiles.push('/typo3conf/ext/syntax/Resources/Public/Css/prism' + TYPO3.settings.TS.syntax_theme + '.min.css');

    // Plugin: Line Numbers
    if (TYPO3.settings.TS.syntax_plugins_linenumbers !== "0") {
        jsFiles.push('/typo3conf/ext/syntax/Resources/Public/JavaScript/prism-plugin-linenumbers.min.js');
        cssFiles.push('/typo3conf/ext/syntax/Resources/Public/Css/prism-plugin-linenumbers.min.css');
    }

    // Plugin: Show Languages
    jsFiles.push('/typo3conf/ext/syntax/Resources/Public/JavaScript/prism-plugin-toolbar.min.js');
    jsFiles.push('/typo3conf/ext/syntax/Resources/Public/JavaScript/prism-plugin-showlanguage.min.js');
    cssFiles.push('/typo3conf/ext/syntax/Resources/Public/Css/prism-plugin-toolbar.min.css');

    loadCssFiles(cssFiles);
    loadJsFiles(jsFiles);
}


window.addEventListener('DOMContentLoaded', function() {
    var list = document.getElementsByTagName('pre');
    for (var i = 0; i < list.length; i++) {
        if(list[i].getElementsByTagName('code').length > 0) {
            loadPrism();
            break;
        }
    }
});
