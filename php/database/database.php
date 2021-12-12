<?php
class Database
{

    private array $config;
    protected $mysqli;

    function __construct()
    {
        $this->config = require "database_config.php";
        $this->mysqli = new mysqli(
            $this->config["host"],
            $this->config["user"],
            $this->config["password"],
            $this->config["db"]
        );
        // Check connection
        if ($this->mysqli === false) {
            die("ERROR: Could not connect. " . $this->mysqli->connect_error);
        } else {
            $this->init();
        }
    }

    /**
     * Initalizes the database if database does not exist
     * otherwise just use the previously created database
     */
    private function init()
    {
        if ($this->isInitalized()) {
            $this->mysqli->query("USE dobuy");
        } else {
            $initScript = $this->initScript();
            if (!$this->mysqli->multi_query($initScript)) {
                throw new Exception("Failed to create database dobuy.");
            }
        }
    }

    /**
     * Returns init script with insert command for admin user
     * Functions also hashes the default admin password
     */
    private function initScript(): string
    {
        $hashPassword = password_hash("admin", PASSWORD_BCRYPT);
        return "CREATE DATABASE IF NOT EXISTS dobuy DEFAULT CHARACTER SET utf8;
        USE dobuy; 
        
        CREATE TABLE IF NOT EXISTS role (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(45) NULL,
        PRIMARY KEY (id))
        ENGINE = InnoDB;

        INSERT INTO role (id, name) VALUES ('1', 'admin');
        INSERT INTO role (id, name) VALUES ('2', 'user');

        CREATE TABLE IF NOT EXISTS user (
        username VARCHAR(45) NOT NULL,
        password VARCHAR(65) NULL,
        email VARCHAR(45) NULL,
        firstname VARCHAR(45) NULL,
        lastname VARCHAR(45) NULL,
        role INT NOT NULL,
        PRIMARY KEY (username),
        
        CONSTRAINT fk_user_role
            FOREIGN KEY (role)
            REFERENCES role (id))
        ENGINE = InnoDB;

        INSERT INTO user (username, password, email, firstname, lastname, role) VALUES ('admin', '$hashPassword', 'admin@gmail.com', 'Admin', 'Admin', '1');

        CREATE TABLE IF NOT EXISTS category (
        id INT NOT NULL,
        name VARCHAR(45) NULL,
        PRIMARY KEY (id))
        ENGINE = InnoDB;

        CREATE TABLE IF NOT EXISTS product (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(65) NULL,
        description TEXT NULL,
        price DOUBLE NOT NULL,
        imagepath VARCHAR(255) NULL,
        quantity INT NOT NULL,
        provider VARCHAR(45) NOT NULL,
        category_id INT NOT NULL,
        PRIMARY KEY (id),

        CONSTRAINT fk_product_user
            FOREIGN KEY (provider)
            REFERENCES user (username),
            
        CONSTRAINT fk_product_category
            FOREIGN KEY (category_id)
            REFERENCES category (id))
        ENGINE = InnoDB;

        CREATE TABLE IF NOT EXISTS rating (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(45) NULL,
        description TEXT NULL,
        rating INT NULL,
        user VARCHAR(45) NOT NULL,
        product_id INT NOT NULL,
        PRIMARY KEY (id, user, product_id),
        
        CONSTRAINT fk_rating_user
            FOREIGN KEY (user)
            REFERENCES user (username),
            
        CONSTRAINT fk_rating_product
            FOREIGN KEY (product_id)
            REFERENCES product (id))
        ENGINE = InnoDB;

        CREATE TABLE IF NOT EXISTS sold (
        id INT NOT NULL AUTO_INCREMENT,
        product_id INT NOT NULL,
        timestamp TIMESTAMP NULL,
        user VARCHAR(45) NOT NULL,
        PRIMARY KEY (id),

        CONSTRAINT fk_sold_product
            FOREIGN KEY (product_id)
            REFERENCES product (id),
            
        CONSTRAINT fk_sold_user
            FOREIGN KEY (user)
            REFERENCES user (username))
        ENGINE = InnoDB;";
    }

    /**
     * Checks if the database is initialized
     * @return true if database is already created
     */
    private function isInitalized(): bool
    {
        $result = $this->mysqli->query("SHOW DATABASES LIKE 'dobuy'");
        return  $result->num_rows !== 0;
    }
}
