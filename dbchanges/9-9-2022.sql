ALTER TABLE `tbl_user` ADD `reset_token` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'forgot password token' AFTER `address`;
