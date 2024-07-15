<?php include "headernguoidung.php"; ?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doanwebtqn";

// B1: Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("connection failer" . mysqli_connect_error());
}

// Lấy ds size
$size_sql = "SELECT * FROM size";
$size_result = mysqli_query($conn, $size_sql);

// Lấy ds màu sắc
$mau_sac_sql = "SELECT * FROM mau_sac";
$mau_sac_result = mysqli_query($conn, $mau_sac_sql);

// Lấy ds sản phẩm
$nhom_id = isset($_GET['nhom_id']) ? $_GET['nhom_id'] : 0;
$selected_size = isset($_GET['size_id']) ? $_GET['size_id'] : 0;
$selected_mau_sac = isset($_GET['mau_sac_id']) ? $_GET['mau_sac_id'] : 0;

$sql = "SELECT DISTINCT sp.* 
        FROM sanpham sp 
        LEFT JOIN sanpham_size sps ON sp.masp = sps.sanpham_id 
        LEFT JOIN sanpham_mau_sac spms ON sp.masp = spms.sanpham_id 
        WHERE sp.nhom_id = '$nhom_id'";

if ($selected_size) {
    $sql .= " AND sps.size_id = '$selected_size'";
}

if ($selected_mau_sac) {
    $sql .= " AND spms.mau_sac_id = '$selected_mau_sac'";
}

$sql .= " LIMIT 4";
$result = mysqli_query($conn, $sql);

?>

<div class="all">
    <div class="all-banner">
        <img src="assets/img/all.jpg" alt="all-banner" class="all-banner__img">
    </div>
    <div class="all-product">
        <div class="grid wide">
            <h3 class="product__heading">Sản Phẩm</h3>
            <!-- Lọc sản phẩm -->
            <form method="GET" action="">
                <input type="hidden" name="nhom_id" value="<?php echo $nhom_id; ?>">
                <div class="properties_product">
                    <select name="size_id" class="property size">
                        <option value="">Chọn Size</option>
                        <?php while ($size_row = mysqli_fetch_assoc($size_result)) { ?>
                        <option value="<?php echo $size_row['id']; ?>"
                            <?php echo $selected_size == $size_row['id'] ? 'selected' : ''; ?>>
                            <?php echo $size_row['size']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <select name="mau_sac_id" class="property color">
                        <option value="">Chọn Màu</option>
                        <?php while ($mau_sac_row = mysqli_fetch_assoc($mau_sac_result)) { ?>
                        <option value="<?php echo $mau_sac_row['id']; ?>"
                            <?php echo $selected_mau_sac == $mau_sac_row['id'] ? 'selected' : ''; ?>>
                            <?php echo $mau_sac_row['mau_sac']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <button type="submit" class="property">Lọc</button>
                </div>
            </form>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col l-2-4">
                    <div class="product__items">
                        <div class="product__items-wrap">
                            <a href="detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-wrap-link">
                                <img src="./upload/<?php echo $row["img"] ?>" alt="" class="product__items-img">
                            </a>
                            <form action="cart.php" method="post" class="product__items-cart">
                                <i class="product__items-cart-icon fa-solid fa-cart-plus"></i>
                                <input type="submit" value="Thêm vào giỏ hàng" name="addcart"
                                    class="product__items-more-cart">
                                <input type="hidden" name="soluong" value="1">
                                <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                <input type="hidden" name="dongia" value="<?php echo $row["dongia"] ?>₫">
                                <input type="hidden" name="img" value="<?php echo $row["img"] ?>">
                            </form>
                        </div>
                        <div class="product__items-links">
                            <a href="detail.php?masp=<?php echo $row["masp"] ?>"
                                class="product__items-name"><?php echo $row["tensp"] ?></a>
                        </div>
                        <div class="product__items-price">
                            <span class="product__items-price-old"><?php echo $row["dongiaold"] ?>₫</span>
                            <span class="product__items-price-new"><?php echo $row["dongia"] ?>₫</span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<style>
.properties_product {
    display: flex;
    gap: 15px;
    /* justify-content: center; */
    margin-top: 20px;
}

.property {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f5f5f5;
    color: #333;
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: all 0.3s ease;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
}

.property:hover {
    background-color: #007bff;
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.property.size {
    background-color: #e74c3c;
}

.property.color {
    background-color: #3498db;
}

.property.size:hover {
    background-color: #c0392b;
}

.property.color:hover {
    background-color: #2980b9;
}
</style>

<?php include "footernguoidung.php"; ?>