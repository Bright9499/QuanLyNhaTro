CREATE TABLE roles (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(255) NOT NULL,
                       create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE permissions (
                             id INT AUTO_INCREMENT PRIMARY KEY,
                             name VARCHAR(255) NOT NULL,
                             create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE role_permissions (
                                  role_id INT,
                                  permission_id INT,
                                  FOREIGN KEY (role_id) REFERENCES roles(id),
                                  FOREIGN KEY (permission_id) REFERENCES permissions(id),
                                  PRIMARY KEY (role_id, permission_id),
                                  create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_roles (
                            user_id INT,
                            role_id INT,
                            FOREIGN KEY (user_id) REFERENCES users(id),
                            FOREIGN KEY (role_id) REFERENCES roles(id),
                            PRIMARY KEY (user_id, role_id),
                            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
