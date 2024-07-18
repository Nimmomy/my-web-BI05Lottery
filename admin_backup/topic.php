<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทความ</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.css' integrity='sha512-kYOMiaoKMZJ+4BIGOKuBJ19/SvBNKsuThdvZHppiLjJ/1RAEr64IQIoUk2cww5LJLWPRomM4N3j4+e0SzYe5Dg==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="./css/style_topic.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="icon" href="img/logo-1.ico">
</head>
<body>
    <div class="wrapper">
        <div class="head">
            <img href="#" src="img/Head.jpg">
            
            <div class="logo-2">
                <a href="/BI05_LOTTERY/index.php"><img src="img/Logo.png" alt="Logo"></a>            
            </div>
            <div class="menu-2">
                <ul id="menu-2">
                    <li><a href="/BI05_LOTTERY/type.php">ทดลองลงทุน</a></li>
                    <li><a href="topic.php">บทความ</a></li>
                </ul>
            </div>
        </div>
        <div id="articles-container"></div>
    </div>

    <script>
        async function fetchArticles() {
            try {
                const response = await axios.get('api.php');
                const articles = response.data;
                displayArticles(articles);
            } catch (error) {
                console.error('Error fetching articles:', error);
            }
        }

        function displayArticles(articles) {
            const container = document.getElementById('articles-container');
            container.innerHTML = '';
            articles.forEach(article => {
                const articleElement = document.createElement('div');
                articleElement.className = 'article';
                articleElement.innerHTML = `
                    <h2>${article.title}</h2>
                    <div class="article-meta">Last updated: ${new Date(article.updated_at).toLocaleString()}</div>
                    <div class="article-content">${article.content}</div>
                `;
                container.appendChild(articleElement);
            });
        }

        // Fetch articles initially
        fetchArticles();

        // Fetch articles every 30 seconds for real-time updates
        setInterval(fetchArticles, 30000);
    </script>
</body>
</html>