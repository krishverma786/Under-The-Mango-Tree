<?php
// Include your database connection file
include 'config.php';

// Include your existing header file (handles session_start, logo, and nav links)
include 'header.php';

// Complete, curated menu dataset accurately pulled from the UMT menu sheets
$menu_items = [
    // --- SMALL PLATES VEG ---
    ['id' => 1, 'name' => 'Med Mezze Platter', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹895', 'desc' => 'Falafel, hummus, pickled veg, baba ghanoush, tzatziki, tabbouleh, pita, lavash'],
    ['id' => 2, 'name' => 'Cheesy Corny Quesadilla', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹495', 'desc' => 'Charred vegetables, plum tomato, sweet corn, sour cream, guacamole, yellow cheddar'],
    ['id' => 3, 'name' => 'Megatron Nachos (Add Chicken / Bacon)', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹495 / ₹545 / ₹575', 'desc' => 'Queso, pico de gallo, sour cream, guacamole, salsa verde'],
    ['id' => 4, 'name' => 'Loaded French Fries (Add Chicken / Bacon)', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹495 / ₹545 / ₹575', 'desc' => 'Pico de gallo, salsa verde, queso, sour cream, guacamole'],
    ['id' => 5, 'name' => 'Beirut Beet Hummus', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹525', 'desc' => 'Roast tomato & onions, black olives, brown onions, toasted hazelnut, pomegranate, house pita'],
    ['id' => 6, 'name' => 'Korean Cottage Cheese', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹545', 'desc' => 'Crisp cottage cheese, gochujang, miso, fried cashews'],
    ['id' => 7, 'name' => 'Black Pepper Tofu', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹495', 'desc' => 'Golden fried tofu, black pepper sauce'],
    ['id' => 8, 'name' => 'Togarashi crisp corn', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹475', 'desc' => 'Golden fried American corn, togarashi, spicy mayo'],
    ['id'=> 9, 'name'=> 'Thai mushroom satay', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹545', 'desc' => 'Thai style mushroom, peanut sauce, crushed peanuts, golden onions'],
    ['id'=> 10, 'name'=> 'Mean green chaat', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹495', 'desc' => 'Crisp spinach, masala yoghurt foam, tamarind chutney, mint chutney'],
    ['id'=> 11, 'name'=> 'Shanghai mushrooms', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹525', 'desc' => 'Crisp oyster mushrooms, chilli oyster sauce'],
    ['id'=> 12, 'name'=> 'House special paneer tikka', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹495', 'desc' => 'Smoked cottage cheese, mango, mustard'],
    ['id'=> 13, 'name'=> 'Awadhi galouti', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹545', 'desc' => 'Awadh style mushroom kebabs, truffe kulcha'],
    ['id'=> 14, 'name'=> 'Broccoli malai tikka', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹525', 'desc' => 'Mint-chilli chutney, pickled onion rings'],
    ['id'=> 15, 'name'=> 'Seekh kebab', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹525', 'desc' => 'Seasonal vegetables, mint chutney, laccha onions'],
    ['id'=> 16, 'name'=> 'Queen kebab platter', 'category' => 'smallplates', 'type' => 'veg', 'price' => '₹845', 'desc' => 'Paneer tikka, mushroom galouti, veg seekh kebab, tandoori broccoli'],
    // --- SMALL PLATES NON VEG ---
    ['id' => 17, 'name' => 'Butterfly prawns', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹745', 'desc' => 'Basil butter garlic sauce, garlic bread'],
    ['id' => 18, 'name' => 'The Borough fish', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹725', 'desc' => 'Golden fried Sole, house tartare, fries'],
    ['id' => 19, 'name' => 'Whats poppin', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹645', 'desc' => 'Chicken & jalapeno poppers, chipotle ketchup'],
    ['id' => 20, 'name' => 'Lebanese mezze platter', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹1095', 'desc' => 'Lamb kefte, falafel, pickled veg, hummus, baba ghanoush, tzatziki, tabouleh, pita, lavash'],
    ['id' => 21, 'name' => 'Pepper chick quesadillas', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹1545', 'desc' => 'Spicy chicken, pico de gallo, charred vegetables, yellow cheddar, sour cream, queso, guacamole'],
    ['id' => 22, 'name' => 'Chicken souvlaki', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹545', 'desc' => 'Greek chicken skewers, garlic toum, pita, house salad'],
    ['id' => 23, 'name' => 'Hummus Bil Lahme', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹495', 'desc' => 'Roast lamb, hummus, pita bread'],
    ['id' => 24, 'name' => 'Devil chicken skewers', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹595', 'desc' => 'Grilled chicken skewers, mango chilli salsa, potato wedges'],
    ['id' => 25, 'name' => 'Ebi fry', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹745', 'desc' => 'Tempura fried prawns, wasabi mayo'],
    ['id' => 26, 'name' => 'Korean Fried Chicken', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹575', 'desc' => 'Crisp chicken, fried cashews, Korean chilli paste'],
    ['id' => 27, 'name' => 'Mango bango chicken', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹595', 'desc' => 'Crisp chicken, mango, sweet & spicy sauce'],
    ['id' => 28, 'name' => 'Thai chicken satay', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹595', 'desc' => 'Thai style chicken, peanut sauce, crushed peanuts, golden onions'],
    ['id' => 29, 'name' => 'Xinjiang lamb', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹645', 'desc' => 'Cumin flavoured crisp lamb, red chillies, scallions'],
    ['id' => 30, 'name' => 'Kolkata maachh', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹695', 'desc' => 'Kasundi mustard marinated sole fish, pickled onion, mint-chilli chutney'],
    ['id' => 31, 'name' => 'Seekh kebab', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹675', 'desc' => 'Minced mutton kebabs, mint chutney, laccha onions'],
    ['id' => 32, 'name' => 'Murg Malai Tikka', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹575', 'desc' => 'Mint chutney, laccha onion'],
    ['id' => 33, 'name' => 'Purani Dilli tandoori chicken', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹595', 'desc' => 'Mint chutney, laccha onion'],
    ['id' => 34, 'name' => 'House special chicken tikka', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹575', 'desc' => 'House smoked chicken, mango chutney, mint-chilli chutney'],
    ['id' => 35, 'name' => 'Peri-Peri chicken tikka', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹575', 'desc' => 'House smoked spicy chicken, mango chilli chutney'],
    ['id' => 36, 'name' => 'King kebab platter', 'category' => 'smallplates', 'type' => 'non-veg', 'price' => '₹995', 'desc' => 'Tandoori chicken, chicken malai tikka, mutton seekh kebab, kasundi fish tikka'],

    // --- SOUPS ---
    ['id' => 37, 'name' => 'Broccoli & Almond Soup', 'category' => 'soup', 'type' => '', 'price' => '₹345', 'desc' => 'Charred broccoli, almond slivers'],
    ['id' => 38, 'name' => 'Wild Mushroom Crème', 'category' => 'soup', 'type' => '', 'price' => '₹345', 'desc' => 'Truffle oil, confit garlic toast'],
    ['id' => 39, 'name' => 'Crispy Rice', 'category' => 'soup', 'type' => '', 'price' => '₹345', 'desc' => 'Asian clear broth, crisp rice'],
    ['id' => 40, 'name' => 'Cilantro & Lime', 'category' => 'soup', 'type' => '', 'price' => '₹345', 'desc' => 'Fresh coriander, crunchy vegetables, lemon zest'],
    ['id' => 41, 'name' => 'Khao Suey', 'category' => 'soup', 'type' => '', 'price' => '₹445', 'desc' => 'Fried onions, fried garlic, crushed peanuts, spring onions'],

    // --- BAOS ---
    ['id' => 42, 'name' => 'Sichuan Veg Fritter', 'category' => 'baos', 'type' => '', 'price' => '₹475', 'desc' => ''],
    ['id' => 43, 'name' => 'Black Pepper Mushroom', 'category' => 'baos', 'type' => '', 'price' => '₹495', 'desc' => ''],
    ['id' => 44, 'name' => 'Korean Chicken', 'category' => 'baos', 'type' => '', 'price' => '₹525', 'desc' => ''],
    ['id' => 45, 'name' => 'Lamb Char Siu', 'category' => 'baos', 'type' => '', 'price' => '₹595', 'desc' => ''],

    // --- DIMSUMS ---
    ['id' => 46, 'name' => 'Mushroom Siu Mai', 'category' => 'dimsums', 'type' => '', 'price' => '₹475', 'desc' => ''],
    ['id' => 47, 'name' => 'Asparagus & Bok Choy Crystal', 'category' => 'dimsums', 'type' => '', 'price' => '₹525', 'desc' => ''],
    ['id' => 48, 'name' => 'Scallion & Cream Cheese Har Gao', 'category' => 'dimsums', 'type' => '', 'price' => '₹545', 'desc' => ''],
    ['id' => 49, 'name' => 'Chicken & Chives', 'category' => 'dimsums', 'type' => '', 'price' => '₹595', 'desc' => ''],
    ['id' => 50, 'name' => 'Chicken & Burnt Garlic', 'category' => 'dimsums', 'type' => '', 'price' => '₹595', 'desc' => ''],
    ['id' => 51, 'name' => 'Prawn Har Goo', 'category' => 'dimsums', 'type' => '', 'price' => '₹645', 'desc' => ''],

    // --- PASTAS ---
    ['id' => 52, 'name' => 'Penne in tomato ragu', 'category' => 'pastas', 'type' => '', 'price' => '₹595 / ₹645', 'desc' => 'Spicy tomato sauce, basil, parmesan cheese'],
    ['id' => 53, 'name' => 'Penne Alfredo (Add chicken)', 'category' => 'pastas', 'type' => '', 'price' => '₹595 / ₹645', 'desc' => 'Creamy parmesan emulsion'],
    ['id' => 54, 'name' => 'Penne verdure (Add Chicken)', 'category' => 'pastas', 'type' => '', 'price' => '₹645 / ₹695', 'desc' => 'Basil pesto, parmesan, oven roast tomatoes'],
    ['id' => 55, 'name' => 'Spaghetti peperone', 'category' => 'pastas', 'type' => '', 'price' => '₹695', 'desc' => 'Chilli & red bell pepper emulsion, feta cheese'],
    ['id' => 56, 'name' => 'Spaghetti aglio e olio (Add chicken)', 'category' => 'pastas', 'type' => '', 'price' => '₹645 / ₹695', 'desc' => 'Parmesan emulsion, chili flakes'],

    // --- BETWEEN THE BREADS ---
    ['id' => 57, 'name' => 'The Squash N til burger', 'category' => 'between', 'type' => '', 'price' => '₹545', 'desc' => 'Lentil & pumpkin patty, hemp seed pesto, spicy cream cheese, arugula'],
    ['id' => 58, 'name' => 'The Shroom', 'category' => 'between', 'type' => '', 'price' => '₹595', 'desc' => 'Mushroom patty, charred onions, truffle oil, truffle mustard mayo, arugula'],
    ['id' => 59, 'name' => 'The Chick N Lickin', 'category' => 'between', 'type' => '', 'price' => '₹645', 'desc' => 'Minced chicken patty, chipotle mayo, yellow cheddar, charred onion rings'],
    ['id' => 60, 'name' => 'The Meat Mentor', 'category' => 'between', 'type' => '', 'price' => '₹695', 'desc' => 'Minced lamb patty, grain mustard mayo, caramelised onion, yellow cheddar'],
    ['id' => 61, 'name' => 'Red wrap', 'category' => 'between', 'type' => '', 'price' => '₹595', 'desc' => 'Roast beet, falafel, beet hummus, feta, muhammara, apple slaw, arugula'],
    ['id' => 62, 'name' => 'The LDH paneer tikka wrap', 'category' => 'between', 'type' => '', 'price' => '₹595', 'desc' => 'Paneer tikka, onion & tomato, chilli coriander chutney, tzatziki'],
    ['id' => 63, 'name' => 'The LDH chicken tikka wrap', 'category' => 'between', 'type' => '', 'price' => '₹645', 'desc' => 'Chicken tikka, onion & tomato, chilli-coriander chutney, tzatziki'],
    ['id' => 64, 'name' => 'The Athenian panuozzo', 'category' => 'between', 'type' => '', 'price' => '₹575', 'desc' => 'Charred zucchini, eggplant, bell peppers, basil pesto, feta'],
    ['id' => 65, 'name' => 'Chick & mush panuozzo', 'category' => 'between', 'type' => '', 'price' => '₹645', 'desc' => 'Shredded roast chicken, button mushrooms, onion & jalapeno salsa, green pepper umami mayo'],
    ['id' => 66, 'name' => 'Pesto chicken panuozzo', 'category' => 'between', 'type' => '', 'price' => '₹645', 'desc' => 'Pesto marinated pulled chicken, oven roast cherry tomatoes, pesto chilli mayo, onion rings'],



    // --- UMT PIZZERIA ---
    ['id' => 67, 'name' => 'Classic Margherita Pizza', 'category' => 'pizzeria', 'type' => 'veg', 'price' => '₹745', 'desc' => 'Bocconcini, plum tomato sauce, fresh basil'],
    ['id' => 68, 'name' => 'Quattro formaggi', 'category' => 'pizzeria', 'type' => 'veg', 'price' => '₹775', 'desc' => 'Mozzarella, parmesan, scamorza, yellow cheddar, roast leeks'],
    ['id' => 69, 'name' => 'Grilled veggie & feta', 'category' => 'pizzeria', 'type' => 'veg', 'price' => '₹745', 'desc' => 'Grilled vegetables, plum tomato sauce, mozzarella, feta, pesto'],
    ['id' => 70, 'name' => 'Fun-gi Green', 'category' => 'pizzeria', 'type' => 'veg', 'price' => '₹775', 'desc' => 'Grilled mushrooms, spinach, truffe oil, charred onions, goat cheese'],
    ['id' => 71, 'name' => 'The clock tower', 'category' => 'pizzeria', 'type' => 'non-veg', 'price' => '₹795', 'desc' => 'Peri-peri pulled chicken, pepperoncino, mozzarella'],
    ['id' => 72, 'name' => 'Pepperoni', 'category' => 'pizzeria', 'type' => 'non-veg', 'price' => '₹845', 'desc' => 'Spicy Italian salami, jalapeno'],
    ['id' => 73, 'name' => 'Chicken overload', 'category' => 'pizzeria', 'type' => 'non-veg', 'price' => '₹845', 'desc' => 'Chicken tikka, peri-peri chicken, chicken salami, shallots, roast chilli'],
    ['id' => 74, 'name' => 'Chirp', 'category' => 'pizzeria', 'type' => 'non-veg', 'price' => '₹825', 'desc' => 'Chicken tikka, shallots, mint-chilli mayo'],

    // Salads
    ['id' => 75, 'name' => 'Mango summer salad', 'category' => 'salads', 'type' => '', 'price' => '₹525', 'desc' => 'Mango, granola, feta, popped quinoa, mixed lettuce, summer berries, avocado'],
    ['id' => 76, 'name' => 'Roast pumpkin & quinoa', 'category' => 'salads', 'type' => '', 'price' => '₹475', 'desc' => 'Pumpkin seeds, roast cherry tomatoes, chimichurri, popped quinoa'],
    ['id' => 77, 'name' => 'Raw Papaya', 'category' => 'salads', 'type' => '', 'price' => '₹475', 'desc' => 'Raw papaya, tamarind-jaggery dressing, crushed peanuts'],
    ['id' => 78, 'name' => 'Shrimp citrus & chilli', 'category' => 'salads', 'type' => '', 'price' => '₹625', 'desc' => 'Poached shrimp, orange segments, arugula, popped quinoa, feta & lime dressing'],
    ['id' => 79, 'name' => 'Caesar Salad (contains egg)', 'category' => 'salads', 'type' => '', 'price' => '₹545', 'desc' => 'Romaine, iceberg, house croutons, black olives, Caesar dressing'],

// --- DESSERTS ---
    ['id' => 80, 'name' => 'Chocolate brownie', 'category' => 'desserts', 'type' => '', 'price' => '₹575', 'desc' => 'Vanilla ice cream, house chocolate ganache'],
    ['id' => 81, 'name' => 'Tiramisue', 'category' => 'desserts', 'type' => '', 'price' => '₹525', 'desc' => 'Savoiardi, coffee & mascarpone cream, cocoa dust'],
    ['id' => 82, 'name' => 'Banoffee pie', 'category' => 'desserts', 'type' => '', 'price' => '₹545', 'desc' => 'Banana jam, salted caramel, mascarpone'],
    ['id' => 83, 'name' => 'Mango & mascarpone gateaux', 'category' => 'desserts', 'type' => '', 'price' => '₹575', 'desc' => 'Mango berry salsa, mascarpone creme, hazelnut crumble'],

    // add ons
    ['id' => 84, 'name' => 'Tandoori roti', 'category' => 'addons', 'type' => '', 'price' => '₹95', 'desc' => ''],
    ['id' => 85, 'name' => 'Naan', 'category' => 'addons', 'type' => '', 'price' => '₹95', 'desc' => ''],
    ['id' => 86, 'name' => 'Laccha paratha', 'category' => 'addons', 'type' => '', 'price' => '₹95', 'desc' => ''],
    ['id' => 87, 'name' => 'French fries', 'category' => 'addons', 'type' => '', 'price' => '₹250', 'desc' => ''],
    ['id' => 89, 'name' => 'Jeera rice', 'category' => 'addons', 'type' => '', 'price' => '₹395', 'desc' => ''],


    // --- BIG PLATES ---
    ['id' => 90, 'name' => 'Dal Makhani', 'category' => 'bigplates', 'type' => '', 'price' => '₹695', 'desc' => 'Overnight cooked lentils, kasuri methi, fresh cream'],
    ['id' => 91, 'name' => 'Dal Tadka', 'category' => 'bigplates', 'type' => '', 'price' => '₹625', 'desc' => 'Boiled lentils, house special tadka'],
    ['id' => 92, 'name' => 'Lime & basil sole', 'category' => 'bigplates', 'type' => '', 'price' => '₹845', 'desc' => 'Citrus basil emulsion, parmesan mash, charred veggies'],
    ['id' => 93, 'name' => 'Herb grilled chicken', 'category' => 'bigplates', 'type' => '', 'price' => '₹795', 'desc' => 'Mustard-mushroom sauce, parmesan mash, charred veggies'],
    ['id' => 94, 'name' => 'Chicken & mushroom Stroganoff', 'category' => 'bigplates', 'type' => '', 'price' => '₹795', 'desc' => 'Herb butter rice'],
    ['id' => 95, 'name' => 'Kung pao chicken', 'category' => 'bigplates', 'type' => '', 'price' => '₹795', 'desc' => '(Jasmine rice / hakka noodles)'],
    ['id' => 96, 'name' => 'Butter chicken', 'category' => 'bigplates', 'type' => '', 'price' => '₹725', 'desc' => 'Chicken tikka in makhani gravy, fresh cream'],
    ['id' => 97, 'name' => 'Kadhai chicken', 'category' => 'bigplates', 'type' => '', 'price' => '₹725', 'desc' => 'Leg of chicken, kadhai masala'],
    ['id' => 98, 'name' => 'House mutton curry', 'category' => 'bigplates', 'type' => '', 'price' => '₹845', 'desc' => 'Slow cooked mutton bone in, house curry'],
    ['id' => 99, 'name' => 'Risotto funghi', 'category' => 'bigplates', 'type' => '', 'price' => '₹795', 'desc' => 'King oyster mushroom, truffe oil, parmesan'],
    ['id' => 100, 'name' => 'Cottage cheese steak', 'category' => 'bigplates', 'type' => '', 'price' => '₹795', 'desc' => 'Charred vegetables, bell pepper & walnut cream, herb rice'],
    ['id' => 101, 'name' => 'Kung pao cottage cheese', 'category' => 'bigplates', 'type' => '', 'price' => '₹775', 'desc' => '(Jasmine rice / Hakka noodles)'],
    ['id' => 102, 'name' => 'Veg mapo tofu', 'category' => 'bigplates', 'type' => '', 'price' => '₹775', 'desc' => 'Chunky vegetables, silken tofu, bok choy, jasmine rice'],
    ['id' => 103, 'name' => 'Thai green curry', 'category' => 'bigplates', 'type' => '', 'price' => '₹795', 'desc' => 'Jasmine Rice (Add chicken)'],
    ['id' => 104, 'name' => 'Hong Kong mushrooms', 'category' => 'bigplates', 'type' => '', 'price' => '₹795', 'desc' => 'Shiitake, king oyster & button mushrooms, chili - soy emulsion (Jasmine rice / hakka noodles)'],
    ['id' => 105, 'name' => 'Singapore noodles (Add chicken)', 'category' => 'bigplates', 'type' => '', 'price' => '₹695', 'desc' => 'House noodles, bokchoy, bean curd tofu, sesame oil'],
    ['id' => 106, 'name' => 'Pan fried noodles', 'category' => 'bigplates', 'type' => '', 'price' => '₹695', 'desc' => 'Wok tossed vegetables, hot garlic sauce'],
    ['id' => 107, 'name' => 'Paneer butter masala', 'category' => 'bigplates', 'type' => '', 'price' => '₹725', 'desc' => 'Paneer tikka in makhani gravy, fresh cream'],
    ['id' => 108, 'name' => 'Kadhai paneer', 'category' => 'bigplates', 'type' => '', 'price' => '₹725', 'desc' => 'Paneer tikka, kadhai masala'],

];
?>
<link rel="stylesheet" href="style.css?v=25.0">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Birthstone&display=swap" rel="stylesheet">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under The Mango Tree • Menu</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #fcfbf7; 
            margin: 0;
            padding: 0;
            color: #333;
        }

        .menu-layout {
            max-width: 1200px;
            margin: 40px auto;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            padding: 0 20px;
        }

        .menu-sidebar {
            background: #ffffff;
            border: 1px solid #e2dfd5;
            border-radius: 12px;
            padding: 24px;
            height: fit-content;
            position: sticky;
            top: 100px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
        }

        .menu-sidebar h3 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 18px;
            color: #2c3e50;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #f39c12; 
            padding-bottom: 8px;
        }

        .course-btn {
            display: block;
            width: 100%;
            text-align: left;
            background: transparent;
            color: #555;
            border: 1px solid transparent;
            padding: 14px 16px;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .course-btn:hover {
            background: #fdf6ec;
            color: #f39c12;
        }

        .course-btn.active {
            background: #f39c12;
            color: #ffffff;
            border-color: #f39c12;
        }

        .toggle-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2dfd5;
        }

        .toggle-label {
            font-size: 14px;
            font-weight: 700;
            color: #444;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 26px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px; width: 18px;
            left: 4px; bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #d9534f; 
        }

        input:checked + .slider:before {
            transform: translateX(24px);
        }

        .menu-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .menu-content h2 {
            margin: 0 0 10px 0;
            font-size: 28px;
            color: #2c3e50;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .menu-card {
            background: #ffffff;
            border: 1px solid #e2dfd5;
            border-radius: 12px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.01);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .menu-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.05);
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
            gap: 12px;
        }

        .item-title {
            font-weight: 700;
            font-size: 19px;
            color: #1a252f;
            letter-spacing: -0.3px;
        }

        .item-badge {
            font-size: 11px;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge-veg { background: #e8f8f5; color: #27ae60; border: 1px solid #a3e4d7; }
        .badge-non-veg { background: #fdedec; color: #c0392b; border: 1px solid #f5b7b1; }

        .item-desc {
            font-size: 14px;
            color: #7f8c8d;
            line-height: 1.6;
            font-style: italic;
            margin: 0 0 15px 0;
        }

        .item-price {
            color: #f39c12;
            font-weight: 700;
            font-size: 18px;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .menu-layout {
                grid-template-columns: 100%;
                gap: 20px;
                margin: 20px auto;
            }
            .menu-sidebar {
                position: relative;
                top: 0;
            }
        }
    </style>
</head>
<body>

    <div class="menu-layout">
        <!-- SIDEBAR CONTAINER -->
        <div class="menu-sidebar">
            <h3>Categories</h3>
            <button class="course-btn active" onclick="filterCategory('all', this)">All Courses</button>
            <button class="course-btn" onclick="filterCategory('smallplates', this)">Small Plates</button>
            <button class="course-btn" onclick="filterCategory('soup', this)">Soups</button>
            <button class="course-btn" onclick="filterCategory('salads', this)">Salads</button>
            <button class="course-btn" onclick="filterCategory('baos', this)">Baos</button>
            <button class="course-btn" onclick="filterCategory('dimsums', this)">Dimsums</button>
            <button class="course-btn" onclick="filterCategory('pastas', this)">Pastas</button>
            <button class="course-btn" onclick="filterCategory('between', this)">Between The Breads</button>
            <button class="course-btn" onclick="filterCategory('pizzeria', this)">UMT Pizzeria</button>
            <button class="course-btn" onclick="filterCategory('bigplates', this)">Big Plates</button>
            <button class="course-btn" onclick="filterCategory('addons', this)">Add-Ons</button>
            <button class="course-btn" onclick="filterCategory('desserts', this)">Desserts</button>

            <!-- Non-Veg Switch Toggle -->
            <div class="toggle-container">
                <span class="toggle-label">🔴 Non-Veg Only</span>
                <label class="switch">
                    <input type="checkbox" id="nonVegToggle" onchange="filterType()">
                    <span class="slider"></span>
                </label>
            </div>
        </div>

        <!-- MENU CONTAINER -->
        <div class="menu-content">
            <h2 id="section-title">All Courses</h2>
            <div class="menu-grid">
                <?php foreach($menu_items as $item): ?>
                    <div class="menu-card" data-category="<?= $item['category'] ?>" data-type="<?= $item['type'] ?>">
                        <div>
                            <div class="item-header">
                                <span class="item-title"><?= htmlspecialchars($item['name']) ?></span>
                                <?php if (!empty($item['type'])): ?>
        <span class="item-badge <?= $item['type'] == 'veg' ? 'badge-veg' : 'badge-non-veg' ?>">
            <?= $item['type'] == 'veg' ? '🟢 Veg' : '🔴 Non-Veg' ?>
        </span>
    <?php endif; ?>
                            </div>
                            <?php if (!empty($item['desc'])): ?>
    <p class="item-desc"><?= htmlspecialchars($item['desc']) ?></p>
<?php endif; ?>
                        </div>
                        <div class="item-price"><?= $item['price'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Filter Script Engine -->
    <script>
    let activeCategory = 'all';

    function filterCategory(category, buttonElement) {
        activeCategory = category;
        document.querySelectorAll('.course-btn').forEach(btn => btn.classList.remove('active'));
        buttonElement.classList.add('active');
        document.getElementById('section-title').innerText = buttonElement.innerText;
        executeMenuFilters();
    }

    function filterType() {
        executeMenuFilters();
    }

    function executeMenuFilters() {
        const nonVegOnlyChecked = document.getElementById('nonVegToggle').checked;
        const cardElements = document.querySelectorAll('.menu-card');

        cardElements.forEach(card => {
            const matchCategory = (activeCategory === 'all' || card.getAttribute('data-category') === activeCategory);
            const matchType = (!nonVegOnlyChecked || card.getAttribute('data-type') === 'non-veg');

            if(matchCategory && matchType) {
                card.style.display = "flex";
            } else {
                card.style.display = "none";
            }
        });
    }
    </script>
        <?php include 'footer.php'; ?>

</body>
</html>