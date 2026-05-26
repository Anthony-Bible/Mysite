<?php http_response_code(404); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="404 - Page not found. Anthony Bible - Site Reliability Engineer.">
    <meta name="author" content="Anthony Bible">
    <meta name="robots" content="noindex">

    <title>404 / Route Not Found - Anthony Bible</title>

    <link rel="stylesheet" href="/css/style.css?v=bs5b">

    <script async src="https://use.fontawesome.com/a8983b99ef.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        header.incident-hero {
            background: linear-gradient(135deg, #2C3E50 0%, #18BC9C 100%);
            padding-top: 80px;
            padding-bottom: 60px;
        }
        header.incident-hero .container { padding-top: 60px; padding-bottom: 20px; }
        .status-strip {
            background: #c0392b;
            color: #fff;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85em;
            letter-spacing: 1px;
            padding: 8px 0;
            text-align: center;
            border-bottom: 2px solid #922b21;
        }
        .status-strip .dot {
            display: inline-block;
            width: 8px; height: 8px;
            background: #fff;
            border-radius: 50%;
            margin-right: 6px;
            animation: blink 1.2s infinite;
            vertical-align: middle;
        }
        @keyframes blink { 0%, 49% { opacity: 1; } 50%, 100% { opacity: 0.25; } }

        .err-code {
            font-family: 'JetBrains Mono', monospace;
            font-size: 9em;
            font-weight: 700;
            line-height: 1;
            margin: 0;
            color: #fff;
            text-shadow: 0 4px 30px rgba(0,0,0,0.25);
        }
        .err-tag {
            font-family: 'JetBrains Mono', monospace;
            color: rgba(255,255,255,0.85);
            letter-spacing: 1px;
            margin-top: 10px;
        }
        @media (min-width: 768px) {
            .err-code { font-size: 14em; }
        }

        section.postmortem { padding: 70px 0; background: #f8f9fa; }
        section.postmortem h2 { font-size: 2.4em; }

        .incident-card {
            background: #fff;
            border: 1px solid #e2e6ea;
            border-left: 5px solid #18BC9C;
            border-radius: 4px;
            padding: 25px 30px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.04);
        }
        .incident-card h4 {
            font-family: 'JetBrains Mono', monospace;
            color: #2C3E50;
            margin-bottom: 18px;
            font-size: 0.95em;
            letter-spacing: 1px;
        }
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 16px;
        }
        .meta-grid .item .k {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.7em;
            color: #7a8896;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        .meta-grid .item .v {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.05em;
            color: #2C3E50;
            font-weight: 700;
        }
        .meta-grid .item .v.sev { color: #c0392b; }
        .meta-grid .item .v.ok { color: #18BC9C; }

        .timeline { list-style: none; padding: 0; margin: 0; }
        .timeline li {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9em;
            padding: 6px 0;
            border-bottom: 1px dashed #eef0f2;
            color: #4a5762;
        }
        .timeline li:last-child { border-bottom: 0; }
        .timeline li .t { color: #18BC9C; margin-right: 10px; }
        .timeline li .lvl {
            display: inline-block;
            min-width: 50px;
            font-weight: 700;
            margin-right: 8px;
        }
        .timeline li .lvl.warn { color: #e67e22; }
        .timeline li .lvl.err  { color: #c0392b; }
        .timeline li .lvl.info { color: #2980b9; }
        .timeline li .lvl.ok   { color: #18BC9C; }

        .agent-callout {
            background: #2C3E50;
            color: #ecf0f1;
            border-radius: 4px;
            padding: 22px 26px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9em;
            line-height: 1.55;
            position: relative;
        }
        .agent-callout::before {
            content: "● agentic-rca-assistant";
            position: absolute;
            top: -10px; left: 18px;
            background: #18BC9C;
            color: #fff;
            font-size: 0.7em;
            padding: 3px 10px;
            border-radius: 3px;
            letter-spacing: 1px;
        }
        .agent-callout .label { color: #18BC9C; }
        .agent-callout .confidence {
            display: inline-block;
            background: rgba(24,188,156,0.15);
            color: #18BC9C;
            padding: 1px 8px;
            border-radius: 3px;
            margin-left: 6px;
        }

        .term {
            background: #1a242f;
            color: #ecf0f1;
            border-radius: 4px;
            padding: 22px 26px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.82em;
            line-height: 1.6;
            overflow-x: auto;
            white-space: pre;
            margin: 20px 0 0;
        }
        .term .prompt { color: #18BC9C; }
        .term .cmd { color: #ecf0f1; }
        .term .col-head { color: #7a8896; }
        .term a { color: #ecf0f1; text-decoration: none; border-bottom: 1px dotted rgba(24,188,156,0.5); }
        .term a:hover { color: #18BC9C; }
        .term .running { color: #18BC9C; }
        .term .notfound { color: #c0392b; }

        .resolve-row { margin-top: 35px; }
        .resolve-row .btn { margin: 5px; }

        .req-path {
            display: inline-block;
            background: rgba(255,255,255,0.12);
            color: #fff;
            padding: 4px 12px;
            border-radius: 3px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.95em;
            margin-top: 16px;
            word-break: break-all;
            max-width: 100%;
        }
    </style>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>

<body id="page-top" class="index">

    <div class="status-strip">
        <span class="dot"></span> SEV-4 / PAGE_NOT_FOUND / on-call: anthony@anthony.bible
    </div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-expand-md navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/index.php#page-top">Anthony Bible</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/index.php#platform">Platform</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.php#foundations">Foundations</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.php#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.php#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.abible.dev">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cluster.php">Cluster</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Incident Hero -->
    <header class="incident-hero">
        <div class="container text-center">
            <p class="err-code">404</p>
            <hr class="star-light">
            <h1 class="err-tag">ROUTE NOT FOUND IN CLUSTER</h1>
            <?php
            $req = $_SERVER['REQUEST_URI'] ?? '/unknown';
            $req = htmlspecialchars(strtok($req, '?'), ENT_QUOTES, 'UTF-8');
            if (strlen($req) > 120) $req = substr($req, 0, 117) . '...';
            ?>
            <div><span class="req-path">GET <?php echo $req; ?> &rarr; 404</span></div>
        </div>
    </header>

    <!-- Postmortem -->
    <section class="postmortem">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Incident Postmortem</h2>
                    <hr class="star-primary">
                    <p class="lead text-muted">No prod traffic was harmed in the making of this 404.</p>
                </div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-6">
                    <div class="incident-card">
                        <h4># SUMMARY</h4>
                        <div class="meta-grid">
                            <div class="item">
                                <div class="k">Severity</div>
                                <div class="v sev">SEV-4</div>
                            </div>
                            <div class="item">
                                <div class="k">Duration</div>
                                <div class="v">&lt; 1 ms</div>
                            </div>
                            <div class="item">
                                <div class="k">Customer Impact</div>
                                <div class="v ok">1 user (you)</div>
                            </div>
                            <div class="item">
                                <div class="k">SLO Burn</div>
                                <div class="v ok">0.00%</div>
                            </div>
                            <div class="item">
                                <div class="k">Pages Fired</div>
                                <div class="v">1</div>
                            </div>
                            <div class="item">
                                <div class="k">Status</div>
                                <div class="v ok">Resolved</div>
                            </div>
                        </div>
                    </div>

                    <div class="incident-card">
                        <h4># TIMELINE</h4>
                        <ul class="timeline">
                            <li><span class="t">T+0.0s</span> <span class="lvl info">INFO</span> Request entered ingress-nginx</li>
                            <li><span class="t">T+0.1ms</span> <span class="lvl info">INFO</span> Routed to apache pod <code>mysite-7c4f</code></li>
                            <li><span class="t">T+0.3ms</span> <span class="lvl warn">WARN</span> No matching route in mux table</li>
                            <li><span class="t">T+0.4ms</span> <span class="lvl err">ERROR</span> ErrorDocument 404 fired</li>
                            <li><span class="t">T+0.5ms</span> <span class="lvl ok">OK</span> This page rendered. You are here.</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="agent-callout">
                        <div><span class="label">[finding]</span> The requested route is not defined in this cluster.<span class="confidence">confidence: 0.97</span></div>
                        <div style="margin-top: 10px;"><span class="label">[hypothesis]</span> Likely causes:</div>
                        <div style="padding-left: 18px;">
                            &middot; Typo in URL (most probable)<br>
                            &middot; Stale link from an old version of the site<br>
                            &middot; Crawler exploring routes that never existed<br>
                            &middot; You are an agent without an api-catalog entry &mdash; try <code style="color:#18BC9C;">/.well-known/api-catalog</code>
                        </div>
                        <div style="margin-top: 12px;"><span class="label">[recommendation]</span> Pick one of the live routes below. No PagerDuty escalation required.</div>
                    </div>

                    <?php
                    $rawSlug = ltrim(strtok($_SERVER['REQUEST_URI'] ?? '/', '?'), '/') ?: 'requested-route';
                    $slug = htmlspecialchars(substr($rawSlug, 0, 24), ENT_QUOTES, 'UTF-8');
                    $slugPad = str_repeat(' ', max(1, 16 - strlen($slug)));
                    ?>
<pre class="term"><span class="prompt">$</span> <span class="cmd">kubectl get pages -n anthony.bible</span>
<span class="col-head">NAME             READY   STATUS     AGE   ROUTE</span>
home             1/1     <span class="running">Running</span>    8y    <a href="/">/</a>
platform         1/1     <span class="running">Running</span>    8y    <a href="/index.php#platform">/index.php#platform</a>
about            1/1     <span class="running">Running</span>    8y    <a href="/index.php#about">/index.php#about</a>
contact          1/1     <span class="running">Running</span>    8y    <a href="/index.php#contact">/index.php#contact</a>
cluster          1/1     <span class="running">Running</span>    1y    <a href="/cluster.php">/cluster.php</a>
blog             1/1     <span class="running">Running</span>    5y    <a href="https://www.abible.dev">abible.dev</a>
github           1/1     <span class="running">Running</span>    10y   <a href="https://github.com/Anthony-Bible">github.com/Anthony-Bible</a>
<?php echo $slug . $slugPad; ?>0/1     <span class="notfound">NotFound</span>   0s    &lt;none&gt;</pre>
                </div>
            </div>

            <div class="row resolve-row">
                <div class="col-lg-12 text-center">
                    <a href="/" class="btn btn-success btn-lg"><i class="fa fa-home"></i> Back to Home</a>
                    <a href="https://www.abible.dev" class="btn btn-outline btn-lg" style="color:#2C3E50;border-color:#2C3E50;"><i class="fa fa-rss"></i> Read the Blog</a>
                    <a href="https://github.com/Anthony-Bible" class="btn btn-outline btn-lg" style="color:#2C3E50;border-color:#2C3E50;"><i class="fa fa-github"></i> Browse Projects</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>St. George, Utah</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="https://www.linkedin.com/in/anthonybible/" class="btn-social btn-outline"><span class="sr-only">LinkedIn</span><i class="fa fa-fw fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="https://github.com/Anthony-Bible" class="btn-social btn-outline"><span class="sr-only">GitHub</span><i class="fa fa-fw fa-github"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Mini Bio</h3>
                        <p>Site Reliability Engineer focusing on platform automation and cloud-native architecture.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Anthony Bible <?php echo date("Y"); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
