# CHANGELOG #
All the log of changes on the project/repository

## 2021-12-2021
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

### Modified
- Links now also have `aria-label` for screenreaders
- Move styles to it's own component
- Now all layouts pass the `target`

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