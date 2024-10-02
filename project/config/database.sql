-- Создание базы данных orbita_atletic
CREATE DATABASE orbita_atletic;
USE orbita_atletic;

-- Создание таблицы для администраторов
CREATE TABLE administrators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Создание таблицы для тренеров
CREATE TABLE trainers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    avatar_path VARCHAR(255)
);
