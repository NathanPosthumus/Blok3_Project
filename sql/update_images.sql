-- Add image column to recipes table
ALTER TABLE recipes ADD COLUMN image VARCHAR(100);

-- Update recipes with corresponding image filenames
UPDATE recipes SET image = 'spag.jpg' WHERE name = 'Spaghetti Carbonara';
UPDATE recipes SET image = 'tikka.jpg' WHERE name = 'Chicken Tikka Masala';
UPDATE recipes SET image = 'stirfry.jpg' WHERE name = 'Vegetarian Stir Fry';
UPDATE recipes SET image = 'beeftacos.jpg' WHERE name = 'Beef Tacos';
UPDATE recipes SET image = 'greek.jpg' WHERE name = 'Greek Salad';
UPDATE recipes SET image = 'choco.jpg' WHERE name = 'Chocolate Chip Cookies';
UPDATE recipes SET image = 'grilled.jpg' WHERE name = 'Grilled Salmon';
UPDATE recipes SET image = 'risotto.jpg' WHERE name = 'Mushroom Risotto';
UPDATE recipes SET image = 'bbq.jpg' WHERE name = 'BBQ Pulled Pork';
UPDATE recipes SET image = 'avo.jpg' WHERE name = 'Avocado Toast';