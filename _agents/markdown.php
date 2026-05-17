<?php
/**
 * Markdown content negotiation for AI agents.
 *
 * Include this file at the very top of an HTML page. If the client sends
 * `Accept: text/markdown` (and does not also accept text/html with equal or
 * higher quality), emit the matching markdown rendering and exit.
 *
 * Browsers send Accept: text/html,... — they never trip this branch.
 */

function agents_wants_markdown(): bool {
    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    if ($accept === '' || stripos($accept, 'text/markdown') === false) {
        return false;
    }
    // Parse Accept into (type => q) pairs.
    $md_q = 0.0;
    $html_q = 0.0;
    $star_q = 0.0;
    foreach (explode(',', $accept) as $part) {
        $part = trim($part);
        if ($part === '') continue;
        $bits = explode(';', $part);
        $type = strtolower(trim(array_shift($bits)));
        $q = 1.0;
        foreach ($bits as $b) {
            $b = trim($b);
            if (stripos($b, 'q=') === 0) {
                $q = (float) substr($b, 2);
            }
        }
        if ($type === 'text/markdown') $md_q = max($md_q, $q);
        if ($type === 'text/html')     $html_q = max($html_q, $q);
        if ($type === '*/*')           $star_q = max($star_q, $q);
    }
    return $md_q > 0 && $md_q >= $html_q && $md_q >= $star_q;
}

function agents_serve_markdown(string $path): void {
    if (!agents_wants_markdown()) return;
    $file = __DIR__ . '/' . basename($path);
    if (!is_file($file)) return;
    $body = file_get_contents($file);
    header('Content-Type: text/markdown; charset=utf-8');
    header('Vary: Accept');
    header('Content-Length: ' . strlen($body));
    header('X-Markdown-Tokens: ' . (int) ceil(strlen($body) / 4));
    echo $body;
    exit;
}
