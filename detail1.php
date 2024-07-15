<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doanwebtqn";

//B1: Create connetion

$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection

if (!$conn) {
    die("connection failer" . mysqli_connect_error());
}

$masp = isset($_GET['masp']) ? $_GET['masp'] : '';
$sql = "SELECT sp.*, 
               GROUP_CONCAT(DISTINCT sz.size ORDER BY sz.size SEPARATOR ', ') AS sizes, 
               GROUP_CONCAT(DISTINCT ms.mau_sac ORDER BY ms.mau_sac SEPARATOR ', ') AS colors
        FROM sanpham sp
        LEFT JOIN sanpham_size sps ON sp.masp = sps.sanpham_id
        LEFT JOIN size sz ON sps.size_id = sz.id
        LEFT JOIN sanpham_mau_sac spms ON sp.masp = spms.sanpham_id
        LEFT JOIN mau_sac ms ON spms.mau_sac_id = ms.id
        WHERE sp.masp = '$masp'
        GROUP BY sp.masp";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>


<div class="detail">
    <div class="grid wide">
        <div class="row">

            <div class="col l-6">
                <div class="detail-items">
                    <img src="./upload/<?php echo $row["img"] ?>" alt="" class="detail_items__imgs">
                </div>
            </div>
            <div class="col l-6">

                <div class="detail-items">
                    <h3 class="detail-items__heading"><?php echo $row["tensp"] ?></h3>
                    <p class="detail-items__code">Mã sp: <?php echo $row["masp"] ?></p>
                    <div class="detail-items__price">
                        <span class="detail-items__price-new"><?php echo $row["dongia"] ?>₫</span>
                        <span class="detail-items__price-old"><?php echo $row["dongiaold"] ?>₫</span>
                        <span class="detail-items__price-sale">Sale</span>
                    </div>
                    <div class="detail-items__support">
                        <div class="detail-items__support-gr">
                            <img src="assets/img/img_sup5.jpg" alt="" class="detail-items__support-gr-img">
                            <div class="detail-items__support-gr-info">
                                <h3 class="detail-items__support-gr-title">Miễn phí vận chuyển</h3>
                                <p class="detail-items__support-gr-msg">Cho đơn hàng từ 499.000₫</p>
                            </div>
                        </div>
                        <div class="detail-items__support-gr">
                            <img src="assets/img/img_sup6.jpg" alt="" class="detail-items__support-gr-img">
                            <div class="detail-items__support-gr-info">
                                <h3 class="detail-items__support-gr-title">Miễn phí đổi, sửa hàng</h3>
                                <p class="detail-items__support-gr-msg">Đổi hàng trong 30 ngày kể từ ngày mua , hỗ trợ
                                    sửa đổi miễn phí</p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-items__warehouse">
                        <p class="detail-items__warehouse-remaining"><strong>Kho hàng còn </strong>
                            : <?php echo $row["soluong"] ?> cái</p>
                    </div>
                    <!-- Hiển thị thuộc tính màu sắc cho sản phẩm -->
                    <p class="detail-items__properties"><strong>Màu sắc:</strong> <select name="mau_sac"
                            class="detail-items__select">
                            <?php
                            if (!empty($row["colors"])) {
                                $colors = explode(', ', $row["colors"]);
                                foreach ($colors as $color) {
                                    echo "<option value='$color'>$color</option>";
                                }
                            } else {
                                echo "<option disabled>Không có màu sắc</option>";
                            }
                            ?>
                        </select></p>

                    <!-- Hiển thị thuộc tính các size của sản phẩm -->

                    <p class="detail-items__properties"><strong>Size:</strong> <select name="size"
                            class="detail-items__select">
                            <?php
                            if (!empty($row["sizes"])) {
                                $sizes = explode(', ', $row["sizes"]);
                                foreach ($sizes as $size) {
                                    echo "<option value='$size'>$size</option>";
                                }
                            } else {
                                echo "<option disabled>Không có size</option>";
                            }
                            ?>
                        </select></p>

                    <form action="cart.php" method="post" class="">
                        <p class="detail-items__quantity-text">Số lượng: <input class="detail-items__quantity-num"
                                type="number" name="soluong" min="1" max="10" value="1"></p>

                        <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                        <input type="hidden" name="dongia" value="<?php echo $row["dongia"] ?>₫">
                        <input type="hidden" name="img" value="<?php echo $row["img"] ?>">
                        <input type="submit" value="Thêm vào giỏ hàng" name="addcart" class="detail-items__btn-cart">
                    </form>
                    <form action="cart.php" method="post" class="detail-items__btn">
                        <input type="hidden" name="soluong" value="1">
                        <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                        <input type="hidden" name="dongia" value="<?php echo $row["dongia"] ?>₫">
                        <input type="hidden" name="img" value="<?php echo $row["img"] ?>">
                        <input type="submit" value="Mua Ngay" name="addcart" class="detail-items__btn-buy">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<style>
.detail_items__imgs {
    width: 100%;
    height: auto;
    text-align: center;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
    border: 2px solid darkgrey;
    border-radius: 5px;
}


.detail-items__properties {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.detail-items__select {
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 20%;
    /* Để dropdown chiếm toàn bộ chiều rộng */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: border-color 0.3s;
}

.detail-items__select:focus {
    border-color: #007bff;
    /* Thay đổi màu viền khi focus */
    outline: none;
    /* Bỏ outline mặc định */
}

.detail-items__select option {
    padding: 10px;
    /* Padding cho option */
}
</style>