all:

watch:
	scss --sourcemap=none --watch public/stylesheets/app.scss

assets:
	scss --sourcemap=none --update public/stylesheets/app.scss
	jammit
