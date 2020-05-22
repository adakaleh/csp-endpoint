CREATE TABLE reports (
	id bigint auto_increment primary key,
	report longtext,
	CHECK (JSON_VALID(report))
);
