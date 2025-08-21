-- Create database
CREATE DATABASE IF NOT EXISTS portfolio;
USE portfolio;

-- Create projects table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    project_url VARCHAR(255),
    tags VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a sample project
INSERT INTO projects (title, description, image_url, project_url, tags)
VALUES (
    'Sample Project',
    'This is a sample project description.',
    'assets/sample.jpg',
    'https://example.com',
    'html,css,school'
); 