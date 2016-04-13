-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-03-26 04:49:31
-- 服务器版本： 5.7.9
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jzopen`
--

-- --------------------------------------------------------

--
-- 表的结构 `jz_auth_group`
--
DROP TABLE IF EXISTS `jz_auth_group`;
CREATE TABLE `jz_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `icon` varchar(31) NOT NULL DEFAULT '',
  `sort` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_auth_group`
--

INSERT INTO `jz_auth_group` (`id`, `title`, `status`, `rules`, `icon`, `sort`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 1, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jz_auth_group_access`
--
DROP TABLE IF EXISTS `jz_auth_group_access`;
CREATE TABLE `jz_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_auth_group_access`
--

INSERT INTO `jz_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jz_auth_rule`
--
DROP TABLE IF EXISTS `jz_auth_rule`;
CREATE TABLE `jz_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `jz_config`
--
DROP TABLE IF EXISTS `jz_config`;
CREATE TABLE `jz_config` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '配置ID',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '配置标题',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text NOT NULL COMMENT '配置值',
  `group` tinyint(4) UNSIGNED NOT NULL DEFAULT '0' COMMENT '配置分组',
  `type` varchar(16) NOT NULL DEFAULT '' COMMENT '配置类型',
  `options` varchar(255) NOT NULL DEFAULT '' COMMENT '配置额外值',
  `tip` varchar(100) NOT NULL DEFAULT '' COMMENT '配置说明',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` tinyint(4) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- --------------------------------------------------------

--
-- 表的结构 `jz_group`
--
DROP TABLE IF EXISTS `jz_group`;
CREATE TABLE `jz_group` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_group`
--
INSERT INTO `jz_group` (`id`, `title`, `icon`, `sort`, `create_time`, `update_time`) VALUES
(1, '默认分组', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jz_manager`
--
DROP TABLE IF EXISTS `jz_manager`;
CREATE TABLE `jz_manager` (
  `id` int(11) NOT NULL COMMENT '管理员ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `group_id` int(11) NOT NULL COMMENT '用户组ID',
  `sort` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `jz_menu`
--
DROP TABLE IF EXISTS `jz_menu`;
CREATE TABLE `jz_menu` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(45) NOT NULL COMMENT '模块名称',
  `url` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `sort` tinyint(4) NOT NULL COMMENT '排序等级',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `jz_user`
--
DROP TABLE IF EXISTS `jz_user`;
CREATE TABLE `jz_user` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'UID',
  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '用户类型',
  `nickname` varchar(63) NOT NULL DEFAULT '' COMMENT '昵称',
  `username` varchar(31) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(63) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(63) NOT NULL DEFAULT '' COMMENT '邮箱',
  `email_bind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '邮箱验证',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `mobile_bind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '邮箱验证',
  `avatar` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '头像',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_type` varchar(15) NOT NULL DEFAULT '' COMMENT '注册方式',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `jz_user`
--
INSERT INTO `jz_user` (`id`, `user_type`, `nickname`, `username`, `password`, `email`, `email_bind`, `mobile`, `mobile_bind`, `avatar`, `reg_ip`, `reg_type`, `create_time`, `update_time`, `status`) VALUES
(1, 1, 'admin', 'admn', 'admin', 'admin@admin.com', 0, '', 0, 0, 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jz_user_type`
--
DROP TABLE IF EXISTS `jz_user_type`;
CREATE TABLE `jz_user_type` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'ID',
  `user_group` int(11) NOT NULL DEFAULT '1',
  `title` varchar(31) NOT NULL DEFAULT '' COMMENT '标题',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户模块：用户类型表';

--
-- 转存表中的数据 `jz_user_type`
--
INSERT INTO `jz_user_type` (`id`, `user_group`, `title`, `create_time`, `update_time`, `status`) VALUES
(1, 1, '个人用户', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jz_auth_group`
--
ALTER TABLE `jz_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jz_auth_group_access`
--
ALTER TABLE `jz_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `jz_auth_rule`
--
ALTER TABLE `jz_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `jz_config`
--
ALTER TABLE `jz_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jz_group`
--
ALTER TABLE `jz_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jz_manager`
--
ALTER TABLE `jz_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jz_user`
--
ALTER TABLE `jz_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `jz_user_type`
--
ALTER TABLE `jz_user_type`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `jz_auth_group`
--
ALTER TABLE `jz_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `jz_auth_rule`
--
ALTER TABLE `jz_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `jz_config`
--
ALTER TABLE `jz_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '配置ID';
--
-- 使用表AUTO_INCREMENT `jz_group`
--
ALTER TABLE `jz_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `jz_manager`
--
ALTER TABLE `jz_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID';
--
-- 使用表AUTO_INCREMENT `jz_user`
--
ALTER TABLE `jz_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'UID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `jz_user_type`
--
ALTER TABLE `jz_user_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
