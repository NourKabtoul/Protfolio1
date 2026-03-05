@extends('layouts.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700&family=JetBrains+Mono:wght@300;400;500;600&display=swap');

:root {
  --bg:      #02040a;
  --bg2:     #060b16;
  --bg3:     #0a1020;
  --bg4:     #0f1830;
  --a1:      #3b82f6;
  --a2:      #8b5cf6;
  --a3:      #06b6d4;
  --gold:    #f59e0b;
  --green:   #10b981;
  --red:     #ef4444;
  --text:    #f1f5f9;
  --sub:     #94a3b8;
  --muted:   #475569;
  --dim:     #1e293b;
  --border:  rgba(59,130,246,.14);
  --border2: rgba(255,255,255,.06);
  --border3: rgba(255,255,255,.03);
}

*,*::before,*::after { box-sizing:border-box; margin:0; padding:0 }
html { scroll-behavior:smooth }
body {
  background:var(--bg);
  color:var(--text);
  font-family:'Outfit', sans-serif;
  overflow-x:hidden;
  cursor:none;
  line-height:1.6;
}

/* ════ CURSOR ════ */
#cur-d {
  position:fixed; width:6px; height:6px;
  background:#fff; border-radius:50%;
  pointer-events:none; z-index:9999;
  transform:translate(-50%,-50%);
  transition:width .15s,height .15s,background .15s;
}
#cur-r {
  position:fixed; width:40px; height:40px;
  border:1.5px solid rgba(59,130,246,.55);
  border-radius:50%; pointer-events:none; z-index:9998;
  transform:translate(-50%,-50%);
  transition:width .22s,height .22s,border-color .22s,border-radius .22s;
}
.cur-big #cur-r { width:60px; height:60px; border-color:rgba(139,92,246,.7) }
.cur-link #cur-r { width:52px; height:52px; border-radius:4px; border-color:rgba(59,130,246,.8) }

/* ════ CANVAS ════ */
#cvs { position:fixed; inset:0; z-index:0; pointer-events:none; opacity:.5 }

/* ════ NOISE ════ */
body::after {
  content:''; position:fixed; inset:0;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  opacity:.028; pointer-events:none; z-index:1;
}

/* ════ LAYOUT ════ */
section { position:relative; z-index:2 }
.pad  { padding:120px 0 }
.pad-sm { padding:72px 0 }
.divider { height:1px; background:linear-gradient(90deg,transparent,var(--border2) 20%,var(--border2) 80%,transparent) }

/* ════ TYPE ════ */
.lbl {
  font-family:'JetBrains Mono',monospace;
  font-size:.68rem; letter-spacing:.22em; text-transform:uppercase;
  color:var(--a3); display:block; margin-bottom:12px;
}
.h1 {
  font-family:'Syne',sans-serif;
  font-size:clamp(2.4rem,5vw,4rem);
  font-weight:800; letter-spacing:-.04em; line-height:1.05;
}
.h1-xl {
  font-family:'Syne',sans-serif;
  font-size:clamp(4.5rem,10vw,9rem);
  font-weight:800; letter-spacing:-.05em; line-height:.9;
}
.mono { font-family:'JetBrains Mono',monospace }

/* ════ REVEAL ════ */
.rv  { opacity:0; transform:translateY(48px); transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1) }
.rvl { opacity:0; transform:translateX(-48px); transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1) }
.rvr { opacity:0; transform:translateX(48px);  transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1) }
.rv.on,.rvl.on,.rvr.on { opacity:1; transform:none }

/* ════ NAVBAR ════ */
.nav {
  position:fixed; top:0; left:0; right:0; z-index:600;
  padding:24px 0; transition:all .4s;
}
.nav.s {
  background:rgba(2,4,10,.9); backdrop-filter:blur(28px) saturate(180%);
  padding:14px 0; box-shadow:0 1px 0 var(--border2);
}
.nav-inner { display:flex; align-items:center; justify-content:space-between }
.nav-logo {
  font-family:'JetBrains Mono',monospace; font-size:.95rem; font-weight:600;
  color:#fff; text-decoration:none; letter-spacing:-.02em;
}
.nav-logo b { color:var(--a1) }
.nav-links { display:flex; gap:36px; list-style:none }
.nav-links a {
  font-size:.78rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase;
  color:var(--muted); text-decoration:none; transition:color .2s;
}
.nav-links a:hover { color:#fff }
.nav-cta {
  font-family:'JetBrains Mono',monospace; font-size:.72rem; letter-spacing:.08em;
  padding:10px 24px; border-radius:3px; text-decoration:none;
  background:var(--a1); color:#fff; transition:all .25s;
}
.nav-cta:hover { background:var(--a2); box-shadow:0 0 32px rgba(59,130,246,.4); transform:translateY(-1px) }

/* ════ BUTTONS ════ */
.btn {
  display:inline-flex; align-items:center; gap:9px;
  padding:14px 30px; border-radius:4px; text-decoration:none;
  font-weight:700; font-size:.84rem; letter-spacing:.06em; text-transform:uppercase;
  transition:all .28s cubic-bezier(.16,1,.3,1);
}
.btn-blue { background:var(--a1); color:#fff }
.btn-blue:hover { background:#1d4ed8; transform:translateY(-2px); box-shadow:0 20px 50px rgba(59,130,246,.4) }
.btn-ghost { border:1px solid var(--border2); color:var(--text); background:transparent }
.btn-ghost:hover { border-color:rgba(59,130,246,.4); background:rgba(59,130,246,.05); transform:translateY(-2px) }
.btn-sm { padding:11px 22px; font-size:.76rem }

/* ════ HERO ════ */
.hero {
  min-height:100vh; display:flex; align-items:center;
  padding-top:110px; overflow:hidden;
}
.hero-bg-glow {
  position:absolute; top:-300px; right:-300px; width:1000px; height:1000px;
  background:radial-gradient(circle at 55% 40%, rgba(59,130,246,.1) 0%, rgba(139,92,246,.06) 40%, transparent 70%);
  pointer-events:none;
}
.hero-grid-lines {
  position:absolute; inset:0; pointer-events:none;
  background-image:
    linear-gradient(rgba(59,130,246,.035) 1px,transparent 1px),
    linear-gradient(90deg,rgba(59,130,246,.035) 1px,transparent 1px);
  background-size:70px 70px;
  mask-image:radial-gradient(ellipse 90% 70% at 50% 50%,black,transparent);
}
.hero-eyebrow {
  display:inline-flex; align-items:center; gap:10px;
  padding:7px 16px; border-radius:3px; margin-bottom:30px;
  background:rgba(16,185,129,.07); border:1px solid rgba(16,185,129,.2);
  font-family:'JetBrains Mono',monospace; font-size:.7rem; letter-spacing:.18em;
  text-transform:uppercase; color:var(--green);
  opacity:0; animation:fadeUp .6s .2s forwards;
}
.blink-dot {
  width:7px; height:7px; border-radius:50%;
  background:var(--green); flex-shrink:0;
  animation:pulseGreen 2s infinite;
}
.hero-name {
  font-family:'Syne',sans-serif;
  font-size:clamp(4rem,10vw,9.5rem);
  font-weight:800; letter-spacing:-.05em; line-height:.88;
  opacity:0; animation:fadeUp .8s .35s forwards;
}
.hero-name .w1 { display:block; color:#fff }
.hero-name .w2 {
  display:block;
  background:linear-gradient(135deg,#60a5fa 0%,#a78bfa 50%,#c084fc 100%);
  -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}
.hero-tag-row {
  display:flex; align-items:center; gap:12px; margin-top:22px; flex-wrap:wrap;
  opacity:0; animation:fadeUp .7s .52s forwards;
}
.tag-badge {
  font-family:'JetBrains Mono',monospace; font-size:.7rem; padding:5px 12px;
  border-radius:3px; background:rgba(59,130,246,.1); border:1px solid rgba(59,130,246,.3);
  color:var(--a1); white-space:nowrap;
}
.tag-typed { font-family:'JetBrains Mono',monospace; font-size:1rem; color:var(--sub) }
.typed-c { color:var(--a1); animation:blink 1s infinite }
.hero-bio {
  max-width:480px; color:#64748b; line-height:1.9; font-size:.97rem;
  margin-top:28px; opacity:0; animation:fadeUp .7s .68s forwards;
}
.hero-actions { display:flex; gap:14px; margin-top:42px; flex-wrap:wrap; opacity:0; animation:fadeUp .7s .85s forwards }

/* Terminal */
.terminal {
  background:var(--bg2); border:1px solid var(--border); border-radius:12px;
  overflow:hidden; box-shadow:0 50px 140px rgba(0,0,0,.7),0 0 0 1px rgba(255,255,255,.04);
  opacity:0; animation:fadeIn 1s 1s forwards;
}
.t-header {
  background:var(--bg3); padding:12px 18px;
  display:flex; align-items:center; gap:8px; border-bottom:1px solid var(--border2);
}
.t-btn { width:12px; height:12px; border-radius:50% }
.t-r{background:#ff5f57}.t-y{background:#febc2e}.t-g{background:#28c840}
.t-name { font-family:'JetBrains Mono',monospace; font-size:.65rem; color:var(--muted); margin:0 auto; letter-spacing:.06em }
.t-body { padding:22px 24px; font-family:'JetBrains Mono',monospace; font-size:.78rem; line-height:1.95 }
.t-ln { display:flex; gap:10px }
.t-p { color:var(--a2) }
.t-c { color:#e2e8f0 }
.t-ok { color:var(--green) }
.t-hi { color:var(--a3) }
.t-dim { color:#64748b }
.t-cur { animation:blink 1s infinite; color:var(--a1) }

/* Floating chips */
.chip {
  position:absolute; background:rgba(6,11,22,.92);
  border:1px solid var(--border); border-radius:8px;
  padding:11px 15px; backdrop-filter:blur(20px); font-size:.74rem; z-index:10;
  white-space:nowrap;
}
.chip strong { display:block; font-family:'JetBrains Mono',monospace; font-weight:700; color:#fff; font-size:.9rem }
.chip span   { color:var(--muted); font-size:.67rem }
.chip .ci    { width:8px; height:8px; border-radius:50%; display:inline-block; margin-right:6px }
.ch1 { top:-18px; right:-55px; animation:float 5s ease-in-out infinite }
.ch2 { bottom:50px; left:-65px; animation:float 5s 1.8s ease-in-out infinite }
.ch3 { bottom:-14px; right:10px; animation:float 5s .9s ease-in-out infinite }

/* Scroll cue */
.scroll-cue {
  position:absolute; bottom:32px; left:50%; transform:translateX(-50%);
  display:flex; flex-direction:column; align-items:center; gap:10px;
  opacity:0; animation:fadeIn 1s 1.8s forwards;
}
.scroll-cue span { font-family:'JetBrains Mono',monospace; font-size:.6rem; letter-spacing:.22em; color:var(--muted); text-transform:uppercase }
.scroll-bar { width:1px; height:54px; background:linear-gradient(to bottom,var(--a1),transparent); animation:dropLine 2s ease-in-out infinite }

/* ════ STRIP ════ */
.strip { background:var(--bg3); border-top:1px solid var(--border2); border-bottom:1px solid var(--border2); padding:52px 0 }
.strip-item { text-align:center; padding:0 16px }
.strip-num {
  font-family:'Syne',sans-serif; font-size:2.6rem; font-weight:800; letter-spacing:-.04em;
  background:linear-gradient(135deg,#fff,#94a3b8);
  -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}
.strip-lbl { font-family:'JetBrains Mono',monospace; font-size:.62rem; letter-spacing:.16em; text-transform:uppercase; color:var(--muted); margin-top:5px }

/* ════ ABOUT ════ */
.about-sec { background:var(--bg2); border-top:1px solid var(--border2) }
.stat-row { padding:26px 0; border-bottom:1px solid var(--border3) }
.stat-row:last-child { border:none }
.stat-n { font-family:'Syne',sans-serif; font-size:2.6rem; font-weight:800; letter-spacing:-.04em; color:#fff }
.stat-n em { color:var(--a1); font-style:normal }
.stat-l { font-family:'JetBrains Mono',monospace; font-size:.72rem; letter-spacing:.1em; text-transform:uppercase; color:var(--muted); margin-top:3px }
.skill-row { display:flex; justify-content:space-between; align-items:center; padding:14px 0; border-bottom:1px solid var(--border3); transition:padding .25s }
.skill-row:hover { padding-left:6px }
.skill-row:last-child { border:none }
.skill-name { font-weight:600; font-size:.93rem }
.skill-bar-w { width:110px; height:2px; background:rgba(255,255,255,.07); border-radius:2px; overflow:hidden }
.skill-bar { height:100%; border-radius:2px; background:linear-gradient(90deg,var(--a1),var(--a2)); transform:scaleX(0); transform-origin:left; transition:transform 1.3s cubic-bezier(.16,1,.3,1) }
.skill-row.on .skill-bar { transform:scaleX(1) }
.focus-box { background:var(--bg3); border:1px solid var(--border); border-radius:10px; padding:32px }
.focus-row { display:flex; align-items:center; gap:10px; padding:8px 0; border-bottom:1px solid var(--border3); font-size:.88rem; color:var(--sub) }
.focus-row:last-child { border:none }
.focus-row::before { content:'→'; color:var(--a3); font-family:'JetBrains Mono',monospace; font-size:.75rem; flex-shrink:0 }

/* ════ STACK ════ */
.stack-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(120px,1fr)); gap:10px }
.sk { background:var(--bg2); border:1px solid var(--border2); border-radius:8px; padding:20px 14px; text-align:center; transition:all .3s cubic-bezier(.16,1,.3,1); cursor:default }
.sk:hover { border-color:rgba(59,130,246,.5); transform:translateY(-7px); background:var(--bg3); box-shadow:0 24px 64px rgba(59,130,246,.12) }
.sk i { font-size:1.65rem; color:var(--a1); display:block; margin-bottom:10px; transition:color .3s }
.sk:hover i { color:var(--a3) }
.sk span { font-size:.68rem; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:#475569 }

/* ════ PROJECTS ════ */
.proj-sec { background:var(--bg2) }
.proj-label { font-family:'JetBrains Mono',monospace; font-size:.62rem; letter-spacing:.22em; color:var(--muted); margin-bottom:14px }
.proj-h { font-family:'Syne',sans-serif; font-size:clamp(1.9rem,3.5vw,2.7rem); font-weight:800; letter-spacing:-.04em; line-height:1.05 }
.proj-desc { color:#64748b; line-height:1.85; font-size:.95rem; margin-top:14px }
.proj-wrap { position:relative; border-radius:12px; overflow:hidden; border:1px solid var(--border2); box-shadow:0 40px 100px rgba(0,0,0,.5) }
.proj-bar { background:var(--bg3); padding:10px 14px; display:flex; align-items:center; gap:8px; border-bottom:1px solid var(--border2) }
.pb-dots { display:flex; gap:5px }
.pb-d { width:9px; height:9px; border-radius:50% }
.pb-r{background:#ff5f57}.pb-y{background:#febc2e}.pb-g{background:#28c840}
.pb-url { flex:1; background:var(--bg2); border-radius:3px; padding:4px 11px; margin-left:10px; font-family:'JetBrains Mono',monospace; font-size:.62rem; color:var(--muted); border:1px solid var(--border2) }
.proj-img-w { overflow:hidden; line-height:0 }
.proj-img-w img { width:100%; display:block; transition:transform .7s cubic-bezier(.16,1,.3,1),filter .4s; filter:brightness(.78) saturate(.9) }
.proj-img-w:hover img { transform:scale(1.05); filter:brightness(1) saturate(1.1) }
.proj-ov { position:absolute; bottom:0; left:0; right:0; height:50%; background:linear-gradient(to top,rgba(2,4,10,.85),transparent); pointer-events:none }
.proj-ov2 { position:absolute; inset:0; background:linear-gradient(135deg,rgba(59,130,246,.09),transparent 55%); pointer-events:none }
.feat { list-style:none; margin-top:18px }
.feat li { display:flex; align-items:flex-start; gap:9px; padding:7px 0; font-size:.88rem; color:var(--sub); border-bottom:1px solid var(--border3) }
.feat li:last-child { border:none }
.feat li::before { content:'↳'; color:var(--a3); font-family:'JetBrains Mono',monospace; font-size:.75rem; flex-shrink:0; margin-top:1px }
.ptag { display:inline-block; font-family:'JetBrains Mono',monospace; font-size:.64rem; letter-spacing:.06em; padding:4px 10px; border-radius:3px; margin:0 4px 4px 0; border:1px solid rgba(59,130,246,.25); color:var(--a1); background:rgba(59,130,246,.05); transition:background .2s }
.ptag:hover { background:rgba(59,130,246,.12) }
.proj-sep { margin:80px 0; position:relative }
.proj-sep::before { content:''; display:block; height:1px; background:linear-gradient(90deg,transparent,var(--border2) 25%,var(--border2) 75%,transparent) }
.proj-sep-t { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); background:var(--bg2); padding:0 18px; font-family:'JetBrains Mono',monospace; font-size:.58rem; letter-spacing:.22em; color:var(--muted); text-transform:uppercase }

/* ════ VALUE ════ */
.v-card { background:var(--bg2); border:1px solid var(--border2); border-radius:10px; padding:38px; height:100%; transition:all .35s cubic-bezier(.16,1,.3,1); position:relative; overflow:hidden }
.v-card::before { content:''; position:absolute; inset:0; background:linear-gradient(135deg,rgba(59,130,246,.05),transparent 65%); opacity:0; transition:opacity .35s }
.v-card:hover { border-color:rgba(59,130,246,.4); transform:translateY(-5px); box-shadow:0 30px 80px rgba(59,130,246,.1) }
.v-card:hover::before { opacity:1 }
.v-ico { width:44px; height:44px; border-radius:8px; background:rgba(59,130,246,.1); border:1px solid rgba(59,130,246,.2); display:flex; align-items:center; justify-content:center; margin-bottom:22px }
.v-ico i { color:var(--a1); font-size:1.1rem }
.v-card h5 { font-family:'Syne',sans-serif; font-size:1.2rem; font-weight:700; letter-spacing:-.02em; margin-bottom:10px }
.v-card p { color:var(--muted); font-size:.88rem; line-height:1.75 }

/* ════ TESTIMONIALS ════ */
.testi-sec { background:var(--bg3); border-top:1px solid var(--border2); border-bottom:1px solid var(--border2) }
.testi-card {
  background:var(--bg2); border:1px solid var(--border2); border-radius:12px;
  padding:36px; height:100%; position:relative; overflow:hidden;
  transition:all .3s cubic-bezier(.16,1,.3,1);
}
.testi-card:hover { border-color:rgba(59,130,246,.3); transform:translateY(-4px) }
.testi-quote { font-size:3rem; line-height:1; color:rgba(59,130,246,.3); font-family:'Syne',sans-serif; font-weight:800; margin-bottom:16px }
.testi-text { color:var(--sub); font-size:.93rem; line-height:1.85; font-style:italic; margin-bottom:24px }
.testi-author { display:flex; align-items:center; gap:12px }
.testi-avatar { width:42px; height:42px; border-radius:50%; background:linear-gradient(135deg,var(--a1),var(--a2)); display:flex; align-items:center; justify-content:center; font-weight:800; font-size:.9rem; color:#fff; flex-shrink:0 }
.testi-name { font-weight:700; font-size:.9rem }
.testi-role { font-size:.75rem; color:var(--muted); font-family:'JetBrains Mono',monospace }
.testi-stars { color:var(--gold); font-size:.8rem; margin-bottom:12px }

/* ════ TIMELINE ════ */
.tl-sec { background:var(--bg2); border-top:1px solid var(--border2) }
.tl-row { display:flex; gap:28px; padding:28px 0; border-bottom:1px solid var(--border3) }
.tl-row:last-child { border:none }
.tl-yr { font-family:'JetBrains Mono',monospace; font-size:.68rem; letter-spacing:.1em; color:var(--a1); min-width:54px; padding-top:4px }
.tl-dot { width:10px; height:10px; border-radius:50%; background:var(--a1); box-shadow:0 0 14px var(--a1); flex-shrink:0; margin-top:6px }
.tl-body h6 { font-weight:700; font-size:.97rem; margin-bottom:4px }
.tl-body p { color:var(--muted); font-size:.83rem; line-height:1.65 }

/* ════ BLOG ════ */
.blog-sec { background:var(--bg) }
.blog-card { background:var(--bg2); border:1px solid var(--border2); border-radius:10px; overflow:hidden; height:100%; transition:all .3s cubic-bezier(.16,1,.3,1) }
.blog-card:hover { border-color:rgba(59,130,246,.35); transform:translateY(-5px); box-shadow:0 24px 64px rgba(59,130,246,.1) }
.blog-img { width:100%; height:180px; object-fit:cover; display:block; filter:brightness(.8) saturate(.9); transition:filter .4s }
.blog-card:hover .blog-img { filter:brightness(1) saturate(1) }
.blog-body { padding:24px }
.blog-cat { font-family:'JetBrains Mono',monospace; font-size:.65rem; letter-spacing:.12em; text-transform:uppercase; color:var(--a3); margin-bottom:10px }
.blog-title { font-family:'Syne',sans-serif; font-size:1.05rem; font-weight:700; letter-spacing:-.02em; line-height:1.3; margin-bottom:10px; color:var(--text) }
.blog-desc { color:var(--muted); font-size:.83rem; line-height:1.7 }
.blog-footer { padding:0 24px 20px; display:flex; align-items:center; justify-content:space-between }
.blog-date { font-family:'JetBrains Mono',monospace; font-size:.62rem; color:var(--muted) }
.blog-read { font-size:.75rem; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--a1); text-decoration:none; transition:color .2s }
.blog-read:hover { color:var(--a3) }

/* ════ CONTACT ════ */
.contact-sec { background:var(--bg); border-top:1px solid var(--border2); overflow:hidden }
.contact-glow { position:absolute; bottom:-250px; left:50%; transform:translateX(-50%); width:800px; height:800px; background:radial-gradient(circle,rgba(59,130,246,.1) 0%,transparent 65%); pointer-events:none }
.contact-mega {
  font-family:'Syne',sans-serif;
  font-size:clamp(3.5rem,9vw,8rem);
  font-weight:800; letter-spacing:-.05em; line-height:.9;
  background:linear-gradient(135deg,#fff 0%,#334155 100%);
  -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}
.c-link { display:inline-flex; align-items:center; gap:10px; padding:14px 28px; border-radius:4px; font-weight:700; font-size:.84rem; letter-spacing:.06em; text-transform:uppercase; text-decoration:none; transition:all .28s }
.c-blue { background:var(--a1); color:#fff }
.c-blue:hover { background:#1d4ed8; transform:translateY(-2px); box-shadow:0 20px 50px rgba(59,130,246,.45) }
.c-ghost { border:1px solid var(--border2); color:var(--text) }
.c-ghost:hover { border-color:rgba(59,130,246,.4); background:rgba(59,130,246,.05); transform:translateY(-2px) }

/* ════ FOOTER ════ */
.nkfoot { border-top:1px solid var(--border2); padding:26px 0; position:relative; z-index:2 }
.nkfoot-inner { display:flex; align-items:center; justify-content:space-between; font-family:'JetBrains Mono',monospace; font-size:.62rem; letter-spacing:.1em; color:var(--muted) }

/* ════ KEYFRAMES ════ */
@keyframes fadeUp  { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:none} }
@keyframes fadeIn  { from{opacity:0} to{opacity:1} }
@keyframes blink   { 0%,100%{opacity:1} 50%{opacity:0} }
@keyframes float   { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-14px)} }
@keyframes pulseGreen { 0%,100%{box-shadow:0 0 0 0 rgba(16,185,129,.5)} 50%{box-shadow:0 0 0 7px rgba(16,185,129,0)} }
@keyframes dropLine { 0%,100%{opacity:1} 50%{opacity:.25} }

/* ════ RESPONSIVE ════ */
@media(max-width:991px){
  .nav-links,.nav-cta{display:none}
  .hero-name{font-size:clamp(3.5rem,13vw,6rem)}
  .ch1,.ch2,.ch3{display:none}
  .contact-mega{font-size:clamp(3rem,10vw,5.5rem)}
}
@media(max-width:576px){
  .hero-actions,.nkfoot-inner{flex-direction:column;gap:10px;text-align:center}
  .c-link-row{flex-direction:column}
}
</style>

{{-- Custom cursor --}}
<div id="cur-d"></div>
<div id="cur-r"></div>
<canvas id="cvs"></canvas>

{{-- ══════════════════════════════
     NAVBAR
══════════════════════════════ --}}
<nav class="nav" id="navbar">
  <div class="container nav-inner">
    <a class="nav-logo" href="#home">nk<b>.</b>dev</a>
    <ul class="nav-links mb-0">
      <li><a href="#about">About</a></li>
      <li><a href="#stack">Stack</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#blog">Blog</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <a href="mailto:your@email.com" class="nav-cta">Hire Me</a>
  </div>
</nav>

{{-- ══════════════════════════════
     HERO
══════════════════════════════ --}}
<section class="hero" id="home">
  <div class="hero-bg-glow"></div>
  <div class="hero-grid-lines"></div>

  <div class="container" style="position:relative;z-index:2">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="hero-eyebrow">
          <span class="blink-dot"></span>Available for new projects
        </div>
        <h1 class="hero-name">
          <span class="w1">Nour</span>
          <span class="w2">Kabtoul.</span>
        </h1>
        <div class="hero-tag-row">
          <span class="tag-badge">Laravel</span>
          <span class="tag-typed">
            <span id="typed-el"></span><span class="typed-c">_</span>
          </span>
        </div>
        <p class="hero-bio">
          Backend engineer turning complex business requirements into elegant,
          production-ready Laravel systems. Clean code. Bulletproof APIs.
          Systems built to outlast trends.
        </p>
        <div class="hero-actions">
          <a href="#projects" class="btn btn-blue">
            <i class="fas fa-terminal" style="font-size:.78rem"></i> See My Work
          </a>
          <a href="{{ asset('cv.pdf') }}" download class="btn btn-ghost">
            <i class="fas fa-file-arrow-down" style="font-size:.78rem"></i> Download CV
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div style="position:relative">

          <div class="chip ch1">
            <span><span class="ci" style="background:var(--green)"></span>System status</span>
            <strong>All Online ✓</strong>
          </div>
          <div class="chip ch2">
            <span><span class="ci" style="background:var(--a1)"></span>Last deploy</span>
            <strong>3 mins ago</strong>
          </div>
          <div class="chip ch3">
            <span><span class="ci" style="background:var(--gold)"></span>PageSpeed</span>
            <strong>98 / 100</strong>
          </div>

          <div class="terminal">
            <div class="t-header">
              <span class="t-btn t-r"></span>
              <span class="t-btn t-y"></span>
              <span class="t-btn t-g"></span>
              <span class="t-name">nour@kabtoul:~/laravel-app</span>
            </div>
            <div class="t-body">
              <div class="t-ln"><span class="t-p">❯</span><span class="t-c"> composer install</span></div>
              <div class="t-ln"><span class="t-ok">✓ 148 packages installed</span></div>
              <div class="t-ln" style="margin-top:6px"><span class="t-p">❯</span><span class="t-c"> php artisan migrate:fresh --seed</span></div>
              <div class="t-ln"><span class="t-dim">  Migrating: 2024_create_users_table</span></div>
              <div class="t-ln"><span class="t-ok">✓ 24 migrations ran successfully</span></div>
              <div class="t-ln" style="margin-top:6px"><span class="t-p">❯</span><span class="t-c"> php artisan optimize:clear && php artisan optimize</span></div>
              <div class="t-ln"><span class="t-hi">  INFO  Caching routes, config, views...</span></div>
              <div class="t-ln"><span class="t-ok">✓ Application optimized.</span></div>
              <div class="t-ln" style="margin-top:6px"><span class="t-p">❯</span><span class="t-c"> php artisan serve</span></div>
              <div class="t-ln"><span class="t-ok">✓ Server running → </span><span class="t-hi">http://127.0.0.1:8000</span></div>
              <div class="t-ln" style="margin-top:6px"><span class="t-p" style="color:var(--a3)">❯</span><span> </span><span class="t-cur">█</span></div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="scroll-cue">
    <span>Scroll</span>
    <div class="scroll-bar"></div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     METRICS STRIP
══════════════════════════════ --}}
<div class="strip">
  <div class="container">
    <div class="row justify-content-center text-center g-4">
      @php
      $strip = [['3+','Years Experience'],['10+','Projects Shipped'],['50K+','Lines Written'],['100%','Dedication']];
      @endphp
      @foreach($strip as $i=>$s)
      <div class="col-6 col-md-3 rv" style="transition-delay:{{$i*.07}}s">
        <div class="strip-item">
          <div class="strip-num">{{ $s[0] }}</div>
          <div class="strip-lbl">{{ $s[1] }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

{{-- ══════════════════════════════
     ABOUT
══════════════════════════════ --}}
<section id="about" class="pad about-sec">
  <div class="container">
    <div class="row g-5 align-items-start">

      <div class="col-lg-5 rvl">
        <span class="lbl">// About me</span>
        <h2 class="h1 mb-4">Engineer.<br>Architect.<br>Problem-Solver.</h2>
        <p style="color:#64748b;line-height:1.9;font-size:.96rem" class="mb-4">
          I'm Nour Kabtoul — a Laravel backend engineer who believes great software
          starts long before the first line of code. I think in systems, not features.
        </p>
        <p style="color:#64748b;line-height:1.9;font-size:.96rem" class="mb-5">
          Whether it's a lean API or a complex SaaS platform, I approach every project
          with the same obsession: clean structure, zero performance debt, and code
          that's honest about what it does.
        </p>
        <div>
          <div class="stat-row"><div class="stat-n">3<em>+</em></div><div class="stat-l">Years Building Real Systems</div></div>
          <div class="stat-row"><div class="stat-n">10<em>+</em></div><div class="stat-l">Production Projects Shipped</div></div>
          <div class="stat-row"><div class="stat-n">∞</div><div class="stat-l">Commitment to Clean Code</div></div>
        </div>
      </div>

      <div class="col-lg-7 rvr" style="transition-delay:.12s">
        <span class="lbl" style="margin-bottom:22px">// Skill levels</span>
        @php
        $skills = [['Laravel & PHP',96],['RESTful API Design',93],['MySQL & Query Optimization',89],['Auth & Security',91],['SaaS Multi-Tenancy',84],['Redis & Caching',79]];
        @endphp
        @foreach($skills as $sk)
        <div class="skill-row">
          <span class="skill-name">{{ $sk[0] }}</span>
          <div style="display:flex;align-items:center;gap:14px">
            <span class="mono" style="font-size:.66rem;color:var(--muted)">{{ $sk[1] }}%</span>
            <div class="skill-bar-w"><div class="skill-bar" style="width:{{ $sk[1] }}%"></div></div>
          </div>
        </div>
        @endforeach

        <div class="focus-box mt-5">
          <span class="lbl" style="margin-bottom:16px">// Core focus areas</span>
          @php
          $focuses = ['Clean Laravel Architecture','RESTful & GraphQL APIs','Database Design & Optimization','Secure Auth (Sanctum, Passport, OAuth2)','Multi-Tenant SaaS Architecture','Performance Tuning & Caching','Service Layer & Repository Pattern','Production Deployment & DevOps'];
          @endphp
          <div class="row g-0">
            @foreach($focuses as $f)
            <div class="col-md-6">
              <div class="focus-row">{{ $f }}</div>
            </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     STACK
══════════════════════════════ --}}
<section id="stack" class="pad">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="lbl" style="display:block">// Core Stack</span>
      <h2 class="h1">Technologies I master</h2>
    </div>
    @php
    $stacks = [
      ['fab fa-laravel','Laravel'],['fab fa-php','PHP 8.x'],
      ['fas fa-database','MySQL'],['fas fa-code','REST API'],
      ['fab fa-bootstrap','Bootstrap'],['fas fa-bolt','Livewire'],
      ['fab fa-git-alt','Git'],['fab fa-linux','Linux'],
      ['fas fa-server','Redis'],['fas fa-lock','Security'],
      ['fas fa-cube','Docker'],['fab fa-js','Alpine.js'],
    ];
    @endphp
    <div class="stack-grid">
      @foreach($stacks as $i=>$s)
      <div class="sk rv" style="transition-delay:{{$i*.05}}s">
        <i class="{{ $s[0] }}"></i>
        <span>{{ $s[1] }}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     PROJECTS
══════════════════════════════ --}}
<section id="projects" class="pad proj-sec">
  <div class="container">

    <div class="text-center mb-5 rv" style="max-width:580px;margin-left:auto;margin-right:auto">
      <span class="lbl" style="display:block">// Featured Work</span>
      <h2 class="h1">Systems built to<br><em style="color:var(--a1);font-style:normal">scale and ship.</em></h2>
      <p style="color:var(--muted);margin-top:14px;font-size:.92rem;line-height:1.75">
        Not side projects — real backend systems deployed in production environments.
      </p>
    </div>

    {{-- PROJECT 1 --}}
    <div class="row align-items-center g-5">
      <div class="col-lg-7 rvl">
        <div class="proj-wrap">
          <div class="proj-bar">
            <div class="pb-dots"><span class="pb-d pb-r"></span><span class="pb-d pb-y"></span><span class="pb-d pb-g"></span></div>
            <div class="pb-url">github.com/NourKabtoul/shopnest</div>
          </div>
          <div class="proj-img-w">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=900&q=85&fit=crop" alt="ShopNest">
          </div>
          <div class="proj-ov"></div>
          <div class="proj-ov2"></div>
        </div>
      </div>
      <div class="col-lg-5 rvr" style="transition-delay:.12s">
        <p class="proj-label">PROJECT 01 / 03</p>
        <h3 class="proj-h">ShopNest<br><span style="color:var(--a1)">E-Commerce Platform</span></h3>
        <p class="proj-desc">Full-stack marketplace with multi-vendor support. Real-time inventory, Stripe payments, role-based auth, and an admin panel engineered to handle high transaction volume.</p>
        <ul class="feat">
          <li>Multi-vendor dashboard with revenue analytics &amp; charts</li>
          <li>Stripe + PayPal gateway — dual payment integration</li>
          <li>Redis caching on product catalog — 4× query speed boost</li>
          <li>Admin / Vendor / Customer RBAC with Spatie Permissions</li>
        </ul>
        <div class="mt-4 mb-4">
          <span class="ptag">Laravel 11</span><span class="ptag">MySQL</span><span class="ptag">Redis</span>
          <span class="ptag">Livewire</span><span class="ptag">Stripe</span><span class="ptag">Spatie</span>
        </div>
        <div class="d-flex gap-3 flex-wrap">
          <a href="https://github.com/NourKabtoul" target="_blank" class="btn btn-blue btn-sm">
            <i class="fab fa-github"></i> GitHub
          </a>
          <a href="#" class="btn btn-ghost btn-sm">
            <i class="fas fa-external-link-alt"></i> Live Demo
          </a>
        </div>
      </div>
    </div>

    <div class="proj-sep"><span class="proj-sep-t">next project</span></div>

    {{-- PROJECT 2 --}}
    <div class="row align-items-center g-5 flex-lg-row-reverse">
      <div class="col-lg-7 rvr">
        <div class="proj-wrap">
          <div class="proj-bar">
            <div class="pb-dots"><span class="pb-d pb-r"></span><span class="pb-d pb-y"></span><span class="pb-d pb-g"></span></div>
            <div class="pb-url">github.com/NourKabtoul/saasflow</div>
          </div>
          <div class="proj-img-w">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=900&q=85&fit=crop" alt="SaasFlow">
          </div>
          <div class="proj-ov"></div>
          <div class="proj-ov2" style="background:linear-gradient(135deg,rgba(139,92,246,.1),transparent 55%)"></div>
        </div>
      </div>
      <div class="col-lg-5 rvl" style="transition-delay:.12s">
        <p class="proj-label">PROJECT 02 / 03</p>
        <h3 class="proj-h">SaasFlow<br><span style="color:var(--a2)">Multi-Tenant Platform</span></h3>
        <p class="proj-desc">Enterprise SaaS infrastructure with strict tenant isolation via dedicated databases. Built subscription management, API rate limiting, and a zero-friction onboarding flow.</p>
        <ul class="feat">
          <li>Tenant isolation — separate database per client workspace</li>
          <li>Stripe Billing with plan upgrades, trials &amp; webhooks</li>
          <li>REST API with OAuth2, Sanctum &amp; configurable rate limits</li>
          <li>Automated tenant provisioning in under 3 seconds</li>
        </ul>
        <div class="mt-4 mb-4">
          <span class="ptag">Laravel 11</span><span class="ptag">REST API</span><span class="ptag">Livewire</span>
          <span class="ptag">Stripe Billing</span><span class="ptag">OAuth2</span><span class="ptag">Sanctum</span>
        </div>
        <div class="d-flex gap-3 flex-wrap">
          <a href="https://github.com/NourKabtoul" target="_blank" class="btn btn-blue btn-sm">
            <i class="fab fa-github"></i> GitHub
          </a>
          <a href="#" class="btn btn-ghost btn-sm">
            <i class="fas fa-external-link-alt"></i> Live Demo
          </a>
        </div>
      </div>
    </div>

    <div class="proj-sep"><span class="proj-sep-t">next project</span></div>

    {{-- PROJECT 3 --}}
    <div class="row align-items-center g-5">
      <div class="col-lg-7 rvl">
        <div class="proj-wrap">
          <div class="proj-bar">
            <div class="pb-dots"><span class="pb-d pb-r"></span><span class="pb-d pb-y"></span><span class="pb-d pb-g"></span></div>
            <div class="pb-url">github.com/NourKabtoul/nexus-cms</div>
          </div>
          <div class="proj-img-w">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=900&q=85&fit=crop" alt="Nexus CMS">
          </div>
          <div class="proj-ov"></div>
          <div class="proj-ov2" style="background:linear-gradient(135deg,rgba(6,182,212,.09),transparent 55%)"></div>
        </div>
      </div>
      <div class="col-lg-5 rvr" style="transition-delay:.12s">
        <p class="proj-label">PROJECT 03 / 03</p>
        <h3 class="proj-h">Nexus CMS<br><span style="color:var(--a3)">Headless Content Engine</span></h3>
        <p class="proj-desc">Developer-first headless CMS powering 6 production client sites. Clean JSON API, drag-and-drop media library with S3, custom field schema builder — zero hard-coded structure.</p>
        <ul class="feat">
          <li>Full headless REST API with OpenAPI 3.0 documentation</li>
          <li>Drag-and-drop media manager with AWS S3 integration</li>
          <li>Custom field type builder — schema-driven, not code-locked</li>
          <li>Multi-language content + automatic URL slugging</li>
        </ul>
        <div class="mt-4 mb-4">
          <span class="ptag">Laravel 11</span><span class="ptag">Blade</span><span class="ptag">MySQL</span>
          <span class="ptag">Alpine.js</span><span class="ptag">AWS S3</span><span class="ptag">OpenAPI</span>
        </div>
        <div class="d-flex gap-3 flex-wrap">
          <a href="https://github.com/NourKabtoul" target="_blank" class="btn btn-blue btn-sm">
            <i class="fab fa-github"></i> GitHub
          </a>
          <a href="#" class="btn btn-ghost btn-sm">
            <i class="fas fa-external-link-alt"></i> Live Demo
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     VALUE
══════════════════════════════ --}}
<section class="pad">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="lbl" style="display:block">// Why work with me</span>
      <h2 class="h1">What I bring to<br>every project.</h2>
    </div>
    <div class="row g-4">
      @php
      $vals = [
        ['fas fa-layer-group','Scalable by Design','I architect systems from day one to handle 10× your current load. Clean service layers, repository patterns, zero shortcuts that become tomorrow\'s technical debt.'],
        ['fas fa-rocket','Performance Obsessed','Query profiling, N+1 elimination, Redis caching, chunk processing — I measure before and after. Fast in dev means fast in production.'],
        ['fas fa-shield-alt','Security by Default','CSRF protection, input sanitization, rate limiting, proper auth flows — security is not a last-minute checkbox. It\'s baked into every layer I build.'],
        ['fas fa-code-branch','Code Built to Handoff','SOLID principles, clean naming, PSR standards. The next engineer who touches my code will read it like documentation — not archaeology.'],
      ];
      @endphp
      @foreach($vals as $i=>$v)
      <div class="col-md-6 rv" style="transition-delay:{{$i*.07}}s">
        <div class="v-card">
          <div class="v-ico"><i class="{{ $v[0] }}"></i></div>
          <h5>{{ $v[1] }}</h5>
          <p>{{ $v[2] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     TESTIMONIALS
══════════════════════════════ --}}
<section class="pad testi-sec">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="lbl" style="display:block">// Testimonials</span>
      <h2 class="h1">What clients say.</h2>
    </div>
    <div class="row g-4">
      @php
      $testimonials = [
        ['text'=>'Nour delivered a complex multi-tenant SaaS backend in record time. The code quality was exceptional — clean, well-documented, and built to scale. He understood the business logic immediately.','name'=>'Khalid Al-Rashidi','role'=>'Founder @ TechLaunch','init'=>'K'],
        ['text'=>'Best Laravel developer I\'ve worked with. He rebuilt our legacy system from scratch with a clean architecture that the team actually enjoys maintaining. Zero bugs at launch.','name'=>'Sarah Mitchell','role'=>'CTO @ Growable','init'=>'S'],
        ['text'=>'Nour\'s attention to performance was remarkable. Our API response times dropped by 65% after his optimization work. He treats performance as a feature, not an afterthought.','name'=>'Omar Benali','role'=>'Lead Dev @ DataFlow','init'=>'O'],
      ];
      @endphp
      @foreach($testimonials as $i => $t)
      <div class="col-md-4 rv" style="transition-delay:{{$i * 0.1}}s">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <div class="testi-quote">"</div>
          <p class="testi-text">{{ $t['text'] }}</p>
          <div class="testi-author">
            <div class="testi-avatar">{{ $t['init'] }}</div>
            <div>
              <div class="testi-name">{{ $t['name'] }}</div>
              <div class="testi-role">{{ $t['role'] }}</div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     TIMELINE
══════════════════════════════ --}}
<section class="pad-sm tl-sec">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 rvl mb-5 mb-lg-0">
        <span class="lbl">// Journey</span>
        <h2 class="h1" style="font-size:2.2rem">The road<br>so far.</h2>
        <p style="color:var(--muted);margin-top:16px;font-size:.88rem;line-height:1.75">
          Every milestone built on the last. Every project a lesson.
        </p>
      </div>
      <div class="col-lg-8">
        @php
        $tl = [
          ['2022','Discovered Laravel','Started with PHP fundamentals, then discovered Laravel. Fell in love with clean architecture and MVC patterns. Built my first real CRUD applications.'],
          ['2023','First Production Projects','Shipped 3 client projects to production: an e-commerce store, appointment booking system, and internal HR management platform.'],
          ['Early 2024','Advanced Backend Patterns','Deep-dived into SaaS architecture, multi-tenancy, API design with OAuth2, Redis caching, and queue-based job processing.'],
          ['Late 2024','Open Source & APIs','Started contributing to the Laravel ecosystem, built and published reusable packages, and mastered headless CMS architecture.'],
          ['Now →','Open to Challenges','Seeking new backend projects, freelance contracts, or a full-time role where I can architect systems that make a real business impact.'],
        ];
        @endphp
        @foreach($tl as $i=>$t)
        <div class="tl-row rv" style="transition-delay:{{$i*.09}}s">
          <div class="tl-yr">{{ $t[0] }}</div>
          <div class="tl-dot"></div>
          <div class="tl-body">
            <h6>{{ $t[1] }}</h6>
            <p>{{ $t[2] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     BLOG
══════════════════════════════ --}}
<section id="blog" class="pad blog-sec">
  <div class="container">
    <div class="d-flex align-items-end justify-content-between mb-5 rv flex-wrap gap-3">
      <div>
        <span class="lbl">// Articles</span>
        <h2 class="h1">Latest from<br>the blog.</h2>
      </div>
      <a href="#" class="btn btn-ghost btn-sm">View All Articles</a>
    </div>

    <div class="row g-4">
      @php
      $posts = [
        [
          'cat'   => 'Architecture',
          'title' => 'Building Multi-Tenant SaaS with Laravel: The Right Way',
          'desc'  => 'A deep dive into tenant isolation strategies, database-per-tenant vs shared schema, and choosing the right approach for your SaaS product.',
          'date'  => 'Feb 12, 2025',
          'img'   => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&q=80&fit=crop',
        ],
        [
          'cat'   => 'Performance',
          'title' => 'Eliminating N+1 Queries: A Practical Laravel Guide',
          'desc'  => 'How I reduced API response times by 65% using eager loading, query scopes, and the Laravel Debugbar in a real production system.',
          'date'  => 'Jan 28, 2025',
          'img'   => 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=600&q=80&fit=crop',
        ],
        [
          'cat'   => 'Security',
          'title' => 'Laravel API Security Checklist for 2025',
          'desc'  => 'Everything you need to ship a secure Laravel API: authentication patterns, rate limiting, input validation, CORS, and common attack vectors to block.',
          'date'  => 'Jan 10, 2025',
          'img'   => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=600&q=80&fit=crop',
        ],
      ];
      @endphp

      @foreach($posts as $i=>$post)
      <div class="col-md-4 rv" style="transition-delay:{{$i*.08}}s">
        <div class="blog-card">
          <img src="{{ $post['img'] }}" alt="{{ $post['title'] }}" class="blog-img">
          <div class="blog-body">
            <div class="blog-cat">{{ $post['cat'] }}</div>
            <h4 class="blog-title">{{ $post['title'] }}</h4>
            <p class="blog-desc">{{ $post['desc'] }}</p>
          </div>
          <div class="blog-footer">
            <span class="blog-date">{{ $post['date'] }}</span>
            <a href="#" class="blog-read">Read More →</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════════════════════════
     CONTACT
══════════════════════════════ --}}
<section id="contact" class="pad contact-sec">
  <div class="contact-glow"></div>
  <div class="container text-center" style="position:relative;z-index:2">
    <div class="rv">
      <span class="lbl" style="display:block">// Let's connect</span>
      <div class="contact-mega mb-3">Let's Build<br>Something.</div>
      <p style="max-width:460px;margin:0 auto 44px;color:var(--muted);line-height:1.9;font-size:.96rem">
        Open to freelance work, long-term collaborations, and full-time
        backend engineering roles. Tell me what you're building.
      </p>
      <div class="d-flex justify-content-center flex-wrap gap-3">
        <a href="mailto:your@email.com" class="c-link c-blue">
          <i class="fas fa-envelope" style="font-size:.78rem"></i> Send Email
        </a>
        <a href="https://github.com/NourKabtoul" target="_blank" class="c-link c-ghost">
          <i class="fab fa-github" style="font-size:.78rem"></i> GitHub
        </a>
        <a href="https://linkedin.com/in/nourkabtoul" target="_blank" class="c-link c-ghost">
          <i class="fab fa-linkedin" style="font-size:.78rem"></i> LinkedIn
        </a>
        <a href="{{ asset('cv.pdf') }}" download class="c-link c-ghost">
          <i class="fas fa-file-arrow-down" style="font-size:.78rem"></i> Download CV
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ══════════════════════════════
     FOOTER
══════════════════════════════ --}}
<footer class="nkfoot">
  <div class="container">
    <div class="nkfoot-inner">
      <span>© {{ date('Y') }} Nour Kabtoul</span>
      <span style="color:var(--a1)">nk.dev</span>
      <span>Built with Laravel &amp; obsession.</span>
    </div>
  </div>
</footer>

{{-- ══════════════════════════════
     SCRIPTS
══════════════════════════════ --}}
<script>
/* ── Cursor ── */
const d=document,bd=d.body;
const cd=d.getElementById('cur-d'),cr=d.getElementById('cur-r');
let mx=0,my=0,rx=0,ry=0;
d.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY});
(function raf(){
  rx+=(mx-rx)*.1;ry+=(my-ry)*.1;
  cd.style.cssText+=`left:${mx}px;top:${my}px;`;
  cr.style.cssText+=`left:${rx}px;top:${ry}px;`;
  requestAnimationFrame(raf);
})();
d.querySelectorAll('a,button').forEach(el=>{
  el.addEventListener('mouseenter',()=>bd.classList.add('cur-link'));
  el.addEventListener('mouseleave',()=>bd.classList.remove('cur-link'));
});
d.querySelectorAll('.v-card,.testi-card,.blog-card,.sk').forEach(el=>{
  el.addEventListener('mouseenter',()=>bd.classList.add('cur-big'));
  el.addEventListener('mouseleave',()=>bd.classList.remove('cur-big'));
});

/* ── Navbar ── */
const nav=d.getElementById('navbar');
window.addEventListener('scroll',()=>nav.classList.toggle('s',scrollY>50));

/* ── Typed ── */
const phrases=['Backend Engineer','API Architect','SaaS Builder','Performance Freak','Laravel Expert'];
let pi=0,ci=0,del=false;
const el=d.getElementById('typed-el');
function tick(){
  const p=phrases[pi];
  el.textContent=del?p.slice(0,--ci):p.slice(0,++ci);
  if(!del&&ci===p.length){setTimeout(()=>del=true,2200);setTimeout(tick,80);return}
  if(del&&ci===0){del=false;pi=(pi+1)%phrases.length;setTimeout(tick,420);return}
  setTimeout(tick,del?36:74);
}
setTimeout(tick,1500);

/* ── Canvas particles ── */
const cv=d.getElementById('cvs'),cx=cv.getContext('2d');
let W,H,pts=[];
const rsz=()=>{W=cv.width=innerWidth;H=cv.height=innerHeight};
rsz();window.addEventListener('resize',()=>{rsz();initPts()});
function initPts(){
  pts=Array.from({length:90},()=>({
    x:Math.random()*W,y:Math.random()*H,
    vx:(Math.random()-.5)*.2,vy:(Math.random()-.5)*.2,
    r:Math.random()*1.3+.2,a:Math.random()*.35+.06,
  }));
}
initPts();
function draw(){
  cx.clearRect(0,0,W,H);
  pts.forEach(p=>{
    p.x=(p.x+p.vx+W)%W;p.y=(p.y+p.vy+H)%H;
    cx.beginPath();cx.arc(p.x,p.y,p.r,0,6.28);
    cx.fillStyle=`rgba(148,163,184,${p.a})`;cx.fill();
  });
  for(let i=0;i<pts.length;i++)for(let j=i+1;j<pts.length;j++){
    const dx=pts[i].x-pts[j].x,dy=pts[i].y-pts[j].y,dist=Math.hypot(dx,dy);
    if(dist<115){
      cx.beginPath();cx.moveTo(pts[i].x,pts[i].y);cx.lineTo(pts[j].x,pts[j].y);
      cx.strokeStyle=`rgba(59,130,246,${.055*(1-dist/115)})`;cx.stroke();
    }
  }
  requestAnimationFrame(draw);
}
draw();

/* ── Intersection Observer for reveals ── */
const io=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('on');io.unobserve(e.target)}})},{threshold:.1});
d.querySelectorAll('.rv,.rvl,.rvr').forEach(el=>io.observe(el));

/* ── Skill bars ── */
const sio=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('on');sio.unobserve(e.target)}})},{threshold:.35});
d.querySelectorAll('.skill-row').forEach(el=>sio.observe(el));
</script>

@endsection
