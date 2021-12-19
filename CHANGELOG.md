# CHANGELOG #
All the log of changes on the project/repository

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

### Modified
- Improved README.md
- `cli build` now creates subfolders if doesn't previously exist
- Implement `get_content`
  - it now `compiles` the content with the use of `require`

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