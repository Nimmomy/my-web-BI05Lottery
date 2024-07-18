form.addEventListener('submit', async function(e) {
    e.preventDefault();
    const id = articleIdInput.value;
    const title = titleInput.value;
    const content = CKEDITOR.instances.content.getData();
    const updated_at = new Date().toISOString();
    const article = { id, title, content, updated_at };

    try {
        if (id) {
            await fetch('api.php', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(article)
            });
            showMessage('บทความถูกอัปเดตเรียบร้อยแล้ว', 'success');
        } else {
            article.created_at = updated_at;
            await fetch('api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(article)
            });
            showMessage('บทความใหม่ถูกเพิ่มเรียบร้อยแล้ว', 'success');
        }

        fetchArticles();
        form.reset();
        articleIdInput.value = '';
        CKEDITOR.instances.content.setData('');
    } catch (error) {
        showMessage('เกิดข้อผิดพลาดในการบันทึกบทความ', 'error');
    }
});

function showMessage(text, type) {
    const messageEl = document.getElementById('message');
    messageEl.textContent = text;
    messageEl.className = `message ${type}`;
    messageEl.style.display = 'block';
    setTimeout(() => {
        messageEl.style.display = 'none';
    }, 3000);

    function showUserManagement() {
        window.location.href = 'admin_updateprofile.php';
    }
    
}