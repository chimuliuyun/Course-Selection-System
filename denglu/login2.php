<?php
// 数据库连接信息
$host = 'localhost'; // 数据库主机名
$dbname = 'xuanke'; // 数据库名
$username = 'root'; // 数据库用户名
$password = ''; // 数据库密码

// 数据库连接字符串
$conn = new mysqli($host, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

// 处理登录表单提交 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取输入的账号和密码
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 防止 SQL 注入
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // 查询数据库
    $sql = "SELECT * FROM xuesheng WHERE id='$username' AND pwd='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // 将学生学号存储在 SESSION 中，以便其他页面使用
        session_start();
        $_SESSION['student_id'] = $username;
        //登录成功，跳转到管理页面
        header("Location: http://localhost/student-class-section/neibu-student/xuesheng.php");
        exit();
    } else {
        // 登录失败，显示错误信息
        echo '<script>alert("账号或密码错误");</script>';
        header("Refresh: 0; URL=index.php"); 
        exit();
    }
}

// 关闭数据库连接
$conn->close();
?>
