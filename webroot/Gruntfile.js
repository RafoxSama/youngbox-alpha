module.exports = function(grunt) {

      grunt.initConfig({
          jshint: {
            all: ['src/default/app/*.js', '!src/default/app/tmp.js']
          },

          concat: {
            options: {
              separator: ';',
            },
            dist: {
              src: ['js/default/zepto.js', 'js/default/*.js', 'js/default/app/*.js', '!js/default/app/tmp.js'],
              dest: 'js/dist/default.dist.js',
            },
          },

        cssmin: {
          options: {
            shorthandCompacting: false,
            roundingPrecision: -1
          },
          target: {
            files: {
              'css/dist/default.dist.css': ['css/default/semantic.css', 'css/default/*.css', 'css/default/app/*.css', '!css/default/app/tmp.css']
            }
          }
        }

  });


  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  grunt.registerTask('default', ['jshint', 'concat', 'cssmin']);

};
