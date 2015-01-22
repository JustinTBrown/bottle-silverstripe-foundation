# Guardfile for SilverStripe-Foundation project template

# css_dir = 'themes/foundation/css'
# sass_dir = 'themes/foundation/scss'
# js_dir = 'themes/foundation/javascripts'
# img_dir = 'themes/foundation/images'

# notification :gntp, :host => '127.0.0.1'

group :development do
  guard 'livereload' do
    watch(%r{.+\.(css|html|js)})
  end
  guard :compass, compile_on_start:true do
    watch(%r{(.*)\.s[ac]ss$})
  end
end
  



