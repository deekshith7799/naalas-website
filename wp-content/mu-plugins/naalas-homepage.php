<?php
/**
 * Plugin Name: Naalas Homepage
 * Description: Renders the Naalas Rice Store homepage via [naalas_home] shortcode.
 */

add_shortcode('naalas_home', 'naalas_home_shortcode');

function naalas_home_shortcode() {
    if (!function_exists('wc_get_products')) return '<p>WooCommerce not active.</p>';

    $wa       = '917799455932';
    $products = wc_get_products(['status' => 'publish', 'limit' => -1, 'orderby' => 'menu_order', 'order' => 'ASC']);

    ob_start();
    ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
/* ===== BASE ===== */
.nn-wrap *{box-sizing:border-box;margin:0;padding:0}
.nn-wrap{font-family:'Poppins',sans-serif;color:#1a2a1e;background:#f8faf5;width:100%}
.nn-fullbleed{width:100vw;position:relative;left:50%;margin-left:-50vw;overflow-x:hidden}

/* Hide Astra header & page elements on homepage */
body.page-id-17 #masthead,
body.page-id-17 .site-header,
body.page-id-17 .main-header-bar-wrap,
body.page-id-17 .ast-above-header-wrap,
body.page-id-17 .ast-below-header-wrap,
body.page-id-17 .ast-primary-sticky-header-wrap { display:none!important }
body.page-id-17 .entry-title,
body.page-id-17 .ast-breadcrumbs-wrapper { display:none!important }
body.page-id-17 .entry-content { padding:0!important; max-width:100%!important }
body.page-id-17 .ast-container,
body.page-id-17 .container { max-width:100%!important; padding:0!important }
body.page-id-17 #content,
body.page-id-17 .site-content { padding:0!important; margin:0!important }
body.page-id-17 .ast-separate-container .ast-article-post,
body.page-id-17 .ast-separate-container .ast-article-single { padding:0!important; margin:0!important }

:root{
  --gd:#1a3a2a;--gm:#2d6a4f;--gl:#52b788;--gp:#d8f3dc;
  --gold:#e9b949;--golds:#c9971a;--wa:#25d366;
  --bg:#f8faf5;--wh:#fff;--tx:#1a2a1e;--txm:#3d5246;--txl:#6b7c71;--br:#d0e8d8;
  --s1:0 2px 8px rgba(26,58,42,.08);--s2:0 8px 32px rgba(26,58,42,.13);--s3:0 20px 60px rgba(26,58,42,.18)
}

/* ===== UNIQUE LOGO ===== */
.nn-logo { display:flex; align-items:center; gap:12px; text-decoration:none; }
.nn-logo-icon {
  width:46px; height:46px;
  background:linear-gradient(135deg,var(--gold),#f5c430);
  border-radius:12px;
  display:flex; align-items:center; justify-content:center;
  flex-shrink:0;
  box-shadow:0 4px 12px rgba(233,185,73,.4);
}
.nn-logo-icon svg { width:26px; height:26px; }
.nn-logo-text { line-height:1.15; }
.nn-logo-name { display:block; font-size:20px; font-weight:900; color:#fff; letter-spacing:-0.5px; }
.nn-logo-sub  { display:block; font-size:11px; font-weight:500; color:rgba(255,255,255,.6); letter-spacing:2px; text-transform:uppercase; }

/* ===== NAV ===== */
.nn-nav{position:sticky;top:0;z-index:9999;background:rgba(26,58,42,.97);backdrop-filter:blur(12px);border-bottom:1px solid rgba(82,183,136,.2);padding:0 60px;display:flex;align-items:center;justify-content:space-between;height:72px;box-shadow:0 4px 24px rgba(0,0,0,.15)}
.nn-nav-links{display:flex;align-items:center;gap:6px}
.nn-nav-links a{color:rgba(255,255,255,.8);text-decoration:none;font-size:14px;font-weight:500;padding:8px 14px;border-radius:8px;transition:all .2s}
.nn-nav-links a:hover{color:#fff;background:rgba(255,255,255,.1)}
.nn-nav-cta{background:var(--wa)!important;color:#fff!important;padding:9px 20px!important;border-radius:30px!important;font-weight:700!important}
.nn-nav-cta:hover{background:#20bb5a!important;transform:translateY(-1px)}

/* ===== HERO ===== */
.nn-hero{background:linear-gradient(135deg,var(--gd) 0%,#1e4d35 50%,#174030 100%);position:relative;overflow:hidden;padding:100px 60px 80px;display:flex;align-items:center;justify-content:space-between;gap:60px;min-height:580px}
.nn-hero::before{content:'';position:absolute;top:-120px;right:-120px;width:550px;height:550px;background:radial-gradient(circle,rgba(82,183,136,.15) 0%,transparent 70%);pointer-events:none}
.nn-hero::after{content:'';position:absolute;bottom:-80px;left:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(233,185,73,.1) 0%,transparent 70%);pointer-events:none}
.nn-hero-text{flex:1;max-width:600px;position:relative;z-index:2}
.nn-hero-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(82,183,136,.2);border:1px solid rgba(82,183,136,.4);color:#95e0b8;font-size:13px;font-weight:600;padding:6px 18px;border-radius:30px;margin-bottom:24px;letter-spacing:.3px}
.nn-hero h1{color:#fff;font-size:52px;font-weight:800;line-height:1.15;margin-bottom:20px;letter-spacing:-1px}
.nn-hero h1 .hi{color:var(--gold)}
.nn-hero-sub{color:rgba(255,255,255,.75);font-size:17px;line-height:1.7;margin-bottom:36px;max-width:480px}
.nn-hero-btns{display:flex;gap:14px;flex-wrap:wrap}
.nn-bp{display:inline-flex;align-items:center;gap:8px;background:var(--gold);color:var(--gd);padding:14px 30px;border-radius:50px;font-size:15px;font-weight:700;text-decoration:none;transition:all .2s;box-shadow:0 4px 16px rgba(233,185,73,.35)}
.nn-bp:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(233,185,73,.5);background:#f0c832;color:var(--gd)!important}
.nn-bw{display:inline-flex;align-items:center;gap:8px;background:var(--wa);color:#fff;padding:14px 30px;border-radius:50px;font-size:15px;font-weight:700;text-decoration:none;transition:all .2s;box-shadow:0 4px 16px rgba(37,211,102,.3)}
.nn-bw:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(37,211,102,.5)}
.nn-hero-right{position:relative;z-index:2;flex-shrink:0}
.nn-hero-tags{display:grid;grid-template-columns:1fr 1fr;gap:12px;width:300px}
.nn-hero-tag{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:12px;padding:12px 14px;color:rgba(255,255,255,.9);font-size:13px;font-weight:500;display:flex;align-items:center;gap:8px;backdrop-filter:blur(8px);transition:all .2s}
.nn-hero-tag:hover{background:rgba(255,255,255,.13);border-color:var(--gl)}
.nn-hero-tag .dot{width:8px;height:8px;background:var(--gl);border-radius:50%;flex-shrink:0}

/* ===== STATS ===== */
.nn-stats{background:#fff;border-top:3px solid var(--gd);border-bottom:1px solid var(--br);padding:24px 60px;display:grid;grid-template-columns:repeat(4,1fr)}
.nn-stat{text-align:center;padding:8px 20px;border-right:1px solid var(--br)}
.nn-stat:last-child{border-right:none}
.nn-stat-num{font-size:30px;font-weight:800;color:var(--gd);line-height:1;margin-bottom:4px}
.nn-stat-num span{color:var(--golds)}
.nn-stat-lbl{font-size:13px;color:var(--txl);font-weight:500}

/* ===== SECTION BASE ===== */
.nn-sec{padding:80px 60px}
.nn-sec-wh{background:#fff}
.nn-sec-bg{background:var(--bg)}
.nn-sec-h{text-align:center;margin-bottom:50px}
.nn-tag{display:inline-block;background:var(--gp);color:var(--gm);font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:5px 16px;border-radius:30px;margin-bottom:14px}
.nn-h2{font-size:34px;font-weight:800;color:var(--gd);line-height:1.2;margin-bottom:12px;letter-spacing:-.5px}
.nn-h2 span{color:var(--gl)}
.nn-sub{font-size:16px;color:var(--txl);max-width:520px;margin:0 auto;line-height:1.7}

/* ===== PRODUCTS ===== */
.nn-pg{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.nn-pc{background:#fff;border:1px solid var(--br);border-radius:16px;overflow:hidden;transition:all .3s;box-shadow:var(--s1)}
.nn-pc:hover{transform:translateY(-6px);box-shadow:var(--s2);border-color:var(--gl)}

/* Full bag image — contain so full bag shows */
.nn-pi{
  position:relative;
  height:240px;
  background:linear-gradient(160deg,#f0f9f3 0%,#e0f2e8 100%);
  display:flex; align-items:center; justify-content:center;
  overflow:hidden;
}
.nn-pi img{
  max-width:100%; max-height:100%;
  width:auto; height:auto;
  object-fit:contain;
  padding:16px;
  transition:transform .4s;
  filter:drop-shadow(0 8px 20px rgba(26,58,42,.2));
}
.nn-pc:hover .nn-pi img{transform:scale(1.06) translateY(-4px)}
.nn-pi-ph{font-size:72px;opacity:.4}
.nn-pbd{position:absolute;top:12px;left:12px;background:var(--gd);color:#fff;font-size:10px;font-weight:700;padding:4px 10px;border-radius:6px;letter-spacing:.5px;text-transform:uppercase}
.nn-pbd.gold{background:var(--gold);color:var(--gd)}
.nn-pbd.purple{background:#7c3aed}

.nn-pb{padding:18px 20px 22px}
.nn-pbr{font-size:11px;font-weight:700;color:var(--gl);text-transform:uppercase;letter-spacing:1px;margin-bottom:5px}
.nn-pn{font-size:17px;font-weight:700;color:var(--gd);margin-bottom:4px;line-height:1.3}
.nn-pd{font-size:13px;color:var(--txl);margin-bottom:14px;line-height:1.5}
.nn-pp{
  display:flex; align-items:baseline; gap:6px;
  margin-bottom:14px;
}
.nn-pp-main{font-size:24px;font-weight:800;color:var(--gd)}
.nn-pp-sizes{display:flex;flex-direction:column;gap:2px}
.nn-pp-from{font-size:10px;font-weight:600;color:var(--txl);text-transform:uppercase;letter-spacing:.5px}
.nn-pp-avail{font-size:11px;font-weight:600;color:var(--gm)}
.nn-pf{display:flex;align-items:center;justify-content:space-between;gap:8px}
.nn-ps{display:flex;gap:5px;flex-wrap:wrap}
.nn-sp{background:var(--gp);border:1px solid var(--gl);color:var(--gm);font-size:11px;font-weight:600;padding:3px 9px;border-radius:6px}
.nn-ob{display:inline-flex;align-items:center;gap:5px;background:var(--wa);color:#fff;text-decoration:none;padding:9px 16px;border-radius:30px;font-size:12px;font-weight:700;white-space:nowrap;transition:all .2s}
.nn-ob:hover{background:#20bb5a;transform:translateY(-1px)}

/* ===== ABOUT ===== */
.nn-ag{display:grid;grid-template-columns:1fr 1fr;gap:70px;align-items:center}
.nn-aim{position:relative;padding-bottom:30px}
.nn-aim-main{border-radius:24px;overflow:hidden;box-shadow:var(--s3);background:linear-gradient(135deg,#e8f5ee,#d4edd9)}
.nn-aim-main img{width:100%;height:380px;object-fit:contain;display:block;padding:24px;filter:drop-shadow(0 4px 16px rgba(26,58,42,.15))}
.nn-aim-main-ph{height:380px;display:flex;align-items:center;justify-content:center;font-size:80px;opacity:.3}
.nn-aim-acc{position:absolute;bottom:0;right:-20px;width:180px;border-radius:16px;overflow:hidden;border:4px solid #fff;box-shadow:var(--s2);background:linear-gradient(135deg,#e8f5ee,#d4edd9)}
.nn-aim-acc img{width:100%;height:130px;object-fit:contain;display:block;padding:10px}
.nn-at{font-size:32px;font-weight:800;color:var(--gd);line-height:1.25;margin-bottom:20px;letter-spacing:-.5px}
.nn-at span{color:var(--gl)}
.nn-ap{font-size:15px;color:var(--txm);line-height:1.8;margin-bottom:14px}
.nn-ahs{margin:24px 0;display:flex;flex-direction:column;gap:12px}
.nn-ah{display:flex;align-items:flex-start;gap:14px;background:var(--bg);border:1px solid var(--br);border-radius:10px;padding:14px 18px;transition:all .2s}
.nn-ah:hover{border-color:var(--gl);background:#edf7f0}
.nn-ah-icon{font-size:22px;flex-shrink:0;margin-top:2px}
.nn-ah-text strong{display:block;font-size:14px;font-weight:700;color:var(--gd);margin-bottom:3px}
.nn-ah-text span{font-size:13px;color:var(--txl);line-height:1.5}

/* ===== DELIVERY BANNER ===== */
.nn-db{background:linear-gradient(135deg,var(--gold),#f5c842);padding:30px 60px;display:flex;align-items:center;justify-content:space-between;gap:24px;flex-wrap:wrap}
.nn-db-l{display:flex;align-items:center;gap:20px}
.nn-db-icon{font-size:42px}
.nn-db-text h3{font-size:20px;font-weight:800;color:var(--gd);margin-bottom:4px}
.nn-db-text p{font-size:14px;color:#3d5246}
.nn-db-btn{display:inline-flex;align-items:center;gap:8px;background:var(--gd);color:#fff;padding:12px 28px;border-radius:50px;font-size:15px;font-weight:700;text-decoration:none;transition:all .2s;flex-shrink:0}
.nn-db-btn:hover{background:var(--gm);transform:translateY(-2px)}

/* ===== WHY US ===== */
.nn-wg{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
.nn-wc{background:#fff;border:1px solid var(--br);border-radius:16px;padding:28px 24px;transition:all .3s;box-shadow:var(--s1);position:relative;overflow:hidden}
.nn-wc::before{content:'';position:absolute;top:0;left:0;width:4px;height:100%;background:var(--gl);transform:scaleY(0);transition:transform .3s;transform-origin:bottom}
.nn-wc:hover{transform:translateY(-4px);box-shadow:var(--s2);border-color:var(--gl)}
.nn-wc:hover::before{transform:scaleY(1)}
.nn-wi{width:56px;height:56px;background:var(--gp);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:26px;margin-bottom:16px}
.nn-wt{font-size:16px;font-weight:700;color:var(--gd);margin-bottom:8px}
.nn-wp{font-size:13px;color:var(--txl);line-height:1.7}

/* ===== WA CTA ===== */
.nn-wa-s{background:linear-gradient(135deg,#1a3a2a,#0f2418);padding:70px 60px;text-align:center;position:relative;overflow:hidden}
.nn-wa-s::before{content:'';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:600px;height:600px;background:radial-gradient(circle,rgba(82,183,136,.1) 0%,transparent 70%);pointer-events:none}
.nn-wa-s h2{font-size:38px;font-weight:800;color:#fff;margin-bottom:16px;letter-spacing:-.5px}
.nn-wa-s h2 span{color:var(--gold)}
.nn-wa-s p{font-size:17px;color:rgba(255,255,255,.7);max-width:520px;margin:0 auto 36px;line-height:1.7}
.nn-wa-big{display:inline-flex;align-items:center;gap:12px;background:var(--wa);color:#fff;padding:18px 44px;border-radius:60px;font-size:18px;font-weight:800;text-decoration:none;transition:all .25s;box-shadow:0 8px 32px rgba(37,211,102,.4)}
.nn-wa-big:hover{transform:translateY(-3px);box-shadow:0 16px 48px rgba(37,211,102,.55);background:#20bb5a}
.nn-wa-ph{margin-top:20px;color:var(--gl);font-size:15px;font-weight:500}

/* ===== CONTACT ===== */
.nn-cg{display:grid;grid-template-columns:1fr 1fr;gap:50px;align-items:start}
.nn-ci{display:flex;flex-direction:column;gap:18px}
.nn-cc{background:#fff;border:1px solid var(--br);border-radius:16px;padding:22px 24px;display:flex;align-items:flex-start;gap:18px;box-shadow:var(--s1);transition:all .2s}
.nn-cc:hover{box-shadow:var(--s2);border-color:var(--gl);transform:translateX(4px)}
.nn-cc-icon{width:48px;height:48px;background:var(--gp);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0}
.nn-cc h4{font-size:12px;font-weight:700;color:var(--txl);text-transform:uppercase;letter-spacing:.8px;margin-bottom:5px}
.nn-cc p{font-size:15px;font-weight:600;color:var(--gd);line-height:1.7}
.nn-cc a{color:var(--gm);text-decoration:none}
.nn-cc a:hover{color:var(--gl);text-decoration:underline}
.nn-map-box{border-radius:16px;overflow:hidden;box-shadow:var(--s2);border:1px solid var(--br);background:linear-gradient(135deg,#c8f0d8,#b0e8c8);min-height:420px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:20px;padding:40px;text-align:center}
.nn-map-icon{font-size:64px}
.nn-map-box h3{font-size:22px;font-weight:700;color:var(--gd)}
.nn-map-addr{font-size:15px;color:var(--txm);line-height:1.9;font-weight:500}
.nn-map-btn{display:inline-flex;align-items:center;gap:8px;background:var(--gd);color:#fff;padding:14px 28px;border-radius:30px;font-size:15px;font-weight:700;text-decoration:none;transition:all .2s;box-shadow:0 4px 16px rgba(26,58,42,.25)}
.nn-map-btn:hover{background:var(--gm);transform:translateY(-2px);box-shadow:0 8px 24px rgba(26,58,42,.35)}
.nn-map-hint{font-size:12px;color:var(--txl)}

/* ===== FOOTER ===== */
.nn-ft{background:#0d1f14;padding:60px 60px 0}
.nn-ftg{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:40px;padding-bottom:50px;border-bottom:1px solid rgba(255,255,255,.08)}
.nn-ft-logo-wrap{display:flex;align-items:center;gap:10px;margin-bottom:16px}
.nn-ft-li{width:38px;height:38px;background:linear-gradient(135deg,var(--gold),#f5c430);border-radius:10px;display:flex;align-items:center;justify-content:center}
.nn-ft-li svg{width:22px;height:22px}
.nn-ft-brand{font-size:17px;font-weight:800;color:#fff;letter-spacing:-.3px}
.nn-ft-brand span{display:block;font-size:10px;font-weight:500;color:rgba(255,255,255,.5);letter-spacing:2px;text-transform:uppercase}
.nn-ft-desc{font-size:13px;color:rgba(255,255,255,.5);line-height:1.7;margin-bottom:20px}
.nn-ft-wa{display:inline-flex;align-items:center;gap:8px;background:var(--wa);color:#fff;padding:9px 18px;border-radius:30px;font-size:13px;font-weight:700;text-decoration:none}
.nn-ft h4{font-size:12px;font-weight:700;color:var(--gl);text-transform:uppercase;letter-spacing:1px;margin-bottom:18px}
.nn-ft-links{display:flex;flex-direction:column;gap:10px}
.nn-ft-links a{font-size:14px;color:rgba(255,255,255,.55);text-decoration:none;transition:color .2s}
.nn-ft-links a:hover{color:var(--gl)}
.nn-ft-ci{display:flex;align-items:flex-start;gap:10px;margin-bottom:12px}
.nn-ft-ci span{font-size:16px;flex-shrink:0;margin-top:1px}
.nn-ft-ci p{font-size:13px;color:rgba(255,255,255,.55);line-height:1.6}
.nn-ft-ci a{color:rgba(255,255,255,.55);text-decoration:none}
.nn-ft-bot{padding:20px 0;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px}
.nn-ft-bot p{font-size:13px;color:rgba(255,255,255,.3)}
.nn-ft-bot span{color:var(--gl)}

/* ===== FLOAT WA ===== */
.nn-fwa{position:fixed;bottom:30px;right:30px;z-index:9999;width:60px;height:60px;background:var(--wa);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:28px;text-decoration:none;box-shadow:0 6px 24px rgba(37,211,102,.5);animation:nn-pulse 2.5s infinite;transition:transform .2s}
.nn-fwa:hover{transform:scale(1.1)}
@keyframes nn-pulse{0%,100%{box-shadow:0 6px 24px rgba(37,211,102,.5)}50%{box-shadow:0 6px 40px rgba(37,211,102,.8)}}

/* ===== RESPONSIVE ===== */
@media(max-width:1024px){
  .nn-nav,.nn-sec,.nn-hero,.nn-db,.nn-wa-s,.nn-ft{padding-left:40px!important;padding-right:40px!important}
  .nn-pg{grid-template-columns:repeat(2,1fr)}
  .nn-ftg{grid-template-columns:1fr 1fr}
}
@media(max-width:768px){
  .nn-nav{padding:0 20px!important;height:60px}
  .nn-nav-links{display:none}
  .nn-hero{padding:60px 24px 50px!important;flex-direction:column;text-align:center;min-height:auto}
  .nn-hero h1{font-size:30px}
  .nn-hero-right{display:none}
  .nn-stats{grid-template-columns:repeat(2,1fr);padding:16px 24px}
  .nn-stat{border-right:none;border-bottom:1px solid var(--br);padding:12px}
  .nn-stat:nth-child(odd){border-right:1px solid var(--br)}
  .nn-stat:last-child,.nn-stat:nth-last-child(2){border-bottom:none}
  .nn-sec{padding:50px 24px!important}
  .nn-pg{grid-template-columns:1fr}
  .nn-ag{grid-template-columns:1fr;gap:40px}
  .nn-aim-acc{display:none}
  .nn-wg{grid-template-columns:1fr}
  .nn-cg{grid-template-columns:1fr}
  .nn-db{padding:24px!important;flex-direction:column;text-align:center}
  .nn-ftg{grid-template-columns:1fr}
  .nn-ft{padding:40px 24px 0!important}
  .nn-wa-s{padding:50px 24px!important}
  .nn-wa-s h2{font-size:26px}
  .nn-ft-bot{flex-direction:column;text-align:center}
}
</style>

<?php
// Get rice images — exclude WooCommerce placeholder (ID 9) and logo (ID 16)
$all_imgs = get_posts([
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'numberposts'    => -1,
    'post_status'    => 'inherit',
    'orderby'        => 'ID',
    'order'          => 'ASC',
    'exclude'        => [9, 16],
]);
$about_img1 = !empty($all_imgs[0]) ? wp_get_attachment_image_url($all_imgs[0]->ID, 'large')  : '';
$about_img2 = !empty($all_imgs[1]) ? wp_get_attachment_image_url($all_imgs[1]->ID, 'medium') : '';

// Inline SVG rice icon for logo
$rice_svg = '<svg viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="13" cy="9" rx="5" ry="8" fill="#1a3a2a" transform="rotate(-20 13 9)"/>
  <ellipse cx="13" cy="9" rx="3" ry="6" fill="#2d6a4f" transform="rotate(-20 13 9)"/>
  <line x1="13" y1="17" x2="13" y2="25" stroke="#1a3a2a" stroke-width="2" stroke-linecap="round"/>
  <line x1="13" y1="21" x2="9" y2="18" stroke="#1a3a2a" stroke-width="1.5" stroke-linecap="round"/>
  <line x1="13" y1="21" x2="17" y2="18" stroke="#1a3a2a" stroke-width="1.5" stroke-linecap="round"/>
</svg>';

$site_url = get_site_url();
?>

<div class="nn-wrap"><div class="nn-fullbleed">

<!-- NAV -->
<nav class="nn-nav" id="nn-nav">
  <a class="nn-logo" href="<?php echo esc_url($site_url); ?>">
    <div class="nn-logo-icon"><?php echo $rice_svg; ?></div>
    <div class="nn-logo-text">
      <span class="nn-logo-name">Naalas</span>
      <span class="nn-logo-sub">Rice Store &bull; Sangareddy</span>
    </div>
  </a>
  <div class="nn-nav-links">
    <a href="#home">Home</a>
    <a href="#products">Products</a>
    <a href="#about">About</a>
    <a href="#why-us">Why Us</a>
    <a href="#contact">Contact</a>
    <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hello!%20I%20want%20to%20order%20rice" class="nn-nav-cta">&#x1F4AC; Order Now</a>
  </div>
</nav>

<!-- HERO -->
<section class="nn-hero" id="home">
  <div class="nn-hero-text">
    <div class="nn-hero-badge">&#x1F33E; Sangareddy, Telangana &bull; Trusted Rice Store</div>
    <h1>Fresh, Pure &amp; Premium<br><span class="hi">Rice</span> at Wholesale Prices</h1>
    <p class="nn-hero-sub">We source the finest rice brands for families, hotels &amp; bulk buyers across Sangareddy. Delivered fresh to your door for just &#x20B950;50.</p>
    <div class="nn-hero-btns">
      <a href="#products" class="nn-bp">&#x1F6D2; Explore Products</a>
      <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hello!%20I%20want%20to%20order%20rice%20from%20Naalas%20Rice%20Store" class="nn-bw">&#x1F4AC; Order on WhatsApp</a>
    </div>
  </div>
  <div class="nn-hero-right">
    <div class="nn-hero-tags">
      <?php foreach (array_slice($products, 0, 6) as $p): ?>
      <div class="nn-hero-tag"><span class="dot"></span><?php echo esc_html($p->get_name()); ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="nn-stats">
  <div class="nn-stat"><div class="nn-stat-num"><?php echo count($products); ?><span>+</span></div><div class="nn-stat-lbl">Rice Varieties</div></div>
  <div class="nn-stat"><div class="nn-stat-num">500<span>+</span></div><div class="nn-stat-lbl">Happy Customers</div></div>
  <div class="nn-stat"><div class="nn-stat-num">&#x20B9;50</div><div class="nn-stat-lbl">Delivery Charge</div></div>
  <div class="nn-stat"><div class="nn-stat-num">5<span>km</span></div><div class="nn-stat-lbl">Delivery Radius</div></div>
</div>

<!-- PRODUCTS -->
<section class="nn-sec nn-sec-bg" id="products">
  <div class="nn-sec-h">
    <div class="nn-tag">Our Products</div>
    <h2 class="nn-h2">Premium <span>Rice Collection</span></h2>
    <p class="nn-sub">Handpicked rice varieties from trusted brands. Available in 5 kg, 10 kg &amp; 25 kg bags. WhatsApp us to order any quantity.</p>
  </div>
  <div class="nn-pg">
    <?php foreach ($products as $product):
      $brand   = $product->get_attribute('Brand') ?: '';
      $badge   = $product->get_attribute('Badge') ?: '';
      $sizes   = $product->get_attribute('Available Sizes') ?: '';
      $name    = $product->get_name();
      $desc    = wp_strip_all_tags($product->get_short_description());
      $price   = (float) $product->get_price();
      $tid     = (int) get_post_meta($product->get_id(), '_thumbnail_id', true);
      $isrc    = $tid ? wp_get_attachment_image_src($tid, 'full') : false;
      $img     = $isrc ? $isrc[0] : '';
      $wa_msg  = urlencode('Hello! I want to order ' . $name . ' from Naalas Rice Store. Please share price and availability.');
      $sizes_a = array_filter(array_map('trim', explode(',', $sizes)));
      $bl      = strtolower($badge);
      $bcls    = ($bl === 'premium') ? 'nn-pbd gold' : (in_array($bl, ['special','andhra special']) ? 'nn-pbd purple' : 'nn-pbd');
    ?>
    <div class="nn-pc">
      <div class="nn-pi">
        <?php if ($img): ?>
          <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy">
        <?php else: ?>
          <div class="nn-pi-ph">&#x1F33E;</div>
        <?php endif; ?>
        <?php if ($badge): ?><span class="<?php echo esc_attr($bcls); ?>"><?php echo esc_html($badge); ?></span><?php endif; ?>
      </div>
      <div class="nn-pb">
        <div class="nn-pbr"><?php echo esc_html($brand); ?></div>
        <div class="nn-pn"><?php echo esc_html($name); ?></div>
        <div class="nn-pd"><?php echo esc_html($desc); ?></div>
        <?php if ($price > 0): ?>
        <div class="nn-pp">
          <div class="nn-pp-main">&#x20B9;<?php echo number_format($price, 0); ?></div>
          <div class="nn-pp-sizes">
            <span class="nn-pp-from">Starting price</span>
            <span class="nn-pp-avail">5 kg | 10 kg | 25 kg</span>
          </div>
        </div>
        <?php endif; ?>
        <div class="nn-pf">
          <div class="nn-ps">
            <?php foreach ($sizes_a as $sz): ?><span class="nn-sp"><?php echo esc_html($sz); ?></span><?php endforeach; ?>
          </div>
          <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo $wa_msg; ?>" class="nn-ob">&#x1F4AC; Order</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ABOUT -->
<section class="nn-sec nn-sec-wh" id="about">
  <div class="nn-ag">
    <div class="nn-aim">
      <div class="nn-aim-main">
        <?php if ($about_img1): ?>
          <img src="<?php echo esc_url($about_img1); ?>" alt="Naalas Rice Store" loading="lazy">
        <?php else: ?>
          <div class="nn-aim-main-ph">&#x1F33E;</div>
        <?php endif; ?>
      </div>
      <?php if ($about_img2): ?>
      <div class="nn-aim-acc">
        <img src="<?php echo esc_url($about_img2); ?>" alt="Quality Rice" loading="lazy">
      </div>
      <?php endif; ?>
    </div>
    <div>
      <div class="nn-tag">Our Story</div>
      <h2 class="nn-at">Sangareddy&rsquo;s Trusted <span>Rice Store</span></h2>
      <p class="nn-ap">Welcome to <strong>Naalas Rice Store</strong> &mdash; your local partner for premium quality rice in Sangareddy, Telangana. We bring the finest, most trusted rice varieties directly to your home at prices that make sense.</p>
      <p class="nn-ap">Whether you are a family buying for your kitchen or a business buying in bulk, we treat every customer with the same care, honesty, and speed. Good rice makes every meal special &mdash; and that is our promise.</p>
      <div class="nn-ahs">
        <div class="nn-ah"><span class="nn-ah-icon">&#x1F33E;</span><div class="nn-ah-text"><strong>Sourced from Trusted Mills</strong><span>Every brand we carry is authentic and verified &mdash; no duplicate or low-quality products.</span></div></div>
        <div class="nn-ah"><span class="nn-ah-icon">&#x2696;&#xFE0F;</span><div class="nn-ah-text"><strong>Accurate Weight, Every Time</strong><span>All bags are sealed and verified. You get exactly what you pay for &mdash; always.</span></div></div>
        <div class="nn-ah"><span class="nn-ah-icon">&#x1F6D2;</span><div class="nn-ah-text"><strong>Retail &amp; Wholesale Available</strong><span>Order 5 kg or 500 kg &mdash; we serve households and large businesses alike.</span></div></div>
      </div>
      <a href="#contact" class="nn-bp" style="display:inline-flex;margin-top:8px;">&#x1F4CD; Find Our Store</a>
    </div>
  </div>
</section>

<!-- DELIVERY BANNER -->
<div class="nn-db">
  <div class="nn-db-l"><span class="nn-db-icon">&#x1F69A;</span><div class="nn-db-text"><h3>Home Delivery Available &mdash; Only &#x20B950;50</h3><p>We deliver within 5 km radius in Sangareddy. Order on WhatsApp &amp; we bring fresh rice to your door!</p></div></div>
  <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hello!%20I%20want%20home%20delivery%20of%20rice%20in%20Sangareddy" class="nn-db-btn">&#x1F4AC; Order Home Delivery</a>
</div>

<!-- WHY US -->
<section class="nn-sec nn-sec-bg" id="why-us">
  <div class="nn-sec-h">
    <div class="nn-tag">Why Choose Us</div>
    <h2 class="nn-h2">6 Reasons Customers <span>Trust Us</span></h2>
    <p class="nn-sub">Built on quality, honesty, and reliability. Here is why hundreds of families in Sangareddy choose Naalas Rice Store every week.</p>
  </div>
  <div class="nn-wg">
    <div class="nn-wc"><div class="nn-wi">&#x1F3C6;</div><div class="nn-wt">100% Genuine Brands</div><p class="nn-wp">We only stock authentic, well-known rice brands sourced directly from verified suppliers. No counterfeits, no compromises &mdash; ever.</p></div>
    <div class="nn-wc"><div class="nn-wi">&#x1F4B0;</div><div class="nn-wt">Best Wholesale Prices</div><p class="nn-wp">We cut out middlemen and pass the savings directly to you. Whether 5 kg or 500 kg, you get the most competitive price in Sangareddy.</p></div>
    <div class="nn-wc"><div class="nn-wi">&#x2696;&#xFE0F;</div><div class="nn-wt">Accurate &amp; Sealed Bags</div><p class="nn-wp">Every bag is weighed on a calibrated scale and sealed before delivery. What you order is exactly what you get &mdash; no short measures.</p></div>
    <div class="nn-wc"><div class="nn-wi">&#x1F69A;</div><div class="nn-wt">Fast Home Delivery</div><p class="nn-wp">We deliver within 5 km of our store for just &#x20B950;50. Order on WhatsApp and we confirm &amp; deliver same day whenever possible.</p></div>
    <div class="nn-wc"><div class="nn-wi">&#x1F4AC;</div><div class="nn-wt">Easy WhatsApp Ordering</div><p class="nn-wp">No complicated forms or checkout. Just message us on WhatsApp with your rice variety &amp; quantity &mdash; we handle everything quickly.</p></div>
    <div class="nn-wc"><div class="nn-wi">&#x1F91D;</div><div class="nn-wt">Trusted by 500+ Customers</div><p class="nn-wp">Hundreds of households, hotels, dhabas &amp; businesses across Sangareddy rely on us every week for consistent quality and fast service.</p></div>
  </div>
</section>

<!-- WA CTA -->
<div class="nn-wa-s">
  <h2>Ready to Order? <span>Let&rsquo;s Chat!</span></h2>
  <p>The fastest way to get your rice is through WhatsApp. Tell us what you need &mdash; quantity, variety, delivery &mdash; and we sort the rest.</p>
  <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hello!%20I%20want%20to%20place%20a%20rice%20order%20from%20Naalas%20Rice%20Store%2C%20Sangareddy" class="nn-wa-big">&#x1F4AC; Chat with Us on WhatsApp</a>
  <p class="nn-wa-ph">&#x1F4DE; +91 77994 55932 &nbsp;&bull;&nbsp; Mon&ndash;Sat 8AM&ndash;8PM &nbsp;&bull;&nbsp; Sun 9AM&ndash;5PM</p>
</div>

<!-- CONTACT -->
<section class="nn-sec nn-sec-wh" id="contact">
  <div class="nn-sec-h">
    <div class="nn-tag">Find Us</div>
    <h2 class="nn-h2">Visit Our <span>Store</span></h2>
    <p class="nn-sub">Come visit us in Sangareddy or simply WhatsApp your order. We are happy to serve you!</p>
  </div>
  <div class="nn-cg">
    <div class="nn-ci">
      <div class="nn-cc"><div class="nn-cc-icon">&#x1F4CD;</div><div><h4>Store Address</h4><p>Plot No. 309, 15-72<br>Housing Board Colony<br>Sangareddy, Telangana &ndash; 502001</p></div></div>
      <div class="nn-cc"><div class="nn-cc-icon">&#x1F4DE;</div><div><h4>Phone / WhatsApp</h4><p><a href="tel:+917799455932">+91 77994 55932</a><br><a href="https://wa.me/<?php echo esc_attr($wa); ?>">Message on WhatsApp</a></p></div></div>
      <div class="nn-cc"><div class="nn-cc-icon">&#x1F55B;</div><div><h4>Business Hours</h4><p>Monday &ndash; Saturday: 8:00 AM &ndash; 8:00 PM<br>Sunday: 9:00 AM &ndash; 5:00 PM</p></div></div>
      <div class="nn-cc"><div class="nn-cc-icon">&#x1F69A;</div><div><h4>Delivery Area</h4><p>Home delivery within 5 km in Sangareddy<br>Delivery charge: only &#x20B950;50</p></div></div>
    </div>
    <div class="nn-map-box">
      <span class="nn-map-icon">&#x1F4CD;</span>
      <h3>Naalas Rice Store</h3>
      <p class="nn-map-addr">Plot No. 309, 15-72<br>Housing Board Colony<br>Sangareddy, Telangana &ndash; 502001</p>
      <a href="https://maps.google.com/?q=Sangareddy+Housing+Board+Colony+Telangana+India" target="_blank" rel="noopener" class="nn-map-btn">&#x1F5FA;&#xFE0F; Open in Google Maps</a>
      <p class="nn-map-hint">Tap to view directions to our store</p>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="nn-ft">
  <div class="nn-ftg">
    <div>
      <div class="nn-ft-logo-wrap">
        <div class="nn-ft-li"><?php echo $rice_svg; ?></div>
        <div class="nn-ft-brand">Naalas<span>Rice Store &bull; Sangareddy</span></div>
      </div>
      <p class="nn-ft-desc">Your trusted local rice supplier in Sangareddy, Telangana. Premium quality brands at wholesale prices, delivered to your door.</p>
      <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hello!%20I%20want%20to%20order%20rice" class="nn-ft-wa">&#x1F4AC; Order on WhatsApp</a>
    </div>
    <div>
      <h4>Quick Links</h4>
      <div class="nn-ft-links">
        <a href="#home">Home</a><a href="#products">Products</a><a href="#about">About Us</a><a href="#why-us">Why Choose Us</a><a href="#contact">Contact</a>
      </div>
    </div>
    <div>
      <h4>Our Products</h4>
      <div class="nn-ft-links">
        <?php foreach ($products as $fp): ?>
        <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=<?php echo urlencode('I want to order '.$fp->get_name().' from Naalas Rice Store'); ?>"><?php echo esc_html($fp->get_name()); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <div>
      <h4>Contact Info</h4>
      <div class="nn-ft-ci"><span>&#x1F4CD;</span><p>Plot No. 309, 15-72, Housing Board Colony, Sangareddy, Telangana</p></div>
      <div class="nn-ft-ci"><span>&#x1F4DE;</span><p><a href="tel:+917799455932">+91 77994 55932</a></p></div>
      <div class="nn-ft-ci"><span>&#x1F55B;</span><p>Mon&ndash;Sat: 8AM &ndash; 8PM &nbsp;|&nbsp; Sun: 9AM&ndash;5PM</p></div>
    </div>
  </div>
  <div class="nn-ft-bot">
    <p>&copy; 2026 <span>Naalas Rice Store, Sangareddy</span>. All rights reserved.</p>
    <p>Plot No. 309, Housing Board Colony, Sangareddy, Telangana &nbsp;&bull;&nbsp; +91 77994 55932</p>
  </div>
</footer>

</div></div>

<!-- FLOATING WA -->
<a class="nn-fwa" href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Hello!%20I%20want%20to%20order%20rice%20from%20Naalas%20Rice%20Store" title="Order on WhatsApp">&#x1F4AC;</a>

<script>
document.querySelectorAll('a[href^="#"]').forEach(function(a){
  a.addEventListener('click',function(e){
    var t=document.querySelector(this.getAttribute('href'));
    if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth',block:'start'});}
  });
});
(function(){
  var n=document.getElementById('nn-nav');if(!n)return;
  window.addEventListener('scroll',function(){
    n.style.boxShadow=window.scrollY>20?'0 4px 32px rgba(0,0,0,.25)':'0 4px 24px rgba(0,0,0,.15)';
  },{passive:true});
})();
</script>
    <?php
    return ob_get_clean();
}
