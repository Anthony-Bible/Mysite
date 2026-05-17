<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Production Kubernetes Cluster Architecture - Anthony Bible">
    <meta name="author" content="Anthony Bible">

    <title>Cluster Architecture - Anthony Bible</title>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/style.css?v=bs5b">

    <!-- Custom Fonts -->
    <script async src="https://use.fontawesome.com/a8983b99ef.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- jQuery (for shared js/script.js) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Mermaid.js -->
    <script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>
    <script>mermaid.initialize({startOnLoad:true, theme:'default', flowchart:{htmlLabels:true, curve:'basis'}});</script>

    <style>
        .layer-section { margin-top: 60px; }
        .layer-section h3 { margin-bottom: 10px; }
        .layer-section .lede { color: #555; margin-bottom: 25px; }
        .mermaid { background: #fafafa; border: 1px solid #eee; border-radius: 6px; padding: 20px; }
        .stat-pill {
            display: inline-block;
            background: #18bc9c;
            color: #fff;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.85em;
            margin: 2px 4px;
        }
        .stat-row { margin: 20px 0 10px; }
        .ns-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 12px; }
        .ns-card { border: 1px solid #e5e5e5; border-radius: 6px; padding: 12px 14px; background: #fff; }
        .ns-card h5 { margin: 0 0 6px; font-size: 0.95em; color: #2c3e50; }
        .ns-card .muted { color: #888; font-size: 0.82em; }
    </style>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-expand-md navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php#page-top">Anthony Bible</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php#platform">Platform</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#foundations">Foundations</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.abible.dev">Blog</a></li>
                    <li class="nav-item active"><a class="nav-link active" aria-current="page" href="/cluster.php">Cluster</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <h1 class="name">Cluster Architecture</h1>
                        <hr class="star-light">
                        <span class="skills">GKE &middot; GitOps &middot; Service Mesh &middot; This Site Runs Here</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Overview -->
    <section id="architecture">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>What Actually Runs This Site</h2>
                    <hr class="star-primary">
                    <p>This page is served from a production GKE cluster in <code>us-central1-f</code>. The layout below is the real one: ingress, mesh, GitOps, workloads, data.</p>
                    <div class="stat-row">
                        <span class="stat-pill">3 &times; t2d-standard-2 nodes</span>
                        <span class="stat-pill">GKE v1.35</span>
                        <span class="stat-pill">19 namespaces</span>
                        <span class="stat-pill">ArgoCD-managed</span>
                        <span class="stat-pill">Linkerd mTLS</span>
                    </div>
                </div>
            </div>

            <!-- Layer 1: Topology -->
            <div class="row layer-section">
                <div class="col-lg-12">
                    <h3>1. Topology: GKE on GCP</h3>
                    <p class="lede">One regional node pool in <code>us-central1-f</code>. The nodes are small. The layers on top do the work.</p>
                    <div class="mermaid">
graph LR
    User((Internet)) --> GCLB[Google Cloud<br/>Network LB]
    GCLB --> Pool
    subgraph Pool[GKE Node Pool: prod-pool]
        N1[node-28uu<br/>t2d-standard-2<br/>2 vCPU / 8 GiB]
        N2[node-h2zr<br/>t2d-standard-2<br/>2 vCPU / 8 GiB]
        N3[node-xj4t<br/>t2d-standard-2<br/>2 vCPU / 8 GiB]
    end
    Pool -.->|pd-csi| PD[(GCE Persistent<br/>Disks)]
    Pool -.->|cloudsql-proxy| CSQL[(Cloud SQL)]
                    </div>
                </div>
            </div>

            <!-- Layer 2: Edge -->
            <div class="row layer-section">
                <div class="col-lg-12">
                    <h3>2. Edge: Ingress, DNS, TLS</h3>
                    <p class="lede">One LoadBalancer (<code>34.61.118.235</code>) fronts every public hostname. <code>external-dns</code> writes the DNS records. <code>cert-manager</code> renews the Let's Encrypt certs.</p>
                    <div class="mermaid">
graph TD
    Client((HTTPS Client)) --> LB[Cloud LB<br/>34.61.118.235]
    LB --> NGINX[ingress-nginx<br/>Controller]
    NGINX --> H1[anthonybible.com]
    NGINX --> H2[password.exchange<br/>+ 7 aliases]
    NGINX --> H3[endixium.com<br/>+ dev]
    NGINX --> H4[code-agent.anthony.bible]
    CM[cert-manager] -.->|ACME HTTP-01| NGINX
    CM -->|x509| LE{{Let's Encrypt}}
    XDNS[external-dns] -.->|API| GCDNS{{Google Cloud DNS}}
    NGINX -.->|watch Ingress| XDNS
                    </div>
                </div>
            </div>

            <!-- Layer 3: GitOps & Mesh -->
            <div class="row layer-section">
                <div class="col-lg-12">
                    <h3>3. Control Plane: GitOps + Service Mesh</h3>
                    <p class="lede">ArgoCD reconciles cluster state from Git. Linkerd injects sidecars that handle mTLS and emit golden-signal metrics between pods.</p>
                    <div class="mermaid">
graph LR
    Git[(GitHub<br/>manifests)] --> ArgoRepo[argocd-repo-server]
    ArgoRepo --> ArgoApp[argocd-application-controller<br/>StatefulSet]
    ArgoApp -->|apply| K8s[Kubernetes API]
    K8s --> Apps[Workload Pods]
    LinkerdInj[linkerd-proxy-injector] -.->|sidecar| Apps
    Apps <-.->|mTLS| Apps
    LinkerdViz[linkerd-viz<br/>prometheus + tap] -.->|scrape| Apps
                    </div>
                </div>
            </div>

            <!-- Layer 3.5: Real Traffic (Linkerd) -->
            <div class="row layer-section">
                <div class="col-lg-12">
                    <h3>3.5 Real Traffic Flow: Observed by Linkerd</h3>
                    <p class="lede">The edges below come from Linkerd's Prometheus over a 6-hour window. Every line is a flow the mesh saw.</p>
                    <div class="mermaid">
graph LR
    Ingress[ingress-nginx]
    Ingress -->|0.97 rps| Static[mystaticsite]
    Ingress -->|0.87 rps| PwxProd[passwordexchange-prod]
    Ingress -->|0.73 rps| PwxDev[passwordexchange-dev]
    PwxProd -->|HTTP| DbProd[database-prod]
    PwxProd -->|HTTP| EncProd[encryption-prod]
    PwxProd -->|HTTP| EmailProd[email-prod]
    PwxDev -->|HTTP| DbDev[database-dev]
    PwxDev -->|HTTP| EncDev[encryption-dev]
    PwxDev -->|HTTP| EmailDev[email-dev]
    PwxDev -.->|intercept| TM[ambassador<br/>traffic-manager]
    EmailProd -.->|SMTP egress| Ext((SendGrid))
    EmailDev -.->|SMTP egress| Ext
    DbProd -.->|via cloudsql-proxy| CSQL[(Cloud SQL)]
    DbDev -.->|via cloudsql-proxy| CSQL
                    </div>
                    <p class="lede" style="margin-top:20px;">
                        <strong>What the numbers say:</strong> the static marketing site (this one) takes the most ingress hits. <code>passwordexchange</code> is the active app and fans out to its <code>database</code>, <code>encryption</code>, and <code>email</code> microservices over mTLS. Telepresence intercepts the dev variant through <code>traffic-manager</code>, so a local dev session appears in the mesh.
                    </p>
                </div>
            </div>

            <!-- Layer 4: Workloads -->
            <div class="row layer-section">
                <div class="col-lg-12">
                    <h3>4. Workloads</h3>
                    <p class="lede">Most apps run as 2-replica Deployments with <code>dev</code> and <code>prod</code> variants. Two products live in their own namespaces. The rest share <code>default</code>.</p>
                    <div class="ns-grid">
                        <div class="ns-card">
                            <h5>mysite / mystaticsite</h5>
                            <div class="muted">This page. PHP behind nginx-ingress.</div>
                        </div>
                        <div class="ns-card">
                            <h5>passwordexchange</h5>
                            <div class="muted">dev + prod. password.exchange and aliases.</div>
                        </div>
                        <div class="ns-card">
                            <h5>endixium</h5>
                            <div class="muted">endixium-dev / endixium-prod namespaces.</div>
                        </div>
                        <div class="ns-card">
                            <h5>encryption / email / database</h5>
                            <div class="muted">Internal microservices. dev + prod.</div>
                        </div>
                        <div class="ns-card">
                            <h5>runthis-server</h5>
                            <div class="muted">Single-replica utility service.</div>
                        </div>
                        <div class="ns-card">
                            <h5>code-agent</h5>
                            <div class="muted">code-agent.anthony.bible. Scales to zero by default.</div>
                        </div>
                        <div class="ns-card">
                            <h5>omni-tools / rand-images</h5>
                            <div class="muted">Side projects.</div>
                        </div>
                        <div class="ns-card">
                            <h5>ambassador</h5>
                            <div class="muted">Telepresence traffic-manager for local-to-cluster dev.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Layer 5: Data -->
            <div class="row layer-section">
                <div class="col-lg-12">
                    <h3>5. Data and Messaging</h3>
                    <p class="lede">Two stateful services: a managed Cloud SQL instance reached through the official proxy, and a 3-node RabbitMQ cluster on GCE persistent disks.</p>
                    <div class="mermaid">
graph LR
    App[Application Pods]
    App -->|TCP 5432| Proxy[cloudsql-proxy<br/>Deployment]
    Proxy -->|IAM auth| CSQL[(Cloud SQL<br/>Postgres)]
    App -->|AMQP| RMQ
    subgraph RMQ[RabbitMQ Cluster - StatefulSet]
        R0[rabbitmq-server-0]
        R1[rabbitmq-server-1]
        R2[rabbitmq-server-2]
    end
    R0 -.-> PV0[(pd 3Gi)]
    R1 -.-> PV1[(pd 3Gi)]
    R2 -.-> PV2[(pd 3Gi)]
    Op[rabbitmq-cluster-operator] -.->|reconcile| RMQ
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 50px;">
                <div class="col-lg-12 text-center">
                    <p><em>Everything above lives in Git. ArgoCD reconciles it. When the manifests change, the diagram changes.</em></p>
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
                            <li class="list-inline-item"><a href="https://facebook.com/bibleanthony1" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/_anthonybible" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.linkedin.com/in/anthonybible/" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="https://github.com/Anthony-Bible" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a></li>
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
