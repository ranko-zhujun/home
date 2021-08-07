
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for catalog
-- ----------------------------
DROP TABLE IF EXISTS `catalog`;
CREATE TABLE `catalog`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `catalogname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '目录名称',
  `createtime` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `updatetime` timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  `catalogtype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '目录所属分类',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 213 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of catalog
-- ----------------------------
INSERT INTO `catalog` VALUES (205, '产品分类一', '0000-00-00 00:00:00', '2021-08-03 14:18:09', 'product');
INSERT INTO `catalog` VALUES (206, '产品分类二', '2021-06-21 18:17:14', '2021-08-02 11:26:39', 'product');
INSERT INTO `catalog` VALUES (207, '案例分类一', '2021-06-22 11:23:45', '2021-08-02 11:26:43', 'case');
INSERT INTO `catalog` VALUES (208, '案例分类二', '2021-06-22 11:25:35', '2021-08-02 11:26:44', 'case');
INSERT INTO `catalog` VALUES (210, '新闻动态', '2021-08-02 12:04:38', '2021-08-02 12:04:42', 'article');
INSERT INTO `catalog` VALUES (211, '下载信息', '2021-08-02 12:05:22', '2021-08-02 12:05:32', 'download');
INSERT INTO `catalog` VALUES (212, '招聘信息', '2021-08-02 12:05:27', '2021-08-02 12:05:35', 'employee');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主题ID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标题',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '内容',
  `createtime` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) COMMENT '创建时间',
  `updatetime` timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '状态',
  `catalogId` int(11) NOT NULL DEFAULT 0 COMMENT '目录ID',
  `metavalues` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '属性值',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 528 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES (470, '案例一', '案例一', '0000-00-00 00:00:00', '2021-06-22 10:35:45', 'online', 0, NULL);
INSERT INTO `post` VALUES (490, '企业网站建设的作用', '1 提高企业整体形象，增强企业品牌的曝光度。一个优秀的企业网站是企业的一张名片，好的企业网站可以提高企业的知名度。\r\n\r\n2 有利于业务的的直接转化，提高业务转化率。网站关键词排名，尤其是关键业务排名，加上优秀的营销型落地页，可以为企业直接带来订单。\r\n\r\n3 帮助企业了解市场，利于企业及时调整战略。通过流量统计工具分析，以及网站及时沟通工具，可以让企业更加了解用户需求，了解市场行情，便于企业方针调整。\r\n\r\n4 作为市场营销的一种工具，配合其他营销手段做全网营销。企业网站是市场营销中不可或缺的重要部分，和其他的转化渠道是相辅相成的关系。', '2021-06-09 10:11:08', '2021-08-02 12:05:01', 'online', 210, NULL);
INSERT INTO `post` VALUES (491, '公司网站的作用没有想的那么简单', '互联网高速发展的今天，一个好的网站正是一个企业在互联网上的“门面”。许多人对公司网站的作用理解不深，在建站成本上一缩在缩，这样，公司网站最后就成了一个摆设，企业建站的作用也就无法得到体现。那么，公司网站究竟有什么作用？企业建站有没有意义呢？\r\n\r\n\r\n1、有利于提升企业形象\r\n\r\n网站的作用更像是企业在报纸和电视上所做的宣传广告。但不同之处在于网站的容量更大，企业可以把任何想让客户及公众知道的内容统统放入网站。且网站的投入比其它广告形式成本更低，可以达到一次建站终身使用。\r\n\r\n2，24小时展示网站的产品\r\n\r\n网站可以打破时间的局限性，全天候的展示产品，从而大幅度降低企业宣传成本。\r\n\r\n\r\n3，打破地域限制，拉近客户的距离\r\n\r\n大家设想一下如果没有网络，公司的产品是不是主要靠本地销售。如果我们有了网站，我们就可以把我们的产品卖到全国各地，甚至国外人民。哪怕远在天涯，大家都可以购买你公司的产品。从而扩大企业的销售渠道。\r\n\r\n\r\n4，增加企业暴光率\r\n\r\n一个公司怎么才能让更多的人知道呢？得自己宣传。现实生活中，公司一般会打广告，找业务员去谈生意，或是直接去销售产品。网站也是一样，如果想让别人知道你公司的产品或者服务就得宣传。至于宣传，网站也是最好的选择。', '2021-06-09 10:12:54', '2021-08-02 12:05:02', 'online', 210, NULL);
INSERT INTO `post` VALUES (492, '什么是博客？博客与网站的区别是什么？', '经常会有人问什么是博客，它和网站的区别是什么？如果你打算开一个博客或者网站，那么理解这些概念对你也有一定的帮助。\r\n\r\n在这篇小白指南中，我们将详细解释什么是博客以及博客和传统网站之间的区别。我们还会讨论到博客的使用场景、真实案例以及他们的收益。\r\n\r\n什么是博客？\r\n博客是网站的一种形式，它的内容是以时间轴的形式倒序展示的（即最新的内容出现在第一个位置）。\r\n\r\n博客通常是由个人或者一小撮人运营的，以对话的形式呈现信息。不过，现在也有很多大公司使用博客来对外发布信息和观点。\r\n\r\n典型的博客文章还有一个评论区可以让用户对文章发表评论。\r\n\r\n博客的历史\r\n博客是从90年代中的在线日记和期刊发展而来。 当时，互联网用户已经在做个人网页，他们定期发布最新的有关个人生活，思想和社交评论的内容。\r\n\r\n“web log（网络日志）”这个词是在90年代末开始使用的，后来变成了“weblog”，然后“we blog”，最后演变成了 “blog” 。\r\n\r\n由于网页数量的不断增长，网络上出现了许多工具，这些工具可以帮助用户更方便的创建在线日志或博客，也是这些工具促成了博客的流行，让不懂技术的用户也可以参与进来。\r\n\r\n在1999年，博客平台http://Blogger.com上线，后来在2003年2月的时候被Google收购。\r\n\r\n同年5月，WordPress发布了它的第一个博客平台版本。\r\n\r\n今天，WordPress已经成为全世界最流行的博客平台，网络上超过30%的网站都是由WordPress驱动。\r\n\r\n博客和网站之间的区别是什么？\r\n博客是网站的一个类型。博客和其他类型的网站之间唯一真正的区别就是，博客定期更新内容并按时间倒序展示（最新的内容在最前面）。\r\n\r\n传统的网站是静态的，内容都是在页面上写好的，并且不会频繁更新。但是博客是动态的，更新的频率更高。一些博主每天会更新好多篇文章。\r\n\r\n博客可以是一个大型网站的一部分。企业网站通常会有一个博客版块用来定期更新内容去向客户传递新的东西。\r\n\r\n网站和博客，这两个都可以用WordPress来搭建，所以很多小企业都会使用WordPress去搭建他们的企业站点。\r\n\r\n简单说就是，所有的博客都可以称之为网站或者是网站的一部分。但是，并不是所有的网站都可以被称为博客。\r\n\r\n你也可以这么说，博客是由文章通过分类和标签组织起来展示内容的，而网站是由页面展示内容。\r\n\r\n博客还是网站 – 选哪个更好？\r\n作为一个小白，你可以会想到底是开一个博客呢还是建一个网站，哪个比较好？说实话，这还真的是需要根据你自身的需求来决定。\r\n\r\n全球有很多的小企业都有传统的网站，就是几个页面组成的，没有博客系统。这些小网站的作用一般也只是为企业，组织或者个人在网络上展示一些信息而已。\r\n\r\n从另一方面来说，越来越多的企业开始意识到博客在市场推广策略中的巨大潜力。他们会给传统的网站添加一个单独的博客模块，这样可以从搜索引擎获得更多的流量。\r\n\r\n不管你是一个企业，非盈利组织或者某个专业领域的人士，给网站增加博客都可以帮助你更好的达成目标。', '2021-06-09 10:18:56', '2021-08-02 12:05:03', 'online', 210, NULL);
INSERT INTO `post` VALUES (493, 'BBS的英文全称是Bulletin Board System，翻译为中文就是“电子公告板', 'BBS的英文全称是Bulletin Board System，翻译为中文就是“电子公告板\r\nBBS在国内一般称作网络论坛，早期的BBS与一般街头和校园内的公告板性质相同，只不过是通过电脑来传播或获得消息而已\r\nBBS系统最初是为了给计算机爱好者提供一个互相交流的地方。70年代后期，计算 bbs\r\n机用户数目很少且用户之间相距很远。因此，BBS系统（当时全世界一共不到一百个站点）提供了一个简单方便的交流方式，用户通过 BBS可以交换软件和信息。到了今天，BBS的用户已经扩展到各行各业，除原先的计算机爱好者们外，商用BBS操作者、环境组织、宗教组织及其它利益团体也加入了这个行列。只要浏览一下世界各地的BBS系统，你就会发现它几乎就象地方电视台一样，花样非常多。', '2021-06-09 10:20:23', '2021-08-02 12:05:06', 'online', 210, NULL);
INSERT INTO `post` VALUES (508, '产品示例一', '<p>产品示例一</p>', '0000-00-00 00:00:00', '2021-08-02 14:21:23', 'online', 205, '[{\"key\":\"price\",\"value\":\"889\"},{\"key\":\"image\",\"value\":\"upload/product-2.jpg\"}]');
INSERT INTO `post` VALUES (509, '产品示例二', '产品示例一', '0000-00-00 00:00:00', '2021-08-02 14:55:32', 'online', 206, '[{\"key\":\"price\",\"value\":\"799\"},{\"key\":\"image\",\"value\":\"upload/product-1.jpg\"}]');
INSERT INTO `post` VALUES (510, '产品示例三', '产品示例一', '0000-00-00 00:00:00', '2021-08-02 14:55:34', 'online', 206, '[{\"key\":\"price\",\"value\":\"1999\"},{\"key\":\"image\",\"value\":\"upload/product-3.jpg\"}]');
INSERT INTO `post` VALUES (511, '产品示例四', '产品示例一', '2021-06-21 18:10:10', '2021-08-02 14:55:43', 'online', 205, '[{\"key\":\"price\",\"value\":\"989\"},{\"key\":\"image\",\"value\":\"upload/product-4.jpg\"}]');
INSERT INTO `post` VALUES (512, '产品示例五', '<p>产品示例一</p>', '0000-00-00 00:00:00', '2021-08-02 14:55:38', 'online', 205, '[{\"key\":\"price\",\"value\":\"2999\"},{\"key\":\"image\",\"value\":\"upload/product-5.jpg\"}]');
INSERT INTO `post` VALUES (513, '产品示例六', '<p>产品示例一</p>', '0000-00-00 00:00:00', '2021-08-02 14:55:48', 'online', 205, '[{\"key\":\"price\",\"value\":\"699\"},{\"key\":\"image\",\"value\":\"upload/product-6.jpg\"}]');
INSERT INTO `post` VALUES (514, '产品示例七', '产品示例一', '2021-06-21 18:10:15', '2021-08-02 14:55:51', 'online', 205, '[{\"key\":\"price\",\"value\":\"3999\"},{\"key\":\"image\",\"value\":\"upload/product-1.jpg\"}]');
INSERT INTO `post` VALUES (516, '案例一', '<p>案例一</p>', '0000-00-00 00:00:00', '2021-08-03 09:55:13', 'online', 207, '[{\"key\":\"image\",\"value\":\"upload/case-1.jpg\"}]');
INSERT INTO `post` VALUES (517, '案例二', '<p>案例一</p>', '0000-00-00 00:00:00', '2021-08-03 09:59:27', 'online', 207, '[{\"key\":\"image\",\"value\":\"upload/case-2.jpg\"}]');
INSERT INTO `post` VALUES (518, '案例三', '案例一', '2021-06-22 10:47:15', '2021-08-03 09:59:30', 'online', 207, '[{\"key\":\"image\",\"value\":\"upload/case-3.jpg\"}]');
INSERT INTO `post` VALUES (519, '案例四', '案例一', '0000-00-00 00:00:00', '2021-08-03 09:59:32', 'online', 208, '[{\"key\":\"image\",\"value\":\"upload/case-4.jpg\"}]');
INSERT INTO `post` VALUES (520, '案例五', '案例一', '0000-00-00 00:00:00', '2021-08-03 09:59:36', 'online', 207, '[{\"key\":\"image\",\"value\":\"upload/case-5.jpg\"}]');
INSERT INTO `post` VALUES (521, '案例六', '案例一', '2021-08-03 14:50:35', '2021-08-03 14:50:36', 'online', 208, '[{\"key\":\"image\",\"value\":\"upload/case-6.jpg\"}]');
INSERT INTO `post` VALUES (522, '案例七', '案例一', '2021-06-22 10:47:21', '2021-08-03 09:59:43', 'online', 208, '[{\"key\":\"image\",\"value\":\"upload/case-7.jpg\"}]');
INSERT INTO `post` VALUES (523, '资深软件开发工程师', '岗位职责：  \r\n1. 根据客户的需求，按照软件部的开发流程和规范，负责软件功能模块或产品的整体需求分析、方案设计、编码、测试、维护、文档化等相关工作，在进度要求内给出满足质量要求的功能模块或产品；  \r\n2. 积极配合软件测试工程师，参与制定测试方案，积极思考和解决开发/测试过程中碰到的问题。  \r\n3. 协助产品经理、软件总工、技术销售工程师解决现场问题，提供外部支持服务；  \r\n4. 协助总工或系统分析工程师进行产品知识的积淀、组内工作方法改进；  \r\n5. 关注行业技术的发展趋势、提升自己的专业技能和业务知识，为产品的更新、改进提供建议。  \r\n6. 其他相关事务，为产品组或平台线快速交付优质产品提供支持。  \r\n\r\n任职资格：  \r\n1. 计算机、软件工程、自动化、数理、机电一体化及相关专业本科及以上学历。  \r\n2. 正直诚实，工作主动积极，学习能力强，能够承受较大工作压力； \r\n3. 做事严谨踏实，责任心强，条理清楚，善于学习总结，有良好的敬业精神、团队合作精神以及沟通协调能力。  \r\n4. 精通C/C++语言或/C#语言，能够编写高质量代码；  \r\n5. 熟悉多线程编程，熟练使用SDK、GDI等；  \r\n6. 熟练使用各类办公软件，尤其是Excel和PPT；  \r\n7. 英语CET-4以上，具备英文读写能力。  ', '2021-06-25 15:32:04', '2021-08-02 12:06:17', 'online', 212, NULL);
INSERT INTO `post` VALUES (524, '下载文档', '<p>下载文档</p>', '2021-08-03 14:50:32', '2021-08-03 14:50:33', 'online', 211, '[{\"key\":\"download\",\"value\":\"upload/download.txt\"}]');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `loginpassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `createtime` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updatetime` timestamp(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `super` tinyint(255) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `loginname`(`loginname`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'ranko', '21232f297a57a5a743894a0e4a801fc3', '2021-07-27 14:34:16', '2021-07-27 17:24:03', 'active', 1);
INSERT INTO `user` VALUES (3, '232323', '232323', '2021-07-27 17:18:19', '2021-07-27 17:21:27', 'disabled', 0);
INSERT INTO `user` VALUES (7, '22', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-27 17:30:55', '2021-07-27 17:50:00', 'active', 0);
INSERT INTO `user` VALUES (8, '22322323', 'b6d767d2f8ed5d21a44b0e5886680cb9', '2021-07-27 17:37:20', '2021-07-27 17:37:20', 'active', 0);

SET FOREIGN_KEY_CHECKS = 1;
