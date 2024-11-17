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

// 删除操作
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM kecheng WHERE id = $delete_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo '<script>alert("课程删除成功");</script>';
        header("Refresh: 0;"); 
    } else {
        echo "Error: " . $delete_sql . "<br>" . $conn->error;
    }
}

// 查询数据库获取课程列表
$sql = "SELECT id, cname, laoshi, xuefeng FROM kecheng";
$result = $conn->query($sql);

// 检查查询是否成功
if ($result === false) {
    echo "查询失败: " . $conn->error;
} else {
    // 输出查询结果
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>课程编号</th><th>课程名</th><th>教师</th><th>学分</th><th>操作</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['cname']}</td>";
            echo "<td>{$row['laoshi']}</td>";
            echo "<td>{$row['xuefeng']}</td>";
            echo "<td><form method='post' action=''>
                      <input type='hidden' name='delete_id' value='{$row['id']}'>
                      <button type='submit'>删除</button>
                  </form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<li>暂无课程信息</li>";
    }
}

// 关闭数据库连接
$conn->close();
?>
