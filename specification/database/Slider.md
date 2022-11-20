# Slider
Slider table.

```sql
CREATE TABLE slider (
	id INT NOT NULL AUTO_INCREMENT,
	judul VARCHAR(255) NULL,
	gambar VARCHAR(50) NULL,
	status TINYINT NULL DEFAULT 1,
	PRIMARY KEY (id)
);
```

