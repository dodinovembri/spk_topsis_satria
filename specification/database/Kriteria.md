# Kriteria
Kriteria table.

```sql
CREATE TABLE kriteria (
	id INT NOT NULL AUTO_INCREMENT,
	kode_kriteria VARCHAR(100) NULL,
	nama_kriteria VARCHAR(255) NULL,
	jenis_kriteria VARCHAR(50) NULL,
	bobot DOUBLE(18, 2) NULL,
    keterangan TEXT NULL,
	PRIMARY KEY (id)
);
```

