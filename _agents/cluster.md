# Cluster Architecture — Anthony Bible

Writeup of the Kubernetes cluster that runs anthony.bible and adjacent
services. The canonical HTML version is at
<https://anthony.bible/cluster.php>.

Highlights:

- Kubernetes control plane on bare metal, augmented by AWS for state
  and durable storage.
- GitOps deploys driven from <https://github.com/anthony-bible>.
- Linkerd service mesh, with IAM-scoped pod identities for AWS access.
- External-DNS for hostname management, cert-manager for TLS.

For the full narrative, request the HTML page (browsers get the full
rendering by default; this markdown alternative is offered for agents).
