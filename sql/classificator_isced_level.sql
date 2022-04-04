CREATE TABLE cl_isced_level (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
);

INSERT INTO cl_isced_level (name) VALUES 
('ISCED2'),
('ISCED3'),
('ISCED4a'),
('ISCED4b'),
('ISCED5'),
('ISCED6'),
('ISCED7'),
('ISCED8');
