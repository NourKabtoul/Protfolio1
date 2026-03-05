@extends('layouts.app')

@section('content')

{{-- Cursor --}}
<div id="cur-d"></div>
<div id="cur-r"></div>
<canvas id="cvs"></canvas>

{{-- ══════════ NAVBAR ══════════ --}}
<nav class="nav" id="navbar">
  <div class="container nav-inner">
    <a class="nav-logo" href="#home">nk<b>.</b>dev</a>
    <ul class="nav-links" style="margin:0">
      <li><a href="#about">About</a></li>
      <li><a href="#stack">Stack</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#blog">Blog</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <div style="display:flex;align-items:center;gap:10px">
      <a href="https://wa.me/963941442334" target="_blank" class="nav-social-btn" title="WhatsApp">
        <i class="fab fa-whatsapp"></i>
      </a>
      <a href="https://instagram.com/nour.ka11" target="_blank" class="nav-social-btn" title="Instagram">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="mailto:nns090242@gmail.com" class="nav-cta">Hire Me</a>
    </div>
    {{-- Mobile hamburger --}}
    <button class="nav-burger" id="nav-burger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
  {{-- Mobile menu --}}
  <div class="nav-mobile" id="nav-mobile">
    <a href="#about"    onclick="closeMobile()">About</a>
    <a href="#stack"    onclick="closeMobile()">Stack</a>
    <a href="#projects" onclick="closeMobile()">Projects</a>
    <a href="#blog"     onclick="closeMobile()">Blog</a>
    <a href="#contact"  onclick="closeMobile()">Contact</a>
    <div class="nav-mobile-social">
      <a href="https://wa.me/963941442334" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
      <a href="https://instagram.com/nour.ka11" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
    </div>
  </div>
</nav>

{{-- ══════════ HERO ══════════ --}}
<section class="hero" id="home">
  <div class="hero-glow"></div>
  <div class="hero-grid"></div>

  <div class="container" style="position:relative;z-index:2">
    <div class="row g5 hero-row" style="align-items:center">

      {{-- LEFT --}}
      <div class="col-lg-5 hero-text-col">
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
        <div class="hero-btns">
          <a href="#projects" class="btn btn-blue">
            <i class="fas fa-terminal"></i> See My Work
          </a>
          <a href="{{ asset('cv.pdf') }}" download="Nour_Kabtoul_CV.pdf" class="btn btn-ghost">
            <i class="fas fa-file-arrow-down"></i> Download CV
          </a>
        </div>
      </div>

      {{-- RIGHT --}}
      <div class="col-lg-7 hero-visual-col">
        <div class="hero-visual">
          <div class="chip ch1">
            <span><span class="ci" style="background:var(--green)"></span>System Status</span>
            <strong>All Online ✓</strong>
          </div>
          <div class="chip ch2">
            <span><span class="ci" style="background:var(--gold)"></span>PageSpeed Score</span>
            <strong>98 / 100</strong>
          </div>
          <div class="hero-visual-inner">
            <div class="photo-card">
              <div class="photo-frame">
                <img src="{{ asset('profile.png') }}" alt="Nour Kabtoul" style="width:100%;display:block">
                <div class="photo-status">
                  <span class="status-dot"></span>Open to Work
                </div>
              </div>
            </div>
            <div class="mini-term">
              <div class="mt-bar">
                <span class="mt-d mt-r"></span>
                <span class="mt-d mt-y"></span>
                <span class="mt-d mt-g"></span>
                <span class="mt-title">~/nour-kabtoul</span>
              </div>
              <div class="mt-body">
                <div class="mt-ln"><span class="mt-p">❯</span><span class="mt-c"> php artisan serve</span></div>
                <div class="mt-ln"><span class="mt-ok">✓ Running on :8000</span></div>
                <div class="mt-ln" style="margin-top:6px"><span class="mt-p">❯</span><span class="mt-c"> artisan migrate</span></div>
                <div class="mt-ln"><span class="mt-ok">✓ 24 migrations done</span></div>
                <div class="mt-ln" style="margin-top:6px"><span class="mt-p">❯</span><span class="mt-c"> artisan optimize</span></div>
                <div class="mt-ln"><span class="mt-hi">  INFO  Caching...</span></div>
                <div class="mt-ln"><span class="mt-ok">✓ Optimized!</span></div>
                <div class="mt-ln" style="margin-top:6px"><span class="mt-p" style="color:var(--a3)">❯</span><span class="mt-cur"> █</span></div>
              </div>
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

{{-- ══════════ METRICS ══════════ --}}
<div class="strip">
  <div class="container">
    <div class="strip-grid">
      @php $strip=[['3+','Years Experience'],['10+','Projects Shipped'],['50K+','Lines of Code'],['100%','Dedication']]; @endphp
      @foreach($strip as $i=>$s)
      <div class="strip-item rv" style="transition-delay:{{$i*.07}}s">
        <div class="strip-num">{{ $s[0] }}</div>
        <div class="strip-lbl">{{ $s[1] }}</div>
      </div>
      @endforeach
    </div>
  </div>
</div>

{{-- ══════════ ABOUT ══════════ --}}
<section id="about" class="pad about-sec">
  <div class="container">
    <div class="row g5" style="align-items:flex-start">
      <div class="col-lg-5 rvl">
        <span class="lbl">// About me</span>
        <h2 class="h1" style="margin-bottom:24px">Engineer.<br>Architect.<br>Problem-Solver.</h2>
        <p style="color:#64748b;line-height:1.9;font-size:.96rem;margin-bottom:18px">
          I'm Nour Kabtoul — a Laravel backend engineer who believes great software
          starts long before the first line of code. I think in systems, not features.
        </p>
        <p style="color:#64748b;line-height:1.9;font-size:.96rem;margin-bottom:40px">
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
        $skills=[['Laravel & PHP',96],['RESTful API Design',93],['MySQL & Query Optimization',89],['Auth & Security',91],['SaaS Multi-Tenancy',84],['Redis & Caching',79]];
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
        <div class="focus-box" style="margin-top:40px">
          <span class="lbl" style="margin-bottom:16px">// Core focus areas</span>
          <div class="focus-grid">
            @php $focuses=['Clean Laravel Architecture','RESTful & GraphQL APIs','Database Design & Optimization','Secure Auth Systems','Multi-Tenant SaaS','Performance Tuning & Caching','Service Layer Patterns','Production Deployment']; @endphp
            @foreach($focuses as $f)
            <div class="focus-item">{{ $f }}</div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════ STACK ══════════ --}}
<section id="stack" class="pad stack-sec">
  <div class="container">
    <div class="rv" style="text-align:center;margin-bottom:48px">
      <span class="lbl" style="display:block">// Core Stack</span>
      <h2 class="h1">Technologies I master</h2>
    </div>
    @php
    $stacks=[
      ['type'=>'fa',  'icon'=>'fab fa-laravel',    'name'=>'Laravel',    'color'=>'#ff2d20'],
      ['type'=>'fa',  'icon'=>'fab fa-php',         'name'=>'PHP 8.x',    'color'=>'#8892bf'],
      ['type'=>'fa',  'icon'=>'fab fa-react',       'name'=>'React',      'color'=>'#61dafb'],
      ['type'=>'svg', 'icon'=>'mysql',              'name'=>'MySQL',       'color'=>'#f29111'],
      ['type'=>'svg', 'icon'=>'postgres',           'name'=>'PostgreSQL',  'color'=>'#336791'],
      ['type'=>'svg', 'icon'=>'restapi',            'name'=>'REST API',    'color'=>'#06b6d4'],
      ['type'=>'fa',  'icon'=>'fab fa-bootstrap',   'name'=>'Bootstrap',  'color'=>'#7952b3'],
      ['type'=>'svg', 'icon'=>'livewire',           'name'=>'Livewire',   'color'=>'#fb70a9'],
      ['type'=>'fa',  'icon'=>'fab fa-git-alt',     'name'=>'Git',        'color'=>'#f05032'],
      ['type'=>'svg', 'icon'=>'redis',              'name'=>'Redis',      'color'=>'#dc382d'],
      ['type'=>'svg', 'icon'=>'docker',             'name'=>'Docker',     'color'=>'#2496ed'],
      ['type'=>'svg', 'icon'=>'aws',                'name'=>'AWS S3',     'color'=>'#ff9900'],
    ];
    @endphp
    <div class="stack-grid">
      @foreach($stacks as $i=>$s)
      <div class="sk rv" style="transition-delay:{{$i*.05}}s">
        @if($s['type'] === 'fa')
          <i class="{{ $s['icon'] }}" style="font-size:2rem;color:{{ $s['color'] }}"></i>
        @else
          <div class="sk-svg-icon" style="color:{{ $s['color'] }}">
            @if($s['icon'] === 'mysql')
              <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M16.405 5.501c-.115 0-.193.014-.274.033v.013h.014c.054.104.146.18.214.273.054.107.1.214.154.32l.014-.015c.094-.066.14-.172.14-.333-.04-.047-.046-.094-.08-.14-.04-.067-.126-.1-.18-.153zM5.77 18.695h-.927a50.854 50.854 0 00-.27-4.41h-.008l-1.41 4.41H2.45l-1.4-4.41h-.01a72.892 72.892 0 00-.195 4.41H0c.055-1.966.192-3.81.41-5.53h1.15l1.335 4.064h.008l1.347-4.064h1.095c.242 2.015.384 3.86.428 5.53zm4.017-4.08c-.378 2.045-.876 3.533-1.492 4.46-.482.716-1.01 1.073-1.583 1.073-.153 0-.34-.046-.566-.138v-.494c.11.017.24.026.386.026.268 0 .483-.075.647-.222.197-.18.295-.382.295-.605 0-.155-.077-.47-.23-.944L6.23 14.615h.91l.727 2.36c.164.536.233.91.205 1.123.4-1.064.678-2.227.835-3.483zm12.325 4.08h-2.63v-5.53h.885v4.85h1.745zm-3.32.135l-1.016-.5c.09-.076.177-.158.255-.25.433-.506.648-1.258.648-2.253 0-1.83-.718-2.746-2.155-2.746-.704 0-1.254.232-1.65.697-.43.508-.646 1.256-.646 2.245 0 .972.19 1.686.574 2.14.38.45.914.675 1.598.675.24 0 .464-.03.673-.09l1.283.648zm-1.738-.926c-.107.024-.215.036-.323.036-.44 0-.772-.166-1.997-.5v-.013c-.253-.256-.38-.77-.38-1.548 0-1.576.55-2.365 1.648-2.365.492 0 .857.162 1.095.487.24.326.36.822.36 1.49 0 .897-.135 1.5-.403 1.813z"/></svg>
            @elseif($s['icon'] === 'postgres')
              <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M17.128 0a10.134 10.134 0 00-2.755.403l-.063.02A10.922 10.922 0 0012.6.258C11.422.258 10.307.518 9.309 1.006A6.358 6.358 0 007.951.736c-2.585 0-4.501 1.24-5.477 2.39A7.128 7.128 0 001.2 5.15 9.76 9.76 0 000 9.165c0 1.585.234 3.04.947 4.21.25.413.567.793.936 1.122a6.57 6.57 0 01-.008.18c0 1.393.51 2.386 1.476 2.988.607.383 1.338.563 2.137.563 1.36 0 2.895-.47 4.328-1.428a8.9 8.9 0 001.84.326c.143.013.291.018.44.018.7 0 1.315-.105 1.814-.374a3.648 3.648 0 001.01-.87c1.573-.017 3.12-.374 4.36-1.028 1.65-.866 2.643-2.218 2.643-4.064a3.827 3.827 0 00-.082-.772c-.004-.02-.008-.036-.013-.054a4.87 4.87 0 00.21-.664c.074-.296.127-.62.16-.98.064-.696.046-1.51-.168-2.39a.12.12 0 00-.005-.02 7.413 7.413 0 00-1.56-3.083C19.696.86 18.509 0 17.128 0z"/></svg>
            @elseif($s['icon'] === 'restapi')
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="32" height="32"><path d="M8 9l3 3-3 3m5 0h3M4 6a2 2 0 00-2 2v8a2 2 0 002 2h16a2 2 0 002-2V8a2 2 0 00-2-2H4z"/></svg>
            @elseif($s['icon'] === 'livewire')
              <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>
            @elseif($s['icon'] === 'redis')
              <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M10.5 2.5l-8 4.3v5l8 4.3 8-4.3v-5l-8-4.3zm0 1.7l5.8 3.1-5.8 3.1L4.7 7.3l5.8-3.1zM3.5 8.4l6 3.2v6.3l-6-3.2V8.4zm14 0v6.3l-6 3.2v-6.3l6-3.2z"/></svg>
            @elseif($s['icon'] === 'docker')
              <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M13.983 11.078h2.119a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.119a.185.185 0 00-.185.185v1.888c0 .102.083.185.185.185m-2.954-5.43h2.118a.186.186 0 00.186-.186V3.574a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.185m0 2.716h2.118a.187.187 0 00.186-.186V6.29a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.887c0 .102.082.185.185.186m-2.93 0h2.12a.186.186 0 00.184-.186V6.29a.185.185 0 00-.185-.185H8.1a.185.185 0 00-.185.185v1.887c0 .102.083.185.185.186m-2.964 0h2.119a.186.186 0 00.185-.186V6.29a.185.185 0 00-.185-.185H5.136a.186.186 0 00-.186.185v1.887c0 .102.084.185.186.186m5.893 2.715h2.118a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.185m-2.93 0h2.12a.185.185 0 00.184-.185V9.006a.185.185 0 00-.184-.186h-2.12a.185.185 0 00-.184.185v1.888c0 .102.083.185.185.185m-2.964 0h2.119a.185.185 0 00.185-.185V9.006a.185.185 0 00-.184-.186h-2.12a.186.186 0 00-.186.186v1.887c0 .102.084.185.186.185m-2.92 0h2.12a.186.186 0 00.184-.185V9.006a.185.185 0 00-.184-.186h-2.12a.185.185 0 00-.185.185v1.888c0 .102.083.185.185.185M23.763 9.89c-.065-.051-.672-.51-1.954-.51-.338.001-.676.03-1.01.087-.248-1.7-1.653-2.53-1.716-2.566l-.344-.199-.226.327c-.284.438-.49.922-.612 1.43-.23.97-.09 1.882.403 2.661-.595.332-1.55.413-1.744.42H.751a.751.751 0 00-.75.748 11.376 11.376 0 00.692 4.062c.545 1.428 1.355 2.48 2.41 3.124 1.18.723 3.1 1.137 5.275 1.137.983.003 1.963-.086 2.93-.266a12.248 12.248 0 003.823-1.389c.98-.567 1.86-1.288 2.61-2.136 1.252-1.418 1.998-2.997 2.553-4.4h.221c1.372 0 2.215-.549 2.68-1.009.309-.293.55-.65.707-1.046l.098-.288Z"/></svg>
            @elseif($s['icon'] === 'aws')
              <svg viewBox="0 0 24 24" fill="currentColor" width="32" height="32"><path d="M6.763 10.036c0 .296.032.535.088.71.064.176.144.368.256.576.04.063.056.127.056.183 0 .08-.048.16-.152.24l-.503.335a.383.383 0 01-.208.072c-.08 0-.16-.04-.239-.112a2.47 2.47 0 01-.287-.375 6.18 6.18 0 01-.248-.471c-.622.734-1.405 1.101-2.347 1.101-.67 0-1.205-.191-1.596-.574-.391-.384-.59-.894-.59-1.533 0-.678.239-1.23.726-1.644.487-.415 1.133-.623 1.955-.623.272 0 .551.024.846.064.296.04.6.104.918.176v-.583c0-.607-.127-1.030-.375-1.277-.255-.248-.686-.368-1.3-.368-.28 0-.568.031-.863.103-.295.072-.583.16-.862.272a2.287 2.287 0 01-.28.104.488.488 0 01-.127.023c-.112 0-.168-.08-.168-.247v-.391c0-.128.016-.224.056-.28a.597.597 0 01.224-.167c.279-.144.614-.264 1.005-.36a4.84 4.84 0 011.246-.151c.95 0 1.644.216 2.091.647.439.43.662 1.085.662 1.963v2.586zm-3.24 1.214c.263 0 .534-.048.822-.144.287-.096.543-.271.758-.51.128-.152.224-.32.272-.512.047-.191.08-.423.08-.694v-.335a6.66 6.66 0 00-.735-.136 6.02 6.02 0 00-.75-.048c-.535 0-.926.104-1.19.32-.263.215-.39.518-.39.917 0 .375.095.655.295.846.191.2.47.296.838.296zm6.41.862c-.144 0-.24-.024-.304-.08-.063-.048-.12-.16-.168-.311L7.586 5.55a1.398 1.398 0 01-.072-.32c0-.128.064-.2.191-.2h.783c.151 0 .255.025.31.08.065.048.113.16.16.312l1.342 5.284 1.245-5.284c.04-.16.088-.264.151-.312a.549.549 0 01.32-.08h.638c.152 0 .256.025.32.08.063.048.12.16.151.312l1.261 5.348 1.381-5.348c.048-.16.104-.264.16-.312a.52.52 0 01.311-.08h.743c.127 0 .2.065.2.2 0 .04-.009.08-.017.128a1.137 1.137 0 01-.056.2l-1.923 6.17c-.048.16-.104.263-.168.311a.521.521 0 01-.303.08h-.687c-.151 0-.255-.024-.32-.08-.063-.056-.119-.16-.15-.32l-1.238-5.148-1.23 5.14c-.04.16-.087.264-.15.32-.065.056-.177.08-.32.08zm10.256.215c-.415 0-.83-.048-1.229-.143-.399-.096-.71-.2-.918-.32-.128-.071-.215-.151-.247-.223a.563.563 0 01-.048-.224v-.407c0-.167.064-.247.183-.247.048 0 .096.008.144.024.048.016.12.048.2.08.271.12.566.215.878.279.319.064.63.096.95.096.502 0 .894-.088 1.165-.264a.86.86 0 00.407-.758.777.777 0 00-.215-.559c-.144-.151-.416-.287-.807-.415l-1.157-.36c-.583-.183-1.014-.454-1.277-.813a1.902 1.902 0 01-.4-1.158c0-.335.073-.63.216-.886.144-.255.335-.479.575-.654.24-.184.51-.32.83-.415.32-.096.655-.136 1.006-.136.175 0 .359.008.535.032.183.024.35.056.518.088.16.04.312.08.455.127.144.048.256.096.336.144a.69.69 0 01.24.2.43.43 0 01.071.263v.375c0 .168-.064.256-.184.256a.83.83 0 01-.303-.096 3.652 3.652 0 00-1.532-.311c-.455 0-.815.071-1.062.224-.248.152-.375.383-.375.71 0 .224.08.416.24.567.159.152.454.304.877.44l1.134.358c.574.184.99.44 1.237.767.247.327.367.702.367 1.117 0 .343-.072.655-.207.926-.144.272-.336.511-.583.703-.248.2-.543.343-.886.447-.36.111-.743.167-1.166.167z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M20.995 12.67a14.973 14.973 0 01-4.535 2.01c-.022.007-.041.004-.056-.011a.051.051 0 01-.011-.052c.091-.318.181-.684.248-1.04a.052.052 0 01.036-.04c1.619-.494 3.071-1.239 4.32-2.218.022-.017.05-.013.068.007.017.02.015.05-.003.067a15.27 15.27 0 01-.067.277zm1.052-1.437c-.05 0-.1-.022-.132-.065-.482-.63-.964-1.134-1.447-1.494-.037-.027-.048-.074-.027-.115l.182-.351c.021-.04.064-.057.107-.042 1.132.432 1.96 1.2 2.478 2.284.018.036.009.08-.024.105a.143.143 0 01-.084.03l-.053-.003-.002-.001-.002-.001h-.002l-.002.001-.001.001-.003.001h-.003l-.002.001a.153.153 0 01-.003 0h-.002l-.002-.001-.003-.001c-.02-.007-.04-.02-.054-.036a.135.135 0 01-.009-.01l-.002-.003a.139.139 0 01-.024-.035c-.001-.002-.001-.004-.002-.006a.15.15 0 01-.007-.02l-.001-.004a.183.183 0 010-.006l.002-.015a.11.11 0 01.005-.018l.001-.004a.22.22 0 01.008-.018c.016-.037.042-.07.071-.09l.007-.004.006-.004.006-.003.002-.002.002-.001.001-.001h.003l.002-.001h.002l.002-.001h.003l.001-.001z"/></svg>
            @endif
          </div>
        @endif
        <span>{{ $s['name'] }}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════ PROJECTS ══════════ --}}
<section id="projects" class="pad proj-sec">
  <div class="container">
    <div class="rv" style="text-align:center;max-width:560px;margin:0 auto 60px">
      <span class="lbl" style="display:block">// Featured Work</span>
      <h2 class="h1">Systems built to<br><em style="color:var(--a1);font-style:normal">scale and ship.</em></h2>
      <p style="color:var(--muted);margin-top:14px;font-size:.92rem;line-height:1.75">
        Not side projects — real backend systems deployed in production environments.
      </p>
    </div>

    {{-- PROJECT 1 --}}
    <div class="row g5 proj-row" style="align-items:center">
      <div class="col-lg-7 rvl">
        <div class="proj-wrap">
          <div class="proj-bar"><div class="pb-dots"><span class="pb-d pb-r"></span><span class="pb-d pb-y"></span><span class="pb-d pb-g"></span></div><div class="pb-url">github.com/NourKabtoul/shopnest</div></div>
          <div style="overflow:hidden;position:relative">
            <img src="{{ asset('projects/shopnest.png') }}" class="proj-img" alt="ShopNest"
                 onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=900&q=85&fit=crop'">
          </div>
          <div class="proj-ov"></div>
          <div class="proj-ov2" style="background:linear-gradient(135deg,rgba(59,130,246,.08),transparent 55%)"></div>
          <div class="proj-live-badge"><span class="proj-live-dot"></span>Live Project</div>
        </div>
      </div>
      <div class="col-lg-5 rvr" style="transition-delay:.12s">
        <p class="proj-label">PROJECT 01 / 03</p>
        <h3 class="proj-h">ShopNest<br><span style="color:var(--a1)">E-Commerce Platform</span></h3>
        <p class="proj-desc">Full-stack marketplace with multi-vendor support, real-time inventory, Stripe payments, and a high-throughput admin dashboard.</p>
        <ul class="feat">
          <li>Multi-vendor dashboard with revenue analytics</li>
          <li>Stripe + PayPal dual payment gateway</li>
          <li>Redis catalog caching — 4× query speed</li>
          <li>RBAC: Admin / Vendor / Customer with Spatie</li>
        </ul>
        <div style="margin:18px 0"><span class="ptag">Laravel 11</span><span class="ptag">MySQL</span><span class="ptag">Redis</span><span class="ptag">Livewire</span><span class="ptag">Stripe</span></div>
        <div style="display:flex;gap:12px;flex-wrap:wrap">
          <a href="https://github.com/NourKabtoul" target="_blank" class="btn btn-blue btn-sm"><i class="fab fa-github"></i> GitHub</a>
          <a href="#" class="btn btn-ghost btn-sm"><i class="fas fa-external-link-alt"></i> Live Demo</a>
        </div>
      </div>
    </div>

    <div class="proj-sep"><span class="proj-sep-t">next project</span></div>

    {{-- PROJECT 2 --}}
    <div class="row g5 row-rev proj-row" style="align-items:center">
      <div class="col-lg-7 rvr">
        <div class="proj-wrap">
          <div class="proj-bar"><div class="pb-dots"><span class="pb-d pb-r"></span><span class="pb-d pb-y"></span><span class="pb-d pb-g"></span></div><div class="pb-url">github.com/NourKabtoul/saasflow</div></div>
          <div style="overflow:hidden;position:relative">
            <img src="{{ asset('projects/saasflow.png') }}" class="proj-img" alt="SaasFlow"
                 onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=900&q=85&fit=crop'">
          </div>
          <div class="proj-ov"></div>
          <div class="proj-ov2" style="background:linear-gradient(135deg,rgba(139,92,246,.1),transparent 55%)"></div>
          <div class="proj-live-badge" style="border-color:rgba(139,92,246,.4);color:#c4b5fd"><span class="proj-live-dot" style="background:var(--a2)"></span>Live Project</div>
        </div>
      </div>
      <div class="col-lg-5 rvl" style="transition-delay:.12s">
        <p class="proj-label">PROJECT 02 / 03</p>
        <h3 class="proj-h">SaasFlow<br><span style="color:var(--a2)">Multi-Tenant Platform</span></h3>
        <p class="proj-desc">Enterprise SaaS with strict tenant isolation via dedicated databases, subscription lifecycle, and zero-friction onboarding.</p>
        <ul class="feat">
          <li>Full tenant isolation — dedicated DB per client</li>
          <li>Stripe Billing: plans, trials &amp; webhook events</li>
          <li>REST API + OAuth2 + configurable rate limiting</li>
          <li>Automated tenant provisioning in &lt;3 seconds</li>
        </ul>
        <div style="margin:18px 0"><span class="ptag">Laravel 11</span><span class="ptag">REST API</span><span class="ptag">Livewire</span><span class="ptag">Stripe Billing</span><span class="ptag">OAuth2</span></div>
        <div style="display:flex;gap:12px;flex-wrap:wrap">
          <a href="https://github.com/NourKabtoul" target="_blank" class="btn btn-blue btn-sm"><i class="fab fa-github"></i> GitHub</a>
          <a href="#" class="btn btn-ghost btn-sm"><i class="fas fa-external-link-alt"></i> Live Demo</a>
        </div>
      </div>
    </div>

    <div class="proj-sep"><span class="proj-sep-t">next project</span></div>

    {{-- PROJECT 3 --}}
    <div class="row g5 proj-row" style="align-items:center">
      <div class="col-lg-7 rvl">
        <div class="proj-wrap">
          <div class="proj-bar"><div class="pb-dots"><span class="pb-d pb-r"></span><span class="pb-d pb-y"></span><span class="pb-d pb-g"></span></div><div class="pb-url">github.com/NourKabtoul/nexus-cms</div></div>
          <div style="overflow:hidden;position:relative">
            <img src="{{ asset('projects/nexus-cms.png') }}" class="proj-img" alt="Nexus CMS"
                 onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=900&q=85&fit=crop'">
          </div>
          <div class="proj-ov"></div>
          <div class="proj-ov2" style="background:linear-gradient(135deg,rgba(6,182,212,.09),transparent 55%)"></div>
          <div class="proj-live-badge" style="border-color:rgba(6,182,212,.4);color:#67e8f9"><span class="proj-live-dot" style="background:var(--a3)"></span>Live Project</div>
        </div>
      </div>
      <div class="col-lg-5 rvr" style="transition-delay:.12s">
        <p class="proj-label">PROJECT 03 / 03</p>
        <h3 class="proj-h">Nexus CMS<br><span style="color:var(--a3)">Headless Content Engine</span></h3>
        <p class="proj-desc">Developer-first headless CMS powering 6 production sites. Clean JSON API, S3 media library, schema-driven field builder.</p>
        <ul class="feat">
          <li>Headless API with OpenAPI 3.0 documentation</li>
          <li>Drag-and-drop media library with AWS S3</li>
          <li>Custom field builder — schema-driven, not code-locked</li>
          <li>Multi-language + auto URL slugging</li>
        </ul>
        <div style="margin:18px 0"><span class="ptag">Laravel 11</span><span class="ptag">Blade</span><span class="ptag">MySQL</span><span class="ptag">Alpine.js</span><span class="ptag">AWS S3</span></div>
        <div style="display:flex;gap:12px;flex-wrap:wrap">
          <a href="https://github.com/NourKabtoul" target="_blank" class="btn btn-blue btn-sm"><i class="fab fa-github"></i> GitHub</a>
          <a href="#" class="btn btn-ghost btn-sm"><i class="fas fa-external-link-alt"></i> Live Demo</a>
        </div>
      </div>
    </div>

  </div>
</section>

<div class="divider"></div>

{{-- ══════════ VALUE ══════════ --}}
<section class="pad">
  <div class="container">
    <div class="rv" style="text-align:center;margin-bottom:48px">
      <span class="lbl" style="display:block">// Why work with me</span>
      <h2 class="h1">What I bring to every project.</h2>
    </div>
    @php
    $vals=[
      ['fas fa-layer-group','Scalable by Design','I architect systems from day one to handle 10× your current load. Clean service layers, repository patterns, zero shortcuts that haunt you later.'],
      ['fas fa-rocket','Performance Obsessed','Query profiling, N+1 elimination, Redis caching — I measure before and after. Fast in dev means fast in production.'],
      ['fas fa-shield-alt','Security by Default','CSRF protection, input sanitization, rate limiting — security is baked into every layer I build, not bolted on at the end.'],
      ['fas fa-code-branch','Code Built to Handoff','SOLID principles, clean naming, PSR standards. The next engineer who reads my code will feel relief, not dread.'],
    ];
    @endphp
    <div class="row g4">
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

{{-- ══════════ TESTIMONIALS ══════════ --}}
<section class="pad testi-sec">
  <div class="container">
    <div class="rv" style="text-align:center;margin-bottom:48px">
      <span class="lbl" style="display:block">// Testimonials</span>
      <h2 class="h1">What clients say.</h2>
    </div>
    @php
    $testis=[
      ['text'=>'Nour delivered a complex multi-tenant SaaS backend in record time. The code quality was exceptional — clean, well-documented, and built to scale.','name'=>'Khalid Al-Rashidi','role'=>'Founder @ TechLaunch','init'=>'K'],
      ['text'=>'Best Laravel developer I\'ve worked with. He rebuilt our legacy system from scratch with a clean architecture that the team actually enjoys maintaining. Zero bugs at launch.','name'=>'Sarah Mitchell','role'=>'CTO @ Growable','init'=>'S'],
      ['text'=>'Nour\'s attention to performance was remarkable. Our API response times dropped by 65% after his work. He treats performance as a feature, not an afterthought.','name'=>'Omar Benali','role'=>'Lead Dev @ DataFlow','init'=>'O'],
    ];
    @endphp
    <div class="row g4">
      @foreach($testis as $i=>$t)
      <div class="col-md-4 rv" style="transition-delay:{{$i*.08}}s">
        <div class="testi-card">
          <div class="testi-stars">★★★★★</div>
          <div class="testi-quote">"</div>
          <p class="testi-text">{{ $t['text'] }}</p>
          <div class="testi-author">
            <div class="testi-av">{{ $t['init'] }}</div>
            <div><div class="testi-name">{{ $t['name'] }}</div><div class="testi-role">{{ $t['role'] }}</div></div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════ TIMELINE ══════════ --}}
<section class="pad-sm tl-sec">
  <div class="container">
    <div class="row g5" style="align-items:flex-start">
      <div class="col-lg-4 rvl" style="margin-bottom:40px">
        <span class="lbl">// Journey</span>
        <h2 class="h1" style="font-size:2.2rem">The road<br>so far.</h2>
        <p style="color:var(--muted);margin-top:16px;font-size:.88rem;line-height:1.75">Every milestone built on the last.</p>
      </div>
      <div class="col-lg-8">
        @php
        $tl=[
          ['2022','Discovered Laravel','Dove into PHP fundamentals, discovered Laravel, and fell in love with clean architecture and MVC patterns.'],
          ['2023','First Production Deployments','Shipped 3 real client projects: e-commerce, appointment booking, and an internal HR system.'],
          ['Early 2024','Advanced Backend Patterns','Mastered SaaS architecture, multi-tenancy, OAuth2, Redis caching, and queue-based processing.'],
          ['Late 2024','APIs & Open Source','Deep-dived into headless API design, published reusable packages, and contributed to the community.'],
          ['Now →','Open to Challenges','Seeking backend roles and freelance contracts where I can architect systems that make real impact.'],
        ];
        @endphp
        @foreach($tl as $i=>$t)
        <div class="tl-row rv" style="transition-delay:{{$i*.09}}s">
          <div class="tl-yr">{{ $t[0] }}</div>
          <div class="tl-dot"></div>
          <div class="tl-body"><h6>{{ $t[1] }}</h6><p>{{ $t[2] }}</p></div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════ BLOG ══════════ --}}
<section id="blog" class="pad blog-sec">
  <div class="container">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:48px;flex-wrap:wrap;gap:16px" class="rv">
      <div><span class="lbl">// Articles</span><h2 class="h1">Latest from<br>the blog.</h2></div>
      <a href="#" class="btn btn-ghost btn-sm">View All Articles</a>
    </div>
    @php
    $posts=[
      ['cat'=>'Architecture','title'=>'Building Multi-Tenant SaaS with Laravel: The Right Way','desc'=>'A deep dive into tenant isolation strategies — database-per-tenant vs shared schema — and how to choose the right approach.','date'=>'Feb 12, 2025','img'=>'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&q=80&fit=crop'],
      ['cat'=>'Performance','title'=>'Eliminating N+1 Queries: A Practical Laravel Guide','desc'=>'How I reduced API response times by 65% using eager loading, query scopes, and the Laravel Debugbar in production.','date'=>'Jan 28, 2025','img'=>'https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=600&q=80&fit=crop'],
      ['cat'=>'Security','title'=>'Laravel API Security Checklist for 2025','desc'=>'Auth patterns, rate limiting, input validation, CORS, and the most common attack vectors you need to block before launch.','date'=>'Jan 10, 2025','img'=>'https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=600&q=80&fit=crop'],
    ];
    @endphp
    <div class="blog-grid">
      @foreach($posts as $i=>$p)
      <div class="blog-card rv" style="transition-delay:{{$i*.08}}s">
        <div class="blog-img-w"><img src="{{ $p['img'] }}" alt="{{ $p['title'] }}" class="blog-img"></div>
        <div class="blog-body">
          <div class="blog-cat">{{ $p['cat'] }}</div>
          <h4 class="blog-title">{{ $p['title'] }}</h4>
          <p class="blog-desc">{{ $p['desc'] }}</p>
        </div>
        <div class="blog-foot">
          <span class="blog-date">{{ $p['date'] }}</span>
          <a href="#" class="blog-read">Read →</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="divider"></div>

{{-- ══════════ CONTACT ══════════ --}}
<section id="contact" class="pad contact-sec">
  <div class="contact-glow"></div>
  <div class="container" style="position:relative;z-index:2;text-align:center">
    <div class="rv">
      <span class="lbl" style="display:block">// Let's connect</span>
      <div class="contact-mega" style="margin-bottom:16px">Let's Build<br>Something.</div>
      <p style="max-width:460px;margin:0 auto 44px;color:var(--muted);line-height:1.9;font-size:.96rem">
        Available for freelance projects, long-term collaborations, and
        full-time backend engineering roles. Let's talk.
      </p>
      <div class="contact-btns">
        <a href="mailto:nns090242@gmail.com" class="c-link c-blue">
          <i class="fas fa-envelope"></i> Send Email
        </a>
        <a href="https://wa.me/963941442334" target="_blank" class="c-link c-whatsapp">
          <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
        <a href="https://instagram.com/nour.ka11" target="_blank" class="c-link c-instagram">
          <i class="fab fa-instagram"></i> Instagram
        </a>
        <a href="https://github.com/NourKabtoul" target="_blank" class="c-link c-ghost">
          <i class="fab fa-github"></i> GitHub
        </a>
        <a href="https://linkedin.com/in/nour-kabtoul-b0718b229" target="_blank" class="c-link c-ghost">
          <i class="fab fa-linkedin"></i> LinkedIn
        </a>
        <a href="{{ asset('cv.pdf') }}" download="Nour_Kabtoul_CV.pdf" class="c-link c-ghost">
          <i class="fas fa-file-arrow-down"></i> Download CV
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ══════════ FOOTER ══════════ --}}
<footer class="foot">
  <div class="container">
    <div class="foot-inner">
      <span>© {{ date('Y') }} Nour Kabtoul</span>
      <span>nk<span style="color:var(--a1)">.</span>dev</span>
      <div class="foot-social">
        <a href="https://wa.me/963941442334" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="https://instagram.com/nour.ka11" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://github.com/NourKabtoul" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="https://linkedin.com/in/nour-kabtoul-b0718b229" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
  </div>
</footer>

<script src="{{ asset('js/portfolio.js') }}"></script>

@endsection
