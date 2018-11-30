/*
Navicat MySQL Data Transfer

Source Server         : my_server
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : coffee

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-11-29 14:31:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cates
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类主题名称',
  `english_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类主题英文名称',
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类主题描述',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cates
-- ----------------------------
INSERT INTO `cates` VALUES ('1', '意式浓缩咖啡', 'Espresso', '意式浓缩是一种具有强烈口感的咖啡类型，发明及发展于意大利，制作过程借由短时间而高压冲煮而成，将咖啡的风味浓缩后，口感尤为强烈', 'img02.jpg', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `cates` VALUES ('2', '美式咖啡', 'Americano', '美式时使用滴滤式咖啡壶所制作的黑咖啡，简单来说，美式就是加了水的意式浓缩，口感相对较淡，但萃取时间较长（四到五分钟），所以咖啡因含量也较高，不宜多喝。', 'img01.jpg', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `cates` VALUES ('3', '单品咖啡', 'Single coffee', '就是用原产地出产的单一咖啡豆磨制而成，饮用时一般不加奶或糖的纯正咖啡。单品咖啡有强烈的特性，口感特别，或清新柔和，或香醇顺滑，成本较高，因此价格也比较贵。', 'img02.jpg', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `cates` VALUES ('4', '速溶咖啡', 'Instant Coffee', '速溶咖啡，是通过将咖啡萃取液中的水分蒸发而获得的干燥的咖啡提取物。速溶咖啡能够很快的溶化在热水中，而且在储运过程中占用的空间和体积更小，更耐储存。', 'img03.jpg', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `cates` VALUES ('5', '卡布奇诺', 'Cappuccino', '卡布奇诺是一种以同量的意大利浓缩和泡沫牛奶制作而成的意式咖啡。卡布奇诺是一种泡沫咖啡，喝下去后能品味到奶泡的甜腻，再接着就能品味到意式浓缩的苦涩和浓郁。', 'img01.jpg', '2018-11-27 11:54:15', '2018-11-27 11:54:15');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('9', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('10', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('11', '2018_11_17_235608_create_products_table', '1');
INSERT INTO `migrations` VALUES ('12', '2018_11_18_105005_create_cates_table', '1');
INSERT INTO `migrations` VALUES ('13', '2018_11_18_120758_create_prop_names_table', '1');
INSERT INTO `migrations` VALUES ('14', '2018_11_18_120953_create_prop_values_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '产品名称',
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '产品价格',
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品描述',
  `photo_size` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1:1' COMMENT '产品图片宽高比',
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '产品图片上传路径',
  `recommend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '店家推荐',
  `prop_names` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1,2,3,4' COMMENT '产品所有属性名id',
  `prop_values` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '产品所有属性可能值id',
  `prop_defaults` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,0,0,0' COMMENT '产品所有属性对应默认值',
  `sell` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品销量',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品分类id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '蓝山咖啡', '122', '咖啡拥有所有好咖啡的特点，不仅口味浓郁香醇，而且由于咖啡的甘、酸、苦三味搭配完美，所以完全不具苦味，仅有适度而完美的酸味。', '0.68019323671498:1', 'img/product/S7cduRBFgS5IQrnvLoJsHebxJzfeHqFysbbPzEgn.jpeg', '0', '1,2,3,4', '1,2,3,4,5,6,8,7,9,10,11,12', '1,5,8,10', '0', '2', '2018-11-27 11:54:15', '2018-11-29 03:39:07');
INSERT INTO `products` VALUES ('2', '美式淡咖啡', '356', '美式淡咖啡是一种低咖啡因，让既想享受咖啡香醇提神的人、又害怕咖啡太刺激影响健康的人，借此获得双重享受的咖啡种类。', '0.5634375:1', 'img/product/3ht8ZZiuUNcKzmXE6HNjoopnjGKrJTlfJzOGitDQ.jpeg', '0', '1,2,3,4', '1,3,5,6,10,8', '1,5,0,10', '0', '2', '2018-11-27 11:54:15', '2018-11-29 03:40:38');
INSERT INTO `products` VALUES ('3', '菠萝冰美式咖啡', '161', '菠萝冰美式咖啡阳光、海浪、沙滩，世上最艳丽的风景被夏威夷拥抱；阳伞、美女、比基尼，世上最性感的灵魂被夏威夷依恋。', '0.66428571428571:1', 'img/product/aiuamSFpxxlG1c6Ymw7K5UFNjexy5jmETiOEmmnx.jpeg', '0', '1,2,3,4', '1,2,3,5,8,12,7,10', '1,5,8,12', '0', '2', '2018-11-27 11:54:15', '2018-11-29 03:41:59');
INSERT INTO `products` VALUES ('4', '冰咖啡', '925', '冰咖啡是一款适合夏天饮用的清凉饮品。将非常浓的咖啡和冰块混合，再加入小豆蔻这种原产于东印度群岛的香料，配以奶油和糖，即可制成。', '0.668:1', 'img/product/KapmyE5Ycy8juhFZNqgJUdONYyhZsKiA8Dt3YlRU.jpeg', '0', '1,2,3,4', '2,3,4,6,7,8,12,11', '2,6,8,11', '0', '2', '2018-11-27 11:54:15', '2018-11-29 03:42:59');
INSERT INTO `products` VALUES ('5', '焦糖玛琪朵', '139', '由香浓热牛奶上加入浓缩咖啡、香草，最后淋上纯正焦糖而成，“Caramel”就是焦糖的意思。焦糖玛琪朵就是加了焦糖的Macchiato，代表“甜蜜的印记”。', '0.5625:1', 'img/product/eG3FjBJ7HftHls4n0FP2Oar9o9uda3QZoST7j888.jpeg', '0', '1,2,3,4', '2,3,6,5,9,7,12,11', '2,6,9,12', '0', '2', '2018-11-27 11:54:15', '2018-11-29 03:43:58');
INSERT INTO `products` VALUES ('6', '意大利咖啡', '41', '具有浓郁的香味及强烈的苦味，咖啡的表面并浮现一层薄薄的咖啡油脂，这层油正是意大利咖啡诱人香味的来源。适合那些追求强烈味觉感受的人。', '0.75:1', 'img/product/l385m82kll5UoZUFHsv6uiAvxkQTwFiRujKtkmfE.jpeg', '0', '1,2,3,4', '3,2,5,4,9,7,10,12,11', '3,5,9,10', '0', '1', '2018-11-27 11:54:15', '2018-11-29 03:44:56');
INSERT INTO `products` VALUES ('101', '烤鸭', '200', 'asdfsadfasdfsadfsadfsadf', '1:1', '', '0', '1,2,3,4', '', '0,0,0,0', '0', '0', '2018-11-28 09:21:38', '2018-11-28 09:21:38');
INSERT INTO `products` VALUES ('8', '意式速溶咖啡', '958', '就是我们平常用咖啡直接冲出来的那种，味道浓郁，入口微苦，咽后留香。适合上班族。', '0.6675567423231:1', 'img/product/GgmzKYxgWANWsGjb7meknajiwdYjFwf9IlEvk8BM.jpeg', '0', '1,2,3,4', '2,5,3,1,6,4,9,11', '2,5,9,11', '0', '1', '2018-11-27 11:54:15', '2018-11-29 06:16:22');
INSERT INTO `products` VALUES ('9', '摩卡咖啡', '920', '是一种最古老的咖啡，是由意大利浓缩咖啡、巧克力酱、鲜奶油和牛奶混合而成，摩卡得名于有名的摩卡港。', '1.4985014985015:1', 'img/product/8D9DmjJXLo5nfRajHE45DKCj3P88F9g3JF4eIn8Q.jpeg', '0', '1,2,3,4', '3,5,6,8,12', '3,5,8,12', '0', '1', '2018-11-27 11:54:15', '2018-11-29 03:46:51');
INSERT INTO `products` VALUES ('10', '卡布奇诺', '153', '以等量的浓缩咖啡和蒸汽泡沫牛奶混合的意大利咖啡。咖啡的颜色就像卡布奇诺教会的修士在深褐色的外衣上覆上一条头巾一样，咖啡因此得名。', '0.6675567423231:1', 'img/product/vOn8lEUqzrFFfYrN2uP3HFcSmP5qfxxO5I0yiQIJ.jpeg', '0', '1,2,3,4', '3,2,4,8,11,12', '3,4,8,11', '0', '1', '2018-11-27 11:54:15', '2018-11-29 03:48:47');
INSERT INTO `products` VALUES ('11', '冰咖啡', '471', '冰咖啡是一款适合夏天饮用的清凉饮品。将非常浓的咖啡和冰块混合，再加入小豆蔻这种原产于东印度群岛的香料，配以奶油和糖，即可制成。', '0.66696309470876:1', 'img/product/rO9B4AD056zGVINRlsn8jgCIxNXp387afggH3jHU.jpeg', '0', '1,2,3,4', '3,2,5,6,9,7,10,11', '3,5,9,10', '0', '1', '2018-11-27 11:54:15', '2018-11-29 03:49:35');
INSERT INTO `products` VALUES ('12', '白咖啡', '379', '是马来西亚的特产，白咖啡的颜色并不是白色，但是比普通咖啡更清淡柔和，白咖啡味道纯正，甘醇芳香。', '0.67476383265857:1', 'img/product/jkBYUhuw9Ni8jTJaJ7QhexBqGPDomXVYnya7IDHb.jpeg', '0', '1,2,3,4', '3,2,4,6,8,9,11,12', '3,4,8,11', '0', '1', '2018-11-27 11:54:15', '2018-11-29 03:50:32');
INSERT INTO `products` VALUES ('13', '康宝蓝', '897', '意大利咖啡品种之一，与玛琪雅朵齐名，由浓缩咖啡喝鲜奶油混合而成，咖啡在下面，鲜奶油在咖啡上面。', '0.6675567423231:1', 'img/product/7JpiF1KClndWdiCV8k5K8P3ivPqfXyb5y2LAHgfv.jpeg', '0', '1,2,3,4', '2,4,6,8,7,9,11,10,12', '2,4,8,11', '0', '1', '2018-11-27 11:54:15', '2018-11-29 03:51:25');
INSERT INTO `products` VALUES ('14', '摩卡咖啡', '493', '是一种最古老的咖啡，是由意大利浓缩咖啡、巧克力酱、鲜奶油和牛奶混合而成，摩卡得名于有名的摩卡港。其独特之甘，酸，苦味，极为优雅.', '0.66666666666667:1', 'img/product/yqGLSe87UXqTxGQNEnlRL0xs6EZYsqOYoeRjCSAi.jpeg', '0', '1,2,3,4', '1,3,6,7,8,11', '1,6,7,11', '0', '1', '2018-11-27 11:54:15', '2018-11-29 06:23:08');
INSERT INTO `products` VALUES ('17', '维也纳咖啡', '149', '奥地利最著名的咖啡，由浓缩咖啡、鲜奶油和巧克力混合而成。奶油柔和爽口，咖啡润滑微苦，糖浆即溶未溶。', '0.66666666666667:1', 'img/product/jUCxDMyA6K1GO4rfTuhcVXDaHnquBWd5CHw2Qq0b.jpeg', '0', '1,2,3,4', '2,1,6,5,7,12', '2,6,7,12', '0', '3', '2018-11-27 11:54:15', '2018-11-29 03:52:02');
INSERT INTO `products` VALUES ('18', '曼特宁咖啡', '428', '具有糖浆味和巧克力味，而酸味就显得不突出，但有种浓郁的醇度，是德国人喜爱的品种，咖啡爱好者大都单品饮用。它也是调配混合咖啡不可或缺的品种。', '0.67476383265857:1', 'img/product/gUzCgoWEgvs4wt5Y9B4phdWljqyvB07io8ZwdFl0.jpeg', '0', '1,2,3,4', '2,1,4,6,7,11,12', '2,4,7,11', '0', '3', '2018-11-27 11:54:15', '2018-11-29 03:52:42');
INSERT INTO `products` VALUES ('20', '爪哇咖啡', '654', '产于印度尼西亚爪哇岛，颗粒饱满，含辛辣味，酸度相对较低，口感细腻，均衡度好，是精致的芳香型咖啡。', '0.66577896138482:1', 'img/product/8RgGXjjWAJyuB5IUik26zpB460PxAoYGDwO1KD1K.jpeg', '0', '1,2,3,4', '1,2,6,5,8,12', '1,6,8,12', '0', '3', '2018-11-27 11:54:15', '2018-11-29 03:54:03');
INSERT INTO `products` VALUES ('21', '炭烧咖啡', '125', '由日本人最早用木炭烘培咖啡豆而得名。这种咖啡喝起来确实有一种炭烧的味道，但是不会很浓，保留了咖啡原有的味道，口味纯正，这可能和日本人饮食习惯比较清淡有关。', '0.66577896138482:1', 'img/product/kkLLoLneE0wqyUrhVZKRVzbpyThm7HRheBDVq1Tj.jpeg', '0', '1,2,3,4', '1,2,5,6,8,9,10,12', '2,5,8,10', '0', '3', '2018-11-27 11:54:15', '2018-11-29 03:54:42');
INSERT INTO `products` VALUES ('22', '中原G7速溶咖啡', '309', '中原G7速溶咖啡是由越南中原股份公司出品一种中文版的速溶咖啡。该咖啡虽然是速溶咖啡，但是味儿香浓醇厚，不仔细品尝都尝不出来是速溶咖啡，跟现煮的味道差不多。', '0.66666666666667:1', 'img/product/5722f7rvJqaXQX2fuwt2X4ZcxfgDLlOnPXuCBCMd.jpeg', '0', '1,2,3,4', '2,3,5,8,9,12,10', '2,5,9,12', '0', '4', '2018-11-27 11:54:15', '2018-11-29 03:55:21');
INSERT INTO `products` VALUES ('23', '雀巢咖啡', '948', '“雀巢咖啡”是世界上第一个速溶咖啡品牌，保有独特的咖啡香醇，拥有悠久的历史与传承。过去的78年间，雀巢咖啡已经从一罐咖啡发展成为如今全面的产品种类和系统。', '0.66430469441984:1', 'img/product/EQGu24NNMqke6JFXs98uizNpBAkepLA7bamN9G3p.jpeg', '0', '1,2,3,4', '3,5,7,9,12,11', '3,5,7,12', '0', '4', '2018-11-27 11:54:15', '2018-11-29 03:56:03');
INSERT INTO `products` VALUES ('24', '冻干咖啡', '659', '冻干咖啡片较好地保留了咖啡原有风味，由于具有疏松多孔的内部结构，溶解速度快，是方便计量的“速溶咖啡”，可以容易地控制所得饮料的浓度。', '0.66666666666667:1', 'img/product/orAutXFQGnkWYDo0htxkt1n3Zyc4bw10822Hm3O3.jpeg', '0', '1,2,3,4', '3,2,5,6,9,8,11', '2,5,9,11', '0', '4', '2018-11-27 11:54:15', '2018-11-29 03:56:50');
INSERT INTO `products` VALUES ('25', '速溶咖啡不加糖', '272', '所谓爱和恨,永远没有终点,何时才能斩断。 所以过去和未来,永远不会同时出现,何时才能圆满。', '0.66050198150594:1', 'img/product/3YiTlzTCsQPT01x3kdeF4x43XrTWveyDTVBjEg8m.jpeg', '0', '1,2,3,4', '2,4,5,8,11,10,7', '2,4,7,11', '0', '4', '2018-11-27 11:54:15', '2018-11-29 06:24:22');

-- ----------------------------
-- Table structure for prop_names
-- ----------------------------
DROP TABLE IF EXISTS `prop_names`;
CREATE TABLE `prop_names` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品属性 名称',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of prop_names
-- ----------------------------
INSERT INTO `prop_names` VALUES ('1', '规格', '2018-11-29 11:33:58', '2018-11-29 11:33:59');
INSERT INTO `prop_names` VALUES ('2', '温度', '2018-11-29 11:34:16', '2018-11-29 11:34:18');
INSERT INTO `prop_names` VALUES ('3', '糖', '2018-11-29 11:34:35', '2018-11-29 11:34:38');
INSERT INTO `prop_names` VALUES ('4', '奶', '2018-11-29 11:34:47', '2018-11-29 11:34:48');

-- ----------------------------
-- Table structure for prop_values
-- ----------------------------
DROP TABLE IF EXISTS `prop_values`;
CREATE TABLE `prop_values` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '产品属性值 名称',
  `prop_name_id` int(10) unsigned NOT NULL COMMENT '产品属性名 id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of prop_values
-- ----------------------------
INSERT INTO `prop_values` VALUES ('1', '大杯', '1', '2018-11-29 03:35:25', '2018-11-29 03:35:25');
INSERT INTO `prop_values` VALUES ('2', '中杯', '1', '2018-11-29 03:35:32', '2018-11-29 03:35:32');
INSERT INTO `prop_values` VALUES ('3', '小杯', '1', '2018-11-29 03:35:52', '2018-11-29 03:35:52');
INSERT INTO `prop_values` VALUES ('4', '冰', '2', '2018-11-29 03:36:06', '2018-11-29 03:36:06');
INSERT INTO `prop_values` VALUES ('5', '常温', '2', '2018-11-29 03:36:13', '2018-11-29 03:37:46');
INSERT INTO `prop_values` VALUES ('6', '热', '2', '2018-11-29 03:36:20', '2018-11-29 03:37:51');
INSERT INTO `prop_values` VALUES ('7', '无糖', '3', '2018-11-29 03:36:30', '2018-11-29 03:36:30');
INSERT INTO `prop_values` VALUES ('8', '半糖', '3', '2018-11-29 03:36:38', '2018-11-29 03:36:38');
INSERT INTO `prop_values` VALUES ('9', '单糖', '3', '2018-11-29 03:36:48', '2018-11-29 03:36:48');
INSERT INTO `prop_values` VALUES ('10', '无奶', '4', '2018-11-29 03:37:00', '2018-11-29 03:37:00');
INSERT INTO `prop_values` VALUES ('11', '单份奶', '4', '2018-11-29 03:37:09', '2018-11-29 03:37:09');
INSERT INTO `prop_values` VALUES ('12', '双份奶', '4', '2018-11-29 03:37:18', '2018-11-29 03:37:18');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `phone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sex` enum('w','m') COLLATE utf8mb4_unicode_ci DEFAULT 'm',
  `auth` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'Ansel Stracke Sr.asdfsa', 'lakin.london@example.com', '1234', '1543396854.jpg', '16343994140', 'w', '1', '1', 'L9RzofCcSV', '2018-11-27 11:54:15', '2018-11-28 09:20:54');
INSERT INTO `users` VALUES ('3', 'Tracy Stroman', 'kunze.ona@example.net', '1234', '', '15986328125', 'm', '2', '0', 'uUGHnSSkMt', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('4', 'Ruthie Barton Sr.', 'lindgren.ulises@example.com', '1234', '', '11468505859', 'w', '2', '1', 'BA443cjTWG', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('5', 'Waylon West', 'jcruickshank@example.com', '1234', '', '11228027343', 'm', '2', '1', 'GSIXJHV7qF', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('6', 'Ms. Kaylee Kuhn', 'jedediah.dickens@example.com', '1234', '', '18702392578', 'm', '3', '0', 'rnxk2CvBwx', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('7', 'Prof. Phoebe Weber Sr.', 'pouros.maudie@example.org', '1234', '', '12329101562', 'w', '2', '1', '5LenUp9JqS', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('8', 'Dr. Cicero Ward', 'quinten.schmidt@example.org', '1234', '', '15545654296', 'w', '3', '0', 'wGeabX5c4v', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('9', 'Prof. Lexi Rolfson', 'hahn.tracy@example.com', '1234', '', '16789550781', 'w', '3', '1', 'nvZo7B0jof', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('10', 'Mr. Carleton McLaughlin DDS', 'willms.mercedes@example.org', '1234', '', '19498291015', 'w', '3', '0', '4aGG4uhOyQ', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('11', 'Johnson West', 'giovanna.bernhard@example.com', '1234', '', '12109375000', 'w', '2', '0', 'qUkKWb3S2U', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('12', 'Mrs. Makayla McClure', 'hfriesen@example.com', '1234', '', '18060302734', 'm', '1', '0', 'DjilLpEhdS', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('13', 'Alison Stoltenberg', 'rthompson@example.com', '1234', '', '15788574218', 'w', '3', '0', 'HUn5UBED9Z', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('14', 'Koby Keebler V', 'lloyd80@example.com', '1234', '', '18731689453', 'w', '1', '1', 'k5Vwmmx8te', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('15', 'Katrina Ryan', 'lang.alf@example.org', '1234', '', '15327148437', 'w', '0', '1', '1NTMfPwYce', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('16', 'Elton Morar III', 'kulas.shanny@example.net', '1234', '', '19012451171', 'w', '0', '1', 'SlVFLx71V4', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('17', 'Demetris Lind', 'kirlin.pattie@example.com', '1234', '', '18225097656', 'm', '2', '1', 'fwHtwJPxKk', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('18', 'Eveline Boyer MD', 'marisol.watsica@example.net', '1234', '', '16402587890', 'm', '3', '1', 'E1oA3PjedA', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('19', 'Prof. Lon Von III', 'dcartwright@example.net', '1234', '', '11982421875', 'w', '2', '0', 'IBgCiFxU8L', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('20', 'Weldon Kemmer', 'salma.lynch@example.org', '1234', '', '18402099609', 'm', '0', '0', 'AqKU45VYfZ', '2018-11-27 11:54:15', '2018-11-27 11:54:15');
INSERT INTO `users` VALUES ('21', 'JunYi123123123', '1234@qq.com', '$2y$10$AZjFPfzDNj7AQOsILLEiC.yMpjam.Fqzf2Vw2q9x3rJ0R/nC1./uO', '', '15928053775', 'm', null, null, null, '2018-11-27 11:55:39', '2018-11-28 09:19:09');
