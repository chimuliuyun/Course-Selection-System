<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>管理员课程管理</title>
  <link rel="stylesheet" href="adminStyle.css" />
  <style>
    /* adminStyle.css */
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

    h1, h2 {
      color: #333;
    }

    .course-management {
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #3498db;
      color: #ffffff;
    }

    .button-return {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .button-return:hover {
      background-color: #45a049;
    }

  </style>
</head>
<body>
<div class="container">
  <h1>选课记录</h1>
  <div class="course-management">
    <h2>选课列表</h2>
    <table>
      <thead>
        <tr>
          <th>学生学号</th>
          <th>课程编号</th>
          <th>课程名称</th>
          <th>教师姓名</th>
          <th>学分</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // 连接数据库
          $host = 'localhost'; // 数据库主机名
          $dbname = 'xuanke'; // 数据库名
          $username = 'root'; // 数据库用户名
          $password = ''; // 数据库密码

          // 创建数据库连接
          $conn = new mysqli($host, $username, $password, $dbname);

          // 检查连接是否成功
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // 查询选课记录
          $sql = "SELECT * FROM sc";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // 输出每行数据
            while($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $row['sid'] . '</td>';
              echo '<td>' . $row['cid'] . '</td>';
              echo '<td>' . $row['cname'] . '</td>';
              echo '<td>' . $row['laoshi'] . '</td>';
              echo '<td>' . $row['xuefeng'] . '</td>';
              // 删除选课表单
              echo '<td>';
              echo '<form action="de.php" method="post">';
              echo '<input type="hidden" name="cid" value="' . $row['cid'] . '">';
              echo '<input type="hidden" name="sid" value="' . $row['sid'] . '">';
              echo '<button type="submit" style="background-color: #f0f0f0; border: none; color: black; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; cursor: pointer;">删除选课记录</button>';
              echo '</form>';
              echo '</td>';
              echo '</tr>';
            }
          } else {
            echo '<tr><td colspan="6">暂无选课记录</td></tr>';
          }

          $conn->close();
        ?>
      </tbody>
    </table>
    
    <br><br>
    <a href="admin.php" class="button-return">返回管理员界面</a>
  </div>
</div>
</body>
</html>
