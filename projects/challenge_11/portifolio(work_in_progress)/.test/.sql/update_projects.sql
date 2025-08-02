-- Add long_description column to projects table
ALTER TABLE projects ADD COLUMN long_description TEXT AFTER description;

-- Update existing projects with long descriptions (optional)
UPDATE projects SET long_description = description WHERE long_description IS NULL; 