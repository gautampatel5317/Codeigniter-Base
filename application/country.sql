CREATE TABLE `tbl_country` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `name` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `code` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `phone_code` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `status` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
 `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
 `createdBy` int(11) NOT NULL,
 `createdDtm` datetime NOT NULL,
 `updatedBy` int(11) NOT NULL,
 `updatedDtm` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci

CREATE TABLE `tbl_state` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(191) COLLATE latin1_general_ci NOT NULL,
 `country_id` int(11) unsigned NOT NULL,
 `status` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
 `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
 `createdBy` int(11) NOT NULL,
 `createdDtm` datetime NOT NULL,
 `updatedBy` int(11) NOT NULL,
 `updatedDtm` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci
