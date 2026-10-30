<?php
/**
 * PORTFOLIO CV — CHRYS SANNE-TIA
 * Architecture : PHP Pur selon les principes de Rasmus Lerdorf
 * Philosophie : Rapidité foudroyante, zéro fioriture superflue, robustesse, élégance futuriste
 */

$start_time = microtime(true);

// ── DONNÉES DU PORTFOLIO ───────────────────────────────────────────────────
$profile = [
    'name'      => 'Chrys Sanne-Tia',
    'full_name' => 'Aimé Chrys Fabrice Sanne-Tia',
    'title'     => 'Développeur Web Full-Stack',
    'spec'      => 'PHP / Laravel / React / MySQL',
    'photo'     => 'images/Tof.jpeg',
    'cv_file'   => 'Docs/Cv New ST 2026 .pdf',
    'email'     => 'sannetia2003@example.com',
    'github'    => 'https://github.com/CHRYSOVR',
    'linkedin'  => 'https://www.linkedin.com/in/aim%C3%A9-chrys-fabrice-s-b7249a1a9/',
    'whatsapp'  => 'https://Wa.me/+22597965200/',
    'facebook'  => 'https://www.facebook.com/chrysover30/',
    'bio'       => "Développeur passionné par la conception d'architectures web pérennes, réactives et performantes. Fidèle à la philosophie de Rasmus Lerdorf (créateur de PHP), je privilégie le pragmatisme, l'efficacité serveur et la résolution concrète des défis techniques.",
];

$lerdorf_principles = [
    [
        'num'   => '01',
        'title' => 'Efficience & Vitesse Serveur',
        'desc'  => 'Rendu en quelques millisecondes sans overhead de compilation. Le serveur délivre exactement ce que le client demande.',
    ],
    [
        'num'   => '02',
        'title' => 'Zéro Dépendance Superflue',
        'desc'  => 'Aucun gigaoctet de modules éphémères. Un socle PHP/HTML/CSS natif, robuste, prévisible et maintenable pour les 20 prochaines années.',
    ],
    [
        'num'   => '03',
        'title' => 'Pragmatisme Pur',
        'desc'  => '"Personal Home Page Tools" : Résoudre les problèmes d’abord. Le code sert l’utilisateur, non l’ego de la sur-ingénierie.',
    ],
    [
        'num'   => '04',
        'title' => 'Pérennité & Écologie Web',
        'desc'  => 'Empreinte mémoire infime, compatibilité universelle avec tous les hébergeurs et résilience éprouvée face au temps.',
    ],
];

$skills = [
    'Front-End' => [
        'icon'  => '&#60;/&#62;',
        'items' => [
            ['name' => 'HTML5',      'url' => 'https://developer.mozilla.org/fr/docs/Web/HTML'],
            ['name' => 'CSS3',       'url' => 'https://devdocs.io/css/'],
            ['name' => 'JavaScript', 'url' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript'],
            ['name' => 'Bootstrap',  'url' => 'https://getbootstrap.com/'],
            ['name' => 'React JS',   'url' => 'https://react.dev/'],
        ],
    ],
    'Back-End & BDD' => [
        'icon'  => '&#9881;',
        'items' => [
            ['name' => 'PHP 8+',           'url' => 'https://www.php.net/downloads.php'],
            ['name' => 'Laravel',          'url' => 'https://laravel.com/'],
            ['name' => 'MySQL',            'url' => 'https://www.mysql.com/fr/'],
            ['name' => 'Architecture MVC', 'url' => '#'],
            ['name' => 'API REST',         'url' => '#'],
        ],
    ],
    'Outils & CMS' => [
        'icon'  => '&#128736;',
        'items' => [
            ['name' => 'Git / GitHub', 'url' => 'https://github.com/signup'],
            ['name' => 'WordPress',    'url' => 'https://fr.wordpress.org/'],
            ['name' => 'Drupal',       'url' => 'https://new.drupal.org/home'],
            ['name' => 'Linux / Bash', 'url' => '#'],
        ],
    ],
];

$experiences = [
    [
        'company'  => 'TENET CORP',
        'role'     => 'Stage de Validation BTS — Développeur Web',
        'period'   => 'Janvier 2025 - Mars 2025',
        'tasks'    => [
            "Conception et développement complet d'un site web de gestion d'une salle de gym (inscriptions, abonnements, planning).",
            "Extension du logiciel interne de l'entreprise avec de nouveaux modules fonctionnels.",
            "Collaboration étroite avec l'équipe technique sur des livrables de production et optimisation des requêtes BDD.",
        ],
    ],
    [
        'company'  => 'Hackathon Google',
        'role'     => 'Développeur Web & Mobile',
        'period'   => '20 Juillet 2025',
        'tasks'    => [
            "Développement d'une plateforme moderne dédiée à la traduction et à la valorisation des langues locales.",
            "Optimisation des temps de réponse et intégration d'interfaces adaptatives pour smartphones et navigateurs lents.",
            "Déploiement rapide sous contrainte de temps et travail collaboratif en méthode agile.",
        ],
    ],
];

$education = [
    [
        'school'  => 'GECOS FORMATION',
        'diploma' => 'Licence Professionnelle en Génie Logiciel',
        'period'  => '2022 - 2025',
        'desc'    => 'Formation supérieure en ingénierie logicielle : algorithmique avancée, bases de données relationnelles, conception MVC et architectures client-serveur.',
    ],
    [
        'school'  => 'GECOS FORMATION',
        'diploma' => "Brevet de Technicien Supérieur (BTS IDA)",
        'period'  => '2022 - 2024',
        'desc'    => "Informatique et Développement d'Applications. Maîtrise des fondamentaux de la programmation web, de l'administration réseau et des systèmes de gestion.",
    ],
    [
        'school'  => 'Formation Autodidacte & Spécialisée (Udemy / Projets)',
        'diploma' => 'Perfectionnement Full-Stack (PHP, Laravel, React, MySQL)',
        'period'  => '2023 - Présent',
        'desc'    => 'Réalisation continue d’applications pratiques concrètes, sécurisation des formulaires, gestion des sessions, authentification et intégration API.',
    ],
    [
        'school'  => 'Collège Saint Chalmel Yopougon',
        'diploma' => 'Baccalauréat Série D (Scientifique)',
        'period'  => '2022',
        'desc'    => 'Obtention du baccalauréat scientifique avec une solide base en logique mathématique et raisonnement analytique.',
    ],
];

$projects = [
    [
        'title'    => "Hébergeur d'Images",
        'category' => 'php',
        'tech'     => 'PHP / MySQL / CSS3',
        'desc'     => "Application web sécurisée permettant de téléverser, indexer, prévisualiser et partager des fichiers images en ligne avec génération d'URLs uniques.",
        'url'      => 'https://github.com/CHRYSOVR/Hebergeur-Images',
    ],
    [
        'title'    => 'CV en Ligne Interactif',
        'category' => 'frontend',
        'tech'     => 'HTML5 / CSS3 / JavaScript',
        'desc'     => "Portfolio web responsive valorisant le parcours, les compétences et les projets avec navigation fluide et interactions dynamiques.",
        'url'      => 'https://github.com/CHRYSOVR/CV_en_ligne_Interactif',
    ],
    [
        'title'    => "Raccourcisseur d'URL Express",
        'category' => 'php',
        'tech'     => 'PHP / MySQL / Architecture MVC',
        'desc'     => "Système d'encodage et de redirection d'adresses web avec suivi des clics et protection anti-injection dans la plus pure tradition des outils utilitaires PHP.",
        'url'      => 'https://github.com/CHRYSOVR/Racourcisseur_D_URL_Express',
    ],
    [
        'title'    => 'Site de Gestion de Salle de GYM',
        'category' => 'fullstack',
        'tech'     => 'PHP / MySQL / Bootstrap 5 / JS',
        'desc'     => "Plateforme complète facilitant la gestion des adhérents, la souscription aux packs sportifs, les transactions financières et la planification des séances.",
        'url'      => 'https://github.com/CHRYSOVR/gestionSalleDeGym',
    ],
    [
        'title'    => 'Espace Membre Classique',
        'category' => 'php',
        'tech'     => 'PHP / MySQL / Sessions',
        'desc'     => "Module d'authentification robuste avec hachage sécurisé des mots de passe (bcrypt), gestion des cookies de session et formulaire de contact direct.",
        'url'      => 'https://github.com/CHRYSOVR/Espace_Membre_Classique',
    ],
    [
        'title'    => 'Espace Membre Façon Netflix',
        'category' => 'fullstack',
        'tech'     => 'PHP / MySQL / Interface Streaming',
        'desc'     => "Interface interactive inspirée de Netflix intégrant la gestion des profils multi-utilisateurs, catalogue multimédia et tableau de bord administrateur.",
        'url'      => 'https://github.com/CHRYSOVR/espace_Membre_Comme_Netflix',
    ],
];

$recommendations = [
    [
        'quote'  => "Chrys fait preuve d'une rigueur exemplaire et d'une formidable capacité d'apprentissage en développement web. Un atout majeur pour n'importe quelle équipe technique !",
        'author' => 'Directeur Technique — Projet Web',
    ],
    [
        'quote'  => "Son autonomie sur les technologies PHP et MySQL et sa maîtrise de l'intégration front-end en font un développeur complet, pragmatique et ultra-efficace.",
        'author' => 'Lead Developer',
    ],
];

// ── FONCTIONS D'ÉCHAPPEMENT ET D'AFFICHAGE ──────────────────────────────────
function e(string $str): string {
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio Futuriste de <?= e($profile['name']) ?> — Développeur Web Full-Stack PHP / Laravel / React. Inspiré de la philosophie de Rasmus Lerdorf.">
    <meta name="author" content="<?= e($profile['name']) ?>">
    <title><?= e($profile['name']) ?> | Portfolio Futuriste PHP</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Orbitron:wght@500;700;900&family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Futuriste Intégré -->
    <link rel="stylesheet" href="css/futuristic.css">
</head>
<body>

    <!-- Fond de particules constellation animé -->
    <canvas id="cyber-canvas"></canvas>
    <div class="scanlines"></div>

    <!-- HUD Ticker Supérieur (Indicateurs en temps réel Rasmus Lerdorf) -->
    <header id="hud-ticker">
        <div class="hud-left">
            <span class="hud-indicator">
                <span class="hud-pulse"></span> SYSTEM: ONLINE
            </span>
            <span class="hud-metric hud-hide-mobile">
                CORE: <strong>PHP <?= PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION ?></strong>
            </span>
            <span class="hud-metric hud-hide-mobile">
                MINDSET: <strong>RASMUS LERDORF CONCEPT</strong>
            </span>
        </div>
        <div class="hud-right">
            <span id="hud-clock" class="hud-metric">UTC --:--:--</span>
            <button id="sound-toggle-btn" class="hud-btn" onclick="cyberAudio.toggle()" title="Activer / Désactiver les sons futuristes">
                &#128263; SFX OFF
            </button>
            <button class="hud-btn" onclick="openTerminal()" title="Ouvrir le terminal interactif (Ctrl+K)">
                &#62;_ CLI [Ctrl+K]
            </button>
        </div>
    </header>

    <!-- Navigation Principale -->
    <nav id="main-nav">
        <div class="nav-container">
            <a href="#hero" class="nav-brand">
                <span class="brand-code">&lt;</span><?= e($profile['name']) ?><span class="brand-code">/&gt;</span>
                <span class="brand-tag">PHP_ENGINE</span>
            </a>
            <div class="nav-links-wrap">
                <ul id="nav-menu">
                    <li><a href="#hero" class="nav-link active">Accueil</a></li>
                    <li><a href="#philosophy" class="nav-link">Philosophie</a></li>
                    <li><a href="#skills" class="nav-link">Compétences</a></li>
                    <li><a href="#experience" class="nav-link">Expérience</a></li>
                    <li><a href="#education" class="nav-link">Éducation</a></li>
                    <li><a href="#projects" class="nav-link">Projets</a></li>
                    <li><a href="#recommendations" class="nav-link">Avis</a></li>
                </ul>
                <button class="nav-toggle" onclick="document.getElementById('nav-menu').classList.toggle('open')" aria-label="Menu Mobile">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <main class="page-container">

        <!-- SECTION HERO -->
        <section id="hero">
            <div class="hero-grid">
                <div class="hero-photo-wrapper">
                    <div class="orbit-ring"></div>
                    <div class="hex-frame">
                        <div class="hex-frame-inner">
                            <img src="<?= e($profile['photo']) ?>" alt="Photo de <?= e($profile['name']) ?>" loading="eager">
                            <div class="hex-scanner"></div>
                        </div>
                    </div>
                    <div class="avatar-badge">
                        <span class="hud-pulse"></span>
                        <span>DISPONIBLE / OPEN TO WORK</span>
                    </div>
                </div>

                <div class="hero-content">
                    <p class="hero-tag">&gt; sys_init_profile: <span class="blink">chrys_sanne_tia.php</span></p>
                    <h1 class="glitch" data-text="<?= e($profile['name']) ?>"><?= e($profile['name']) ?></h1>
                    <div class="hero-subtitle">
                        <span><?= e($profile['title']) ?></span>
                        <span style="color:var(--purple);">&#9670;</span>
                        <strong><?= e($profile['spec']) ?></strong>
                    </div>
                    <p class="hero-bio">
                        <?= e($profile['bio']) ?>
                    </p>
                    <div class="hero-badges">
                        <span class="hero-chip highlight">&#9889; Philosophie Rasmus Lerdorf</span>
                        <span class="hero-chip">&#127757; Côte d'Ivoire</span>
                        <span class="hero-chip">&#128736; Zero Bloat &amp; Haute Vitesse</span>
                        <span class="hero-chip">&#127891; Licence Génie Logiciel</span>
                    </div>
                    <div class="hero-cta">
                        <a href="<?= e($profile['cv_file']) ?>" target="_blank" class="btn-neon btn-primary-neon">
                            <span>&#8681;</span> Télécharger mon CV (PDF)
                        </a>
                        <a href="#projects" class="btn-neon btn-secondary-neon">
                            <span>&#9672;</span> Explorer mes projets
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION PHILOSOPHIE RASMUS LERDORF -->
        <section id="philosophy">
            <div class="lerdorf-box">
                <div class="lerdorf-header">
                    <div class="lerdorf-title-wrap">
                        <span class="lerdorf-icon">&#9889;</span>
                        <div>
                            <h3>Le Principe PHP de Rasmus Lerdorf</h3>
                            <p class="lerdorf-sub">"Simple, ultra-rapide, orienté résultats concrets sans sur-ingénierie"</p>
                        </div>
                    </div>
                    <div>
                        <span class="hero-chip highlight">PARADIGME : PRAGMATISME PUR</span>
                    </div>
                </div>
                <div class="lerdorf-grid">
                    <?php foreach ($lerdorf_principles as $p): ?>
                        <div class="lerdorf-card">
                            <div class="lerdorf-card-num">// <?= $p['num'] ?></div>
                            <h4><?= e($p['title']) ?></h4>
                            <p><?= e($p['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- SECTION COMPÉTENCES -->
        <section id="skills">
            <div class="section-header">
                <span class="section-tag">&lt;skills_matrix&gt;</span>
                <h2>Arsenal Technique</h2>
                <div class="neon-divider"></div>
            </div>

            <div class="skills-grid">
                <?php foreach ($skills as $cat_title => $data): ?>
                    <div class="skill-card">
                        <div class="skill-card-header">
                            <span class="skill-card-icon"><?= $data['icon'] ?></span>
                            <h3><?= e($cat_title) ?></h3>
                        </div>
                        <div class="skill-card-body">
                            <?php foreach ($data['items'] as $item): ?>
                                <a href="<?= e($item['url']) ?>" target="_blank" class="skill-chip">
                                    <span class="chip-dot"></span>
                                    <span><?= e($item['name']) ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-footer">
                <span class="section-tag">&lt;/skills_matrix&gt;</span>
            </div>
        </section>

        <!-- SECTION EXPÉRIENCE -->
        <section id="experience">
            <div class="section-header">
                <span class="section-tag">&lt;experience_log&gt;</span>
                <h2>Expérience Professionnelle</h2>
                <div class="neon-divider"></div>
            </div>

            <div class="timeline">
                <?php foreach ($experiences as $i => $exp): ?>
                    <?php $side = ($i % 2 === 0) ? 'tl-left' : 'tl-right'; ?>
                    <div class="tl-entry <?= $side ?>">
                        <div class="tl-badge">&#9733;</div>
                        <div class="tl-panel">
                            <h3><?= e($exp['company']) ?></h3>
                            <h4><?= e($exp['role']) ?></h4>
                            <span class="tl-date">&#9200; <?= e($exp['period']) ?></span>
                            <ul class="tl-tasks">
                                <?php foreach ($exp['tasks'] as $task): ?>
                                    <li><?= e($task) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-footer">
                <span class="section-tag">&lt;/experience_log&gt;</span>
            </div>
        </section>

        <!-- SECTION ÉDUCATION -->
        <section id="education">
            <div class="section-header">
                <span class="section-tag">&lt;academic_trace&gt;</span>
                <h2>Éducation &amp; Certifications</h2>
                <div class="neon-divider"></div>
            </div>

            <div class="timeline">
                <?php foreach ($education as $i => $edu): ?>
                    <?php $side = ($i % 2 === 0) ? 'tl-left' : 'tl-right'; ?>
                    <div class="tl-entry <?= $side ?>">
                        <div class="tl-badge">&#127891;</div>
                        <div class="tl-panel">
                            <h3><?= e($edu['school']) ?></h3>
                            <h4><?= e($edu['diploma']) ?></h4>
                            <span class="tl-date">&#9200; <?= e($edu['period']) ?></span>
                            <p><?= e($edu['desc']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-footer">
                <span class="section-tag">&lt;/academic_trace&gt;</span>
            </div>
        </section>

        <!-- SECTION PROJETS -->
        <section id="projects">
            <div class="section-header">
                <span class="section-tag">&lt;holocron_projects&gt;</span>
                <h2>Projets Réalisés</h2>
                <div class="neon-divider"></div>
            </div>

            <!-- Filtres de Projets -->
            <div class="projects-filter">
                <button class="filter-btn active" data-filter="all" onclick="filterProjects('all')">Tous les projets</button>
                <button class="filter-btn" data-filter="php" onclick="filterProjects('php')">PHP / Backend</button>
                <button class="filter-btn" data-filter="fullstack" onclick="filterProjects('fullstack')">Full-Stack</button>
                <button class="filter-btn" data-filter="frontend" onclick="filterProjects('frontend')">Front-End</button>
            </div>

            <div class="projects-grid">
                <?php foreach ($projects as $proj): ?>
                    <div class="project-card" data-tech="<?= e($proj['category'] . ' ' . $proj['tech']) ?>">
                        <div class="project-top-bar">
                            <span class="dot red"></span>
                            <span class="dot yellow"></span>
                            <span class="dot green"></span>
                            <span class="project-filename"><?= e(str_replace(' ', '_', strtolower($proj['title']))) ?>.php</span>
                        </div>
                        <div class="project-body">
                            <h3><?= e($proj['title']) ?></h3>
                            <span class="project-tech"><?= e($proj['tech']) ?></span>
                            <p><?= e($proj['desc']) ?></p>
                        </div>
                        <div class="project-footer">
                            <a href="<?= e($proj['url']) ?>" target="_blank" class="btn-neon btn-small-neon btn-primary-neon">
                                &#9656; Voir sur GitHub
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-footer">
                <span class="section-tag">&lt;/holocron_projects&gt;</span>
            </div>
        </section>

        <!-- SECTION RECOMMANDATIONS -->
        <section id="recommendations">
            <div class="section-header">
                <span class="section-tag">&lt;peer_reviews&gt;</span>
                <h2>Recommandations</h2>
                <div class="neon-divider"></div>
            </div>

            <div class="rec-carousel">
                <button class="rec-arrow rec-prev" onclick="changeSlide(-1)" aria-label="Avis précédent">&#10094;</button>
                <div class="rec-track">
                    <?php foreach ($recommendations as $i => $rec): ?>
                        <div class="rec-slide <?= ($i === 0) ? 'active' : '' ?>">
                            <blockquote>
                                <p>&laquo; <?= e($rec['quote']) ?> &raquo;</p>
                                <cite>— <?= e($rec['author']) ?></cite>
                            </blockquote>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="rec-arrow rec-next" onclick="changeSlide(1)" aria-label="Avis suivant">&#10095;</button>
            </div>

            <div class="rec-dots">
                <?php foreach ($recommendations as $i => $rec): ?>
                    <button class="rec-dot <?= ($i === 0) ? 'active' : '' ?>" onclick="goToSlide(<?= $i ?>)" aria-label="Slide <?= $i + 1 ?>"></button>
                <?php endforeach; ?>
            </div>

            <div class="section-footer">
                <span class="section-tag">&lt;/peer_reviews&gt;</span>
            </div>
        </section>

    </main>

    <!-- FOOTER HAUTE TECHNOLOGIE -->
    <footer id="footer">
        <div class="footer-inner page-container">
            <p class="footer-tagline">&lt;/&gt; CONÇU &amp; DÉVELOPPÉ SELON L'ESPRIT DE RASMUS LERDORF</p>

            <div class="social-links">
                <a href="<?= e($profile['github']) ?>" target="_blank" class="social-link" title="GitHub">
                    &#128187;
                </a>
                <a href="mailto:<?= e($profile['email']) ?>" class="social-link" title="Email direct">
                    &#9993;
                </a>
                <a href="<?= e($profile['linkedin']) ?>" target="_blank" class="social-link" title="LinkedIn">
                    &#128101;
                </a>
                <a href="<?= e($profile['whatsapp']) ?>" target="_blank" class="social-link" title="WhatsApp">
                    &#128172;
                </a>
                <a href="<?= e($profile['facebook']) ?>" target="_blank" class="social-link" title="Facebook">
                    &#127760;
                </a>
            </div>

            <p class="footer-philosophy">
                Performance : Généré côté serveur en 
                <strong><?= round((microtime(true) - $start_time) * 1000, 2) ?> ms</strong> 
                | Mémoire RAM : <strong><?= round(memory_get_peak_usage() / 1024, 1) ?> KB</strong>
                | Moteur : <strong>PHP Native</strong>
            </p>

            <p class="footer-copy">
                &copy; <?= date('Y') ?> — <?= e($profile['name']) ?>. Tous droits réservés.
            </p>
        </div>
    </footer>

    <!-- BOUTON FLOTTANT & RETOUR EN HAUT -->
    <div class="floating-actions">
        <button class="floating-btn" onclick="openTerminal()" title="Ouvrir le terminal (Ctrl+K)">
            &#62;_
        </button>
        <button id="backToTopBtn" class="floating-btn back-to-top" title="Retour vers le haut">
            &#8679;
        </button>
    </div>

    <!-- MODAL DU TERMINAL CYBER CLI -->
    <div id="terminal-modal" onclick="if(event.target === this) closeTerminal()">
        <div class="terminal-window">
            <div class="terminal-header">
                <span class="terminal-title">TERMINAL // CHRYS_SANNE_TIA_SHELL [v2.0]</span>
                <button class="terminal-close" onclick="closeTerminal()">&times;</button>
            </div>
            <div class="terminal-body" id="terminal-output">
                <div>Bienvenue dans le shell interactif de <strong><?= e($profile['name']) ?></strong>.</div>
                <div style="color:var(--text-muted); margin-bottom: 10px;">Inspiré du moteur PHP de Rasmus Lerdorf. Tapez <span style="color:var(--cyan);">'help'</span> pour voir les commandes.</div>
            </div>
            <div class="terminal-prompt-line">
                <span class="terminal-prompt-symbol">guest@chrys-terminal:~$</span>
                <input type="text" id="terminal-input" class="terminal-input" autocomplete="off" spellcheck="false" placeholder="Tapez une commande (help, about, skills, lerdorf, projects, cv, contact)...">
            </div>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="js/futuristic.js"></script>
</body>
</html>
