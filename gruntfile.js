module.exports = function(grunt) {


  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-autoprefixer');

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    uglify: {
      my_target: {
        files: {
          'js/scripts.js': 'components/js/main.js'
        }
      }
    },

    sass: {
      dev: {
        options: {
          style: 'compressed',
          sourcemap: 'none'
        },
        files: {
          'compiled/style.css': 'components/style.scss'
        }
      }
    },

    copy: {
      files: {
        src: 'components/js/*.js',           // copy all files and subfolders
        dest: 'js/scripts.js',    // destination folder
      }
    },

    autoprefixer: {
      options: {
        browsers: ['last 2 versions']
      },
      multiple_files: {
        expand: true,
        flatten: true,
        src: 'compiled/*.css',
        dest: ''
      }
    },

    watch: {
      options: { livereload: true },
      scripts: {
        files: ['components/js/*.js'],
        tasks: ['copy']        
      },
      css : {
        files: ['components/**/*'],
        tasks: ['sass', 'autoprefixer']
      }
    }
  });

  grunt.registerTask('default', ['watch']);
}