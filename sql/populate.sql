-------- user --------

-------- country --------

-------- city --------

-------- address --------

-------- credit_card --------

-------- paypal --------

-------- payment_method --------

-------- order --------

-------- category --------
---- main
INSERT INTO "category" (name) VALUES
    ("Designs"),
    ("Ink"),
    ("Machines"),
    ("Needles & Cartridges"),
    ("Grips, Tips & Tubes"),
    ("Studio Furniture"),
    ("Aftercare"),
    ("Medical Equipment"),
    ("Tattoo Supplies");
---- secondary
-- Designs
INSERT INTO "category" (name) VALUES
    ("Traditional/Old School"),
    ("Realism"),
    ("Watercolor"),
    ("Tribal"),
    ("Cartoon/New School"),
    ("Japanese"),
    ("Dotwork"),
    ("Blackwork"),
    ("Illustrative"),
    ("Chicano"),
    ("Neo Traditional");
-- Ink
INSERT INTO "category" (name) VALUES
    ("Black"),
    ("Grey"),
    ("Red"),
    ("Blue"),
    ("Green"),
    ("White"),
    ("Pink"),
    ("Yellow"),
    ("Orange"),
    ("Brown");
-- Machines
INSERT INTO "category" (name) VALUES
    ("Rotary Machines"),
    ("Tattoo Pen"),
    ("Hand Poking");
-- Needles & Cartidges
INSERT INTO "category" (name) VALUES
    ("Needles"),
    ("Cartridges");
-- Grips, Tips & Tubes
INSERT INTO "category" (name) VALUES
    ("Grips"),
    ("Tips"),
    ("Tubes");
-- Furniture
INSERT INTO "category" (name) VALUES
    ("Arm/Leg Rests"),
    ("Artist Chairs/Stools"),
    ("Chairs/Beds"),
    ("Lamps"),
    ("Workstation/Trolleys");
-- Aftercare
INSERT INTO "category" (name) VALUES
    ("Balm Tattoo"),
    ("Hustle Butter"),
    ("Tattoo Goo"),
    ("Aftercare Company");
-- Medical Equipment
INSERT INTO "category" (name) VALUES
    ("Gloves"),
    ("Masks"),
    ("Skin Preparation"),
    ("Bottles/Containers"),
    ("Couch Roll"),
    ("Disinfectants"),
    ("Hygyene");
-- Studio Supplies
INSERT INTO "category" (name) VALUES
    ("Stencil Making"),
    ("Fake Skin"),
    ("Books");

-------- subcategory --------
-- Ink
WITH ink_subcategory (name) AS
( VALUES
    ("Black"),
    ("Grey"),
    ("Red"),
    ("Blue"),
    ("Green"),
    ("White"),
    ("Pink"),
    ("Yellow"),
    ("Orange"),
    ("Brown")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN ink_subcategory
ON "Ink" = category.name AND ink_subcategory.name = category.name;

-- Machines
WITH machines_subcategory (name) AS
( VALUES
    ("Rotary Machines"),
    ("Tattoo Pen"),
    ("Hand Poking")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN machines_subcategory
ON "Machines" = category.name AND machines_subcategory.name = category.name;

-- Needles & Cartridges
WITH needles_and_catridges_subcategory (name) AS
( VALUES
    ("Needles"),
    ("Cartridges")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN needles_and_catridges_subcategory
ON "Needles & Cartridges" = category.name AND needles_and_catridges_subcategory.name = category.name;

-- Grips, Tips & Tubes
WITH grips_tips_and_tubes_subcategory (name) AS
( VALUES
    ("Grips"),
    ("Tips"),
    ("Tubes")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN grips_tips_and_tubes_subcategory
ON "Grips, Tips & Tubes" = category.name AND grips_tips_and_tubes_subcategory.name = category.name;

-- Furniture
WITH furniture_subcategory (name) AS
( VALUES
    ("Arm/Leg Rests"),
    ("Artist Chairs/Stools"),
    ("Chairs/Beds"),
    ("Lamps"),
    ("Workstation/Trolleys")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN furniture_subcategory
ON "Furniture" = category.name AND furniture_subcategory.name = category.name;

-- Aftercare
WITH aftercare_subcategory (name) AS
( VALUES
    ("Balm Tattoo"),
    ("Hustle Butter"),
    ("Tattoo Goo"),
    ("Aftercare Company")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN aftercare_subcategory
ON "Aftercare" = category.name AND aftercare_subcategory.name = category.name;

-- Medical Equipment
WITH medical_equipment_subcategory (name) AS
( VALUES
    ("Gloves"),
    ("Masks"),
    ("Skin Preparation"),
    ("Bottles/Containers"),
    ("Couch Roll"),
    ("Disinfectants"),
    ("Hygyene")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN medical_equipment_subcategory
ON "Aftercare" = category.name AND medical_equipment_subcategory.name = category.name;

-- Studio Supplies
WITH studio_supplies_subcategory (name) AS
( VALUES
    ("Stencil Making"),
    ("Fake Skin"),
    ("Books")
)
INSERT INTO "subcategory" (idCategory, idParent)
SELECT category.id, category.id
FROM "category" JOIN studio_supplies_subcategory
ON "Aftercare" = category.name AND studio_supplies_subcategory.name = category.name;
-------- item --------

-------- archived_item --------

-------- item_purchase --------

-------- review --------

-------- cart --------

-------- wishlist --------

-------- picture --------

-------- item_picture --------

-------- profile_picture --------

-------- admin_notification --------

-------- out_of_stock_notification --------

-------- report_notification --------

-------- sale --------

-------- fixed_sale --------

-------- percentage_sale --------

-------- item_subscriber --------

-------- user_address --------

-------- user_payment_method --------

-------- support_chat_message --------

-------- newsletter_subscriber --------

-------- admin --------

-------- faq --------

-------- store --------
