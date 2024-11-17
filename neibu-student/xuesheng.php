<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生选课系统</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        background-image: url(./beijing.png);
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .student-info {
        background-color: #f0f0f0;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .course-list {
        margin-top: 20px;
    }

    .course-list h2 {
        font-size: 1.5em;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f0f0f0;
    }

    form.enroll-form button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }

    form.enroll-form button:hover {
        background-color: #45a049;
    }

    a {
        text-decoration: none;
        color: black;
        display: inline-block;
        margin-top: 10px;
    }
    </style>
</head>
<body>

<div class="container">
    <div class="student-info">
        <h1>学号：
        <?php 
        session_start();
        if (isset($_SESSION['student_id'])) {
            $username = $_SESSION['student_id'];
            echo $username;
        }
        ?>
        </h1>
    </div>

    <h1>课程选择</h1>
    <div class="course-list">
        <h2>可选课程</h2>
        <table>
            <thead>
                <tr>
                    <th>课程编号</th>
                    <th>课程名称</th>
                    <th>教师</th>
                    <th>学分</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'select_course.php'; // 假设此文件通过数据库查询设置了 $result

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['cname'] . '</td>';
                        echo '<td>' . $row['laoshi'] . '</td>';
                        echo '<td>' . $row['xuefeng'] . '</td>';
                        echo '<td><form class="enroll-form" method="post">';
                        echo '<input type="hidden" name="course_id" value="'. $row['id'] . '">';
                        echo '<input type="hidden" name="cname" value="'. $row['cname'] . '">';
                        echo '<input type="hidden" name="laoshi" value="'. $row['laoshi'] . '">';
                        echo '<input type="hidden" name="xuefeng" value="'. $row['xuefeng'] . '">';
                        echo '<button type="submit" name="enroll">选择</button>';
                        echo '</form></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">暂无可选课程</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <button onclick="location.href='yixuan.php';" style="background-color: #f0f0f0; border: none; color: black; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin-bottom: 10px; cursor: pointer;">查看已选课程</button>
    <br><br>
    <button onclick="location.href='http://localhost/student-class-section/denglu/index.php';" style="background-color: #f0f0f0; border: none; color: black; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer;">返回登录界面</button>
</div>

</body>
</html>
