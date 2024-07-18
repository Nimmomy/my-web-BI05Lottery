<?php
session_start();
include('server.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Management</title>
    <link rel="stylesheet" href="./style/styleinsurr.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css' integrity='sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/Logo.png">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="script1.js"></script>
</head>
<body>
    <header>
        <div class="head">
            <img src="img/Logo.png"></a>
            <ul id="menu">
            <li><a href="Art.php" class="active">บทความรู้</a></li>
                <li><a href="inusr.php">ประกันมะเร็ง</a></li>
                <li><a href="admin_page.php">ลงทะเบียนสาธารสุข</a></li>
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<li><a href="#">'.$_SESSION['username'].'</a></li>';
                    echo '<li><a href="logout.php">ออกจากระบบ</a></li>';
                } else {
                    echo '<li><a href="login.php">เข้าสู่ระบบ</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>
    <div class="container">
        <h1>จัดการบทความประกัน</h1>
        <div class="form-container">
            <form id="article-form">
                <input type="hidden" id="article-id">
                <label for="title">หัวข้อบทความประกัน</label>
                <input type="text" id="title" required>
                <label for="content">เนื้อหาบทความประกัน</label>
                <textarea id="content" required></textarea>
                <button type="submit">บันทึก</button>
            </form>
        </div>
        <div class="article-list">
            
            <div id="articles"></div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('content');

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('article-form');
            const articleIdInput = document.getElementById('article-id');
            const titleInput = document.getElementById('title');
            const contentInput = document.getElementById('content');
            const articleList = document.getElementById('articles');

            async function fetchArticles() {
                const response = await fetch('api_insurance.php'); // เปลี่ยน URL เชื่อมต่อ API
                const articles = await response.json();
                displayArticles(articles);
            }

            function displayArticles(articles) {
                // Sort articles by updated_at in descending order
                articles.sort((a, b) => new Date(b.updated_at) - new Date(a.updated_at));

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

                if (id) {
                    await fetch(`api_insurance.php?id=${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(article)
                    });
                } else {
                    await fetch('api_insurance.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(article)
                    });
                }

                fetchArticles();
                form.reset();
                articleIdInput.value = '';
                CKEDITOR.instances.content.setData('');
            });

            window.editArticle = async function(id) {
                const response = await fetch(`api_insurance.php?id=${id}`);
                const article = await response.json();
                if (article) {
                    articleIdInput.value = article.id;
                    titleInput.value = article.title;
                    CKEDITOR.instances.content.setData(article.content);
                }
            };

            window.deleteArticle = async function(id) {
                await fetch(`api_insurance.php?id=${id}`, {
                    method: 'DELETE'
                });
                fetchArticles();
            };

            fetchArticles();
        });
    </script>
 

</body>
</html>