/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : wxshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2021-11-02 00:09:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wxshop_ad
-- ----------------------------
DROP TABLE IF EXISTS `wxshop_ad`;
CREATE TABLE `wxshop_ad` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '幻灯片0 广告1',
  `title` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '标题',
  `img` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '图片',
  `gid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '链接的商品ID',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wxshop_ad
-- ----------------------------
INSERT INTO `wxshop_ad` VALUES ('2', '0', '手机', '20180211/062843d860ddd577f192e26b6b62e4c7.jpg', '1', '2');
INSERT INTO `wxshop_ad` VALUES ('3', '0', '日用百货', '20180206/a46d85a0ba172c6b45f2c6f1e2b6b026.jpg', '1', '1');
INSERT INTO `wxshop_ad` VALUES ('4', '1', '电脑', '20180206/18234254764e7d0cf2d85c9592a44b4d.jpg', '2', '3');
INSERT INTO `wxshop_ad` VALUES ('5', '1', 'test4', '20180206/7ca80ccb0240ad13ebdaad74aeaed234.jpg', '4', '4');
INSERT INTO `wxshop_ad` VALUES ('6', '1', 'test5', '20180206/41364f87ff8e4d90336b3f325f4edc91.jpg', '5', '5');
INSERT INTO `wxshop_ad` VALUES ('7', '1', 'test6', '20180206/66792278061b54626a0305ed10cd8092.jpg', '6', '6');
INSERT INTO `wxshop_ad` VALUES ('11', '0', '手机', '20180211/e592cfa8b91486927188319d88ed7344.jpg', '1', '3');

-- ----------------------------
-- Table structure for wxshop_category
-- ----------------------------
DROP TABLE IF EXISTS `wxshop_category`;
CREATE TABLE `wxshop_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `img` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '图片',
  `is_show_index` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '首页显示',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`pid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wxshop_category
-- ----------------------------
INSERT INTO `wxshop_category` VALUES ('1', '手机数码', '0', '', '1', '1');
INSERT INTO `wxshop_category` VALUES ('2', '家用电器', '0', '', '1', '2');
INSERT INTO `wxshop_category` VALUES ('3', '电脑办公', '0', '', '1', '3');
INSERT INTO `wxshop_category` VALUES ('4', '家具厨具', '0', '', '0', '4');
INSERT INTO `wxshop_category` VALUES ('5', '服装服饰', '0', '', '0', '5');
INSERT INTO `wxshop_category` VALUES ('6', '美妆个护 ', '0', '', '0', '6');
INSERT INTO `wxshop_category` VALUES ('7', '箱包珠宝', '0', '', '0', '7');
INSERT INTO `wxshop_category` VALUES ('8', '手机', '1', '20180215/f5e3cd84add0985b68b9334b0bca528e.jpg', '0', '1');
INSERT INTO `wxshop_category` VALUES ('9', '手机配件', '1', '20180215/a3d4e138a58a73e47dbdf9075b50156b.jpg', '0', '2');
INSERT INTO `wxshop_category` VALUES ('10', '摄影摄像', '1', '20180215/f3d88f1d515c12fb5ab3b7e4dcc8294a.jpg', '0', '3');
INSERT INTO `wxshop_category` VALUES ('11', '数码配件', '1', '20180215/1f8d285cc658affd7132743eeb68c28b.jpg', '0', '4');
INSERT INTO `wxshop_category` VALUES ('12', '影音娱乐', '1', '20180215/78c3d0479be2c2e158a059bcfaf274c1.jpg', '0', '5');
INSERT INTO `wxshop_category` VALUES ('13', '电子教育', '1', '20180215/463d1cf7d2d8d232bca4bd121a67d88c.jpg', '0', '6');
INSERT INTO `wxshop_category` VALUES ('14', '智能设备', '1', '20180215/941aad6a9a6676cf5b474e18b4731415.jpg', '0', '7');
INSERT INTO `wxshop_category` VALUES ('17', '电视', '2', '20180215/f8a3bc388b5e3d482bf89e15bed4d2b4.jpg', '0', '1');
INSERT INTO `wxshop_category` VALUES ('18', '空调', '2', '20180215/4db552348f4d046d5b1850836b26c976.jpg', '0', '2');
INSERT INTO `wxshop_category` VALUES ('19', '洗衣机', '2', '20180215/204474d43223dc5278aba1119e12089e.jpg', '0', '3');
INSERT INTO `wxshop_category` VALUES ('20', '冰箱', '2', '20180215/910b8a962c69b20f89aa7f02356e10d6.jpg', '0', '4');
INSERT INTO `wxshop_category` VALUES ('21', '电脑', '3', '20180215/2a82d46194946963fcd6e939aa879c51.jpg', '0', '1');
INSERT INTO `wxshop_category` VALUES ('22', '外设', '3', '20180215/d0d387ea162ecc520ff1c699d4673542.jpg', '0', '2');
INSERT INTO `wxshop_category` VALUES ('23', '办公设备', '3', '20180215/2c0092d2d387a7cccf34a732c9e74650.jpg', '0', '3');
INSERT INTO `wxshop_category` VALUES ('24', '家具', '4', '20180215/7b9f0be0b4c69715306d4b6521ee9515.jpg', '0', '1');
INSERT INTO `wxshop_category` VALUES ('25', '厨具', '4', '20180215/84cb93808a5a1dc0cf2a2e45f879c2fd.jpg', '0', '2');
INSERT INTO `wxshop_category` VALUES ('26', '女装', '5', '20180215/5fbb715520574252e310b4cbc019ea9e.jpg', '0', '1');
INSERT INTO `wxshop_category` VALUES ('27', '护肤', '6', '20180215/340404e32739c1c81006b43e51f3a844.jpg', '0', '1');
INSERT INTO `wxshop_category` VALUES ('28', '珠宝首饰', '7', '20180215/f8f1da2dc74391f7a88c6aad2785b222.jpg', '0', '1');

-- ----------------------------
-- Table structure for wxshop_goods
-- ----------------------------
DROP TABLE IF EXISTS `wxshop_goods`;
CREATE TABLE `wxshop_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `cid_one` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '一级分类id',
  `cid_two` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '二级分类',
  `name` varchar(120) NOT NULL DEFAULT '' COMMENT '商品名称',
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `store` smallint(5) unsigned NOT NULL DEFAULT '10' COMMENT '库存数量',
  `collect` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `content` text CHARACTER SET utf16 COMMENT '商品描述',
  `img` varchar(200) NOT NULL DEFAULT '' COMMENT '商品图片',
  `sales` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '销量',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '50' COMMENT '商品排序',
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cid_one`),
  KEY `goods_number` (`store`),
  KEY `sort_order` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wxshop_goods
-- ----------------------------
INSERT INTO `wxshop_goods` VALUES ('1', '1', '8', 'Apple iPhone X (A1865) 256GB 深空灰色 移动联通电信4G手机', '0', '100', '0', '0.01', '<p style=\"text-align: center;\"><img src=\"/uploads/20180216/59fbccda158ac65e45a546bd7c1665c2.jpg\" title=\"59fbccda158ac65e45a546bd7c1665c2.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180216/89acca9d8ee93ed93daa955f8f7ed943.jpg\" title=\"89acca9d8ee93ed93daa955f8f7ed943.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180216/56cb4257b44d5b219edcf87ec4a26e42.jpg\" title=\"56cb4257b44d5b219edcf87ec4a26e42.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180216/10ba22e9996c3763257eff988da10d44.jpg\" title=\"10ba22e9996c3763257eff988da10d44.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180216/97772520bf3f834b72b685281491541e.jpg\" title=\"97772520bf3f834b72b685281491541e.jpg\"/></p><p style=\"text-align: center;\"><br/></p>', '20180216/166d6e04fa8ee1e9f0241efc26198011.jpg', '0', '1');
