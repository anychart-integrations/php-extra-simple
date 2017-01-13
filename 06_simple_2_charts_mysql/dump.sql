CREATE DATABASE IF NOT EXISTS `anychart_sample_database`;
USE `anychart_sample_database`;

CREATE TABLE `anychart_sample_products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate latin1_german2_ci NOT NULL,
  PRIMARY KEY  (`id`)
);

INSERT INTO `anychart_sample_products` (`id`, `name`) VALUES (1, 'Product A');
INSERT INTO `anychart_sample_products` (`id`, `name`) VALUES (2, 'Product B');


CREATE TABLE `anychart_sample_orders` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `volume` float unsigned NOT NULL,
  PRIMARY KEY  (`id`)
);

INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (1, 1, '2007-01-01', 120);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (2, 1, '2007-02-01', 230);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (3, 1, '2007-03-01', 160);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (4, 1, '2007-04-01', 540);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (5, 1, '2007-05-01', 110);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (6, 2, '2007-02-01', 130);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (7, 2, '2007-03-01', 250);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (8, 2, '2007-04-01', 320);
INSERT INTO `anychart_sample_orders` (`id`, `product_id`, `date`, `volume`) VALUES (9, 2, '2007-05-01', 420);