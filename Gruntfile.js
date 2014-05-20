module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    uglify: {
      build: {
        src: ['js/form.js','vendor/stefangabos/zebra_form/public/javascript/zebra_form.js'],
        dest: 'js/build/form.min.js'
      }
    },

    cssmin: {
      combine: {
        files: {
          'css/build.css': ['css/reset.css', 'css/style.css', 'css/custom.css']
        }
      }
    },

    watch: {
      src: {
        files: ['Gruntfile.js', 'vendor/stefangabos/zebra_form/public/javascript/*.js', 'vendor/stefangabos/zebra_form/public/css/*.css', 'css/*.css', 'framework_style/stylesheets/app.css', 'js/form.js'],
        tasks: ['default'],
      }
    }


  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');  
  grunt.loadNpmTasks('grunt-contrib-watch');


  // Default task(s).
  grunt.registerTask('default', ['uglify', 'cssmin', 'watch']);

};