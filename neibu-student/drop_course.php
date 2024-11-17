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

// 处理从表单传递过来的数据
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['drop_course'])) {
    session_start();
    if (isset($_SESSION['student_id'])) {
        $sid = $_SESSION['student_id'];
        $cid = $_POST['cid']; // 注意这里使用的是 $_POST['cid']
    }

    // 准备 SQL 删除语句
    $sql = "DELETE FROM sc WHERE cid = $cid AND sid = $sid";

    // 执行删除操作
    if ($conn->query($sql) === TRUE) {
        // 操作成功，重定向到已选课程页面
        echo '<script>alert("取消选课成功");</script>';
        header("Location: yixuan.php");
        exit(); // 确保重定向后立即退出脚本
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// 关闭数据库连接
$conn->close();
?>
