-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2024 at 04:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', NULL, NULL),
(2, 'Laptop', NULL, NULL),
(6, 'Màn hình', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_12_155407_create_products_table', 2),
(6, '2024_07_12_155925_create_categories_table', 2),
(9, '2024_07_16_101115_create_carts_table', 3),
(10, '2024_07_16_101459_create_orders_table', 4),
(11, '2024_07_16_101910_create_order_items_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `product_quantity` int NOT NULL,
  `total_amount` int NOT NULL,
  `order_date` timestamp NOT NULL,
  `payment_method` enum('COD','ONLINE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Chờ xác nhận','Đã xác nhận','Đang giao hàng','Hoàn thành','Hủy đơn') COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_quantity`, `total_amount`, `order_date`, `payment_method`, `shipping_address`, `status`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 2, 75760000, '2024-07-20 07:50:02', 'COD', 'Nguyễn Sơn - banhsontv@gmail.com - 0973657594 - Thôn Đồng Trữ - sda', 'Chờ xác nhận', 1, NULL, NULL),
(2, 1, 7900000, '2024-07-20 07:54:24', 'COD', 'Nguyễn Sơn - anhsongoku123@gmail.com - 0973657594 - Thôn Đồng Trữ - dsa', 'Chờ xác nhận', 1, NULL, NULL),
(3, 2, 71760000, '2024-07-20 07:55:48', 'COD', 'Nguyễn Sơn 2 - sonnvph33874@fpt.edu.vn - 0973657594 - Thôn Đồng Trữ - sđsa', 'Chờ xác nhận', 1, NULL, NULL),
(4, 2, 75660000, '2024-07-20 08:53:30', 'COD', 'Nguyễn Sơn3 - anhsongoku123@gmail.com - 0973657594 - Thôn Đồng Trữ - hvg', 'Chờ xác nhận', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 19, 1, 15990000, NULL, NULL),
(2, 1, 24, 3, 19890000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `iddm` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `price`, `description`, `quantity`, `iddm`, `created_at`, `updated_at`) VALUES
(16, 'iPhone 11 128GB | Chính Hãng VN', '1721227171-iphone 11.jpg', 7900000, 'Sau khi iPhone 14 chính hãng lên kệ, giá iPhone 14 series xách tay liên tục giảm giá lên tới hơn chục triệu đồng', 22, 1, NULL, NULL),
(19, 'iPhone 13 128GB | Chính hãng VN/A', '1721227898-iphone 13 2.webp', 15990000, 'Sau khi iPhone 14 chính hãng lên kệ, giá iPhone 14 series xách tay liên tục giảm giá lên tới hơn chục triệu đồng', 29, 1, NULL, NULL),
(21, 'Acer Gaming 3 Pro | Chính hãng VietNam', '1721229777-acer gaming 1.webp', 29990000, 'Laptop Acer Nitro 5 chính hãng, giá rẻ, trả góp 0%, bảo hành 12 tháng, đổi mới 30 ngày. Mua laptop Gaming Acer Nitro 7, 5 giao nhanh tại đây!', 12, 2, NULL, NULL),
(22, 'Samsung Galaxy Z Fold5 12GB 256GB', '1721229880-galaxy-z-fold-5-kem-1.webp', 27790000, 'Samsung Galaxy Z Fold5 12GB 256GB - Hiệu năng vượt trội, thiết kế mỏng nhẹ hơn Samsung Galaxy Z Fold5 là phân khúc smartphone gập đáng được mong chờ nhất trong năm 2023 khi sở hữu thiết kế đột phá cùng nhiều tính năng ấn tượng. Với màn hình gập mở linh hoạt, Z Fold5 mang tới cho bạn trải nghiệm sử dụng của cả điện thoại thông minh lẫn máy tính bảng. Bên cạnh đó, máy còn đi kèm với nhiều tính năng công nghệ hàng đầu, sẵn sàng phục vụ được những yêu cầu sử dụng phức tạp của người dùng.  Update mới nhất: điện thoại gập thế hệ thứ 6 hay Samsung Z Fold 6 sẽ chính thức ra mắt đầu tháng 7/2024 với nâng cấp mạnh mẽ về phần cứng và tích hợp AI. Cùng CellphoneS liên tục cập nhật thông tin cấu hình, giá bán, ngày về hàng Z Fold 6 tại Việt Nam nhé!  Nâng tầm khả năng quay chụp với cụm camera lên tới 50MP Samsung Galaxy Z Fold5 nổi bật với khả năng quay chụp siêu sắc nét thông qua hệ thống máy ảnh với độ phân giải lên tới 50MP. Cụ thể, smartphone gập mới này được trang bị cụm 3 camera với độ sắc nét lần lượt là 50 + 10 + 12MP.', 9, 1, NULL, NULL),
(23, 'iPhone 13 Pro Max', '1721230311-iphone 13 pro max.jpg', 24690000, 'iPhone 13 Pro Max chắc chắn sẽ là chiếc smartphone cao cấp được quan tâm nhiều nhất trong năm 2021. Dòng iPhone 13 series được ra mắt vào ngày 14 tháng 9 năm 2021 tại sự kiện \"California Streaming\" diễn ra trực tuyến tương tự năm ngoái cùng với 3 phiên bản khác là iPhone 13, 13 mini và 13 Pro. Vậy điện thoại 13 Pro Max giá bao nhiêu? Có gì nổi bật? Cùng tìm hiểu ngay nhé!  Đánh giá thông số iPhone 13 Pro Max – Hiệu năng vô đối, camera cực đỉnh iPhone 12 ra mắt cách đây chưa lâu, thì những tin đồn mới nhất về iPhone 13 Pro Max đã khiến bao tín đồ công nghệ ngóng chờ. Cụm camera được nâng cấp, màu sắc mới, đặc biệt là màn hình 120Hz với phần notch được làm nhỏ gọn hơn chính là những điểm làm cho thu hút mọi sự chú ý trong năm nay.', 4, 1, NULL, NULL),
(24, 'iPhone 13 Trắng Đẹp 512GB', '1721230503-iphone 13.webp', 19890000, 'Thiết kế cạnh phẳng sang trọng, nhiều màu sắc nổi bật Dòng iPhone 12 được Apple áp dụng ngôn ngữ thiết kế tương tự iPhone 12 năm ngoái với phần cạnh viền máy được dát phẳng sang trọng cùng bốn góc được làm bo cong nhẹ, đây có thể được xem là một thiết kế hoài cổ từ dòng iPhone 5 trước đó. Vì thế mà iPhone 13 Pro Max nói riêng, cũng như dòng iPhone 13 nói chung, cũng sẽ đi theo ngôn ngữ thiết kế này.', 34, 1, NULL, NULL),
(25, 'iPhone 14 Pro Max', '1721230550-iphone 14 pro max.jpg', 21890000, 'Thiết kế cạnh phẳng sang trọng, nhiều màu sắc nổi bật Dòng iPhone 12 được Apple áp dụng ngôn ngữ thiết kế tương tự iPhone 12 năm ngoái với phần cạnh viền máy được dát phẳng sang trọng cùng bốn góc được làm bo cong nhẹ, đây có thể được xem là một thiết kế hoài cổ từ dòng iPhone 5 trước đó. Vì thế mà iPhone 13 Pro Max nói riêng, cũng như dòng iPhone 13 nói chung, cũng sẽ đi theo ngôn ngữ thiết kế này.', 5, 1, NULL, NULL),
(26, 'iPhone 14 Pro Trắng', '1721230606-iphone 14 pro.jpg', 19960000, 'Đánh giá iPhone 14 Plus - Siêu phẩm khẳng định đẳng cấp Ngoài ba phiên bản gồm iPhone 14 thường, bản Pro và Pro Max, năm nay Apple dự kiến sẽ cho ra thêm một phiên bản mới mang tên iPhone 14 Plus. Mặc dù điện thoại iPhone 15 Plus vừa ra măt, nhưng nhờ được tích hợp nhiều cải tiến nổi trội về phần cứng, iPhone 14 Plus vẫn sẽ là siêu phẩm khẳng định đẳng cấp smartphone hiện đại.  Thiết kế sang trọng, kích thước lớn hơn Đầu tiên, chúng ta sẽ thấy iPhone 14 Plus (cũng như toàn bộ series điện thoại iPhone 14) mang ngoại hình tương đồng với dòng iPhone 13 trước đó. Cụ thể, cạnh viền của máy sẽ được dát phẳng vuông vức và hoàn thiện từ thép không gỉ bền vững. Toàn bộ thân iPhone 14 Plus đều đạt chuẩn chống bụi và chống nước IP68, củng cố độ bền cao cấp cho thiết bị.', 53, 1, NULL, NULL),
(27, 'iPhone 15 Plus 128GB | Chính hãng VN/A', '1721230684-iphone-15-plus_1_.webp', 22590000, 'Tại sao nên mua iPhone 15 Plus tại CellphoneS? Khi chọn mua điện thoại cao cấp như iPhone 15 Plus thì chọn điểm mua uy tín là một yếu tố khá quan trọng. Vậy tại sao khách hàng nên chọn mua điện thoại flagship iPhone này tại CellphoneS:  - Đảm bảo hành chính hãng: Là một trong số ít những chuỗi bán lẻ chính hãng Apple chính hãng có sở hữu chuỗi trung tâm bảo hành chính hãng uỷ quyền Apple tại Việt Nam - CARES.vn. Nhờ đó, khách hàng mua hàng tại hệ thống có thể hoàn toàn yên tâm với chính sách bảo hành tại đây. Cụ thể sản phẩm Apple chính hãng hỗ trợ đổi mới 30 ngày đầu khi có lỗi từ nhà sản xuất. Cùng với đó là bảo hành 12 tháng tiện lợi và nhanh chóng tại các trung tâm bảo hành ủy quyền chính hãng CARES.vn  - Tham gia thu cũ lên đời – nhận thêm', 5, 1, NULL, NULL),
(28, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', '1721230785-iPhone 15 pro max 3.webp', 29490000, 'Đánh giá những ưu điểm nổi trội mới có mặt trên iPhone 15 Pro Max iPhone 15 Pro Max không chỉ ghi điểm với cấu hình mạnh mẽ mà còn gây ấn tượng với nhiều tính năng mới đáng chú ý. Từ thiết kế khung titan cho tới hiệu năng đột phá, tất cả đều được nâng cấp để mang tới cho người dùng trải nghiệm smartphone tuyệt vời chưa từng có. Những tính năng này sẽ được trình bày chi tiết hơn trong các phần bài viết dưới đây, giúp bạn có cái nhìn toàn diện về sự đột phá của iPhone 15 ProMax.  Kiểu dáng sang trọng, thời thượng với thiết kế Titan cực xịn Thiết kế titan dễ dàng thể hiện được nét đẳng cấp và sự tinh tế ngay từ vẻ bề ngoài của iPhone 15 Pro Max. Khung viền titan bóng bẩy của máy, được chế tác qua nhiều quy trình gia công cơ khí, chà nhám và đánh bóng, mang lại vẻ đẹp sang trọng và độ bền tuyệt vời. Với khung viền uốn cong và kiểu dáng siêu mỏng, thế hệ iPhone này đem lại trải nghiệm cầm nắm khá thoải mái.', 23, 1, NULL, NULL),
(29, 'Apple MacBook Air M1 256GB 2020', '1721230893-macbook_air_m2_1_1.webp', 18590000, 'Macbook Air M1 2020 - Sang trọng, tinh tế, hiệu năng khủng Macbook Air M1 là dòng sản phẩm có thiết kế mỏng nhẹ, sang trọng và tinh tế cùng với đó là giá thành phải chăng nên MacBook Air đã thu hút được đông đảo người dùng yêu thích và lựa chọn. Đây cũng là một trong những phiên bản Macbook Air mới nhất mà khách hàng không thể bỏ qua khi đến với CellphoneS. Dưới đây là chi tiết về thiết kế, cấu hình của máy.  Thiết kế tinh tế, chất liệu nhôm bền bỉ Macbook Air 2020 M1 mới vẫn luôn tuân thủ triết lý thiết kế với những đường nét đơn nhưng vô cùng sang trọng. Máy có độ mỏng nhẹ chỉ 1,29kg và các cạnh tràn viền khiến thiết bị trở nên đẹp hơn và cao cấp hơn.', 34, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Xuân Đại', 'daihoangxua0204@gmail.com', '2024-07-15 09:56:10', '123456789', NULL, '2024-07-16 09:56:10', '2024-07-16 09:56:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
