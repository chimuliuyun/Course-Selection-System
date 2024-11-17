<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录界面</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <style>
      body {
        background-image: url(./beijing.png);
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
      }

      h1 {
        text-align: center;
        margin-top: 50px;
      }

      #login-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      form {
        display: flex;
        flex-direction: column;
      }

      input[type="text"],
      input[type="password"] {
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
      }

      button {
        background-color: #4caf50;
        color: white;
        border: none;
        padding: 14px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }

      button:hover {
        background-color: #45a049;
      }

      #switch-to-student,
      #switch-to-teacher {
        margin-top: 20px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }

      #switch-to-student:hover,
      #switch-to-teacher:hover {
        background-color: #0056b3;
      }
      
    </style>
</head>
<h1>石河子大学学生选课系统</h1>
<div id="login-container">
  <div id="student-login" style="width: 240px">
    <!-- 学生登录表单 -->
    <form action="login2.php" method="post">
      <span>
        <i class="fa-regular fa-user"></i>
        <input type="text" placeholder="账号" name="username" /> </span
      ><br /><br />
      <span>
        <i class="fa-solid fa-lock"></i>
        <input type="password" placeholder="密码" name="password" /> </span
      ><br /><br />
      <button>登录</button>
    </form>
  </div>
  <div id="teacher-login" style="width: 240px">
    <!-- 教师登录表单 -->
    <form action="login1.php" method="post">
      <span>
        <i class="fa-solid fa-user"></i>
        <input type="text" placeholder="账号" name="username" /> </span
      ><br /><br />
      <span>
        <i class="fa-solid fa-lock"></i>
        <input type="password" placeholder="密码" name="password" /> </span
      ><br /><br />
      <button>登录</button>
    </form>
  </div>
  <button id="switch-to-student">切换到学生登录</button>
  <button id="switch-to-teacher">切换到管理员登录</button>
</div>
<script src="scripts.js"></script>
</body>
</html>