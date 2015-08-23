require "sass-globbing"
require 'autoprefixer-rails'

# Set this to the root of your project when deployed:
http_path = "/themes/project-theme"
css_dir = 'css'
sass_dir = 'scss'
js_dir = 'javascript'
img_dir = 'images'

add_import_path "bower_components/foundation/scss"

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = true

on_stylesheet_saved do |file|
  css = File.read(file)
  File.open(file, 'w') do |io|
    io << AutoprefixerRails.process(css)
  end
end