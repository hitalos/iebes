'use strict';

module.exports = function (grunt) {

  var config = {
    app: 'webroot'
  };

  grunt.initConfig({
    config: config,
    watch: {
      bower: {
        files: ['bower.json'],
        tasks: ['wiredep']
      },
      js: {
        files: [
            '<%= config.app %>/js/{,*/}*.js',
            '<%= config.app %>/vendors/{,*/}*.js'
        ]
      },
      gruntfile: {
        files: ['Gruntfile.js']
      },
      styles: {
        files: ['<%= config.app %>/css/{,*/}*.css']
      }
    },

    browserSync: {
      options: {
        notify: false,
        background: true
      },
      livereload: {
        options: {
          files: [
            '<%= config.app %>/{,*/}*.html',
            '.tmp/css/{,*/}*.css',
            '<%= config.app %>/images/{,*/}*',
            '<%= config.app %>/js/{,*/}*.js'
          ],
          port: 9000,
          server: {
            baseDir: [config.app]
          }
        }
      }
    },

    wiredep: {
      app: {
        src: ['<%= config.app %>/index.html'],
        ignorePath: /^<%= config.app %>\/|\.\.\//
      }
    }
  });

  grunt.registerTask('serve', 'Inicia o servidor', function (target) {

    grunt.task.run([
      'wiredep',
      'browserSync:livereload',
      'watch'
    ]);
  });

  grunt.registerTask('default', [
    'serve'
  ]);

  grunt.loadNpmTasks('grunt-wiredep');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-watch');
};
