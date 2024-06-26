<?php include "headerquantri.php"; ?>
<?php
include "function_hoadon.php";
$hoadon = new hoadon();
$result = $hoadon->hienthi();
$count = mysqli_num_rows($result);
?>
<!-- Thông qua -->
<div class="example">
    <div class="container">
        <div class="row">
            <h2 class="heading_admin">Quản Lý Hóa Đơn</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên Người Mua</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Thành Tiền</th>

                        <!-- <th>Pttt</th> -->
                        <!-- <th>Người dùng</th> -->

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
                                    <?php echo $row["name"] ?>
                                </td>
                                <td>
                                    <?php echo $row["address"] ?>
                                </td>
                                <td>
                                    <?php echo $row["tel"] ?>
                                </td>
                                <td>
                                    <?php echo $row["email"] ?>
                                </td>
                                <td>
                                    <?PHP echo $row["total"] ?>
                                </td>

                                <!-- <td>
                                    <?php echo $row["pttt"] ?>
                                </td>
                                <td>
                                    <?php echo $row["user"] ?>
                                </td> -->

                                <td>
                                    <a class="link_admin link_admin-delete" href="xoahoadon.php?id=<?php echo $row["id"] ?>" style="text-decoration: none">Xóa</a>
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