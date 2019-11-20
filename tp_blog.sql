-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2019-07-20 17:15:31
-- 服务器版本： 5.7.24
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_about`
--

CREATE TABLE IF NOT EXISTS `tp_about` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '名字',
  `age` int(11) NOT NULL COMMENT '年龄',
  `career` varchar(50) NOT NULL COMMENT '职业',
  `interest` varchar(100) NOT NULL COMMENT '爱好',
  `image` varchar(100) NOT NULL COMMENT '头像',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_about`
--

INSERT INTO `tp_about` (`id`, `name`, `age`, `career`, `interest`, `image`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '梁巧玲', 20, '超级会计师', '爱好王者荣耀，吃鸡', '/static/images/20190714/my.jpg', 1563531660, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE IF NOT EXISTS `tp_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0是禁用1是可用',
  `is_super` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0是普通管理员1是超级管理员',
  `ip` char(20) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`, `nickname`, `email`, `status`, `is_super`, `ip`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'iop02008', '07529ca9551da43161b02721f3d4193f', '胖的传说', 'jwj2010@vip.qq.com', '1', '1', '', 1563002359, 1563002359, NULL),
(10, 'liangqiaoling', 'd7f193cda191b69c4860d96bae79308b', '梁巧玲', '283035772@qq.com', '0', '1', '127.0.0.1', 1562669784, 1563002329, NULL),
(11, 'qiaoling', 'f8e39c15556b5768acd95c4244c3ab4c', '豌豆梁', '6782305@qq.com', '0', '0', '127.0.0.1', 1562745532, 1563002296, NULL),
(12, 'zhangfei', 'd58f2170fedb27250f52b7b0409a5f96', '张飞', 'zhangfei@shu.com', '0', '0', '127.0.0.1', 1562949908, 1562949908, NULL),
(13, 'guanyu', '9af5340d36ba95ed9c1f249dbd7f008f', '关羽', 'guanyu@shu.com', '0', '0', '127.0.0.1', 1562950757, 1563003641, NULL),
(14, 'liushan', '19cf692dcd7ec6e1546b890b413b4759', '刘禅', 'liushan@shu.com', '1', '0', '127.0.0.1', 1562951793, 1563004019, NULL),
(15, 'sunquan', '04096e48658a1ccb3597e85614fb14dd', '孙权', 'sunquan@wu.com', '0', '0', '127.0.0.1', 1562951913, 1563003575, NULL),
(16, 'sunshangxiang', 'e0efefb2579f338d17d0b1b10c81c5bf', '孙尚香', 'sunshangxiang@wu.com', '0', '0', '127.0.0.1', 1562952033, 1563003565, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_album`
--

CREATE TABLE IF NOT EXISTS `tp_album` (
  `id` int(11) NOT NULL,
  `path` varchar(300) NOT NULL COMMENT '图片路径',
  `picdesc` varchar(100) NOT NULL COMMENT '图片描述',
  `map` varchar(20) NOT NULL COMMENT '地理信息',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_album`
--

INSERT INTO `tp_album` (`id`, `path`, `picdesc`, `map`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '/static/images/20190714/157f8957398be849f25311571d30fe32.jpg', '开心的一天', '广东惠州', 1563181319, 1563440519, NULL),
(2, '\\static\\images\\20190714\\651b1cdf6cb0bf209f70340104dcba6f.png', '风景超好的呢', '广东惠州', 1563440519, 1563551472, NULL),
(3, 'e6fa807d8c275fb6cc97d7d59eedd003.png', '今天心情很好呢~', '广东惠州', 1563553480, 1563553555, 1563553555),
(28, '/static/images/album/20190720\\b0fbd4b084687d39ddd26b4a0092e1e7.jpeg', '今天心情很好呢~', '广东惠州', 1563608029, 1563608029, NULL),
(24, '/static/images/album/20190720\\89d4da77902aa6bbfec1634198266df5.jpg', '超好的呢', '广东惠州', 1563554676, 1563607727, NULL),
(25, '/static/images/album/20190720\\22db87b3b219661b469dc7661ec02e7b.jpeg', '今天心情很好呢~', '广东惠州', 1563608029, 1563608029, NULL),
(26, '/static/images/album/20190720\\24b4a9bde03b892ecaab2cbe6bae9686.jpeg', '今天心情很好呢~', '广东惠州', 1563608029, 1563608029, NULL),
(27, '/static/images/album/20190720\\edfd15cbc783d13525ea3ace777105ee.png', '今天心情很好呢~', '广东惠州', 1563608029, 1563608029, NULL),
(23, '/static/images/album/20190720\\29d2652fd20993d25bc50794e46fa33a.jpeg', '今天心情很好呢~', '广东惠州', 1563554676, 1563554676, NULL),
(22, '/static/images/album/20190720\\25246b5ef76c999a0968c2df83d5cf9c.jpeg', '今天心情很好呢~', '广东惠州', 1563554676, 1563554676, NULL),
(21, '/static/images/album/20190720\\f16940744b92c1ed81e4c461a9a646e0.jpeg', '今天心情很好呢~', '广东惠州', 1563554676, 1563554676, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

CREATE TABLE IF NOT EXISTS `tp_article` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL COMMENT '作者',
  `image` varchar(100) NOT NULL DEFAULT 'static/images/default.jpg',
  `desc` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `comm_num` int(11) NOT NULL DEFAULT '0' COMMENT '评论数',
  `content` longtext NOT NULL,
  `is_top` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0是不推荐1是推荐',
  `cate_id` int(11) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`id`, `title`, `author`, `image`, `desc`, `tags`, `click`, `comm_num`, `content`, `is_top`, `cate_id`, `create_time`, `update_time`, `delete_time`) VALUES
(2, '真的傻逼', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '跟那些过往的编辑器一样，你需要放置一个标签', '跟那些过往的编辑器一样，你需要放置一个标签', 0, 0, '<p><span>跟那些过往的编辑器一样，你需要放置一个标签</span></p>', '1', 1, 1562852237, 1562921353, 1562921353),
(3, '编辑器基本设置', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '编辑器基本设置', '编辑器基本设置', 0, 0, '<p><a name="set">编辑器基本设置</a></p>', '0', 2, 1562852411, 1562921434, 1562921434),
(4, '编辑器基本设置编辑器基本设置', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '编辑器基本设置', '编辑器基本设置', 0, 0, '<p><a name="set">编辑器基本设置</a></p>', '0', 2, 1562852442, 1562921428, NULL),
(5, '编辑器基本设置编辑', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '编辑器基本设置', '编辑器基本设置', 0, 0, '<p><a name="set">编辑器基本设置</a></p>', '0', 2, 1562852502, 1562921387, NULL),
(6, '编辑器基本设置编辑器基本设置编辑器基本设置', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '编辑器基本设置', '编辑器基本设置', 0, 0, '<p><a name="set">编辑器基本设置</a></p>', '0', 2, 1562852541, 1562921438, NULL),
(11, '编辑器基本设置6', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '编辑器基本设置', '编辑器基本设置', 0, 0, '<p><a name="set">编辑器基本设置</a></p>', '1', 1, 1562852788, 1562852788, NULL),
(12, '编辑器基本设置67', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '编辑器基本设置', '编辑器基本设置', 0, 0, '<p><a name="set">编辑器基本设置</a></p>', '1', 1, 1562852824, 1562852824, NULL),
(13, 'Layui是一款由贤心个人原创的UI框架，这正是我们对高质量的承诺。', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', 'Layui是一款由贤心个人原创的UI框架，这正是我们对高质量的承诺。尽管现在市面上有太多依托在 Vue/React 光环下的前端方案，但我们仍然定位现在这样一个模式，是为了呈现一个极简的解决手段，那就是无需依赖过多看似逼格的工具，直接信手即用', 'LayUI', 0, 0, '<p><a href="http://www.layui.com/" target="_blank"><u>Layui</u></a>是一款由贤心个人原创的UI框架，这正是我们对高质量的承诺。尽管现在市面上有太多依托在&nbsp;<em>Vue/React</em>&nbsp;光环下的前端方案，但我们仍然定位现在这样一个模式，是为了呈现一个<strong>极简</strong>的解决手段，那就是无需依赖过多看似逼格的工具，直接信手即用。而恰是因为原创，有些事情远比人们想象中的那么简单，尤其是在追求尽善尽美的强迫症的引领下，我常常徘徊在轮子的制造、摧毁又重建的漩涡中，所以<a href="http://www.layui.com/" target="_blank">Layui</a>一拖再拖，从计划到现在，似乎已经接近1年。在我全职接近两个月的SOHO后，Layui的第一个版本终于发布！</p><p style="text-align: right;"><br><br>2016.10.14</p>', '0', 1, 1562853161, 1562853161, NULL),
(14, '嗯是的Layui是一款由贤心个人原创的UI框架，这正是我们对高质量的承诺。', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', 'Layui是一款由贤心个人原创的UI框架，这正是我们对高质量的承诺。尽管现在市面上有太多依托在 Vue/React 光环下的前端方案，但我们仍然定位现在这样一个模式，是为了呈现一个极简的解决手段，那就是无需依赖过多看似逼格的工具，直接信手即用', 'LayUI', 0, 0, '<p><a href="http://www.layui.com/" target="_blank"><u>Layui</u></a>是一款由贤心个人原创的UI框架，这正是我们对高质量的承诺。尽管现在市面上有太多依托在&nbsp;<em>Vue/React</em>&nbsp;光环下的前端方案，但我们仍然定位现在这样一个模式，是为了呈现一个<strong>极简</strong>的解决手段，那就是无需依赖过多看似逼格的工具，直接信手即用。而恰是因为原创，有些事情远比人们想象中的那么简单，尤其是在追求尽善尽美的强迫症的引领下，我常常徘徊在轮子的制造、摧毁又重建的漩涡中，所以<a href="http://www.layui.com/" target="_blank">Layui</a>一拖再拖，从计划到现在，似乎已经接近1年。在我全职接近两个月的SOHO后，Layui的第一个版本终于发布！</p><p style="text-align: right;"><br><br>2016.10.14</p>', '1', 1, 1562853187, 1562853187, NULL),
(15, '跟那些过往的编辑器一样，你需要放置一个标签（一般为textarea文本域）作为编辑器的目标元素，然后', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '跟那些过往的编辑器一样，你需要放置一个标签（一般为textarea文本域）作为编辑器的目标元素，然后调用 layedit.build(''id'') 即可，如下所示：', 'layUI', 0, 0, '<p><span>跟那些过往的编辑器一样，你需要放置一个标签（一般为textarea文本域）作为编辑器的目标元素，然后调用&nbsp;</span><em>layedit.build(''id'')</em><span>&nbsp;即可，如下所示：</span></p>', '0', 2, 1562853320, 1562922453, 1562922453),
(16, '跟那些过往的编辑器一样，你需要放置一个标签（一般为textarea文本域）作为编辑器的目标元素，然后', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '跟那些过往的编辑器一样，你需要放置一个标签（一般为textarea文本域）作为编辑器的目标元素，然后调用 layedit.build(''id'') 即可，如下所示：', '跟那些过往的编辑器一样，你需要放置一个标签（一般为textarea文本域）作为编辑器的目标元素，然后调用 layedit.build(''id'') 即可，如下所示：', 0, 0, '<p><span>跟那些过往的编辑器一样，你需要放置一个标签（一般为textarea文本域）作为编辑器的目标元素，然后调用&nbsp;</span><em>layedit.build(''id'')</em><span>&nbsp;即可，如下所示：</span></p>', '0', 2, 1562853393, 1562922453, 1562922453),
(17, '国内外有许多优秀、强大的HTML编辑器，但普遍都有一个共性：异常地臃肿（少则几千行，多则上万行代码）', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '国内外有许多优秀、强大的HTML编辑器，但普遍都有一个共性：异常地臃肿（少则几千行，多则上万行代码）、UI陈旧，并且基本都好几年没更新了。而现在，随着Layui的发布，我们有必要重新为富文本做一些新的定义。LayEdit仍旧遵循极简的设计风格，无论是UI上，还是接口使用上，都尽可能地避免一些繁杂的功能和配置。如果你正苦苦寻找一款轻量的Web富文本编辑器，那么LayEdit会是你不错的选择。', '国内外有许多优秀、强大的HTML编辑器，但普遍都有一个共性：异常地臃肿（少则几千行，多则上万行代码）、UI陈旧，并且基本都好几年没更新了。而现在，随着Layui的发布，我们有必要重新为富文本做一些新的', 0, 0, '<p><span>国内外有许多优秀、强大的HTML编辑器，但普遍都有一个共性：异常地臃肿（少则几千行，多则上万行代码）、UI陈旧，并且基本都好几年没更新了。而现在，随着Layui的发布，我们有必要重新为富文本做一些新的定义。LayEdit仍旧</span><em>遵循极简</em><span>的设计风格，无论是UI上，还是接口使用上，</span><em>都尽可能地避免一些繁杂的功能和配置</em><span>。如果你正苦苦寻找一款轻量的Web富文本编辑器，那么LayEdit会是你不错的选择。</span></p>', '0', 4, 1562854495, 1562854495, NULL),
(18, '跟那些过往12', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '跟那些过往的编辑器一样，你需要放置一个标签', '跟那些过往的编辑器一样，你需要放置一个标签', 0, 0, '<p>今晚哪里嗨？</p>', '1', 3, 1562854612, 1563008515, NULL),
(19, '开心的一天', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '开心的一天', '开心', 0, 0, '<p>开心的一天</p>', '0', 1, 1563025724, 1563025724, NULL),
(20, '明天也开心', '巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '明天也开心', '明天也开心', 0, 0, '<p>明天也开心</p>', '0', 1, 1563025741, 1563025741, NULL),
(21, '测试上传', '大巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '测试上传', '上传', 0, 0, '<p>测试上传</p>', '0', 1, 1563036549, 1563036549, NULL),
(22, '上传试试', '大巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '上传试试', '上传试试', 0, 0, '<p>上传试试</p>', '0', 1, 1563037508, 1563037508, NULL),
(23, '上传成功', '臭巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '上传成功', '上传成功', 0, 0, '<p>上传成功</p>', '0', 3, 1563041645, 1563041645, NULL),
(24, '上传成功2', '臭巧玲', '20190714\\29a563e83f05e05bff8e4f19f4b7e58f.jpg', '上传成功', '上传成功', 0, 0, '<p>上传成功</p>', '0', 3, 1563041875, 1563041875, NULL),
(25, '爱巧玲呢', '杰哥', '20190714\\651b1cdf6cb0bf209f70340104dcba6f.png', '爱巧玲呢', '爱巧玲呢', 0, 0, '<p>爱巧玲呢</p>', '0', 3, 1563042355, 1563042355, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

CREATE TABLE IF NOT EXISTS `tp_cate` (
  `id` int(11) NOT NULL,
  `catename` varchar(20) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `catename`, `sort`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '今日趣事', 3, 1562752897, 1562824022, NULL),
(2, '昨日趣事', 4, 1562752947, 1562922453, NULL),
(3, '杰哥心路', 1, 1562753171, 1562822129, NULL),
(4, '代码备忘', 2, 1562754839, 1562824096, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_comment`
--

CREATE TABLE IF NOT EXISTS `tp_comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `article_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_comment`
--

INSERT INTO `tp_comment` (`id`, `content`, `article_id`, `member_id`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '这篇文章真不错', 18, 2, 0, 1563008515, NULL),
(2, '今晚哪里嗨？', 18, 3, 0, 1563008515, NULL),
(3, '<p>既然来了，就说两句呗~</p>', 25, 3, 1563176918, 1563176918, NULL),
(4, '<p>爱你们哟</p>', 25, 3, 1563176932, 1563176932, NULL),
(5, '<p>臭尼玛<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_org.png" alt="[舔屏]" data-w-e="1"></p>', 25, 3, 1563177036, 1563177036, NULL),
(6, '<p>既然来了，就说两句呗~</p>', 24, 3, 1563179180, 1563179180, NULL),
(7, '<p>爱巧玲呢</p><img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_org.png" alt="[舔屏]" data-w-e="1">', 25, 1, 1563210595, 1563210595, NULL),
(8, '<p>爱你</p>', 14, 3, 1563544728, 1563544728, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_member`
--

CREATE TABLE IF NOT EXISTS `tp_member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_member`
--

INSERT INTO `tp_member` (`id`, `username`, `password`, `nickname`, `email`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'iop02008', 'iop02008', '胖的传说', 'jwj2010@vip.qq.com', 1562929648, 1562929648, NULL),
(2, 'liangqiaoling', 'liangqiaoling', '梁巧玲', 'liangqiaoling@liang.', 1562940008, 1562940008, NULL),
(3, 'liubei', 'liubei', '刘备', 'liubei@shu.com', 1562940071, 1563008287, NULL),
(4, 'duhaitao', 'b1ab3ba7f073e09caed072940cc5d3c4', '杜海涛', 'duhaitao@mangguo.com', 1562945023, 1562945023, NULL),
(5, 'lingling', 'lingling', '玲玲', 'lingling@qq.com', 1563118845, 1563118845, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_message`
--

CREATE TABLE IF NOT EXISTS `tp_message` (
  `id` int(11) NOT NULL,
  `content` varchar(300) NOT NULL COMMENT '留言内容',
  `member_id` int(11) NOT NULL COMMENT '留言用户ID',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_message`
--

INSERT INTO `tp_message` (`id`, `content`, `member_id`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '哈哈，来看你囖', 3, 1563355056, 0, NULL),
(2, '我爱巧玲', 4, 1563357194, 0, NULL),
(3, '今晚吃宵夜啊', 5, 1563357215, 0, NULL),
(4, '好啊，一起去啊', 3, 1563357236, 0, NULL),
(5, '就去金华悦喝夜茶吧~', 2, 1563357254, 0, NULL),
(6, '还等什么呢？走起走起', 1, 1563357271, 0, NULL),
(8, '<p>哈哈，我来啦</p><img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_org.png" alt="[坏笑]" data-w-e="1">', 3, 1563363447, 1563549915, 1563549915);

-- --------------------------------------------------------

--
-- 表的结构 `tp_system`
--

CREATE TABLE IF NOT EXISTS `tp_system` (
  `id` int(11) NOT NULL,
  `webname` varchar(50) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL COMMENT '名字',
  `age` int(11) NOT NULL COMMENT '年龄',
  `career` varchar(100) NOT NULL COMMENT '职业',
  `interest` varchar(100) NOT NULL COMMENT '兴趣爱好',
  `wechat` varchar(30) NOT NULL COMMENT '微信',
  `phone` varchar(20) NOT NULL COMMENT '电话',
  `qq` varchar(20) NOT NULL COMMENT 'QQ号码',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `url` varchar(100) NOT NULL COMMENT '域名',
  `record` varchar(50) NOT NULL COMMENT '备案信息',
  `image` varchar(100) NOT NULL,
  `art1` varchar(100) DEFAULT NULL,
  `art2` varchar(100) DEFAULT NULL,
  `art3` varchar(100) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_system`
--

INSERT INTO `tp_system` (`id`, `webname`, `copyright`, `username`, `age`, `career`, `interest`, `wechat`, `phone`, `qq`, `email`, `url`, `record`, `image`, `art1`, `art2`, `art3`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '巧玲小站', '沙雕巧玲 版权所有', '梁巧玲', 20, '超级会计师', '爱好王者荣耀，吃鸡', '15219982820', '15219982820', '1583059394', '1583059394@qq.com', 'qiaoling.love', '粤ICP备：07087879号', '/static/images/20190714/my.jpg', NULL, NULL, NULL, 0, 1563613464, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_whisper`
--

CREATE TABLE IF NOT EXISTS `tp_whisper` (
  `id` int(11) NOT NULL,
  `content` varchar(300) NOT NULL COMMENT '微语内容',
  `image` varchar(200) NOT NULL COMMENT '图片',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_whisper`
--

INSERT INTO `tp_whisper` (`id`, `content`, `image`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '&lt;p&gt;疯狂测试&lt;/p&gt;<p>哈哈哈哈</p>', '/static/images/whisper/20190719\\11e675780a2bb33c35091ed3aaea74b0.png', 1563340034, 1563547517, NULL),
(2, '明天也不知道会怎么样呢，也许会发达也不一定呢？', '/static/images/20190714/157f8957398be849f25311571d30fe32.jpg', 1563348117, 0, NULL),
(3, '今天天气是真的很好呢，超级适合听光的', '/static/images/20190714/157f8957398be849f25311571d30fe32.jpg', 1563348386, 1563535196, NULL),
(7, '<p>我来测试下呢</p>', '/static/images/whisper/20190719\\f69535a93302b16ac8f032446a94f046.png', 1563545868, 1563545868, NULL),
(6, '<p>愉快的一天又结束啦</p>', '/static/images/whisper/20190719\\ab363c22f4c261ea662b041d6ed7b7d7.png', 1563545634, 1563545634, NULL),
(8, '<p>测试下</p>', '/static/images/whisper/20190719\\245776e94cacf5491b144b8b79e5b37d.png', 1563545925, 1563545925, NULL),
(9, '<p>再来测试下</p>', '/static/images/whisper/20190719\\5b273cda360adb4840a1f002160d9fc5.png', 1563545954, 1563545954, NULL),
(10, '&amp;lt;p&amp;gt;哈哈，臭尼玛&amp;lt;/p&amp;gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;<p><br></p>', '/static/images/whisper/20190720\\cc7536eb118e7259e6f914b98cd81ef7.jpg', 1563546004, 1563606125, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_whisper_com`
--

CREATE TABLE IF NOT EXISTS `tp_whisper_com` (
  `id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL COMMENT '微语评论内容',
  `member_id` int(11) NOT NULL COMMENT '评论用户ID',
  `whisper_id` int(11) NOT NULL COMMENT '微语ID',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_whisper_com`
--

INSERT INTO `tp_whisper_com` (`id`, `content`, `member_id`, `whisper_id`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '我也觉得很开心呢', 3, 1, 1563340034, 1563549938, 1563549938),
(2, '哈哈！一定会发达的！', 4, 2, 1563348117, 0, NULL),
(3, '哈哈，让我来看看囖', 3, 3, 1563361166, 1563361166, NULL),
(4, '哈哈，我也这么觉得呢', 3, 2, 1563362198, 1563362198, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_about`
--
ALTER TABLE `tp_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_album`
--
ALTER TABLE `tp_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_article`
--
ALTER TABLE `tp_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_cate`
--
ALTER TABLE `tp_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_comment`
--
ALTER TABLE `tp_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_member`
--
ALTER TABLE `tp_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_message`
--
ALTER TABLE `tp_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_system`
--
ALTER TABLE `tp_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_whisper`
--
ALTER TABLE `tp_whisper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_whisper_com`
--
ALTER TABLE `tp_whisper_com`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tp_about`
--
ALTER TABLE `tp_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tp_album`
--
ALTER TABLE `tp_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tp_article`
--
ALTER TABLE `tp_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tp_cate`
--
ALTER TABLE `tp_cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tp_comment`
--
ALTER TABLE `tp_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tp_member`
--
ALTER TABLE `tp_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tp_message`
--
ALTER TABLE `tp_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tp_system`
--
ALTER TABLE `tp_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tp_whisper`
--
ALTER TABLE `tp_whisper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tp_whisper_com`
--
ALTER TABLE `tp_whisper_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
