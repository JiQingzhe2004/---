<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AiQiji软件库</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="logo.png" alt="网站logo">
        </div>
        <div class="site-name">AiQiji软件库</div>
    </header>

    <div class="container" id="softwareContainer">
        <!-- 下载卡片将由 JavaScript 动态生成 -->
    </div>

    <footer class="footer">
        <div class="footer-content">
            <a href="https://aiqji.com" class="blog-link">AiQiji博客</a>
            <a href="admin.php" class="other-link">管理员入口</a>
            <p class="copyright">© 2024 AiQiji软件库</p>
        </div>
    </footer>

    <script>
        // 在页面加载完成后执行
        document.addEventListener("DOMContentLoaded", function () {
            // 使用 fetch 获取其他文件中的数据
            fetch("software_data.json")
                .then(response => response.json()) // 将响应转换为 JSON 格式
                .then(data => {
                    // 使用获取到的数据更新下载卡片
                    updateSoftwareCards(data);
                })
                .catch(error => {
                    console.error("Error fetching software data:", error);
                });
        });

        // 更新下载卡片的函数
        function updateSoftwareCards(softwareData) {
            var softwareContainer = document.getElementById("softwareContainer");
            softwareContainer.innerHTML = ""; // 清空容器

            // 遍历软件数据，创建下载卡片
            softwareData.forEach(function (software) {
                var card = document.createElement("div");
                card.classList.add("item");
                card.innerHTML = `
                    <img src="${software.icon}" alt="${software.name} 图标">
                    <a href="${software.download_link}" class="download-btn">下载</a>
                    <p>${software.name}</p>
                `;
                softwareContainer.appendChild(card);
            });
        }
    </script>
</body>

</html>
