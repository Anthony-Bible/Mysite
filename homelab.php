<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Homelab Architecture - Anthony Bible">
    <meta name="author" content="Anthony Bible">

    <title>Homelab Architecture - Anthony Bible</title>

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
    <script>mermaid.initialize({startOnLoad:true});</script>

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
                    <li class="nav-item active"><a class="nav-link active" aria-current="page" href="/homelab.php">Homelab</a></li>
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
                        <h1 class="name">Homelab Architecture</h1>
                        <hr class="star-light">
                        <span class="skills">Infrastructure as Code - Kubernetes - Automation</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Architecture Section -->
    <section id="architecture">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>System Overview</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mermaid text-center">
graph TD
    Internet((Internet)) --> Traefik[Traefik Ingress]
    Traefik --> CertManager[Cert-Manager]
    Traefik --> K3sCluster[K3s Cluster]
    subgraph K3s Cluster
        App1[Application 1]
        App2[Application 2]
    end
    CertManager --> LetsEncrypt[Let's Encrypt]
    K3sCluster --> Storage[Distributed Storage]
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-lg-6">
                    <h3>Kubernetes (K3s)</h3>
                    <p>My homelab is built on a lightweight K3s cluster, providing a robust platform for container orchestration. This allows for seamless deployment and scaling of various services while maintaining low resource overhead.</p>
                </div>
                <div class="col-lg-6">
                    <h3>Traffic Management</h3>
                    <p>Traefik serves as the primary ingress controller, handling SSL termination and routing. Integrated with Cert-Manager, it automatically provisions and renews Let's Encrypt certificates, ensuring all services are secured by default.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center" style="margin-top: 30px;">
                    <p>This architecture embodies SRE principles by prioritizing automation, observability, and reproducible deployments through GitOps workflows.</p>
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