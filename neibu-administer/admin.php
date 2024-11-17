<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>管理员课程管理</title>
  <link rel="stylesheet" href="adminStyle.css" />
  <style>
    body {
      background-image: url(./beijing.png);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    input[type="submit"], button[type="submit"] {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 12px 24px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover, button[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>课程管理</h1>
    <h3>添加课程信息</h3>
      <form action="add.php" method="post">
        <label for="courseId">课程编号：</label>
        <input type="text" id="courseId" name="courseId" required><br><br>

        <label for="courseName">课程名称：</label>
        <input type="text" id="courseName" name="courseName" required><br><br>

        <label for="teacher">教师姓名：</label>
        <input type="text" id="teacher" name="teacher" required><br><br>

        <label for="credit">学分：</label>
        <input type="number" id="credit" name="credit" step="0.1" required><br><br>

        <input type="submit" value="添加课程">
      </form>
    <div class="course-management">
      <h2>课程列表</h2>
      <table>
        <tbody>
          <?php
            include 'a.php';
          ?>
        </tbody>
      </table>

      
      <br><br>
        <button onclick="location.href='http://localhost/student-class-section/neibu-administer/sc.php';" style="background-color: #f0f0f0; border: none; color: black; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer;">查看选课记录</button>
      <br><br>

      <button onclick="location.href='http://localhost/student-class-section/denglu/index.php';" style="background-color: #f0f0f0; border: none; color: black; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer;">返回登录界面</button>
    </div>
  </div>
</body>
</html>
