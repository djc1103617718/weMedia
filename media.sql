-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-24 07:16:11
-- 服务器版本： 5.7.13
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `media`
--

-- --------------------------------------------------------

--
-- 表的结构 `m_admin`
--

CREATE TABLE `m_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `m_admin`
--

INSERT INTO `m_admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'n6XW5uagTqjlC85co50gtypt1Q56Q7QT', '$2y$13$tM07Tj5UGn/ql08hCZgOVeNdHHVANHMRZq/jkTCbTMD5UFkCRDrmq', NULL, '1103617718@qq.com', 10, 1487147357, 1487147357);

-- --------------------------------------------------------

--
-- 表的结构 `m_article`
--

CREATE TABLE `m_article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL COMMENT '主要参考的文章ID（拉取的文章ID）',
  `admin_id` int(11) NOT NULL COMMENT '编辑员ID',
  `category` varchar(64) NOT NULL COMMENT '文章分类',
  `content` text NOT NULL COMMENT '文章内容',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1为正常',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='编辑编辑的文章保存';

--
-- 转存表中的数据 `m_article`
--

INSERT INTO `m_article` (`id`, `title`, `description`, `media_id`, `admin_id`, `category`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, '测试', '长', NULL, 1, '测试', '<p>测试<img src="/media/web/upload/image/2017-02-16/1487233825205742.jpeg" title="1487233825205742.jpeg" alt="viewphoto.jpeg"/></p>', 1, 1487233888, 1487233888);

-- --------------------------------------------------------

--
-- 表的结构 `m_auth_assignment`
--

CREATE TABLE `m_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `m_auth_item`
--

CREATE TABLE `m_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `m_auth_item_child`
--

CREATE TABLE `m_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `m_auth_rule`
--

CREATE TABLE `m_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `m_news_resources`
--

CREATE TABLE `m_news_resources` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `news_id` int(11) NOT NULL COMMENT '来自于拉取数据的原有ID',
  `media_name` varchar(255) DEFAULT NULL COMMENT '平台名称',
  `account_name` varchar(255) DEFAULT NULL COMMENT '头条号',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `category` varchar(255) DEFAULT NULL COMMENT '文章类别',
  `href` varchar(255) DEFAULT NULL COMMENT '链接',
  `read_num` float DEFAULT NULL COMMENT '阅读量',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `release_time` datetime DEFAULT NULL COMMENT '发布时间',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `created_time` datetime DEFAULT NULL COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='存储抓取的新闻资源';

-- --------------------------------------------------------

--
-- 表的结构 `m_tieba_school_info`
--

CREATE TABLE `m_tieba_school_info` (
  `id` int(11) NOT NULL,
  `tieba_id` int(11) NOT NULL COMMENT 'tieba_school_info的主键ID',
  `name` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `followed_num` float DEFAULT NULL COMMENT '关注人数',
  `post_num` float DEFAULT NULL COMMENT '回帖数',
  `created_time` datetime DEFAULT NULL COMMENT '拉取数据入库时间',
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `m_article`
--
ALTER TABLE `m_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_auth_assignment`
--
ALTER TABLE `m_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `m_auth_item`
--
ALTER TABLE `m_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `m_auth_item_child`
--
ALTER TABLE `m_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `m_auth_rule`
--
ALTER TABLE `m_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `m_news_resources`
--
ALTER TABLE `m_news_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tieba_school_info`
--
ALTER TABLE `m_tieba_school_info`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `m_article`
--
ALTER TABLE `m_article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `m_news_resources`
--
ALTER TABLE `m_news_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2306;
--
-- 使用表AUTO_INCREMENT `m_tieba_school_info`
--
ALTER TABLE `m_tieba_school_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93104;
--
-- 限制导出的表
--

--
-- 限制表 `m_auth_assignment`
--
ALTER TABLE `m_auth_assignment`
  ADD CONSTRAINT `m_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `m_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `m_auth_item`
--
ALTER TABLE `m_auth_item`
  ADD CONSTRAINT `m_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `m_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `m_auth_item_child`
--
ALTER TABLE `m_auth_item_child`
  ADD CONSTRAINT `m_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `m_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `m_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `m_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
