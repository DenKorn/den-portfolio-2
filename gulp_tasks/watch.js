const pkg = require('../package.json')
const gulp = require('gulp')

gulp.task('watch', ['sync'], () => {
  global.isWatching = true

  gulp.watch(`${pkg.folders.src}/js/**`, ['js'])
})
