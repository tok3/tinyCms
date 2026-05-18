<x-page-layout>

    @php
        $trendKey    = $metrics['trend_diff'] > 3 ? 'up' : ($metrics['trend_diff'] < -3 ? 'down' : 'flat');
        $trendColor  = $trendKey === 'up' ? '#1a9e3f' : ($trendKey === 'down' ? '#d42b2b' : '#888');
    @endphp

    <style>
        /* ── IncluCert URL List Page ─────────────────────────────────────────────── */
        .icu-header {
            background: linear-gradient(150deg, #010314 0%, #021030 50%, #010a22 100%);
            padding: 40px 0 52px;
            padding-top: calc(var(--navbar-height, 64px) + 40px);
            position: relative;
            overflow: hidden;
        }
        .icu-header::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,.03) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }
        .icu-header-z { position: relative; z-index: 2; }

        .icu-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 600;
            color: rgba(255,255,255,.4);
            text-decoration: none;
            margin-bottom: 20px;
            transition: color .15s;
        }
        .icu-back:hover { color: rgba(255,255,255,.75); }
        .icu-back:hover { text-decoration: none; }

        .icu-header h1 {
            font-size: clamp(1.3rem, 3vw, 1.9rem);
            font-weight: 900;
            color: #fff;
            letter-spacing: -.02em;
            margin-bottom: 4px;
            line-height: 1.2;
        }
        .icu-header-sub {
            font-size: 13px;
            color: rgba(255,255,255,.38);
            margin-bottom: 0;
        }

        /* Stats pills in header */
        .icu-stats-row {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .icu-stat-pill {
            display: flex;
            align-items: baseline;
            gap: 6px;
        }
        .icu-stat-val {
            font-size: 1.4rem;
            font-weight: 900;
            color: #fff;
            letter-spacing: -.02em;
            line-height: 1;
        }
        .icu-stat-lbl {
            font-size: 11px;
            color: rgba(255,255,255,.35);
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        .icu-stat-gold { background: linear-gradient(180deg,#f7d37a,#d4a62a); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }

        /* ── Body ─────────────────────────────────────────────────────────────────── */
        .icu-body { padding: 32px 0 60px; }

        /* Search + controls bar */
        .icu-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }
        .icu-search-wrap {
            position: relative;
            flex: 1;
            min-width: 200px;
            max-width: 360px;
        }
        .icu-search-wrap svg {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            color: #bbb;
            width: 14px;
            height: 14px;
            pointer-events: none;
        }
        .icu-search {
            width: 100%;
            padding: 8px 12px 8px 32px;
            border: 1px solid rgba(0,0,0,.1);
            border-radius: 8px;
            font-size: 13px;
            background: #fff;
            color: #333;
            outline: none;
            transition: border-color .15s;
        }
        .icu-search:focus { border-color: rgba(23,139,255,.35); }

        .icu-count {
            font-size: 12px;
            color: #999;
            white-space: nowrap;
        }

        /* Table */
        .icu-table-wrap {
            background: #fff;
            border: 1px solid rgba(0,0,0,.07);
            border-radius: 12px;
            overflow: hidden;
        }
        .icu-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        .icu-table thead th {
            padding: 11px 14px;
            text-align: left;
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
            color: #999;
            background: #fafbfc;
            border-bottom: 1px solid rgba(0,0,0,.07);
            white-space: nowrap;
            cursor: pointer;
            user-select: none;
            transition: color .15s;
        }
        .icu-table thead th:hover { color: #555; }
        .icu-table thead th.sort-asc::after  { content: ' ↑'; color: #178bff; }
        .icu-table thead th.sort-desc::after { content: ' ↓'; color: #178bff; }

        .icu-table tbody tr {
            border-bottom: 1px solid rgba(0,0,0,.05);
            transition: background .1s;
        }
        .icu-table tbody tr:last-child { border-bottom: none; }
        .icu-table tbody tr:hover { background: #f8faff; }

        .icu-table td {
            padding: 11px 14px;
            vertical-align: middle;
            color: #333;
        }

        /* URL cell */
        .icu-url-cell {
            max-width: 340px;
        }
        .icu-url-link {
            display: block;
            font-size: 12.5px;
            color: #1a1f36;
            text-decoration: none;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 500;
            transition: color .15s;
        }
        .icu-url-link:hover { color: #178bff; }

        /* Errors badge */
        .icu-err {
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 6px;
            min-width: 28px;
            text-align: center;
        }
        .icu-err-none  { background: #f0fff4; color: #1a9e3f; }
        .icu-err-low   { background: #fff8e6; color: #c8880a; }
        .icu-err-mid   { background: #fff2f0; color: #d45b2b; }
        .icu-err-high  { background: #fff0f0; color: #d42b2b; }
        .icu-err-null  { background: #f5f5f5; color: #bbb; font-weight: 400; font-size: 11px; }

        /* Trend */
        .icu-trend { font-size: 14px; font-weight: 700; }
        .icu-trend-up   { color: #1a9e3f; }
        .icu-trend-down { color: #d42b2b; }
        .icu-trend-flat { color: #ccc; }

        /* Date */
        .icu-date { font-size: 12px; color: #999; white-space: nowrap; }

        /* Scan days */
        .icu-scans { font-size: 12px; color: #777; }

        /* Empty state */
        .icu-empty {
            text-align: center;
            padding: 48px 20px;
            color: #bbb;
            font-size: 13px;
        }

        /* Info card */
        .icu-info {
            background: #f2f6ff;
            border: 1px solid rgba(23,139,255,.1);
            border-radius: 10px;
            padding: 14px 18px;
            font-size: 12px;
            color: #4a5a8a;
            line-height: 1.6;
            margin-top: 16px;
        }
        .icu-info strong { color: #2a3a6a; }

        /* Pagination info */
        .icu-pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 14px;
            background: #fafbfc;
            border-top: 1px solid rgba(0,0,0,.06);
            font-size: 11px;
            color: #aaa;
        }
    </style>

    {{-- ── HEADER ── --}}
    <section class="icu-header">
        <div class="container icu-header-z">

            <a href="{{ $certUrl }}" class="icu-back">
                ← Zurück zum Nachweis
            </a>

            <h1>Überwachte Seiten</h1>
            <p class="icu-header-sub">
                {{ $company->name }} · WCAG 2.1 · Stand {{ $metrics['observation_end']->format('d.m.Y') }}
            </p>

            <div class="icu-stats-row">
                <div class="icu-stat-pill">
                    <span class="icu-stat-val icu-stat-gold">{{ $metrics['current_score'] }}</span>
                    <span class="icu-stat-lbl">/ 100 Score</span>
                </div>
                <div class="icu-stat-pill">
                    <span class="icu-stat-val">{{ $urls->count() }}</span>
                    <span class="icu-stat-lbl">Seiten</span>
                </div>
                <div class="icu-stat-pill">
                    <span class="icu-stat-val" style="color:#d42b2b;">{{ $metrics['current_errors'] }}</span>
                    <span class="icu-stat-lbl">Fehler gesamt</span>
                </div>
                <div class="icu-stat-pill">
                    <span class="icu-stat-val" style="color:#1a9e3f;">{{ $metrics['activity_fixed_total'] }}</span>
                    <span class="icu-stat-lbl">Behoben</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ── BODY ── --}}
    <div class="icu-body">
        <div class="container">

            {{-- Controls --}}
            <div class="icu-controls">
                <div class="icu-search-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                    </svg>
                    <input type="text" class="icu-search" id="icu-search" placeholder="URL suchen…" autocomplete="off">
                </div>
                <span class="icu-count" id="icu-count">{{ $urls->count() }} Seiten</span>
            </div>

            {{-- Table --}}
            <div class="icu-table-wrap">
                <table class="icu-table" id="icu-table">
                    <thead>
                    <tr>
                        <th data-col="url">URL</th>
                        <th data-col="errors" class="sort-asc">Fehler aktuell</th>
                        <th data-col="trend">Tendenz</th>
                        <th data-col="last_scan">Letzter Scan</th>
                        <th data-col="first_scan">Im Monitoring seit</th>
                        <th data-col="scan_days">Scan-Tage</th>
                    </tr>
                    </thead>
                    <tbody id="icu-tbody">
                    @foreach($urls as $row)
                        @php
                            $err = $row->current_errors;
                            $errClass = is_null($err) ? 'icu-err-null' :
                                        ($err == 0 ? 'icu-err-none' :
                                        ($err <= 5 ? 'icu-err-low' :
                                        ($err <= 20 ? 'icu-err-mid' : 'icu-err-high')));
                            $errLabel = is_null($err) ? '–' : $err;

                            $trendIcon  = $row->trend === 'up' ? '↗' : ($row->trend === 'down' ? '↘' : '→');
                            $trendClass = 'icu-trend-' . $row->trend;
                            $trendTitle = $row->trend === 'up' ? 'verbessert' : ($row->trend === 'down' ? 'verschlechtert' : 'stabil');

                            $lastScan  = $row->last_scan  ? \Carbon\Carbon::parse($row->last_scan)->format('d.m.Y') : '–';
                            $firstScan = $row->first_scan ? \Carbon\Carbon::parse($row->first_scan)->format('d.m.Y') : '–';
                        @endphp
                        <tr
                            data-url="{{ $row->url }}"
                            data-errors="{{ is_null($err) ? 9999 : $err }}"
                            data-trend="{{ $row->trend }}"
                            data-last="{{ $row->last_scan ?? '' }}"
                            data-first="{{ $row->first_scan ?? '' }}"
                            data-days="{{ $row->scan_days ?? 0 }}">
                            <td class="icu-url-cell">
                                <a href="{{ $row->url }}" target="_blank" class="icu-url-link" title="{{ $row->url }}">
                                    {{ $row->url }}
                                </a>
                            </td>
                            <td>
                                <span class="icu-err {{ $errClass }}">{{ $errLabel }}</span>
                            </td>
                            <td>
                            <span class="icu-trend {{ $trendClass }}" title="{{ $trendTitle }}">
                                {{ $trendIcon }} {{ $trendTitle }}
                            </span>
                            </td>
                            <td><span class="icu-date">{{ $lastScan }}</span></td>
                            <td><span class="icu-date">{{ $firstScan }}</span></td>
                            <td><span class="icu-scans">{{ $row->scan_days ?? '–' }}×</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="icu-pagination">
                    <span id="icu-visible-count">{{ $urls->count() }} von {{ $urls->count() }} Seiten</span>
                    <span>Sortierbar per Klick auf Spaltenheader</span>
                </div>
            </div>

            {{-- Info --}}
            <div class="icu-info">
                <strong>Transparenz-Hinweis:</strong>
                Diese Liste zeigt alle {{ $urls->count() }} Seiten die im aktiven Monitoring für <strong>{{ $company->name }}</strong> erfasst sind.
                Fehler werden nach WCAG 2.1 (103 automatische Prüfregeln) ermittelt. Seiten ohne Fehlerwert wurden noch nicht nach WCAG 2.1 gescannt.
                Die Tendenz zeigt die Veränderung seit Beginn des Monitorings.
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            (function() {
                const tbody   = document.getElementById('icu-tbody');
                const search  = document.getElementById('icu-search');
                const count   = document.getElementById('icu-count');
                const visCount = document.getElementById('icu-visible-count');
                const headers = document.querySelectorAll('#icu-table thead th[data-col]');
                const total   = {{ $urls->count() }};

                let sortCol = 'errors';
                let sortDir = 'asc';

                // ── Search ────────────────────────────────────────────────────────────
                search.addEventListener('input', function() {
                    const q = this.value.toLowerCase().trim();
                    let visible = 0;
                    tbody.querySelectorAll('tr').forEach(tr => {
                        const url = tr.dataset.url.toLowerCase();
                        const show = !q || url.includes(q);
                        tr.style.display = show ? '' : 'none';
                        if (show) visible++;
                    });
                    count.textContent = visible + ' Seiten';
                    visCount.textContent = visible + ' von ' + total + ' Seiten';
                });

                // ── Sort ──────────────────────────────────────────────────────────────
                headers.forEach(th => {
                    th.addEventListener('click', function() {
                        const col = this.dataset.col;
                        if (sortCol === col) {
                            sortDir = sortDir === 'asc' ? 'desc' : 'asc';
                        } else {
                            sortCol = col;
                            sortDir = 'asc';
                        }

                        headers.forEach(h => h.classList.remove('sort-asc', 'sort-desc'));
                        this.classList.add('sort-' + sortDir);

                        const rows = Array.from(tbody.querySelectorAll('tr'));
                        rows.sort((a, b) => {
                            let av, bv;
                            switch(col) {
                                case 'url':
                                    av = a.dataset.url;
                                    bv = b.dataset.url;
                                    return sortDir === 'asc'
                                        ? av.localeCompare(bv)
                                        : bv.localeCompare(av);
                                case 'errors':
                                    av = parseInt(a.dataset.errors);
                                    bv = parseInt(b.dataset.errors);
                                    break;
                                case 'trend':
                                    const tOrder = {up:0, flat:1, down:2};
                                    av = tOrder[a.dataset.trend] ?? 1;
                                    bv = tOrder[b.dataset.trend] ?? 1;
                                    break;
                                case 'last_scan':
                                    av = a.dataset.last || '';
                                    bv = b.dataset.last || '';
                                    return sortDir === 'asc'
                                        ? av.localeCompare(bv)
                                        : bv.localeCompare(av);
                                case 'first_scan':
                                    av = a.dataset.first || '';
                                    bv = b.dataset.first || '';
                                    return sortDir === 'asc'
                                        ? av.localeCompare(bv)
                                        : bv.localeCompare(av);
                                case 'scan_days':
                                    av = parseInt(a.dataset.days);
                                    bv = parseInt(b.dataset.days);
                                    break;
                                default:
                                    return 0;
                            }
                            return sortDir === 'asc' ? av - bv : bv - av;
                        });

                        rows.forEach(r => tbody.appendChild(r));
                    });
                });

            })();
        </script>
    @endpush

</x-page-layout>
