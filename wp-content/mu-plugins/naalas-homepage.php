<?php
/**
 * Plugin Name: Naalas Homepage
 * Description: Professional multi-page homepage for Naalas Rice Store.
 */

add_action('wp_head', function () {
    if (!is_front_page()) return;
    echo '<title>Naalas Rice Store | Fresh Rice Wholesale – Sangareddy, Telangana</title>';
    echo '<meta name="description" content="Naalas Rice Store – Sangareddy\'s trusted wholesale rice supplier. Gajraj, Sona Masoori, JSR, HMT & more. Home delivery ₹50. WhatsApp: +91 77994 55932.">';
    echo '<meta name="robots" content="index,follow">';
    echo '<meta property="og:title" content="Naalas Rice Store – Fresh Rice, Sangareddy">';
    echo '<meta property="og:description" content="Premium rice brands at wholesale prices. Home delivery ₹50 within 5 km.">';
    echo '<link rel="canonical" href="https://naalas.in">';
    echo '<script type="application/ld+json">{"@context":"https://schema.org","@type":"LocalBusiness","name":"Naalas Rice Store","telephone":"+917799455932","address":{"@type":"PostalAddress","streetAddress":"Plot No. 309, 15-72, Housing Board Colony","addressLocality":"Sangareddy","addressRegion":"Telangana","postalCode":"502001","addressCountry":"IN"},"openingHoursSpecification":[{"@type":"OpeningHoursSpecification","dayOfWeek":["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"opens":"08:00","closes":"20:00"},{"@type":"OpeningHoursSpecification","dayOfWeek":"Sunday","opens":"09:00","closes":"17:00"}]}</script>';
}, 1);

add_action('wp_head', function () {
    if (!is_front_page()) return;
    echo '<style>
    #masthead,.site-header,.main-header-bar-wrap,.ast-above-header-wrap,.ast-below-header-wrap,.ast-primary-sticky-header-wrap,#ast-fixed-header{display:none!important}
    body.home .entry-title,body.page-id-17 .entry-title,.ast-breadcrumbs-wrapper{display:none!important}
    body.home .entry-content,body.page-id-17 .entry-content{padding:0!important;max-width:100%!important}
    body.home .ast-container,body.page-id-17 .ast-container{max-width:100%!important;padding:0!important}
    body.home #content,body.page-id-17 #content,body.home .site-content,body.page-id-17 .site-content{padding:0!important;margin-top:0!important}
    body.home .ast-separate-container .ast-article-single,body.page-id-17 .ast-separate-container .ast-article-single{padding:0!important;margin:0!important}
    </style>';
}, 1);

add_shortcode('naalas_home', 'naalas_home_shortcode');

function naalas_home_shortcode() {
    if (!function_exists('wc_get_products')) return '<p>WooCommerce not active.</p>';

    $wa       = '917799455932';
    $products = wc_get_products(['status'=>'publish','limit'=>-1,'orderby'=>'menu_order','order'=>'ASC']);
    $imgs     = get_posts(['post_type'=>'attachment','post_mime_type'=>'image','numberposts'=>-1,'post_status'=>'inherit','orderby'=>'ID','order'=>'ASC','exclude'=>[9,16]]);
    $ab1      = !empty($imgs[0]) ? wp_get_attachment_image_url($imgs[0]->ID,'large')  : '';
    $ab2      = !empty($imgs[1]) ? wp_get_attachment_image_url($imgs[1]->ID,'medium') : '';

    $svg = '<svg viewBox="0 0 28 28" fill="none"><ellipse cx="14" cy="10" rx="5.5" ry="8.5" fill="#1a3a2a" transform="rotate(-15 14 10)"/><ellipse cx="14" cy="10" rx="3.2" ry="6" fill="#2d6a4f" transform="rotate(-15 14 10)"/><line x1="14" y1="18" x2="14" y2="27" stroke="#1a3a2a" stroke-width="2.2" stroke-linecap="round"/><line x1="14" y1="23" x2="10" y2="20" stroke="#1a3a2a" stroke-width="1.6" stroke-linecap="round"/><line x1="14" y1="23" x2="18" y2="20" stroke="#1a3a2a" stroke-width="1.6" stroke-linecap="round"/></svg>';

    ob_start(); ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
.nw*{box-sizing:border-box;margin:0;padding:0}
.nw{font-family:'Poppins',sans-serif;color:#1a2a1e;width:100%}
.nf{width:100vw;position:relative;left:50%;margin-left:-50vw}
:root{--gd:#1a3a2a;--gm:#2d6a4f;--gl:#52b788;--gp:#d8f3dc;--gold:#e9b949;--wa:#25d366;--bg:#f7faf5;--br:#d0e8d8;--txl:#6b7c71;--s1:0 2px 8px rgba(26,58,42,.08);--s2:0 6px 24px rgba(26,58,42,.13)}

/* ANNOUNCE */
.n-bar{background:var(--gd);color:rgba(255,255,255,.85);text-align:center;padding:8px 20px;font-size:12.5px;font-weight:500;display:flex;align-items:center;justify-content:center;gap:20px;flex-wrap:wrap}
.n-bar a{color:var(--gold);text-decoration:none;font-weight:700}
.n-sep{opacity:.3}

/* NAV */
.n-nav{position:sticky;top:0;z-index:9999;background:rgba(26,58,42,.97);backdrop-filter:blur(12px);padding:0 50px;display:flex;align-items:center;justify-content:space-between;height:64px;box-shadow:0 3px 16px rgba(0,0,0,.18)}
.n-logo{display:flex;align-items:center;gap:10px;text-decoration:none;flex-shrink:0}
.n-logo-icon{width:40px;height:40px;background:linear-gradient(135deg,var(--gold),#f5c430);border-radius:10px;display:flex;align-items:center;justify-content:center}
.n-logo-icon svg{width:24px;height:24px}
.n-logo-name{font-size:18px;font-weight:900;color:#fff;letter-spacing:-.5px;line-height:1.1}
.n-logo-sub{font-size:9px;font-weight:500;color:rgba(255,255,255,.5);letter-spacing:2px;text-transform:uppercase}
.n-links{display:flex;align-items:center;gap:2px}
.n-links a{color:rgba(255,255,255,.75);text-decoration:none;font-size:13.5px;font-weight:500;padding:7px 12px;border-radius:7px;transition:all .2s;cursor:pointer}
.n-links a:hover,.n-links a.active{color:#fff;background:rgba(255,255,255,.12)}
.n-links a.active{background:rgba(82,183,136,.25);color:var(--gl)}
.n-order{background:var(--wa)!important;color:#fff!important;border-radius:28px!important;padding:8px 18px!important;font-weight:700!important;font-size:13px!important}
.n-order:hover{background:#20bb5a!important}
.n-hbg{display:none;flex-direction:column;gap:5px;cursor:pointer;background:rgba(255,255,255,.1);border:none;border-radius:7px;padding:8px}
.n-hbg span{display:block;width:20px;height:2px;background:#fff;border-radius:2px;transition:all .3s}
.n-hbg.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.n-hbg.open span:nth-child(2){opacity:0}
.n-hbg.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}

/* MOBILE MENU */
.n-mmenu{display:none;position:fixed;top:64px;left:0;right:0;background:rgba(20,44,32,.98);backdrop-filter:blur(16px);padding:16px;flex-direction:column;gap:4px;z-index:9998;border-bottom:2px solid rgba(82,183,136,.25)}
.n-mmenu.open{display:flex}
.n-mmenu a{color:rgba(255,255,255,.85);text-decoration:none;font-size:15px;font-weight:600;padding:11px 16px;border-radius:9px;cursor:pointer}
.n-mmenu a:hover{background:rgba(255,255,255,.1);color:#fff}
.n-mmenu a.active{background:rgba(82,183,136,.2);color:var(--gl)}
.n-mmenu .n-order{background:var(--wa)!important;text-align:center;margin-top:6px}

/* PAGE SECTIONS */
.n-page{display:none}
.n-page.active{display:block}

/* ---- HOME PAGE ---- */
.n-hero{background:linear-gradient(135deg,var(--gd) 0%,#1e4d35 55%,#163a29 100%);position:relative;overflow:hidden;padding:50px 50px 44px;display:flex;align-items:center;justify-content:space-between;gap:40px}
.n-hero::before{content:'';position:absolute;top:-80px;right:-80px;width:420px;height:420px;background:radial-gradient(circle,rgba(82,183,136,.15) 0%,transparent 70%);pointer-events:none}
.n-hero-text{flex:1;max-width:560px;position:relative;z-index:2}
.n-badge{display:inline-flex;align-items:center;gap:7px;background:rgba(82,183,136,.2);border:1px solid rgba(82,183,136,.35);color:#95e0b8;font-size:12px;font-weight:600;padding:5px 15px;border-radius:28px;margin-bottom:20px}
.n-hero h1{color:#fff;font-size:42px;font-weight:800;line-height:1.18;margin-bottom:16px;letter-spacing:-.8px}
.n-hero h1 span{color:var(--gold)}
.n-hero-sub{color:rgba(255,255,255,.72);font-size:15px;line-height:1.7;margin-bottom:28px;max-width:440px}
.n-btns{display:flex;gap:12px;flex-wrap:wrap}
.n-btn-g{display:inline-flex;align-items:center;gap:7px;background:var(--gold);color:var(--gd);padding:12px 26px;border-radius:40px;font-size:14px;font-weight:700;text-decoration:none;transition:all .2s;box-shadow:0 4px 14px rgba(233,185,73,.35);cursor:pointer}
.n-btn-g:hover{transform:translateY(-2px);background:#f0c832;color:var(--gd)}
.n-btn-w{display:inline-flex;align-items:center;gap:7px;background:var(--wa);color:#fff;padding:12px 26px;border-radius:40px;font-size:14px;font-weight:700;text-decoration:none;transition:all .2s}
.n-btn-w:hover{transform:translateY(-2px);background:#20bb5a}
.n-hero-tags{display:grid;grid-template-columns:1fr 1fr;gap:10px;width:280px;flex-shrink:0;position:relative;z-index:2}
.n-htag{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:10px;padding:10px 12px;color:rgba(255,255,255,.9);font-size:12px;font-weight:500;display:flex;align-items:center;gap:7px;backdrop-filter:blur(8px)}
.n-htag .dot{width:7px;height:7px;background:var(--gl);border-radius:50%;flex-shrink:0}

/* STATS */
.n-stats{background:#fff;border-top:3px solid var(--gd);border-bottom:1px solid var(--br);display:grid;grid-template-columns:repeat(4,1fr)}
.n-stat{text-align:center;padding:12px 10px;border-right:1px solid var(--br)}
.n-stat:last-child{border-right:none}
.n-stat-n{font-size:24px;font-weight:800;color:var(--gd);line-height:1;margin-bottom:3px}
.n-stat-n span{color:#c9971a}
.n-stat-l{font-size:11.5px;color:var(--txl);font-weight:500}

/* HOME FEATURED PRODUCTS */
.n-feat-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:0}
.n-view-all{display:flex;align-items:center;justify-content:center;gap:8px;background:var(--gd);color:#fff;padding:12px 32px;border-radius:40px;font-size:14px;font-weight:700;text-decoration:none;transition:all .2s;cursor:pointer;border:none;font-family:'Poppins',sans-serif}
.n-view-all:hover{background:var(--gm);transform:translateY(-1px)}

/* HOME QUICK WHY */
.n-qwhy{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.n-qw{background:#fff;border:1px solid var(--br);border-radius:12px;padding:18px 16px;display:flex;align-items:flex-start;gap:12px;box-shadow:var(--s1)}
.n-qw-ic{font-size:22px;flex-shrink:0}
.n-qw strong{display:block;font-size:13px;font-weight:700;color:var(--gd);margin-bottom:3px}
.n-qw span{font-size:12px;color:var(--txl);line-height:1.5}

/* WA CTA STRIP */
.n-wa-strip{background:linear-gradient(135deg,#1a3a2a,#0f2418);padding:30px 50px;text-align:center}
.n-wa-strip h2{font-size:26px;font-weight:800;color:#fff;margin-bottom:10px}
.n-wa-strip h2 span{color:var(--gold)}
.n-wa-strip p{font-size:14px;color:rgba(255,255,255,.65);margin-bottom:24px;line-height:1.6}
.n-wa-big{display:inline-flex;align-items:center;gap:10px;background:var(--wa);color:#fff;padding:14px 36px;border-radius:50px;font-size:16px;font-weight:800;text-decoration:none;transition:all .2s;box-shadow:0 6px 24px rgba(37,211,102,.4)}
.n-wa-big:hover{transform:translateY(-2px);background:#20bb5a}
.n-wa-ph{margin-top:14px;color:var(--gl);font-size:13px;font-weight:500}

/* ---- PRODUCT CARDS ---- */
.n-prod-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.n-card{background:#fff;border:1px solid var(--br);border-radius:12px;overflow:hidden;transition:all .3s;box-shadow:var(--s1);display:flex;flex-direction:column}
.n-card:hover{transform:translateY(-3px);box-shadow:var(--s2);border-color:var(--gl)}
/* Contain shows full bag — white bg hides empty areas cleanly */
.n-card-img{position:relative;height:220px;overflow:hidden;background:#ffffff;display:flex;align-items:center;justify-content:center}
.n-card-img img{max-width:90%;max-height:210px;width:auto;height:auto;object-fit:contain;transition:transform .38s;filter:drop-shadow(0 4px 14px rgba(0,0,0,.15))}
.n-card:hover .n-card-img img{transform:scale(1.07) translateY(-4px)}
.n-card-ph{font-size:60px;opacity:.25}
.n-card-bd{position:absolute;top:8px;left:8px;background:var(--gd);color:#fff;font-size:9px;font-weight:700;padding:3px 8px;border-radius:5px;letter-spacing:.5px;text-transform:uppercase}
.n-card-bd.gold{background:var(--gold);color:var(--gd)}
.n-card-bd.purple{background:#7c3aed}
.n-card-body{padding:10px 12px 14px;flex:1;display:flex;flex-direction:column}
.n-card-br{font-size:10px;font-weight:700;color:var(--gl);text-transform:uppercase;letter-spacing:.8px;margin-bottom:2px}
.n-card-name{font-size:14px;font-weight:700;color:var(--gd);margin-bottom:2px;line-height:1.3}
.n-card-desc{font-size:11px;color:var(--txl);margin-bottom:8px;line-height:1.4;flex:1}
.n-card-price{font-size:18px;font-weight:800;color:var(--gd);margin-bottom:3px}
.n-card-price span{font-size:10px;font-weight:500;color:var(--txl)}
.n-card-foot{display:flex;align-items:center;justify-content:space-between;gap:6px;margin-top:auto}
.n-sizes{display:flex;gap:3px;flex-wrap:wrap}
.n-sz{background:var(--gp);border:1px solid var(--gl);color:var(--gm);font-size:10px;font-weight:600;padding:2px 6px;border-radius:4px}
.n-order-btn{display:inline-flex;align-items:center;gap:4px;background:var(--wa);color:#fff;text-decoration:none;padding:6px 11px;border-radius:22px;font-size:11px;font-weight:700;white-space:nowrap;transition:all .2s;flex-shrink:0}
.n-order-btn:hover{background:#20bb5a}
.n-bulk{background:#fffbeb;border:1px solid #f59e0b;color:#92400e;font-size:10px;font-weight:600;padding:4px 8px;border-radius:6px;margin-top:6px;text-align:center}

/* HOW TO ORDER */
.n-steps{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:8px}
.n-step{text-align:center}
.n-step-n{width:60px;height:60px;background:linear-gradient(135deg,var(--gd),var(--gm));border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:22px;font-weight:900;color:#fff;box-shadow:0 4px 16px rgba(26,58,42,.3)}
.n-step h3{font-size:15px;font-weight:700;color:var(--gd);margin-bottom:6px}
.n-step p{font-size:12.5px;color:var(--txl);line-height:1.6;max-width:180px;margin:0 auto}

/* ---- ABOUT PAGE ---- */
.n-about-grid{display:grid;grid-template-columns:1fr 1fr;gap:50px;align-items:center}
.n-about-img-wrap{position:relative;padding-bottom:24px}
.n-about-img-main{border-radius:20px;overflow:hidden;box-shadow:0 16px 48px rgba(26,58,42,.18);background:linear-gradient(135deg,#e8f5ee,#d4edd9)}
.n-about-img-main img{width:100%;height:320px;object-fit:contain;display:block;padding:20px;filter:drop-shadow(0 4px 12px rgba(26,58,42,.15))}
.n-about-img-main-ph{height:320px;display:flex;align-items:center;justify-content:center;font-size:70px;opacity:.3}
.n-about-img-acc{position:absolute;bottom:0;right:-16px;width:150px;border-radius:14px;overflow:hidden;border:4px solid #fff;box-shadow:var(--s2);background:linear-gradient(135deg,#e8f5ee,#d4edd9)}
.n-about-img-acc img{width:100%;height:110px;object-fit:contain;padding:8px;display:block}
.n-about-tag{display:inline-block;background:var(--gp);color:var(--gm);font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:4px 14px;border-radius:28px;margin-bottom:12px}
.n-about-title{font-size:28px;font-weight:800;color:var(--gd);line-height:1.25;margin-bottom:16px;letter-spacing:-.4px}
.n-about-title span{color:var(--gl)}
.n-about-p{font-size:14px;color:#3d5246;line-height:1.8;margin-bottom:12px}
.n-hls{margin:16px 0;display:flex;flex-direction:column;gap:10px}
.n-hl{display:flex;align-items:flex-start;gap:12px;background:var(--bg);border:1px solid var(--br);border-radius:9px;padding:12px 14px}
.n-hl:hover{border-color:var(--gl)}
.n-hl-ic{font-size:18px;flex-shrink:0;margin-top:1px}
.n-hl strong{display:block;font-size:13px;font-weight:700;color:var(--gd);margin-bottom:2px}
.n-hl span{font-size:12px;color:var(--txl);line-height:1.5}

/* DELIVERY BANNER */
.n-del{background:linear-gradient(135deg,var(--gold),#f5c842);padding:24px 50px;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap}
.n-del-l{display:flex;align-items:center;gap:16px}
.n-del-ic{font-size:36px}
.n-del h3{font-size:18px;font-weight:800;color:var(--gd);margin-bottom:3px}
.n-del p{font-size:13px;color:#3d5246}
.n-del-btn{background:var(--gd);color:#fff;padding:11px 24px;border-radius:40px;font-size:13px;font-weight:700;text-decoration:none;transition:all .2s;flex-shrink:0;display:inline-flex;align-items:center;gap:7px}
.n-del-btn:hover{background:var(--gm)}

/* ---- WHY US ---- */
.n-why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.n-why{background:#fff;border:1px solid var(--br);border-radius:14px;padding:22px 18px;transition:all .3s;box-shadow:var(--s1);position:relative;overflow:hidden}
.n-why::before{content:'';position:absolute;top:0;left:0;width:4px;height:100%;background:var(--gl);transform:scaleY(0);transition:transform .3s;transform-origin:bottom}
.n-why:hover{transform:translateY(-3px);box-shadow:var(--s2);border-color:var(--gl)}
.n-why:hover::before{transform:scaleY(1)}
.n-why-ic{width:48px;height:48px;background:var(--gp);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;margin-bottom:12px}
.n-why-t{font-size:14px;font-weight:700;color:var(--gd);margin-bottom:6px}
.n-why-p{font-size:12.5px;color:var(--txl);line-height:1.7}

/* REVIEWS */
.n-rv-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.n-rv{background:#fff;border:1px solid var(--br);border-radius:14px;padding:20px;box-shadow:var(--s1);transition:all .3s;position:relative}
.n-rv:hover{box-shadow:var(--s2);border-color:var(--gl);transform:translateY(-3px)}
.n-rv::before{content:'\201C';position:absolute;top:12px;right:18px;font-size:52px;color:var(--gp);font-family:Georgia,serif;line-height:1}
.n-rv-stars{color:#f59e0b;font-size:14px;letter-spacing:1px;margin-bottom:10px}
.n-rv-text{font-size:13px;color:#3d5246;line-height:1.7;margin-bottom:14px;font-style:italic}
.n-rv-author{display:flex;align-items:center;gap:10px}
.n-rv-av{width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--gd),var(--gm));display:flex;align-items:center;justify-content:center;color:#fff;font-size:15px;font-weight:700;flex-shrink:0}
.n-rv-name{font-size:13px;font-weight:700;color:var(--gd)}
.n-rv-loc{font-size:11px;color:var(--txl)}
.n-rv-bdg{display:inline-block;background:var(--gp);color:var(--gm);font-size:9.5px;font-weight:700;padding:2px 7px;border-radius:4px;margin-top:2px}

/* ---- CONTACT PAGE ---- */
.n-contact-grid{display:grid;grid-template-columns:1fr 1fr;gap:40px;align-items:start}
.n-contact-cards{display:flex;flex-direction:column;gap:14px}
.n-cc{background:#fff;border:1px solid var(--br);border-radius:12px;padding:18px 20px;display:flex;align-items:flex-start;gap:14px;box-shadow:var(--s1);transition:all .2s}
.n-cc:hover{box-shadow:var(--s2);border-color:var(--gl);transform:translateX(3px)}
.n-cc-ic{width:44px;height:44px;background:var(--gp);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:19px;flex-shrink:0}
.n-cc h4{font-size:11px;font-weight:700;color:var(--txl);text-transform:uppercase;letter-spacing:.7px;margin-bottom:4px}
.n-cc p{font-size:13.5px;font-weight:600;color:var(--gd);line-height:1.65}
.n-cc a{color:var(--gm);text-decoration:none}
.n-cc a:hover{color:var(--gl);text-decoration:underline}
.n-map-box{border-radius:14px;background:linear-gradient(135deg,#c8f0d8,#b0e8c8);min-height:360px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:16px;padding:36px;text-align:center;border:1px solid var(--br);box-shadow:var(--s2)}
.n-map-ic{font-size:52px}
.n-map-box h3{font-size:18px;font-weight:700;color:var(--gd)}
.n-map-addr{font-size:13px;color:#3d5246;line-height:1.85;font-weight:500}
.n-map-btn{display:inline-flex;align-items:center;gap:7px;background:var(--gd);color:#fff;padding:11px 24px;border-radius:28px;font-size:13px;font-weight:700;text-decoration:none;transition:all .2s;box-shadow:0 4px 14px rgba(26,58,42,.25)}
.n-map-btn:hover{background:var(--gm);transform:translateY(-1px)}

/* ---- SHARED ---- */
.n-sec{padding:32px 50px}
.n-sec-wh{background:#fff}
.n-sec-bg{background:var(--bg)}
.n-sh{text-align:center;margin-bottom:22px}
.n-tag{display:inline-block;background:var(--gp);color:var(--gm);font-size:10px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:3px 12px;border-radius:28px;margin-bottom:8px}
.n-h2{font-size:26px;font-weight:800;color:var(--gd);line-height:1.2;margin-bottom:6px;letter-spacing:-.4px}
.n-h2 span{color:var(--gl)}
.n-sub{font-size:13px;color:var(--txl);max-width:500px;margin:0 auto;line-height:1.6}

/* ---- FOOTER ---- */
.n-ft{background:#0d1f14;padding:44px 50px 0}
.n-ftg{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:32px;padding-bottom:40px;border-bottom:1px solid rgba(255,255,255,.08)}
.n-ft-lw{display:flex;align-items:center;gap:10px;margin-bottom:12px}
.n-ft-li{width:34px;height:34px;background:linear-gradient(135deg,var(--gold),#f5c430);border-radius:8px;display:flex;align-items:center;justify-content:center}
.n-ft-li svg{width:20px;height:20px}
.n-ft-brand{font-size:15px;font-weight:800;color:#fff;letter-spacing:-.3px}
.n-ft-brand span{display:block;font-size:9px;font-weight:500;color:rgba(255,255,255,.4);letter-spacing:2px;text-transform:uppercase}
.n-ft-desc{font-size:12px;color:rgba(255,255,255,.4);line-height:1.7;margin-bottom:16px}
.n-ft-wa{display:inline-flex;align-items:center;gap:7px;background:var(--wa);color:#fff;padding:8px 16px;border-radius:28px;font-size:12px;font-weight:700;text-decoration:none}
.n-ft h4{font-size:11px;font-weight:700;color:var(--gl);text-transform:uppercase;letter-spacing:1px;margin-bottom:14px}
.n-ft-links{display:flex;flex-direction:column;gap:8px}
.n-ft-links a{font-size:12.5px;color:rgba(255,255,255,.45);text-decoration:none;transition:color .2s;cursor:pointer}
.n-ft-links a:hover{color:var(--gl)}
.n-ft-ci{display:flex;align-items:flex-start;gap:8px;margin-bottom:10px}
.n-ft-ci span{font-size:14px;flex-shrink:0;margin-top:1px}
.n-ft-ci p{font-size:12px;color:rgba(255,255,255,.45);line-height:1.55}
.n-ft-ci a{color:rgba(255,255,255,.45);text-decoration:none}
.n-ft-bot{padding:16px 0;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px}
.n-ft-bot p{font-size:11.5px;color:rgba(255,255,255,.25)}
.n-ft-bot span{color:var(--gl)}

/* FLOAT WA */
.n-fwa{position:fixed;bottom:24px;right:24px;z-index:9999;width:54px;height:54px;background:var(--wa);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:24px;text-decoration:none;box-shadow:0 5px 20px rgba(37,211,102,.5);animation:np 2.5s infinite;transition:transform .2s}
.n-fwa:hover{transform:scale(1.1)}
@keyframes np{0%,100%{box-shadow:0 5px 20px rgba(37,211,102,.5)}50%{box-shadow:0 5px 36px rgba(37,211,102,.8)}}

/* ---- RESPONSIVE ---- */
@media(max-width:900px){
  .n-nav,.n-sec,.n-hero,.n-del,.n-wa-strip,.n-ft{padding-left:24px!important;padding-right:24px!important}
  .n-prod-grid,.n-feat-grid{grid-template-columns:repeat(2,1fr)}
  .n-why-grid,.n-rv-grid{grid-template-columns:repeat(2,1fr)}
  .n-ftg{grid-template-columns:1fr 1fr}
  .n-about-grid,.n-contact-grid{grid-template-columns:1fr}
  .n-steps{grid-template-columns:1fr 1fr}
  .n-qwhy{grid-template-columns:1fr}
}
@media(max-width:600px){
  .n-nav{padding:0 14px!important;height:56px}
  .n-links{display:none!important}
  .n-hbg{display:flex}
  .n-hero{padding:36px 14px 32px!important;flex-direction:column;text-align:center}
  .n-hero h1{font-size:24px}
  .n-hero-sub{font-size:13px;margin-bottom:20px}
  .n-hero-tags{display:none}
  .n-btns{justify-content:center}
  .n-stats{grid-template-columns:repeat(2,1fr)}
  .n-stat{border-right:none;border-bottom:1px solid var(--br);padding:10px 6px}
  .n-stat:nth-child(odd){border-right:1px solid var(--br)}
  .n-stat:last-child,.n-stat:nth-last-child(2){border-bottom:none}
  .n-stat-n{font-size:20px}
  .n-sec{padding:24px 14px!important}
  .n-prod-grid,.n-feat-grid,.n-why-grid,.n-rv-grid{grid-template-columns:1fr}
  .n-about-img-acc{display:none}
  .n-steps{grid-template-columns:1fr}
  .n-del{padding:16px 14px!important;flex-direction:column;text-align:center}
  .n-qwhy{grid-template-columns:1fr}
  .n-ftg{grid-template-columns:1fr}
  .n-ft{padding:24px 14px 0!important}
  .n-wa-strip{padding:24px 14px!important}
  .n-wa-strip h2{font-size:20px}
  .n-ft-bot{flex-direction:column;text-align:center}
  .n-bar{font-size:11px;gap:8px;padding:6px 10px}
  .n-card-img{height:180px}
}
</style>

<?php
$site = get_site_url();
$wa_text_general = urlencode('Hello! I want to order rice from Naalas Rice Store, Sangareddy.');
?>

<div class="nw"><div class="nf">

<!-- ANNOUNCE BAR -->
<div class="n-bar">
  <span>&#x1F69A; Home delivery within 5 km &mdash; Only &#x20B9;50</span>
  <span class="n-sep">|</span>
  <span>&#x1F4DE; <a href="tel:+917799455932">+91 77994 55932</a></span>
  <span class="n-sep">|</span>
  <span>&#x23F0; Mon&ndash;Sat 8AM&ndash;8PM</span>
</div>

<!-- NAV -->
<nav class="n-nav" id="n-nav">
  <a class="n-logo" href="#" onclick="showPage('home');return false;">
    <div class="n-logo-icon"><?php echo $svg; ?></div>
    <div><div class="n-logo-name">Naalas</div><div class="n-logo-sub">Rice Store &bull; Sangareddy</div></div>
  </a>
  <div class="n-links">
    <a onclick="showPage('home')" data-page="home" class="active">Home</a>
    <a onclick="showPage('products')" data-page="products">Products</a>
    <a onclick="showPage('about')" data-page="about">About</a>
    <a onclick="showPage('whyus')" data-page="whyus">Why Us</a>
    <a onclick="showPage('contact')" data-page="contact">Contact</a>
    <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_text_general; ?>" class="n-order" target="_blank">&#x1F4AC; Order Now</a>
  </div>
  <button class="n-hbg" id="n-hbg"><span></span><span></span><span></span></button>
</nav>

<!-- MOBILE MENU -->
<div class="n-mmenu" id="n-mmenu">
  <a onclick="showPage('home');closeMM()" data-page="home" class="active">&#x1F3E0; Home</a>
  <a onclick="showPage('products');closeMM()" data-page="products">&#x1F33E; Products</a>
  <a onclick="showPage('about');closeMM()" data-page="about">&#x2139;&#xFE0F; About Us</a>
  <a onclick="showPage('whyus');closeMM()" data-page="whyus">&#x2705; Why Choose Us</a>
  <a onclick="showPage('contact');closeMM()" data-page="contact">&#x1F4CD; Contact</a>
  <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_text_general; ?>" class="n-order" target="_blank">&#x1F4AC; Order on WhatsApp</a>
</div>

<!-- ===================== PAGE: HOME ===================== -->
<div class="n-page active" id="page-home">
  <!-- HERO -->
  <div class="n-hero">
    <div class="n-hero-text">
      <div class="n-badge">&#x1F33E; Sangareddy, Telangana &bull; Your Local Rice Store</div>
      <h1>Fresh, Pure &amp; Premium<br><span>Rice</span> at Wholesale Prices</h1>
      <p class="n-hero-sub">We source the finest rice brands for families, hotels &amp; bulk buyers. Delivered fresh to your door for just &#x20B9;50.</p>
      <div class="n-btns">
        <a class="n-btn-g" onclick="showPage('products');return false;">&#x1F6D2; See Products</a>
        <a class="n-btn-w" href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_text_general; ?>" target="_blank">&#x1F4AC; WhatsApp Order</a>
      </div>
    </div>
    <div class="n-hero-tags">
      <?php foreach (array_slice($products, 0, 6) as $p): ?>
      <div class="n-htag"><span class="dot"></span><?php echo esc_html($p->get_name()); ?></div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- STATS -->
  <div class="n-stats">
    <div class="n-stat"><div class="n-stat-n"><?php echo count($products); ?><span>+</span></div><div class="n-stat-l">Rice Varieties</div></div>
    <div class="n-stat"><div class="n-stat-n">500<span>+</span></div><div class="n-stat-l">Happy Customers</div></div>
    <div class="n-stat"><div class="n-stat-n">&#x20B9;50</div><div class="n-stat-l">Delivery Charge</div></div>
    <div class="n-stat"><div class="n-stat-n">5<span>km</span></div><div class="n-stat-l">Delivery Radius</div></div>
  </div>

  <!-- ALL PRODUCTS on home — main selling focus -->
  <div class="n-sec n-sec-bg">
    <div class="n-sh">
      <div class="n-tag">Our Rice Products</div>
      <h2 class="n-h2">Order Any Bag — <span>WhatsApp Us!</span></h2>
      <p class="n-sub">Available in 5 kg, 10 kg &amp; 25 kg. Bulk orders welcome. Call or WhatsApp: <strong>+91 77994 55932</strong></p>
    </div>
    <div class="n-feat-grid">
      <?php foreach ($products as $product):
        $tid    = (int) get_post_meta($product->get_id(), '_thumbnail_id', true);
        $isrc   = $tid ? wp_get_attachment_image_src($tid, 'full') : false;
        $img    = $isrc ? $isrc[0] : '';
        $badge  = $product->get_attribute('Badge') ?: '';
        $brand  = $product->get_attribute('Brand') ?: '';
        $sizes  = $product->get_attribute('Available Sizes') ?: '';
        $bl     = strtolower($badge);
        $bcls   = ($bl==='premium') ? 'n-card-bd gold' : (in_array($bl,['special','andhra special']) ? 'n-card-bd purple' : 'n-card-bd');
        $wa_msg = urlencode('Hello! I want to order '.$product->get_name().' from Naalas Rice Store. Please share price and availability.');
        $price  = (float)$product->get_price();
        $desc   = wp_strip_all_tags($product->get_short_description());
        $sizes_a = array_filter(array_map('trim', explode(',', $sizes)));
      ?>
      <div class="n-card">
        <div class="n-card-img">
          <?php if ($img): ?><img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($product->get_name()); ?>" loading="lazy">
          <?php else: ?><div class="n-card-ph">&#x1F33E;</div><?php endif; ?>
          <?php if ($badge): ?><span class="<?php echo esc_attr($bcls); ?>"><?php echo esc_html($badge); ?></span><?php endif; ?>
        </div>
        <div class="n-card-body">
          <div class="n-card-br"><?php echo esc_html($brand); ?></div>
          <div class="n-card-name"><?php echo esc_html($product->get_name()); ?></div>
          <div class="n-card-desc"><?php echo esc_html($desc); ?></div>
          <?php if ($price > 0): ?><div class="n-card-price">&#x20B9;<?php echo number_format($price,0); ?> <span>starting price</span></div><?php endif; ?>
          <div class="n-card-foot">
            <div class="n-sizes"><?php foreach ($sizes_a as $sz): ?><span class="n-sz"><?php echo esc_html($sz); ?></span><?php endforeach; ?></div>
            <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_msg; ?>" class="n-order-btn" target="_blank">&#x1F4AC; Order</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- QUICK WHY US -->
  <div class="n-sec n-sec-wh">
    <div class="n-sh">
      <div class="n-tag">Why Naalas</div>
      <h2 class="n-h2">Trusted by <span>500+ Customers</span></h2>
    </div>
    <div class="n-qwhy">
      <div class="n-qw"><span class="n-qw-ic">&#x1F3C6;</span><div><strong>100% Genuine Brands</strong><span>Authentic rice directly from verified mills. No duplicates.</span></div></div>
      <div class="n-qw"><span class="n-qw-ic">&#x1F69A;</span><div><strong>Same-Day Delivery</strong><span>Order before 6 PM — delivered to your door same day.</span></div></div>
      <div class="n-qw"><span class="n-qw-ic">&#x1F4B0;</span><div><strong>Best Wholesale Price</strong><span>No middlemen. Lowest rates in Sangareddy for bulk orders.</span></div></div>
    </div>
  </div>

  <!-- WA CTA -->
  <div class="n-wa-strip">
    <h2>Order in 60 Seconds <span>on WhatsApp</span></h2>
    <p>Message us your rice variety &amp; quantity — we confirm instantly and deliver same day.</p>
    <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_text_general; ?>" class="n-wa-big" target="_blank">&#x1F4AC; Chat with Us Now</a>
    <p class="n-wa-ph">&#x1F4DE; +91 77994 55932 &nbsp;&bull;&nbsp; Mon&ndash;Sat 8AM&ndash;8PM</p>
  </div>
</div><!-- end page-home -->

<!-- ===================== PAGE: PRODUCTS ===================== -->
<div class="n-page" id="page-products">
  <div class="n-sec n-sec-bg">
    <div class="n-sh">
      <div class="n-tag">All Products</div>
      <h2 class="n-h2">Premium <span>Rice Collection</span></h2>
      <p class="n-sub">All varieties available in 5 kg, 10 kg &amp; 25 kg. Bulk orders always welcome — WhatsApp for wholesale pricing.</p>
    </div>
    <div class="n-prod-grid">
      <?php foreach ($products as $product):
        $brand   = $product->get_attribute('Brand') ?: '';
        $badge   = $product->get_attribute('Badge') ?: '';
        $sizes   = $product->get_attribute('Available Sizes') ?: '';
        $name    = $product->get_name();
        $desc    = wp_strip_all_tags($product->get_short_description());
        $price   = (float)$product->get_price();
        $tid     = (int)get_post_meta($product->get_id(), '_thumbnail_id', true);
        $isrc    = $tid ? wp_get_attachment_image_src($tid, 'full') : false;
        $img     = $isrc ? $isrc[0] : '';
        $wa_msg  = urlencode('Hello! I want to order '.$name.' from Naalas Rice Store. Please share price and availability.');
        $sizes_a = array_filter(array_map('trim', explode(',', $sizes)));
        $bl      = strtolower($badge);
        $bcls    = ($bl==='premium') ? 'n-card-bd gold' : (in_array($bl,['special','andhra special']) ? 'n-card-bd purple' : 'n-card-bd');
      ?>
      <div class="n-card">
        <div class="n-card-img">
          <?php if ($img): ?><img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy">
          <?php else: ?><div class="n-card-ph">&#x1F33E;</div><?php endif; ?>
          <?php if ($badge): ?><span class="<?php echo esc_attr($bcls); ?>"><?php echo esc_html($badge); ?></span><?php endif; ?>
        </div>
        <div class="n-card-body">
          <div class="n-card-br"><?php echo esc_html($brand); ?></div>
          <div class="n-card-name"><?php echo esc_html($name); ?></div>
          <div class="n-card-desc"><?php echo esc_html($desc); ?></div>
          <?php if ($price > 0): ?><div class="n-card-price">&#x20B9;<?php echo number_format($price,0); ?> <span>starting price</span></div><?php endif; ?>
          <div class="n-card-foot">
            <div class="n-sizes"><?php foreach ($sizes_a as $sz): ?><span class="n-sz"><?php echo esc_html($sz); ?></span><?php endforeach; ?></div>
            <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_msg; ?>" class="n-order-btn" target="_blank">&#x1F4AC; Order</a>
          </div>
          <div class="n-bulk">&#x1F4E6; Bulk orders welcome — WhatsApp for wholesale price</div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- HOW TO ORDER -->
  <div class="n-sec n-sec-wh">
    <div class="n-sh">
      <div class="n-tag">Simple Process</div>
      <h2 class="n-h2">Order in <span>3 Easy Steps</span></h2>
    </div>
    <div class="n-steps">
      <div class="n-step"><div class="n-step-n">1</div><h3>Browse &amp; Choose</h3><p>Pick your rice variety and quantity — 5 kg, 10 kg, or 25 kg bags.</p></div>
      <div class="n-step"><div class="n-step-n">2</div><h3>WhatsApp Us</h3><p>Send a quick WhatsApp message with your order. We confirm within minutes.</p></div>
      <div class="n-step"><div class="n-step-n">3</div><h3>We Deliver</h3><p>Fresh rice packed &amp; delivered to your door within 5 km for just &#x20B9;50.</p></div>
    </div>
    <div style="text-align:center;margin-top:28px;">
      <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_text_general; ?>" class="n-wa-big" target="_blank" style="font-size:14px;padding:12px 30px;">&#x1F4AC; Start Your Order on WhatsApp</a>
    </div>
  </div>
</div><!-- end page-products -->

<!-- ===================== PAGE: ABOUT ===================== -->
<div class="n-page" id="page-about">
  <div class="n-sec n-sec-bg">
    <div class="n-about-grid">
      <div class="n-about-img-wrap">
        <div class="n-about-img-main">
          <?php if ($ab1): ?><img src="<?php echo esc_url($ab1); ?>" alt="Naalas Rice Store" loading="lazy">
          <?php else: ?><div class="n-about-img-main-ph">&#x1F33E;</div><?php endif; ?>
        </div>
        <?php if ($ab2): ?><div class="n-about-img-acc"><img src="<?php echo esc_url($ab2); ?>" alt="Quality Rice" loading="lazy"></div><?php endif; ?>
      </div>
      <div>
        <div class="n-about-tag">Our Story</div>
        <h2 class="n-about-title">Sangareddy&rsquo;s Trusted <span>Rice Store</span></h2>
        <p class="n-about-p">Welcome to <strong>Naalas Rice Store</strong> — your trusted local partner for premium quality rice in Sangareddy, Telangana. We bring the finest, most trusted rice varieties directly to your home at prices that are always fair.</p>
        <p class="n-about-p">From individual families to hotels, dhabas and bulk buyers — we serve everyone with the same honesty, care and speed. Good rice makes every meal special, and that is our promise.</p>
        <div class="n-hls">
          <div class="n-hl"><span class="n-hl-ic">&#x1F33E;</span><div><strong>Sourced from Trusted Mills</strong><span>Every brand we stock is authentic and verified — no duplicates or low-quality products.</span></div></div>
          <div class="n-hl"><span class="n-hl-ic">&#x2696;&#xFE0F;</span><div><strong>Accurate Weight Every Time</strong><span>All bags sealed and weighed on calibrated scales. You get exactly what you pay for.</span></div></div>
          <div class="n-hl"><span class="n-hl-ic">&#x1F6D2;</span><div><strong>Retail &amp; Wholesale Available</strong><span>Order 5 kg or 500 kg — we serve everyone with equal care and competitive pricing.</span></div></div>
        </div>
        <button class="n-btn-g" onclick="showPage('contact')" style="margin-top:8px;">&#x1F4CD; Find Our Store</button>
      </div>
    </div>
  </div>

  <!-- DELIVERY BANNER -->
  <div class="n-del">
    <div class="n-del-l"><span class="n-del-ic">&#x1F69A;</span><div><h3>Home Delivery — Only &#x20B9;50</h3><p>We deliver within 5 km in Sangareddy. Order on WhatsApp and rice arrives at your door!</p></div></div>
    <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hello!%20I%20want%20home%20delivery%20of%20rice%20in%20Sangareddy" class="n-del-btn" target="_blank">&#x1F4AC; Order Delivery</a>
  </div>
</div><!-- end page-about -->

<!-- ===================== PAGE: WHY US ===================== -->
<div class="n-page" id="page-whyus">
  <div class="n-sec n-sec-bg">
    <div class="n-sh">
      <div class="n-tag">Why Choose Us</div>
      <h2 class="n-h2">6 Reasons to Choose <span>Naalas</span></h2>
      <p class="n-sub">Built on quality, honesty and reliability — here is why Sangareddy trusts us every week.</p>
    </div>
    <div class="n-why-grid">
      <div class="n-why"><div class="n-why-ic">&#x1F3C6;</div><div class="n-why-t">100% Genuine Brands</div><p class="n-why-p">Only authentic, verified brands sourced from trusted mills. No counterfeits, no compromises — ever.</p></div>
      <div class="n-why"><div class="n-why-ic">&#x1F4B0;</div><div class="n-why-t">Best Wholesale Prices</div><p class="n-why-p">No middlemen. We pass savings to you. Best rates in Sangareddy for 5 kg, 10 kg and 25 kg bags.</p></div>
      <div class="n-why"><div class="n-why-ic">&#x2696;&#xFE0F;</div><div class="n-why-t">Accurate &amp; Sealed Bags</div><p class="n-why-p">Every bag weighed on calibrated scales and sealed. Exact weight guaranteed — no short measures.</p></div>
      <div class="n-why"><div class="n-why-ic">&#x1F69A;</div><div class="n-why-t">Same-Day Delivery</div><p class="n-why-p">Order before 6 PM for same-day delivery within 5 km. Just &#x20B9;50 delivery charge, always.</p></div>
      <div class="n-why"><div class="n-why-ic">&#x1F4AC;</div><div class="n-why-t">Easy WhatsApp Ordering</div><p class="n-why-p">One WhatsApp message is all it takes. No complicated checkout — we handle everything fast.</p></div>
      <div class="n-why"><div class="n-why-ic">&#x1F91D;</div><div class="n-why-t">Trusted by 500+ Customers</div><p class="n-why-p">Households, hotels, dhabas and businesses across Sangareddy rely on Naalas every single week.</p></div>
    </div>
  </div>

  <!-- REVIEWS -->
  <div class="n-sec n-sec-wh">
    <div class="n-sh">
      <div class="n-tag">Customer Reviews</div>
      <h2 class="n-h2">What Our <span>Customers Say</span></h2>
    </div>
    <div class="n-rv-grid">
      <div class="n-rv"><div class="n-rv-stars">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</div><p class="n-rv-text">&ldquo;We order 25 kg Sona Masoori every month. Quality is always fresh and weight is always exact. Never disappointed!&rdquo;</p><div class="n-rv-author"><div class="n-rv-av">R</div><div><div class="n-rv-name">Ramaiah Goud</div><div class="n-rv-loc">&#x1F4CD; Housing Board Colony</div><div class="n-rv-bdg">Regular Customer</div></div></div></div>
      <div class="n-rv"><div class="n-rv-stars">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</div><p class="n-rv-text">&ldquo;Best wholesale price in Sangareddy. I order rice for my hotel every week. JSR quality is excellent and always on time.&rdquo;</p><div class="n-rv-author"><div class="n-rv-av">S</div><div><div class="n-rv-name">Suresh Reddy</div><div class="n-rv-loc">&#x1F4CD; Sangareddy Town</div><div class="n-rv-bdg">Hotel Owner</div></div></div></div>
      <div class="n-rv"><div class="n-rv-stars">&#x2605;&#x2605;&#x2605;&#x2605;&#x2605;</div><p class="n-rv-text">&ldquo;Gajraj Evergreen rice taste bahut accha hai. WhatsApp pe order karo aur ghar pe mil jaata hai. Sabko recommend karta hun!&rdquo;</p><div class="n-rv-author"><div class="n-rv-av">M</div><div><div class="n-rv-name">Mohammed Aslam</div><div class="n-rv-loc">&#x1F4CD; Sangareddy</div><div class="n-rv-bdg">Loyal Customer</div></div></div></div>
    </div>
  </div>
</div><!-- end page-whyus -->

<!-- ===================== PAGE: CONTACT ===================== -->
<div class="n-page" id="page-contact">
  <div class="n-sec n-sec-bg">
    <div class="n-sh">
      <div class="n-tag">Find Us</div>
      <h2 class="n-h2">Visit Our <span>Store</span></h2>
      <p class="n-sub">Walk in or WhatsApp your order — we are always happy to serve you in Sangareddy.</p>
    </div>
    <div class="n-contact-grid">
      <div class="n-contact-cards">
        <div class="n-cc"><div class="n-cc-ic">&#x1F4CD;</div><div><h4>Store Address</h4><p>Plot No. 309, 15-72<br>Housing Board Colony<br>Sangareddy, Telangana &ndash; 502001</p></div></div>
        <div class="n-cc"><div class="n-cc-ic">&#x1F4DE;</div><div><h4>Phone / WhatsApp</h4><p><a href="tel:+917799455932">+91 77994 55932</a><br><a href="https://wa.me/<?php echo esc_attr($wa); ?>">Message on WhatsApp</a></p></div></div>
        <div class="n-cc"><div class="n-cc-ic">&#x1F55B;</div><div><h4>Business Hours</h4><p>Monday &ndash; Saturday: 8:00 AM &ndash; 8:00 PM<br>Sunday: 9:00 AM &ndash; 5:00 PM</p></div></div>
        <div class="n-cc"><div class="n-cc-ic">&#x1F69A;</div><div><h4>Delivery</h4><p>Within 5 km in Sangareddy &mdash; &#x20B9;50 only<br>Same-day delivery possible</p></div></div>
      </div>
      <div class="n-map-box">
        <span class="n-map-ic">&#x1F4CD;</span>
        <h3>Naalas Rice Store</h3>
        <p class="n-map-addr">Plot No. 309, 15-72<br>Housing Board Colony<br>Sangareddy, Telangana &ndash; 502001</p>
        <a href="https://maps.google.com/?q=Sangareddy+Housing+Board+Colony+Telangana" target="_blank" rel="noopener" class="n-map-btn">&#x1F5FA;&#xFE0F; Open in Google Maps</a>
        <p style="font-size:11.5px;color:#6b7c71;margin-top:8px;">Tap for directions to our store</p>
      </div>
    </div>
  </div>
</div><!-- end page-contact -->

<!-- FOOTER (always visible) -->
<footer class="n-ft">
  <div class="n-ftg">
    <div>
      <div class="n-ft-lw"><div class="n-ft-li"><?php echo $svg; ?></div><div class="n-ft-brand">Naalas<span>Rice Store &bull; Sangareddy</span></div></div>
      <p class="n-ft-desc">Trusted wholesale and retail rice supplier in Sangareddy, Telangana. Premium quality brands, accurate weight, delivered to your door.</p>
      <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_text_general; ?>" class="n-ft-wa" target="_blank">&#x1F4AC; Order on WhatsApp</a>
    </div>
    <div>
      <h4>Pages</h4>
      <div class="n-ft-links">
        <a onclick="showPage('home')">Home</a>
        <a onclick="showPage('products')">Products</a>
        <a onclick="showPage('about')">About Us</a>
        <a onclick="showPage('whyus')">Why Choose Us</a>
        <a onclick="showPage('contact')">Contact</a>
      </div>
    </div>
    <div>
      <h4>Our Products</h4>
      <div class="n-ft-links">
        <?php foreach ($products as $fp): ?>
        <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo urlencode('I want to order '.$fp->get_name().' from Naalas Rice Store'); ?>" target="_blank"><?php echo esc_html($fp->get_name()); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <div>
      <h4>Contact Info</h4>
      <div class="n-ft-ci"><span>&#x1F4CD;</span><p>Plot No. 309, 15-72, Housing Board Colony, Sangareddy, Telangana &ndash; 502001</p></div>
      <div class="n-ft-ci"><span>&#x1F4DE;</span><p><a href="tel:+917799455932">+91 77994 55932</a></p></div>
      <div class="n-ft-ci"><span>&#x23F0;</span><p>Mon&ndash;Sat: 8AM&ndash;8PM<br>Sun: 9AM&ndash;5PM</p></div>
    </div>
  </div>
  <div class="n-ft-bot">
    <p>&copy; 2026 <span>Naalas Rice Store, Sangareddy</span>. All rights reserved.</p>
    <p>Sangareddy, Telangana 502001 &nbsp;&bull;&nbsp; +91 77994 55932</p>
  </div>
</footer>

</div></div>

<!-- FLOAT WA -->
<a class="n-fwa" href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_text_general; ?>" target="_blank" title="Order on WhatsApp">&#x1F4AC;</a>

<script>
function showPage(page) {
  // Hide all pages
  document.querySelectorAll('.n-page').forEach(function(p){ p.classList.remove('active'); });
  // Show target
  var target = document.getElementById('page-' + page);
  if (target) { target.classList.add('active'); }
  // Update nav active state
  document.querySelectorAll('.n-links a[data-page], .n-mmenu a[data-page]').forEach(function(a){
    a.classList.toggle('active', a.getAttribute('data-page') === page);
  });
  // Scroll to top
  window.scrollTo({ top: 0, behavior: 'smooth' });
  // Update hash
  history.pushState(null, null, '#' + page);
}

function closeMM() {
  var hbg = document.getElementById('n-hbg');
  var mm  = document.getElementById('n-mmenu');
  if (hbg) hbg.classList.remove('open');
  if (mm)  mm.classList.remove('open');
}

// Hamburger
var hbg = document.getElementById('n-hbg');
var mm  = document.getElementById('n-mmenu');
if (hbg && mm) {
  hbg.addEventListener('click', function(){
    hbg.classList.toggle('open');
    mm.classList.toggle('open');
  });
}

// Handle URL hash on load
window.addEventListener('load', function(){
  var hash = window.location.hash.replace('#','');
  var valid = ['home','products','about','whyus','contact'];
  if (hash && valid.indexOf(hash) !== -1) { showPage(hash); }
});

// Handle back/forward
window.addEventListener('popstate', function(){
  var hash = window.location.hash.replace('#','');
  if (hash) showPage(hash); else showPage('home');
});

// Nav shadow
var nav = document.getElementById('n-nav');
if (nav) {
  window.addEventListener('scroll', function(){
    nav.style.boxShadow = window.scrollY > 10 ? '0 4px 28px rgba(0,0,0,.28)' : '0 3px 16px rgba(0,0,0,.18)';
  }, {passive:true});
}
</script>
    <?php
    return ob_get_clean();
}
