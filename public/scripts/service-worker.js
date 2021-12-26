/**
 * Course of action if serviceWorker is not supported
 * 
 * @returns {void}
 * 
 * @author rajat_m (https://medium.com/@rajat_m)
 * @source https://medium.com/@rajat_m/what-are-service-workers-and-how-to-use-them-e993c1f497e6
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
    // Guard-clause if service worker is not supported by the browser
    if (!'serviceWorker' in navigator) return swUnsupported();

    window.addEventListener("load", () => {
        navigator.serviceWorker.register('/sw.js')
            .then(reg => console.log("Service worker registered"))
            .catch(err => console.error(`Service Worker Error: ${err}`));
    });
}
startServiceWorker();