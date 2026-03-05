/**
 * Nour Kabtoul — Portfolio Scripts v2.0
 * 01. Custom Cursor | 02. Navbar | 03. Mobile Menu
 * 04. Typed Text | 05. Particles | 06. Scroll Reveal | 07. Skill Bars
 */

/* ══ 01. CUSTOM CURSOR (desktop only) ══ */
const bd = document.body;
const cd = document.getElementById('cur-d');
const cr = document.getElementById('cur-r');
let mx = 0, my = 0, rx = 0, ry = 0;

if (window.innerWidth > 991) {
  document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
  (function rafCursor() {
    rx += (mx - rx) * 0.1; ry += (my - ry) * 0.1;
    if(cd){ cd.style.left = mx + 'px'; cd.style.top = my + 'px'; }
    if(cr){ cr.style.left = rx + 'px'; cr.style.top = ry + 'px'; }
    requestAnimationFrame(rafCursor);
  })();
  document.querySelectorAll('a, button').forEach(el => {
    el.addEventListener('mouseenter', () => bd.classList.add('cl'));
    el.addEventListener('mouseleave', () => bd.classList.remove('cl'));
  });
  document.querySelectorAll('.v-card, .testi-card, .blog-card, .sk, .photo-frame').forEach(el => {
    el.addEventListener('mouseenter', () => bd.classList.add('cb'));
    el.addEventListener('mouseleave', () => bd.classList.remove('cb'));
  });
}

/* ══ 02. NAVBAR SCROLL ══ */
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  navbar.classList.toggle('s', window.scrollY > 50);
});

/* ══ 03. MOBILE MENU ══ */
const burger = document.getElementById('nav-burger');
const mobileMenu = document.getElementById('nav-mobile');

burger.addEventListener('click', () => {
  burger.classList.toggle('open');
  mobileMenu.classList.toggle('open');
});

function closeMobile() {
  burger.classList.remove('open');
  mobileMenu.classList.remove('open');
}

// Close on outside click
document.addEventListener('click', e => {
  if (!navbar.contains(e.target)) closeMobile();
});

/* ══ 04. TYPED TEXT ══ */
const phrases = ['Backend Engineer','API Architect','SaaS Builder','Performance Freak','Laravel Expert','Full-Stack Dev'];
let pi = 0, ci = 0, del = false;
const tel = document.getElementById('typed-el');

function typeTick() {
  const p = phrases[pi];
  tel.textContent = del ? p.slice(0, --ci) : p.slice(0, ++ci);
  if (!del && ci === p.length) { setTimeout(() => del = true, 2200); setTimeout(typeTick, 80); return; }
  if (del && ci === 0) { del = false; pi = (pi + 1) % phrases.length; setTimeout(typeTick, 420); return; }
  setTimeout(typeTick, del ? 36 : 74);
}
setTimeout(typeTick, 1500);

/* ══ 05. PARTICLES CANVAS ══ */
const canvas = document.getElementById('cvs');
const ctx = canvas.getContext('2d');
let W, H, particles = [];

const resizeCanvas = () => { W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; };
resizeCanvas();
window.addEventListener('resize', () => { resizeCanvas(); initParticles(); });

function initParticles() {
  const count = window.innerWidth < 768 ? 40 : 80;
  particles = Array.from({ length: count }, () => ({
    x: Math.random() * W, y: Math.random() * H,
    vx: (Math.random() - 0.5) * 0.18, vy: (Math.random() - 0.5) * 0.18,
    r: Math.random() * 1.2 + 0.2, a: Math.random() * 0.35 + 0.06,
  }));
}
initParticles();

function drawParticles() {
  ctx.clearRect(0, 0, W, H);
  particles.forEach(p => {
    p.x = (p.x + p.vx + W) % W; p.y = (p.y + p.vy + H) % H;
    ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
    ctx.fillStyle = `rgba(148,163,184,${p.a})`; ctx.fill();
  });
  const maxDist = window.innerWidth < 768 ? 80 : 110;
  for (let i = 0; i < particles.length; i++) {
    for (let j = i + 1; j < particles.length; j++) {
      const dx = particles[i].x - particles[j].x, dy = particles[i].y - particles[j].y;
      const dist = Math.hypot(dx, dy);
      if (dist < maxDist) {
        ctx.beginPath(); ctx.moveTo(particles[i].x, particles[i].y); ctx.lineTo(particles[j].x, particles[j].y);
        ctx.strokeStyle = `rgba(59,130,246,${0.055 * (1 - dist / maxDist)})`; ctx.stroke();
      }
    }
  }
  requestAnimationFrame(drawParticles);
}
drawParticles();

/* ══ 06. SCROLL REVEAL ══ */
const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); revealObserver.unobserve(e.target); } });
}, { threshold: 0.08 });
document.querySelectorAll('.rv, .rvl, .rvr').forEach(el => revealObserver.observe(el));

/* ══ 07. SKILL BARS ══ */
const skillObserver = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('on'); skillObserver.unobserve(e.target); } });
}, { threshold: 0.2 });
document.querySelectorAll('.skill-row').forEach(el => skillObserver.observe(el));
