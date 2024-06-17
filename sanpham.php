<?php include "headerquantri.php"; ?>
<?php
include "function_sanpham.php";
$sanpham = new sanpham();
$result = $sanpham->hienthi();
$count = mysqli_num_rows($result);
?>
<!-- Thông qua -->
<div class="example">
    <div class="container">
        <div class="row">
            <h2 class="heading_admin">Quản Lý Sản Phẩm </h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Nhóm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Mô Tả</th>
                        <th>Đơn Giá</th>
                        <th>Đơn Giá Cũ</th>
                        <th>Số Lượng</th>
                        <th>Ảnh </th>
                        <th>Enable</th>
                        <th>Ghi Chú</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?php echo $row["masp"] ?>
                                </td>
                                <td>
                                    <?php echo $row["tennhom"] ?>
                                </td>
                                <td>
                                    <?php echo $row["tensp"] ?>
                                </td>
                                <td>
                                    <?php echo $row["mota"] ?>
                                </td>
                                <td>
                                    <?php echo $row["dongia"] ?>
                                </td>
                                <td>
                                    <?php echo $row["dongiaold"] ?>
                                </td>
                                <td>
                                    <?php echo $row["soluong"] ?>
                                </td>
                                <td>
                                    <img src="./upload/<?php echo $row['img'] ?>" alt="" width="50">

                                </td>
                                <td>
                                    <?php echo ($row['enable'] == 1) ?>
                                </td>
                                <td>
                                    <?php echo $row["ghichu"] ?>
                                </td>
                                <td>
                                    <a class="link_admin link_admin-fix" href="suasanpham.php?masp=<?php echo $row["masp"] ?>" style="text-decoration: none">Sửa</a>
                                    <a class="link_admin link_admin-delete" href="xoasanpham.php?masp=<?php echo $row["masp"] ?>" style="text-decoration: none">Xóa</a>
                                </td>

                            </tr>

                    <?php }
                    }   ?>
                </tbody>
            </table>
            <div class="link_admin-footer">
                <a class="link_admin-btn" href="themsanpham.php">Thêm Sản Phẩm</a>
            </div>
        </div>
    </div>

</div>
</body>

</html>