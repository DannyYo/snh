CREATE TABLE `atme` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`wid` int(11) NOT NULL COMMENT '提到我的微博id',
`uid` int(11) NOT NULL COMMENT '所属用户id',
PRIMARY KEY (`id`) ,
INDEX `uid` (`uid`),
INDEX `wid` (`wid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=5
COMMENT='提到我的微博';

CREATE TABLE `comments` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '评论内容',
`createTime` timestamp NOT NULL COMMENT '评论时间',
`uid` int(11) NOT NULL COMMENT '评论者id',
`wid` int(11) NOT NULL,
PRIMARY KEY (`id`) ,
INDEX `uid` (`uid`),
INDEX `wid` (`wid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
COMMENT='微博评论表';

CREATE TABLE `follows` (
`follow` int(10) UNSIGNED NOT NULL COMMENT '关注人id',
`fans` int(10) UNSIGNED NOT NULL COMMENT '被关注人id',
`gid` int(11) NOT NULL COMMENT '所属分组id',
INDEX `follow` (`follow`),
INDEX `fans` (`fans`),
INDEX `gid` (`gid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
COMMENT='用户关注与粉丝表';

CREATE TABLE `groups` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`uid` int(11) NOT NULL COMMENT '所属用户id',
PRIMARY KEY (`id`) ,
INDEX `uid` (`uid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=10
COMMENT='关注分组表';

CREATE TABLE `keeps` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uid` int(11) NOT NULL COMMENT '收藏者id',
`createTime` timestamp NOT NULL COMMENT '收藏时间',
`wid` int(11) NOT NULL COMMENT '收藏者id',
PRIMARY KEY (`id`) ,
INDEX `wid` (`wid`),
INDEX `uid` (`uid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
COMMENT=' 收藏表';

CREATE TABLE `letters` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`from` int(11) NOT NULL COMMENT '发信用户id',
`content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '私信内容',
`createTime` timestamp NOT NULL COMMENT '发送时间',
`uid` int(11) NOT NULL COMMENT '收信人id',
PRIMARY KEY (`id`) ,
INDEX `uid` (`uid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
COMMENT='私信列表';

CREATE TABLE `pictures` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`mini` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '小图',
`medium` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '中图',
`max` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '大图\n',
`wid` int(11) NOT NULL COMMENT '所属微博id',
PRIMARY KEY (`id`) ,
INDEX `wid` (`wid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
COMMENT='微博配图表';

CREATE TABLE `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`account` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`password` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`createTime` timestamp NOT NULL,
`lock` tinyint(1) NOT NULL DEFAULT 0,
PRIMARY KEY (`id`) ,
INDEX `account` (`account`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=5
COMMENT='用户表';

CREATE TABLE `userinfo` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
`truename` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
`sex` enum('男','女') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '男',
`location` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
`constellation` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '星座',
`intro` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
`face50` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
`face80` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
`face180` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
`style` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default',
`follow` int(10) UNSIGNED NOT NULL DEFAULT 0,
`fans` int(10) UNSIGNED NOT NULL DEFAULT 0,
`weibo` int(10) UNSIGNED NOT NULL DEFAULT 0,
`uid` int(11) NOT NULL COMMENT '所属用户id',
PRIMARY KEY (`id`) ,
INDEX `uid` (`uid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=5
COMMENT='用户信息表';

CREATE TABLE `moments` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '微博内容',
`isTurn` int(11) NOT NULL DEFAULT 0 COMMENT '是否转发（0：原创 or 原作者id）',
`createTime` timestamp NOT NULL COMMENT '发布时间',
`turn` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '转发次数',
`keep` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '收藏次数',
`comment` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论次数',
`uid` int(11) NOT NULL COMMENT '所属用户id',
PRIMARY KEY (`id`) ,
INDEX `uid` (`uid`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=20
COMMENT='微博表';

CREATE TABLE `weights` (
`id` int NOT NULL,
`uid` int NOT NULL,
`weight` int NOT NULL COMMENT '体重',
`createTime` timestamp NOT NULL COMMENT '记录时间',
PRIMARY KEY (`id`) 
);

