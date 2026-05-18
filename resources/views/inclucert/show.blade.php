<x-page-layout>

    @php
        $trendKey    = $metrics['trend_diff'] > 3 ? 'up' : ($metrics['trend_diff'] < -3 ? 'down' : 'flat');
        $trendSymbol = $trendKey === 'up' ? '↗' : ($trendKey === 'down' ? '↘' : '→');
        $trendColor  = $trendKey === 'up' ? '#1a9e3f' : ($trendKey === 'down' ? '#d42b2b' : '#888');
    @endphp

    <style>
        /* ── IncluCert Public Page ─────────────────────────────────────────────── */
        .ic-hero {
            background: linear-gradient(150deg, #010314 0%, #021030 50%, #010a22 100%);

            padding: 56px 0 72px;
            padding-top: calc(var(--navbar-height, 64px) + 40px);
            position: relative;
            overflow: hidden;
        }

        .ic-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, .035) 1px, transparent 1px);
            background-size: 30px 30px;
            pointer-events: none;
        }

        .ic-hero::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -60px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(212, 166, 42, .06) 0%, transparent 60%);
            pointer-events: none;
        }

        .ic-hero-z {
            position: relative;
            z-index: 2;
        }

        .ic-live-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(212, 166, 42, .1);
            border: 1px solid rgba(212, 166, 42, .2);
            color: #f7d37a;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            padding: 4px 11px;
            border-radius: 20px;
            margin-bottom: 14px;
        }

        .ic-live-dot {
            width: 5px;
            height: 5px;
            background: #4cd964;
            border-radius: 50%;
            animation: ic-blink 2s infinite;
        }

        @keyframes ic-blink {
            0%, 100% {
                opacity: 1
            }
            50% {
                opacity: .25
            }
        }

        .ic-hero-company {
            font-size: clamp(1.5rem, 3.5vw, 2.2rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.15;
            letter-spacing: -.02em;
            margin-bottom: 6px;
        }

        .ic-hero-sub {
            font-size: 13px;
            color: rgba(255, 255, 255, .38);
            line-height: 1.6;
            margin-bottom: 24px;
        }

        /* Score */
        .ic-score-row {
            display: flex;
            align-items: center;
            gap: 0;
            flex-wrap: wrap;
        }

        .ic-score-num {
            font-size: 3.6rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -.04em;
            background: linear-gradient(175deg, #f7d37a, #c8880a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-right: 6px;
        }

        .ic-score-denom {
            font-size: 1rem;
            color: rgba(255, 255, 255, .25);
            align-self: flex-end;
            margin-bottom: 8px;
            margin-right: 20px;
        }

        .ic-score-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
            border-left: 1px solid rgba(255, 255, 255, .1);
            padding-left: 18px;
        }

        .ic-score-trend {
            font-size: 13px;
            font-weight: 700;
        }

        .ic-score-period {
            font-size: 11px;
            color: rgba(255, 255, 255, .28);
        }

        /* Progress */
        .ic-progress {
            height: 3px;
            background: rgba(255, 255, 255, .07);
            border-radius: 2px;
            margin-top: 18px;
            max-width: 320px;
        }

        .ic-progress-fill {
            height: 100%;
            width: {{ $metrics['current_score'] }}%;
            background: linear-gradient(90deg, #c8880a, #f7d37a);
            border-radius: 2px;
        }

        /* QR */
        .ic-qr {
            background: #fff;
            border-radius: 10px;
            padding: 8px;
            display: inline-block;
            box-shadow: 0 4px 16px rgba(0, 0, 0, .2);
        }

        .ic-qr img {
            width: 90px;
            display: block;
        }

        .ic-qr-label {
            font-size: 10px;
            color: rgba(255, 255, 255, .2);
            text-align: center;
            margin-top: 6px;
        }

        /* ── Body ────────────────────────────────────────────────────────────────── */
        .ic-body {
            padding: 40px 0 60px;
        }

        /* Metrics row */
        .ic-metrics-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: rgba(0, 0, 0, .07);
            border: 1px solid rgba(0, 0, 0, .07);
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .ic-metric {
            background: #fff;
            padding: 18px 20px;
        }

        .ic-metric-val {
            font-size: 1.7rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -.02em;
            margin-bottom: 3px;
        }

        .ic-metric-lbl {
            font-size: 10.5px;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 500;
        }

        @media (max-width: 640px) {
            .ic-metrics-row {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Note */
        .ic-note {
            background: #f2f6ff;
            border: 1px solid rgba(23, 139, 255, .1);
            border-radius: 8px;
            padding: 11px 16px;
            font-size: 12px;
            color: #4a5a8a;
            line-height: 1.6;
        }

        .ic-note a {
            color: #178bff;
            font-weight: 600;
            text-decoration: none;
        }

        .ic-note a:hover {
            text-decoration: underline;
        }

        /* Chart */
        .ic-chart-wrap {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, .07);
            border-radius: 12px;
            padding: 20px;
            margin-top: 24px;
        }

        .ic-chart-wrap img {
            width: 100%;
            display: block;
            border-radius: 4px;
        }

        /* Section heading */
        .ic-sh {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #bbb;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ic-sh::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(0, 0, 0, .06);
        }

        /* Certificate — compact two-column */
        .ic-cert-wrap {
            margin-top: 24px;
            display: grid;
            grid-template-columns: 1fr 280px;
            gap: 0;
            border: 1px solid rgba(0, 0, 0, .07);
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }

        @media (max-width: 768px) {
            .ic-cert-wrap {
                grid-template-columns: 1fr;
            }
        }

        #ic-cert-img {
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f7f8fb;
        }

        #ic-cert-img img {
            width: 100%;
            display: block;
        }

        .ic-cert-sidebar {
            border-left: 1px solid rgba(0, 0, 0, .06);
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: #fafbfc;
        }

        .ic-cert-sidebar-title {
            font-size: 12px;
            font-weight: 700;
            color: #333;
            margin-bottom: 4px;
        }

        .ic-cert-sidebar-sub {
            font-size: 11px;
            color: #999;
            line-height: 1.5;
        }

        .ic-cert-dl-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: linear-gradient(135deg, #d4a62a, #f7d37a);
            color: #010314 !important;
            font-weight: 700;
            font-size: 13px;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: opacity .15s;
        }

        .ic-cert-dl-btn:hover {
            opacity: .9;
        }

        .ic-cert-url-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #fff;
            color: #555 !important;
            font-size: 12px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: 1px solid rgba(0, 0, 0, .1);
            transition: background .15s;
        }

        .ic-cert-url-btn:hover {
            background: #f5f5f5;
            color: #333 !important;
        }

        /* CTA */
        .ic-cta-strip {
            background: linear-gradient(150deg, #010314 0%, #021030 50%, #010a22 100%);
            border-radius: 14px;
            padding: 32px 36px;
            margin-top: 32px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .06);
        }

        .ic-cta-strip::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 220px;
            height: 220px;
            background: radial-gradient(circle, rgba(212, 166, 42, .08) 0%, transparent 70%);
        }

        .ic-cta-inner {
            position: relative;
            z-index: 2;
        }

        .ic-cta-strip h3 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .ic-cta-strip h3 em {
            font-style: normal;
            background: linear-gradient(90deg, #f7d37a, #d4a62a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .ic-cta-strip p {
            color: rgba(255, 255, 255, .45);
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .ic-cta-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #d4a62a, #f7d37a);
            color: #010314 !important;
            font-weight: 700;
            font-size: 13px;
            padding: 11px 22px;
            border-radius: 10px;
            text-decoration: none;
            white-space: nowrap;
            transition: transform .15s, box-shadow .15s;
        }

        .ic-cta-link:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(212, 166, 42, .22);
        }
    </style>

    {{-- ── HERO ── --}}
    <section class="position-relative bg-gradient-dark-night text-white no-hyphen">
        <div class="container pt-10 pb-3 pb-lg-5 position-relative z-2">
            <div class="row pb-0 pt-lg-5 align-items-center">

                <div class="col-12 col-lg-7 mb-5 mb-lg-0">

                    <div style="width:200px;" class="h1">

                        <svg fill="currentColor" width="100%" height="100%" viewBox="0 0 326 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xml:space="preserve" xmlns:serif="http://www.serif.com/" style="clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;">
    <g transform="matrix(1,0,0,1,-231.756,-80.6034)">
        <g transform="matrix(1.19092,0,0,1.19092,-8.51824,-4.03416)">
            <g transform="matrix(0.839687,0,0,0.839687,-107.984,-19.5946)">
                <g transform="matrix(82,0,0,82,368.792,163.241)">
                    <path d="M0.001,-0L0.137,-0.644L0.272,-0.644L0.136,-0L0.001,-0Z"/>
                </g>
                <g transform="matrix(82,0,0,82,386.996,163.241)">
                    <path
                        d="M0.001,-0L0.101,-0.474L0.226,-0.474L0.222,-0.429C0.245,-0.444 0.272,-0.456 0.304,-0.468C0.335,-0.478 0.367,-0.484 0.4,-0.484C0.52,-0.484 0.567,-0.424 0.542,-0.304L0.478,-0L0.343,-0L0.406,-0.297C0.413,-0.329 0.411,-0.352 0.402,-0.365C0.393,-0.378 0.371,-0.385 0.338,-0.385C0.313,-0.385 0.29,-0.38 0.267,-0.371C0.244,-0.362 0.224,-0.35 0.207,-0.336L0.136,-0L0.001,-0Z"/>
                </g>
                <g transform="matrix(82,0,0,82,431.604,163.241)">
                    <path
                        d="M0.239,0.01C0.188,0.01 0.145,0.001 0.11,-0.018C0.074,-0.037 0.049,-0.064 0.035,-0.101C0.02,-0.138 0.019,-0.183 0.03,-0.237C0.047,-0.32 0.083,-0.382 0.137,-0.423C0.191,-0.464 0.261,-0.484 0.348,-0.484C0.381,-0.484 0.409,-0.482 0.433,-0.477C0.456,-0.472 0.477,-0.465 0.498,-0.454L0.477,-0.357C0.462,-0.365 0.444,-0.371 0.424,-0.376C0.403,-0.381 0.379,-0.383 0.354,-0.383C0.303,-0.383 0.262,-0.373 0.231,-0.352C0.2,-0.331 0.178,-0.292 0.167,-0.237C0.156,-0.186 0.159,-0.149 0.176,-0.126C0.192,-0.103 0.23,-0.091 0.291,-0.091C0.314,-0.091 0.338,-0.093 0.361,-0.098C0.384,-0.103 0.407,-0.11 0.428,-0.119L0.407,-0.019C0.358,0 0.302,0.01 0.239,0.01Z"/>
                </g>
                <g transform="matrix(82,0,0,82,469.324,163.241)">
                    <path
                        d="M0.129,0.01C0.041,0.01 0.007,-0.035 0.026,-0.124L0.143,-0.674L0.278,-0.674L0.163,-0.135C0.16,-0.118 0.16,-0.107 0.165,-0.101C0.169,-0.094 0.178,-0.091 0.193,-0.091C0.21,-0.091 0.226,-0.093 0.241,-0.098L0.222,-0.005C0.194,0.005 0.163,0.01 0.129,0.01Z"/>
                </g>
                <g transform="matrix(82,0,0,82,489.414,163.241)">
                    <path
                        d="M0.173,0.01C0.118,0.01 0.078,-0.006 0.053,-0.038C0.027,-0.069 0.02,-0.116 0.033,-0.177L0.096,-0.474L0.231,-0.474L0.169,-0.18C0.162,-0.148 0.164,-0.125 0.175,-0.111C0.186,-0.096 0.208,-0.089 0.241,-0.089C0.264,-0.089 0.287,-0.094 0.309,-0.103C0.331,-0.112 0.35,-0.124 0.367,-0.138L0.438,-0.474L0.573,-0.474L0.473,-0L0.348,-0L0.352,-0.045C0.329,-0.029 0.302,-0.016 0.273,-0.006C0.244,0.005 0.21,0.01 0.173,0.01Z"/>
                </g>
                <g transform="matrix(82,0,0,82,535.334,163.241)">
                    <path
                        d="M0.332,0.01C0.27,0.01 0.216,0.001 0.17,-0.019C0.123,-0.038 0.087,-0.066 0.061,-0.103C0.035,-0.139 0.022,-0.185 0.022,-0.239C0.022,-0.264 0.025,-0.291 0.031,-0.32C0.054,-0.429 0.101,-0.512 0.17,-0.569C0.239,-0.626 0.34,-0.654 0.472,-0.654C0.511,-0.654 0.547,-0.651 0.578,-0.645C0.608,-0.639 0.637,-0.63 0.664,-0.619L0.624,-0.432C0.597,-0.446 0.571,-0.456 0.545,-0.463C0.518,-0.469 0.486,-0.472 0.448,-0.472C0.394,-0.472 0.35,-0.46 0.317,-0.438C0.284,-0.415 0.261,-0.375 0.25,-0.32C0.248,-0.309 0.246,-0.299 0.245,-0.29C0.244,-0.281 0.243,-0.272 0.243,-0.264C0.243,-0.23 0.254,-0.206 0.277,-0.193C0.299,-0.179 0.335,-0.172 0.386,-0.172C0.419,-0.172 0.451,-0.175 0.483,-0.182C0.514,-0.188 0.546,-0.198 0.579,-0.211L0.539,-0.023C0.508,-0.012 0.475,-0.004 0.443,0.002C0.409,0.007 0.373,0.01 0.332,0.01Z"/>
                </g>
                <g transform="matrix(82,0,0,82,583.14,163.241)">
                    <path
                        d="M0.249,0.01C0.202,0.01 0.161,0.003 0.125,-0.012C0.088,-0.026 0.06,-0.047 0.039,-0.075C0.017,-0.103 0.007,-0.138 0.007,-0.179C0.007,-0.196 0.009,-0.215 0.013,-0.235C0.024,-0.286 0.042,-0.329 0.066,-0.367C0.089,-0.403 0.122,-0.432 0.165,-0.453C0.207,-0.474 0.261,-0.484 0.328,-0.484C0.394,-0.484 0.446,-0.467 0.485,-0.435C0.523,-0.401 0.542,-0.358 0.542,-0.305C0.542,-0.298 0.542,-0.29 0.541,-0.282C0.54,-0.274 0.538,-0.266 0.537,-0.258L0.52,-0.176L0.198,-0.176C0.201,-0.157 0.213,-0.143 0.234,-0.134C0.255,-0.125 0.287,-0.121 0.332,-0.121C0.361,-0.121 0.39,-0.124 0.419,-0.129C0.448,-0.134 0.471,-0.139 0.489,-0.146L0.463,-0.024C0.411,-0.001 0.34,0.01 0.249,0.01ZM0.212,-0.288L0.37,-0.288L0.372,-0.301C0.374,-0.315 0.37,-0.327 0.36,-0.337C0.349,-0.347 0.332,-0.352 0.307,-0.352C0.278,-0.352 0.256,-0.346 0.241,-0.335C0.226,-0.324 0.216,-0.308 0.212,-0.288Z"/>
                </g>
                <g transform="matrix(82,0,0,82,626.764,163.241)">
                    <path
                        d="M-0.016,-0L0.084,-0.474L0.293,-0.474L0.291,-0.441C0.312,-0.452 0.337,-0.461 0.369,-0.47C0.4,-0.479 0.43,-0.483 0.461,-0.484L0.428,-0.325C0.411,-0.324 0.392,-0.323 0.371,-0.32C0.35,-0.317 0.33,-0.314 0.311,-0.311C0.292,-0.307 0.275,-0.302 0.262,-0.297L0.199,-0L-0.016,-0Z"/>
                </g>
                <g transform="matrix(82,0,0,82,659.4,163.241)">
                    <path
                        d="M0.194,0.01C0.141,0.01 0.102,-0.003 0.076,-0.028C0.049,-0.053 0.036,-0.086 0.036,-0.127C0.036,-0.142 0.038,-0.159 0.042,-0.177L0.072,-0.317L0.013,-0.317L0.046,-0.474L0.105,-0.474L0.125,-0.569L0.35,-0.616L0.32,-0.474L0.423,-0.474L0.384,-0.317L0.287,-0.317L0.26,-0.19C0.259,-0.187 0.259,-0.184 0.259,-0.181C0.258,-0.178 0.258,-0.175 0.258,-0.172C0.258,-0.152 0.273,-0.142 0.304,-0.142C0.323,-0.142 0.344,-0.145 0.366,-0.152L0.336,-0.014C0.315,-0.006 0.294,0 0.271,0.004C0.248,0.008 0.222,0.01 0.194,0.01Z"/>
                </g>
            </g>
        </g>
    </g>
</svg>


                    </div>
                    <h2 class="h2 display-4 mb-4">
                        <span style="font-size: 53px;">
                            {{ $company->name }}
                        </span>
                    </h2>

                    <p class="mb-6 lead text-white">
                        Diese Website wird kontinuierlich auf Barrierefreiheit überprüft und weiterentwickelt.
                        Der aktuelle Stand sowie die Fortschritte werden transparent dokumentiert und öffentlich nachvollziehbar gemacht.
                    </p>

                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <span>✔ Laufendes Monitoring</span>
                        <span>✔ Dokumentierte Verbesserungen</span>
                        <span>✔ Öffentlicher Nachweis</span>
                    </div>

                </div>

                <div class="col-lg-4 p-10 ">

                    <svg width="100%" height="100%" viewBox="0 0 158 168"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor">

                        <g transform="matrix(1,0,0,1,-45.6546,-52.7268)">
                            <g transform="matrix(1.19092,0,0,1.19092,-8.51824,-4.03416)">
                                <g transform="matrix(-1.03072,0,0,1.03072,177.463,47.6615)">
                                    <path d="M54.723,136.806C38.876,132.816 25.794,123.724 15.476,109.53C5.159,95.337 0,79.575 0,62.247L0,20.521L54.723,0L109.445,20.521L109.445,59.339C107.279,58.427 105.056,57.601 102.776,56.86C100.496,56.119 98.159,55.577 95.765,55.235L95.765,30.097L54.723,14.706L13.681,30.097L13.681,62.247C13.681,67.605 14.393,72.963 15.818,78.321C17.243,83.68 19.238,88.781 21.804,93.627C24.369,98.472 27.475,102.946 31.123,107.051C34.772,111.155 38.819,114.575 43.265,117.311C44.519,120.959 46.172,124.436 48.224,127.743C50.276,131.049 52.613,134.013 55.236,136.635C55.122,136.635 55.036,136.664 54.979,136.721C54.922,136.778 54.837,136.806 54.723,136.806Z"
                                          fill-rule="nonzero"/>
                                </g>
                            </g>

                            <g transform="matrix(1.19092,0,0,1.19092,-8.51824,-4.03416)">
                                <g transform="matrix(1.03072,0,0,1.03072,-10.9152,118.165)">
                                    <path d="M88.924,68.403L78.197,60.008L64.75,58.376L63.118,44.929L54.723,34.202L63.118,23.475L64.75,10.027L78.197,8.395L88.924,0L99.651,8.395L113.098,10.027L114.731,23.475L123.126,34.202L114.731,44.929L113.098,58.376L99.651,60.008L88.924,68.403ZM88.924,60.475L97.164,54.101L107.58,52.779L108.823,42.441L115.197,34.202L108.823,25.962L107.502,15.624L97.164,14.303L88.924,7.929L80.685,14.303L70.269,15.624L69.025,25.962L62.651,34.202L69.025,42.441L70.347,52.857L80.685,54.101L88.924,60.475Z"
                                          fill-rule="nonzero"/>
                                </g>
                            </g>
                        </g>

                    </svg>


                </div>

            </div>
        </div>
    </section>

    {{-- ── BODY ── --}}
    <div class="ic-body">
        <div class="container">


            {{-- Zertifikat --}}
            <div style="margin-top:32px;">
                <div class="ic-sh">PoP Zertifikat</div>
                <div class="ic-cert-wrap">
                    <div id="ic-cert-img">
                        <span style="color:#ccc;font-size:12px;">Lädt…</span>
                    </div>
                    <div class="ic-cert-sidebar">
                        <div>
                            <div class="ic-cert-sidebar-title">IncluCert</div>
                            <div class="ic-cert-sidebar-sub">
                                Proof of Progress in Digital Accessibility<br>
                                Ausgestellt für <strong>{{ $company->name }}</strong><br>
                                Stand: {{ $metrics['observation_end']->format('d.m.Y') }}
                            </div>
                        </div>
                        <a href="{{ $certUrl }}/pdf" target="_blank" class="ic-cert-dl-btn">
                            ↓ PDF herunterladen
                        </a>
                        <a href="{{ url('/inclucert/' . $company->ulid . '/urls') }}" class="ic-cert-url-btn">
                            📋 Überwachte Seiten
                        </a>
                        @if($company->web)
                            <a href="{{ $company->web }}" target="_blank" class="ic-cert-url-btn">
                                🌐 Website besuchen
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <p>
            <div class="ic-note">
                Score basierend auf <strong>{{ $metrics['current_urls'] }} repräsentativen Seiten</strong> nach WCAG 2.1 (103 automatische Prüfregeln ≈ 30–40% aller WCAG-Kriterien). ·
                <a href="{{ url('/inclucert/' . $company->ulid . '/urls') }}">Alle überwachten Seiten ansehen →</a>
            </div>

            </p>
            {{-- CTA --}}
            <div class="ic-cta-strip">
                <div class="ic-cta-inner">
                    <div class="row align-items-center">
                        <div class="col-md-8 mb-3 mb-md-0">
                            <h3>Auch Ihre Website <em>kontinuierlich überwachen?</em></h3>
                            <p>IncluCert ist Teil des Barrierefreiheits-Monitorings von aktion-barrierefrei.org — automatische WCAG-Scans, Fortschrittsdokumentation und öffentlicher Nachweis.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="https://aktion-barrierefrei.org" target="_blank" class="ic-cta-link">
                                Jetzt informieren →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            fetch('/inclucert/{{ $company->ulid }}/image')
                .then(r => r.json())
                .then(d => {
                    document.getElementById('ic-cert-img').innerHTML =
                        `<img src="${d.image}" alt="IncluCert Zertifikat {{ $company->name }}">`;
                })
                .catch(() => {
                    document.getElementById('ic-cert-img').innerHTML =
                        `<div style="padding:24px;text-align:center;">
                <a href="/inclucert/{{ $company->ulid }}/pdf" target="_blank" style="color:#178bff;font-size:13px;">PDF direkt öffnen →</a>
             </div>`;
                });
        </script>
    @endpush

</x-page-layout>
