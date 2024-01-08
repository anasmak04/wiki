
CREATE TABLE role (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);


CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(50)
);

CREATE TABLE tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100)
);

CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES role(id) ON DELETE CASCADE
);


-- CREATE TABLE wiki (
--     id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
--     title VARCHAR(255),
--     content VARCHAR(500),
--     image VARCHAR(255),
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     author_id INT,
--     FOREIGN KEY (author_id) REFERENCES user(id),
--     category_id INT,
--     FOREIGN KEY (category_id) REFERENCES category(id)
-- );


CREATE TABLE wiki (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title VARCHAR(255),
    content VARCHAR(500),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES user(id) ON DELETE CASCADE,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL
);


CREATE TABLE wikiTag (
    wiki_id INT,
    tag_id INT,
    FOREIGN KEY (wiki_id) REFERENCES wiki(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tag(id) ON DELETE CASCADE,
    PRIMARY KEY (wiki_id, tag_id)
);