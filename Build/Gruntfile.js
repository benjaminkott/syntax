module.exports = function(grunt) {

    /**
     * Project configuration.
     */
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        paths: {
            root: '../',
            node: 'node_modules/',
            resources: '<%= paths.root %>Resources/',
            css: '<%= paths.resources %>Public/Css/',
            js: '<%= paths.resources %>Public/JavaScript/'
        },
        cssmin: {
            options: {
                keepSpecialComments: '*',
                advanced: false
            },
            prismjs: {
                files: [{
                    expand: true,
                    cwd: '<%= paths.node %>prismjs/themes',
                    src: ['*.css', '!*.min.css'],
                    dest: '<%= paths.css %>',
                    ext: '.min.css'
                }]
            },
            prism_plugin_linenumbers: {
                files: {
                    '<%= paths.css %>prism-plugin-linenumbers.min.css': [
                        '<%= paths.node %>prismjs/plugins/line-numbers/prism-line-numbers.css',
                    ]
                }
            },
            prism_plugin_toolbar: {
                files: {
                    '<%= paths.css %>prism-plugin-toolbar.min.css': [
                        '<%= paths.node %>prismjs/plugins/toolbar/prism-toolbar.css',
                    ]
                }
            }

        },
        uglify: {
            options: {
                compress: {
                    warnings: false
                },
                output: {
                    comments: false
                }
            },
            prism: {
                files: {
                    '<%= paths.js %>prism.min.js': [
                        '<%= paths.node %>prismjs/components/prism-core.min.js',
                        '<%= paths.node %>prismjs/components/prism-markup.min.js',
                        '<%= paths.node %>prismjs/components/prism-css.min.js',
                        '<%= paths.node %>prismjs/components/prism-css-extras.min.js',
                        '<%= paths.node %>prismjs/components/prism-less.min.js',
                        '<%= paths.node %>prismjs/components/prism-sass.min.js',
                        '<%= paths.node %>prismjs/components/prism-scss.min.js',
                        '<%= paths.node %>prismjs/components/prism-clike.min.js',
                        '<%= paths.node %>prismjs/components/prism-javascript.min.js',
                        '<%= paths.node %>prismjs/components/prism-apacheconf.min.js',
                        '<%= paths.node %>prismjs/components/prism-markup-templating.min.js',
                        '<%= paths.node %>prismjs/components/prism-git.min.js',
                        '<%= paths.node %>prismjs/components/prism-json.min.js',
                        '<%= paths.node %>prismjs/components/prism-markdown.min.js',
                        '<%= paths.node %>prismjs/components/prism-nginx.min.js',
                        '<%= paths.node %>prismjs/components/prism-php.min.js',
                        '<%= paths.node %>prismjs/components/prism-php-extras.min.js',
                        '<%= paths.node %>prismjs/components/prism-yaml.min.js',
                        '<%= paths.resources %>Private/JavaScript/prism-typoscript.js',
                    ]
                }
            },
            prism_plugin_linenumbers: {
                files: {
                    '<%= paths.js %>prism-plugin-linenumbers.min.js': [
                        '<%= paths.node %>prismjs/plugins/line-numbers/prism-line-numbers.min.js',
                    ]
                }
            },
            prism_plugin_showlanguage: {
                files: {
                    '<%= paths.js %>prism-plugin-showlanguage.min.js': [
                        '<%= paths.node %>prismjs/plugins/show-language/prism-show-language.min.js',
                    ]
                }
            },
            prism_plugin_toolbar: {
                files: {
                    '<%= paths.js %>prism-plugin-toolbar.min.js': [
                        '<%= paths.node %>prismjs/plugins/toolbar/prism-toolbar.min.js',
                    ]
                }
            }
        }
    });

    /**
     * Register tasks
     */
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    /**
     * Grunt update task
     */
    grunt.registerTask('build', ['cssmin', 'uglify']);
    grunt.registerTask('default', ['build']);

};
