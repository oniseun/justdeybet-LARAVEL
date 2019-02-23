-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2019 at 06:40 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justdeybet`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_picture` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'a2000ea18fd6b202a4706540203c6555',
  `access_token` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `date_registered` timestamp NOT NULL,
  `last_activity` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type` enum('super_admin','admin','cashier') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `shop_name` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `can_create_tickets` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `can_add_games` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `can_update_scores` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `can_remove_games` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `can_play_games` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `suspended` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `user_picture`, `gender`, `username`, `password`, `access_token`, `email`, `phone`, `about`, `date_registered`, `last_activity`, `user_type`, `shop_name`, `display_name`, `can_create_tickets`, `can_add_games`, `can_update_scores`, `can_remove_games`, `can_play_games`, `suspended`) VALUES
(1, NULL, 'male', 'bruce', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$NuqqqtO51fOtvW4sVmxSgu/CwizBcBAmjTSmPzKfmWO19x7qhnp/S', 'bruce.oshak@rayfem.co.uk', '+447944468424', 'I am the super admin!', '2016-12-28 23:00:00', '2019-02-23 14:45:52', 'super_admin', 'bruce shop', 'bruce oshaks', 'yes', 'yes', 'yes', 'yes', 'yes', 'no'),
(2, NULL, 'female', 'titi', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$f/FSIfmIgbmbNXJu3H18FuWgruWV8wp2cX4eb0bP1UFJs3ZOWeA5m', 'titi@gmail.com', '08144059300', '', '2016-12-28 23:50:54', '2019-02-23 14:45:52', 'admin', NULL, 'Titi Odubela', 'no', 'yes', 'yes', 'yes', 'yes', 'no'),
(3, NULL, 'male', 'tolu', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$0VB/cfnv1QoVMAYPJWi12.IrCV8JKLR0ZoShYgK.beaCXKbZKy7zu', 'tolufalana@gmail.com', '08134565300', '', '2016-12-28 23:50:54', '2019-02-23 14:45:52', 'admin', NULL, 'Tolulope Falana', 'no', 'no', 'no', 'no', 'yes', 'no'),
(4, NULL, 'male', 'izuc', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$6VtBaK1qWs7IpGLVSQpmu.dqs0rj3wyfO6yYYODnmLqq2euQUmjti', 'izu@gmail.com', '08167059300', '', '2016-12-28 23:50:54', '2019-02-23 14:45:52', 'admin', NULL, 'izu chukwu', 'yes', 'no', 'no', 'no', 'yes', 'no'),
(5, NULL, 'male', 'osa', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$aGlBgS0qqqDc9cIzZnvHZuOefgeYxTWUjAN35OqKdGbPwuUmnIEoy', 'osa@gmail.com', '08154054300', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:52', 'admin', NULL, 'osa umweni', 'no', 'no', 'no', 'no', 'yes', 'no'),
(6, NULL, 'male', 'razaq', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$k.xKNvYvxj55mE0B7LYXVuG9Y1XBERoPw07c/G6XZzphKv9kdKBNu', 'razaq@gmail.com', '08134788300', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:52', 'admin', NULL, 'razaq', 'no', 'no', 'no', 'no', 'yes', 'no'),
(7, NULL, 'male', 'ik', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$6DButrFSkN66O0zAAzDxmeAHKf6Bis4cr8oywoqLT8PsjZdUJ/1ZC', 'ik@gmail.com', '08174059300', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:52', 'admin', NULL, 'osakioduwa umweni', 'no', 'no', 'no', 'no', 'yes', 'no'),
(8, NULL, 'female', 'chi', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$9fWiyvJDqNb2yK.BW0VvtO/k/GfW0xvWmWy.ZfnRhapRtXpQMi2Di', 'chi@gmail.com', '08134059388', '', '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', NULL, 'chi chi', 'no', 'no', 'no', 'no', 'yes', 'no'),
(9, NULL, 'male', 'kelechi', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$0v1M10489rAJ90A.6ZDsVun0lXG0VfvsH9CJJTeGlXIiDIOwoNWIO', 'kelechi@gmail.com', '08134859677', '', '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', NULL, 'kelechi igbo', 'no', 'no', 'no', 'no', 'yes', 'no'),
(10, NULL, 'male', 'wale', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$unwO/4fKyNK3Ra0H1PYvYeSGxZzVuvrUjnyPWSwsXosK09Fb0ANgG', 'wale@gmail.com', '08134045555', '', '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', '', 'mr wale', 'no', 'no', 'no', 'no', 'yes', 'no'),
(11, NULL, 'male', 'torty', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$L8qMVLJ2kbxWEkR0bL8CU.aIJB/a1M8ahP27kh6eIWxTKdLNmEYX2', 'torty@gmail.com', '08134563800', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', NULL, 'torty', 'no', 'no', 'no', 'no', 'yes', 'no'),
(12, NULL, 'male', 'collins', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$l/fZA/ucslmuYrUYx8aQcORHLhPT3QkuVVGLgYrXkPz9YH81rrbx2', 'collins@gmail.com', '08134052368', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', NULL, 'collins udeme', 'no', 'no', 'no', 'no', 'yes', 'no'),
(13, NULL, 'male', 'adams', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$9DOkC9igkQgrHYeyQwU4sOtxt4/gfVF2XkBOj./.FsmAOo0PcnL/G', 'adams@gmail.com', '08154987368', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', NULL, 'bakare adams', 'no', 'no', 'no', 'no', 'yes', 'no'),
(14, NULL, 'male', 'adedayo', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$2rSFweAtraHp/txQfXTUPOWYMVxD.45GY8aZbBBamIJVedQSC5wHa', 'adedayo@gmail.com', '08134023458', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', NULL, 'adeyeye adedayo', 'no', 'no', 'no', 'no', 'yes', 'no'),
(15, NULL, 'male', 'stephen', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$n0J4cj3BG071GoKB2RGWaOvShKQIc4KTqn4SAarWfL8citVNZ9b0m', 'stephen@gmail.com', '08098654458', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:53', 'admin', NULL, 'olayinka stephen', 'no', 'no', 'no', 'no', 'yes', 'no'),
(16, NULL, 'male', 'daniel', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$Ac.MqwgiWiJ4xL1h/VLeB.bfwIqPbb7Dof6hpLR1rWZyqWsIx03Mm', 'daniel@gmail.com', '08134286548', NULL, '2016-12-28 23:50:54', '2019-02-23 18:34:49', 'admin', NULL, 'abidoye daniel', 'no', 'no', 'no', 'no', 'yes', 'no'),
(17, NULL, 'male', 'akintunde', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$RHMreHMgilTOawWq5NWYl.t69RTiEb/lKFOVnCn5WGNw4Oz1yLgDS', 'akintunde@gmail.com', '08131866058', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:54', 'admin', NULL, 'akintunde akinkunmi', 'no', 'no', 'no', 'no', 'yes', 'no'),
(18, NULL, 'male', 'sirpee', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$8SAvODfi05WFDza1AByOzuplSHocMvIXTR5bHFRzw97FtvObdYsIm', 'sirpee@gmail.com', '08034023087', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:54', 'admin', NULL, 'falade pelumi', 'no', 'no', 'no', 'no', 'yes', 'no'),
(19, NULL, 'male', 'favor', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$9iv0LO7pV4eqMJrP5VxSt.zbFgmOmkdliB.lzcbdiBepaQTROlFl.', 'favor@gmail.com', '08073498245', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:54', 'admin', NULL, 'opeyemi Adeboye', 'no', 'no', 'no', 'no', 'yes', 'no'),
(20, NULL, 'male', 'ronke', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$wmuRyi4AlrY69RwWWuz3n.UC68oyqUHlCIAEX.Om.YpK7kxl6qzfG', 'ronke@gmail.com', '08173124245', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:54', 'admin', NULL, 'ronke joy', 'no', 'no', 'no', 'no', 'yes', 'no'),
(21, NULL, 'male', 'gabriel', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$3t0B8doRWHu3vuNfLJmA7urL51Md7pyytPxoJtAcEoWg2SawYh2DK', 'gabriel@gmail.com', '08183498208', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:54', 'admin', NULL, 'ajibaye gabriel', 'no', 'no', 'no', 'no', 'yes', 'no'),
(22, NULL, 'male', 'tunde', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$tNKH0NxWH0nIbCkryPtj6O4q8mj3P57lMvyB4VylxmLzykJ6XlS5C', 'tunde@gmail.com', '08134048780', '', '2016-12-28 23:50:54', '2019-02-23 18:36:32', 'cashier', '', 'tunde', 'no', 'no', 'no', 'no', 'yes', 'no'),
(23, NULL, 'male', 'edward', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$6ZXBbgyMKX77GV01Lxum3uApjAi8nG8D1fdJKFl/qIFr28.iqT7La', 'edward@gmail.com', '08134687543', '', '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', '', 'edward ezewele', 'yes', 'no', 'no', 'no', 'yes', 'yes'),
(24, NULL, 'male', 'chris', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$ljdN0dTMSwbtIpDMHm.KHORPJBOWL3I2ppgV1mN/ACxdU6pbjXLSC', 'chris@gmail.com', '08187648780', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', NULL, 'chris', 'no', 'no', 'no', 'no', 'yes', 'yes'),
(25, NULL, 'male', 'ayo', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$g3OJ/ZP3Hjpopklh1UTZ2eYqROa/IrSf.KJJTJhpewxWAhPi6OFki', 'ayo@gmail.com', '08134043420', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', NULL, 'ayo ajanaku', 'no', 'no', 'no', 'no', 'yes', 'no'),
(26, NULL, 'male', 'brown', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$UDo04P0uF.plDiatM35j5u0bhCSaJZVXQ3Q/f4evyEvvZGOtDPwmW', 'olakunle@gmail.com', '08134048865', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', NULL, 'olakunle brown', 'no', 'no', 'no', 'no', 'yes', 'no'),
(27, NULL, 'male', 'okanga', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$akkZglFkNIWrVzzAYQWZT.UHDGQ.UWuHED/xocEknzWbNofopmzHG', 'okanga@gmail.com', '08134048765', '', '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', '', 'okanga okanga', 'no', 'no', 'no', 'no', 'yes', 'no'),
(28, NULL, 'male', 'tommie', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$.2GALk/8tTf3e7BFLOUykuHGIx0tMBomR/nx7TItkuhsv4pASNTqa', 'tommie@gmail.com', '081345348780', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', NULL, 'akintomide seyi', 'no', 'no', 'no', 'no', 'yes', 'no'),
(29, NULL, 'male', 'uche', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$P8bMVUTiw3uMbJ09HZ3sH.HkpwFN20YMNot3Po4z2f.OjV7jv3Dtq', 'uche@gmail.com', '08134053579', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', NULL, 'uche duru', 'no', 'no', 'no', 'no', 'yes', 'no'),
(30, NULL, 'male', 'jide', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$S3B8KaSzk7iZFoqmbgWSleng8vTwYicEKjTPXR3/myq79RYJZJHP6', 'jide@gmail.com', '08145667780', '', '2016-12-28 23:50:54', '2019-02-23 14:45:55', 'cashier', '', 'jide alaka', 'no', 'no', 'no', 'no', 'yes', 'no'),
(31, NULL, 'male', 'lekan', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$mEkM4DgSMnajFJ2NtTs6Ie0L8OG8P51.KNaKe4SajaAUlgoFjAmbm', 'lekan@gmail.com', '08156739080', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:56', 'cashier', NULL, 'lekan animashaun', 'no', 'no', 'no', 'no', 'yes', 'no'),
(32, NULL, 'female', 'chidinma', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$N9CuoHmZI/3oHujBmLIvKuvEM594Zr9VgxqPX4y/arRYY04ZIMEau', 'chidinma@gmail.com', '08165435780', '', '2016-12-28 23:50:54', '2019-02-23 14:45:56', 'cashier', NULL, 'chidinma okeile', 'no', 'no', 'no', 'no', 'yes', 'no'),
(33, NULL, 'male', 'tosinayo', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$J9hb4P6NqtJQuU03rkqgrOnnE4hhxEzTT9sZWzKq4S.YzsjEjgQAS', 'tosinayo@gmail.com', '08134055559', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:56', 'cashier', NULL, 'tosin ayo', 'no', 'no', 'no', 'no', 'yes', 'no'),
(34, NULL, 'male', 'gbenga', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$B.NUyFyfGD6FOeFV2f3UV.X0.nChbtg9EKd8tKybxKzmhRzs9c0OG', 'adene@gmail.com', '08175495780', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:56', 'cashier', NULL, 'gbenga adene', 'no', 'no', 'no', 'no', 'yes', 'no'),
(35, NULL, 'male', 'ozone', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$6Wti6ghCib9UR9sy60uWIOBqXTMt4G8i3XhSPO4OYaGJ287xRgAAi', 'ozone@gmail.com', '08198654780', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:56', 'cashier', NULL, 'olanrewaju olubukola', 'no', 'no', 'no', 'no', 'yes', 'no'),
(36, NULL, 'male', 'kemiadeosun', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$tZv7Vs1qzn/i8YOrCyFIp.B6JfPaWVc3Ql5IyQG9E./MncqBk0Ilq', 'kemiadeosun@gmail.com', '08134743280', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:56', 'cashier', NULL, 'kemi adeosun', 'no', 'no', 'no', 'no', 'yes', 'no'),
(37, NULL, 'male', 'florence', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$bcd1M3KvkD8wlGSl4FYSWuEaw7E.sKoDtm84k8807ajMF2wc4uVTi', 'florence@gmail.com', '08134122280', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:57', 'cashier', NULL, 'ogunleye florence', 'no', 'no', 'no', 'no', 'yes', 'no'),
(38, NULL, 'male', 'florenceemma', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$CfP6VruV0Q1T0953RMN0NOKRHexN7ygMoYZ4uhAjJka.bzq8ulJhm', 'florenceemma@gmail.com', '08131073280', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:57', 'cashier', NULL, 'florence emmanuel', 'no', 'no', 'no', 'no', 'yes', 'no'),
(39, NULL, 'male', 'mabel', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$erhNHq5BLSlqrSjHcvlmqeFFCM6MnS2CAzvBM.cbO1gX1UJrT5iIm', 'mabel@gmail.com', '08131075370', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:57', 'cashier', NULL, 'olubunmi mabel', 'no', 'no', 'no', 'no', 'yes', 'no'),
(40, NULL, 'male', 'solomon', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$jaWuk1kTKH63/GznzI2hhOU/UqEAmQvTDFLpp4hEQy72FSuMFLPAu', 'solomon@gmail.com', '08076109980', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:57', 'cashier', NULL, 'solomon buchi', 'no', 'no', 'no', 'no', 'yes', 'no'),
(41, NULL, 'male', 'particular', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$2nwdS0qvr4hZj30D8P5UWORHRej8DqycA4HbZ/EOTNSSQOvVIusNW', 'particular@gmail.com', '08076122456', NULL, '2016-12-28 23:50:54', '2019-02-23 14:45:57', 'cashier', NULL, 'adelabu particular', 'no', 'no', 'no', 'no', 'yes', 'no'),
(42, NULL, 'male', 'aderire', '$2y$10$M6nS0pVek2Rhs/mcVWyd7OGIB4CudUSXpZorXmFclbTN6QMGZj2ce', '$2y$10$w1VtC2gomn7/M1JoM883YOFgNDbBT/kgyTJlmgr/X70eCpcQyFE8m', 'aderire@gmail.com', '08134059300', NULL, '2016-12-28 23:04:04', '2019-02-23 14:45:57', 'admin', NULL, 'Aderire Adeoti', 'no', 'no', 'no', 'no', 'yes', 'no'),
(43, NULL, 'male', 'rrghtr', '$2y$10$1A.rhoQvRCCSnPurFcaB2eUa3KGuKMD.BQDecHHxUz0VrbuIZCUWu', '$2y$10$sAPI5PqUYPHf4X5iTU.cdeVsOtKduNOKGvhl3kynXlwGwRY1Ondee', 'rtgrtgrt', NULL, 'retgrtgtrgs', '2019-02-23 17:37:21', '2019-02-23 17:37:21', 'admin', NULL, 'rtgrtg', 'yes', 'yes', 'no', 'no', 'yes', 'no'),
(44, NULL, 'female', 'rtrt', '$2y$10$3g1P1IcX8LUhRWAj3XAb.u5hGqdWiInfXxwetmAvBWP1ZwdRrCbRu', '$2y$10$XF.hYNIIygzpfzti.YsQlOaPGcOuSAF0x6W7McrY0SL19FN2p4FdG', 'rgr', NULL, 'gr', '2019-02-23 17:37:33', '2019-02-23 17:37:33', 'cashier', NULL, 'rtgrt', 'yes', 'yes', 'no', 'no', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text,
  `action_user_id` int(10) DEFAULT NULL,
  `action_type` varchar(30) NOT NULL,
  `action_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `IP` varchar(25) DEFAULT NULL,
  `UA` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `comment`, `action_user_id`, `action_type`, `action_date`, `username`, `IP`, `UA`) VALUES
(1, 'Updated own profile ', 1, 'profile_update', '2016-12-29 20:30:50', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(2, 'Updated own profile ', 1, 'profile_update', '2016-12-29 20:30:55', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(3, 'Successfully updated game scores :Enyimba v stoke city', 1, 'game_scores_update', '2016-12-29 20:40:32', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(4, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:42:33', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(5, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:45:19', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(6, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:46:51', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(7, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:48:24', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(8, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:51:04', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(9, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:52:16', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(10, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:52:18', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(11, 'Successfully updated game scores :sporing lisbon v tottenham', 1, 'game_scores_update', '2016-12-29 20:52:22', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(12, 'Played 6 games for seun oni with ticket:FOP2IXCS', 1, 'played_game', '2016-12-30 20:19:47', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(13, 'Played 5 games for VICTOR ONI with ticket:F76MU1L2', 1, 'played_game', '2016-12-30 20:24:48', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(14, 'Successfully updated game scores :arsenal v chelsea', 1, 'game_scores_update', '2016-12-30 20:28:08', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(15, 'Successfully updated game scores :ludogorets v basel', 1, 'game_scores_update', '2016-12-30 20:56:10', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(16, 'Successfully updated game scores :bayern v celtic', 1, 'game_scores_update', '2016-12-30 20:56:43', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(17, 'Removed game :Enyimba v stoke city', 1, 'game_removal', '2016-12-30 21:02:27', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(18, 'Successfully updated game scores :juventus v monaco', 1, 'game_scores_update', '2016-12-30 22:46:45', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(19, 'Successfully updated game scores :Atletico madrid v torino', 1, 'game_scores_update', '2016-12-30 22:47:12', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(20, 'Successfully paid out 200000 to F76MU1L2', 1, 'paid_out_ticket', '2016-12-30 23:18:05', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(21, 'Played 5 games for VICTOR ONI with ticket:QK7YTA9L', 1, 'played_game', '2016-12-30 23:21:02', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(22, 'Cancelled ticket QK7YTA9L', 1, 'ticket_cancel', '2016-12-31 00:27:22', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(23, 'Played 5 games for VICTOR ONI with ticket:5Z7DXTWO', 1, 'played_game', '2016-12-31 00:29:27', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(24, 'Played 5 games for VICTOR ONI with ticket:IU75F92A', 1, 'played_game', '2016-12-31 00:30:13', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(25, 'Played 5 games for VICTOR OLUWASEUN ONI with ticket:SLVPBF7M', 1, 'played_game', '2016-12-31 00:30:59', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(26, 'Updated admin permissions for izu chukwu ', 1, 'admin_permission', '2016-12-31 01:42:09', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(27, 'Updated cashier permissions for edward ezewele ', 1, 'cashier_permission', '2016-12-31 01:44:05', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(28, 'Successfully updated game scores :kano pillars v portsmouth', 1, 'game_scores_update', '2017-01-02 22:56:58', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(29, 'logged out of the system', 1, 'logged_out', '2017-01-02 23:18:25', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(30, 'logged out of the system', 1, 'logged_out', '2017-01-02 23:22:26', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(31, 'Reactivated admin :Titi Odubela', 1, 'admin_reactivation', '2017-01-02 23:33:27', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(32, 'Updated own profile ', 1, 'profile_update', '2017-01-02 23:55:01', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(33, 'changed password for bruce oshaks ', 1, 'password_change', '2017-01-02 23:56:23', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(34, 'changed password for bruce oshaks ', 1, 'password_change', '2017-01-02 23:57:30', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(35, 'logged out of the system', 1, 'logged_out', '2017-01-09 13:43:08', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(36, 'Added inter vs ac milan to games', 2, 'game_add', '2017-01-09 20:17:49', 'admin : Titi Odubela', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(37, 'Removed game :inter v ac milan', 2, 'game_removal', '2017-01-09 20:22:47', 'admin : Titi Odubela', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(38, 'logged out of the system', 2, 'logged_out', '2017-01-10 17:14:35', 'admin : Titi Odubela', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(39, 'logged out of the system', 1, 'logged_out', '2017-01-10 17:23:04', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(40, 'logged out of the system', 2, 'logged_out', '2017-01-11 17:59:04', 'admin : Titi Odubela', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(41, 'Successfully paid out 750000 to 5Z7DXTWO', 1, 'paid_out_ticket', '2017-01-11 18:02:09', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(42, 'Played 3 games for VICTOR ONI 23 with ticket:7VXCB09Q', 1, 'played_game', '2017-01-11 18:47:36', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(43, 'Played 3 games for 30 VICTOR OLUWASEUN ONI with ticket:JTXEHANF', 1, 'played_game', '2017-01-11 18:48:46', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(44, 'Played 3 games for 900 VICTOR OLUWASEUN ONI with ticket:SPI1BY99', 1, 'played_game', '2017-01-11 18:49:26', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(45, 'Updated info for tunde', 1, 'account_info_update', '2017-01-15 14:12:09', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(46, 'Updated info for edward ezewele', 1, 'account_info_update', '2017-01-15 14:12:16', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(47, 'Updated info for okanga okanga', 1, 'account_info_update', '2017-01-15 14:12:21', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(48, 'Updated info for jide alaka', 1, 'account_info_update', '2017-01-15 14:12:27', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(49, 'Updated info for razaq', 1, 'account_info_update', '2017-01-15 14:13:10', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(50, 'Updated admin permissions for osakioduwa umweni ', 1, 'admin_permission', '2017-01-15 14:13:15', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(51, 'Updated info for mr wale', 1, 'account_info_update', '2017-01-15 14:13:20', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(52, 'Successfully updated game scores :bayern v celtic', 1, 'game_scores_update', '2017-01-16 16:38:08', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(53, 'Successfully updated game scores :bayern v celtic', 1, 'game_scores_update', '2017-01-16 16:38:37', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(54, 'Successfully updated game scores :ludogorets v basel', 1, 'game_scores_update', '2017-01-16 16:39:11', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'),
(55, 'Successfully updated game scores :man city v valencia ', 1, 'game_scores_update', '2019-02-23 02:11:17', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(56, 'Successfully updated game scores :Porto v rubin kazan ', 1, 'game_scores_update', '2019-02-23 02:11:38', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(57, 'Played 3 games for Oni Victor Oluwaseun with ticket:  IJQ1CWMR', 1, 'played_game', '2019-02-23 02:22:44', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(58, 'Added Barcelona vs  Lyon to games', 1, 'game_add', '2019-02-23 02:32:44', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(59, 'Added Chelsea vs  Man utd to games', 1, 'game_add', '2019-02-23 02:37:56', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(60, 'Played 3 games for Oni Victor Oluwaseun with ticket:  SLOCOT4O', 1, 'played_game', '2019-02-23 02:41:55', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(61, 'Successfully canceled ticket: IJQ1CWMR ', 1, 'ticket_cancel', '2019-02-23 04:17:31', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(62, 'Successfully updated game scores :Lyon v Leceister ', 1, 'game_scores_update', '2019-02-23 04:18:13', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(63, 'Successfully updated game scores :real madrid v arsenal ', 1, 'game_scores_update', '2019-02-23 04:18:23', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(64, 'Successfully updated game scores :Barcelona v Lyon ', 1, 'game_scores_update', '2019-02-23 04:18:30', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(65, 'Successfully updated game scores :Chelsea v Man utd ', 1, 'game_scores_update', '2019-02-23 04:18:39', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(66, 'Successfully canceled ticket: SPI1BY99 ', 1, 'ticket_cancel', '2019-02-23 04:19:06', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(67, 'Successfully paid out N 100000 to  SLOCOT4O ', 1, 'paid_out_ticket', '2019-02-23 04:23:56', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(68, 'Updated Info for :razaq  ', 1, 'account_info_update', '2019-02-23 12:19:31', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(69, 'Updated Permission for : izu chukwu  ', 1, 'account_permission_update', '2019-02-23 12:25:58', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(70, 'Updated Permission for : izu chukwu  ', 1, 'account_permission_update', '2019-02-23 12:26:06', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(71, 'Updated Permission for : izu chukwu  ', 1, 'account_permission_update', '2019-02-23 12:26:09', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(72, 'Updated Permission for : izu chukwu  ', 1, 'account_permission_update', '2019-02-23 12:26:12', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(73, 'Updated Password for : torty  ', 1, 'account_password_update', '2019-02-23 12:29:38', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(74, 'Updated own profile ', 1, 'profile_update', '2019-02-23 13:29:47', 'super_admin : bruce oshak', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(75, 'Successfully changed own password ', 1, 'password_update', '2019-02-23 13:30:03', 'super_admin : bruce oshak', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(76, 'Updated own profile ', 1, 'profile_update', '2019-02-23 13:31:06', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(77, 'Successfully suspended tunde ', 1, 'cashier_suspension', '2019-02-23 14:17:34', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(78, 'Successfully suspended chris ', 1, 'cashier_suspension', '2019-02-23 14:24:28', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(79, 'logged out of the system', 1, 'logged_out', '2019-02-23 15:58:37', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(80, 'logged out of the system', 1, 'logged_out', '2019-02-23 16:03:46', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(81, 'logged into the system', 1, 'logged_in', '2019-02-23 16:03:50', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(82, 'logged out of the system', 1, 'logged_out', '2019-02-23 17:19:59', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(83, 'logged into the system', 1, 'logged_in', '2019-02-23 17:20:04', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(84, 'Successfully reactivated abidoye daniel ', 1, 'admin_reactivation', '2019-02-23 18:34:50', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(85, 'Successfully reactivated tunde ', 1, 'cashier_reactivation', '2019-02-23 18:36:32', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(86, 'Added rtgrtg to admin list', 1, 'admin_add', '2019-02-23 18:37:21', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(87, 'Added rtgrt to Cashier list', 1, 'cashier_add', '2019-02-23 18:37:33', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36'),
(88, 'Played 3 games for Oni Victor Oluwaseun with ticket:  PZC2544A', 1, 'played_game', '2019-02-23 18:38:16', 'super_admin : bruce oshaks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `sn` bigint(20) NOT NULL,
  `full_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`sn`, `full_name`, `email`, `comment`, `date_created`) VALUES
(1, 'Oni Victor Oluwaseun', 'seunoni34@gmail.com', 'kniononon', '2019-02-23 15:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` bigint(20) NOT NULL,
  `creator_id` bigint(20) NOT NULL,
  `game_status` enum('played','not-played','cancelled','postponed') COLLATE utf8_unicode_ci DEFAULT 'not-played',
  `season` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `league` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `match_stage` varchar(65) COLLATE utf8_unicode_ci DEFAULT 'n/a',
  `home_team` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `home_score` int(3) DEFAULT NULL,
  `away_team` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `away_score` int(3) DEFAULT NULL,
  `match_venue` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `match_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `home_win` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `away_win` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `draw` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `score_margin` int(2) NOT NULL DEFAULT '0',
  `deleted` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `creator_id`, `game_status`, `season`, `league`, `match_stage`, `home_team`, `home_score`, `away_team`, `away_score`, `match_venue`, `match_date`, `date_updated`, `home_win`, `away_win`, `draw`, `score_margin`, `deleted`) VALUES
(23, 1, 'not-played', NULL, NULL, 'n/a', 'chelsea', NULL, 'man city', NULL, NULL, '2017-02-09 00:00:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(24, 1, 'not-played', NULL, NULL, 'n/a', 'man utd', NULL, 'arsenal', NULL, NULL, '2017-02-08 23:02:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(25, 1, 'played', NULL, NULL, 'n/a', 'arsenal', 7, 'chelsea', 1, NULL, '2016-12-08 23:00:00', '2016-12-30 20:28:08', 'yes', 'no', 'no', 6, 'no'),
(26, 1, 'not-played', NULL, NULL, 'n/a', 'Ac milan', NULL, 'genoa', NULL, NULL, '2017-02-08 23:02:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(27, 1, 'not-played', NULL, NULL, 'n/a', 'Inter', NULL, 'liverpool', NULL, NULL, '2016-11-08 23:00:02', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(28, 1, 'played', NULL, NULL, 'n/a', 'Lyon', 3, 'Leceister', 3, NULL, '2017-02-09 01:00:00', '2019-02-23 03:18:13', 'no', 'no', 'yes', 0, 'no'),
(29, 1, 'not-played', NULL, NULL, 'n/a', 'Barcelona', NULL, 'marseile', NULL, NULL, '2016-11-08 23:02:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(30, 1, 'played', NULL, NULL, 'n/a', 'real madrid', 3, 'arsenal', 0, NULL, '2017-02-09 02:00:00', '2019-02-23 03:18:23', 'yes', 'no', 'no', 3, 'no'),
(31, 1, 'not-played', NULL, NULL, 'n/a', 'liverpool', NULL, 'bournemouth', NULL, NULL, '2016-11-08 23:02:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(32, 1, 'played', NULL, NULL, 'n/a', 'man city', 3, 'valencia', 0, NULL, '2017-02-09 03:00:00', '2019-02-23 01:11:17', 'yes', 'no', 'no', 3, 'no'),
(33, 1, 'played', NULL, NULL, 'n/a', 'Atletico madrid', 3, 'torino', 0, NULL, '2016-11-09 04:00:00', '2016-12-30 22:47:12', 'yes', 'no', 'no', 3, 'no'),
(34, 1, 'not-played', NULL, NULL, 'n/a', 'Sevilla', NULL, 'liverpool', NULL, NULL, '2017-02-09 01:00:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(35, 1, 'not-played', NULL, NULL, 'n/a', 'PSG', NULL, 'man utd', NULL, NULL, '2016-11-08 23:20:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(36, 1, 'played', NULL, NULL, 'n/a', 'Enyimba', 0, 'stoke city', 0, NULL, '2017-02-08 23:20:00', '2016-12-30 21:02:27', 'no', 'no', 'no', 0, 'yes'),
(37, 1, 'played', NULL, NULL, 'n/a', 'kano pillars', 3, 'portsmouth', 1, NULL, '2016-11-09 02:00:00', '2017-01-02 22:56:58', 'yes', 'no', 'no', 2, 'no'),
(38, 1, 'not-played', NULL, NULL, 'n/a', 'sunshine stars', NULL, 'shooting stars', NULL, NULL, '2017-02-08 23:00:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(39, 1, 'not-played', NULL, NULL, 'n/a', 'ajax', NULL, 'feyenoord', NULL, NULL, '2016-11-09 00:00:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(40, 1, 'played', NULL, NULL, 'n/a', 'sporing lisbon', 4, 'tottenham', 2, NULL, '2017-02-08 23:30:00', '2016-12-29 20:51:04', 'yes', 'no', 'no', 2, 'no'),
(41, 1, 'played', NULL, NULL, 'n/a', 'Porto', 4, 'rubin kazan', 0, NULL, '2016-11-08 23:20:00', '2019-02-23 01:11:38', 'yes', 'no', 'no', 4, 'no'),
(42, 1, 'played', NULL, NULL, 'n/a', 'juventus', 2, 'monaco', 0, NULL, '2017-02-08 23:00:00', '2016-12-30 22:46:45', 'yes', 'no', 'no', 2, 'no'),
(43, 1, 'played', NULL, NULL, 'n/a', 'benfica', 2, 'napoli', 0, NULL, '2016-11-09 02:00:00', '2019-02-23 01:05:30', 'yes', 'no', 'no', 2, 'no'),
(44, 1, 'played', NULL, NULL, 'n/a', 'bayern', 3, 'celtic', 1, NULL, '2017-02-08 23:00:00', '2017-01-16 16:38:37', 'yes', 'no', 'no', 2, 'no'),
(45, 1, 'not-played', NULL, NULL, 'n/a', 'dortmond', NULL, 'PSV', NULL, NULL, '2016-11-08 23:00:00', '0000-00-00 00:00:00', 'no', 'no', 'no', 0, 'no'),
(46, 1, 'played', NULL, NULL, 'n/a', 'ludogorets', 4, 'basel', 2, NULL, '2017-02-08 23:00:00', '2017-01-16 16:39:11', 'yes', 'no', 'no', 2, 'no'),
(47, 2, 'not-played', '', '', '', 'inter', NULL, 'ac milan', NULL, '', '2017-01-10 23:00:00', '2017-01-09 20:22:47', 'no', 'no', 'no', 0, 'yes'),
(48, 1, 'played', '2nd', 'CL', 'Round of 16', 'Barcelona', 3, 'Lyon', 0, 'Camp nou', '2019-02-23 23:00:00', '2019-02-23 03:18:30', 'yes', 'no', 'no', 3, 'no'),
(49, 1, 'played', NULL, NULL, NULL, 'Chelsea', 3, 'Man utd', 0, NULL, '2019-02-17 23:00:00', '2019-02-23 03:18:38', 'yes', 'no', 'no', 3, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `played_games`
--

CREATE TABLE `played_games` (
  `ID` int(4) NOT NULL,
  `game_id` bigint(20) NOT NULL,
  `ticket_id` varchar(15) NOT NULL,
  `creator_id` bigint(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `home_score` int(2) NOT NULL,
  `away_score` int(2) NOT NULL,
  `user_agent` text NOT NULL,
  `home_win` enum('yes','no') NOT NULL DEFAULT 'no',
  `away_win` enum('yes','no') NOT NULL DEFAULT 'no',
  `draw` enum('yes','no') NOT NULL DEFAULT 'no',
  `score_margin` int(2) NOT NULL DEFAULT '0',
  `points_won` int(2) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `played` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `played_games`
--

INSERT INTO `played_games` (`ID`, `game_id`, `ticket_id`, `creator_id`, `ip_address`, `home_score`, `away_score`, `user_agent`, `home_win`, `away_win`, `draw`, `score_margin`, `points_won`, `date_created`, `date_updated`, `played`) VALUES
(1, 42, 'F76MU1L2', 1, '127.0.0.1', 2, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 2, 7, '2016-12-30 20:24:47', '2016-12-30 23:08:18', 'yes'),
(2, 44, 'F76MU1L2', 1, '127.0.0.1', 3, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 2, 7, '2016-12-30 20:24:47', '2017-01-16 16:38:37', 'yes'),
(3, 46, 'F76MU1L2', 1, '127.0.0.1', 4, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 2, 7, '2016-12-30 20:24:47', '2017-01-16 16:39:11', 'yes'),
(4, 25, 'F76MU1L2', 1, '127.0.0.1', 7, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 6, 7, '2016-12-30 20:24:47', '0000-00-00 00:00:00', 'yes'),
(5, 33, 'F76MU1L2', 1, '127.0.0.1', 3, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 3, 7, '2016-12-30 20:24:47', '2016-12-30 23:08:52', 'yes'),
(11, 23, 'QK7YTA9L', 1, '127.0.0.1', 0, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2016-12-30 23:21:02', '0000-00-00 00:00:00', 'no'),
(12, 24, 'QK7YTA9L', 1, '127.0.0.1', 1, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2016-12-30 23:21:02', '0000-00-00 00:00:00', 'no'),
(13, 26, 'QK7YTA9L', 1, '127.0.0.1', 2, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 2, 32, '2016-12-30 23:21:02', '0000-00-00 00:00:00', 'yes'),
(14, 38, 'QK7YTA9L', 1, '127.0.0.1', 2, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 2, 0, '2016-12-30 23:21:02', '0000-00-00 00:00:00', 'no'),
(15, 37, 'QK7YTA9L', 1, '127.0.0.1', 2, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 1, 1, '2016-12-30 23:21:02', '2017-01-02 22:56:58', 'yes'),
(16, 28, '5Z7DXTWO', 1, '127.0.0.1', 1, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 1, 0, '2016-12-31 00:29:26', '2019-02-23 04:18:13', 'yes'),
(17, 34, '5Z7DXTWO', 1, '127.0.0.1', 1, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 2, 0, '2016-12-31 00:29:26', '0000-00-00 00:00:00', 'no'),
(18, 23, '5Z7DXTWO', 1, '127.0.0.1', 1, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2016-12-31 00:29:26', '0000-00-00 00:00:00', 'no'),
(19, 24, '5Z7DXTWO', 1, '127.0.0.1', 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2016-12-31 00:29:26', '0000-00-00 00:00:00', 'no'),
(20, 26, '5Z7DXTWO', 1, '127.0.0.1', 1, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 32, '2016-12-31 00:29:27', '0000-00-00 00:00:00', 'no'),
(21, 28, 'IU75F92A', 1, '127.0.0.1', 1, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 3, 0, '2016-12-31 00:30:13', '2019-02-23 04:18:13', 'yes'),
(22, 34, 'IU75F92A', 1, '127.0.0.1', 0, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 2, 0, '2016-12-31 00:30:13', '0000-00-00 00:00:00', 'no'),
(23, 23, 'IU75F92A', 1, '127.0.0.1', 1, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2016-12-31 00:30:13', '0000-00-00 00:00:00', 'no'),
(24, 24, 'IU75F92A', 1, '127.0.0.1', 1, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 1, 0, '2016-12-31 00:30:13', '0000-00-00 00:00:00', 'no'),
(25, 26, 'IU75F92A', 1, '127.0.0.1', 4, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 3, 0, '2016-12-31 00:30:13', '0000-00-00 00:00:00', 'no'),
(26, 32, 'SLVPBF7M', 1, '127.0.0.1', 2, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 1, -1, '2016-12-31 00:30:59', '2019-02-23 02:11:17', 'yes'),
(27, 30, 'SLVPBF7M', 1, '127.0.0.1', 4, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 2, 1, '2016-12-31 00:30:59', '2019-02-23 04:18:23', 'yes'),
(28, 28, 'SLVPBF7M', 1, '127.0.0.1', 2, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'yes', 'no', 'no', 1, 0, '2016-12-31 00:30:59', '2019-02-23 04:18:13', 'yes'),
(29, 34, 'SLVPBF7M', 1, '127.0.0.1', 2, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2016-12-31 00:30:59', '0000-00-00 00:00:00', 'no'),
(30, 23, 'SLVPBF7M', 1, '127.0.0.1', 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2016-12-31 00:30:59', '0000-00-00 00:00:00', 'no'),
(31, 32, '7VXCB09Q', 1, '127.0.0.1', 2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2017-01-11 18:47:36', '2019-02-23 02:11:17', 'yes'),
(32, 30, '7VXCB09Q', 1, '127.0.0.1', 2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2017-01-11 18:47:36', '2019-02-23 04:18:23', 'yes'),
(33, 28, '7VXCB09Q', 1, '127.0.0.1', 1, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2017-01-11 18:47:36', '2019-02-23 04:18:13', 'yes'),
(34, 32, 'JTXEHANF', 1, '127.0.0.1', 2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2017-01-11 18:48:46', '2019-02-23 02:11:17', 'yes'),
(35, 30, 'JTXEHANF', 1, '127.0.0.1', 2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2017-01-11 18:48:46', '2019-02-23 04:18:23', 'yes'),
(36, 28, 'JTXEHANF', 1, '127.0.0.1', 1, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2017-01-11 18:48:46', '2019-02-23 04:18:13', 'yes'),
(37, 32, 'SPI1BY99', 1, '127.0.0.1', 2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2017-01-11 18:49:26', '2019-02-23 02:11:17', 'yes'),
(38, 30, 'SPI1BY99', 1, '127.0.0.1', 2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2017-01-11 18:49:26', '2019-02-23 04:18:23', 'yes'),
(39, 28, 'SPI1BY99', 1, '127.0.0.1', 1, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2017-01-11 18:49:26', '2019-02-23 04:18:13', 'yes'),
(47, 30, 'IJQ1CWMR', 1, '127.0.0.1', 1, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'yes', 'no', 'no', 1, 1, '2019-02-23 01:22:44', '2019-02-23 04:18:23', 'yes'),
(48, 28, 'IJQ1CWMR', 1, '127.0.0.1', 2, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'yes', 'no', 'no', 2, 0, '2019-02-23 01:22:44', '2019-02-23 04:18:13', 'yes'),
(49, 34, 'IJQ1CWMR', 1, '127.0.0.1', 2, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'yes', 'no', 'no', 2, 0, '2019-02-23 01:22:44', '2019-02-23 01:22:44', 'no'),
(50, 48, 'SLOCOT4O', 1, '127.0.0.1', 3, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'yes', 'no', 'no', 3, 7, '2019-02-23 01:41:55', '2019-02-23 04:18:30', 'yes'),
(51, 30, 'SLOCOT4O', 1, '127.0.0.1', 3, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'yes', 'no', 'no', 3, 7, '2019-02-23 01:41:55', '2019-02-23 04:18:23', 'yes'),
(52, 28, 'SLOCOT4O', 1, '127.0.0.1', 3, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'no', 'no', 'yes', 0, 7, '2019-02-23 01:41:55', '2019-02-23 04:18:13', 'yes'),
(53, 34, 'PZC2544A', 1, '127.0.0.1', 0, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'no', 'yes', 'no', 1, 0, '2019-02-23 17:38:15', '2019-02-23 17:38:15', 'no'),
(54, 23, 'PZC2544A', 1, '127.0.0.1', 0, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'no', 'no', 'yes', 0, 0, '2019-02-23 17:38:16', '2019-02-23 17:38:16', 'no'),
(55, 24, 'PZC2544A', 1, '127.0.0.1', 8, 6, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', 'yes', 'no', 'no', 2, 0, '2019-02-23 17:38:16', '2019-02-23 17:38:16', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ticket_id` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `max_usage` int(2) NOT NULL DEFAULT '6',
  `usage_count` int(2) NOT NULL DEFAULT '0',
  `serial_number` bigint(20) DEFAULT NULL,
  `full_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `paid_out` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `amount_paid_out` int(11) DEFAULT '0',
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ID`, `created_by`, `date_created`, `ticket_id`, `amount`, `max_usage`, `usage_count`, `serial_number`, `full_name`, `email`, `phone`, `phone2`, `address`, `paid_out`, `amount_paid_out`, `gender`, `cancelled`) VALUES
(1, 1, '2016-12-30 20:24:48', 'F76MU1L2', 20000, 6, 5, 588069509730, 'victor ipegba', 'seunoni34@gmail.com', '08169005109', '', 'Futa\nFayan Street', 'yes', 200000, NULL, 'no'),
(3, 1, '2016-12-30 23:21:02', 'QK7YTA9L', 30000, 6, 5, 727357928480, 'Adejola samuel', 'seunoni34@gmail.com', '08169005109', '', 'Futa\nFayan Street', 'no', 0, NULL, 'yes'),
(4, 1, '2016-12-31 00:29:27', '5Z7DXTWO', 15000, 6, 5, 564286378931, 'Aderomu isaac', 'seunoni34@gmail.com', '08169005109', '', 'Futa\nFayan Street', 'yes', 750000, NULL, 'no'),
(5, 1, '2016-12-31 00:30:13', 'IU75F92A', 12000, 6, 5, 641865887369, 'ola doyin', 'seunoni34@gmail.com', '08169005109', '', 'Futa\nFayan Street', 'no', 0, NULL, 'no'),
(6, 1, '2016-12-31 00:30:59', 'SLVPBF7M', 30000, 6, 5, 508474728394, 'toju tina', 'seunoni34@gmail.com', '08169005109', '', 'Futa\nFayan Street', 'no', 0, NULL, 'no'),
(7, 1, '2017-01-11 18:47:36', '7VXCB09Q', 45000, 6, 3, 529075296145, 'VICTOR ONI 23', 'seunoni34@gmail.com', '08169005109', '', 'Futa\nFayan Street', 'no', 0, NULL, 'no'),
(8, 1, '2017-01-11 18:48:46', 'JTXEHANF', 3400, 6, 3, 689470938643, '30 VICTOR OLUWASEUN ONI', 'seunoni34@gmail.com', '08083207679', '', 'Futa\nFayan Street', 'no', 0, NULL, 'no'),
(9, 1, '2017-01-11 18:49:26', 'SPI1BY99', 45000, 6, 3, 609286725366, '900 VICTOR OLUWASEUN ONI', 'seunoni34@gmail.com', '+23481690051', '', 'Futa\nFayan Street', 'no', 0, NULL, 'yes'),
(10, 1, '2019-02-23 01:22:44', 'IJQ1CWMR', 10000, 6, 3, 460579329842, 'Oni Victor Oluwaseun', 'seunoni34@gmail.com', '8169005109', NULL, 'No 10, saka oluguna str, off mobil road , maroko, Ilaje, Ajah, Lagos Island', 'no', 0, NULL, 'no'),
(11, 1, '2019-02-23 01:41:55', 'SLOCOT4O', 10000, 6, 3, 741271658890, 'Oni Victor Oluwaseun', 'seunoni34@gmail.com', '8169005109', NULL, 'No 10, saka oluguna str, off mobil road , maroko, Ilaje, Ajah, Lagos Island', 'no', 100000, NULL, 'no'),
(12, 1, '2019-02-23 17:38:16', 'PZC2544A', 10000, 6, 3, 687187147926, 'Oni Victor Oluwaseun', 'seunoni34@gmail.com', '8169005109', NULL, 'No 10, saka oluguna str, off mobil road , maroko, Ilaje, Ajah, Lagos Island', 'no', 0, NULL, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `played_games`
--
ALTER TABLE `played_games`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `game_id` (`game_id`,`ticket_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `sn` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `played_games`
--
ALTER TABLE `played_games`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
