<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Articles</title>
    <link rel="stylesheet" href="./css/style_admin_home.css">
    <link rel="stylesheet" href="./style/styleart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo-1.ico">
    <script src="https://cdn.notiflix.com/notiflix-2.7.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
    <header>
        <div class="head">
            <a href="/BI05_LOTTERY/index.php"><img src="img/Logo.png" alt="Logo"></a>
            <ul>
                <li><a href="topic.php">Topic</a></li>
                <li><a href="#"><?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                <li><a href="#" onclick="showUserManagement()">Edit profile</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <h1>Manage articles</h1>
        <div class="form-container" id="article-form-section">
            <form id="article-form">
                <input type="hidden" id="article-id">
                <label for="title">หัวข้อบทความรู้</label>
                <input type="text" id="title" required>
                <label for="content">เนื้อหาบทความรู้</label>
                <textarea id="content" required></textarea>
                <button type="submit">บันทึก</button>
            </form>
        </div>
        <div class="article-list">
            <h2>บทความรู้</h2>
            <div id="articles"></div>
        </div>
        
    </div>
    <div id="userManagement" style="display: none;">
        <ul>
            <li><a href="admin_updateprofile.php">จัดการผู้ใช้</a></li>
        </ul>
    </div>

    <div id="message" class="message" style="display: none;"></div>
    <script>
        CKEDITOR.replace('content');

        function showUserManagement() {
            window.location.href = 'admin_updateprofile.php';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('article-form');
            const articleIdInput = document.getElementById('article-id');
            const titleInput = document.getElementById('title');
            const contentInput = document.getElementById('content');
            const articleList = document.getElementById('articles');

            async function fetchArticles() {
                try {
                    const response = await fetch('api.php');
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const articles = await response.json();
                    displayArticles(articles);
                } catch (error) {
                    console.error('Error fetching articles:', error);
                }
            }

            function displayArticles(articles) {
                articleList.innerHTML = '';
                articles.forEach(article => {
                    const articleBox = document.createElement('div');
                    articleBox.classList.add('article-box');
                    articleBox.innerHTML = `
                        <h2>${article.title}</h2>
                        <div class="blog-post-meta">Last updated: ${new Date(article.updated_at).toLocaleString()}</div>
                        <p>${article.content}</p>
                        <div class="article-actions">
                            <button onclick="editArticle('${article.id}')">แก้ไข</button>
                            <button onclick="deleteArticle('${article.id}')">ลบ</button>
                        </div>
                    `;
                    articleList.appendChild(articleBox);
                });
            }

            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const id = articleIdInput.value;
                const title = titleInput.value;
                const content = CKEDITOR.instances.content.getData();
                const updated_at = new Date().toISOString();
                const article = { id, title, content, updated_at };

                try {
                    let response;
                    if (id) {
                        response = await fetch('api.php?id=' + id, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(article)
                        });
                    } else {
                        article.created_at = updated_at; // Set creation date if new article
                        response = await fetch('api.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(article)
                        });
                    }

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    fetchArticles();
                    form.reset();
                    articleIdInput.value = '';
                    CKEDITOR.instances.content.setData('');

                    // Scroll to the top of the article list
                    articleList.scrollTop = 0;

                } catch (error) {
                    console.error('Error saving article:', error);
                }
            });

            window.editArticle = async function(id) {
                try {
                    const response = await fetch(`api.php?id=${id}`);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const article = await response.json();
                    if (article) {
                        articleIdInput.value = article.id;
                        titleInput.value = article.title;
                        CKEDITOR.instances.content.setData(article.content);

                        // Scroll to the top of the article list
                        articleList.scrollTop = 0;
                    }
                } catch (error) {
                    console.error('Error fetching article for edit:', error);
                }
            };

            window.deleteArticle = async function(id) {
                try {
                    await fetch(`api.php?id=${id}`, {
                        method: 'DELETE'
                    });
                    fetchArticles();
                } catch (error) {
                    console.error('Error deleting article:', error);
                }
            };

            fetchArticles();
        });
    </script>
</body>
</html>
