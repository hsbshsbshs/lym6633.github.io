<?php
require_once "./model/public.php";
?>
<html>

<head>
    <title>添加用户</title>
</head>

<body>
    <h3>添加用户</h3>
    <form id="add_user" name="add_user" method="post" action="insert_user.php">
        用户姓名：<input type="text" name="user_name" /><br />
        用户密码：<input type="text" name="user_psw" /><br />
        用户性别：<input type="text" name="user_sex" /><br />
        用户年龄：<input type="text" name="user_age" /><br />
        所属班级：<select name="show_user_name">

            <?php
            $sql = "select * from users";
            $result = mysqli_query($conn, $sql);
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_row($result)) {
                echo "<option value=" . $rows[0] . ">" . $rows[1] . "</option>";
            }
            ?>
        </select><br />

        小组名：<select name="user_group">
            <?php
            $sql = "select * from users";
            $result = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_row($result)) {
                echo "<option value=" . $rows[0] . ">" . $rows[1] . "</option>";
            }
            ?>
        </select>
        <br />
        <br />
        <input type="submit" value="添加" />
    </form>
</body>

</html>