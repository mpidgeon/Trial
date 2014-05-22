CREATE DATABASE roampa COLLATION utf8_general_ci;

-- NOT normalized
CREATE TABLE `tbl_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `title` VARCHAR(8) NOT NULL,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `dateofbirth` DATE NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `company` VARCHAR(64) NOT NULL,
  `password` CHAR(64) NOT NULL,
  `primaryAddressTag` VARCHAR(16) NOT NULL,
  `phonenumber` VARCHAR(20) NOT NULL,
  `mobilenumber` VARCHAR(20) NOT NULL,
  `activkey` CHAR(32) NOT NULL DEFAULT '', 
  `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` INT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- password = username
INSERT INTO `tbl_user` (`id`, `username`, `title`, `firstname`, `lastname`, `dateofbirth`, `email`, `company`, `password`, `primaryAddressTag`, `phonenumber`, `mobilenumber`, `activkey`, `create_at`, `lastvisit_at`, `status`) VALUES
(1, 'admin', '','The', 'Admin', '2014-05-01', 'sri.zebedee@gmail.com', '', '$2a$13$818E/ml3o4rPklWini3tFOQXzdrpc.tOs2L.VwtiToQF3BaR4jZPS',  
'Home', '+353906468192','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(2, 'rpa.una', 'Ms','Una', 'McNeill', '1990-04-11', 'unamcneill@gmail.com', 'RoamPA', '$2a$13$NzNYjy/GVr/5rWSLNKCLMOJjyHNm6KX10ZwKTAH1AZGAMj2C1Ld0u',  
'Home', '+353871234567','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(3, 'rpa.jim', 'Mr','James', 'McNeill', '1989-12-22', 'jimmcneill@gmail.com', 'RoamPA', '$2a$13$X8BboYwXP8c9NAD0ad8k3uIdX7J8s6E/K6KVLSTECulGRes5UA/IS',  
'Work', '+353861234568','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(4, 'rpa.tony', 'Mr','Anthony', 'Argyll', '1983-10-12', 'tonyargyll@cocacola.com', 'Coca Cola', '$2a$13$LZMEsSFF5Y2lXPd7218K2uhv0OPzwxdO7NqzrY0Kr78g0qqPzlY4S',  
'Work', '+353851234569','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(5, 'rpa.brian', 'Mr','Brian', 'Bevan', '1973-09-07', 'brianbevan@cocacola.com', 'Coca Cola', '$2a$13$9VawCnE2MszQCEaZWIpjVOwkdI0kwaohcqQjizgvscP6AzC85y8iy',  
'Work', '+353831234570','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(6, 'rpa.enda', 'Mr','Enda', 'Enright', '1963-08-09', 'endaenright@cocacola.com', 'Coca Cola', '$2a$13$2ruzi9vu9U5ouQtFPm3qFefcs9B4vrAQCZ6ejA0FTiISLTNLaM9/O',  
'Work', '+353871234571','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(7, 'rpa.john', 'Mr','John', 'Johnson', '1976-07-13', 'johnjohnson@cocacola.com', 'Coca Cola', '$2a$13$vLMRA2af4oc.4/tS//K/XucRPkZUT3wV0jj3NQ0omYCn4LJUCULJG',  
'Work', '+353861234572','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(8, 'rpa.pat', 'Mr','Pat', 'Purcell', '1990-06-14', 'patpurcell@cocacola.com', 'Coca Cola', '$2a$13$kI0JmPc/wzu7A7ZfFml9cO2hSEerlfr7I32JUvIrrJVKDLdY8HgVe',  
'Work', '+353851234573','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(9, 'rpa.mary', 'Ms','Mary', 'Macken', '1992-05-15', 'marymacken@cocacola.com', 'Coca Cola', '$2a$13$24IB0IgPuUhnLeEjehrWvuuwE5TZXueWTF90r5IALZfPOiL3RlmZ6',  
'Work', '+353831234574','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(10, 'rpa.tom', 'Mr','Thomas', 'Tierney', '1963-04-16', 'thomastierney@cocacola.com', 'Coca Cola', '$2a$13$SGkDX6rvG3ezEyMTzgmFzOxxTkBiBToDCvyx.uF.0VcW0OCk5lZ/.',  
'Work', '+353871234575','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(11, 'rpa.ann', 'Mrs','Ann', 'Acorn', '1973-11-06', 'annacorn@cocacola.com', 'Coca Cola', '$2a$13$OKcIFey6WyijuXBwTawhJ.F9eZKYodWnvvrCbniaS3.xb.fkK4U6a',  
'Work', '+353861234576','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(12, 'rpa.anthony', 'Mr','Anthony', 'Buckley', '1966-05-19', 'anthonybuckley@cocacola.com', 'Coca Cola', '$2a$13$IOXoXZnQDPuBh3Idy/St0OuiN7P/77jWlK9zhbkkT.3LlMQITQCv6',  
'Work', '+353851234577','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(13, 'rpa.emer', 'Mrs','Emer', 'Egan', '1979-08-26', 'emeregan@cocacola.com', 'Coca Cola', '$2a$13$ri491vxFPGHV5QvqOrvcD.SXX5YVMP4mtZ.n1yEvUyuz2ZawDID1K',  
'Work', '+353831234578','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(14, 'rpa.adrian', 'Mr','Adrian', 'Allen', '1969-09-16', 'adrianallen@kerrygold.ie', 'Kerrygold', '$2a$13$om3kbxp4lsQpTIrHREm8e.f1dBa6nVVtWQNZR2fUNYn20cdLZK/xq',  
'Work', '+353871234579','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(15, 'rpa.dave', 'Mr','David', 'Duffy', '1987-08-10', 'davidduffy@kerrygold.ie', 'Kerrygold', '$2a$13$6wWRLObv5FHe.Wy3IiAFKOLp.ZpapbaJXo3Pzo4VPDfLmxHPO4UAm',  
'Work', '+353861234580','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(16, 'rpa.alice', 'Ms','Alice', 'Farrell', '1989-10-13', 'alicefarrell@kerrygold.ie', 'Kerrygold', '$2a$13$5VL.bVaiT4I2MGXbzPodL.7sQzjfoSJLutCH/LRQg8kKlHUgxRj/C',  
'Work', '+353851234581','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(17, 'rpa.mags', 'Mrs','Mags', 'Doyle', '1957-09-10', 'magsdoyle@kerrygold.ie', 'Kerrygold', '$2a$13$8d.FPZ.sT998y25Klr7p.u4K.d4uKBwefBnyZumivaovXpXGFH21e',  
'Work', '+353831234582','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(18, 'rpa.bert', 'Mr','Albert', 'Reynolds', '1959-03-01', 'albertreynolds@kerrygold.ie', 'Kerrygold', '$2a$13$TPJIPykalKQz/JbllLQhqeeI6OjS8tWyIHUmVsrzuiZOGlHR1SYMC',  
'Work', '+353871234583','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(19, 'rpa.clare', 'Ms','Clare', 'Coffey', '1988-12-31', 'clarecoffey@kerrygold.ie', 'Kerrygold', '$2a$13$q7n/nU3Cv/Vee.0iBHcVOOjsB52e8qnScfzgZxiV6mDExLfTdI6Z',  
'Work', '+353861234584','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1),
(20, 'rpa.joan', 'Mrs','Joan', 'Murphy', '1977-02-15', 'joanmurphy@kerrygold.ie', 'Kerrygold', '$2a$13$c1av4d/Mruz4rLu72BMiYOkDbcVvOhdFwQKCB9A.J6ycP0QteqXbO',  
'Work', '+353851234585','','$2a$13$iXTnvagBcp07VEjdpk5TKeC8IfYQtL9C1NANHWxEMBk4S.r.9aCtS', '2014-05-20 15:47:10', '2014-05-20 15:47:10', 1);


CREATE TABLE `AuthItem`
(
   `name` VARCHAR(64) NOT NULL,
   `type` INTEGER NOT NULL,
   `description` TEXT,
   `bizrule` TEXT,
   `data` TEXT,
   PRIMARY KEY(`name`)
) engine InnoDB;

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Administrator', 2, 'System admin', NULL, 'N;'),
('RoamPAAdmin', 2, 'RoamPA Admin', NULL, 'N;'),
('RoamPAUser', 2, 'RoamPA User', NULL, 'N;'),
('CompanyAdmin', 2, 'Company Admin', NULL, 'N;'),
('CompanyUser', 2, 'Company User', NULL, 'N;'),
('ServiceProviderAdmin', 2, 'ServiceProvider Admin', NULL, 'N;'),
('ServiceProviderUser', 2, 'ServiceProvider User', NULL, 'N;'),
('User', 2, 'User', NULL, 'N;');

CREATE TABLE `AuthItemChild`
(
   `parent` VARCHAR(64) NOT NULL,
   `child`  VARCHAR(64) NOT NULL,
   PRIMARY KEY (`parent`,`child`),
   FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) engine InnoDB;

CREATE TABLE `AuthAssignment`
(
   `itemname` VARCHAR(64) NOT NULL,
   `userid` INT(11) NOT NULL,
   `bizrule` TEXT,
   `data` TEXT,
   PRIMARY KEY (`itemname`,`userid`),
   FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE 

) engine InnoDB;

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Administrator', '1', NULL, 'N;'),
('RoamPAAdmin', '2', NULL, 'N;'),
('RoamPAUser', '3', NULL, 'N;'),
('User', '4', NULL, 'N;'),
('User', '5', NULL, 'N;'),
('User', '6', NULL, 'N;'),
('User', '7', NULL, 'N;'),
('User', '8', NULL, 'N;'),
('User', '9', NULL, 'N;'),
('User', '10', NULL, 'N;'),
('CompanyAdmin', '11', NULL, 'N;'),
('CompanyUser', '12', NULL, 'N;'),
('CompanyUser', '13', NULL, 'N;'),
('User', '14', NULL, 'N;'),
('User', '15', NULL, 'N;'),
('User', '16', NULL, 'N;'),
('User', '17', NULL, 'N;'),
('CompanyUser', '18', NULL, 'N;'),
('CompanyUser', '19', NULL, 'N;'),
('CompanyUser', '20', NULL, 'N;');


CREATE TABLE `tbl_addressbook` (
  `userid` INT(11) NOT NULL,
  `tag` VARCHAR(16) NOT NULL,
  `address1` VARCHAR(8) NOT NULL,
  `address2` VARCHAR(50) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `region` VARCHAR(50) NOT NULL,
  `zipcode` VARCHAR(128) NOT NULL,
  `country` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`userid`,`tag`),
  KEY `fk_addressbook_user` (`userid`),
  CONSTRAINT `fk_addressbook_user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_addressbook` (`userid`,`tag`,`address1`,`address2`,`city`,`region`,`zipcode`,`country`) VALUES 
(1,'Home','22 Grosse Str','','Dortmund','NRW','D12345','Germany'),
(2,'Home','1 Main St','','Galway','County Galway','','Ireland'),
(3,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(4,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(5,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(6,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(7,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(8,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(9,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(10,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(11,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(12,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(13,'Work','2 Main St','','Dublin','County Dublin','D6','Ireland'),
(14,'Work','3 Lower St','','Killarney','County Kerry','','Ireland'),
(15,'Work','3 Lower St','','Killarney','County Kerry','','Ireland'),
(16,'Work','3 Lower St','','Killarney','County Kerry','','Ireland'),
(17,'Work','3 Lower St','','Killarney','County Kerry','','Ireland'),
(18,'Work','3 Lower St','','Killarney','County Kerry','','Ireland'),
(19,'Work','3 Lower St','','Killarney','County Kerry','','Ireland'),
(20,'Work','3 Lower St','','Killarney','County Kerry','','Ireland');

CREATE TABLE `tbl_taxjurisdiction` (
  `userid` INT(11) NOT NULL,
  `country` VARCHAR(16) NOT NULL,
  `startdate` DATE NOT NULL,
  `enddate` DATE NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `fk_taxjurisdiction_user` (`userid`),
  CONSTRAINT `fk_taxjurisdiction_user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `tbl_taxjurisdiction` (`userid`,`country`) VALUES 
(1,'Ireland'),
(2,'Ireland'),
(3,'Ireland'),
(4,'Ireland'),
(5,'Ireland'),
(6,'Ireland'),
(7,'Ireland'),
(8,'Ireland'),
(9,'Ireland'),
(10,'Ireland'),
(11,'Ireland'),
(12,'Ireland'),
(13,'Ireland'),
(14,'Ireland'),
(15,'Ireland'),
(16,'Ireland'),
(17,'Ireland'),
(18,'Ireland'),
(19,'Ireland'),
(20,'Ireland');
