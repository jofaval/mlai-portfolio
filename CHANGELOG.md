# CHANGELOG #
All the log of changes on the project/repository

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

## 2022-01-14

### Modified

- Add proper spacing between sections in the README, and in the CHANGELOG, it helps to visually identify elements

## 2022-01-13

### Added

- Created a server to `serve` the production build files while also starting the observer (Bob The Builder)

### Modified

- Refactor choice into constants to have a better control of the build system
- Refacor constants into separate files

## 2022-01-12

### Added

- Created Bob the Builder as an observer in the `public/` directory

### Modified

- Changed the shell markup lang to it's propery lang
- Move all the utilities to a `tools/` folder

## 2022-01-08

### Added

- Shortcut for `path_join` it is called `j`
- Link component now can have an ID
- Title to pages
  - Contact
  - Projects
- Now you can use different logging files in `logging`
- Implemented error log file
- Implement action usage by similarity, only if the input action was not close enough (exact match)
- Create an `assets` system to globally add and retrieve the `assets` (styles and scripts, at the moment)
- Assets can now be added in array, and checked as such

### Modified

- `localhost` will be ignored when forcing the `HTTPS` protocol
- Assets retrieval will now remove the extension from each asset, on the `get` and on the `set`
- Refactor styles so it now uses the `Assests::add_style()` functionality

### News

- Implemented pending features and improvements that were procrastinated for longer than necessary

## 2022-01-03

### Added

- A license (GPL-3.0 License)
- CHANGELOG.md standard
- Documented the file structure

### Modified

- Update wiki pages
- Now CLI commands use proper `markdown` marking

## 2022-01-02

### Added

- Header and footer links are now `button-like` (modification/improvement needed), providing easier touchability on smartphones

## 2021-12-28

### Added

- `cli pwa` to the README.md

## 2021-12-27

### Added

- The scroll behaviour is now `smooth`
- Added `skip-navigation` accessibility element, mainly because of [this video](https://www.youtube.com/watch?v=jDDaOFr9nqQ).

## 2021-12-26

### Added

- Splash screens generation
  - And added to the `manifest.json`
- Implement the possibility of using `public_url` without the domain
- Proper PWA path cosntants
- Vastly improve `manifest.json`
  - Added `orientation` in `portrait-primary`
  - Added some related `categories`
  - Added `shortcuts`
  - Add `iarc_rating_id`, not requested, using the sample one
- Implement screenshot system for PWA
- Create a `create_dir`
- Vastly improve `serviceWorker`
  - Add Background sync (with queue)
  - Add Periodic sync
  - Add offline work

### Achieved

- Got a `240` score on https://pwabuilder.com

### Modified

- All icons now have an `any maskable` `purpose`
- Fully implement web `related_applications`
- Now `minify_pre` also removes HTML comments `<!-- -->`
- Now `minify_pre` also removes single-line comments `//`
- Implement the `create_dir`

### Fixed

- Fixed chrome scrollbar `background-color`
- Use proper `categories` in `manifest.json`

## 2021-12-25

### Added

- `<img>` component now loads the dimensions onto the img
- `serviceWorker` is now implemented caching all pages
- Create a `serviceWorker` action and add it to the `cli build`
- Styles and scripts dir constants
- Refactor title to a function global `get_page_title`
- Service worker totally functional on production
- Create a `create` helper function
  - Implement `cli component` action
  - Implement `cli action` action
- Create and implement manifest generation
  - icons and custom splash screen left
  - Create `cli pwa` action
- Create `pwa` component for meta tags
- Ignore folder on the repository, for local files of the project
- Implement `img_resize` following PHP's documentation
- Generate PWA icons
  - There's now a PWA icon constant
- Added `apple-touch-icon`
- Tested on production PWA is now FULLY FUNCTIONAL!!!

### Modified

- Contact `<img>` loaded directly
- Move `IGNORE_FILES` to constants file
- Use styles and scripts constants
- Return the component name if doesn't exist while importing it
- Update manifest name extension, and use the constant instead of a hardcoded string
- Made adjustments to icons manifest generation and JSON encoding. ICONS FINALLY WORKING PROPERLY!!
- Modify the manifest and theme color

### Fixed

- `path_join` didn't take into account dirs ending or starting with a `/`
- Incorrect `log` usage, meant `logging`

## 2021-12-24

### Modified

- `lastmod` on sitemap, with full modification datetime

### Fixed

- Scrollbar color

## 2021-12-23

### Added

- Lazy loading on `<img>` by default
- Add `canonical` url
- `robots.txt` file generation
- Webmaster page on Google for a proper indexation
- Create `ping` function for URLs
- Add root `<url>` to `sitemap.xml` generation
- Create header links as a navigation menu
  - header links
  - contact link for "hiring"
- Create basic contact page
- Create projects page with project listing (using file reading)

### Modified

- Now the `<img>` changes only once in the code
- Change `utf-8` encoding to `UTF-8`
- `changefreq` on sitemap generation is now on `weekly`
- Extract `SITEMAP_FILE` constant to `paths`
- Extract sitemap `<url>` node generation into a separate function
- Center main entry title and subtitle in a separate file
- Visually redesign, and implement a kind of "glassmorphism"
- Extract `get_sidebar_links` to `library`
- `hire-me` label is now customizable

### Fixed

- `get_public_url` didn't work for `build` or `img` paths
- Replace `function` type on Python for correct `Callable` type
- Fixed files generation after the deploy (and build) was already done
- Links having a different color if previously visited

## 2021-12-22

### Added

- Added `no-counter` now some headers won't be counted
- Each `cli build` will get logged
- Add `replace_extension` for an easier replacement
- Implement error handler (as an extra on top of the exception_handler)
- Implement display option on error handlers
- `.original` elements for an untouched color
- Create `<img>` component
  - With `aria-label` and `<figure>` toggle
- Create contact section on the home page
- Create img lib with Imagick external library
- Prepare `sidebar` links generation in an `<aside>`
- Create `minify_img` using the `Imagick` wepb compression
- Specify libraries and tech-stack base of the proejct in the README.md
- CLI no action given fallback
- Create a sitemap file generation following the standard
- Documen the CLI interaction and configuration

### Modified

- Added "Link to" to `aria-label` in links for a more cohesive screen-reading
- `#page-title` is not an `<h1>` and each page can have it's own `<h1>`
- Extract `hire-me` component from contact link in footer
- Extract `get_file_extension`
- `cli deploy` now also builds, instead of building on the upload deploy
- Extracted debugging and handlers utilities to `libs/debug.php`
- Extracted `cli` actions into it's own separate file
- Add return types to all the functions
- Extract zip file writting in `upload.py`

### Fixed

- Attempting to minify images with HTML minification
- Correctly log errors on th exception_handler
- `.htaccess` custom error documents, using a `./` instead of a `/` and a `.htaccess` not fully updated on production

## 2021-12-21

### Added

- Scrollbar color is now updated
- Add `Content-Security Policy`. Extra layer of security
- Implement `deploy` in the `cli`
- File libs
  - `write` and `read`
- Create constants file for a better organization
- Create logging system with log levels
- Create minize base
- Create asset `build_styles` for a unified, extracted piece of logic
- Configure `locale`
- Create `build.php` to container all the building logic from `cli build`
- Implement a `minify_html` in `rebuild`

### Modified

- Links now also have `aria-label` for screenreaders
- Move styles to it's own component
- Now all layouts pass the `target`
- Use inline styling over CSP policy bypass (link -> style.css)
- Move constants from `seo` to `constants.php`
- Implement `minify_pre` for preprocessing

### Fixed

- `mkdir` on file `write` was creating the whole file path as a dir
- Styling not working, `Content-Secure Policy` inline `self` block
- Sanitize `label` before inputing it in `aria-label` so that it only reads text
- Incorrect date timezone fixed, it is now `Europe/Madrid`

## 2021-12-20

### Added

- HTML SEO description
- Style and scripts asset props
- Error layout
- Contact link in footer
- Created `get_public_url` for resources
- Color scheme, now it's not just a black and white page
- .html at the end of the url will now be implied

### Modified

- `styles` and `scripts` now load from the head "dinamically"
- Implement `get_all_files` decorator
- In `cli build` an `.html` file gets **overrided** by a `.php` one, if they share the same name

### Fixed

- `build.bat` incorrect call, used to be `rebuild`
- Prevent constant redifining
- Incorrect `str_ends_with` implementation
- It doesn't attempt to compile directories now
- HTML `charset` must be in the first 1024 bytes

## 2021-12-19

### Added

- StackOverflow story social link
- `dd()` for debugging
- Ignore build and config files
- upload.py script with `.ignore` configuration file
- Empty build dir before compiling
- Add progress on `cli build`
- Home Wiki page
- Frontend section
  - Components & Layouts
  - A library to interect with them
- String utilities
- There's now an ignore files in `cli build`
- Implement global exception handler
- Create CHANGELOG wiki page
- Add favicon
- Dummy `projects/test.html` for nesting testing on the `cli build`
- Dummy `index.php` root home

### Modified

- Improved README.md
- `cli build` now creates subfolders if doesn't previously exist
- Implement `get_content`
  - it now `compiles` the content with the use of `require`
- `.php` files will get compiled to `.html`
- Add total time to `upload.py` and translate some text

### Fixed

- Build target dir is now the correct path
- Add missing, get_content in `cli build`
- `str_contains` buggin the `IGNORE_FILES` logic, it was cheking `str_pos` for an `int` not a `bool`

## 2021-12-15

### Added

- Footer styling
- Social links in footer
- Implement Gzip compression on files
- Error pages (some base HTML)

## 2021-12-14

### Added

- Utils file
  - Path join utility
- Require file
- Paths file
- CLI command build design

## 2021-12-13

### Added

- Project started
- Subdomain successfully created
- .htaccess created with forceful HTTPS redirection
- Main basic index.html created
  - Base style
  - Implement heading numbering (counter) system
- Repository initialized
- Created README with some brief introduction