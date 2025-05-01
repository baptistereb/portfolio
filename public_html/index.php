<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Baptiste Rébillard</title>

  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

  <meta property="og:title" content="Baptiste Rébillard" />
  <meta property="og:description" content="Website / Site internet - Baptiste Rébillard" />
  <meta property="og:image" content="https://baptiste-reb.fr/img/profil.JPG" />
  <meta property="og:type" content="website" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    }
  </script>
</head>
<body class="bg-white dark:bg-gray-900 dark:text-white transition-colors duration-300 font-sans">

  <header class="bg-gray-100 dark:bg-gray-800 shadow">
    <div class="max-w-5xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold">Baptiste Rébillard</h1>
      <div class="flex items-center space-x-4">
        <button onclick="toggleLang()" class="text-sm hover:underline">🌐 <span id="lang-btn">EN/FR</span></button>
        <button onclick="toggleTheme()" class="text-sm hover:underline">🌓 <span id="theme-btn">Dark</span></button>
      </div>
    </div>
  </header>

  <section class="max-w-5xl mx-auto px-4 py-12 flex flex-col md:flex-row items-center md:space-x-10">
    <img src="img/profil.JPG" alt="Photo de profil" class="w-40 h-40 rounded-full object-cover shadow-lg mb-6 md:mb-0">
    <div>
      <h2 class="text-3xl font-bold mb-2" data-fr="Salut, moi c’est Baptiste 👋" data-en="Hi, I'm Baptiste 👋"></h2>
      <p class="text-gray-700 dark:text-gray-300 mb-4" data-fr="Étudiant en informatique, passionné par la cybersécurité, l'impression 3D et les projets libres." data-en="Computer science student, passionate about cybersecurity, 3D printing, and open-source projects."></p>
      <a href="#articles" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline" data-fr="Voir mes derniers articles →" data-en="See my latest articles →">Voir mes derniers articles →</a>
    </div>
  </section>

  <!-- Showoff-->
  <section id="showoff" class="bg-gray-50 dark:bg-gray-800 py-12">
    <div class="max-w-5xl mx-auto px-4">
      <h3 class="text-2xl font-bold mb-6" data-fr="Projets" data-en="Projects"></h3>
      <div class="grid gap-6 md:grid-cols-3 sm:grid-cols-1" id="showoff-list">
        <!-- Liste des projets sera ajoutée ici -->
      </div>
    </div>
  </section>

  <!-- Articles -->
  <section id="articles" class="py-12">
    <div class="max-w-5xl mx-auto px-4">
      <h3 class="text-2xl font-bold mb-6" data-fr="Articles récents" data-en="Latest articles"></h3>
      <div class="grid gap-6 md:grid-cols-2" id="article-list">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="contact" class="bg-gray-50 dark:bg-gray-800 mt-16 py-8">
    <div class="max-w-5xl mx-auto px-4 text-center">
      <p class="mb-4 text-center text-lg" data-fr="N'hésite pas à me contacter 👇" data-en="Feel free to reach out 👇"></p>
      <div class="flex justify-center space-x-6">
        <a href="mailto:baptiste.rebillard@protonmail.com" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">📧 Email</a>
        <a href="https://www.linkedin.com/in/baptistereb/" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">🔗 LinkedIn</a>
        <a href="https://github.com/baptistereb/" class="text-gray-600 dark:text-gray-300 hover:text-blue-600">💻 GitHub</a>
      </div>
      <p class="text-sm text-gray-500 dark:text-gray-400 mt-6">&copy; 2025 Baptiste Rébillard</p>
    </div>
  </footer>

  <script>
    function applyLanguage() {
      const lang = document.documentElement.lang || "en";
      document.querySelectorAll('[data-fr]').forEach(el => {
        el.innerHTML = el.getAttribute(`data-${lang}`);
      });
      if(lang == "en") {
        document.getElementById('lang-btn').textContent = "FR";
      } else if(lang == "fr") {
        document.getElementById('lang-btn').textContent = "EN";
      } else {
        document.getElementById('lang-btn').textContent = "EN/FR";
      }
    }

    function toggleTheme() {
      const html = document.documentElement;
      html.classList.toggle('dark');
      const isDark = html.classList.contains('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      document.getElementById('theme-btn').textContent = isDark ? 'Light' : 'Dark';
    }

    function toggleLang() {
      const currentLang = document.documentElement.lang;
      const newLang = currentLang === 'fr' ? 'en' : 'fr';
      document.documentElement.lang = newLang;
      localStorage.setItem('lang', newLang); // <-- ici

      document.getElementById('lang-btn').textContent = currentLang.toUpperCase();

      document.querySelectorAll('[data-fr]').forEach(el => {
        el.innerHTML = el.getAttribute(`data-${newLang}`);
      });
    }

    function loadArticles() {
      fetch('articles/articles.json')
        .then(response => response.json())
        .then(articles => {
          const articleList = document.getElementById('article-list');

          articles.reverse() // print les articles les plus récents d'abord

          articles.forEach(article => {
            const articleElement = document.createElement('a');
            articleElement.href = `article.php?id=${article.id}`;
            articleElement.className = 'block p-6 bg-white dark:bg-gray-700 rounded-xl shadow hover:shadow-lg transition';

            articleElement.innerHTML = `
              <h4 class="text-xl font-semibold mb-2" data-fr="${article.title.fr}" data-en="${article.title.en}"></h4>
              <p class="text-gray-600 dark:text-gray-300" data-fr="${article.content.fr.substring(0, 100)}..." data-en="${article.content.en.substring(0, 100)}..."></p>
              <span class="text-sm text-blue-600 dark:text-blue-400 mt-2 inline-block" data-fr="Lire l’article →" data-en="Read article →">Lire l’article →</span>
            `;
            articleList.appendChild(articleElement);
          });
          applyLanguage();
        })
        .catch(error => console.error('Error loading articles:', error));
    }

    function loadShowoff() {
    fetch('showoff/showoff.json') // Remplace par le chemin de ton fichier JSON
      .then(response => response.json())
      .then(projects => {
        const showoffList = document.getElementById('showoff-list');

        projects.forEach(project => {
          const projectElement = document.createElement('a');
          projectElement.href = project.link;
          projectElement.className = 'relative block rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-transform transform hover:scale-105';

          projectElement.innerHTML = `
            <div class="w-full h-32 bg-cover bg-center" style="background-image: url('${project.image}');">
              <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center text-center text-white">
                <h4 class="text-xl font-semibold" data-fr="${project.title.fr}" data-en="${project.title.en}"></h4>
              </div>
            </div>
          `;

          showoffList.appendChild(projectElement);
        });

        applyLanguage(); // Applique la langue (utile si tu utilises plusieurs langues)
      })
      .catch(error => console.error('Error loading projects:', error));
  }
    window.addEventListener('DOMContentLoaded', () => {
      // Appliquer le thème
      const isDark = document.documentElement.classList.contains('dark');
      document.getElementById('theme-btn').textContent = isDark ? 'Light' : 'Dark';

      // Appliquer la langue depuis le localStorage
      const savedLang = localStorage.getItem('lang') || 'en';
      document.documentElement.lang = savedLang;

      loadArticles();
      loadShowoff();
    });
  </script>
</body>
</html>
