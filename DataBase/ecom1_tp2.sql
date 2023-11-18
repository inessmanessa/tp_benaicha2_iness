SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `address` (
  `id` bigint(20) NOT NULL,
  `street` varchar(50) NOT NULL,
  `street_nb` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `address`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

