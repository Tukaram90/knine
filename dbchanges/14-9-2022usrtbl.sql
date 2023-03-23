--
ALTER TABLE `tbl_user` ADD `login_oauth_uid` VARCHAR(150) NULL DEFAULT NULL AFTER `user_id`;

ALTER TABLE `tbl_user` ADD `firstname` VARCHAR(100) NULL DEFAULT NULL AFTER `login_oauth_uid`, ADD `lastname` VARCHAR(100) NULL DEFAULT NULL AFTER 

ALTER TABLE `tbl_user` ADD `profile_picture` VARCHAR(255) NULL DEFAULT NULL AFTER `reset_token`;

ALTER TABLE `tbl_user` CHANGE `mobile` `mobile` VARCHAR(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `tbl_user` CHANGE `password` `password` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;