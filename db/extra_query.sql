ALTER TABLE `tbl_skp_terbit` 
  ADD `status` INT NOT NULL DEFAULT '1';

ALTER TABLE `tbl_upi` 
  ADD `filektp_upi` VARCHAR(255) NOT NULL, 
  ADD `filenpwp_upi` VARCHAR(255) NOT NULL,
  ADD `filesewamenyewa_upi` varchar(255) NOT NULL,
  ADD `filesertifikatpengolahikan_upi` varchar(255) NOT NULL,
  ADD `filesptpajak_upi` varchar(255) NOT NULL;

