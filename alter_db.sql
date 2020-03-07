use aqms;

INSERT INTO aqm_stasiun (id_stasiun, nama, lat,lon,alamat,kota,provinsi)
SELECT * FROM (SELECT 'GRESIK_TEK01', 'BLH GRESIK','' as lat,'' as lon,'' as alamat,'Gresik','Jawa Timur') AS tmp
WHERE NOT EXISTS (
    SELECT `id_stasiun` FROM aqm_stasiun WHERE `id_stasiun` = 'GRESIK_TEK01'
) LIMIT 1;

INSERT INTO aqm_stasiun (id_stasiun, nama, lat,lon,alamat,kota,provinsi)
SELECT * FROM (SELECT 'GRESIK_GAS01', 'BLH GRESIK PORTABLE','' as lat,'' as lon,'' as alamat,'Gresik','Jawa Timur') AS tmp
WHERE NOT EXISTS (
    SELECT `id_stasiun` FROM aqm_stasiun WHERE `id_stasiun` = 'GRESIK_GAS01'
) LIMIT 1;

ALTER TABLE indoor_groups ADD COLUMN IF NOT EXISTS params varchar(255) default null AFTER caption;

DELETE FROM indoor_groups WHERE id_group='1';
INSERT INTO indoor_groups (id_group, group_name, id_stasiun, caption,params) VALUES 
('1', 'Gresik','GRESIK_TEK01','BLH GRESIK','pm10,so2,co,o3,no2|pressure,humidity,temperature'),
('1', 'Gresik','GRESIK_GAS01','BLH GRESIK PORTABLE','so2,no2|pressure,humidity,temperature');