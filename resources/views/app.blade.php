<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
        <script src="https://www.debugtool.com/app/app/js/debugtool.min.js"></script>
        <!-- Scripts -->

        @routes
        @vite('resources/js/app.js')
        @inertiaHead

        <script data-key="$2y$10$ktiS3eSP6sx1RqPbO80nFeAeZQlHoZFdTWf9.oeQNqXL9yh5SqS" data-name="CookieXray" src="https://cdn.seersco.com/banners/27816/18779/cb.js" type="text/javascript"></script>

    </head>
    <body class="font-sans antialiased">
        @inertia

        <script src="https://sdk.qualetics.com/qualetics-js-sdk-v3.js
        "></script>
        <script>
        var qualetics = new Qualetics.service("dealcodestaging", "h7H9y6mcuIH6", "7uLYgI", port: 443, appVersion: "1.0.1", trackUserGeoLocation: true, captureClicks: true, captureTimings: true);
        qualetics.init()
        </script>

       {{--  <script>
        !function(Gleap,t,i){if(!(Gleap=window.Gleap=window.Gleap||[]).invoked){for(window.GleapActions=[],Gleap.invoked=!0,Gleap.methods=["identify","clearIdentity","attachCustomData","setCustomData","removeCustomData","clearCustomData","registerCustomAction","logEvent","log","preFillForm","sendSilentCrashReport","startFeedbackFlow","setAppBuildNumber","setAppVersionCode","preFillForm","setApiUrl","setFrameUrl","isOpened","open","close","on","setLanguage","setOfflineMode","initialize"],Gleap.f=function(e){return function(){var t=Array.prototype.slice.call(arguments);window.GleapActions.push({e:e,a:t})}},t=0;t<Gleap.methods.length;t++)Gleap[i=Gleap.methods[t]]=Gleap.f(i);Gleap.load=function(){var t=document.getElementsByTagName("head")[0],i=document.createElement("script");i.type="text/javascript",i.async=!0,i.src="https://sdk.gleap.io/latest/index.js
        ",t.appendChild(i)},Gleap.load(),
            Gleap.initialize("YOYFH1FfAXV1aYaps0bDgGirCDC6ND29")
        }}();
        </script>  --}}
    </body>

     <style>
         /* The switch - the box around the slider */
        .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
        }
        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }
        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }
        .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }
        input:checked + .slider {
        background-color: #4121f3;
        }
        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }
        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }
        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }
        .slider.round:before {
        border-radius: 50%;
        }
            </style>

    <script>
        //   $(document).ready(function() {
        //         $('.selectpicker').select2();
        //     });
    </script>
</html>
