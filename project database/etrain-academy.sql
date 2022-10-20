-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 10:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etrain-academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Front-End Web', '2022-10-12 14:32:17', '2022-10-12 14:32:17'),
(2, 'Back-End Web', '2022-10-12 14:32:17', '2022-10-12 14:32:17'),
(3, 'Full-Stack Web', '2022-10-12 14:32:17', '2022-10-12 14:32:17'),
(4, 'Front-End App', '2022-10-12 14:32:17', '2022-10-12 14:32:17'),
(5, 'Back-End App', '2022-10-12 14:32:17', '2022-10-12 14:32:17'),
(6, 'Full-Stack App', '2022-10-12 14:32:17', '2022-10-12 14:32:17'),
(7, ' AI & Machine Learning', '2022-10-12 14:32:17', '2022-10-12 14:32:17'),
(8, 'Programming Fundamentals', '2022-10-12 14:32:17', '2022-10-12 14:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `location`, `city`, `address`, `shift`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d804.8996128550524!2d29.977261986395167!3d31.247142838261205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5db8a16c3c77d%3A0x24c465e134255814!2sRoute%20IT%20Training%20Center!5e0!3m2!1sen!2seg!4v1666131271220!5m2!1sen!2seg\" width=\"1024\" height=\"800\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Alexandria, Egypt.', '724, El Raml 1, Alexandria Governorate 21523', 'SUN to FRI from 9:00AM till 9:00PM', '01023639954', 'route@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` bigint(20) UNSIGNED NOT NULL,
  `brief_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category_id`, `trainer_id`, `brief_desc`, `full_desc`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 'PHP', 1, 1, 'Veniam et officiis qui voluptatem sed porro.', 'Repudiandae et illo beatae ullam debitis facere. Est delectus omnis dolorum. Est sed voluptatibus quas animi nostrum consequatur. Et ipsam asperiores ut ex. Ut repellendus quia veniam in cumque et distinctio. Iusto ut ut blanditiis mollitia quod. Dolorem explicabo facere eveniet accusamus architecto sed. Ducimus qui qui et aspernatur nulla. Aut error dolore consequuntur atque. Porro voluptatem omnis laborum ad unde voluptas. Quam officiis sit libero vel soluta rerum. Consequatur ipsum voluptatem quaerat. Commodi dolor magni facilis sunt ipsum autem adipisci. In consequuntur rem libero impedit.', 2503, 'PHP.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(3, 'JS', 2, 5, 'Sit rerum officia non necessitatibus facilis ut.', 'Enim autem hic eum temporibus reprehenderit sequi aut. Maiores ut et debitis et magni aut. Dicta odit voluptas necessitatibus praesentium commodi accusamus. Et excepturi et est nemo suscipit quia error. Reiciendis nihil sit inventore possimus sapiente rerum. Numquam consequuntur rem vero architecto dolores. Suscipit itaque quia perferendis in odio.', 1387, 'JS.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(4, 'ASP', 5, 5, 'Doloremque nemo autem eum vel temporibus.', 'Maxime quibusdam reiciendis officiis deserunt. Repudiandae et nam ab sed pariatur ut. Et rerum maxime commodi quos minima quo beatae. Omnis aperiam consectetur unde tenetur. Cupiditate nostrum reprehenderit possimus qui. Officia soluta adipisci ab accusantium voluptatum sequi eligendi. Similique sed facere nihil. Dolorem quasi harum est perspiciatis ullam laboriosam. Hic rem in vel corporis. Suscipit expedita quibusdam ut esse nesciunt esse. Commodi praesentium asperiores qui asperiores et. Labore hic earum sed temporibus libero.', 3736, 'ASP.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(5, 'Python', 2, 3, 'Illum aut aspernatur eum quisquam ipsum.', 'Voluptatem et quia non dolorem. Quod iusto praesentium suscipit dolorum sed quisquam veritatis. Voluptas itaque voluptatem voluptatem in quibusdam. Et et et voluptas facere enim ut. Consequatur nobis ea consectetur vero ut mollitia officia. Soluta mollitia officiis aut placeat est ut laboriosam. Officiis harum quo blanditiis labore omnis voluptatem. Quo a aliquid voluptatem laboriosam. Animi consequatur illo veritatis illum facere explicabo voluptas. Sequi voluptatem necessitatibus temporibus quis voluptas repellendus omnis. Aut asperiores blanditiis ullam vel magni asperiores. Voluptas iusto sit quidem tempora. Modi odit consequatur exercitationem est. Quo voluptas quos magni et eum iusto.', 5191, 'Python.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(6, 'C++', 1, 1, 'Et enim ex hic repellendus ipsum consequatur quo.', 'Illum rerum molestiae ipsa odit. Deserunt culpa occaecati ut magni enim ea sapiente. Dolor quia commodi et ea hic qui. Itaque recusandae harum ullam adipisci. Officia dicta cupiditate maxime sit omnis. Ad iste et ex beatae. Et dolorem laboriosam officia aliquid sunt fugit. Impedit optio et rerum magnam maxime blanditiis. Sit et porro tenetur iure et earum modi. Et qui in vitae vitae quia. Vel sint minus odit aut.', 5213, 'CPP.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(7, 'C#', 7, 4, 'Culpa quasi labore ad.', 'Alias quam laudantium laborum corrupti. Aspernatur omnis quo quibusdam vero. Maiores veniam occaecati consectetur dolores quo ut. Exercitationem in pariatur qui dolores mollitia. Repellat dolores voluptas veritatis architecto. Quasi minus voluptas deleniti. Fugiat in eos rem dolores. Modi eos consectetur quidem corrupti nesciunt.', 2535, 'CS.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(8, 'Java', 5, 5, 'Sed occaecati voluptates labore rem vel.', 'Molestiae aut dolores quam. Aut ullam aliquid sint. Sunt in molestiae fugiat laborum quidem. Consequatur placeat omnis maxime magnam. Ullam nostrum fugit cum veniam minus quia et. Facere quod velit repellendus voluptates quod qui est sapiente. Consectetur corporis voluptatum dolore magni perspiciatis expedita dignissimos.', 3334, 'Java.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(9, 'R', 6, 5, 'Molestiae repellat sit unde saepe.', 'Nemo a nam soluta libero. Tempora est inventore magnam aut tenetur sed quo. Vero voluptate culpa vel suscipit id et laboriosam. Nostrum quaerat perferendis optio. Porro harum minima nemo est qui quia delectus velit. Vel voluptatibus quos animi quidem. Molestias voluptatibus voluptatem dolores eum aliquam sit. Odit quasi assumenda voluptate vitae eligendi voluptates perspiciatis. Et mollitia laudantium sed est. Et laborum eius ipsa alias. Perferendis dolor nam ut totam explicabo nihil. Laborum voluptas animi et odit dignissimos laudantium aut. Optio natus fugit error ut quas veritatis.', 5046, 'R.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(10, 'Kotlin', 4, 5, 'Nam quis aut molestias libero in.', 'Possimus rerum facilis praesentium ea. Delectus ullam repellat eaque officiis iusto dolores alias. Libero alias doloremque amet quod molestiae sit aut inventore. Provident facere officia molestiae laudantium dolores beatae. Mollitia tenetur esse eveniet accusantium tempora voluptatem sed nulla. Voluptatibus iusto voluptas beatae repudiandae ea atque maxime voluptatem. Rerum vel doloribus amet id asperiores quia eligendi. Id doloribus tempora totam. Iusto et inventore ut sint fuga reiciendis delectus.', 2298, 'Kotlin.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(11, 'GO', 7, 2, 'Officiis consequatur est eos ut atque.', 'Praesentium doloribus nesciunt aut pariatur. Non error sed nesciunt aut expedita perferendis omnis totam. Rerum possimus modi minus iusto architecto. Suscipit et omnis voluptates. Expedita qui sunt placeat eius incidunt et ipsum. Vel vel quo adipisci sunt voluptatibus praesentium. Et qui nemo quia in. Cumque reiciendis voluptatem id quia officia. At esse eligendi et quia inventore et. Eos cupiditate ullam ullam cumque ipsam numquam illo. Excepturi est adipisci ut sed.', 5836, 'GO.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27'),
(12, 'TS', 6, 1, 'Aperiam ex voluptatum hic explicabo explicabo.', 'Voluptas hic hic veritatis vitae aut corrupti molestias. Animi et nisi aliquam ullam possimus et. Minus ut cupiditate et voluptatem. Ut impedit maiores repudiandae delectus. Et minus rerum est occaecati iste assumenda. Et veritatis ipsam impedit quo dolor exercitationem qui. Est et porro aspernatur officia. Est est vero architecto praesentium reprehenderit tenetur. Voluptas soluta et molestiae quam rerum hic dolores. Dolor repudiandae aperiam esse aut reiciendis aliquid. Rerum possimus provident aut quis ut quis. Quo doloribus enim quasi et quis vel fugiat. Saepe quia recusandae nihil at dolores voluptatem totam qui.', 6748, 'TS.png', '2022-10-12 14:33:27', '2022-10-12 14:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `courses_students`
--

CREATE TABLE `courses_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses_students`
--

INSERT INTO `courses_students` (`id`, `course_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 8, 'rejected', NULL, NULL),
(2, 8, 10, 'approved', NULL, NULL),
(3, 3, 17, 'approved', NULL, NULL),
(4, 7, 19, 'approved', NULL, NULL),
(5, 2, 1, 'approved', NULL, NULL),
(7, 5, 5, 'pending', NULL, NULL),
(8, 10, 9, 'approved', NULL, NULL),
(9, 6, 3, 'approved', NULL, NULL),
(10, 6, 10, 'pending', NULL, NULL),
(11, 11, 15, 'pending', NULL, NULL),
(12, 4, 10, 'approved', NULL, NULL),
(13, 2, 17, 'rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_30_231056_create_trainers_table', 1),
(6, '2022_08_30_231127_create_admins_table', 1),
(7, '2022_08_30_231142_create_categories_table', 1),
(8, '2022_08_30_231154_create_courses_table', 1),
(9, '2022_08_30_231216_create_students_table', 1),
(10, '2022_08_31_000004_create_courses_students_table', 1),
(11, '2022_09_03_223749_create_testomnials_table', 1),
(12, '2022_10_18_173515_create_newsletters_table', 2),
(13, '2022_10_18_220422_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `spec`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Scot Schowalter', 'hane.paula@sipes.org', 'Textile Knitting Machine Operator', '754-960-0684', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(2, 'Barney Bartell II', 'sunny.blick@yahoo.com', 'Physicist', '(762) 410-6267', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(3, 'Terrill Jacobs Sr.', 'rcollier@hotmail.com', 'Broadcast News Analyst', '458.898.9313', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(4, 'Ms. Dora O\'Hara V', 'lwaelchi@mitchell.com', 'Bookkeeper', '856.854.8212', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(5, 'Dianna Maggio', 'gwendolyn19@macejkovic.com', 'Mathematician', '+1-361-491-8478', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(6, 'Orin Wintheiser', 'allene.reichel@gmail.com', 'Transportation Attendant', '323-872-3808', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(7, 'Annie Ebert', 'mario27@reichel.com', 'Marketing VP', '1-858-319-9304', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(8, 'Christina Tillman MD', 'margret.lakin@gmail.com', 'Diesel Engine Specialist', '+1-458-284-0050', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(9, 'Pietro Dietrich', 'rswift@hotmail.com', 'Graduate Teaching Assistant', '(971) 423-0935', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(10, 'Zachariah Johnston Jr.', 'elyssa97@hotmail.com', 'Hand Sewer', '463.224.0224', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(11, 'Mr. Heber Huel DVM', 'lisandro.reilly@gmail.com', 'Cartographer', '+14696198980', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(12, 'Monte Hettinger I', 'chayes@koelpin.info', 'Municipal Fire Fighting Supervisor', '+1-540-926-6531', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(13, 'Lilliana Schuster MD', 'armando20@gmail.com', 'Animal Care Workers', '1-678-527-4108', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(14, 'Prof. Herbert Armstrong', 'hessel.glenna@oconner.com', 'Sawing Machine Tool Setter', '+1-475-845-4508', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(15, 'Jailyn Hettinger', 'cornell60@fay.com', 'Maintenance Worker', '925.694.2737', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(16, 'Mittie Herman', 'kacey22@reichert.biz', 'Musical Instrument Tuner', '+1-248-777-2042', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(17, 'Verona Cremin', 'xritchie@rowe.com', 'Pipefitter', '872-926-4951', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(18, 'Harley Waelchi', 'quincy.fadel@yahoo.com', 'Silversmith', '+1-510-507-7512', '2022-10-12 14:32:55', '2022-10-12 14:32:55'),
(19, 'Prof. Damon Goodwin III', 'wfeest@crona.biz', 'Aerospace Engineer', '+1.269.588.4612', '2022-10-12 14:32:55', '2022-10-12 14:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `testomnials`
--

CREATE TABLE `testomnials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testomnials`
--

INSERT INTO `testomnials` (`id`, `name`, `spec`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hope Nienow PhD', 'Personal Trainer', 'Qui omnis omnis eius alias minima maiores.', 'testimonial_img_3.png', '2022-10-12 14:33:18', '2022-10-12 14:33:18'),
(2, 'Maverick Kessler', 'Metal Worker', 'Cum velit ea ipsam mollitia consequatur voluptatem maiores nihil.', 'testimonial_img_1.png', '2022-10-12 14:35:17', '2022-10-12 14:35:17'),
(3, 'Wilbert Schoen', 'Dietetic Technician', 'Eveniet nisi eos aut.', 'testimonial_img_2.png', '2022-10-12 14:35:17', '2022-10-12 14:35:17'),
(4, 'Brannon Lang', 'Technical Director', 'Delectus corrupti qui eum amet.', 'testimonial_img_2.png', '2022-10-12 14:35:17', '2022-10-12 14:35:17'),
(5, 'Dr. Jaylin Nitzsche DDS', 'Editor', 'Iusto commodi dolorem ipsam.', 'testimonial_img_2.png', '2022-10-12 14:35:17', '2022-10-12 14:35:17'),
(6, 'Candida Mraz', 'Gas Distribution Plant Operator', 'Omnis deleniti et sint facilis deleniti qui id.', 'testimonial_img_2.png', '2022-10-12 14:35:17', '2022-10-12 14:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `email`, `profile_pic`, `phone`, `spec`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Eino Rohan MD', 'gulgowski.maryjane@hotmail.com', 'author_2.png', '(339) 412-5105', 'Bookkeeper', '2022-10-12 14:33:05', '2022-10-12 14:33:05'),
(2, 'Clementine Pfannerstill', 'velva.armstrong@yahoo.com', 'author_1.png', '1-480-660-4386', 'Veterinary Technician', '2022-10-12 14:33:05', '2022-10-12 14:33:05'),
(3, 'Bailee Green', 'clementine14@gmail.com', 'author_2.png', '+1-424-722-8235', 'Agricultural Technician', '2022-10-12 14:33:05', '2022-10-12 14:33:05'),
(4, 'Terrance Boyle III', 'ankunding.savannah@yahoo.com', 'author_3.png', '1-607-486-6447', 'Chemical Equipment Tender', '2022-10-12 14:33:05', '2022-10-12 14:33:05'),
(5, 'Erika Mills', 'kara.gleason@gmail.com', 'author_3.png', '341.988.0274', 'Artillery Officer', '2022-10-12 14:33:05', '2022-10-12 14:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_trainer_id_foreign` (`trainer_id`);

--
-- Indexes for table `courses_students`
--
ALTER TABLE `courses_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_students_course_id_foreign` (`course_id`),
  ADD KEY `courses_students_student_id_foreign` (`student_id`);

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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testomnials`
--
ALTER TABLE `testomnials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses_students`
--
ALTER TABLE `courses_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testomnials`
--
ALTER TABLE `testomnials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses_students`
--
ALTER TABLE `courses_students`
  ADD CONSTRAINT `courses_students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
