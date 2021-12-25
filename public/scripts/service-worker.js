/**
 * Course of action if serviceWorker is not supported
 * 
 * @returns {void}
 */
function swUnsupported() {
    console.warn("Service Worker is not supported by browser.")
}

/**
 * Iniciates the service worker
 * 
 * @returns {void}
 */
function startServiceWorker() {
    /* Guard-clause if service worker is not supported by the browser */
    if (!'serviceWorker' in navigator) return swUnsupported();

    window.addEventListener("load", () => {
        navigator.serviceWorker.register('/sw.js')
            .then(reg => console.log("Service worker registered"))
            .catch(err => console.error(`Service Worker Error: ${err}`));
    });
}
startServiceWorker();