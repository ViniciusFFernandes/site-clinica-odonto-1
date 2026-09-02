<?php
// index.php — Clínica Odontológica Modelo (conteúdo em config/clinica.php)
$cfg = require __DIR__ . '/config/clinica.php';

function e($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function whats($cfg, $msg = null){
  $msg = $msg ?? $cfg['whatsapp_msg'];
  return 'https://wa.me/' . $cfg['whatsapp_numero'] . '?text=' . rawurlencode($msg);
}

/** Ícones (Lucide) inline como SVG. $class recebe utilitários Tailwind. */
function icon($name, $class = 'size-5'){
  static $map = [
    'sparkles' => '<path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"/><path d="M20 2v4"/><path d="M22 4h-4"/><circle cx="4" cy="20" r="2"/>',
    'anchor' => '<path d="M12 6v16"/><path d="m19 13 2-1a9 9 0 0 1-18 0l2 1"/><path d="M9 11h6"/><circle cx="12" cy="4" r="2"/>',
    'activity' => '<path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"/>',
    'align' => '<rect width="6" height="14" x="4" y="5" rx="2"/><rect width="6" height="10" x="14" y="7" rx="2"/><path d="M17 22v-5"/><path d="M17 7V2"/><path d="M7 22v-3"/><path d="M7 5V2"/>',
    'shield-check' => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
    'clipboard-check' => '<rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/>',
    'stethoscope' => '<path d="M11 2v2"/><path d="M5 2v2"/><path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"/><path d="M8 15a6 6 0 0 0 12 0v-3"/><circle cx="20" cy="10" r="2"/>',
    'tooth' => '<path d="M9 2c-2.8 0-5 2.2-5 5 0 1.2.3 2.5.6 3.6.6 2 1 4 1.2 6 .1 1.3.3 2.6.8 3.8.3.7.9 1.6 1.7 1.6.9 0 1.2-1 1.4-1.8.3-1.4.6-2.9.8-4.3.1-.5.5-.9 1-.9s.9.4 1 .9c.2 1.4.5 2.9.8 4.3.2.8.5 1.8 1.4 1.8.8 0 1.4-.9 1.7-1.6.5-1.2.7-2.5.8-3.8.2-2 .6-4 1.2-6C19.7 9.5 20 8.2 20 7c0-2.8-2.2-5-5-5-1.3 0-2.4.5-3 1-.6-.5-1.7-1-3-1z"/>',
    'heart-handshake' => '<path d="M19.414 14.414C21 12.828 22 11.5 22 9.5a5.5 5.5 0 0 0-9.591-3.676.6.6 0 0 1-.818.001A5.5 5.5 0 0 0 2 9.5c0 2.3 1.5 4 3 5.5l5.535 5.362a2 2 0 0 0 2.879.052 2.12 2.12 0 0 0-.004-3 2.124 2.124 0 1 0 3-3 2.124 2.124 0 0 0 3.004 0 2 2 0 0 0 0-2.828l-1.881-1.882a2.41 2.41 0 0 0-3.409 0l-1.71 1.71a2 2 0 0 1-2.828 0 2 2 0 0 1 0-2.828l2.823-2.762"/>',
    'microscope' => '<path d="M6 18h8"/><path d="M3 22h18"/><path d="M14 22a7 7 0 1 0 0-14h-1"/><path d="M9 14h2"/><path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z"/><path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"/>',
    'sofa' => '<path d="M20 9V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v3"/><path d="M2 16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"/><path d="M4 18v2"/><path d="M20 18v2"/><path d="M12 4v9"/>',
    'star' => '<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/>',
    'phone' => '<path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/>',
    'message-circle' => '<path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"/>',
    'whatsapp' => '<path d="M17.6 6.32A7.85 7.85 0 0 0 12.05 4a7.94 7.94 0 0 0-6.9 11.9L4 20l4.2-1.1a7.9 7.9 0 0 0 3.8.97h.01A7.94 7.94 0 0 0 17.6 6.32M12.05 18.5h-.01a6.6 6.6 0 0 1-3.35-.92l-.24-.14-2.49.65.66-2.43-.16-.25a6.59 6.59 0 1 1 5.59 3.09m3.62-4.93c-.2-.1-1.17-.58-1.35-.64s-.31-.1-.44.1-.51.64-.62.77-.23.15-.43.05a5.4 5.4 0 0 1-1.59-.98 6 6 0 0 1-1.1-1.37c-.11-.2-.01-.3.09-.4s.2-.23.3-.35a1.3 1.3 0 0 0 .2-.34.37.37 0 0 0-.02-.35c-.05-.1-.44-1.07-.6-1.46s-.32-.34-.44-.34l-.38-.01a.73.73 0 0 0-.53.25 2.23 2.23 0 0 0-.69 1.66 3.87 3.87 0 0 0 .81 2.05 8.86 8.86 0 0 0 3.39 3 11 11 0 0 0 1.13.42 2.72 2.72 0 0 0 1.25.08c.38-.06 1.17-.48 1.34-.94a1.65 1.65 0 0 0 .11-.94c-.05-.08-.18-.13-.38-.23"/>',
    'map-pin' => '<path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/>',
    'clock' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
    'navigation' => '<polygon points="3 11 22 2 13 21 11 13 3 11"/>',
    'arrow-right' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
    'arrow-up-right' => '<path d="M7 7h10v10"/><path d="M7 17 17 7"/>',
    'arrow-down' => '<path d="M12 5v14"/><path d="m19 12-7 7-7-7"/>',
    'chevrons' => '<path d="m18 8 4 4-4 4"/><path d="M2 12h20"/><path d="m6 8-4 4 4 4"/>',
    'menu' => '<path d="M4 6h16"/><path d="M4 12h16"/><path d="M4 18h16"/>',
    'x' => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
    'check' => '<path d="M20 6 9 17l-5-5"/>',
    'quote' => '<path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/><path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/>',
    'gem' => '<path d="M6 3h12l4 6-10 13L2 9Z"/><path d="M11 3 8 9l4 13 4-13-3-6"/><path d="M2 9h20"/>',
    'award' => '<path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/>',
    'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
    'camera' => '<path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3"/>',
    'instagram' => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
  ];
  $inner = $map[$name] ?? '';
  return '<svg class="lucide ' . e($class) . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $inner . '</svg>';
}

function stars($class = 'size-4'){
  $s = '';
  for ($i = 0; $i < 5; $i++) $s .= '<svg class="' . e($class) . ' fill-gold text-gold" viewBox="0 0 24 24" aria-hidden="true"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/></svg>';
  return $s;
}

$waLink = whats($cfg);
$mapsQ  = rawurlencode($cfg['maps_query']);
$hasInsta = !empty($cfg['instagram']);

$nav = [
  ['#especialidades', 'Especialidades'],
  ['#diferenciais', 'Diferenciais'],
  ['#resultados', 'Resultados'],
  ['#sobre', 'A Clínica'],
  ['#depoimentos', 'Depoimentos'],
  ['#localizacao', 'Contato'],
];

$ldjson = json_encode([
  '@context' => 'https://schema.org',
  '@graph' => [[
    '@type' => ['Dentist', 'LocalBusiness', 'MedicalBusiness'],
    '@id' => '#clinica',
    'name' => $cfg['clinic'],
    'description' => $cfg['seo_desc'],
    'telephone' => $cfg['phone_raw'],
    'url' => '/',
    'priceRange' => '$$',
    'image' => '/img/hero-sorriso.svg',
    'sameAs' => $hasInsta ? [$cfg['instagram']] : [],
    'medicalSpecialty' => ['Dentistry', 'CosmeticDentistry', 'Orthodontics'],
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => $cfg['address'],
      'addressLocality' => $cfg['city'],
      'addressRegion' => $cfg['state'],
      'addressCountry' => 'BR',
    ],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $cfg['geo_lat'], 'longitude' => $cfg['geo_lng']],
    'aggregateRating' => ['@type' => 'AggregateRating', 'ratingValue' => $cfg['rating_num'], 'reviewCount' => $cfg['reviews'], 'bestRating' => 5],
    'openingHoursSpecification' => [
      ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'], 'opens' => '08:00', 'closes' => '19:00'],
    ],
    'availableService' => array_map(fn($s) => ['@type' => 'MedicalProcedure', 'name' => $s['title']], $cfg['especialidades']),
  ]],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= e($cfg['seo_title']) ?></title>
  <meta name="description" content="<?= e($cfg['seo_desc']) ?>" />
  <meta name="author" content="<?= e($cfg['clinic']) ?>" />
  <meta name="theme-color" content="#2f6571" />
  <link rel="canonical" href="/" />
  <link rel="icon" href="favicon.ico" sizes="48x48" />
  <link rel="icon" href="img/logo.svg" type="image/svg+xml" />
  <link rel="apple-touch-icon" href="img/logo.svg" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="<?= e($cfg['clinic']) ?>" />
  <meta property="og:title" content="<?= e($cfg['seo_title']) ?>" />
  <meta property="og:description" content="<?= e($cfg['seo_desc']) ?>" />
  <meta property="og:image" content="/img/hero-sorriso.svg" />
  <meta property="og:locale" content="pt_BR" />
  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= e($cfg['seo_title']) ?>" />
  <meta name="twitter:description" content="<?= e($cfg['seo_desc']) ?>" />
  <meta name="twitter:image" content="/img/hero-sorriso.svg" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="css/main.css" />
  <script type="application/ld+json"><?= $ldjson ?></script>
</head>
<body class="bg-background text-foreground font-sans antialiased">

<!-- ===== Botão flutuante WhatsApp ===== -->
<a href="<?= e($waLink) ?>" target="_blank" rel="noopener" aria-label="Falar no WhatsApp"
   class="group fixed bottom-5 right-5 z-50 inline-flex items-center gap-2.5 rounded-full bg-whatsapp px-4 py-3.5 text-white shadow-[var(--shadow-lift)] transition-transform hover:scale-105">
  <span class="absolute inset-0 rounded-full bg-whatsapp opacity-60 animate-ping"></span>
  <span class="relative"><?= icon('whatsapp', 'size-6') ?></span>
  <span class="relative hidden pr-1 text-sm font-semibold sm:inline">Agendar</span>
</a>

<!-- ===== Header ===== -->
<header id="siteHeader" class="fixed inset-x-0 top-0 z-40 py-5 transition-all duration-300">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-5 lg:px-8">
    <a href="#top" class="flex items-center gap-3">
      <span class="grid size-11 place-items-center rounded-2xl bg-gradient-to-br from-petrol to-deep text-white shadow-[var(--shadow-soft)]">
        <span data-brand-sig class="font-display text-lg font-semibold tracking-tight text-white"><?= e($cfg['sigla']) ?></span>
      </span>
      <span class="leading-tight">
        <span data-brand class="block font-display text-lg font-semibold tracking-tight text-white">Odonto Modelo</span>
        <span data-brand-sub class="block text-[0.7rem] font-medium uppercase tracking-[0.2em] text-white/60">Estética · Cidade Exemplo</span>
      </span>
    </a>

    <nav class="hidden items-center gap-8 xl:flex">
      <?php foreach ($nav as $n): ?>
        <a data-navlink href="<?= e($n[0]) ?>" class="text-sm font-medium text-white/80 transition-colors hover:text-gold"><?= e($n[1]) ?></a>
      <?php endforeach; ?>
    </nav>

    <div class="flex items-center gap-3">
      <a href="<?= e($waLink) ?>" target="_blank" rel="noopener"
         class="hidden items-center gap-2 rounded-full bg-gold px-5 py-2.5 text-sm font-semibold text-deep shadow-[var(--shadow-soft)] transition-transform hover:scale-[1.04] sm:inline-flex">
        <?= icon('message-circle', 'size-4') ?> Agendar avaliação
      </a>
      <button id="menuToggle" data-menu-btn type="button" aria-label="Abrir menu"
              class="grid size-11 place-items-center rounded-2xl border border-white/25 text-white transition-colors xl:hidden">
        <span data-menu-open><?= icon('menu', 'size-5') ?></span>
        <span data-menu-close class="hidden"><?= icon('x', 'size-5') ?></span>
      </button>
    </div>
  </div>

  <!-- Menu mobile -->
  <div id="mobileMenu" class="mx-5 mt-3 hidden rounded-3xl border border-border bg-background/95 p-4 shadow-[var(--shadow-lift)] backdrop-blur-xl xl:hidden">
    <div class="grid gap-1">
      <?php foreach ($nav as $n): ?>
        <a data-close-menu href="<?= e($n[0]) ?>" class="rounded-2xl px-4 py-3 text-base font-medium text-foreground transition-colors hover:bg-secondary"><?= e($n[1]) ?></a>
      <?php endforeach; ?>
    </div>
    <a href="<?= e($waLink) ?>" target="_blank" rel="noopener"
       class="mt-2 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-whatsapp px-5 py-3.5 text-base font-semibold text-white">
      <?= icon('whatsapp', 'size-5') ?> Falar no WhatsApp
    </a>
  </div>
</header>

<main id="top">

<!-- ===== HERO ===== -->
<section class="relative min-h-screen overflow-hidden bg-deep pt-32 pb-16 lg:pt-40 lg:pb-24">
  <!-- fundo -->
  <div class="pointer-events-none absolute inset-0" aria-hidden="true">
    <div class="absolute inset-0 bg-gradient-hero"></div>
    <div class="absolute -top-32 -right-24 size-[40rem] rounded-full bg-petrol/40 blur-3xl"></div>
    <div class="absolute -bottom-40 -left-24 size-[34rem] rounded-full bg-petroldark/50 blur-3xl"></div>
    <div class="absolute inset-0 opacity-[0.04] [background-image:radial-gradient(circle_at_1px_1px,#fff_1px,transparent_0)] [background-size:26px_26px]"></div>
  </div>

  <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 lg:grid-cols-[1.05fr_0.95fr] lg:gap-10 lg:px-8">
    <!-- Texto -->
    <div class="reveal">
      <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/5 px-4 py-2 text-xs font-medium uppercase tracking-[0.2em] text-gold">
        <span class="size-1.5 rounded-full bg-gold"></span><?= e($cfg['hero_eyebrow']) ?>
      </span>
      <h1 class="mt-6 font-display text-4xl font-semibold leading-[1.05] tracking-tight text-white text-balance sm:text-5xl lg:text-[3.6rem]">
        <?= e($cfg['hero_titulo_1']) ?>
        <span class="block bg-gradient-gold bg-clip-text text-transparent italic"><?= e($cfg['hero_titulo_2']) ?></span>
      </h1>
      <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/70"><?= e($cfg['hero_subtitulo']) ?></p>

      <div class="mt-9 flex flex-col gap-3 sm:flex-row sm:items-center">
        <a href="<?= e($waLink) ?>" target="_blank" rel="noopener"
           class="inline-flex items-center justify-center gap-2 rounded-full bg-gold px-7 py-4 text-base font-semibold text-deep shadow-[var(--shadow-lift)] transition-transform hover:scale-[1.03]">
          <?= icon('sparkles', 'size-5') ?> Agendar avaliação
        </a>
        <a href="<?= e($waLink) ?>" target="_blank" rel="noopener"
           class="inline-flex items-center justify-center gap-2 rounded-full border border-white/25 bg-white/5 px-7 py-4 text-base font-semibold text-white transition-colors hover:bg-white/10">
          <?= icon('whatsapp', 'size-5') ?> Falar no WhatsApp
        </a>
      </div>

      <!-- Google rating -->
      <div class="mt-10 inline-flex items-center gap-4 rounded-2xl border border-white/12 bg-white/5 px-5 py-4 backdrop-blur">
        <div class="flex flex-col items-center">
          <span class="font-display text-2xl font-semibold leading-none text-white"><?= e($cfg['rating']) ?></span>
          <div class="mt-1 flex gap-0.5"><?= stars('size-3.5') ?></div>
        </div>
        <span class="h-10 w-px bg-white/15"></span>
        <div class="leading-tight">
          <span class="block text-sm font-semibold text-white">Avaliação no Google</span>
          <span class="block text-xs text-white/55"><?= e($cfg['reviews']) ?> avaliações de pacientes</span>
        </div>
      </div>
    </div>

    <!-- Imagem -->
    <div class="reveal relative lg:pl-6">
      <div class="relative overflow-hidden rounded-[2.5rem] rounded-tr-[6rem] border border-white/12 shadow-[var(--shadow-lift)]">
        <img src="img/hero-sorriso.svg" width="720" height="820" alt="Sorriso saudável e bonito — Clínica Odontológica Modelo"
             class="h-full w-full object-cover" fetchpriority="high" />
        <div class="absolute inset-0 bg-gradient-to-t from-deep/60 via-transparent to-transparent"></div>
      </div>
      <!-- badge flutuante -->
      <div class="absolute -bottom-6 -left-4 flex items-center gap-3 rounded-2xl border border-white/12 bg-deep/90 px-5 py-4 shadow-[var(--shadow-lift)] backdrop-blur-xl sm:-left-8">
        <span class="grid size-11 place-items-center rounded-xl bg-gold/15 text-gold"><?= icon('gem', 'size-6') ?></span>
        <div class="leading-tight">
          <span class="block text-sm font-semibold text-white">Odontologia Estética</span>
          <span class="block text-xs text-white/55">tratamentos personalizados</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Faixa de especialidades (marquee) ===== -->
<div class="border-y border-border bg-petrol">
  <div class="marquee py-4 text-white/90">
    <div class="marquee__track font-display text-lg italic">
      <?php $chips = ['Clareamento Dental','Implantes Dentários','Próteses Dentárias','Odontologia Estética','Periodontia','Ortodontia','Cirurgias Odontológicas'];
      for ($r = 0; $r < 2; $r++): foreach ($chips as $c): ?>
        <span class="mx-6 inline-flex items-center gap-3"><span class="size-1.5 rounded-full bg-gold"></span><?= e($c) ?></span>
      <?php endforeach; endfor; ?>
    </div>
  </div>
</div>

<!-- ===== DIFERENCIAIS ===== -->
<section id="diferenciais" class="relative bg-background py-20 lg:py-28">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
      <div class="reveal">
        <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-petrol">
          <span class="h-px w-8 bg-gold"></span>Por que a IC
        </span>
        <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-primary text-balance sm:text-4xl">
          Cada detalhe pensado para a sua confiança.
        </h2>
      </div>
      <p class="reveal max-w-xl text-lg leading-relaxed text-muted-foreground lg:justify-self-end">
        Unimos tecnologia, técnica e um atendimento verdadeiramente humano para transformar a experiência de cuidar do seu sorriso — do primeiro contato ao resultado final.
      </p>
    </div>

    <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($cfg['diferenciais'] as $i => $d): ?>
        <article class="reveal surface-card group p-7 <?= $i % 2 ? 'lg:translate-y-6' : '' ?>">
          <span class="grid size-12 place-items-center rounded-2xl bg-petrol/10 text-petrol transition-colors group-hover:bg-petrol group-hover:text-white">
            <?= icon($d['icon'], 'size-6') ?>
          </span>
          <h3 class="mt-5 font-display text-xl font-semibold tracking-tight text-primary"><?= e($d['title']) ?></h3>
          <p class="mt-2.5 text-[0.95rem] leading-relaxed text-muted-foreground"><?= e($d['desc']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== ESPECIALIDADES (blocos horizontais alternados) ===== -->
<section id="especialidades" class="relative overflow-hidden bg-deep py-20 lg:py-28">
  <div class="pointer-events-none absolute -top-24 right-0 size-[36rem] rounded-full bg-petrol/25 blur-3xl" aria-hidden="true"></div>
  <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
    <div class="reveal mx-auto max-w-2xl text-center">
      <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-gold">
        <span class="h-px w-8 bg-gold"></span>Especialidades<span class="h-px w-8 bg-gold"></span>
      </span>
      <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-white text-balance sm:text-4xl">
        Tratamentos que devolvem beleza e função ao seu sorriso.
      </h2>
    </div>

    <div class="mt-16 space-y-6 lg:space-y-10">
      <?php foreach ($cfg['especialidades'] as $i => $s): $rev = $i % 2 === 1; ?>
        <article class="reveal grid items-center gap-8 rounded-[2.25rem] border border-white/10 bg-white/[0.03] p-5 lg:grid-cols-2 lg:gap-12 lg:p-8">
          <div class="relative overflow-hidden rounded-[1.75rem] <?= $rev ? 'lg:order-2' : '' ?>">
            <img src="<?= e($s['img']) ?>" width="640" height="460" loading="lazy" alt="<?= e($s['title']) ?>"
                 class="h-full w-full object-cover" />
            <span class="absolute left-4 top-4 rounded-full bg-deep/80 px-3 py-1 font-display text-sm text-gold backdrop-blur"><?= e($s['num']) ?></span>
          </div>
          <div class="<?= $rev ? 'lg:order-1 lg:pr-4' : 'lg:pl-4' ?>">
            <span class="inline-flex size-11 place-items-center items-center justify-center rounded-2xl bg-gold/15 text-gold"><?= icon($s['icon'], 'size-6') ?></span>
            <h3 class="mt-4 font-display text-2xl font-semibold tracking-tight text-white sm:text-3xl"><?= e($s['title']) ?></h3>
            <p class="mt-3 max-w-xl leading-relaxed text-white/65"><?= e($s['desc']) ?></p>
            <ul class="mt-5 grid gap-2.5 sm:grid-cols-2">
              <?php foreach ($s['benef'] as $b): ?>
                <li class="flex items-start gap-2.5 text-sm text-white/80">
                  <span class="mt-0.5 grid size-5 shrink-0 place-items-center rounded-full bg-petrol text-white"><?= icon('check', 'size-3.5') ?></span>
                  <?= e($b) ?>
                </li>
              <?php endforeach; ?>
            </ul>
            <a href="<?= e(whats($cfg, 'Olá! Gostaria de agendar uma avaliação de ' . $s['title'] . '.')) ?>" target="_blank" rel="noopener"
               class="mt-7 inline-flex items-center gap-2 rounded-full bg-gold px-6 py-3 text-sm font-semibold text-deep transition-transform hover:scale-[1.04]">
              Agendar <?= e($s['title']) ?> <?= icon('arrow-right', 'size-4') ?>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== ANTES E DEPOIS ===== -->
<section id="resultados" class="relative bg-secondary/50 py-20 lg:py-28">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="reveal mx-auto max-w-2xl text-center">
      <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-petrol">
        <span class="h-px w-8 bg-gold"></span>Antes e Depois<span class="h-px w-8 bg-gold"></span>
      </span>
      <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-primary text-balance sm:text-4xl">
        <?= e($cfg['antes_depois_titulo']) ?>
      </h2>
      <p class="mt-4 text-lg leading-relaxed text-muted-foreground"><?= e($cfg['antes_depois_sub']) ?></p>
    </div>

    <div class="mt-14 grid gap-6 lg:grid-cols-2">
      <?php foreach ($cfg['antes_depois'] as $ad): ?>
        <figure class="reveal surface-card overflow-hidden p-0">
          <div class="ba-slider group relative select-none" tabindex="0" aria-label="Comparativo antes e depois — <?= e($ad['label']) ?>">
            <img src="<?= e($ad['depois']) ?>" width="760" height="500" loading="lazy" alt="Depois — <?= e($ad['label']) ?>" class="block h-full w-full object-cover" />
            <div class="ba-slider__before absolute inset-0 overflow-hidden" style="width:50%">
              <img src="<?= e($ad['antes']) ?>" width="760" height="500" loading="lazy" alt="Antes — <?= e($ad['label']) ?>" class="h-full w-full max-w-none object-cover" />
              <span class="absolute left-3 top-3 rounded-full bg-deep/80 px-3 py-1 text-xs font-semibold text-white backdrop-blur">Antes</span>
            </div>
            <span class="absolute right-3 top-3 rounded-full bg-gold px-3 py-1 text-xs font-semibold text-deep">Depois</span>
            <div class="ba-slider__handle absolute inset-y-0" style="left:50%">
              <span class="absolute inset-y-0 -left-px w-0.5 bg-white/90"></span>
              <span class="absolute top-1/2 left-1/2 grid size-10 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-white bg-white text-deep shadow-[var(--shadow-lift)]">
                <?= icon('chevrons', 'size-5') ?>
              </span>
            </div>
            <input type="range" min="0" max="100" value="50" class="ba-slider__range absolute inset-0 h-full w-full cursor-ew-resize opacity-0" aria-label="Arraste para comparar" />
          </div>
          <figcaption class="flex items-center justify-between px-5 py-4">
            <span class="font-display text-lg font-semibold text-primary"><?= e($ad['label']) ?></span>
            <span class="text-xs text-muted-foreground">Arraste para comparar</span>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>

    <p class="reveal mx-auto mt-8 flex max-w-2xl items-start justify-center gap-2 text-center text-xs leading-relaxed text-muted-foreground">
      <?= icon('shield-check', 'size-4 shrink-0 text-petrol') ?> <?= e($cfg['antes_depois_aviso']) ?>
    </p>
  </div>
</section>

<!-- ===== SOBRE ===== -->
<section id="sobre" class="relative overflow-hidden bg-background py-20 lg:py-28">
  <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 lg:grid-cols-2 lg:gap-16 lg:px-8">
    <div class="reveal relative order-2 lg:order-1">
      <div class="overflow-hidden rounded-[2.5rem] rounded-bl-[6rem] border border-border shadow-[var(--shadow-lift)]">
        <img src="img/sobre-clinica.svg" width="680" height="720" loading="lazy" alt="Ambiente moderno da Clínica Odontológica Modelo" class="h-full w-full object-cover" />
      </div>
      <div class="absolute -right-4 -top-5 hidden rounded-3xl border border-border bg-card p-6 text-center shadow-[var(--shadow-lift)] sm:block">
        <span class="font-display text-3xl font-semibold text-primary"><?= e($cfg['rating']) ?></span>
        <div class="mt-1 flex justify-center gap-0.5"><?= stars('size-3.5') ?></div>
        <span class="mt-1 block text-xs text-muted-foreground">Google · <?= e($cfg['reviews']) ?> avaliações</span>
      </div>
    </div>

    <div class="reveal order-1 lg:order-2">
      <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-petrol">
        <span class="h-px w-8 bg-gold"></span><?= e($cfg['sobre_eyebrow']) ?>
      </span>
      <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-primary text-balance sm:text-4xl"><?= e($cfg['sobre_titulo']) ?></h2>
      <p class="mt-5 leading-relaxed text-muted-foreground"><?= e($cfg['sobre_p1']) ?></p>
      <p class="mt-4 leading-relaxed text-muted-foreground"><?= e($cfg['sobre_p2']) ?></p>

      <ul class="mt-7 grid gap-3 sm:grid-cols-2">
        <?php foreach ($cfg['sobre_valores'] as $v): ?>
          <li class="flex items-center gap-3 text-sm font-medium text-primary">
            <span class="grid size-6 shrink-0 place-items-center rounded-full bg-gold/20 text-petrol"><?= icon('check', 'size-4') ?></span><?= e($v) ?>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="mt-8 grid grid-cols-3 gap-4 border-t border-border pt-6">
        <?php foreach ($cfg['sobre_stats'] as $st): ?>
          <div>
            <span class="font-display text-2xl font-semibold text-petrol sm:text-3xl"><?= e($st['v']) ?></span>
            <span class="mt-1 block text-xs leading-snug text-muted-foreground"><?= e($st['l']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===== PROCESSO ===== -->
<section id="processo" class="relative overflow-hidden bg-petrol py-20 lg:py-28">
  <div class="pointer-events-none absolute -bottom-24 -left-24 size-96 rounded-full bg-white/10 blur-3xl" aria-hidden="true"></div>
  <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
    <div class="reveal mx-auto max-w-2xl text-center">
      <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-gold">
        <span class="h-px w-8 bg-gold"></span>Como funciona<span class="h-px w-8 bg-gold"></span>
      </span>
      <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-white text-balance sm:text-4xl">
        Uma jornada simples até o seu novo sorriso.
      </h2>
    </div>

    <ol class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-5 lg:gap-4">
      <?php foreach ($cfg['jornada'] as $i => $j): ?>
        <li class="reveal relative rounded-3xl border border-white/12 bg-white/[0.05] p-6 backdrop-blur">
          <span class="font-display text-4xl font-semibold text-white/15"><?= e($j['n']) ?></span>
          <span class="mt-3 grid size-11 place-items-center rounded-2xl bg-gold text-deep"><?= icon($j['icon'], 'size-5') ?></span>
          <h3 class="mt-4 font-display text-lg font-semibold text-white"><?= e($j['title']) ?></h3>
          <p class="mt-2 text-sm leading-relaxed text-white/65"><?= e($j['desc']) ?></p>
          <?php if ($i < count($cfg['jornada']) - 1): ?>
            <span class="absolute -right-2 top-10 hidden text-white/30 lg:block"><?= icon('arrow-right', 'size-5') ?></span>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ===== GALERIA ===== -->
<section id="galeria" class="relative bg-background py-20 lg:py-28">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="reveal flex flex-wrap items-end justify-between gap-6">
      <div>
        <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-petrol">
          <span class="h-px w-8 bg-gold"></span>Estrutura
        </span>
        <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-primary text-balance sm:text-4xl">Um ambiente à altura do seu sorriso.</h2>
      </div>
      <p class="max-w-sm text-muted-foreground">Espaços sofisticados, equipamentos modernos e uma equipe pronta para acolher você.</p>
    </div>

    <div class="mt-12 grid auto-rows-[200px] grid-cols-2 gap-4 lg:auto-rows-[220px] lg:grid-cols-4">
      <?php foreach ($cfg['galeria'] as $g): ?>
        <figure class="reveal group relative overflow-hidden rounded-3xl border border-border <?= e($g['span']) ?>">
          <img src="<?= e($g['img']) ?>" loading="lazy" alt="<?= e($g['alt']) ?>"
               class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-deep/70 via-transparent to-transparent"></div>
          <figcaption class="absolute bottom-4 left-4 flex items-center gap-2 text-sm font-semibold text-white">
            <?= icon('camera', 'size-4 text-gold') ?><?= e($g['label']) ?>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== DEPOIMENTOS ===== -->
<section id="depoimentos" class="relative overflow-hidden bg-deep py-20 lg:py-28">
  <div class="pointer-events-none absolute -top-24 -left-24 size-96 rounded-full bg-petrol/30 blur-3xl" aria-hidden="true"></div>
  <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
    <div class="reveal grid gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
      <div>
        <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-gold">
          <span class="h-px w-8 bg-gold"></span>Depoimentos
        </span>
        <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-white text-balance sm:text-4xl">
          Pacientes que confiam e recomendam.
        </h2>
        <div class="mt-6 inline-flex items-center gap-4 rounded-2xl border border-white/12 bg-white/5 px-5 py-4">
          <span class="font-display text-4xl font-semibold text-white"><?= e($cfg['rating']) ?></span>
          <div>
            <div class="flex gap-0.5"><?= stars('size-4') ?></div>
            <span class="mt-1 block text-xs text-white/55"><?= e($cfg['reviews']) ?> avaliações no Google</span>
          </div>
        </div>
      </div>
      <p class="max-w-xl text-lg leading-relaxed text-white/60 lg:justify-self-end">
        A confiança dos nossos pacientes é o nosso maior orgulho. Veja o que dizem sobre a experiência de cuidar do sorriso na Clínica Odontológica Modelo.
      </p>
    </div>

    <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($cfg['depoimentos'] as $d): ?>
        <figure class="reveal flex h-full flex-col rounded-3xl border border-white/10 bg-white/[0.04] p-7">
          <span class="text-gold"><?= icon('quote', 'size-7') ?></span>
          <div class="mt-3 flex gap-0.5"><?= stars('size-4') ?></div>
          <blockquote class="mt-4 flex-1 leading-relaxed text-white/80">"<?= e($d['text']) ?>"</blockquote>
          <figcaption class="mt-6 flex items-center gap-3 border-t border-white/10 pt-5">
            <span class="grid size-11 place-items-center rounded-full bg-gradient-to-br from-petrol to-petroldark font-display text-sm font-semibold text-white"><?= e($d['initials']) ?></span>
            <span class="leading-tight">
              <span class="block text-sm font-semibold text-white"><?= e($d['name']) ?></span>
              <span class="block text-xs text-gold"><?= e($d['role']) ?></span>
            </span>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== CTA ===== -->
<section class="relative bg-background py-16 lg:py-20">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="reveal relative overflow-hidden rounded-[2.75rem] bg-gradient-gold px-6 py-14 text-center shadow-[var(--shadow-lift)] lg:px-16 lg:py-20">
      <div class="pointer-events-none absolute -right-16 -top-16 size-72 rounded-full bg-white/20 blur-3xl" aria-hidden="true"></div>
      <div class="pointer-events-none absolute -bottom-20 -left-16 size-72 rounded-full bg-deep/15 blur-3xl" aria-hidden="true"></div>
      <div class="relative mx-auto max-w-2xl">
        <span class="inline-flex items-center gap-2 rounded-full border border-deep/20 bg-deep/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-deep">
          <?= icon('sparkles', 'size-4') ?> Transforme seu sorriso
        </span>
        <h2 class="mt-5 font-display text-3xl font-semibold leading-tight tracking-tight text-deep text-balance sm:text-4xl lg:text-[2.75rem]"><?= e($cfg['cta_titulo']) ?></h2>
        <p class="mx-auto mt-4 max-w-xl leading-relaxed text-deep/75"><?= e($cfg['cta_sub']) ?></p>
        <a href="<?= e($waLink) ?>" target="_blank" rel="noopener"
           class="mt-8 inline-flex items-center justify-center gap-2 rounded-full bg-deep px-8 py-4 text-base font-semibold text-white shadow-[var(--shadow-lift)] transition-transform hover:scale-[1.03]">
          <?= icon('whatsapp', 'size-5') ?> Agendar pelo WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ===== LOCALIZAÇÃO ===== -->
<section id="localizacao" class="relative bg-secondary/50 py-20 lg:py-28">
  <div class="mx-auto grid max-w-7xl items-stretch gap-10 px-5 lg:grid-cols-[0.9fr_1.1fr] lg:px-8">
    <div class="reveal">
      <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.2em] text-petrol">
        <span class="h-px w-8 bg-gold"></span>Onde estamos
      </span>
      <h2 class="mt-4 font-display text-3xl font-semibold leading-tight tracking-tight text-primary text-balance sm:text-4xl">Venha nos visitar em Cidade Exemplo.</h2>
      <p class="mt-4 leading-relaxed text-muted-foreground">Estamos prontos para receber você em um ambiente moderno e acolhedor. Agende sua avaliação e dê o primeiro passo.</p>

      <div class="mt-8 grid gap-3">
        <div class="flex items-start gap-4 rounded-2xl border border-border bg-card p-5">
          <span class="grid size-11 place-items-center rounded-2xl bg-petrol/10 text-petrol"><?= icon('map-pin', 'size-5') ?></span>
          <div class="text-sm leading-relaxed">
            <span class="block font-semibold text-primary"><?= e($cfg['building']) ?></span>
            <span class="block text-muted-foreground"><?= e($cfg['address']) ?></span>
            <span class="block text-muted-foreground"><?= e($cfg['city']) ?> — <?= e($cfg['state']) ?></span>
          </div>
        </div>
        <div class="grid gap-3 sm:grid-cols-2">
          <a href="tel:<?= e($cfg['phone_raw']) ?>" class="flex items-start gap-4 rounded-2xl border border-border bg-card p-5 transition-colors hover:border-petrol/40">
            <span class="grid size-11 place-items-center rounded-2xl bg-petrol/10 text-petrol"><?= icon('phone', 'size-5') ?></span>
            <div class="text-sm leading-relaxed">
              <span class="block font-semibold text-primary">Telefone / WhatsApp</span>
              <span class="block text-muted-foreground"><?= e($cfg['phone']) ?></span>
            </div>
          </a>
          <div class="flex items-start gap-4 rounded-2xl border border-border bg-card p-5">
            <span class="grid size-11 place-items-center rounded-2xl bg-petrol/10 text-petrol"><?= icon('clock', 'size-5') ?></span>
            <div class="text-sm leading-relaxed">
              <span class="block font-semibold text-primary">Horário</span>
              <span class="block text-muted-foreground"><?= e($cfg['horario_semana']) ?></span>
              <span class="block text-muted-foreground"><?= e($cfg['horario_sabado']) ?></span>
            </div>
          </div>
        </div>
        <div class="mt-1 flex flex-col gap-3 sm:flex-row">
          <a href="https://www.google.com/maps/search/?api=1&query=<?= $mapsQ ?>" target="_blank" rel="noopener"
             class="inline-flex flex-1 items-center justify-center gap-2 rounded-full bg-petrol px-6 py-3.5 text-sm font-semibold text-white transition-transform hover:scale-[1.03]">
            <?= icon('navigation', 'size-4') ?> Como chegar
          </a>
          <a href="<?= e($waLink) ?>" target="_blank" rel="noopener"
             class="inline-flex flex-1 items-center justify-center gap-2 rounded-full border border-border bg-card px-6 py-3.5 text-sm font-semibold text-primary transition-colors hover:bg-secondary">
            <?= icon('whatsapp', 'size-4 text-whatsapp') ?> Falar no WhatsApp
          </a>
        </div>
      </div>
    </div>

    <div class="reveal min-h-[360px] overflow-hidden rounded-[2rem] border border-border shadow-[var(--shadow-soft)]">
      <iframe
        title="Mapa — <?= e($cfg['clinic']) ?>"
        src="https://www.google.com/maps?q=<?= $mapsQ ?>&output=embed"
        width="100%" height="100%" style="border:0; min-height:360px" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
    </div>
  </div>
</section>

</main>

<!-- ===== RODAPÉ ===== -->
<footer class="bg-deep pt-16 pb-8 text-white/70">
  <div class="mx-auto max-w-7xl px-5 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1.2fr_1fr_1fr]">
      <div>
        <div class="flex items-center gap-3">
          <span class="grid size-11 place-items-center rounded-2xl bg-gradient-to-br from-petrol to-deep font-display text-lg font-semibold text-white"><?= e($cfg['sigla']) ?></span>
          <span class="leading-tight">
            <span class="block font-display text-lg font-semibold text-white">Odonto Modelo</span>
            <span class="block text-[0.7rem] font-medium uppercase tracking-[0.2em] text-white/50">Estética · Cidade Exemplo</span>
          </span>
        </div>
        <p class="mt-5 max-w-sm text-sm leading-relaxed text-white/60">Clínica odontológica especializada em clareamento dental, próteses dentárias e implantes, transformando sorrisos com tecnologia e excelência.</p>
        <div class="mt-5 inline-flex items-center gap-2 rounded-full border border-white/12 bg-white/5 px-4 py-2 text-sm">
          <div class="flex gap-0.5"><?= stars('size-3.5') ?></div>
          <span class="text-white/70"><?= e($cfg['rating']) ?> · <?= e($cfg['reviews']) ?> avaliações</span>
        </div>
      </div>

      <div>
        <h3 class="font-display text-base font-semibold text-white">Especialidades</h3>
        <ul class="mt-4 grid gap-2.5 text-sm">
          <?php foreach ($cfg['especialidades'] as $s): ?>
            <li><a href="#especialidades" class="text-white/60 transition-colors hover:text-gold"><?= e($s['title']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div>
        <h3 class="font-display text-base font-semibold text-white">Contato</h3>
        <ul class="mt-4 grid gap-3 text-sm">
          <li class="flex items-start gap-3"><?= icon('map-pin', 'size-4 mt-0.5 shrink-0 text-gold') ?><span class="text-white/60"><?= e($cfg['building']) ?><br><?= e($cfg['address']) ?><br><?= e($cfg['city']) ?> — <?= e($cfg['state']) ?></span></li>
          <li class="flex items-center gap-3"><?= icon('phone', 'size-4 shrink-0 text-gold') ?><a href="tel:<?= e($cfg['phone_raw']) ?>" class="text-white/60 transition-colors hover:text-gold"><?= e($cfg['phone']) ?></a></li>
          <li class="flex items-start gap-3"><?= icon('clock', 'size-4 mt-0.5 shrink-0 text-gold') ?><span class="text-white/60"><?= e($cfg['horario_semana']) ?><br><?= e($cfg['horario_sabado']) ?></span></li>
        </ul>
        <a href="<?= e($waLink) ?>" target="_blank" rel="noopener"
           class="mt-5 inline-flex items-center gap-2 rounded-full bg-whatsapp px-5 py-2.5 text-sm font-semibold text-white transition-transform hover:scale-[1.04]">
          <?= icon('whatsapp', 'size-4') ?> Agendar avaliação
        </a>
      </div>
    </div>

    <div class="mt-12 flex flex-col items-center justify-between gap-3 border-t border-white/10 pt-6 text-xs text-white/45 sm:flex-row">
      <span>© <?= date('Y') ?> <?= e($cfg['clinic']) ?>. Todos os direitos reservados.</span>
      <span>CNPJ e responsável técnico conforme registro no CRO.</span>
    </div>
  </div>
</footer>

<script src="js/app.js" defer></script>
</body>
</html>
