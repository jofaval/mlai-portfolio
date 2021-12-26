// The cache ID versioning
const cacheName = "v1";
// Maximum retention time per cache
const maxRetentionTime = 24 * 60;

// Stored in miliseconds
const minIntervalSeconds = 60 * 1000;
const minIntervalHours = minIntervalSeconds * 24;
const minIntervalDays = minIntervalSeconds * 1;
const minInterval = minIntervalDays;

// The fallback home page
const offlineFallbackPage = "index.html";

// The periodic sync cache ID
const periodicSyncId = `content-sync-${cacheName}`;

// Install a service worker
self.addEventListener("install", (event) => {
    console.log("Service Workers: Installed");

    event.waitUntil(
        caches.open(CACHE)
            .then((cache) => cache.add(offlineFallbackPage))
    );
});

// Cache and return requests
self.addEventListener("fetch", (event) => {
    if (event.request.mode !== 'navigate') return;

    event.respondWith(
        fetch(event.request)
            .then((res) => {
                // Make clone of response
                const resClone = res.clone();
                // Open cache
                caches.open(cacheName).then((cache) => {
                    // Add response to the cache
                    cache.put(event.request, resClone);
                });
                return res;
            })
            .catch((err) =>
                caches
                    .match(event.request)
                    .then((res) => res)
                    .catch((err) => console.error(err))
            )
    );
});

// Update a service worker
self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cache) => {
                    if (cache !== cacheName) {
                        return caches.delete(cache);
                    }
                })
            );
        })
    );
});

// The background sync queue
const QUEUE_NAME = "bgSyncQueue";

// Imports the script
importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js');

// Message to skip waiting
self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
        self.skipWaiting();
    }
});

// Background syncing
const bgSyncPlugin = new workbox.backgroundSync.BackgroundSyncPlugin(QUEUE_NAME, {
    maxRetentionTime: maxRetentionTime // Retry for max of 24 Hours (specified in minutes)
});

workbox.routing.registerRoute(
    new RegExp('/*'),
    new workbox.strategies.StaleWhileRevalidate({
        cacheName: cacheName,
        plugins: [
            bgSyncPlugin
        ]
    })
);

/**
 * Implements the periodic syn in the service worker
 * 
 * @returns {void}
 */
function handleServiceWorkerPeriodicSync() {
    const status = await navigator.permissions.query({
        name: 'periodic-background-sync',
    });
    // If it's not granted, exit
    if (status.state !== 'granted') return;

    // Start registerinc with periodic sync if available
    const registration = await navigator.serviceWorker.ready;
    if ('periodicSync' in registration) {
        // Register the periodic sync
        try {
            await registration.periodicSync.register(periodicSyncId, {
                // An interval of one day.
                minInterval: minInterval,
            });
        } catch (error) {
            // Periodic background sync cannot be used.
            console.log('Could not register periodic Sync! ' + error);
            // window.alert('Could not register Periodic Sync! Either the feature is disabled or permission was denied.');
            console.warn('Could not register Periodic Sync! Either the feature is disabled or permission was denied.');
        }

        // Verificate the registration
        const tags = await registration.periodicSync.getTags();

        if (!tags.includes(periodicSyncId)) {
            // updateContentOnPageLoad();
        }
    } else {
        // updateContentOnPageLoad();
    }

    // Respond to a periodic background sync
    self.addEventListener('periodicsync', (event) => {
        if (event.tag === periodicSyncId) {
            // See the "Think before you sync" section for
            // checks you could perform before syncing.
            // event.waitUntil(syncContent());
        }
    
        // Other logic for different tags as needed.
    });
}

// Periodic Sync
// handleServiceWorkerPeriodicSync();