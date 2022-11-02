USE butler;

CREATE TABLE `orders` (
	`id` varchar(255) NOT NULL,
	`status` ENUM('Completed','Incompleted') NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci';