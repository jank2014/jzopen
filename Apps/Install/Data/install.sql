-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-13 11:29:15
-- 服务器版本： 5.7.9
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jzopen_v2`
--

-- --------------------------------------------------------

--
-- 表的结构 `jz_auth_group`
--
DROP TABLE IF EXISTS `jz_auth_group`;
CREATE TABLE `jz_auth_group` (
  `id` mediumint(8) NOT NULL,
  `title` varchar(45) NOT NULL COMMENT '管理组名称',
  `rules` varchar(100) NOT NULL COMMENT '管理组权限',
  `status` tinyint(1) NOT NULL COMMENT '状态1开启0禁用',
  `sort` tinyint(4) NOT NULL COMMENT '排序',
  `icon` varchar(45) NOT NULL COMMENT '管理组图标',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_auth_group`
--

INSERT INTO `jz_auth_group` (`id`, `title`, `rules`, `status`, `sort`, `icon`, `create_time`, `update_time`) VALUES
(1, '超级管理员', '', 1, 1, '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jz_auth_group_access`
--
DROP TABLE IF EXISTS `jz_auth_group_access`;
CREATE TABLE `jz_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '用户ID\n',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_auth_group_access`
--

INSERT INTO `jz_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jz_avatar`
--
DROP TABLE IF EXISTS `jz_avatar`;
CREATE TABLE `jz_avatar` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL COMMENT '图片地址',
  `status` tinyint(1) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `jz_conf`
--
DROP TABLE IF EXISTS `jz_conf`;
CREATE TABLE `jz_conf` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL COMMENT '元素name',
  `title` varchar(45) NOT NULL COMMENT 'label现实的名称',
  `value` varchar(300) NOT NULL COMMENT '配置值',
  `type` varchar(10) NOT NULL COMMENT '元素类型',
  `conf_group` varchar(45) NOT NULL COMMENT '所属配置组\nsystem jz',
  `sort` tinyint(4) NOT NULL COMMENT '排序值',
  `status` tinyint(1) NOT NULL COMMENT '控制1显示0隐藏',
  `class` varchar(45) NOT NULL COMMENT '配置样式 字符串&数组',
  `conf` varchar(45) NOT NULL COMMENT '配置项 字符串&数组',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_conf`
--

INSERT INTO `jz_conf` (`id`, `name`, `title`, `value`, `type`, `conf_group`, `sort`, `status`, `class`, `conf`, `create_time`, `update_time`) VALUES
(2, 'WEBSITE_STATUS', '关闭站点', 'on', 'toggle', 'system', 1, 1, '', '', 1459753335, 1460134740),
(3, 'WEBSITE_NAME', '网站标题', 'Jzopen Web开发新思路1', 'text', 'system', 2, 1, '', '', 1459755865, 1459755865),
(4, 'WEBSITE_DESC', '网站描述', 'jzopen为快速开发网站 App 后台提供了新思路.模块化设计,元素组合,快速开发 ', 'textarea', 'system', 1, 1, '', '', 1459756041, 1459756041),
(5, 'KEY_WORDS', '关键词', 'Jzopen,Bootstrap,Semantic UI,后台,App后台,jankz,ThinkPHP', 'text', 'system', 1, 1, '', '', 1459756194, 1459756194),
(6, 'JZ_FORM_OFFSET', '表单左边距', 'one', 'text', 'jz', 1, 1, '', '', 1460128401, 1460128668),
(7, 'JZ_FORM_WIDTH', '表单显示宽度', 'ten', 'text', 'jz', 1, 1, '', '', 1460129422, 1460129422),
(8, 'JZ_FORM_FIELDS', '开启多栏显示', 'on', 'toggle', 'jz', 1, 1, '', '', 1460129842, 1460129842),
(9, 'WEBSITE_COPYRIGHT', '版权信息', 'Copyright © 2014-2016 Jzopen. All rights reserved.', 'text', 'system', 1, 1, '', '', 1460130335, 1460130335),
(10, 'WEBSITE_ICP', '网站备案信息', '粤ICP备15049392号-2', 'text', 'system', 1, 1, '', '', 1460130521, 1460130521),
(11, 'JZ_TABLE_PAGE', '数据分页', '10', 'text', 'jz', 1, 1, '', '', 1460130606, 1460130606),
(12, 'JZ_TOPBTN', '关闭顶部按钮', 'on', 'toggle', 'jz', 0, 1, '', '', 1460135953, 1460135953),
(13, 'JZ_RIGHTBTN', '关闭右侧操作按钮', 'on', 'toggle', 'jz', 0, 1, '', '', 1460136043, 1460136043);

-- --------------------------------------------------------

--
-- 表的结构 `jz_manager`
--
DROP TABLE IF EXISTS `jz_manager`;
CREATE TABLE `jz_manager` (
  `id` int(11) NOT NULL COMMENT '管理员id',
  `uid` varchar(45) NOT NULL COMMENT '用户ID',
  `group_id` varchar(45) NOT NULL COMMENT '管理组ID',
  `status` tinyint(1) NOT NULL COMMENT '管理员状态',
  `sort` tinyint(4) NOT NULL COMMENT '排序值',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_manager`
--

INSERT INTO `jz_manager` (`id`, `uid`, `group_id`, `status`, `sort`, `create_time`, `update_time`) VALUES
(1, '1', '1', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jz_menu`
--
DROP TABLE IF EXISTS `jz_menu`;
CREATE TABLE `jz_menu` (
  `id` mediumint(8) NOT NULL,
  `pid` varchar(45) NOT NULL COMMENT '菜单父id 0 表示顶级菜单',
  `name` char(100) NOT NULL COMMENT '验证规则',
  `title` varchar(45) NOT NULL COMMENT '菜单名称',
  `url` varchar(45) NOT NULL COMMENT '地址',
  `icon` varchar(45) NOT NULL COMMENT '菜单图标',
  `sort` varchar(45) NOT NULL COMMENT '排序值',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '验证类型',
  `status` tinyint(1) NOT NULL COMMENT '状态1开启0隐藏',
  `condition` char(100) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_menu`
--

INSERT INTO `jz_menu` (`id`, `pid`, `name`, `title`, `url`, `icon`, `sort`, `type`, `status`, `condition`, `create_time`, `update_time`) VALUES
(1, '0', 'Admin/Index/index', '首页', 'Admin/Index/index', 'home', '1', 1, 1, '', 0, 0),
(2, '0', 'User', '用户', '', 'user', '1', 1, 1, '', 0, 0),
(3, '0', 'Cms', 'Cms', '', 'feed', '1', 1, 1, '', 0, 0),
(4, '0', 'Admin/Conf', '设置', '', 'tasks', '1', 1, 1, '', 0, 0),
(5, '0', '', '管理', '', 'gear', '1', 1, 1, '', 0, 0),
(6, '1', 'Admin/Index/statistics', '统计', 'Admin/Index/statistics', 'line-chart', '2', 1, 1, '', 0, 0),
(7, '1', 'Admin/Index/operation', '运维', 'Admin/Index/operation', 'circle-o-notch', '2', 1, 1, '', 0, 0),
(8, '6', 'Admin/Index/users', '用户统计', 'Admin/Index/users', 'circle-o', '3', 1, 1, '', 0, 0),
(9, '5', 'Admin/Menu/index', '菜单管理', 'Admin/Menu/index', '', '1', 1, 1, '', 0, 0),
(10, '5', 'Admin/Auth/Index', '权限管理', '', '', '2', 1, 1, '', 1459674156, 1459674156),
(11, '10', 'Admin/Manager/index', '管理员', 'Admin/Manager/index', '', '3', 1, 1, '', 1459674567, 1459674567),
(13, '2', 'User/Index/index', '用户列表', 'User/Index/index', '', '1', 1, 1, '', 1459675898, 1459675898),
(14, '2', 'User/Group/index', '用户组', 'User/Group/index', 'users', '1', 1, 1, '', 1459676015, 1459676015),
(15, '3', 'Cms/Index/index', '文章列表', 'Cms/Index/index', '', '1', 1, 1, '', 1459676142, 1459676142),
(16, '3', 'Cms/Article/classifly', '文章分类', 'Cms/Article/classifly', '', '2', 1, 1, '', 1459676270, 1459676270),
(17, '5', 'Admin/Conf/index', '系统配置', 'Admin/Conf/index', '', '2', 1, 1, '', 1459741151, 1459741151),
(18, '4', 'Admin/Setting/index', '网站设置', 'Admin/Setting/index', '', '2', 1, 1, '', 1459750323, 1459750323),
(19, '4', 'Admin/JankzMaker', 'JankzMaker', 'Admin/JankzMaker/index', 'options', '2', 1, 1, '', 1459750435, 1459750435),
(20, '10', 'Admin/Group/index', '管理组', 'Admin/Group/index', 'users', '3', 1, 1, '', 1459813603, 1459813603),
(21, '0', 'Admin/Test', '测试', 'Admin/Test', '', '1', 1, 1, '', 1460127688, 1460127688);

-- --------------------------------------------------------

--
-- 表的结构 `jz_user`
--
DROP TABLE IF EXISTS `jz_user`;
CREATE TABLE `jz_user` (
  `id` int(11) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户类型id默认1对应user_group的id',
  `nickname` varchar(45) NOT NULL COMMENT '昵称',
  `username` varchar(90) NOT NULL COMMENT '用户名',
  `password` varchar(90) NOT NULL COMMENT '密码user_md5加密',
  `email` varchar(45) NOT NULL COMMENT '邮箱',
  `email_bind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '邮箱绑定默认0未绑定',
  `moblie` varchar(11) NOT NULL COMMENT '手机号',
  `mobile_bind` tinyint(1) NOT NULL DEFAULT '0' COMMENT '手机绑定默认0未绑定',
  `avatar` varchar(100) NOT NULL COMMENT '头像',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP\n',
  `reg_type` tinyint(1) NOT NULL COMMENT '注册类型1手机2邮箱3后台添加',
  `sort` tinyint(4) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL COMMENT '会员状态',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jz_user`
--

INSERT INTO `jz_user` (`id`, `user_type`, `nickname`, `username`, `password`, `email`, `email_bind`, `moblie`, `mobile_bind`, `avatar`, `reg_ip`, `reg_type`, `sort`, `status`, `create_time`, `update_time`) VALUES
(1, 1, 'jankz', 'jankz', 'b3b617345571bdbf14386131d000d61c', '', 0, '', 0, '', 0, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jz_user_group`
--
DROP TABLE IF EXISTS `jz_user_group`;
CREATE TABLE `jz_user_group` (
  `id` int(11) NOT NULL COMMENT '用户组ID',
  `title` varchar(45) NOT NULL COMMENT '用户组名称',
  `status` tinyint(1) NOT NULL COMMENT '用户组状态',
  `sort` tinyint(4) NOT NULL COMMENT '排序',
  `icon` varchar(45) NOT NULL COMMENT '图标',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jz_auth_group`
--
ALTER TABLE `jz_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jz_avatar`
--
ALTER TABLE `jz_avatar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jz_conf`
--
ALTER TABLE `jz_conf`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jz_manager`
--
ALTER TABLE `jz_manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jz_menu`
--
ALTER TABLE `jz_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jz_user`
--
ALTER TABLE `jz_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jz_user_group`
--
ALTER TABLE `jz_user_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `jz_auth_group`
--
ALTER TABLE `jz_auth_group`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `jz_avatar`
--
ALTER TABLE `jz_avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `jz_conf`
--
ALTER TABLE `jz_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `jz_manager`
--
ALTER TABLE `jz_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `jz_menu`
--
ALTER TABLE `jz_menu`
  MODIFY `id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `jz_user`
--
ALTER TABLE `jz_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `jz_user_group`
--
ALTER TABLE `jz_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户组ID';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
