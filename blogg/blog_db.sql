-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:55 AM
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
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(2, 'rahul', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `admin_id`, `post_id`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `name`, `title`, `content`, `category`, `image`, `date`, `status`) VALUES
(1, 1, 'admin', 'How to make a blog website', 'how to make a responsive blogger website design using html css vanilla javascript, php pdo and mysql database from scratch.\ncreate a complete responsive blogging website design template using html css vanilla javascript php pdo and mysql database with admin dashboad panel step by step.', 'design and development', 'Screenshot (226).png', '2023-12-10', 'active'),
(13, 1, 'admin', 'Enhancing Your Home Interiors with Espacios Design Studio&#39;s Unique PMC Approach', 'Welcome to Espacios Design Studio, where we redefine interior design through our innovative Project Management Consulting (PMC) model. In this blog, we&#39;ll go through how our PMC model empowers you to shape your dream home interiors with a personal touch, all while keeping costs under control.\r\n\r\nWhat is PMC at Espacios Design Studio?\r\n\r\nAt Espacios, PMC stands for Project Management Consulting, a groundbreaking approach that allows you to access interior design services at cost price. We charge only a nominal consulting fee, putting you in the driver&#39;s seat of your home interior project.\r\n\r\nPersonalized Home Interiors\r\n\r\nOur PMC model is all about collaboration. You get the opportunity to work closely with our talented interior designers at each stage of the process. This ensures that your home interiors reflect your unique style and preferences.\r\n\r\nWhy Choose Espacios Design Studio&#39;s PMC for Your Home Interiors?\r\n\r\nCost-Effective Design: By offering services at cost price, we make high-quality interior design affordable for everyone.\r\nPersonalization: Your input is invaluable. Together with our designers, you craft a home that feels uniquely yours.\r\nExpert Guidance: Benefit from the expertise of our seasoned designers who guide you through each decision.\r\nTransparent Process: Our PMC approach ensures complete transparency in costs and choices.\r\nThe PMC Process for Personalized Home Interiors\r\n\r\nInitial Consultation: We discuss your vision, requirements, and budget.\r\nCollaborative Design: Work hand-in-hand with our designers to plan and visualize your interiors.\r\nCost Transparency: Know exactly where your money is going; we charge a nominal consulting fee.\r\nSourcing and Execution: We handle procurement and manage the entire execution process.\r\nPersonal Touch: Your preferences are incorporated at every stage, ensuring a personalized touch.\r\nClient Testimonials\r\n\r\n&#34;Great service from the team. I have got all my materials purchased at cost price and they were very transparent. Highly recommended service.&#34;\r\n- Abhilash Kumar\r\nTransforming your home into a personalized oasis has never been more accessible. With Espacios Design Studio&#39;s PMC model, you get the best of both worlds - cost-effective interior design and a personal touch that reflects your style. Contact us today, and let&#39;s embark on a journey to create the home of your dreams.\r\n\r\nVisit our website at www.espacios.co.in or reach out to us at sales@espacios.co.in to learn more about our PMC services for personalized home interiors.', 'comedy', 'blog1.png', '2023-12-16', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kush Tiwari ', 'test@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
