<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị timestamp hiện tại
    $timestamp = time();
    // Xử lý các dữ liệu khác từ form
    $inputValue = $_POST["input_name"]; // Thay "input_name" bằng tên thực của thẻ input

    // chuyển chuỗi timestamp thành date việt nam
    $ngay_gio_vn = date('H:i:s d-m-Y', $timestamp);
    var_dump($ngay_gio_vn);

    // chuyển đổi thành timestamp trong sql
    $timestamp = strtotime($ngay_gio_vn);
    var_dump($timestamp);
    // Tiếp tục xử lý và lưu dữ liệu vào cơ sở dữ liệu SQL
    // ...

    // Hiển thị thông báo hoặc thực hiện các công việc khác sau khi submit form
    echo "////////////////";

    $check_in_time = strtotime($_POST['thoigian']);
    var_dump($check_in_time);


    /**
     * BIND PARAMS
     * ===================================================================================
     * $sql_Args là một mảng chứa các giá trị được sử dụng để bind vào câu truy vấn SQL.
     * Trong hàm pdo_Execute, nếu bạn có các tham số trong câu truy vấn, bạn cần truyền giá trị của chúng vào mảng $sql_Args.
     * Mỗi phần tử trong mảng này sẽ được bind vào một tham số trong câu truy vấn.
     * 
     * Ví dụ, nếu câu truy vấn SQL của bạn có một hoặc nhiều dấu ? đại diện cho các tham số,
     *      bạn sẽ truyền giá trị của các tham số đó vào mảng $sql_Args theo thứ tự. 
     *      Mỗi giá trị trong $sql_Args sẽ bind vào một dấu ? tương ứng trong câu truy vấ
     * 
     * Trong ví dụ này, giá trị $timestamp sẽ được bind vào tham số đầu tiên (?) trong câu truy vấn, 
     *       và giá trị $inputValue sẽ được bind vào tham số thứ hai (?)
     */

    // Hàm Truy Vấn
    function pdo_Execute($sql, $sql_Args = []){
        try {
            $conn = pdo_Get_Connection();
            $stmt = $conn->prepare($sql);

            // Nếu có tham số, thì bind các giá trị
            if (!empty($sql_Args)) {
                $params = array();
                foreach ($sql_Args as $key => $value) {
                    $params[$key] = &$sql_Args[$key];
                }
                call_user_func_array(array($stmt, 'bindParam'), $params);
            }

            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            // Giải phóng tài nguyên và đóng kết nối
            $stmt->closeCursor();
            unset($stmt);
            unset($conn);
        }
    }

    // Câu truy vấn SQL có 2 tham số
    $sql_insert = "INSERT INTO your_table (timestamp_column, other_column) VALUES (?, ?)";
    $inputValue = "some_value";
    $timestamp = time();

    // Mảng $sql_Args chứa giá trị của các tham số
    $sql_Args = [$timestamp, $inputValue];

    // Thực hiện truy vấn
    pdo_Execute($sql_insert, $sql_Args);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Form</title>
</head>

<body>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <!-- Thẻ input với giá trị timestamp -->
        <input type="text" name="input_name" value="<?php echo time(); ?>" style="display: none;">
        <input type="datetime-local" name="thoigian">
        <!-- Các trường và nút submit khác -->
        <label for="other_input">Other Input:</label>
        <input type="text" name="other_input" id="other_input">

        <button type="submit">Submit</button>
    </form>

</body>

</html>