<?php include "headerquantri.php"; ?>
<?php include "function_taikhoan.php";
$taikhoan = new taikhoan();
$result = $taikhoan->hienthi();
$count = mysqli_num_rows($result);
?>


<div class="example">
    <div class="container">
        <div class="row">
            <h2 class="heading_admin">Quản Lý Tài Khoản</h2>
            <table class=" table table-bordered">
                <thead>
                    <tr>
                        <th>Tên Đăng Nhập</th>
                        <th>Mật Khẩu</th>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Enable</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $row["tendangnhap"] ?>
                        </td>
                        <td>
                            <?php echo $row["matkhau"] ?>
                        </td>
                        <td>
                            <?php echo $row["hoten"] ?>
                        </td>
                        <td>
                            <?php echo $row["email"] ?>
                        </td>
                        <td>
                            <?php echo $row["enable"] ?>
                        </td>
                        <td>
                            <a class="link_admin link_admin-fix"
                                href="suataikhoan.php?tendangnhap=<?php echo $row["tendangnhap"] ?>"
                                style="text-decoration: none">Sửa</a>
                            <a class="link_admin link_admin-delete"
                                href="xoataikhoan.php?tendangnhap=<?php echo $row["tendangnhap"] ?>"
                                style="text-decoration: none">Xóa</a>
                        </td>

                    </tr>

                    <?php
                        }
                    } ?>
                </tbody>
            </table>
            <div class="link_admin-footer">
                <a class="link_admin-btn" href="themtaikhoan.php">Thêm Tài Khoản</a>
            </div>
        </div>
    </div>

</div>