<?php
// Zerion-X — Core-X 2.0 | PHP hardened
// anti-hack basic hardening — bukan 100% aman, tapi cegah iseng
header_remove('X-Powered-By');
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
header("Content-Security-Policy: default-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; img-src 'self' data:; font-src 'self' https://fonts.gstatic.com; connect-src 'self'; frame-ancestors 'self'; base-uri 'self'; form-action 'self'");
header('X-XSS-Protection: 1; mode=block');
// block query aneh yang sering dipakai scanner
if (isset($_SERVER['QUERY_STRING']) && preg_match('/(\.\.|\b(etc|passwd|wp-admin|phpmyadmin|eval|base64_)\b)/i', $_SERVER['QUERY_STRING'])) {
  http_response_code(403); exit('Forbidden');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Zerion-X — Core-X 2.0</title>
<meta name="description" content="Zerion-X — Setup pilihan. Kontrol dalam genggaman. Core-X 2.0" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  html{scroll-behavior:smooth}
  :root{
    --bg:#040a16;
    --bg2:#0a152c;
    --muted:#a7a7b3;
    --line:rgba(255,255,255,.09);
    --purple:#6fb3ff;
    --purple2:#2f7bff;
    --lav:#a8d4ff;
  }
  body{
    background:var(--bg);
    color:#fff;
    font-family:'Inter',system-ui,sans-serif;
    overflow-x:hidden;
    min-height:100vh;
  }
  body::before{
    content:'';
    position:fixed;inset:0;
    background:
      radial-gradient(800px 500px at 70% 20%, rgba(47,123,255,.16), transparent 60%),
      radial-gradient(600px 400px at 15% 30%, rgba(255,255,255,.04), transparent 60%),
      radial-gradient(700px 500px at 50% 100%, rgba(56,189,248,.09), transparent 60%);
    pointer-events:none;
    z-index:0;
  }
  a{color:inherit;text-decoration:none}varian
  .wrap{max-width:1280px;margin:0 auto;padding:0 32px;position:relative;z-index:1}

  /* NAV */
  nav{
    display:flex;align-items:center;justify-content:space-between;
    padding:18px 32px;
    max-width:1280px;margin:0 auto;
    position:relative;z-index:10;
  }
  .brand{display:flex;align-items:center;gap:12px}
  .brand img{
    width:34px;height:34px;border-radius:50%;object-fit:cover;
    border:1px solid rgba(111,179,255,.55);
    box-shadow:0 0 18px rgba(47,123,255,.55);
  }
  .brand span{
    font-family:'Space Grotesk',sans-serif;
    font-weight:700;letter-spacing:.06em;
    color:var(--purple2);
    font-size:18px;
  }
  .links{display:flex;gap:32px;font-size:14px;font-weight:500;color:#e6e6eb}
  .links a{opacity:.9;transition:.2s}
  .links a:hover{color:var(--purple);opacity:1}
  .btn-top{
    border:1px solid rgba(255,255,255,.18);
    border-radius:10px;
    padding:10px 22px;
    font-size:14px;font-weight:600;
    display:flex;align-items:center;gap:18px;
    background:rgba(255,255,255,.02);
    backdrop-filter:blur(10px);
    transition:.25s;
  }
  .btn-top i{font-style:normal;color:var(--purple)}
  .btn-top:hover{border-color:var(--purple2);box-shadow:0 0 20px rgba(47,123,255,.35)}

  /* HERO */
  .hero{
    display:grid;grid-template-columns:1.05fr .95fr;
    gap:24px;align-items:center;
    padding:64px 32px 30px;
    max-width:1280px;margin:0 auto;
    position:relative;z-index:1;
  }
  .eyebrow{
    display:flex;align-items:center;gap:12px;
    font-size:11px;letter-spacing:.32em;font-weight:700;
    color:var(--purple2);
    margin-bottom:22px;
  }
  .eyebrow::before{content:'';width:28px;height:1px;background:var(--purple2);display:block;opacity:.7}
  h1{
    font-size:clamp(48px,6vw,84px);
    line-height:.98;letter-spacing:-.04em;font-weight:800;
  }
  h1 .lav{color:var(--lav);display:block;margin-top:6px}
  .desc{margin-top:26px;color:#c9c9d2;font-size:16px;line-height:1.9;max-width:440px}
  .cta{display:flex;gap:14px;margin-top:32px;flex-wrap:wrap}
  .btn-primary{
    background:linear-gradient(135deg,#a8d4ff,#2f7bff);color:#04122b;
    border:none;border-radius:12px;
    padding:15px 26px;font-weight:800;font-size:14px;
    display:flex;align-items:center;gap:16px;cursor:pointer;
    transition:.25s;
  }
  .btn-primary:hover{transform:translateY(-1px);box-shadow:0 12px 32px rgba(47,123,255,.45)}
  .btn-ghost{
    background:transparent;color:#fff;
    border:1px solid rgba(255,255,255,.16);border-radius:12px;
    padding:15px 26px;font-weight:700;font-size:14px;
    display:flex;align-items:center;gap:16px;cursor:pointer;
  }
  .btn-ghost:hover{border-color:rgba(255,255,255,.35)}
  .checks{display:flex;gap:22px;margin-top:20px;font-size:12.5px;color:#9a9aa6}
  .checks span::before{content:'⁄ ';color:#d6d6de}

  /* RIGHT VISUAL */
  .visual{position:relative;display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:520px}
  .cube-wrap{position:relative;width:420px;height:420px;display:flex;align-items:center;justify-content:center;perspective:1000px}
  .glow{
    position:absolute;width:380px;height:380px;
    background:radial-gradient(circle, rgba(47,123,255,.38) 0%, rgba(56,189,248,.1) 45%, transparent 70%);
    filter:blur(12px);
  }
  .glass-cube{
    position:relative;width:330px;height:330px;
    border-radius:68px;
    background:linear-gradient(145deg, rgba(168,212,255,.16), rgba(255,255,255,.03) 40%, rgba(47,123,255,.14));
    border:1.5px solid rgba(168,212,255,.65);
    box-shadow:
      inset 0 1px 0 rgba(255,255,255,.45),
      inset 0 -20px 40px rgba(47,123,255,.18),
      0 20px 80px rgba(0,0,0,.6),
      0 0 70px rgba(47,123,255,.3);
    overflow:hidden;
    display:flex;align-items:center;justify-content:center;
    backdrop-filter:blur(18px);
    will-change:transform;
    transform-style:preserve-3d;
    transform:rotate(-8deg);
  }
  .glass-cube::after{
    content:'';position:absolute;inset:0;border-radius:inherit;
    background:
      radial-gradient(600px 200px at var(--mx,30%) var(--my,20%), rgba(255,255,255,.22), transparent 50%),
      linear-gradient(115deg, transparent 30%, rgba(255,255,255,.14) 45%, transparent 60%);
    pointer-events:none;
    transition:opacity .4s;
  }
  .glass-cube img{
    width:100%;height:100%;object-fit:cover;
    border-radius:inherit;
    mix-blend-mode:screen;
    transform:scale(1.02);
    filter:drop-shadow(0 0 24px rgba(47,123,255,.6)) drop-shadow(0 0 42px rgba(56,189,248,.4)) saturate(1.12) contrast(1.05);
  }
  .orbit{position:absolute;inset:-20px;pointer-events:none}
  .orbit svg{width:100%;height:100%;opacity:.6;animation:orbitSpin 26s linear infinite;transform-origin:50% 50%}
  @keyframes orbitSpin{to{transform:rotate(360deg)}}
  .platform{
    width:300px;height:64px;margin-top:-28px;
    background:radial-gradient(ellipse at center, rgba(111,179,255,.28) 0%, rgba(111,179,255,.07) 45%, transparent 70%);
    border-radius:50%;
    position:relative;
  }
  .platform::before{
    content:'';position:absolute;left:10%;right:10%;top:18px;height:46px;
    border:1px solid rgba(111,179,255,.4);border-top:none;
    border-radius:0 0 150px 150px / 0 0 46px 46px;
  }
  .platform::after{
    content:'';position:absolute;left:18%;right:18%;top:32px;height:1px;background:rgba(111,179,255,.3)
  }
  .caption{font-size:9px;letter-spacing:.42em;color:#8e8e99;margin-top:18px;font-weight:600}
  .prod-card{
    width:100%;max-width:520px;margin-top:14px;
    border-top:1px solid var(--line);
    padding-top:22px;
    display:flex;justify-content:space-between;align-items:flex-start;gap:16px;
  }
  .prod-card small{font-size:10px;letter-spacing:.32em;color:#9d9dab}
  .prod-card h2{font-size:26px;letter-spacing:.06em;margin-top:12px;font-weight:800;font-family:'Space Grotesk',sans-serif}
  .prod-meta{display:flex;justify-content:space-between;margin-top:34px;font-size:9px;letter-spacing:.32em;color:#7d7d88}
  .circle-btn{
    width:48px;height:48px;border-radius:50%;
    border:1px solid rgba(255,255,255,.25);
    display:flex;align-items:center;justify-content:center;
    font-size:20px;cursor:pointer;flex-shrink:0;
    transition:.25s;background:transparent;color:#fff;
  }
  .circle-btn:hover{background:#fff;color:#000}

  /* COMMUNITY */
  .community{
    max-width:1280px;margin:10px auto 0;padding:20px 32px 10px;
    position:relative;z-index:1;
  }
  .community-card{
    border:1px solid rgba(111,179,255,.22);
    border-radius:22px;
    background:
      radial-gradient(700px 260px at 85% 0%, rgba(47,123,255,.16), transparent 60%),
      linear-gradient(180deg, rgba(47,123,255,.07), rgba(255,255,255,.015));
    padding:38px 36px;
    display:grid;grid-template-columns:1.15fr .85fr;gap:28px;align-items:center;
    box-shadow:0 20px 60px rgba(0,0,0,.35);
  }
  .community-card h2{font-size:clamp(26px,3vw,38px);letter-spacing:-.02em;font-weight:800;line-height:1.1}
  .community-card h2 span{color:var(--lav)}
  .community-card .sub{margin-top:14px;color:#c2c9d6;font-size:14.5px;line-height:1.85;max-width:520px}
  .com-points{display:flex;gap:10px;flex-wrap:wrap;margin-top:18px}
  .com-points span{
    font-size:12px;font-weight:600;color:#cfe4ff;
    border:1px solid rgba(111,179,255,.3);border-radius:999px;padding:8px 14px;
    background:rgba(47,123,255,.08);
    display:inline-flex;align-items:center;gap:6px;
  }
  .discord-box{
    border:1px solid rgba(255,255,255,.12);border-radius:18px;
    background:rgba(4,10,22,.6);backdrop-filter:blur(12px);
    padding:24px;
  }
  .discord-box .srv{display:flex;align-items:center;gap:14px}
  .discord-dot{
    width:48px;height:48px;border-radius:14px;flex-shrink:0;
    background:linear-gradient(135deg,#2f7bff,#38bdf8);
    display:flex;align-items:center;justify-content:center;
    font-weight:900;font-size:20px;color:#fff;
    box-shadow:0 8px 28px rgba(47,123,255,.45);
  }
  .discord-box .srv b{display:block;font-size:15px}
  .discord-box .srv small{display:block;font-size:12px;color:#8fa0b8;margin-top:3px}
  .discord-url{
    margin-top:16px;font-size:12px;color:#7ea4d6;word-break:break-all;
    background:rgba(47,123,255,.07);border:1px dashed rgba(111,179,255,.3);
    border-radius:10px;padding:10px 12px;
  }
  .btn-join{
    margin-top:16px;width:100%;
    background:linear-gradient(135deg,#38bdf8,#2f7bff);
    color:#fff;border:none;border-radius:12px;cursor:pointer;
    padding:15px 22px;font-weight:800;font-size:15px;
    display:flex;align-items:center;justify-content:center;gap:10px;
    box-shadow:0 12px 32px rgba(47,123,255,.4);
    transition:.25s;
  }
  .btn-join:hover{transform:translateY(-2px);box-shadow:0 16px 40px rgba(47,123,255,.55);filter:brightness(1.08)}
  .discord-note{margin-top:12px;font-size:11.5px;color:#7c8aa0;text-align:center}

  /* CORE SERIES */
  .core-series{max-width:1280px;margin:18px auto 0;padding:26px 32px 6px;position:relative;z-index:1}
  .core-head{text-align:center;max-width:640px;margin:0 auto 26px}
  .core-head h2{font-size:clamp(28px,3.6vw,42px);letter-spacing:-.03em;font-weight:900;line-height:1.05}
  .core-head h2 span{color:var(--lav)}
  .core-head p{margin-top:12px;color:#aeb8c9;font-size:14.5px;line-height:1.7}
  .core-grid{display:grid;grid-template-columns:1fr 1fr;gap:22px;align-items:stretch}
  .core-card{
    position:relative;border:1px solid rgba(255,255,255,.08);border-radius:22px;
    background:linear-gradient(180deg, rgba(255,255,255,.035), rgba(255,255,255,.01));
    padding:26px 26px 22px;display:flex;flex-direction:column;
    box-shadow:0 14px 40px rgba(0,0,0,.28);
    overflow:hidden;
  }
  .core-card::before{
    content:'';position:absolute;inset:0;border-radius:inherit;
    background:radial-gradient(600px 220px at 80% 0%, rgba(47,123,255,.12), transparent 60%);
    pointer-events:none;
  }
  .core-card.featured{
    border-color:rgba(111,179,255,.42);
    background:
      radial-gradient(700px 300px at 85% -10%, rgba(47,123,255,.2), transparent 55%),
      linear-gradient(180deg, rgba(47,123,255,.1), rgba(255,255,255,.02));
    box-shadow:0 18px 60px rgba(47,123,255,.18), 0 14px 40px rgba(0,0,0,.3);
  }
  .core-top{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;position:relative}
  .core-badge{font-size:10px;letter-spacing:.22em;font-weight:800;color:#7ec0ff;border:1px solid rgba(111,179,255,.35);background:rgba(47,123,255,.1);border-radius:999px;padding:7px 12px}
  .core-badge.hot{color:#fff;background:linear-gradient(135deg,#38bdf8,#2f7bff);border-color:transparent;box-shadow:0 6px 22px rgba(47,123,255,.4)}
  .core-card h3{font-size:22px;font-weight:900;letter-spacing:-.02em;margin-top:4px}
  .core-card h3 small{display:block;font-size:12px;font-weight:600;letter-spacing:.14em;color:#7ea4d6;margin-top:6px}
  .core-desc{margin-top:14px;color:#c2cbd8;font-size:13.5px;line-height:1.75}
  .core-feats{margin-top:16px;display:flex;flex-wrap:wrap;gap:8px}
  .core-feats span{font-size:11.5px;font-weight:600;color:#cfe4ff;background:rgba(47,123,255,.08);border:1px solid rgba(111,179,255,.22);border-radius:999px;padding:7px 11px;display:inline-flex;align-items:center;gap:6px}
  .core-feats span svg,.com-points span svg{width:14px;height:14px;flex-shrink:0;stroke:currentColor}
  .core-price{margin-top:22px;padding-top:18px;border-top:1px solid rgba(255,255,255,.07);display:flex;align-items:baseline;justify-content:space-between;gap:12px;position:relative}
  .core-price .idr{font-size:28px;font-weight:900;letter-spacing:-.02em}
  .core-price .idr b{color:#fff}
  .core-price .idr em{font-style:normal;color:var(--lav);font-size:13px;font-weight:700;margin-left:6px}
  .core-price .usd{font-size:13px;font-weight:700;color:#7ea4d6}
  .btn-core{
    margin-top:18px;width:100%;border-radius:12px;padding:14px 18px;
    font-weight:800;font-size:14px;display:flex;align-items:center;justify-content:center;gap:8px;
    cursor:pointer;border:1px solid rgba(255,255,255,.14);background:rgba(255,255,255,.04);color:#fff;transition:.22s;
  }
  .btn-core:hover{background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.28)}
  .btn-core.primary{
    background:linear-gradient(135deg,#38bdf8,#2f7bff);border-color:transparent;color:#fff;
    box-shadow:0 12px 32px rgba(47,123,255,.4);
  }
  .btn-core.primary:hover{transform:translateY(-1px);box-shadow:0 16px 40px rgba(47,123,255,.55);filter:brightness(1.06)}
  .core-foot{margin-top:18px;text-align:center;font-size:11.5px;color:#7c8aa0}

  /* HELP / SUPPORT */
  .help{max-width:1280px;margin:14px auto 0;padding:10px 32px;position:relative;z-index:1}
  .help-card{border:1px solid rgba(111,179,255,.22);border-radius:22px;background:radial-gradient(700px 260px at 15% 0%, rgba(47,123,255,.14), transparent 60%), linear-gradient(180deg, rgba(255,255,255,.03), rgba(255,255,255,.01));padding:34px 30px;box-shadow:0 14px 40px rgba(0,0,0,.28)}
  .help-grid{display:grid;grid-template-columns:1.05fr .95fr;gap:26px;align-items:start}
  .help-badge{display:inline-flex;align-items:center;gap:8px;font-size:11px;letter-spacing:.18em;font-weight:800;color:#a8d4ff;border:1px solid rgba(111,179,255,.3);background:rgba(47,123,255,.1);border-radius:999px;padding:8px 14px}
  .help-badge i{width:8px;height:8px;border-radius:50%;background:#3ddc84;box-shadow:0 0 10px rgba(61,220,132,.8);display:inline-block}
  .help h2{margin-top:14px;font-size:clamp(26px,3vw,38px);letter-spacing:-.02em;font-weight:900;line-height:1.08}
  .help h2 span{color:var(--lav)}
  .help .sub{margin-top:12px;color:#c2cbd8;font-size:14.5px;line-height:1.8}
  .help-steps{margin-top:20px;display:grid;gap:12px}
  .step{display:flex;gap:14px;align-items:flex-start;border:1px solid rgba(255,255,255,.07);border-radius:14px;background:rgba(255,255,255,.02);padding:14px 16px}
  .step-num{width:36px;height:36px;border-radius:10px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;color:#fff;background:linear-gradient(135deg,#38bdf8,#2f7bff);box-shadow:0 6px 18px rgba(47,123,255,.35)}
  .step h4{font-size:14px;font-weight:800}
  .step p{margin-top:4px;font-size:12.5px;color:#9fb0c6;line-height:1.6}
  .help-side{border:1px solid rgba(255,255,255,.08);border-radius:18px;background:rgba(4,10,22,.6);backdrop-filter:blur(12px);padding:22px}
  .help-side h4{font-size:14px;font-weight:800;display:flex;align-items:center;gap:8px}
  .help-side h4 svg{width:18px;height:18px;stroke:#6fb3ff}
  .help-list{margin-top:14px;display:grid;gap:10px}
  .help-list li{list-style:none;display:flex;gap:10px;align-items:flex-start;font-size:13px;color:#c2cbd8;line-height:1.6;border:1px solid rgba(255,255,255,.06);border-radius:12px;padding:12px 14px;background:rgba(255,255,255,.015)}
  .help-list li svg{width:16px;height:16px;flex-shrink:0;stroke:#6fb3ff;margin-top:1px}
  .help-cta{margin-top:16px;display:grid;gap:10px}
  .help-note{font-size:11.5px;color:#7c8aa0;text-align:center}

  /* BOTTOM FEATURES */
  .features{
    border-top:1px solid var(--line);
    margin-top:36px;
    display:grid;grid-template-columns:1fr 1fr 1fr;
    max-width:1280px;margin-left:auto;margin-right:auto;
    position:relative;z-index:1;
  }
  .feat{
    padding:26px 32px;
    display:flex;gap:16px;align-items:flex-start;
    border-right:1px solid var(--line);
  }
  .feat:last-child{border-right:none}
  .feat .ic{font-size:22px;color:var(--lav);line-height:1}
  .feat h4{font-size:13.5px;font-weight:700;margin-bottom:6px}
  .feat p{font-size:12px;color:#8f8f9a}

  @media(max-width:980px){
    .links{display:none}
    .hero{grid-template-columns:1fr;padding-top:36px}
    .help-grid{grid-template-columns:1fr}
    .core-grid{grid-template-columns:1fr}
    .community-card{grid-template-columns:1fr;padding:28px 22px}
    .visual{min-height:auto;padding:20px 0}
    .cube-wrap{width:320px;height:320px}
    .glass-cube{width:250px;height:250px;border-radius:52px}
    .features{grid-template-columns:1fr}
    .feat{border-right:none;border-bottom:1px solid var(--line)}
    h1{font-size:52px}
  }
</style>
</head>
<body>

<nav>
  <a class="brand" href="#">
    <img src="./Image/zerionx.jpg" alt="Zerion-X logo" />
    <span>ZERION-X</span>
  </a>
  <div class="links">
    <a href="#corex">Produk</a>
    <a href="#core-series">Core Series</a>
    <a href="#bantuan">Pusat Bantuan</a>
    <a href="#komunitas" title="ZerionX-Team | Store">Komunitas</a>
    <a href="#">Pengaturan</a>
  </div>

</nav>

<section class="hero">
  <div>
    <div class="eyebrow">SPESIAL / LIMITED COLLECTION</div>
    <h1>Setup pilihan.<br>Kontrol dalam <span class="lav">genggaman.</span></h1>
    <p class="desc">
      Dari kebutuhan PC untuk Low-High Competitive.<br>
      Temukan paket yang pas untuk gaya bermainmu.
    </p>
    <div class="cta">
      <button class="btn-primary" onclick="document.getElementById('core-series').scrollIntoView({behavior:'smooth'})">Jelajahi produk <span>↗</span></button>
    </div>
    <div class="checks">
      <span>Pembayaran QRIS</span>
      <span>Panduan penggunaan</span>
    </div>
  </div>

  <div class="visual" id="corex">
    <div class="cube-wrap">
      <div class="glow"></div>
      <div class="glass-cube">
        <img src="./Image/corex.png" alt="Core-X 2.0" />
      </div>
      <div class="orbit">
        <svg viewBox="0 0 400 400" fill="none">
          <ellipse cx="200" cy="200" rx="190" ry="95" stroke="#6fb3ff" stroke-opacity=".5" stroke-width="1" transform="rotate(-18 200 200)"/>
          <ellipse cx="200" cy="200" rx="180" ry="180" stroke="#38bdf8" stroke-opacity=".2" stroke-width="1" transform="rotate(20 200 200)"/>
        </svg>
      </div>
    </div>
    <div class="platform"></div>
    <div class="caption">PREMIUM . REBORN . S3</div>

    <div class="prod-card">
      <div style="flex:1">
        <small>PERFORMANCE & CUSTOMIZATION</small>
        <h2>CORE-X 2.0</h2>
        <div class="prod-meta">
          <span>PRO SERIES | MOBILE | ENHANCED</span>
          <span>01 — 01</span>
        </div>
      </div>
      <a class="circle-btn" href="https://discord.gg/56t4Xghq7" target="_blank" rel="noopener" title="Join ZerionX-Team | Store">↗</a>
    </div>
  </div>
</section>

<section class="core-series" id="core-series">
  <div class="core-head">
    <div class="eyebrow" style="justify-content:center">CORE SERIES / PILIHAN SETUP</div>
    <h2>Core <span>Series</span> — pilih level kompetitifmu</h2>
    <p>Dua varian performa Zerion-X. Pilih yang paling pas untuk gaya main anda — semua sudah include panduan & support Team 24/7.</p>
  </div>
  <div class="core-grid">
    <!-- CORE-X 1.0 -->
    <div class="core-card">
      <div class="core-top">
        <div class="core-badge">MEDIUM COMPETITIVE</div>
        <div style="font-size:11px;letter-spacing:.18em;color:#6e7c94;font-weight:700">CORE-X 1.0</div>
      </div>
      <h3>Core-X 1.0 <small>FOR MEDIUM COMPETITIVE</small></h3>
      <p class="core-desc">Cocok untuk turnamen kecil-menengah. Sensitivitas seimbang,mudah dikontrol untuk aim stabil.</p>
      <div class="core-feats">
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg> Responsif</span>
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg> Aim stabil</span>
      </div>
      <div class="core-price">
        <div class="idr"><b>Rp800.000</b> <em>/ 800K IDR</em></div>
        <div class="usd">$46 US</div>
      </div>
      <a class="btn-core" href="https://discord.gg/56t4Xghq7" target="_blank" rel="noopener">Pilih Core-X 1.0 <span>↗</span></a>
    </div>

    <!-- CORE-X 2.0 -->
    <div class="core-card featured">
      <div class="core-top">
        <div class="core-badge hot">★ REKOMENDASI — HIGH COMPETITIVE</div>
        <div style="font-size:11px;letter-spacing:.18em;color:#a8d4ff;font-weight:800">CORE-X 2.0</div>
      </div>
      <h3>Core-X 2.0 <small>FOR HIGH COMPETITIVE &amp; STABLE</small></h3>
      <p class="core-desc">Varian tertinggi — presisi tinggi, super stabil series, Support 24/7. Dibuat untuk scrim & kompetitif serius, just for winner only.</p>
      <div class="core-feats">
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 3l4 8 4-8"/><path d="M4 14a8 8 0 0016 0"/><path d="M12 14v7"/></svg> High competitive</span>
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Super stable</span>
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 13c0 2 1.5 4 6 4s6-2 6-4V6H6v7z"/><path d="M18 6c1.5 0 3 1 3 3s-1.5 3-3 3"/><path d="M6 6C4.5 6 3 7 3 9s1.5 3 3 3"/><path d="M12 17v4"/><path d="M8 21h8"/></svg> Untuk turnamen</span>
      </div>
      <div class="core-price">
        <div class="idr"><b>Rp1.200.000</b> <em>/ 1,2 JT IDR</em></div>
        <div class="usd">$68 US</div>
      </div>
      <a class="btn-core primary" href="https://discord.gg/56t4Xghq7" target="_blank" rel="noopener">Pilih Core-X 2.0 <span>↗</span></a>
    </div>
  </div>
  <div class="core-foot">Harga fixed • Bayar via QRIS • Klaim & aktivasi via Discord ZerionX-Team | Store — <a href="https://discord.gg/56t4Xghq7" target="_blank" rel="noopener" style="color:#6fb3ff;text-decoration:underline">discord.gg/56t4Xghq7</a></div>
</section>

<section class="help" id="bantuan">
  <div class="help-card">
    <div class="help-grid">
      <div>
        <div class="help-badge"><i></i> SUPPORT 24/7 — FAST RESPONSE</div>
        <h2>Pusat Bantuan <span>Zerion-X</span></h2>
        <p class="sub">Kami online 24/7 via Discord. Semua order, aktivasi, dan troubleshooting ditangani lewat ticket — jadi rapi, terpantau, dan tidak tenggelam di chat.</p>
        <div class="help-steps">
          <div class="step">
            <div class="step-num">1</div>
            <div><h4>Join Discord ZerionX-Team | Store</h4><p>Klik Join Discord → accept invite <b>discord.gg/56t4Xghq7</b> → verifikasi.</p></div>
          </div>
          <div class="step">
            <div class="step-num">2</div>
            <div><h4>Buka Ticket</h4><p>Masuk channel <b>#ticket / #buka-ticket</b> → klik tombol <b>Create Ticket / Buka Ticket</b> → pilih kategori (Order / Support / Klaim).</p></div>
          </div>
          <div class="step">
            <div class="step-num">3</div>
            <div><h4>Jelaskan Kebutuhan</h4><p>Tulis device, versi Core-X (1.0 / 2.0), dan kendala. Sertakan bukti bayar QRIS jika order baru.</p></div>
          </div>
          <div class="step">
            <div class="step-num">4</div>
            <div><h4>Admin Proses & Tutup Ticket</h4><p>Admin 24/7 akan balas, kirim file/panduan, dan pandu sampai beres. Ticket auto-close setelah solved.</p></div>
          </div>
        </div>
      </div>
      <div class="help-side">
        <h4><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg> Yang bisa dibantu 24/7</h4>
        <ul class="help-list">
          <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.8 19.8 0 01-8.63-3.07A19.5 19.5 0 013.07 8.81 19.8 19.8 0 010 0.18 2 2 0 012 0h3a2 2 0 012 1.72c.12 1.35.4 2.68.84 3.95a2 2 0 01-.57 2.11L6.09 9a16 16 0 006 6l1.22-1.18a2 2 0 012.11-.57c1.27.44 2.6.72 3.95.84A2 2 0 0121 16.07z"/></svg> Aktivasi & install Core-X 1.0 / 2.0</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M12 20a8 8 0 100-16 8 8 0 000 16z"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg> Fix troubleshooting atau kendala product </li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a4 4 0 00-8 0v2"/></svg> Pembayaran QRIS, klaim garansi, ganti device</li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Jam operasional: <b>24 Jam / 7 Hari</b> — rata-rata balas &lt; 15 menit</li>
        </ul>
        <div class="help-cta">
          <a class="btn-join" href="https://discord.gg/56t4Xghq7" target="_blank" rel="noopener">Buka Ticket di Discord <span>↗</span></a>
          <a class="btn-core" href="https://discord.gg/56t4Xghq7" target="_blank" rel="noopener" style="justify-content:center">Join ZerionX-Team | Store — discord.gg/56t4Xghq7</a>
        </div>
        <div class="help-note">Semua support hanya via ticket Discord — tidak via DM personal biar aman & tercatat.</div>
      </div>
    </div>
  </div>
</section>

<section class="community" id="komunitas">
  <div class="community-card">
    <div>
      <div class="eyebrow">KOMUNITAS / DISCORD</div>
      <h2>Gabung komunitas <span>ZerionX-Team | Store</span></h2>
      <p class="sub">
        Ini adalah server Discord resmi sekaligus store komunitas Zerion-X —
        tempat beli Core-X 2.0, tanya bantuan setup, dapat panduan sensitivitas,
        info update terbaru,Panduan lengkap. Admin fast respon
        setiap hari, semua transaksi aman dan tercatat.
      </p>
      <div class="com-points">
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 7h12l-1 9a2 2 0 01-2 2H9a2 2 0 01-2-2L6 7z"/><path d="M9 7V5a3 3 0 016 0v2"/><path d="M9 11h6"/></svg> Store resmi</span>
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l1-1a1 1 0 000-1.4l-1.6-1.6a1 1 0 00-1.4 0l-1 1z"/><path d="M12 11l-4 4a2 2 0 000 2.8l1.2 1.2a2 2 0 002.8 0l4-4"/><path d="M12 11l3-3"/><circle cx="12" cy="12" r="3" opacity="0"/></svg> Bantuan setup</span>
        <span><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 17h5l-1.5-1.5"/><path d="M6 17a3 3 0 010-6 3 3 0 010 6z"/><path d="M13 11a5 5 0 015 6"/><path d="M13 8a8 8 0 018 9"/></svg> Update & event</span>
      </div>
    </div>
    <div class="discord-box">
      <div class="srv">
        <div class="discord-dot">Z</div>
        <div>
          <b>ZerionX-Team | Store</b>
          <small><span style="color:#3ddc84">●</span> Komunitas Discord • Store & Support</small>
        </div>
      </div>
      <div class="discord-url">discord.gg/56t4Xghq7</div>
      <a class="btn-join" href="https://discord.gg/56t4Xghq7" target="_blank" rel="noopener">Join Discord <span>↗</span></a>
      <div class="discord-note">Klik Join untuk membuka invite di tab baru</div>
    </div>
  </div>
</section>

<section class="features">
  <div class="feat">
    <div class="ic">⌘</div>
    <div><h4>Untuk pemula & pro</h4><p>Pilihan paket & artikel panduan</p></div>
  </div>
  <div class="feat">
    <div class="ic">◷</div>
    <div><h4>Update Berkala</h4><p>Selalu rilis versi terbaru</p></div>
  </div>
  <div class="feat">
    <div class="ic">↗</div>
    <div><h4>Tetap terhubung</h4><p>Follow update & rilis terbaru</p></div>
  </div>
</section>

<script>
  // super-smooth 3D tilt: double smoothing + delta-time damping, tanpa toFixed biar tidak patah
  const wrap = document.querySelector('.cube-wrap');
  const cube = document.querySelector('.glass-cube');
  const glowEl = document.querySelector('.glow');
  const BASE_RX = -8;
  const raw = { rx: BASE_RX, ry: 0, tx: 0, ty: 0, s: 1 };
  const tgt = { ...raw };
  const cur = { ...raw };
  const shineT = { x: 30, y: 20 };
  const shine = { ...shineT };
  let hovering = false;
  let startT = performance.now();
  let lastT = startT;

  wrap.addEventListener('pointermove', e=>{
    const r = wrap.getBoundingClientRect();
    const px = (e.clientX - (r.left + r.width/2)) / r.width;
    const py = (e.clientY - (r.top + r.height/2)) / r.height;
    const cx = Math.max(-.6, Math.min(.6, px));
    const cy = Math.max(-.6, Math.min(.6, py));
    raw.ry = cx * 14;
    raw.rx = BASE_RX - cy * 12;
    raw.tx = cx * 12;
    raw.ty = cy * 10;
    raw.s = 1.045;
    shineT.x = (cx + .5) * 100;
    shineT.y = (cy + .5) * 100;
    hovering = true;
  });
  wrap.addEventListener('pointerenter', ()=>{ hovering = true; });
  wrap.addEventListener('pointerleave', ()=>{
    hovering = false;
    raw.rx = BASE_RX; raw.ry = 0; raw.tx = 0; raw.ty = 0; raw.s = 1;
    shineT.x = 30; shineT.y = 20;
  });

  function loop(now){
    let dt = (now - lastT) / 1000;
    lastT = now;
    if(dt > .05) dt = .05;
    if(dt <= 0) dt = 1/60;
    const t = (now - startT) / 1000;

    // 1) target dihaluskan dulu (anti jitter saat mouse gerak cepat)
    const kT = 1 - Math.exp(-10 * dt);
    tgt.rx += (raw.rx - tgt.rx) * kT;
    tgt.ry += (raw.ry - tgt.ry) * kT;
    tgt.tx += (raw.tx - tgt.tx) * kT;
    tgt.ty += (raw.ty - tgt.ty) * kT;
    tgt.s  += (raw.s  - tgt.s)  * kT;

    // 2) posisi aktual mengejar target dengan lambat → buttery smooth
    const damp = hovering ? 2.4 : 1.7;
    const kC = 1 - Math.exp(-damp * dt);
    cur.rx += (tgt.rx - cur.rx) * kC;
    cur.ry += (tgt.ry - cur.ry) * kC;
    cur.tx += (tgt.tx - cur.tx) * kC;
    cur.ty += (tgt.ty - cur.ty) * kC;
    cur.s  += (tgt.s  - cur.s)  * kC;

    // kilau kaca juga di-lerp, jangan langsung set
    const kS = 1 - Math.exp(-3.2 * dt);
    shine.x += (shineT.x - shine.x) * kS;
    shine.y += (shineT.y - shine.y) * kS;

    // idle float pelan & lembut
    const floatY = Math.sin(t * 1.05) * 7;
    const floatR = Math.sin(t * .7) * 1.1;

    if(cube){
      cube.style.setProperty('--mx', shine.x + '%');
      cube.style.setProperty('--my', shine.y + '%');
      cube.style.transform =
        'translate3d(' + cur.tx + 'px,' + (cur.ty + floatY) + 'px,0)' +
        ' rotateX(' + cur.rx + 'deg) rotateY(' + cur.ry + 'deg)' +
        ' rotateZ(' + (BASE_RX + floatR) + 'deg) scale(' + cur.s + ')';
    }
    if(glowEl){
      glowEl.style.transform =
        'translate(' + (cur.tx * -.55) + 'px,' + (cur.ty * -.55) + 'px) scale(' + cur.s + ')';
      const targetOp = hovering ? .95 : .72;
      const curOp = parseFloat(glowEl.style.opacity || '.72');
      glowEl.style.opacity = curOp + (targetOp - curOp) * kC;
    }
    requestAnimationFrame(loop);
  }
  requestAnimationFrame(loop);
</script>
</body>
</html>
