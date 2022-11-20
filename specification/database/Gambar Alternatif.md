# Gambar Alternatif
Gambar Alternatif table.

```sql
CREATE TABLE gambar_alternatif (
	id INT NOT NULL AUTO_INCREMENT,
	id_alternatif INT NOT NULL,
	gambar VARCHAR(50) NULL,
    status INT NOT NULL DEFAULT 1,
	PRIMARY KEY (id)
);
```