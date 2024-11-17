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

// 处理删除操作
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cid = $_POST['cid'];
  $sid = $_POST['sid'];

  // 执行删除操作
  $sql = "DELETE FROM sc WHERE cid = '$cid' AND sid = '$sid'";
  if ($conn->query($sql) === TRUE) {
    // 删除成功，重定向回管理员页面
    echo '<script>alert("选课记录删除成功");</script>';
    header("Location: sc.php");
    exit;
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

$conn->close();
?>
