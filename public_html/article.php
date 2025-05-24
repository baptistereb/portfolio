<?php
$articles = json_decode(file_get_contents('articles/articles.json'), true);
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$article = null;
foreach ($articles as $a) {
    if ($a['id'] === $id) {
        $article = $a;
        break;
    }
}
if (!$article) {
    http_response_code(404);
    echo "Article not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
  <meta charset="UTF-8" />
  <title><?php echo htmlspecialchars($article['title']['fr']); ?> — Baptiste Rébillard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= htmlspecialchars(mb_strimwidth(strip_tags($article['content']['fr']), 0, 200, '...')); ?>" />

  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?= htmlspecialchars($article['title']['en']); ?>" />
  <meta property="og:description" content="<?php echo htmlspecialchars(mb_strimwidth(strip_tags($article['content']['en']), 0, 200, '...')); ?>" />
  <meta property="og:image" content="https://baptiste-reb.fr/<?= htmlspecialchars($article['banner']); ?>" />
  <meta property="og:url" content="https://baptiste-reb.fr/article.php?id=<?= $article['id']; ?>" />
  <meta property="og:site_name" content="Baptiste Rébillard" />
  <meta property="article:author" content="https://baptiste-reb.fr" />

  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
    }
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
    };
  </script>
</head>
<body class="bg-white dark:bg-gray-900 dark:text-white transition-colors duration-300 font-sans">

  <header class="bg-gray-100 dark:bg-gray-800 shadow">
    <div class="max-w-5xl mx-auto px-4 py-4 flex justify-between items-center">
      <a href="index.php" class="text-xl font-bold hover:underline">← Home</a>
      <div class="flex items-center space-x-4">
        <button onclick="toggleLang()" class="text-sm hover:underline">🌐 <span id="lang-btn">EN/FR</span></button>
        <button onclick="toggleTheme()" class="text-sm hover:underline">🌓 <span id="theme-btn">Dark</span></button>
      </div>
    </div>
  </header>

  <main class="max-w-3xl mx-auto px-4 py-12">
    <section class="relative h-64 w-full rounded-lg overflow-hidden mb-12">
      <img src="<?php echo htmlspecialchars($article['banner']); ?>" alt="Bannière"
           class="w-full h-full object-cover brightness-75 dark:brightness-50">
      <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-4xl text-white font-bold drop-shadow-md text-center"
            data-fr="<?php echo htmlspecialchars($article['title']['fr']); ?>"
            data-en="<?php echo htmlspecialchars($article['title']['en']); ?>">
        </h1>
      </div>
    </section>

    <p class="text-sm text-gray-500 dark:text-gray-400 mb-10 text-center"
       data-fr="Publié le <?php echo $article['date']; ?>"
       data-en="Published on <?php echo $article['date']; ?>">
    </p>

    <article class="prose dark:prose-invert max-w-none prose-lg"
             data-fr="<?php echo htmlspecialchars($article['content']['fr']); ?>"
             data-en="<?php echo htmlspecialchars($article['content']['en']); ?>">
    </article>
  </main>

  <footer class="bg-gray-100 dark:bg-gray-800 mt-16 py-8">
    <div class="max-w-3xl mx-auto px-4 text-center">
      <p class="mb-4 text-lg" data-fr="N'hésite pas à me contacter 👇" data-en="Feel free to reach out 👇">
        N'hésite pas à me contacter 👇
      </p>
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

    window.addEventListener('DOMContentLoaded', () => {
      // Appliquer le thème
      const isDark = document.documentElement.classList.contains('dark');
      document.getElementById('theme-btn').textContent = isDark ? 'Light' : 'Dark';

      // Appliquer la langue depuis le localStorage
      const savedLang = localStorage.getItem('lang') || 'en';
      document.documentElement.lang = savedLang;

      applyLanguage();
    });
  </script>
</body>
</html>
