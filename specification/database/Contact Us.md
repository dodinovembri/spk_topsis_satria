# Contact Us
Contact Us table.

```sql
CREATE TABLE contact_us (
	id INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(100) NULL,
	email VARCHAR(100) NULL,
	subject VARCHAR(100) NULL,
    pesan TEXT NULL,
	PRIMARY KEY (id)
);
```