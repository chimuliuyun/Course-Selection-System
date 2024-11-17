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

// 查询可选课程信息
$sql = "SELECT * FROM kecheng"; // 假设有一个名为 可选课程表 的表，用于存储可选课程信息
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enroll'])) {
    session_start();
    if (isset($_SESSION['student_id'])) {
        $studentId = $_SESSION['student_id'];
        $courseId = $_POST['course_id'];
        $cname = $_POST['cname'];
        $laoshi = $_POST['laoshi'];
        $xuefeng = $_POST['xuefeng'];

        // 检查是否已经选择该课程
        $checkSql = "SELECT * FROM sc WHERE sid='$studentId' AND cid='$courseId'";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            echo '<script>alert("您已经选择过这门课程，不能重复选择");</script>';
        } else {
            // 执行课程选择
            $insertSql = "INSERT INTO sc (sid, cid, cname, laoshi, xuefeng) VALUES ('$studentId', '$courseId', '$cname', '$laoshi', '$xuefeng')";
            if ($conn->query($insertSql) === TRUE) {
                echo '<script>alert("选课成功");</script>';
                // 重新查询可选课程信息
                $result = $conn->query($sql); // 重新获取最新的可选课程信息
            } else {
                echo "Error: " . $insertSql . "<br>" . $conn->error;
            }
        }
    }

    // 处理完POST请求后重定向刷新页面
    header("Refresh:0"); // 不需要指定URL，直接刷新当前页面
}


// 关闭数据库连接
$conn->close();
?>