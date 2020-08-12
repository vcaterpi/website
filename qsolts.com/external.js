
$(document).ready(function() {

    // Блокируем кнопки виджета звонков
    $("a[href='#callbackwidget']").addClass("callback-load");

    // Делаем отложенную загрузку
    setTimeout(function() {


        // включаем кнопку.
        $("a[href='#callbackwidget']").removeClass("callback-load");

        // Подключаем скрипты сторонних ресурсов
        $("body").append('<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">');
        $("body").append('<script src="https://cdn.envybox.io/widget/cbk.js?wcb_code=3c51aa3817442bdbe1fb2e9041ce3335" charset="UTF-8" async><\/script>');

        // Это наверно аналитика ваша.
        $("body").append('<script async="async" src="https://www.googletagmanager.com/gtag/js?id=UA-141169797-1"><\/script>');


        // Аналитика
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-141169797-1');

        // Чат
        ! function() {
            function t(t, e) {
                return function() {
                    window.carrotquestasync.push(t, arguments)
                }
            }
            if ("undefined" == typeof carrotquest) {
                var e = document.createElement("script");
                e.type = "text/javascript",
                    e.async = !0,
                    e.src = "https://cdn.carrotquest.io/api.min.js",
                    document.getElementsByTagName("head")[0].appendChild(e),
                    window.carrotquest = {},
                    window.carrotquestasync = [],
                    carrotquest.settings = {};
                for (var n = ["connect", "track", "identify", "auth", "oth", "onReady", "addCallback", "removeCallback", "trackMessageInteraction"], a = 0; a < n.length; a++)
                    carrotquest[n[a]] = t(n[a])
            }
        }(),

        carrotquest.onReady(() => {
            function getCookie(name) {
                var value = "; " + document.cookie;
                var parts = value.split("; " + name + "=");
                if (parts.length == 2) return parts.pop().split(";").shift();
            }
            var uid = getCookie('carrotquest_uid')
            $("input[name='qqshop_uid']").each(function(index) {
                if ($(this).val() == '' && uid != undefined) {
                    $(this).val(uid)
                    console.log('uid set', this, uid);
                }
            });
        });
        carrotquest.connect("16257-2aad6aaac56cca4ad87a88bc77");


        // Яндекс метрика. 
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(47429476, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true,
            trackHash: true
        });

    }, 3000);
})
