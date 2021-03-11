DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `product`;

CREATE TABLE `category` (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(36) DEFAULT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE `product` (
    id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(36) DEFAULT NULL,
    description VARCHAR(255) DEFAULT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY(id)
);
ALTER TABLE product ADD FOREIGN KEY (category_id) REFERENCES category(id);

INSERT INTO category (id, name) values (1, 'Smartphones');
INSERT INTO product (id, name, description, category_id) values (1, 'SAMSUNG S9+', 'Version 2019', 1);
