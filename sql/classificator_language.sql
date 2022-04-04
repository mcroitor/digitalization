CREATE TABLE cl_language (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
);

INSERT INTO cl_language (name) VALUES 
('romanian language, latin graphic'),
('romanian language, chyrilic graphic'),
('russian language'),
('gagauzian language'),
('bulgarian language'),
('other language');