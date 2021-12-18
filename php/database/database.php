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
            else{
                while (mysqli_next_result($this->mysqli));
            }
        }
    }

    /**
     * Returns init script with insert command for admin user
     * Functions also hashes the default admin password
     */
    private function initScript(): string
    {
        $hashPasswordAdmin = password_hash("admin", PASSWORD_BCRYPT);
        $hashPasswordUser = password_hash("user", PASSWORD_BCRYPT);
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

        INSERT INTO user (username, password, email, firstname, lastname, role) VALUES ('admin', '$hashPasswordAdmin', 'admin@gmail.com', 'Admin', 'Admin', '1');
        INSERT INTO user (username, password, email, firstname, lastname, role) VALUES ('user', '$hashPasswordUser', 'user@gmail.com', 'User', 'User', '2');

        CREATE TABLE IF NOT EXISTS category (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(45) NULL,
        PRIMARY KEY (id))
        ENGINE = InnoDB;

        INSERT INTO category (name) VALUES ('Bücher');
        INSERT INTO category (name) VALUES ('Filme,Serien,Musik & Games');
        INSERT INTO category (name) VALUES ('Elektronik & Computer');
        INSERT INTO category (name) VALUES ('Haushalt, Garten, Tier & Baumarkt');
        INSERT INTO category (name) VALUES ('Spielzeug & Baby');
        INSERT INTO category (name) VALUES ('Kleidung');
        INSERT INTO category (name) VALUES ('Auto & Motorrad');

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

        CREATE TABLE IF NOT EXISTS ordering (
        id INT NOT NULL AUTO_INCREMENT,
        product_id INT NOT NULL,
        timestamp TIMESTAMP NULL,
        quantity INT NOT NULL,
        price DOUBLE NOT NULL,
        user VARCHAR(45) NOT NULL,
        PRIMARY KEY (id),

        CONSTRAINT fk_sold_product
            FOREIGN KEY (product_id)
            REFERENCES product (id),
            
        CONSTRAINT fk_sold_user
            FOREIGN KEY (user)
            REFERENCES user (username))
        ENGINE = InnoDB;

        CREATE TABLE IF NOT EXISTS shopping_card (
        id INT NOT NULL AUTO_INCREMENT,
        product_id INT NOT NULL,
        user VARCHAR(45) NOT NULL,
        PRIMARY KEY (id,product_id,user),

        CONSTRAINT fk_shopping_card_product
            FOREIGN KEY (product_id)
            REFERENCES product (id),
            
        CONSTRAINT fk_shopping_card_user
            FOREIGN KEY (user)
            REFERENCES user (username))
        ENGINE = InnoDB;
        
        INSERT INTO product VALUES (1,'Schaukelpferd','Zum Schaukeln',50.00,'../../assets/images/product_images/schaukelpferd.jpg',13,'admin',5);
        INSERT INTO product VALUES (2,'Schaukel','Schaukelgestell mit eins Schaukel',150.00,'../../assets/images/product_images/schaukel.jpg',133,'admin',5);
        INSERT INTO product VALUES (3,'Freyling','Warm Mountain Frey-venture Winterstiefel',35.49,'../../assets/images/product_images/winterstiefel1.jpg',10,'admin',3);
        INSERT INTO product VALUES (4,'ambellis','Winterstiefel',29.99,'../../assets/images/product_images/winterstiefel2.jpg',13,'admin',6);
        INSERT INTO product VALUES (5,'Tom Tailor','Winterstiefel',43.99,'../../assets/images/product_images/winterstiefel3.jpg',23,'admin',6);
        INSERT INTO product VALUES (6,'Superdry','TWILL LITE - Hemd - lagoon blue stripe',50.00,'../../assets/images/product_images/hemd1.jpg',17,'admin',6);
        INSERT INTO product VALUES (7,'Pferd','Zum Schaukeln',500.00,'../../assets/images/product_images/pferd.jpg',13,'admin',4);
        INSERT INTO product VALUES (8,'Apple iPhone 11','Betriebssystemfamilie: Apple iOS, Display-Diagonale: 6.1, Kameraauflösung: 12 MP, Arbeitsspeicher: 4 GB',500.00,'../../assets/images/product_images/iphone11.webp',33,'admin',3);
        INSERT INTO product VALUES (9,'Apple iPhone 12','Betriebssystemfamilie: Apple iOS, Display-Diagonale: 6.1, SIM-Kartenleser: Dual-SIM, Produktlinie: Apple iPhone',650.00,'../../assets/images/product_images/iphone12.webp',12,'admin',3);
        INSERT INTO product VALUES (10,'Apple iPhone 13 Pro Max','Betriebssystemfamilie: Apple iOS, Display-Diagonale: 6.7, Kameraauflösung: 12 MP, Arbeitsspeicher: 8 GB',1250.00,'../../assets/images/product_images/iphone13.webp',3,'admin',3);
        INSERT INTO product VALUES (11,'Samsung Galaxy A12','Betriebssystemfamilie: Android, Display-Diagonale: 6.5, Kameraauflösung: 48 MP, Auflösung Frontkamera: 8 MP',129.00,'../../assets/images/product_images/galaxya12.png',9,'admin',3);
        INSERT INTO product VALUES (12,'Samsung Galaxy A52s 5G','Betriebssystemfamilie: Android, Display-Diagonale: 6.5, Kameraauflösung: 64 MP, Auflösung Frontkamera: 32 MP',359.00,'../../assets/images/product_images/galaxya52.webp',2,'admin',3);
        INSERT INTO product VALUES (13,'Samsung Q60A','Display-Typ: QLED, HD-Standard: 4K Ultra HD, Funktionen: Smart TV, Farbe: schwarz',449.00,'../../assets/images/product_images/saf1.webp',4,'admin',3);
        INSERT INTO product VALUES (14,'Samsung QN95A','Display-Typ: HDR, Mini-LED, QLED, HD-Standard: 4K Ultra HD, TV-Tuner: 2x DVB-C, 2x DVB-S2, 2x DVB-T2, Triple-Tuner, Twin-Tuner, analog, Funktionen: 4K-Upscaling, ALLM, Ambient-Modus, Bild-in-Bild (PiP), Bluetooth, Browser, DLNA, EPG, Film-Modus, Game-Modus, HDCP 2.3, HDMI-ARC, HDMI-CEC, HDR, HDR10, HDR10+, HLG, HbbTV, Media-Player',1300.00,'../../assets/images/product_images/saf2.webp',1,'admin',3);
        INSERT INTO product VALUES (15,'Dyson V11','Produkttyp: Akkusauger, Staubauffang: Zyklon-Technologie, Einsatzbereich: Auto, Fliesen, Fugen, Laminat, Parkett, Teppich, Funktionen: Schnellentleerung',550.00,'../../assets/images/product_images/dyson.webp',3,'admin',3);";
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
