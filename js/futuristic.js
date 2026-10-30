/**
 * JAVASCRIPT FUTURISTE — PORTFOLIO CHRYS SANNE-TIA
 * Effets : Particules Canvas, Terminal Interactif, Filtres, Audio Synth, HUD Live
 * Inspiré par l'efficience et le pragmatisme PHP de Rasmus Lerdorf
 */

// ── 1. GESTION DU SON SCI-FI SYNTHÉTISÉ (Web Audio API, zéro fichier externe) ──
class CyberAudio {
  constructor() {
    this.ctx = null;
    this.enabled = localStorage.getItem('cyber_audio') === 'true';
    this.updateToggleUI();
  }

  init() {
    if (!this.ctx && (window.AudioContext || window.webkitAudioContext)) {
      this.ctx = new (window.AudioContext || window.webkitAudioContext)();
    }
  }

  toggle() {
    this.enabled = !this.enabled;
    localStorage.setItem('cyber_audio', this.enabled);
    this.updateToggleUI();
    if (this.enabled) {
      this.playBeep(880, 'sine', 0.08, 0.1);
    }
  }

  updateToggleUI() {
    const btn = document.getElementById('sound-toggle-btn');
    if (btn) {
      btn.innerHTML = this.enabled ? '&#128266; SFX ON' : '&#128263; SFX OFF';
      btn.style.borderColor = this.enabled ? 'var(--cyan)' : 'var(--border-subtle)';
    }
  }

  playBeep(freq = 600, type = 'sine', duration = 0.06, vol = 0.05) {
    if (!this.enabled) return;
    try {
      this.init();
      if (!this.ctx) return;
      if (this.ctx.state === 'suspended') {
        this.ctx.resume();
      }
      const osc = this.ctx.createOscillator();
      const gain = this.ctx.createGain();
      osc.type = type;
      osc.frequency.setValueAtTime(freq, this.ctx.currentTime);
      gain.gain.setValueAtTime(vol, this.ctx.currentTime);
      gain.gain.exponentialRampToValueAtTime(0.0001, this.ctx.currentTime + duration);
      osc.connect(gain);
      gain.connect(this.ctx.destination);
      osc.start();
      osc.stop(this.ctx.currentTime + duration);
    } catch (e) {
      // Audio context might fail on restricted environments
    }
  }

  playClick() {
    this.playBeep(1200, 'triangle', 0.04, 0.04);
  }

  playGlitch() {
    if (!this.enabled) return;
    this.playBeep(320, 'sawtooth', 0.1, 0.05);
    setTimeout(() => this.playBeep(640, 'square', 0.08, 0.03), 50);
  }
}

const cyberAudio = new CyberAudio();

// ── 2. FOND DE PARTICULES CONSTELLATION / NEURAL (Canvas) ──────────────────────
(function initCanvas() {
  const canvas = document.getElementById('cyber-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  let width, height;
  let particles = [];
  const particleCount = 65;
  const maxDistance = 140;

  let mouse = { x: null, y: null, radius: 150 };

  function resize() {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  window.addEventListener('mousemove', (e) => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
  });

  window.addEventListener('mouseout', () => {
    mouse.x = null;
    mouse.y = null;
  });

  class Particle {
    constructor() {
      this.x = Math.random() * width;
      this.y = Math.random() * height;
      this.vx = (Math.random() - 0.5) * 0.8;
      this.vy = (Math.random() - 0.5) * 0.8;
      this.radius = Math.random() * 2 + 1;
      this.color = Math.random() > 0.4 ? 'rgba(0, 243, 255, ' : 'rgba(188, 19, 254, ';
      this.alpha = Math.random() * 0.6 + 0.2;
    }

    update() {
      this.x += this.vx;
      this.y += this.vy;

      if (this.x < 0 || this.x > width) this.vx *= -1;
      if (this.y < 0 || this.y > height) this.vy *= -1;

      // Interaction souris
      if (mouse.x !== null) {
        const dx = mouse.x - this.x;
        const dy = mouse.y - this.y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < mouse.radius) {
          const force = (mouse.radius - dist) / mouse.radius;
          this.x -= (dx / dist) * force * 3;
          this.y -= (dy / dist) * force * 3;
        }
      }
    }

    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
      ctx.fillStyle = this.color + this.alpha + ')';
      ctx.shadowBlur = 8;
      ctx.shadowColor = this.color.includes('243') ? '#00f3ff' : '#bc13fe';
      ctx.fill();
      ctx.shadowBlur = 0;
    }
  }

  for (let i = 0; i < particleCount; i++) {
    particles.push(new Particle());
  }

  function animate() {
    ctx.clearRect(0, 0, width, height);

    for (let i = 0; i < particles.length; i++) {
      particles[i].update();
      particles[i].draw();

      for (let j = i + 1; j < particles.length; j++) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const dist = Math.sqrt(dx * dx + dy * dy);

        if (dist < maxDistance) {
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          const opacity = (1 - dist / maxDistance) * 0.25;
          ctx.strokeStyle = `rgba(0, 243, 255, ${opacity})`;
          ctx.lineWidth = 1;
          ctx.stroke();
        }
      }
    }

    requestAnimationFrame(animate);
  }
  animate();
})();

// ── 3. HORLOGE TEMPS RÉEL DU HUD ──────────────────────────────────────────────
function updateHudClock() {
  const clockEl = document.getElementById('hud-clock');
  if (!clockEl) return;
  const now = new Date();
  const utcHours = String(now.getUTCHours()).padStart(2, '0');
  const utcMins = String(now.getUTCMinutes()).padStart(2, '0');
  const utcSecs = String(now.getUTCSeconds()).padStart(2, '0');
  clockEl.textContent = `UTC ${utcHours}:${utcMins}:${utcSecs}`;
}
setInterval(updateHudClock, 1000);
updateHudClock();

// ── 4. RECOMMANDATIONS CAROUSEL ────────────────────────────────────────────────
let currentSlide = 0;
const slides = document.querySelectorAll('.rec-slide');
const dots = document.querySelectorAll('.rec-dot');

function showSlide(index) {
  if (!slides.length) return;
  if (index >= slides.length) currentSlide = 0;
  else if (index < 0) currentSlide = slides.length - 1;
  else currentSlide = index;

  slides.forEach((s, i) => s.classList.toggle('active', i === currentSlide));
  dots.forEach((d, i) => d.classList.toggle('active', i === currentSlide));
}

function changeSlide(direction) {
  cyberAudio.playClick();
  showSlide(currentSlide + direction);
}

function goToSlide(index) {
  cyberAudio.playClick();
  showSlide(index);
}

// Auto défilement toutes les 8 secondes
let carouselTimer = setInterval(() => {
  if (slides.length > 1) {
    showSlide(currentSlide + 1);
  }
}, 8000);

// Pause auto-rotation on hover
const carouselTrack = document.querySelector('.rec-carousel');
if (carouselTrack) {
  carouselTrack.addEventListener('mouseenter', () => clearInterval(carouselTimer));
  carouselTrack.addEventListener('mouseleave', () => {
    carouselTimer = setInterval(() => showSlide(currentSlide + 1), 8000);
  });
}

// ── 5. FILTRE DE PROJETS ───────────────────────────────────────────────────────
function filterProjects(category) {
  cyberAudio.playClick();
  const buttons = document.querySelectorAll('.filter-btn');
  buttons.forEach(btn => btn.classList.toggle('active', btn.dataset.filter === category));

  const cards = document.querySelectorAll('.project-card');
  cards.forEach(card => {
    const tech = (card.dataset.tech || '').toLowerCase();
    if (category === 'all') {
      card.style.display = 'flex';
      setTimeout(() => card.style.opacity = '1', 50);
    } else if (tech.includes(category.toLowerCase())) {
      card.style.display = 'flex';
      setTimeout(() => card.style.opacity = '1', 50);
    } else {
      card.style.opacity = '0';
      setTimeout(() => card.style.display = 'none', 300);
    }
  });
}

// ── 6. NAVIGATION & RETOUR EN HAUT ─────────────────────────────────────────────
const backToTopBtn = document.getElementById('backToTopBtn');
const mainNav = document.getElementById('main-nav');
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
  const scrollY = window.scrollY;

  // Header background on scroll
  if (mainNav) {
    mainNav.classList.toggle('scrolled', scrollY > 60);
  }

  // Back to top visibility
  if (backToTopBtn) {
    backToTopBtn.classList.toggle('show', scrollY > 400);
  }

  // Active section spy
  let currentSection = '';
  sections.forEach(sec => {
    const top = sec.offsetTop - 140;
    const height = sec.offsetHeight;
    if (scrollY >= top && scrollY < top + height) {
      currentSection = '#' + sec.getAttribute('id');
    }
  });

  navLinks.forEach(link => {
    link.classList.toggle('active', link.getAttribute('href') === currentSection);
  });
});

if (backToTopBtn) {
  backToTopBtn.addEventListener('click', (e) => {
    e.preventDefault();
    cyberAudio.playClick();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// ── 7. TERMINAL INTERACTIF (CYBER CLI) ────────────────────────────────────────
const terminalModal = document.getElementById('terminal-modal');
const terminalOutput = document.getElementById('terminal-output');
const terminalInput = document.getElementById('terminal-input');

function openTerminal() {
  if (!terminalModal) return;
  cyberAudio.playGlitch();
  terminalModal.classList.add('open');
  if (terminalInput) {
    terminalInput.focus();
  }
}

function closeTerminal() {
  if (!terminalModal) return;
  cyberAudio.playClick();
  terminalModal.classList.remove('open');
}

// Raccourci clavier (Ctrl + K ou Tilde ~)
window.addEventListener('keydown', (e) => {
  if ((e.ctrlKey && e.key.toLowerCase() === 'k') || e.key === '`') {
    e.preventDefault();
    if (terminalModal.classList.contains('open')) {
      closeTerminal();
    } else {
      openTerminal();
    }
  }
  if (e.key === 'Escape' && terminalModal.classList.contains('open')) {
    closeTerminal();
  }
});

const terminalCommands = {
  help: () => `
<div style="color:var(--cyan);font-weight:bold;margin-bottom:6px;">COMMANDES DISPONIBLES :</div>
  <span style="color:var(--green)">about</span>        : Présentation de Chrys Sanne-Tia
  <span style="color:var(--green)">skills</span>       : Arsenal technique (PHP, Laravel, React, etc.)
  <span style="color:var(--green)">projects</span>     : Liste des réalisations web
  <span style="color:var(--green)">lerdorf</span>      : La philosophie PHP selon Rasmus Lerdorf
  <span style="color:var(--green)">cv</span>           : Télécharger le CV officiel PDF
  <span style="color:var(--green)">contact</span>      : Coordonnées & réseaux
  <span style="color:var(--green)">matrix</span>       : Mode hacker matrix phosphore
  <span style="color:var(--green)">clear</span>        : Effacer le terminal
  <span style="color:var(--green)">exit</span>         : Fermer le terminal
`,
  about: () => `
<div style="color:#fff;">
  <strong>Chrys Sanne-Tia</strong> — Développeur Web Full-Stack<br>
  Basé en Côte d'Ivoire.<br>
  Titulaire d'une Licence Professionnelle en Génie Logiciel et d'un BTS IDA.<br>
  Passionné par l'architecture logicielle, le PHP moderne, la robustesse et les performances serveur sans surcharge inutile.
</div>`,
  skills: () => `
<div style="color:#fff;">
  <strong style="color:var(--cyan)">FRONT-END :</strong> HTML5, CSS3, JavaScript, Bootstrap, React JS<br>
  <strong style="color:var(--purple)">BACK-END :</strong> PHP 8+, Laravel, MySQL, Architecture MVC, API REST<br>
  <strong style="color:var(--green)">OUTILS :</strong> Git, GitHub, WordPress, Drupal, Docker, Linux CLI
</div>`,
  projects: () => `
<div style="color:#fff;">
  1. <strong style="color:var(--cyan)">Hébergeur d'Images</strong> (PHP / MySQL / CSS)<br>
  2. <strong style="color:var(--cyan)">CV en Ligne Interactif</strong> (HTML5 / Bootstrap 4 / CSS3)<br>
  3. <strong style="color:var(--cyan)">Raccourcisseur d'URL Express</strong> (PHP / MySQL / CSS3)<br>
  4. <strong style="color:var(--cyan)">Gestion Salle de GYM</strong> (PHP / MySQL / Bootstrap)<br>
  5. <strong style="color:var(--cyan)">Espace Membre Façon Netflix</strong> (PHP / MySQL)<br>
  <em>Tapez ou cliquez pour accéder directement via le menu Projets.</em>
</div>`,
  lerdorf: () => `
<div style="color:var(--cyan); border-left: 2px solid var(--cyan); padding-left:10px;">
  <strong>PHILOSOPHIE RASMUS LERDORF (Créateur de PHP) :</strong><br>
  <em>"PHP a été conçu comme une boîte à outils pratique (Personal Home Page Tools) : résoudre les problèmes rapidement, simplement et sans complexité superflue."</em><br><br>
  ⚡ Performance brute sans compilation lourde<br>
  ⚡ Zéro dépendance artificielle (Pure Web Engine)<br>
  ⚡ Stabilité et résilience sur le long terme
</div>`,
  cv: () => {
    window.open('Docs/Cv New ST 2026 .pdf', '_blank');
    return `<span style="color:var(--green)">[OK] Téléchargement du CV lancé dans un nouvel onglet.</span>`;
  },
  contact: () => `
<div style="color:#fff;">
  📧 Email    : <a href="mailto:sannetia2003@example.com" style="color:var(--cyan)">sannetia2003@example.com</a><br>
  🐙 GitHub   : <a href="https://github.com/CHRYSOVR" target="_blank" style="color:var(--cyan)">github.com/CHRYSOVR</a><br>
  💼 LinkedIn : <a href="https://www.linkedin.com/in/aim%C3%A9-chrys-fabrice-s-b7249a1a9/" target="_blank" style="color:var(--cyan)">Aimé Chrys Fabrice Sanne-Tia</a><br>
  💬 WhatsApp : <a href="https://Wa.me/+22597965200/" target="_blank" style="color:var(--cyan)">+225 97965200</a>
</div>`,
  matrix: () => {
    document.body.classList.toggle('matrix-mode');
    return `<span style="color:var(--green)">[MATRIX ACTIVATED] Visual matrix flux toggle.</span>`;
  },
  clear: () => {
    if (terminalOutput) terminalOutput.innerHTML = '';
    return '';
  },
  exit: () => {
    closeTerminal();
    return 'Closing terminal...';
  }
};

if (terminalInput) {
  terminalInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      const rawCmd = terminalInput.value.trim();
      const cmd = rawCmd.toLowerCase();
      terminalInput.value = '';

      if (!rawCmd) return;
      cyberAudio.playClick();

      const userLine = document.createElement('div');
      userLine.innerHTML = `<span style="color:var(--green); font-weight:bold;">guest@chrys-terminal:~$</span> ${escapeHtml(rawCmd)}`;
      terminalOutput.appendChild(userLine);

      const responseEl = document.createElement('div');
      responseEl.style.marginBottom = '12px';

      if (terminalCommands[cmd]) {
        const result = terminalCommands[cmd]();
        if (result) responseEl.innerHTML = result;
      } else {
        responseEl.innerHTML = `<span style="color:var(--red);">Commande inconnue: '${escapeHtml(rawCmd)}'. Tapez '<span style="color:var(--cyan)">help</span>' pour la liste.</span>`;
      }

      terminalOutput.appendChild(responseEl);
      terminalOutput.scrollTop = terminalOutput.scrollHeight;
    }
  });
}

function escapeHtml(str) {
  return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
}

// Initialisation globale des effets sonores sur boutons interactifs
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('a, button, .skill-chip, .project-card').forEach(el => {
    el.addEventListener('mouseenter', () => cyberAudio.playBeep(980, 'sine', 0.02, 0.02));
  });
});

