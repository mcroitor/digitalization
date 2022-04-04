
CREATE TABLE cl_institution_type (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
);

INSERT INTO cl_institution_type (name) VALUES 
('University'),
('College'),
('Professional School'),
('Liceum'),
('Gimnasium'),
('Primary School'),
('Middle School');