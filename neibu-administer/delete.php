<?php
// 数据库连接配置
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

// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseIdToDelete = $_POST['courseIdToDelete'];

    // 准备 SQL 语句删除数据
    $sql = "DELETE FROM kecheng WHERE id = '$courseIdToDelete'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("课程信息删除成功");</script>';
        header("Refresh: 0; URL=admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
?>
