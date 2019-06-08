-- 商品・在庫

CREATE TABLE `item` (
	`item_id` int(10) NOT NULL auto_increment,
	`item_name` varchar(255) NOT NULL default '',
	`item_name_kana` varchar(255) NOT NULL default '',
	`publisher_id` int(11) NOT NULL default '0',
	`isbn` varchar(64) NOT NULL default '',
	`release_date` datetime NOT NULL default '0000-00-00 00:00:00',
	`list_price` decimal(10,0) NOT NULL default '0',
	`sale_price` decimal(10,0) NOT NULL default '0',
	`category_id` int(11) NOT NULL default '0',
	`image_url` varchar(255) NOT NULL default '',
	`description` text NOT NULL,
	PRIMARY KEY (`item_id`),
	KEY `release_date` (`release_date`),
	KEY `list_price` (`list_price`),
	KEY `sale_price` (`sale_price`),
	KEY `publisher_id` (`publisher_id`),
	KEY `category_id` (`category_id`)
) AUTO_INCREMENT=0;

CREATE TABLE `stock` (
	`item_id` int(11) NOT NULL default '0',
	`quantity` int(11) NOT NULL default '0',
	`arrival_date` datetime NOT NULL default '0000-00-00 00:00:00',
	`description` text NOT NULL,
	PRIMARY KEY (`item_id`)
) ;

CREATE TABLE `publisher` (
	`publisher_id` int(11) NOT NULL auto_increment,
	`publisher_name` varchar(255) NOT NULL default '',
	`publisher_name_kana` varchar(255) NOT NULL default '',
	`description` text NOT NULL,
	PRIMARY KEY (`publisher_id`),
	KEY `publisher_name` (`publisher_name`),
	KEY `publisher_name_kana` (`publisher_name_kana`)
) AUTO_INCREMENT=0 ;

-- カート

CREATE TABLE `cart` (
	`user_id` int(11) NOT NULL default '0',
	`item_id` int(11) NOT NULL default '0',
	`item_name` varchar(255) NOT NULL default '',
	`list_price` decimal(10,0) NOT NULL default '0',
	`image_url` varchar(255) NOT NULL default '',
	`purchase_quantity` int(11) NOT NULL default '0',
	`add_date` datetime NOT NULL default '0000-00-00 00:00:00'
);

-- カテゴリー

CREATE TABLE `category` (
	`category_id` int(11) NOT NULL auto_increment,
	`parent_id` int(11) NOT NULL default '0',
	`category_name` varchar(64) NOT NULL default '',
	PRIMARY KEY (`category_id`)
) AUTO_INCREMENT=0;

-- 会員






CREATE TABLE `users` (
	`user_id` int(11) NOT NULL auto_increment,
	`user_name` varchar(32) NOT NULL default '',
	`user_name_kana` varchar(32) NOT NULL default '',
	`mailaddress` varchar(128) NOT NULL default '',
	`password` varchar(32) NOT NULL default '',
	`register_date` datetime NOT NULL default '0000-00-00 00:00:00',
	`login_date` datetime NOT NULL default '0000-00-00 00:00:00',
	`sex` tinyint(4) NOT NULL default '0',
	`birth_day` datetime NOT NULL default '0000-00-00 00:00:00',
	`postal_code` varchar(16) NOT NULL default '0000000',
	`xmpf` varchar(5) NOT NULL default '',
	`address` varchar(64) NOT NULL default '',
	`phone_number` varchar(16) NOT NULL default '',
	`state` int(1) NOT NULL default '0',
	PRIMARY KEY (`user_id`)
) AUTO_INCREMENT=0;
