<?php include "headerquantri.php"; ?>
<?php
include "function_giohang.php";
$giohang = new giohang();
$result = $giohang->hienthi();
$count = mysqli_num_rows($result);
?>
<!-- Thông qua -->
<div class="example">
    <div class="container">
        <div class="row">
            <h2 class="heading_admin">Quản Lý Giỏ Hàng</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th>Idbill</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $row["id"] ?>
                        </td>
                        <td>
                            <?php echo $row["tensp"] ?>
                        </td>
                        <td>
                            <img src="./upload/<?php echo $row['img'] ?>" alt="" width="50">
                        </td>
                        <td>
                            <?php echo $row["dongia"] ?>
                        </td>
                        <td>
                            <?php echo $row["soluong"] ?>
                        </td>
                        <td>
                            <?php echo $row["thanhtien"] ?>
                        </td>

                        <td>
                            <?php echo $row["idbill"] ?>
                        </td>

                        <td>
                            <a class="link_admin link_admin-delete" href="xoagiohang.php?id=<?php echo $row["id"] ?>"
                                style="text-decoration: none">Xóa</a>
                        </td>

                    </tr>

                    <?php }
                    }   ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>

</html>