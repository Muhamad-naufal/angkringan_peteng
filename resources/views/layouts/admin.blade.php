<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/25db4f44a1.js" crossorigin="anonymous"></script>
    <script nonce="fcf4d74a-b75c-4397-92a0-3f8904d941d2">
        (function(w, d) {
            ! function(dK, dL, dM, dN) {
                dK[dM] = dK[dM] || {};
                dK[dM].executed = [];
                dK.zaraz = {
                    deferred: [],
                    listeners: []
                };
                dK.zaraz.q = [];
                dK.zaraz._f = function(dO) {
                    return function() {
                        var dP = Array.prototype.slice.call(arguments);
                        dK.zaraz.q.push({
                            m: dO,
                            a: dP
                        })
                    }
                };
                for (const dQ of ["track", "set", "debug"]) dK.zaraz[dQ] = dK.zaraz._f(dQ);
                dK.zaraz.init = () => {
                    var dR = dL.getElementsByTagName(dN)[0],
                        dS = dL.createElement(dN),
                        dT = dL.getElementsByTagName("title")[0];
                    dT && (dK[dM].t = dL.getElementsByTagName("title")[0].text);
                    dK[dM].x = Math.random();
                    dK[dM].w = dK.screen.width;
                    dK[dM].h = dK.screen.height;
                    dK[dM].j = dK.innerHeight;
                    dK[dM].e = dK.innerWidth;
                    dK[dM].l = dK.location.href;
                    dK[dM].r = dL.referrer;
                    dK[dM].k = dK.screen.colorDepth;
                    dK[dM].n = dL.characterSet;
                    dK[dM].o = (new Date).getTimezoneOffset();
                    if (dK.dataLayer)
                        for (const dX of Object.entries(Object.entries(dataLayer).reduce(((dY, dZ) => ({
                                ...dY[1],
                                ...dZ[1]
                            })), {}))) zaraz.set(dX[0], dX[1], {
                            scope: "page"
                        });
                    dK[dM].q = [];
                    for (; dK.zaraz.q.length;) {
                        const d_ = dK.zaraz.q.shift();
                        dK[dM].q.push(d_)
                    }
                    dS.defer = !0;
                    for (const ea of [localStorage, sessionStorage]) Object.keys(ea || {}).filter((ec => ec
                        .startsWith("_zaraz_"))).forEach((eb => {
                        try {
                            dK[dM]["z_" + eb.slice(7)] = JSON.parse(ea.getItem(eb))
                        } catch {
                            dK[dM]["z_" + eb.slice(7)] = ea.getItem(eb)
                        }
                    }));
                    dS.referrerPolicy = "origin";
                    dS.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(dK[dM])));
                    dR.parentNode.insertBefore(dS, dR)
                };
                ["complete", "interactive"].includes(dL.readyState) ? zaraz.init() : dK.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- navbar --}}
        @include('layouts.inc_admin.navbar')
        {{-- navbar --}}

        {{-- sidebar --}}
        @include('layouts.inc_admin.sidebar')
        {{-- sidebar --}}

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid mb-2">
                    @yield('content-header')
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>


        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Version 1.0.1
            </div>

            <strong>Copyright &copy; 2023 Angkringan Peteng.</strong> All rights
            reserved.
        </footer>
    </div>
    @yield('modal')


    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js"></script>
    @stack('js')
</body>

</html>
