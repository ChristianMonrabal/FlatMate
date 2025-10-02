CREATE DATABASE IF NOT EXISTS flatmate_prueba
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE flatmate_prueba;

-- TABLA DE ESTADOS
CREATE TABLE statuses (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    UNIQUE(type, name)
) ENGINE=InnoDB;

-- USERS 
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NULL,
    email_verified_at TIMESTAMP NULL,
    google_id VARCHAR(150) UNIQUE NULL,
    remember_token VARCHAR(100) NULL,
    gender ENUM('male','female','other') NULL,
    age INT NULL,
    dni VARCHAR(20) UNIQUE NULL,
    smoker BOOLEAN DEFAULT 0,
    has_children BOOLEAN DEFAULT 0,
    pets TEXT NULL,
    hobbies TEXT NULL,
    profile_photo VARCHAR(255) NULL,

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
) ENGINE=InnoDB;

-- ANUNCIOS
CREATE TABLE ads (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,  
    status_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    postal_code VARCHAR(20) NOT NULL,
    floor VARCHAR(50) NULL,            
    area INT NULL,                     
    rooms INT DEFAULT 1,
    bathrooms INT DEFAULT 1,
    terrace BOOLEAN DEFAULT 0,
    storage BOOLEAN DEFAULT 0,         
    monthly_price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (status_id) REFERENCES statuses(id)
) ENGINE=InnoDB;

-- FOTOS DEL ANUNCIO
CREATE TABLE ad_photos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ad_id BIGINT UNSIGNED NOT NULL,
    photo_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL,
    FOREIGN KEY (ad_id) REFERENCES ads(id)
) ENGINE=InnoDB;

-- FAVORITOS
CREATE TABLE favorites (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    ad_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL,
    UNIQUE (user_id, ad_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (ad_id) REFERENCES ads(id)
) ENGINE=InnoDB;

-- POSTULACIONES ("me interesa")
CREATE TABLE applications (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ad_id BIGINT UNSIGNED NOT NULL,
    applicant_id BIGINT UNSIGNED NOT NULL, 
    status_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (ad_id) REFERENCES ads(id),
    FOREIGN KEY (applicant_id) REFERENCES users(id),
    FOREIGN KEY (status_id) REFERENCES statuses(id)
) ENGINE=InnoDB;

-- CHATS
CREATE TABLE chats (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ad_id BIGINT UNSIGNED NOT NULL,
    user_one_id BIGINT UNSIGNED NOT NULL, 
    user_two_id BIGINT UNSIGNED NOT NULL, 
    created_at TIMESTAMP NULL,
    FOREIGN KEY (ad_id) REFERENCES ads(id),
    FOREIGN KEY (user_one_id) REFERENCES users(id),
    FOREIGN KEY (user_two_id) REFERENCES users(id)
) ENGINE=InnoDB;

-- MENSAJES
CREATE TABLE messages (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    chat_id BIGINT UNSIGNED NOT NULL,
    sender_id BIGINT UNSIGNED NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP NULL,
    FOREIGN KEY (chat_id) REFERENCES chats(id),
    FOREIGN KEY (sender_id) REFERENCES users(id)
) ENGINE=InnoDB;

-- CONTRATOS
CREATE TABLE contracts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ad_id BIGINT UNSIGNED NOT NULL,
    landlord_id BIGINT UNSIGNED NOT NULL,
    tenant_id BIGINT UNSIGNED NOT NULL,
    status_id BIGINT UNSIGNED NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NULL,
    monthly_rent DECIMAL(10,2) NOT NULL,
    file_path VARCHAR(255) NULL, 
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (ad_id) REFERENCES ads(id),
    FOREIGN KEY (landlord_id) REFERENCES users(id),
    FOREIGN KEY (tenant_id) REFERENCES users(id),
    FOREIGN KEY (status_id) REFERENCES statuses(id)
) ENGINE=InnoDB;
