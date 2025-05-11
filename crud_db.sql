-- Drop existing users table if it exists
DROP TABLE IF EXISTS `users`;

-- Create new users table
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `activity` VARCHAR(255) NOT NULL,
  `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(50) NOT NULL,
  `category` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Optional: Sample data
INSERT INTO `users` (`name`, `activity`, `status`, `category`)
VALUES
('Josiah Closas', 'Sing Gig', 'Ongoing', 'Personal'),
('Godwin Piedad', 'Case Study Defense', 'Completed', 'Academic');
