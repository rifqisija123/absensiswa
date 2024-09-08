const cacheName = "Si Hajar"
const preCache = ["/", "/index.php", "/assets/js/plugin/webfont/webfont.min.js",
          "/assets/css/fonts.min.css",
          "/assets/css/bootstrap.min.css",
          "/assets/css/plugins.min.css",
          "/assets/css/kaiadmin.min.css",
          "/assets/css/demo.css",
          "/assets/js/plugin/webfont/webfont.min.js",
          "/assets/js/setting-demo.js",
          "/assets/js/demo.js",
          "/assets/js/core/jquery-3.7.1.min.js",
          "/assets/js/core/popper.min.js",
          "/assets/js/core/bootstrap.min.js",
          "/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js",
          "/assets/js/plugin/chart.js/chart.min.js",
          "/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js",
          "/assets/js/plugin/chart-circle/circles.min.js",
          "/assets/js/plugin/datatables/datatables.min.js",
          "/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js",
          "/assets/js/plugin/jsvectormap/jsvectormap.min.js",
          "/assets/js/plugin/jsvectormap/world.js",
          "/assets/js/plugin/sweetalert/sweetalert.min.js",
          "/login.php",
          "/assets/css/login.css",
          "/assets/js/script.js",
          "/assets/css/datatables.min.css",
          "/assets/js/setting-demo2.js",
          "/tables/add-xiisija1.php",
          "/tables/add-xiisija2.php",
          "/tables/add-xisija1.php",
          "/tables/add-xsija1.php",
          "/tables/add-xsija2.php",
          "/tables/belumabsenxiisija1.php",
          "/tables/belumabsenxiisija2.php",
          "/tables/belumabsenxisija1.php",
          "/tables/belumabsenxsija1.php",
          "/tables/belumabsenxsija2.php",
          "/tables/data-absen-dkv.php",
          "/tables/data-absen-lpb.php",
          "/tables/data-absen-sija.php",
          "/tables/data-dkv.php",
          "/tables/data-lpb.php",
          "/tables/data-sija.php",
          "/tables/dataabsenxiisija1.php",
          "/tables/dataabsenxiisija2.php",
          "/tables/dataabsenxisija1.php",
          "/tables/dataabsenxsija1.php",
          "/tables/dataabsenxsija2.php",
          "/tables/dataxiisija1.php",
          "/tables/dataxiisija2.php",
          "/tables/dataxisija1.php",
          "/tables/dataxsija1.php",
          "/tables/dataxsija2.php",
          "/tables/edit-xiisija1.php",
          "/tables/edit-xiisija2.php",
          "/tables/edit-xisija1.php",
          "/tables/edit-xsija1.php",
          "/tables/edit-xsija2.php",
          "/tables/export-absenxiisija1.php",
          "/tables/export-absenxiisija2.php",
          "/tables/export-absenxisija1.php",
          "/tables/export-absenxsija1.php",
          "/tables/export-absenxsija2.php",
          "/tables/export-belumabsenxiisija1.php",
          "/tables/export-belumabsenxiisija2.php",
          "/tables/export-belumabsenxisija1.php",
          "/tables/export-belumabsenxsija1.php",
          "/tables/export-belumabsenxsija2.php",
          "/tables/export-xiisija1.php",
          "/tables/export-xiisija2.php",
          "/tables/export-xisija1.php",
          "/tables/export-xsija1.php",
          "/tables/export-xsija2.php",
          "/tables/log-lpb.php",
          "/tables/log-sija.php",
          "/tables/log.dkv.php"]

self.addEventListener("install", () => {
    console.log("service worker installed")

    e.waitUntil(
        (async () => {
            const cache = await caches.open(cacheName)
            cache.addAll(preCache)
        })(),
    )
})

self.addEventListener("fetch", (e) => {
    e.respondWith((async () => {
        const cache = await caches.open(cacheName)
        const resCache = await cache.match(e.request)

        if (resCache) return resCache

        try {
            const res = await fetch(e.request)

            cache.put(e.request, res.clone())
            return res
        } catch (error) {
            console.log(error)
        }
    })(),
    )
})