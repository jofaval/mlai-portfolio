# Structure #
The folder and file structure

## Folder Structure
The folder structure

```folder
📦mlai-portfolio
 ┣ 📂build            # The compiled build
 ┣ 📂builder          # The building utilities
 ┣ 📂config           # Configuration files
 ┣ 📂docs             # Documentation
 ┃ ┗ 📂en             # English Documentation
 ┣ 📂frontend         # Frontend development
 ┃ ┣ 📂components     # Components
 ┃ ┣ 📂layouts        # Layouts
 ┣ 📂ignore           # All the files that will be ignored in the project
 ┣ 📂libs             # Utilities
 ┣ 📂logs             # The logs, building, and error ones included
 ┣ 📂production       # Production utilities
 ┃ ┣ 📂deployments    # Releases deployments
 ┣ 📂public           # Static assets, but also holds the views
 ┃ ┣ 📂img            # Images
 ┃ ┃ ┣ 📂pwa          # PWA (Progressive Web-App) images
 ┃ ┃ ┃ ┗ 📂icons      # The PWA icons
 ┃ ┣ 📂projects       # All the projects
 ┃ ┣ 📂scripts        # Scripts
 ┃ ┣ 📂styles         # Styles
```

## File Structure
The folder and file structure

```folder
📦mlai-portfolio
 ┣ 📂build            # The compiled build
 ┃ ┣ 📂img
 ┃ ┃ ┣ 📂pwa
 ┃ ┃ ┃ ┣ 📂icons
 ┃ ┃ ┃ ┃ ┣ 📜icon-144x144.png
 ┃ ┃ ┃ ┃ ┣ 📜icon-152x152.png
 ┃ ┃ ┃ ┃ ┣ 📜icon-192x192.png
 ┃ ┃ ┃ ┃ ┣ 📜icon-384x384.png
 ┃ ┃ ┃ ┃ ┣ 📜icon-48x48.png
 ┃ ┃ ┃ ┃ ┣ 📜icon-512x512.png
 ┃ ┃ ┃ ┃ ┣ 📜icon-72x72.png
 ┃ ┃ ┃ ┃ ┗ 📜icon-96x96.png
 ┃ ┃ ┃ ┣ 📂screenshots
 ┃ ┃ ┃ ┗ 📂splash
 ┃ ┃ ┃ ┃ ┣ 📜splash-1125x2436.jpg
 ┃ ┃ ┃ ┃ ┣ 📜splash-1242x2208.jpg
 ┃ ┃ ┃ ┃ ┣ 📜splash-1536x2048.jpg
 ┃ ┃ ┃ ┃ ┣ 📜splash-1668x2224.jpg
 ┃ ┃ ┃ ┃ ┣ 📜splash-2048x2732.jpg
 ┃ ┃ ┃ ┃ ┣ 📜splash-640x1136.jpg
 ┃ ┃ ┃ ┃ ┗ 📜splash-750x1334.jpg
 ┃ ┃ ┗ 📜jofaval.jpg
 ┃ ┣ 📂projects
 ┃ ┃ ┗ 📜test.html
 ┃ ┣ 📂styles
 ┃ ┃ ┣ 📜403.css
 ┃ ┃ ┣ 📜404.css
 ┃ ┃ ┣ 📜500.css
 ┃ ┃ ┣ 📜contact.css
 ┃ ┃ ┣ 📜index.css
 ┃ ┃ ┗ 📜projects.css
 ┃ ┣ 📜.htaccess
 ┃ ┣ 📜403.html
 ┃ ┣ 📜404.html
 ┃ ┣ 📜500.html
 ┃ ┣ 📜contact.html
 ┃ ┣ 📜index.html
 ┃ ┣ 📜manifest.json
 ┃ ┣ 📜projects.html
 ┃ ┣ 📜robots.txt
 ┃ ┣ 📜sitemap.xml
 ┃ ┗ 📜sw.js
 ┣ 📂builder          # The building utilities
 ┃ ┣ 📜actions.php
 ┃ ┣ 📜asset.php
 ┃ ┣ 📜build.php
 ┃ ┣ 📜minimize.php
 ┃ ┣ 📜pwa.php
 ┃ ┣ 📜robot.php
 ┃ ┣ 📜service-worker.php
 ┃ ┗ 📜sitemap.php
 ┣ 📂config           # Configuration files
 ┃ ┣ 📜constants.php
 ┃ ┗ 📜projects.php
 ┣ 📂docs             # Documentation
 ┃ ┗ 📂en             # English Documentation
 ┃ ┃ ┗ 📜Structure.md
 ┣ 📂frontend         # Frontend development
 ┃ ┣ 📂components     # Components
 ┃ ┃ ┣ 📂navigation
 ┃ ┃ ┃ ┣ 📜hire-me.php
 ┃ ┃ ┃ ┗ 📜link.php
 ┃ ┃ ┣ 📂page
 ┃ ┃ ┃ ┣ 📜footer.php
 ┃ ┃ ┃ ┣ 📜head.php
 ┃ ┃ ┃ ┣ 📜header.php
 ┃ ┃ ┃ ┣ 📜pwa.php
 ┃ ┃ ┃ ┣ 📜scripts.php
 ┃ ┃ ┃ ┣ 📜seo.php
 ┃ ┃ ┃ ┗ 📜styles.php
 ┃ ┃ ┣ 📜img.php
 ┃ ┃ ┗ 📜service-worker.php
 ┃ ┣ 📂layouts        # Layouts
 ┃ ┃ ┣ 📜base.php
 ┃ ┃ ┣ 📜error.php
 ┃ ┃ ┣ 📜main.php
 ┃ ┃ ┗ 📜projects.php
 ┃ ┗ 📜library.php
 ┣ 📂ignore           # All the files that will be ignored in the project
 ┣ 📂libs             # Utilities
 ┃ ┣ 📜debug.php
 ┃ ┣ 📜file.php
 ┃ ┣ 📜img.php
 ┃ ┗ 📜log.php
 ┣ 📂logs             # The logs, building, and error ones included
 ┃ ┗ 📜log.txt
 ┣ 📂production       # Production utilities
 ┃ ┣ 📂deployments    # Releases deployments
 ┃ ┃ ┗ 📜release.zip
 ┃ ┣ 📜.ignore
 ┃ ┣ 📜config.py
 ┃ ┗ 📜upload.py
 ┣ 📂public           # Static assets, but also holds the views
 ┃ ┣ 📂img            # Images
 ┃ ┃ ┣ 📂pwa          # PWA (Progressive Web-App) images
 ┃ ┃ ┃ ┗ 📂icons      # The PWA icons
 ┃ ┃ ┣ 📜jofaval.jpg
 ┃ ┃ ┗ 📜jofaval.png
 ┃ ┣ 📂projects       # All the projects
 ┃ ┃ ┗ 📜test.html
 ┃ ┣ 📂scripts        # Scripts
 ┃ ┃ ┗ 📜service-worker.js
 ┃ ┣ 📂styles         # Styles
 ┃ ┃ ┣ 📂components
 ┃ ┃ ┃ ┗ 📜skip-navigation.css
 ┃ ┃ ┣ 📜contact.css
 ┃ ┃ ┣ 📜counters.css
 ┃ ┃ ┣ 📜footer.css
 ┃ ┃ ┣ 📜header.css
 ┃ ┃ ┣ 📜main.css
 ┃ ┃ ┗ 📜projects.css
 ┃ ┣ 📜.htaccess
 ┃ ┣ 📜403.php
 ┃ ┣ 📜404.php
 ┃ ┣ 📜500.php
 ┃ ┣ 📜contact.php
 ┃ ┣ 📜index.html
 ┃ ┣ 📜index.php
 ┃ ┣ 📜projects.php
 ┃ ┗ 📜sw.js
 ┣ 📜.gitignore
 ┣ 📜build.bat
 ┣ 📜CHANGELOG.md
 ┣ 📜cli
 ┣ 📜deploy.bat
 ┣ 📜index
 ┣ 📜index.php
 ┣ 📜LICENSE.md
 ┣ 📜paths.php
 ┣ 📜README.md
 ┣ 📜require.php
 ┣ 📜TODO
 ┗ 📜utils.php
```