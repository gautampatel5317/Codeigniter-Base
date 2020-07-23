CREATE TABLE `tbl_email_templates` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `type_id` int(10) unsigned NOT NULL,
 `title` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `subject` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `body` text COLLATE latin1_general_ci NOT NULL,
 `status` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
 `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
 `createdBy` int(11) NOT NULL,
 `createdDtm` datetime NOT NULL,
 `updatedBy` int(11) NOT NULL,
 `updatedDtm` datetime NOT NULL,
 PRIMARY KEY (`id`),
 KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci


CREATE TABLE `tbl_email_template_types` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `name` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci


CREATE TABLE `tbl_email_template_placeholders` (
 `id` int(20) NOT NULL AUTO_INCREMENT,
 `name` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci
