-- ====================================
-- DATABASE 2: RECIPES
-- ====================================
CREATE TABLE recipes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    prep_time INT,
    cook_time INT,
    servings INT,
    difficulty VARCHAR(20),
    calories_per_serving INT,
    main_ingredient VARCHAR(50),
    vegetarian BOOLEAN,
    image VARCHAR(100)
);

INSERT INTO recipes (name, category, prep_time, cook_time, servings, difficulty, calories_per_serving, main_ingredient, vegetarian, image) VALUES
('Spaghetti Carbonara', 'Italian', 10, 15, 4, 'Medium', 520, 'Pasta', false, 'spag.jpg'),
('Chicken Tikka Masala', 'Indian', 20, 30, 6, 'Hard', 380, 'Chicken', false, 'tikka.jpg'),
('Vegetarian Stir Fry', 'Asian', 15, 10, 3, 'Easy', 220, 'Vegetables', true, 'stirfry.jpg'),
('Beef Tacos', 'Mexican', 15, 20, 4, 'Easy', 410, 'Beef', false, 'beeftacos.jpg'),
('Greek Salad', 'Mediterranean', 10, 0, 2, 'Easy', 180, 'Cucumber', true, 'greek.jpg'),
('Chocolate Chip Cookies', 'Dessert', 15, 12, 24, 'Easy', 150, 'Flour', true, 'choco.jpg'),
('Grilled Salmon', 'Seafood', 5, 15, 2, 'Medium', 340, 'Salmon', false, 'grilled.jpg'),
('Mushroom Risotto', 'Italian', 10, 25, 4, 'Hard', 290, 'Rice', true, 'risotto.jpg'),
('BBQ Pulled Pork', 'American', 15, 480, 8, 'Medium', 450, 'Pork', false, 'bbq.jpg'),
('Avocado Toast', 'Breakfast', 5, 5, 1, 'Easy', 280, 'Avocado', true, 'avo.jpg');