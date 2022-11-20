# Alternatif
Alternatif table.

```sql
CREATE TABLE alternatif (
	id INT NOT NULL AUTO_INCREMENT,
    id_jenis_alternatif INT NOT NULL,
	kode_alternatif VARCHAR(100) NULL,
	nama_alternatif VARCHAR(100) NULL,
    latitude DOUBLE (18,6) NULL,
    longitude DOUBLE (18,6) NULL,
	gambar VARCHAR(50) NULL,
	gambar_panorama VARCHAR(50) NULL,
   	keterangan TEXT NULL,
	PRIMARY KEY (id)
);
```