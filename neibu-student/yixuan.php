<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>已选课程</title>
    <link rel="stylesheet" href="styles.css"> <!-- 样式表链接 -->
    <style>
        /* Resetting default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-image: url(./beijing.png);
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    line-height: 1.6;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.selected-courses ul {
    list-style-type: none;
    padding: 0;
}

.selected-courses li {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.course-info h2 {
    margin-bottom: 5px;
    font-size: 1.2em;
}

.course-info p {
    margin-bottom: 5px;
    color: #666;
}

.selected-courses button {
    background-color: #4CAF50; /* 绿色 */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

.selected-courses button:hover {
    background-color: #45a049; /* 鼠标悬停时的颜色 */
}

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>已选课程</h1>
        
    </div>
    <div class="selected-courses">
        <ul>
            <?php
            $host = 'localhost'; // 数据库主机名
            $dbname = 'xuanke'; // 数据库名
            $username = 'root'; // 数据库用户名
            $password = ''; // 数据库密码
            
            // 数据库连接字符串
            $conn = new mysqli($host, $username, $password, $dbname);
            // 检查连接是否成功
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }
            session_start();
            if (isset($_SESSION['student_id'])) {
            $sid = $_SESSION['student_id'];
            // 学生学号为 $sid

            // 准备查询语句
            $sql = "SELECT cid, cname, laoshi, xuefeng FROM sc WHERE sid = $sid";

            // 执行查询
            $result = $conn->query($sql);
            }
            // 输出数据
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<li>';
                    echo '<div class="course-info">';
                    echo '<h2>' . $row["cname"] . '</h2>';
                    echo '<p>教授：' . $row["laoshi"] . '</p>';
                    echo '<p>学分：' . $row["xuefeng"] . '</p>';
                    echo '</div>';
                    echo '<form action="drop_course.php" method="post">';
                    echo '<input type="hidden" name="cid" value="' . $row["cid"] . '">';
                    echo '<button type="submit" name="drop_course">撤销</button>'; // 添加撤销按钮
                    echo '</form>';
                    echo '</li>';
                }
            } else {
                echo '<li>暂无已选课程</li>';
            }

            // 关闭数据库连接
            $conn->close();
            ?>
        </ul>
        <button onclick="location.href='http://localhost/student-class-section/neibu-student/xuesheng.php';" style="background-color: #f0f0f0; border: none; color: black; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer;">返回选课界面</button>
    </div>
</div>

</body>
</html>
