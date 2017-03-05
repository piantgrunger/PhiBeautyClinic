/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  piant
 * Created: Aug 23, 2016
 */

create view v_komisi
as
select s.tgl_sesitreatment,k.kode_karyawan,k.nama_karyawan,t.nama_treatment,t.komisi_treatment from tb_sesitreatment S
LEFT JOIN tb_d_notatreatment DN on DN.id_d_NotaTreatment=s.id_d_notatreatment
LEFT JOIN tb_treatment t on t.id_treatment=DN.id_Treatment
LEFT JOIN tb_karyawan k on k.id_karyawan=s.id_karyawan;

CREATE TABLE `react`.`tb_m_kas` ( `id` INT NOT NULL AUTO_INCREMENT , `no_kas` varchar(50) NOT NULL , `tgl_kas` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `react`.`tb_d_kas` ( `id_d_kas` INT NOT NULL AUTO_INCREMENT , `id_m_kas` INT NOT NULL , `ket` VARCHAR(200) NOT NULL , `debet_rp` DOUBLE NOT NULL DEFAULT '0' , `kredit_rp` DOUBLE NOT NULL DEFAULT '0' , PRIMARY KEY (`id_d_kas`), INDEX (`id_m_kas`)) ENGINE = InnoDB;


ALTER TABLE `tb_d_kas` ADD FOREIGN KEY (`id_m_kas`) REFERENCES `react`.`tb_m_kas`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

