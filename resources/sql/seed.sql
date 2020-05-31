----------------------------------
--------- CREATE SCRIPT ----------
----------------------------------
-- Drop Tables
DROP TABLE IF EXISTS "item_sale";
DROP TABLE IF EXISTS "store";
DROP TABLE IF EXISTS "faq";
DROP TABLE IF EXISTS "admin";
DROP TABLE IF EXISTS "newsletter_subscriber";
DROP TABLE IF EXISTS "support_chat_message";
DROP TABLE IF EXISTS "user_payment_method";
DROP TABLE IF EXISTS "user_address";
DROP TABLE IF EXISTS "item_subscription";
DROP TABLE IF EXISTS "item_subscriber";
DROP TABLE IF EXISTS "sale";
DROP TABLE IF EXISTS "report_notification";
DROP TABLE IF EXISTS "out_of_stock_notification";
DROP TABLE IF EXISTS "admin_notification";
DROP TABLE IF EXISTS "item_picture";
DROP TABLE IF EXISTS "wishlist";
DROP TABLE IF EXISTS "cart";
DROP TABLE IF EXISTS "review";
DROP TABLE IF EXISTS "item_purchase";
DROP TABLE IF EXISTS "item";
DROP TABLE IF EXISTS "order";
DROP TABLE IF EXISTS "category";
DROP TABLE IF EXISTS "payment_method";
DROP TABLE IF EXISTS "paypal";
DROP TABLE IF EXISTS "credit_card";
DROP TABLE IF EXISTS "address";
DROP TABLE IF EXISTS "country";
DROP TABLE IF EXISTS "user";
DROP TABLE IF EXISTS "profile_picture";
DROP TABLE IF EXISTS "recover_password_tokens";


-- Drop Types

DROP TYPE IF EXISTS ITEM_STATUS;
DROP TYPE IF EXISTS SALE_TYPE;
DROP TYPE IF EXISTS ORDER_STATUS;
DROP TYPE IF EXISTS MESSAGE_SENDER;

-- Drop Triggers

DROP TRIGGER IF EXISTS update_rating on "review";
DROP TRIGGER IF EXISTS add_to_cart on "cart";
DROP TRIGGER IF EXISTS update_cart on "cart";
DROP TRIGGER IF EXISTS new_oos_notification on "out_of_stock_notification";
DROP TRIGGER IF EXISTS new_report_notification on "report_notification";
DROP TRIGGER IF EXISTS new_item_sale on "item_sale";


-- Types

CREATE TYPE ITEM_STATUS AS ENUM ('active', 'archived');
CREATE TYPE SALE_TYPE AS ENUM ('fixed', 'percentage');
CREATE TYPE ORDER_STATUS AS ENUM ('processing', 'shipped', 'received');
CREATE TYPE MESSAGE_SENDER AS ENUM ('user', 'admin');

-- Tables

CREATE TABLE "recover_password_tokens" (
    "id" SERIAL PRIMARY KEY,
    "email" TEXT NOT NULL,
    "token" TEXT NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT now()
);

CREATE TABLE "profile_picture" (
    "id" SERIAL PRIMARY KEY,
    "link" TEXT
);

CREATE TABLE "user" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "id_picture" INTEGER NOT NULL DEFAULT 1 REFERENCES "profile_picture" ("id") ON UPDATE CASCADE,
    "date_of_birth" DATE NOT NULL CONSTRAINT user_dob_ck CHECK (date_part('year', age(now(), date_of_birth)) >= 18),
    "email" TEXT NOT NULL CONSTRAINT user_email_uk UNIQUE,
    "phone" TEXT,
    "password" TEXT NOT NULL,
    "remember_token" VARCHAR
);

CREATE TABLE "country" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL
);

CREATE TABLE "address" (
    "id" SERIAL PRIMARY KEY,
    "street" TEXT NOT NULL,
    "postal_code" TEXT NOT NULL,
    "city" TEXT NOT NULL,
    "id_country" INTEGER NOT NULL REFERENCES "country" ("id") ON UPDATE CASCADE
);

CREATE TABLE "credit_card" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT,
    "number" TEXT NOT NULL,
    "expiration" DATE NOT NULL,
    "cvv" TEXT NOT NULL
);

CREATE TABLE "paypal" (
    "id" SERIAL PRIMARY KEY,
    "email" TEXT NOT NULL
);

CREATE TABLE "payment_method" (
    "id" SERIAL PRIMARY KEY,
    "id_cc" INTEGER REFERENCES "credit_card" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_pp" INTEGER REFERENCES "paypal" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT paymentmethod_xor_ck CHECK (
        ("id_cc" is NULL and "id_pp" is NOT NULL) or ("id_cc" is NOT NULL and "id_pp" is NULL)
    )
);

CREATE TABLE "order" (
    "id" SERIAL PRIMARY KEY,
    "date" TIMESTAMP NOT NULL DEFAULT now() CONSTRAINT order_date_ck CHECK ("date" <= now()),
    "total" FLOAT NOT NULL CONSTRAINT order_total_ck CHECK ("total" > 0),
    "status" ORDER_STATUS DEFAULT 'processing' NOT NULL,
    "id_user" INTEGER REFERENCES "user" ("id") ON UPDATE CASCADE ON DELETE SET NULL,
    "id_address" INTEGER REFERENCES "address" ("id") ON UPDATE CASCADE,
    "id_payment_method" INTEGER REFERENCES "payment_method" ("id") ON UPDATE CASCADE
);

CREATE TABLE "category" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL CONSTRAINT category_name_uk UNIQUE,
    "id_parent" INTEGER REFERENCES "category" ("id") ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "item" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "brand" TEXT NOT NULL,
    "price" FLOAT NOT NULL CONSTRAINT item_price_ck CHECK ("price" > 0),
    "stock" INTEGER NOT NULL CONSTRAINT item_stock_ck CHECK ("stock" >= 0),
    "description" TEXT,
    "rating" FLOAT CONSTRAINT item_rating_ck CHECK (
        ("rating" is NULL) or ("rating" is NOT NULL and "rating" > 0 and "rating" <= 5)
    ),
    "status" ITEM_STATUS NOT NULL DEFAULT 'active',
    "id_category" INTEGER REFERENCES "category" ("id") ON UPDATE CASCADE
);

CREATE TABLE "item_purchase" (
    "id_item" INTEGER REFERENCES "item" ("id") ON UPDATE CASCADE,
    "id_order" INTEGER REFERENCES "order" ("id") ON UPDATE CASCADE,
    "price" FLOAT NOT NULL CONSTRAINT item_purchase_price_ck CHECK ("price" >= 0),
    "quantity" INTEGER NOT NULL CONSTRAINT item_purchase_quantity_ck CHECK ("quantity" >= 0),
    PRIMARY KEY ("id_item", "id_order")
);

CREATE TABLE "review" (
    "id" SERIAL PRIMARY KEY,
    "id_item" INTEGER NOT NULL REFERENCES "item" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_user" INTEGER REFERENCES "user" ("id") ON UPDATE CASCADE ON DELETE SET NULL,
    "title" TEXT NOT NULL,
    "body" TEXT NOT NULL,
    "score" INTEGER NOT NULL CONSTRAINT review_score_ck CHECK ("score" >= 0 and "score" <= 5),
    "date" TIMESTAMP NOT NULL DEFAULT now() CONSTRAINT review_date_ck CHECK ("date" <= now()),
    UNIQUE ("id_item", "id_user")
);

CREATE TABLE "cart" (
    "id_user" INTEGER REFERENCES "user" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_item" INTEGER REFERENCES "item" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "quantity" INTEGER NOT NULL CONSTRAINT cart_quantity_ck CHECK ("quantity" > 0),
    "date_added" TIMESTAMP NOT NULL DEFAULT now(),
    PRIMARY KEY ("id_user", "id_item")
);

CREATE TABLE "wishlist" (
    "id_user" INTEGER REFERENCES "user" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_item" INTEGER REFERENCES "item" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ("id_user", "id_item")
);

CREATE TABLE "item_picture" (
    "id" SERIAL PRIMARY KEY,
    "id_item" INTEGER NOT NULL REFERENCES item ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "link" TEXT NOT NULL
);

CREATE TABLE "admin_notification" (
    "id" SERIAL PRIMARY KEY,
    "body" TEXT NOT NULL,
    "sent" TIMESTAMP NOT NULL DEFAULT now()
);

CREATE TABLE "out_of_stock_notification" (
    "id_notif" INTEGER PRIMARY KEY REFERENCES "admin_notification" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_item" INTEGER NOT NULL REFERENCES "item" ("id") ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "report_notification" (
    "id_notif" INTEGER PRIMARY KEY REFERENCES "admin_notification" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_review" INTEGER NOT NULL REFERENCES "review" ("id") ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "sale" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT,
    "start" DATE NOT NULL,
    "end" DATE NOT NULL,
    CONSTRAINT sale_date_ck CHECK ("start" < "end"),
    "type" SALE_TYPE NOT NULL,
    "fixed_amount" FLOAT CONSTRAINT sale_fixed_ck CHECK (("fixed_amount" IS NULL) or ("fixed_amount" > 0)),
    "percentage_amount" FLOAT CONSTRAINT sale_percentage_ck CHECK (("percentage_amount" IS NULL) or ("percentage_amount" > 0 and "percentage_amount" < 100)),
    CONSTRAINT sale_xor_ck CHECK (
        (("fixed_amount" IS NULL) and ("percentage_amount" IS NOT NULL))
        or
        (("fixed_amount" IS NOT NULL) and ("percentage_amount" IS NULL))
    )
);

CREATE TABLE "item_sale" (
    "id_item" INTEGER REFERENCES "item" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_sale" INTEGER REFERENCES "sale" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ("id_item", "id_sale")
);

CREATE TABLE "item_subscriber" (
    "email" TEXT PRIMARY KEY,
    "date" DATE NOT NULL DEFAULT now()
);

CREATE TABLE "item_subscription" (
    "id_item" INTEGER REFERENCES "item" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "email_subscriber" TEXT REFERENCES "item_subscriber" (email) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY("id_item", "email_subscriber")
);

CREATE TABLE "user_address" (
    "id_user" INTEGER REFERENCES "user" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_address" INTEGER REFERENCES address ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ("id_user", "id_address")
);

CREATE TABLE "user_payment_method" (
    "id_user" INTEGER REFERENCES "user" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "id_payment_method" INTEGER REFERENCES "payment_method" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ("id_user", "id_payment_method")
);

CREATE TABLE "support_chat_message" (
    "id" SERIAL PRIMARY KEY,
    "id_user" INTEGER REFERENCES "user" ("id") ON UPDATE CASCADE ON DELETE CASCADE,
    "time" TIMESTAMP NOT NULL,
    "body" TEXT NOT NULL,
    "sender" MESSAGE_SENDER NOT NULL
);

CREATE TABLE "newsletter_subscriber" (
    "id" SERIAL PRIMARY KEY,
    "email" TEXT NOT NULL,
    "date" DATE NOT NULL DEFAULT now()
);

CREATE TABLE "admin" (
    "id" SERIAL PRIMARY KEY,
    "username" TEXT NOT NULL CONSTRAINT admin_username_uk UNIQUE,
    "password" TEXT NOT NULL,
    "remember_token" VARCHAR
);

CREATE TABLE "faq" (
    "id" SERIAL PRIMARY KEY,
    "order" INTEGER NOT NULL CONSTRAINT faq_order_uk UNIQUE,
    CONSTRAINT faq_order_ck CHECK ("order" >= 1),
    "question" TEXT NOT NULL CONSTRAINT faq_question_uk UNIQUE,
    "answer" TEXT NOT NULL
);

CREATE TABLE "store" (
    "id_address" INTEGER PRIMARY KEY REFERENCES address ("id") ON UPDATE CASCADE,
    "phone" TEXT NOT NULL
);

-- Indexes

CREATE INDEX idx_user_picture ON "user" USING btree(id_picture);  
CREATE INDEX idx_review ON "review" USING btree(id_user);
CREATE INDEX idx_item_picture ON item_picture USING hash (id_item); 
CREATE INDEX search_idx ON item USING GIST (to_tsvector('english',"item"."name" || ' ' || "item"."brand"|| ' ' || "item"."description"));


-- Triggers

-- TRIGGER01 --
CREATE OR REPLACE FUNCTION update_rating()
    RETURNS trigger AS
$$
BEGIN
    UPDATE "item" 
    SET rating = (SELECT AVG(score) FROM review WHERE id_item = NEW.id_item)
    WHERE id = NEW.id_item;
    RETURN NEW;
END;
$$
LANGUAGE 'plpgsql';

CREATE TRIGGER update_rating
    AFTER INSERT ON "review"
    FOR EACH ROW
    EXECUTE PROCEDURE update_rating();


-- TRIGGER02 --

CREATE OR REPLACE FUNCTION manage_cart()
    RETURNS trigger AS
$$
BEGIN
    IF (SELECT stock FROM "item" WHERE id=NEW.id_item) < NEW.quantity THEN 
        RAISE EXCEPTION 'Not enough stock';
    END IF;
    RETURN NEW;
END;
$$
LANGUAGE 'plpgsql';

CREATE TRIGGER manage_cart
    BEFORE INSERT OR UPDATE
    ON "cart"
    FOR EACH ROW
    EXECUTE PROCEDURE manage_cart();


-- TRIGGER03 --

CREATE OR REPLACE FUNCTION new_oos_notification()
    RETURNS trigger AS
$$
BEGIN
    IF EXISTS (SELECT id_notif FROM "report_notification" WHERE id_notif=NEW.id_notif) THEN 
		RAISE EXCEPTION 'Notification is already of type out_of_stock_notification' ;
    END IF;
  RETURN NEW;
END;
$$
LANGUAGE 'plpgsql';


CREATE TRIGGER new_oos_notification
    BEFORE INSERT
    ON "out_of_stock_notification"
    FOR EACH ROW
    EXECUTE PROCEDURE new_oos_notification();


-- TRIGGER04 --

CREATE OR REPLACE FUNCTION new_report_notification()
    RETURNS trigger AS
$$
BEGIN
    IF EXISTS (SELECT id_notif FROM "out_of_stock_notification" WHERE id_notif=NEW.id_notif) THEN 
        RAISE EXCEPTION 'Notification is already of type report_notification' ;
    END IF;
  RETURN NEW;
END;
$$
LANGUAGE 'plpgsql';

CREATE TRIGGER new_report_notification
    BEFORE INSERT
    ON "report_notification"
    FOR EACH ROW
    EXECUTE PROCEDURE new_report_notification();


-- TRIGGER05 --

CREATE OR REPLACE FUNCTION new_item_sale()
    RETURNS trigger AS
$$
DECLARE 
    item_on_sale RECORD;
    sale_fixed_amount float;
    sale_start date;
    sale_end date;

BEGIN
    SELECT fixed_amount, "start", "end" INTO sale_fixed_amount, sale_start, sale_end FROM sale WHERE id=NEW.id_sale;
    IF sale_fixed_amount IS NOT NULL THEN
        IF (SELECT price FROM item WHERE id=NEW.id_item) < sale_fixed_amount THEN
            RAISE EXCEPTION 'Sale amount is higher than the price of the item';
        END IF; 
    END IF;

    IF EXISTS (SELECT * FROM "sale", "item_sale" WHERE NEW.id_item=item_sale.id_item AND sale.id=item_sale.id_sale AND sale.start <= sale_end AND sale.end >= sale_start) THEN 
		  RAISE EXCEPTION 'The sale period colides with another sale for this item';
    END IF;
    RETURN NEW;
END;
$$
LANGUAGE 'plpgsql';

CREATE TRIGGER new_item_sale
    BEFORE INSERT
    ON "item_sale"
    FOR EACH ROW
    EXECUTE PROCEDURE new_item_sale();

-- Transaction Functions 

CREATE OR REPLACE FUNCTION purchase_items(user_id int) RETURNS void AS $$
DECLARE
	item_sale_rec RECORD;
    purchase_product RECORD;
    product_price float;
BEGIN

    FOR purchase_product IN SELECT * FROM "cart" WHERE id_user=user_id LOOP
        SELECT * INTO item_sale_rec FROM item, sale, item_sale WHERE item.id=purchase_product.id_item AND item.id=item_sale.id_item AND sale.id=item_sale.id_sale AND sale.end > CURRENT_DATE;
        
        IF NOT FOUND THEN
            product_price = (SELECT price FROM "item" WHERE id=purchase_product.id_item);         

        ELSE -- CALCULATE POSSIBLE SALE 
            
            IF item_sale_rec.fixed_amount IS NOT NULL THEN
                product_price = item_sale_rec.price - item_sale_rec.fixed_amount;
            ELSE 
                product_price = item_sale_rec.price * (100 - item_sale_rec.percentage_amount) / 100;
            END IF; 
        
        END IF;
        
        INSERT INTO "item_purchase" ("id_item", "id_order", "price", "quantity") VALUES (purchase_product.id_item, currval('order_id_seq'), product_price, purchase_product.quantity);
    
    END LOOP;

END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION checkout_transaction(user_id int, address_id int, payment_method_id int) RETURNS void AS $$
DECLARE
    product_in_cart RECORD;
    order_total float;
BEGIN
	
	IF EXISTS (SELECT * FROM "item", "cart" WHERE item.id=cart.id_item AND cart.id_user=user_id AND item.stock < cart.quantity)
		THEN RAISE EXCEPTION 'Not enough stock';
	ELSE 
		FOR product_in_cart IN SELECT id_item, quantity FROM "cart" WHERE id_user=user_id LOOP
			UPDATE "item" SET stock = stock - product_in_cart.quantity WHERE id=product_in_cart.id_item;	
		END LOOP;
		
        INSERT INTO "order" ("total", "id_user", "id_address", "id_payment_method") VALUES
                            (1, user_id, address_id, payment_method_id);
    	PERFORM purchase_items(user_id);

        order_total = (SELECT SUM(price) FROM "item_purchase" WHERE id_order=currval('order_id_seq'));
        UPDATE "order" SET total=order_total WHERE id=currval('order_id_seq');

        DELETE FROM "cart" WHERE id_user = user_id;
	END IF;
END;
$$ LANGUAGE plpgsql;


----------------------------------
-------- POPULATE SCRIPT ---------
----------------------------------
-------- profile_picture --------
INSERT INTO "profile_picture" ("id", "link") VALUES
    (1, '0_default_profile_picture.png'),
    (2, '1.jpg'),
    (3, '2.jpg'),
    (4, '3.jpg'),
    (5, '4.jpg'),
    (6, '5.jpg'),
    (7, '6.jpg'),
    (8, '7.jpg'),
    (9, '8.jpg'),
    (10, '9.jpg'),
    (11, '10.jpg'),
    (12, '11.jpg'),
    (13, '12.jpg'),
    (14, '13.jpg'),
    (15, '14.jpg'),
    (16, '15.jpg'),
    (17, '16.jpg'),
    (18, '17.jpg'),
    (19, '18.jpg'),
    (20, '19.jpg'),
    (21, '20.jpg'),
    (22, '21.jpg'),
    (23, '22.jpg'),
    (24, '23.jpg'),
    (25, '24.jpg'),
    (26, '25.jpg'),
    (27, '26.jpg'),
    (28, '27.jpg'),
    (29, '28.jpg'),
    (30, '29.jpg'),
    (31, '30.jpg'),
    (32, '31.jpg'),
    (33, '32.jpg'),
    (34, '33.jpg'),
    (35, '34.jpg'),
    (36, '35.jpg'),
    (37, '36.jpg'),
    (38, '37.jpg'),
    (39, '38.jpg'),
    (40, '39.jpg'),
    (41, '40.jpg'),
    (42, '41.jpg'),
    (43, '42.jpg'),
    (44, '43.jpg'),
    (45, '44.jpg'),
    (46, '45.jpg'),
    (47, '46.jpg'),
    (48, '47.jpg'),
    (49, '48.jpg'),
    (50, '49.jpg'),
    (51, '50.jpg'),
    (52, '51.jpg'),
    (53, '52.jpg'),
    (54, '53.jpg'),
    (55, '54.jpg'),
    (56, '55.jpg'),
    (57, '56.jpg'),
    (58, '57.jpg'),
    (59, '58.jpg'),
    (60, '59.jpg'),
    (61, '60.jpg'),
    (62, '61.jpg'),
    (63, '62.jpg'),
    (64, '63.jpg'),
    (65, '64.jpg'),
    (66, '65.jpg'),
    (67, '66.jpg'),
    (68, '67.jpg');
ALTER SEQUENCE profile_picture_id_seq RESTART WITH 68;
-------- user --------
ALTER SEQUENCE user_id_seq RESTART WITH 1;
INSERT INTO "user" ("name", "id_picture", "date_of_birth", "email", "phone", "password") VALUES
    ('User Usado', 2, '2000-09-12', 'user@lbaw.edu', '933235253', '$2y$10$956vhoYvaI4mZ0wNdKvkcuT5LDYe5lpL/LM65VyY/VkZPK6geh.C2'), -- lbaw2071
    ('John Doe', 1,'1995-05-18', 'johnnydoe@email.com', '918585952', '$2y$10$956vhoYvaI4mZ0wNdKvkcuT5LDYe5lpL/LM65VyY/VkZPK6geh.C2'), -- lbaw2071
    ('Say Hallgalley', 3, '1984-09-12', 'shallgalley1@princeton.edu', null, 'emlAhP'),
    ('Antonina Peattie', 4, '1974-10-07', 'apeattie2@list-manage.com', '8421694480', 'fkp3P6I8SF'),
    ('Frasco Jacques', 5, '1996-08-31', 'fjacques3@bloomberg.com', '6813514088', 'lXwEGQeG'),
    ('Esme Finlayson', 6, '1972-11-21', 'efinlayson4@opensource.org', null, 'BFj5sAkg'),
    ('Henrik Rooson', 7, '1983-10-10', 'hrooson5@flavors.me', '6968283454', 'dWp1foUJdf'),
    ('Aili Rodenburgh', 8, '1977-10-13', 'arodenburgh6@jalbum.net', null, 'CJQpOsx'),
    ('Halie Rymer', 9, '1997-05-21', 'hrymer7@cargocollective.com', null, 'u4UWFDF'),
    ('Elfreda Klosges', 10, '2001-04-25', 'eklosges8@pbs.org', '6334035644', 'R8n89xbmnA'),
    ('Paolina MacFall', 11, '1973-05-22', 'pmacfall9@google.pl', '5614793806', 'WPyOAO7fC'),
    ('Tucker Eagle', 12, '1972-10-31', 'teaglea@fema.gov', '5712179712', '0V797BkBja'),
    ('Julianne Hackinge', 13, '1987-04-10', 'jhackingeb@behance.net', '2793418140', '5pB8lHu1N'),
    ('Clementius Lomasney', 14, '1995-11-12', 'clomasneyc@guardian.co.uk', '3349411060', 'sXHdTQ8'),
    ('Georgy Eadington', 15, '1995-04-12', 'geadingtond@tinypic.com', '8448101672', 'qd0123Hcq'),
    ('Reube Boness', 16, '1984-01-25', 'rbonesse@mapquest.com', '3585307887', 'q6j7pb'),
    ('Elise Damiata', 17, '1964-07-20', 'edamiataf@cocolog-nifty.com', '4322932802', 'fOLt6Vla2Z'),
    ('Maurine Kearle', 18, '1976-03-04', 'mkearleg@ed.gov', '4993656961', 'yzAsPieX1l'),
    ('Christian Wigelsworth', 19, '1969-12-24', 'cwigelsworthh@360.cn', null, 'pAj8Pilr3'),
    ('Ethel Ganford', 20, '1964-11-11', 'eganfordi@taobao.com', '8559815458', 'N9ryUQ5WB5'),
    ('Shae Gallear', 21, '1989-08-14', 'sgallearj@newyorker.com', null, 'PsjbiJPC'),
    ('Luciano Camocke', 22, '1988-09-07', 'lcamockek@blogger.com', '8131784227', 'wf7Sde2C'),
    ('Dore Zebedee', 23, '1969-11-15', 'dzebedeel@ihg.com', '2786943187', 'SkxtAqyeOZ7s'),
    ('Stella Gould', 24, '1999-07-10', 'sgouldm@ucoz.ru', null, 'dW27c5'),
    ('Colby Domino', 25, '1998-07-26', 'cdominon@google.co.jp', null, '4xOXLQYn41'),
    ('Florella Veevers', 26, '1978-08-19', 'fveeverso@unicef.org', null, 'w7lfMtMf'),
    ('Alasdair Gibbs', 27, '1974-01-09', 'agibbsp@livejournal.com', '5457130251', 'uN5UwkNn'),
    ('Harv Shellcross', 28, '1986-03-06', 'hshellcrossq@telegraph.co.uk', '6061628997', 'GQQHfxuR0N'),
    ('Spenser Rosenboim', 29, '1967-12-06', 'srosenboimr@skyrock.com', '1829299714', '3ULE0YvRQwca'),
    ('Benjamen Woakes', 30, '1979-09-25', 'bwoakess@vkontakte.ru', '8559751570', 'AKZqEK8nO'),
    ('Sherwood Paramore', 31, '1976-10-01', 'sparamoret@hostgator.com', '9142580524', 'dKORNntZTd'),
    ('Harmon Jameson', 32, '1988-01-04', 'hjamesonu@wiley.com', '9241105014', 'GebPvAMs'),
    ('Darbie Bedbrough', 33, '1982-06-18', 'dbedbroughv@creativecommons.org', '1718414459', 'Pmw7bR'),
    ('Madison Castles', 34, '1981-02-11', 'mcastlesw@si.edu', '5269827119', 'PEkDKG7xy'),
    ('Clerc Guerro', 35, '1976-04-03', 'cguerrox@telegraph.co.uk', '9468342500', 'qKpWHJUR4pa'),
    ('Francis Ohrtmann', 36, '1972-02-22', 'fohrtmanny@multiply.com', '7482738579', 'eqPcgKjRN1'),
    ('Sheila Rattenbury', 37, '1970-06-19', 'srattenburyz@google.es', '7496547000', 's5aIcv8B'),
    ('Timmie Kisby', 38, '1980-12-28', 'tkisby10@bing.com', null, 'HNhMkeWFKI4'),
    ('Matelda Laxon', 39, '1989-04-04', 'mlaxon11@dailymail.co.uk', '8798356755', 'HL4NkOJJ'),
    ('Marilyn Bycraft', 40, '1994-02-14', 'mbycraft12@marketwatch.com', null, 'NI8lSmS0B6m'),
    ('Annice Zouch', 41, '1970-03-23', 'azouch13@discuz.net', '5132272600', 'y4RDKVOna'),
    ('Harriot Dallewater', 42, '1998-05-30', 'hdallewater14@multiply.com', null, 'ldbYoKbM'),
    ('Thaine Peaden', 43, '1963-04-26', 'tpeaden15@lulu.com', '6444088761', 'dUeNpEflZk'),
    ('Menard Aumerle', 44, '1966-11-26', 'maumerle16@irs.gov', null, 'AN0PPz'),
    ('Tilly Hambric', 45, '1970-03-23', 'thambric17@list-manage.com', '2778649469', 'DW89RuDfN'),
    ('Harrison Willers', 46, '1985-10-16', 'hwillers18@wordpress.org', '9068794014', 'EIHcqS2n'),
    ('Bernita Rosborough', 47, '1968-02-14', 'brosborough19@t-online.de', '4132327109', 'LZfVKc'),
    ('Lucille Signorelli', 48, '1994-04-04', 'lsignorelli1a@arizona.edu', null, 'rgNjcjdMJ'),
    ('Irita Rump', 49, '1990-03-19', 'irump1b@gov.uk', '6064090625', '5HdmkFR0p'),
    ('Gary Edworthye', 50, '1966-04-25', 'gedworthye1c@weather.com', '9355760551', '3SpNUjN'),
    ('Onida Bland', 51, '1970-01-26', 'obland1d@unblog.fr', null, 'mTrTzyw'),
    ('Kippy Bucktharp', 52, '1965-06-03', 'kbucktharp1e@bigcartel.com', null, 'qM3qPjcfoklo'),
    ('L,urette Alebrooke', 53, '1977-03-20', 'lalebrooke1f@soup.io', null, 'kW7t9HZBdzT9'),
    ('Kathie Dimbleby', 54, '1999-12-21', 'kdimbleby1g@umich.edu', '7884043024', 'MtQEwMVE8'),
    ('Estella O''Dwyer', 55, '1967-12-03', 'eodwyer1h@archive.org', '5687891755', '5LYuudx'),
    ('Red Manvelle', 56, '1967-07-19', 'rmanvelle1i@google.fr', '2214768646', 'RTqFX0c6gh'),
    ('Rena Kayzer', 57, '1996-11-20', 'rkayzer1j@engadget.com', '4494605142', 'AsbI5jE7ghH'),
    ('Horace Twigger', 58, '1983-01-30', 'htwigger1k@jalbum.net', null, '9MgDBAHEds8O'),
    ('Eugine Grigorkin', 59, '1998-06-30', 'egrigorkin1l@paypal.com', '4475096535', 'Q4c4QlZjYDH'),
    ('Blair Mcwhinnie', 60, '1976-11-05', 'bmcwhinnie1m@census.gov', null, 'jqS74wA5'),
    ('Rosemary McIlvaney', 61, '1991-03-12', 'rmcilvaney1n@symantec.com', null, 'NMO1AEbWTTZ2'),
    ('Thalia Dorricott', 62, '1994-08-13', 'tdorricott1o@sogou.com', '8648819754', 'GylDxRXT'),
    ('Sarge Shanks', 63, '1982-09-08', 'sshanks1p@geocities.jp', null, '3VwBX0'),
    ('Phylys Rising', 64, '1985-02-03', 'prising1q@canalblog.com', '5703267607', 'TMHSgcD'),
    ('Durante Bonus', 65, '2000-03-28', 'dbonus1r@qq.com', '9951651796', 'EvRxbaspo'),
    ('Domeniga Fannin', 66, '1964-05-25', 'dfannin1s@yandex.ru', null, 'q3tqhJ'),
    ('Roma Ventam', 67, '2000-11-20', 'rventam1t@techcrunch.com', null, '93uzSE'),
    ('Nanci Groves', 68, '1970-02-10', 'ngroves1u@unesco.org', null, 'rbmhv1rvKjZI');
INSERT INTO "user" ("name", "date_of_birth", "email", "phone", "password") VALUES
    ('Manda Edgeller', '1998-03-01', 'medgeller0@businessinsider.com', '9387652958', 'F9cmsSw4'),
    ('Joshua Lonie', '1976-12-23', 'jlonie1@jiathis.com', '7406203715', 'tzrscPDxrn'),
    ('Ahmad McMonnies', '1998-11-15', 'amcmonnies2@t-online.de', '2948878914', 'bCNUvJ08Yd'),
    ('Salaidh Solland', '1970-07-30', 'ssolland3@ebay.com', null, 'VekizEv'),
    ('Horacio Waltering', '1975-07-18', 'hwaltering4@smugmug.com', '2024596888', 'eoFG9eG'),
    ('Dani Bristoe', '1990-05-30', 'dbristoe5@shutterfly.com', '6592267310', 'ZWQ9s75ChD'),
    ('Mitchell Setterthwait', '1996-03-18', 'msetterthwait6@reverbnation.com', '4352821643', 'bT0rGbM'),
    ('Gustavus Varndell', '1966-12-30', 'gvarndell7@illinois.edu', '3324832497', 'QmpBuN5F4w'),
    ('Israel Paulsen', '1985-08-14', 'ipaulsen8@pbs.org', '8044654607', 'e0JSweRxAUv7'),
    ('Jaine Corsor', '1984-02-16', 'jcorsor9@altervista.org', '8076354645', 'yGncdlve'),
    ('Sydney Fain', '1980-09-21', 'sfaina@chicagotribune.com', null, 'rWVJNfa'),
    ('Iver Frangello', '1990-09-26', 'ifrangellob@apache.org', null, 'wWdsJdkN9v0'),
    ('Cheri Vedikhov', '1982-11-16', 'cvedikhovc@digg.com', '5493096215', 'oYxkZaDO'),
    ('Shelbi McTurk', '1964-09-04', 'smcturkd@flickr.com', '4093998508', 'SrbhgCZpXjy'),
    ('Gardner Petrushkevich', '1989-04-25', 'gpetrushkeviche@whitehouse.gov', null, '9mi5kolGauJ'),
    ('Ruddie Lowings', '1971-05-11', 'rlowingsf@hao123.com', '1452029093', 'cbDTQvfR'),
    ('Tom Burge', '1997-10-18', 'tburgeg@house.gov', null, 'SiYnzvkA'),
    ('Stanislas Scrogges', '1975-01-15', 'sscroggesh@issuu.com', '9119281606', 'TUR2TIo'),
    ('Wendi Kaiser', '2001-02-07', 'wkaiseri@123-reg.co.uk', null, 'BCE5hCorZam'),
    ('Riane Galiford', '1981-12-24', 'rgalifordj@fda.gov', '8963435385', 'U18O4ebR'),
    ('Ben Pechold', '1975-07-25', 'bpecholdk@skyrock.com', null, '3g0fefdzoT'),
    ('Morley Tregoning', '1994-03-26', 'mtregoningl@microsoft.com', null, 'v1FMQkL19A'),
    ('Shalne Mees', '1972-04-11', 'smeesm@bloglines.com', '6979243270', '1TeB3XL0'),
    ('Winfred Quakley', '1976-12-26', 'wquakleyn@dell.com', '4262957564', 'OnYVg2zHBxV'),
    ('Florian Lawleff', '1967-03-18', 'flawleffo@discuz.net', null, 'rFL5LTOPHE'),
    ('Iggy Walduck', '1988-12-18', 'iwalduckp@auda.org.au', '2312712786', 'L34gxiF'),
    ('Tabby Canfield', '1991-03-26', 'tcanfieldq@uiuc.edu', '6432592530', 'R4oxx2QtzvtD'),
    ('Michal Goggey', '1981-01-20', 'mgoggeyr@ox.ac.uk', null, 'MZHWRPl'),
    ('Sherwin Roth', '2000-05-25', 'sroths@discuz.net', null, 'p3jtfxnTkYZI'),
    ('Myrna Cornfoot', '1978-03-02', 'mcornfoott@google.ru', '8783332655', 'jDJGJe'),
    ('Titus Sivior', '1980-10-29', 'tsivioru@infoseek.co.jp', null, 'hI5p8J0'),
    ('Bren Rizon', '1970-06-20', 'brizonv@unblog.fr', null, 'm8i6KWy'),
    ('Jolynn Tyrone', '1971-11-02', 'jtyronew@blogspot.com', '9509405674', 'x2hIvj8eG3');
-------- country --------
ALTER SEQUENCE country_id_seq RESTART WITH 1;
INSERT INTO "country" ("name") VALUES
    ('Afghanistan'),
    ('Albania'),
    ('Algeria'),
    ('American Samoa'),
    ('Andorra'),
    ('Angola'),
    ('Anguilla'),
    ('Antarctica'),
    ('Antigua and Barbuda'),
    ('Argentina'),
    ('Armenia'),
    ('Aruba'),
    ('Australia'),
    ('Austria'),
    ('Azerbaijan'),
    ('Bahamas'),
    ('Bahrain'),
    ('Bangladesh'),
    ('Barbados'),
    ('Belarus'),
    ('Belgium'),
    ('Belize'),
    ('Benin'),
    ('Bermuda'),
    ('Bhutan'),
    ('Bolivia'),
    ('Bosnia and Herzegovina'),
    ('Botswana'),
    ('Bouvet Island'),
    ('Brazil'),
    ('British Indian Ocean Territory'),
    ('Brunei Darussalam'),
    ('Bulgaria'),
    ('Burkina Faso'),
    ('Burundi'),
    ('Cambodia'),
    ('Cameroon'),
    ('Canada'),
    ('Cape Verde'),
    ('Cayman Islands'),
    ('Central African Republic'),
    ('Chad'),
    ('Chile'),
    ('China'),
    ('Christmas Island'),
    ('Cocos (Keeling) Islands'),
    ('Colombia'),
    ('Comoros'),
    ('Democratic Republic of the Congo'),
    ('Republic of the Congo'),
    ('Cook Islands'),
    ('Costa Rica'),
    ('Croatia (Hrvatska)'),
    ('Cuba'),
    ('Cyprus'),
    ('Czech Republic'),
    ('Denmark'),
    ('Djibouti'),
    ('Dominica'),
    ('Dominican Republic'),
    ('East Timor'),
    ('Ecuador'),
    ('Egypt'),
    ('El Salvador'),
    ('Equatorial Guinea'),
    ('Eritrea'),
    ('Estonia'),
    ('Ethiopia'),
    ('Falkland Islands (Malvinas)'),
    ('Faroe Islands'),
    ('Fiji'),
    ('Finland'),
    ('France'),
    ('France, Metropolitan'),
    ('French Guiana'),
    ('French Polynesia'),
    ('French Southern Territories'),
    ('Gabon'),
    ('Gambia'),
    ('Georgia'),
    ('Germany'),
    ('Ghana'),
    ('Gibraltar'),
    ('Guernsey'),
    ('Greece'),
    ('Greenland'),
    ('Grenada'),
    ('Guadeloupe'),
    ('Guam'),
    ('Guatemala'),
    ('Guinea'),
    ('Guinea-Bissau'),
    ('Guyana'),
    ('Haiti'),
    ('Heard and Mc Donald Islands'),
    ('Honduras'),
    ('Hong Kong'),
    ('Hungary'),
    ('Iceland'),
    ('India'),
    ('Isle of Man'),
    ('Indonesia'),
    ('Iran (Islamic Republic of)'),
    ('Iraq'),
    ('Ireland'),
    ('Israel'),
    ('Italy'),
    ('Ivory Coast'),
    ('Jersey'),
    ('Jamaica'),
    ('Japan'),
    ('Jordan'),
    ('Kazakhstan'),
    ('Kenya'),
    ('Kiribati'),
    ('Korea, Democratic People''s Republic of'),
    ('Korea, Republic of'),
    ('Kosovo'),
    ('Kuwait'),
    ('Kyrgyzstan'),
    ('Lao People''s Democratic Republic'),
    ('Latvia'),
    ('Lebanon'),
    ('Lesotho'),
    ('Liberia'),
    ('Libyan Arab Jamahiriya'),
    ('Liechtenstein'),
    ('Lithuania'),
    ('Luxembourg'),
    ('Macau'),
    ('North Macedonia'),
    ('Madagascar'),
    ('Malawi'),
    ('Malaysia'),
    ('Maldives'),
    ('Mali'),
    ('Malta'),
    ('Marshall Islands'),
    ('Martinique'),
    ('Mauritania'),
    ('Mauritius'),
    ('Mayotte'),
    ('Mexico'),
    ('Micronesia, Federated States of'),
    ('Moldova, Republic of'),
    ('Monaco'),
    ('Mongolia'),
    ('Montenegro'),
    ('Montserrat'),
    ('Morocco'),
    ('Mozambique'),
    ('Myanmar'),
    ('Namibia'),
    ('Nauru'),
    ('Nepal'),
    ('Netherlands'),
    ('Netherlands Antilles'),
    ('New Caledonia'),
    ('New Zealand'),
    ('Nicaragua'),
    ('Niger'),
    ('Nigeria'),
    ('Niue'),
    ('Norfolk Island'),
    ('Northern Mariana Islands'),
    ('Norway'),
    ('Oman'),
    ('Pakistan'),
    ('Palau'),
    ('Palestine'),
    ('Panama'),
    ('Papua New Guinea'),
    ('Paraguay'),
    ('Peru'),
    ('Philippines'),
    ('Pitcairn'),
    ('Poland'),
    ('Portugal'),
    ('Puerto Rico'),
    ('Qatar'),
    ('Reunion'),
    ('Romania'),
    ('Russian Federation'),
    ('Rwanda'),
    ('Saint Kitts and Nevis'),
    ('Saint Lucia'),
    ('Saint Vincent and the Grenadines'),
    ('Samoa'),
    ('San Marino'),
    ('Sao Tome and Principe'),
    ('Saudi Arabia'),
    ('Senegal'),
    ('Serbia'),
    ('Seychelles'),
    ('Sierra Leone'),
    ('Singapore'),
    ('Slovakia'),
    ('Slovenia'),
    ('Solomon Islands'),
    ('Somalia'),
    ('South Africa'),
    ('South Georgia South Sandwich Islands'),
    ('South Sudan'),						    
    ('Spain'),
    ('Sri Lanka'),
    ('St. Helena'),
    ('St. Pierre and Miquelon'),
    ('Sudan'),
    ('Suriname'),
    ('Svalbard and Jan Mayen Islands'),
    ('Swaziland'),
    ('Sweden'),
    ('Switzerland'),
    ('Syrian Arab Republic'),
    ('Taiwan'),
    ('Tajikistan'),
    ('Tanzania, United Republic of'),
    ('Thailand'),
    ('Togo'),
    ('Tokelau'),
    ('Tonga'),
    ('Trinidad and Tobago'),
    ('Tunisia'),
    ('Turkey'),
    ('Turkmenistan'),
    ('Turks and Caicos Islands'),
    ('Tuvalu'),
    ('Uganda'),
    ('Ukraine'),
    ('United Arab Emirates'),
    ('United Kingdom'),
    ('United States'),
    ('United States minor outlying islands'),
    ('Uruguay'),
    ('Uzbekistan'),
    ('Vanuatu'),
    ('Vatican City State'),
    ('Venezuela'),
    ('Vietnam'),
    ('Virgin Islands (British)'),
    ('Virgin Islands (U.S.)'),
    ('Wallis and Futuna Islands'),
    ('Western Sahara'),
    ('Yemen'),
    ('Zambia'),
    ('Zimbabwe');
-------- address --------
ALTER SEQUENCE address_id_seq RESTART WITH 1;
INSERT INTO "address" ("street", "postal_code", "city", "id_country") VALUES
    ('3 Upham Crossing', '62930-000', 'Limoeiro do Norte', 122),
    ('23143 Mosinee Street', '895-98', 'Ea Drăng', 175),
    ('2 Lien Way', '8956-985', 'Jiaotan', 99),
    ('7 Mariners Cove Court', '4435-761', 'Kanigorokrajan', 201),
    ('98 Reinke Street', '16009', 'San Pedro Carchá', 44),
    ('3 Lawn Road', '15290-000', 'Buritama', 232),
    ('5379 Cascade Crossing', '862 95', 'Njurunda', 45),
    ('29650 Starling Drive', '985-987', 'Beidajie', 188),
    ('92479 Harper Lane', '12700', 'Butterworth', 241),
    ('261 Thackeray Center', '4640-540', 'Lamas', 81),
    ('5 Redwing Avenue', '4952-98', 'Lymanske', 209),
    ('9 Daystar Parkway', '5648-465', 'Karangpete', 167),
    ('47713 Bellgrove Pass', '538 54', 'Luže', 218),
    ('00 Sherman Center', '956', 'Wailolong', 22),
    ('0677 Manley Pass', '4404', 'Bombon', 147),
    ('93903 Welch Terrace', '90505', 'Torrance', 53),
    ('3005 Pearson Lane', '276-0017', 'Hirado', 115),
    ('5 Eastwood Circle', '95991', 'Luchenza', 169),
    ('53072 Vernon Way', '6305', 'Sindangan', 222),
    ('232 Schurz Junction', '65161', 'Machala', 11),
    ('307 Boyd Center', '5606', 'Malinao', 13),
    ('86 Tomscot Drive', '562', 'Mutangyuan', 219),
    ('8 Riverside Way', '651-498', 'Namyangju', 35),
    ('6 Dovetail Park', '427 40', 'Billdal', 209),
    ('3409 Donald Junction', '14109', 'Berlin', 218),
    ('98 Upham Center', '9841 984', 'Birayang', 55),
    ('53 Stephen Drive', '984', 'Brylivka', 208),
    ('34039 Morningstar Alley', '431 41', 'Údlice', 35),
    ('8127 Pawling Way', '99-210', 'Uniejów', 77),
    ('5115 Haas Way', '781', 'Höfn', 46),
    ('1205 Victoria Circle', '07509 CEDEX', 'Guilherand-Granges', 4),
    ('663 Hanson Plaza', '9841', 'Ashgabat', 114),
    ('70 Toban Park', '6518', 'Daojiang', 80),
    ('1384 Nelson Alley', '7320', 'Jankovec', 56),
    ('6 Helena Drive', '651', 'Jiaoyuan', 87),
    ('2483 Banding Pass', '4760-743', 'Vilarinho das Cambas', 206),
    ('816 Corry Parkway', '65191', 'Lakbok', 246),
    ('57529 Fieldstone Lane', '1855', 'Laiguangying', 53),
    ('4 Badeau Place', '37900', 'La Esperanza', 103),
    ('9228 Talmadge Avenue', '681-88', 'Polen', 14),
    ('0 Ridge Oak Avenue', '78703', 'Austin', 198),
    ('2 Havey Hill', '6511', 'Wenqiao', 128),
    ('676 Muir Place', '32309', 'Tallahassee', 52),
    ('253 Michigan Parkway', '95011 CEDEX', 'Cergy-Pontoise', 186),
    ('6453 Victoria Pass', '96152', 'Changshu City', 31),
    ('1166 Anthes Pass', '626-0072', 'Maizuru', 59),
    ('02 Bobwhite Junction', '56252', 'Anjozorobe', 87),
    ('3 Grim Alley', '1420', 'Trbovlje', 150),
    ('6851 Moland Center', '650651', 'Dầu Tiếng', 228),
    ('8168 Ridgeview Lane', '26350', 'Miribel', 111);
-------- credit_card --------
ALTER SEQUENCE credit_card_id_seq RESTART WITH 1;
INSERT INTO "credit_card" ("name", "number", "expiration", "cvv") VALUES 
    ('Brandi Londors', '5602246709903322', '2021-08-05', 280),
    ('Eartha Mountain', '5108752919388484', '2021-07-09', 140),
    ('Sheri Pepon', '58938708738962516', '2020-09-09', 711),
    ('Terza Chrispin', '3553577389907520', '2021-05-26', 912),
    ('Winnifred D''eye', '5494031656087175', '2020-04-25', 673),
    ('Linus Baumler', '502054116790691509', '2020-04-24', 686),
    ('Noemi Purcer', '0604584703813124460', '2021-01-09', 534),
    ('Scarface Mattiassi', '3548953729726490', '2022-01-15', 818),
    ('Ginny Ferreri', '3568332110673980', '2020-07-19', 614),
    ('Ailbert Broddle', '5157204687526515', '2020-06-22', 692),
    ('Corri Ducker', '5602216519876244507', '2021-03-20', 181),
    ('Alfie Hemphall', '4508145237267937', '2022-03-10', 175),
    ('Addia Swatridge', '4026116758138628', '2020-05-11', 486),
    ('Roland Dormon', '374283795307008', '2022-01-08', 183),
    ('Rosita Turley', '5292625719954869', '2021-06-02', 822),
    ('Sheffield Albutt', '4405874618090253', '2021-11-12', 174),
    ('Willis Dyzart', '5610330422416745', '2021-08-17', 445),
    ('Beryl Wimlett', '4919420982628', '2021-11-05', 136),
    ('Gram Goom', '36593352495818', '2021-06-21', 376),
    ('Adrianne Swift', '5586465823354432', '2020-08-21', 321),
    ('Micky Temporal', '3542547277785845', '2020-05-27', 779),
    ('Alexi Rains', '3554851672114451', '2022-01-13', 771),
    ('Nettie Schulke', '5602225991213293', '2020-07-20', 715),
    ('Mallory Perelli', '6379401608403705', '2021-12-25', 967),
    ('Barbabra Maton', '344074775147481', '2021-04-29', 890),
    ('Germana Howsley', '3534332822865800', '2021-02-01', 351),
    ('Celestina Rihanek', '3538133526663640', '2021-10-27', 702),
    ('Isaiah Baake', '4175006462561984', '2021-06-23', 281),
    ('Wheeler McManus', '3582224434472888', '2021-02-06', 731),
    ('Nerte Ulrik', '3569004138493761', '2022-03-05', 510),
    ('Christoforo Blankhorn', '3586796223973669', '2020-12-27', 326),
    ('Sonny Blanning', '337941260982060', '2022-02-10', 607),
    ('Dodi Samme', '3573974768087782', '2022-03-22', 952),
    ('Polly Cossor', '50380804033690363', '2021-09-13', 809),
    ('Belita Kellert', '30412277520418', '2022-01-26', 769),
    ('Janetta Garratt', '3552605036803627', '2021-06-18', 123),
    ('Kellby Giggs', '3540659677642567', '2020-09-13', 192),
    ('Angelle Shirland', '4936630003732257', '2021-05-07', 627),
    ('Tore Carmen', '5002350786107280', '2020-10-12', 242),
    ('Tania Bremley', '6395275523576765', '2020-10-01', 150),
    ('Madelina Alexsandrov', '201841500821792', '2020-09-26', 182),
    ('Bradly Cuzen', '3537552917507507', '2021-06-12', 781),
    ('Janela Gartin', '4175003946575243', '2021-01-30', 859),
    ('Wolfgang Paffot', '3550305223839045', '2020-04-29', 484),
    ('Toma Beedham', '3580161413337397', '2021-03-10', 634),
    ('Zilvia Whitemarsh', '372301020551984', '2021-04-16', 690),
    ('Lance Guttridge', '5602224536695908', '2021-03-15', 911),
    ('Carmelia Melledy', '5592626197318475', '2021-06-05', 415),
    ('Caspar Turvie', '3538645594679695', '2020-10-07', 568),
    ('Craig Wogan', '3555805197041168', '2022-01-05', 583);
-------- paypal --------
ALTER SEQUENCE paypal_id_seq RESTART WITH 1;
INSERT INTO "paypal" ("email") VALUES
    ('bbirkin0@foxnews.com'),
    ('jtolefree1@simplemachines.org'),
    ('ctopham2@fotki.com'),
    ('lsoigne3@google.it'),
    ('gweedon4@sbwire.com'),
    ('rsabater5@mail.ru'),
    ('babbie6@goo.gl'),
    ('kberndtssen7@topsy.com'),
    ('jfranschini8@canalblog.com'),
    ('gmcmains9@behance.net'),
    ('bwestfielda@vk.com'),
    ('goillerb@alexa.com'),
    ('acowpertwaitc@netvibes.com'),
    ('lgruszkad@nasa.gov'),
    ('jleupolde@umich.edu'),
    ('bthewsf@nymag.com'),
    ('vdevauxg@jiathis.com'),
    ('fsateh@archive.org'),
    ('nadcocksi@psu.edu'),
    ('sarbucklej@usda.gov'),
    ('vgiacobonik@last.fm'),
    ('dschollingl@globo.com'),
    ('ssaltresem@reference.com'),
    ('slamprechtn@purevolume.com'),
    ('gpueso@wordpress.org');
-------- payment_method --------
ALTER SEQUENCE payment_method_id_seq RESTART WITH 1;
INSERT INTO "payment_method" ("id_cc", "id_pp") VALUES
    (20, null),
    (45, null),
    (7, null),
    (null, 17),
    (24, null),
    (50, null),
    (null, 22),
    (null, 9),
    (null, 5),
    (36, null),
    (5, null),
    (null, 20),
    (null, 12),
    (null, 11),
    (30, null),
    (null, 16),
    (null, 17),
    (35, null),
    (null, 13),
    (null, 12),
    (50, null),
    (null, 24),
    (null, 12),
    (null, 1),
    (null, 1),
    (9, null),
    (21, null),
    (20, null),
    (null, 23),
    (22, null),
    (null, 23),
    (27, null),
    (null, 3),
    (27, null),
    (null, 8),
    (null, 12),
    (7, null),
    (null, 1),
    (43, null),
    (30, null),
    (32, null),
    (33, null),
    (null, 25),
    (null, 12),
    (null, 5),
    (null, 22),
    (null, 5),
    (null, 22),
    (47, null),
    (6, null);
-------- order --------
ALTER SEQUENCE order_id_seq RESTART WITH 1;
INSERT INTO "order" ("date", "total", "status", "id_user", "id_address", "id_payment_method") VALUES
    ('2020-02-04', 107.98, 'processing', 2, 18, 1),
    ('2020-02-23', 1302.57, 'processing', 80, 16, 29),
    ('2020-03-19', 732.45, 'processing', 96, 9, 27),
    ('2020-02-18', 7.99, 'received', 65, 14, 16),
    ('2020-02-02', 7.99, 'shipped', 95, 1, 5),
    ('2020-02-10', 18.48, 'shipped', 22, 13, 8),
    ('2020-01-28', 1206.8, 'received', 23, 6, 26),
    ('2020-02-24', 303.40, 'received', 78, 18, 21),
    ('2020-02-05', 7.99, 'received', 86, 4, 19),
    ('2020-01-27', 1152.58, 'received', 55, 3, 7),
    ('2020-02-27', 7.99, 'received', 4, 1, 22),
    ('2020-03-06', 7.99, 'processing', 57, 9, 19),
    ('2020-02-23', 174.03, 'shipped', 66, 2, 22),
    ('2020-02-24', 352.96, 'processing', 27, 17, 6),
    ('2020-02-23', 17.99, 'received', 52, 6, 21),
    ('2020-03-26', 460.39, 'received', 29, 20, 9),
    ('2020-02-16', 17.99, 'received', 18, 10, 24),
    ('2020-03-26', 17.99, 'received', 100, 2, 27),
    ('2020-02-02', 54.44, 'received', 1, 7, 20),
    ('2020-02-22', 17.99, 'received', 28, 5, 25),
    ('2020-02-09', 1753.53, 'shipped', 69, 17, 13),
    ('2020-02-20', 619.44, 'received', 66, 5, 25),
    ('2020-03-07', 17.99, 'received', 13, 2, 5),
    ('2020-03-04', 1279.68, 'shipped', 85, 15, 21),
    ('2020-03-17', 1063.03, 'received', 18, 20, 19),
    ('2020-01-30', 1341.08, 'received', 50, 1, 29),
    ('2020-03-22', 17.99, 'received', 9, 16, 27),
    ('2020-03-12', 722.19, 'shipped', 27, 5, 19),
    ('2020-03-15', 17.99, 'received', 5, 15, 13),
    ('2020-02-04', 195.17, 'processing', 45, 4, 18);
	
-------- category --------
INSERT INTO "category" ("id", "name", "id_parent") VALUES
    ---- main
    (1, 'Designs', null),
    (2, 'Ink', null),
    (3, 'Machines', null),
    (4, 'Needles & Cartridges', null),
    (5, 'Grips, Tips & Tubes', null),
    (6, 'Studio Furniture', null),
    (7, 'Aftercare', null),
    (8, 'Medical Equipment', null),
    (9, 'Tattoo Supplies', null),
    ---- secondary
    -- Designs
    (10, 'Traditional/Old School', 1),
    (11, 'Realism', 1),
    (12, 'Watercolor', 1),
    (13, 'Tribal', 1),
    (14, 'Cartoon/New School', 1),
    (15, 'Japanese', 1),
    (16, 'Dotwork', 1),
    (17, 'Blackwork', 1),
    (18, 'Illustrative', 1),
    (19, 'Chicano', 1),
    (20, 'Neo Traditional', 1),
    -- Ink
    (21, 'Black', 2),
    (22, 'Grey', 2),
    (23, 'Red', 2),
    (24, 'Blue', 2),
    (25, 'Green', 2),
    (26, 'Purple', 2),
    (27, 'White', 2),
    (28, 'Pink', 2),
    (29, 'Yellow', 2),
    (30, 'Orange', 2),
    (31, 'Brown', 2),
    -- Machines
    (32, 'Rotary Machines', 3),
    (33, 'Tattoo Pen', 3),
    (34, 'Hand Poking', 3),
    -- Needles & Cartidges
    (35, 'Needles', 4),
    (36, 'Cartridges', 4),
    -- Grips, Tips & Tubes
    (37, 'Grips', 5),
    (38, 'Tips', 5),
    (39, 'Tubes', 5),
    -- Furniture
    (40, 'Arm/Leg Rests', 6),
    (41, 'Artist Chairs/Stools', 6),
    (42, 'Chairs/Beds', 6),
    (43, 'Lamps', 6),
    (44, 'Workstation/Trolleys', 6),
    -- Aftercare
    (45, 'Balm Tattoo', 7),
    (46, 'Hustle Butter', 7),
    (47, 'Tattoo Goo', 7),
    (48, 'Aftercare Company', 7),
    -- Medical Equipment
    (49, 'Gloves', 8),
    (50, 'Masks', 8),
    (51, 'Skin Preparation', 8),
    (52, 'Bottles/Containers', 8),
    (53, 'Couch Roll', 8),
    (54, 'Disinfectants', 8),
    (55, 'Hygyene', 8),
    -- Studio Supplies
    (56, 'Stencil Making', 9),
    (57, 'Fake Skin', 9),
    (58, 'Books', 9);
ALTER SEQUENCE category_id_seq RESTART WITH 60;
-------- item --------
-- Active
ALTER SEQUENCE item_id_seq RESTART WITH 1;
INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Traditional/Old School - 10
    ('Mom Love', 'John Grimm', 29.99, 1, 'John Grimm is one of our best in-house artist that focuses on Old School and Tribal Styles.', 10),
    ('Lucky Ace', 'John Grimm', 39.99, 1, 'John Grimm is one of our best in-house artist that focuses on Old School and Tribal Styles.', 10),
    ('Dagger', 'John Grimm', 49.99, 1, 'John Grimm is one of our best in-house artist that focuses on Old School and Tribal Styles.', 10),
    -- Realism - 11
    ('Wolf', 'Jackson Silva', 129.99, 1, 'Jackson Silva is a master when it comes to Realism. Having done is bachelors in fine arts, he found a passion for tattoos.', 11),
    ('Heath Ledger''s Joker', 'Jackson Silva', 229.99, 1, 'Jackson Silva is a master when it comes to Realism. Having done is bachelors in fine arts, he found a passion for tattoos.', 11),
    ('Skull', 'Jackson Silva', 129.99, 1, 'Jackson Silva is a master when it comes to Realism. Having done is bachelors in fine arts, he found a passion for tattoos.', 11),
    -- Watercolor - 12
    ('Dog Paw', 'Gina Williamson', 49.99, 1, 'We all have a passion for color but our artist Gina Williamson is completely addicted to it.', 12),
    ('Tree', 'Gina Williamson', 39.99, 1, 'We all have a passion for color but our artist Gina Williamson is completely addicted to it.', 12),
    ('Bird', 'Gina Williamson', 49.99, 1, 'We all have a passion for color but our artist Gina Williamson is completely addicted to it.', 12),
    -- Tribal - 13
    ('Leg Tribal', 'John Grimm', 69.99, 1, 'John Grimm is one of our best in-house artist that focuses on Old School and Tribal Styles.', 13),
    ('Arm Tribal', 'John Grimm', 49.99, 1, 'John Grimm is one of our best in-house artist that focuses on Old School and Tribal Styles.', 13),
    ('Arm and Chest Tribal', 'John Grimm', 49.99, 1, 'John Grimm is one of our best in-house artist that focuses on Old School and Tribal Styles.', 13),
    -- Cartoon/New School - 14
    ('Homer Simpson', 'Gina Williamson', 49.99, 1, 'We all have a passion for color but our artist Gina Williamson is completely addicted to it.', 14),
    ('Spiderman', 'Gina Williamson', 49.99, 1, 'We all have a passion for color but our artist Gina Williamson is completely addicted to it.', 14),
    ('Batman', 'Gina Williamson', 49.99, 1, 'We all have a passion for color but our artist Gina Williamson is completely addicted to it.', 14),
    -- Japanese - 15
    ('Full Body Temple', 'Alex Costa', 249.99, 1, 'All the way from Brazil, Alex Costa learnt his craft from is father Matteus Costa, a master in Dotwork and Japanese styles.', 15),
    ('Buda', 'Alex Costa', 49.99, 1, 'All the way from Brazil, Alex Costa learnt his craft from is father Matteus Costa, a master in Dotwork and Japanese styles.', 15),
    ('Farmer', 'Alex Costa', 49.99, 1, 'All the way from Brazil, Alex Costa learnt his craft from is father Matteus Costa, a master in Dotwork and Japanese styles.', 15),
    -- Dotwork - 16
    ('Mandala', 'Alex Costa', 59.99, 1, 'All the way from Brazil, Alex Costa learnt his craft from is father Matteus Costa, a master in Dotwork and Japanese styles.', 16),
    ('Hive', 'Alex Costa', 49.99, 1, 'All the way from Brazil, Alex Costa learnt his craft from is father Matteus Costa, a master in Dotwork and Japanese styles.', 16),
    ('Skull', 'Alex Costa', 49.99, 1, 'All the way from Brazil, Alex Costa learnt his craft from is father Matteus Costa, a master in Dotwork and Japanese styles.', 16),
    -- Blackwork - 17
    ('Floating House', 'Daniel Pedrada', 45.99, 1, 'Daniel uses one color and one color only: black. It may seem limited, but he also surprised us.', 17),
    ('Skeleton with Geometry', 'Daniel Pedrada', 45.99, 1, 'Daniel uses one color and one color only: black. It may seem limited, but he also surprised us.', 17),
    ('Smoking Heart', 'Daniel Pedrada', 45.99, 1, 'Daniel uses one color and one color only: black. It may seem limited, but he also surprised us.', 17),
    -- Illustrative - 18
    ('Typing Machine', 'Marta Gomez', 45.99, 1, 'As a kid Marta Gomez loved to draw, after finishing school she found out tattoos were her passion.', 18),
    ('Sleepy Cat', 'Marta Gomez', 45.99, 1, 'As a kid Marta Gomez loved to draw, after finishing school she found out tattoos were her passion.', 18),
    ('Beetle', 'Marta Gomez', 45.99, 1, 'As a kid Marta Gomez loved to draw, after finishing school she found out tattoos were her passion.', 18),
    -- Chicano - 19
    ('L.A. Passion', 'Marta Gomez', 45.99, 1, 'As a kid Marta Gomez loved to draw, after finishing school she found out tattoos were her passion.', 19),
    ('Jesus on Cross', 'Marta Gomez', 45.99, 1, 'As a kid Marta Gomez loved to draw, after finishing school she found out tattoos were her passion.', 19),
    ('Gang Queen', 'Marta Gomez', 45.99, 1, 'As a kid Marta Gomez loved to draw, after finishing school she found out tattoos were her passion.', 19),
    -- Neo Traditional - 20
    ('Wolf', 'Jackson Silva', 129.99, 1, 'Jackson Silva is a master when it comes to Realism. Having done is bachelors in fine arts, he found a passion for tattoos.', 20),
    ('Hawk', 'Jackson Silva', 129.99, 1, 'Jackson Silva is a master when it comes to Realism. Having done is bachelors in fine arts, he found a passion for tattoos.', 20),
    ('Lion', 'Jackson Silva', 129.99, 1, 'Jackson Silva is a master when it comes to Realism. Having done is bachelors in fine arts, he found a passion for tattoos.', 20);

INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Black - 21
    -- Dynamic
    ('Dynamic Tattoo Ink 1 Oz - Black', 'Dynamic', 14.99, 65, 'There is a reason that Dynamic Black Tattoo Ink is a favourite among professional artists all around the world, and of course this serves as a testament to the quality the product is capable of providing. This particular selection gives you a fantastically intense shade of black to work with, providing a deep black colour even after healing and frequently named as one of the most effective black inks for lining and tribal designs to have ever been made. You won’t have to settle for some of those other blacks, which can heal with a blue or purple tint to their colouration; this goes on dark and it stays that way, offering the ideal solution for a variety of your needs, regardless of whether you aim to use it in lining, filling, shading or just about anything else you could imagine. This is of course part of the dynamic inks range produced by Technical Tattoo Supplies, specifically for the purpose of providing new, bolder and more vibrant colour on the skin than ever before, and this is certainly something that they have accomplished. This is not just a fantastic colour, but a fantastic ink, available in either 1oz or 8oz bottles you are sure to get the right amount for your particular needs, and this ink offers the ideal consistency, pushing into the skin smoothly and easily while providing something not too thick for lining work and yet not too thin for colour work.', 21),
    ('Dynamic Tattoo Ink 8 Oz - Black', 'Dynamic', 44.99, 25, 'There is a reason that Dynamic Black Tattoo Ink is a favourite among professional artists all around the world, and of course this serves as a testament to the quality the product is capable of providing. This particular selection gives you a fantastically intense shade of black to work with, providing a deep black colour even after healing and frequently named as one of the most effective black inks for lining and tribal designs to have ever been made. You won’t have to settle for some of those other blacks, which can heal with a blue or purple tint to their colouration; this goes on dark and it stays that way, offering the ideal solution for a variety of your needs, regardless of whether you aim to use it in lining, filling, shading or just about anything else you could imagine. This is of course part of the dynamic inks range produced by Technical Tattoo Supplies, specifically for the purpose of providing new, bolder and more vibrant colour on the skin than ever before, and this is certainly something that they have accomplished. This is not just a fantastic colour, but a fantastic ink, available in either 1oz or 8oz bottles you are sure to get the right amount for your particular needs, and this ink offers the ideal consistency, pushing into the skin smoothly and easily while providing something not too thick for lining work and yet not too thin for colour work.', 21),
    ('Dynamic Tattoo Ink 1 Oz - Triple Black', 'Dynamic', 19.99, 13, 'Triple the darkness of your black ink with Dynamic Triple Black. Dynamic Triple Black has been designed to create an even blacker, bolder look on the skin. A more concentrated version of the original Dynamic Black, this ink has been given a higher pigment concentration to assist in lining, shading, tribal work or blending to create your desired wash. Dynamic Tattoo Ink has long been a favourite in tattoo studios around the world. A pre-dispersed, premium ink designed to help tattoo artists carry out bolder, long lasting colours. Dynamic Black has the reputation for going into the skin very easily and staying dark after healing. Perfect for artists who like a thinner blended ink. This versatile ink also mixes perfectly with other pre-made washes to help you find the perfect wash for the tattoo design in mind.', 21),
    ('Dynamic Tattoo Ink 8 Oz - Triple Black', 'Dynamic', 59.99, 29, 'Triple the darkness of your black ink with Dynamic Triple Black. Dynamic Triple Black has been designed to create an even blacker, bolder look on the skin. A more concentrated version of the original Dynamic Black, this ink has been given a higher pigment concentration to assist in lining, shading, tribal work or blending to create your desired wash. Dynamic Tattoo Ink has long been a favourite in tattoo studios around the world. A pre-dispersed, premium ink designed to help tattoo artists carry out bolder, long lasting colours. Dynamic Black has the reputation for going into the skin very easily and staying dark after healing. Perfect for artists who like a thinner blended ink. This versatile ink also mixes perfectly with other pre-made washes to help you find the perfect wash for the tattoo design in mind.', 21),
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Pitch Black', 'World Famous Ink', 15.99, 45, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 21),
    ('World Famous Ink 4 Oz - Pitch Black', 'World Famous Ink', 39.99, 21, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 21),
    -- Eternal
    ('Eternal Ink 1 Oz - Maxx Black', 'Eternal', 9.99, 2, 'Eternal Ink MAXX Black is a smooth, opaque, single pigment black tattoo ink without a colour shift or undertone. A truly black ink that goes in black and stays black! Developed over many years by the Eternal Ink Research & Design team, Maxx Black has a thinner viscosity than Eternal Triple Black and a similar one to Eternal Lining Black for comparison. The search for a blacker, darker pigment source became a global effort in itself and Eternal Ink came close to success several times. In November 2018, all the hard work, searching, creating and testing finally paid off and Eternal Ink MAXX Black was produced.', 21),
    ('Eternal Ink 2 Oz - Maxx Black', 'Eternal', 17.99, 6, 'Eternal Ink MAXX Black is a smooth, opaque, single pigment black tattoo ink without a colour shift or undertone. A truly black ink that goes in black and stays black! Developed over many years by the Eternal Ink Research & Design team, Maxx Black has a thinner viscosity than Eternal Triple Black and a similar one to Eternal Lining Black for comparison. The search for a blacker, darker pigment source became a global effort in itself and Eternal Ink came close to success several times. In November 2018, all the hard work, searching, creating and testing finally paid off and Eternal Ink MAXX Black was produced.', 21),
    ('Eternal Ink 4 Oz - Maxx Black', 'Eternal', 36.99, 8, 'Eternal Ink MAXX Black is a smooth, opaque, single pigment black tattoo ink without a colour shift or undertone. A truly black ink that goes in black and stays black! Developed over many years by the Eternal Ink Research & Design team, Maxx Black has a thinner viscosity than Eternal Triple Black and a similar one to Eternal Lining Black for comparison. The search for a blacker, darker pigment source became a global effort in itself and Eternal Ink came close to success several times. In November 2018, all the hard work, searching, creating and testing finally paid off and Eternal Ink MAXX Black was produced.', 21),
    ('Eternal Ink 8 Oz - Maxx Black', 'Eternal', 59.99, 9, 'Eternal Ink MAXX Black is a smooth, opaque, single pigment black tattoo ink without a colour shift or undertone. A truly black ink that goes in black and stays black! Developed over many years by the Eternal Ink Research & Design team, Maxx Black has a thinner viscosity than Eternal Triple Black and a similar one to Eternal Lining Black for comparison. The search for a blacker, darker pigment source became a global effort in itself and Eternal Ink came close to success several times. In November 2018, all the hard work, searching, creating and testing finally paid off and Eternal Ink MAXX Black was produced.', 21),
    ('Eternal Ink 1 Oz - Motor City Blackbird', 'Eternal', 13.99, 3, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 21),
    ('Eternal Ink 1/2 Oz - Lining Black', 'Eternal', 7.99, 3, 'Lining is something most tattoo artists will do on a daily basis and you generally find you go through more black lining ink than any other colour. Of course with something you use so frequently you want to be sure you’re getting good quality results, which is why this particular option provided by eternal inks is quite so good. The ink, as with all eternal inks, is a high quality option that provides long lasting, durable colour that offers as little fade as possible, this is available in a selection of sizes to ensure you’re getting what you need from the ink and to provide you with the opportunity to reduce your costs and waste materials. The ink itself is produced using a selection of natural materials, which not only help to ensure that the ink is of a high quality but also help to ensure that the resulting ink is a non-toxic organic option. The organic nature of the ink makes it a much more comfortable option, as the organic pigment is less likely to cause irritation when applied to the skin compared to some of the alternatives. To further ensure the comfort and safety of your customers we also sterilize our inks, which includes the use of gamma ray technology to eliminate any potentially harmful bacteria that may otherwise be present within the ink, bacteria that would have otherwise been the most likely cause of skin irritation, allergic reactions and even infections.', 21),
    ('Eternal Ink 1 Oz - Lining Black', 'Eternal', 17.99, 3, 'Lining is something most tattoo artists will do on a daily basis and you generally find you go through more black lining ink than any other colour. Of course with something you use so frequently you want to be sure you’re getting good quality results, which is why this particular option provided by eternal inks is quite so good. The ink, as with all eternal inks, is a high quality option that provides long lasting, durable colour that offers as little fade as possible, this is available in a selection of sizes to ensure you’re getting what you need from the ink and to provide you with the opportunity to reduce your costs and waste materials. The ink itself is produced using a selection of natural materials, which not only help to ensure that the ink is of a high quality but also help to ensure that the resulting ink is a non-toxic organic option. The organic nature of the ink makes it a much more comfortable option, as the organic pigment is less likely to cause irritation when applied to the skin compared to some of the alternatives. To further ensure the comfort and safety of your customers we also sterilize our inks, which includes the use of gamma ray technology to eliminate any potentially harmful bacteria that may otherwise be present within the ink, bacteria that would have otherwise been the most likely cause of skin irritation, allergic reactions and even infections.', 21),
    ('Eternal Ink 2 Oz - Lining Black', 'Eternal', 27.99, 3, 'Lining is something most tattoo artists will do on a daily basis and you generally find you go through more black lining ink than any other colour. Of course with something you use so frequently you want to be sure you’re getting good quality results, which is why this particular option provided by eternal inks is quite so good. The ink, as with all eternal inks, is a high quality option that provides long lasting, durable colour that offers as little fade as possible, this is available in a selection of sizes to ensure you’re getting what you need from the ink and to provide you with the opportunity to reduce your costs and waste materials. The ink itself is produced using a selection of natural materials, which not only help to ensure that the ink is of a high quality but also help to ensure that the resulting ink is a non-toxic organic option. The organic nature of the ink makes it a much more comfortable option, as the organic pigment is less likely to cause irritation when applied to the skin compared to some of the alternatives. To further ensure the comfort and safety of your customers we also sterilize our inks, which includes the use of gamma ray technology to eliminate any potentially harmful bacteria that may otherwise be present within the ink, bacteria that would have otherwise been the most likely cause of skin irritation, allergic reactions and even infections.', 21),
    ('Eternal Ink 4 Oz - Lining Black', 'Eternal', 37.99, 3, 'Lining is something most tattoo artists will do on a daily basis and you generally find you go through more black lining ink than any other colour. Of course with something you use so frequently you want to be sure you’re getting good quality results, which is why this particular option provided by eternal inks is quite so good. The ink, as with all eternal inks, is a high quality option that provides long lasting, durable colour that offers as little fade as possible, this is available in a selection of sizes to ensure you’re getting what you need from the ink and to provide you with the opportunity to reduce your costs and waste materials. The ink itself is produced using a selection of natural materials, which not only help to ensure that the ink is of a high quality but also help to ensure that the resulting ink is a non-toxic organic option. The organic nature of the ink makes it a much more comfortable option, as the organic pigment is less likely to cause irritation when applied to the skin compared to some of the alternatives. To further ensure the comfort and safety of your customers we also sterilize our inks, which includes the use of gamma ray technology to eliminate any potentially harmful bacteria that may otherwise be present within the ink, bacteria that would have otherwise been the most likely cause of skin irritation, allergic reactions and even infections.', 21),
    ('Eternal Ink 8 Oz - Lining Black', 'Eternal', 47.99, 3, 'Lining is something most tattoo artists will do on a daily basis and you generally find you go through more black lining ink than any other colour. Of course with something you use so frequently you want to be sure you’re getting good quality results, which is why this particular option provided by eternal inks is quite so good. The ink, as with all eternal inks, is a high quality option that provides long lasting, durable colour that offers as little fade as possible, this is available in a selection of sizes to ensure you’re getting what you need from the ink and to provide you with the opportunity to reduce your costs and waste materials. The ink itself is produced using a selection of natural materials, which not only help to ensure that the ink is of a high quality but also help to ensure that the resulting ink is a non-toxic organic option. The organic nature of the ink makes it a much more comfortable option, as the organic pigment is less likely to cause irritation when applied to the skin compared to some of the alternatives. To further ensure the comfort and safety of your customers we also sterilize our inks, which includes the use of gamma ray technology to eliminate any potentially harmful bacteria that may otherwise be present within the ink, bacteria that would have otherwise been the most likely cause of skin irritation, allergic reactions and even infections.', 21),
    ('Eternal Ink 1 Oz - Liner Black', 'Eternal', 12.99, 3, 'Organic, vegan-friendly, and non-toxic choice in tattoo inks. Eternal Ink is a USA made ink that meets European regulations. The product is backed by a veteran tattoo artist who knows what you need in ink. The colours are some of the brightest, and the water-based pigment is manufactured without ever being frozen. You''ll get a fresh pigment that hasn''t been compromised in the production process.', 21),
    ('Eternal Ink 2 Oz - Liner Black', 'Eternal', 24.99, 3, 'Organic, vegan-friendly, and non-toxic choice in tattoo inks. Eternal Ink is a USA made ink that meets European regulations. The product is backed by a veteran tattoo artist who knows what you need in ink. The colours are some of the brightest, and the water-based pigment is manufactured without ever being frozen. You''ll get a fresh pigment that hasn''t been compromised in the production process.', 21),
    ('Eternal Ink 4 Oz - Liner Black', 'Eternal', 42.99, 3, 'Organic, vegan-friendly, and non-toxic choice in tattoo inks. Eternal Ink is a USA made ink that meets European regulations. The product is backed by a veteran tattoo artist who knows what you need in ink. The colours are some of the brightest, and the water-based pigment is manufactured without ever being frozen. You''ll get a fresh pigment that hasn''t been compromised in the production process.', 21),
    -- Kuro sumi
    ('Kuro Sumi 6 Oz - Black Linear', 'Kuro Sumi', 19.99, 21, 'Kuro Sumi black liner tattoo ink is a must have for the serious tattoo artist. It is voted the best lining ink available on the market and is used by thousands of professionals worldwide. The ink goes into the skin smoothly and evenly for crisp and clean lines that heal flawlessly. Made to the highest of standards using organic and vegan friendly elements. Named after the famous Kuro Sumi Tangnuni Japanese warriors who were considered as an elite force in Japanese history. A must have for any professional looking to push the boundaries in tattooing.', 21),
    ('Kuro Sumi 12 Oz - Black Linear', 'Kuro Sumi', 36.99, 21, 'Kuro Sumi black liner tattoo ink is a must have for the serious tattoo artist. It is voted the best lining ink available on the market and is used by thousands of professionals worldwide. The ink goes into the skin smoothly and evenly for crisp and clean lines that heal flawlessly. Made to the highest of standards using organic and vegan friendly elements. Named after the famous Kuro Sumi Tangnuni Japanese warriors who were considered as an elite force in Japanese history. A must have for any professional looking to push the boundaries in tattooing.', 21),
    ('Kuro Sumi 6 Oz - Outline', 'Kuro Sumi', 16.99, 21, 'This outline ink has been voted as one of the best and most consistent inks available on the market. It is used worldwide by many outstanding artists. Kuro Sumi ink is named after the famous ancient Yayoi Kuro Sumi Tangnuni Warrior of Japan and its secret formulas have been handed down for centuries from Japanese artists.', 21),
    ('Kuro Sumi 12 Oz - Outline', 'Kuro Sumi', 36.99, 21, 'This outline ink has been voted as one of the best and most consistent inks available on the market. It is used worldwide by many outstanding artists. Kuro Sumi ink is named after the famous ancient Yayoi Kuro Sumi Tangnuni Warrior of Japan and its secret formulas have been handed down for centuries from Japanese artists.', 21),
    -- Grey - 22
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Rolling Stone', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 22),
    -- Eternal
    ('Eternal Ink 1 Oz - Motor City Bondo', 'Eternal', 12.99, 4, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 22),
    ('Eternal Ink 1/2 Oz - Smoke', 'Eternal', 7.99, 4, 'This is a smoky option of grey-blue which provides a natural and attractive colour for a wide variety of tattoo designs, regardless of the size or style of the tattoo you hope to incorporate the colour into. This is a soft, medium tone colour which of course means it blends well with a selection of other shades and colours and provides a great option for larger sections of a design, as the colour isn’t so vivid as to draw attention away from the finer details. However, it is light enough to be used to highlight the more intricate details of a design, particularly in a darker tattoo design, which makes it a fantastic option to have around as a general purpose ink. This ink is available in a selection of the most popular sizes, so you can be certain you have as much as you need regardless of how big or how many tattoos you will be designing with the ink over any given space of time, it is also a great way of ensuring you have the opportunity to save cost and waste materials with your order. The ink is, like all eternal inks, a non-toxic and organic option, which ensures a better healing process due to the less abrasive nature of the ink.', 22),
    ('Eternal Ink 1 Oz - Smoke', 'Eternal', 12.99, 4, 'This is a smoky option of grey-blue which provides a natural and attractive colour for a wide variety of tattoo designs, regardless of the size or style of the tattoo you hope to incorporate the colour into. This is a soft, medium tone colour which of course means it blends well with a selection of other shades and colours and provides a great option for larger sections of a design, as the colour isn’t so vivid as to draw attention away from the finer details. However, it is light enough to be used to highlight the more intricate details of a design, particularly in a darker tattoo design, which makes it a fantastic option to have around as a general purpose ink. This ink is available in a selection of the most popular sizes, so you can be certain you have as much as you need regardless of how big or how many tattoos you will be designing with the ink over any given space of time, it is also a great way of ensuring you have the opportunity to save cost and waste materials with your order. The ink is, like all eternal inks, a non-toxic and organic option, which ensures a better healing process due to the less abrasive nature of the ink.', 22),
    ('Eternal Ink 2 Oz - Smoke', 'Eternal', 21.99, 4, 'This is a smoky option of grey-blue which provides a natural and attractive colour for a wide variety of tattoo designs, regardless of the size or style of the tattoo you hope to incorporate the colour into. This is a soft, medium tone colour which of course means it blends well with a selection of other shades and colours and provides a great option for larger sections of a design, as the colour isn’t so vivid as to draw attention away from the finer details. However, it is light enough to be used to highlight the more intricate details of a design, particularly in a darker tattoo design, which makes it a fantastic option to have around as a general purpose ink. This ink is available in a selection of the most popular sizes, so you can be certain you have as much as you need regardless of how big or how many tattoos you will be designing with the ink over any given space of time, it is also a great way of ensuring you have the opportunity to save cost and waste materials with your order. The ink is, like all eternal inks, a non-toxic and organic option, which ensures a better healing process due to the less abrasive nature of the ink.', 22),
    -- Red - 23
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Red Hot Chili Pepper', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 23),
    ('World Famous Ink 1 Oz - Sailor Jerry red', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 23),
    ('World Famous Ink 1 Oz - Burgundy Wine', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 23),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Lipstick Red', 'Eternal', 12.99, 4, 'A good, bold and strong shade of red can be difficult to find but can have an excellent impact on the design of the tattoo you’re planning, as the right choice of colours can often make a huge difference to a tattoo design. This particular colour is a strong and passionate shade of red, often associated with the red of women’s lipstick, which was once called witchcraft due to its ability to seduce men, certainly making it a powerful and seductive shade to include in your tattoo works. This is available in a selection of sizes for your convenience and would of course provide you with an excellent opportunity to reduce your costs and waste materials. The ink itself is of a high standard of production, using a selection of natural materials to provide not only a long lasting, vibrant colour but also to ensure that the ink produced is a non-toxic, organic option. The organic nature of the ink is particularly helpful, as the organic pigment ink is less likely to cause a reaction on the skin. This is further aided by our sterilization process, something that very few suppliers invest in despite the benefits; the process includes the use of gamma radiation to remove any potentially harmful bacteria that may be present within the ink, bacteria that would otherwise have been the most likely cause of skin irritation, allergic reactions and even infections.', 23),
    ('Eternal Ink 1 Oz - Lipstick Red', 'Eternal', 22.99, 9, 'A good, bold and strong shade of red can be difficult to find but can have an excellent impact on the design of the tattoo you’re planning, as the right choice of colours can often make a huge difference to a tattoo design. This particular colour is a strong and passionate shade of red, often associated with the red of women’s lipstick, which was once called witchcraft due to its ability to seduce men, certainly making it a powerful and seductive shade to include in your tattoo works. This is available in a selection of sizes for your convenience and would of course provide you with an excellent opportunity to reduce your costs and waste materials. The ink itself is of a high standard of production, using a selection of natural materials to provide not only a long lasting, vibrant colour but also to ensure that the ink produced is a non-toxic, organic option. The organic nature of the ink is particularly helpful, as the organic pigment ink is less likely to cause a reaction on the skin. This is further aided by our sterilization process, something that very few suppliers invest in despite the benefits; the process includes the use of gamma radiation to remove any potentially harmful bacteria that may be present within the ink, bacteria that would otherwise have been the most likely cause of skin irritation, allergic reactions and even infections.', 23),
    ('Eternal Ink 2 Oz - Lipstick Red', 'Eternal', 32.99, 12, 'A good, bold and strong shade of red can be difficult to find but can have an excellent impact on the design of the tattoo you’re planning, as the right choice of colours can often make a huge difference to a tattoo design. This particular colour is a strong and passionate shade of red, often associated with the red of women’s lipstick, which was once called witchcraft due to its ability to seduce men, certainly making it a powerful and seductive shade to include in your tattoo works. This is available in a selection of sizes for your convenience and would of course provide you with an excellent opportunity to reduce your costs and waste materials. The ink itself is of a high standard of production, using a selection of natural materials to provide not only a long lasting, vibrant colour but also to ensure that the ink produced is a non-toxic, organic option. The organic nature of the ink is particularly helpful, as the organic pigment ink is less likely to cause a reaction on the skin. This is further aided by our sterilization process, something that very few suppliers invest in despite the benefits; the process includes the use of gamma radiation to remove any potentially harmful bacteria that may be present within the ink, bacteria that would otherwise have been the most likely cause of skin irritation, allergic reactions and even infections.', 23),
    ('Eternal Ink 4 Oz - Lipstick Red', 'Eternal', 42.99, 45, 'A good, bold and strong shade of red can be difficult to find but can have an excellent impact on the design of the tattoo you’re planning, as the right choice of colours can often make a huge difference to a tattoo design. This particular colour is a strong and passionate shade of red, often associated with the red of women’s lipstick, which was once called witchcraft due to its ability to seduce men, certainly making it a powerful and seductive shade to include in your tattoo works. This is available in a selection of sizes for your convenience and would of course provide you with an excellent opportunity to reduce your costs and waste materials. The ink itself is of a high standard of production, using a selection of natural materials to provide not only a long lasting, vibrant colour but also to ensure that the ink produced is a non-toxic, organic option. The organic nature of the ink is particularly helpful, as the organic pigment ink is less likely to cause a reaction on the skin. This is further aided by our sterilization process, something that very few suppliers invest in despite the benefits; the process includes the use of gamma radiation to remove any potentially harmful bacteria that may be present within the ink, bacteria that would otherwise have been the most likely cause of skin irritation, allergic reactions and even infections.', 23),
    ('Eternal Ink 1/2 Oz - Crimson Red', 'Eternal', 7.99, 45, 'For a bright, long lasting red ink you can’t go wrong with the options provided by Eternal inks, which include this particular eternal crimson red, which offers a lighter and slightly cooler shade than most crimson shades tend to offer, making it a more effective option for realistic blood colouring and other such similar, natural red shades. As with most eternal inks this is available in a selection of sized to ensure the best possible convenience for you as an artist, allowing you to select the amount of ink you need for the task, or tasks, you may have planned, thus reducing your costs and the amount of waste materials you produce in the process. The ink itself is, as are all of the inks in this range, produced using a selection of organic, natural materials that result in a non-toxic ink, much softer on the skin than many of the alternatives meaning that it is less likely to cause a reaction on the skin. To further ensure the comfort of your customer we also ensure that all of our inks are sterilized, which is done using gamma ray technology, to eliminate any bacterial that may have been present in the ink previously.', 23),
    ('Eternal Ink 1 Oz - Crimson Red', 'Eternal', 31.99, 45, 'For a bright, long lasting red ink you can’t go wrong with the options provided by Eternal inks, which include this particular eternal crimson red, which offers a lighter and slightly cooler shade than most crimson shades tend to offer, making it a more effective option for realistic blood colouring and other such similar, natural red shades. As with most eternal inks this is available in a selection of sized to ensure the best possible convenience for you as an artist, allowing you to select the amount of ink you need for the task, or tasks, you may have planned, thus reducing your costs and the amount of waste materials you produce in the process. The ink itself is, as are all of the inks in this range, produced using a selection of organic, natural materials that result in a non-toxic ink, much softer on the skin than many of the alternatives meaning that it is less likely to cause a reaction on the skin. To further ensure the comfort of your customer we also ensure that all of our inks are sterilized, which is done using gamma ray technology, to eliminate any bacterial that may have been present in the ink previously.', 23),
    ('Eternal Ink 2 Oz - Crimson Red', 'Eternal', 27.99, 45, 'For a bright, long lasting red ink you can’t go wrong with the options provided by Eternal inks, which include this particular eternal crimson red, which offers a lighter and slightly cooler shade than most crimson shades tend to offer, making it a more effective option for realistic blood colouring and other such similar, natural red shades. As with most eternal inks this is available in a selection of sized to ensure the best possible convenience for you as an artist, allowing you to select the amount of ink you need for the task, or tasks, you may have planned, thus reducing your costs and the amount of waste materials you produce in the process. The ink itself is, as are all of the inks in this range, produced using a selection of organic, natural materials that result in a non-toxic ink, much softer on the skin than many of the alternatives meaning that it is less likely to cause a reaction on the skin. To further ensure the comfort of your customer we also ensure that all of our inks are sterilized, which is done using gamma ray technology, to eliminate any bacterial that may have been present in the ink previously.', 23),
    ('Eternal Ink 4 Oz - Crimson Red', 'Eternal', 47.99, 45, 'For a bright, long lasting red ink you can’t go wrong with the options provided by Eternal inks, which include this particular eternal crimson red, which offers a lighter and slightly cooler shade than most crimson shades tend to offer, making it a more effective option for realistic blood colouring and other such similar, natural red shades. As with most eternal inks this is available in a selection of sized to ensure the best possible convenience for you as an artist, allowing you to select the amount of ink you need for the task, or tasks, you may have planned, thus reducing your costs and the amount of waste materials you produce in the process. The ink itself is, as are all of the inks in this range, produced using a selection of organic, natural materials that result in a non-toxic ink, much softer on the skin than many of the alternatives meaning that it is less likely to cause a reaction on the skin. To further ensure the comfort of your customer we also ensure that all of our inks are sterilized, which is done using gamma ray technology, to eliminate any bacterial that may have been present in the ink previously.', 23),
    ('Eternal Ink 1 Oz - Motor City Vette Red', 'Eternal', 12.99, 4, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 23),
    -- Blue - 24
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Bahama Blue', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 24),
    ('World Famous Ink 1 Oz - Miami Blue', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 24),
    ('World Famous Ink 1 Oz - Niagara Blue', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 24),
    ('World Famous Ink 1 Oz - Fountain Blue', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 24),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Peacock Blue', 'Eternal', 8.99, 42, 'Peacock blue is a fantastic, bold shade of blue that provides a vibrant and attractive option that is certain to draw attention and make any design stand out against the skin. This is popular for a wide range of possible incorporations within a design, regardless of whether you use it to fill a larger area of a more simple design or blend it with a selection of other colours to be used in an area of more detail within a more intricate design. This is of course available in a selection of sizes to ensure your convenience and provides you with the opportunity to reduce costs and waste materials in the process. The ink itself is produced using a selection of natural materials which ensure not only that the ink offers a vivid and long lasting colour but also help to ensure that the ink is non-toxic and organic. The organic pigment inks, like this one, are less abrasive to skin and therefore less likely to cause irritation when applied, which gives the tattoo a better chance of healing clearly and properly. To further ensure the best possible chance of a cleanly healed tattoo when you’re finished we also sterilize all of our inks, and are one of the very few suppliers to do so.', 24),
    ('Eternal Ink 1 Oz - Peacock Blue', 'Eternal', 18.99, 32, 'Peacock blue is a fantastic, bold shade of blue that provides a vibrant and attractive option that is certain to draw attention and make any design stand out against the skin. This is popular for a wide range of possible incorporations within a design, regardless of whether you use it to fill a larger area of a more simple design or blend it with a selection of other colours to be used in an area of more detail within a more intricate design. This is of course available in a selection of sizes to ensure your convenience and provides you with the opportunity to reduce costs and waste materials in the process. The ink itself is produced using a selection of natural materials which ensure not only that the ink offers a vivid and long lasting colour but also help to ensure that the ink is non-toxic and organic. The organic pigment inks, like this one, are less abrasive to skin and therefore less likely to cause irritation when applied, which gives the tattoo a better chance of healing clearly and properly. To further ensure the best possible chance of a cleanly healed tattoo when you’re finished we also sterilize all of our inks, and are one of the very few suppliers to do so.', 24),
    ('Eternal Ink 2 Oz - Peacock Blue', 'Eternal', 28.99, 52, 'Peacock blue is a fantastic, bold shade of blue that provides a vibrant and attractive option that is certain to draw attention and make any design stand out against the skin. This is popular for a wide range of possible incorporations within a design, regardless of whether you use it to fill a larger area of a more simple design or blend it with a selection of other colours to be used in an area of more detail within a more intricate design. This is of course available in a selection of sizes to ensure your convenience and provides you with the opportunity to reduce costs and waste materials in the process. The ink itself is produced using a selection of natural materials which ensure not only that the ink offers a vivid and long lasting colour but also help to ensure that the ink is non-toxic and organic. The organic pigment inks, like this one, are less abrasive to skin and therefore less likely to cause irritation when applied, which gives the tattoo a better chance of healing clearly and properly. To further ensure the best possible chance of a cleanly healed tattoo when you’re finished we also sterilize all of our inks, and are one of the very few suppliers to do so.', 24),
    ('Eternal Ink 1/2 Oz - Dark Cobalt', 'Eternal', 8.99, 12, 'The eternal dark cobalt is a deep, cool blue shade similar to a dark navy. For your convenience as a tattoo artist we supply this ink in a wide selection of sizes so as to suit your individual needs, regardless of whether you intent to use the ink for a few smaller touch-ups or whether it will be one of the base colours for a large back piece, the selection of sizes allows you to keep your costs and wastage to a minimum while getting all the ink you need. The ink itself is a very popular one, due to the general purpose of the shade and the high quality of the ink. The dark cobalt colour is a popular one and can be incorporated into a number of designs, offering a dark but not black alternative for shadowing, providing easy blending with a wide range of complementing and contracting shades and even could be used to draw attention to smaller details in the design. Of course the ink is produced, as are all eternal inks, using a selection of the best possible organic materials to provide a non-toxic option. As a result of the care that goes into producing the ink it is less abrasive on the skin and less likely to cause irritation to the skin.', 24),
    ('Eternal Ink 1 Oz - Dark Cobalt', 'Eternal', 18.99, 12, 'The eternal dark cobalt is a deep, cool blue shade similar to a dark navy. For your convenience as a tattoo artist we supply this ink in a wide selection of sizes so as to suit your individual needs, regardless of whether you intent to use the ink for a few smaller touch-ups or whether it will be one of the base colours for a large back piece, the selection of sizes allows you to keep your costs and wastage to a minimum while getting all the ink you need. The ink itself is a very popular one, due to the general purpose of the shade and the high quality of the ink. The dark cobalt colour is a popular one and can be incorporated into a number of designs, offering a dark but not black alternative for shadowing, providing easy blending with a wide range of complementing and contracting shades and even could be used to draw attention to smaller details in the design. Of course the ink is produced, as are all eternal inks, using a selection of the best possible organic materials to provide a non-toxic option. As a result of the care that goes into producing the ink it is less abrasive on the skin and less likely to cause irritation to the skin.', 24),
    ('Eternal Ink 2 Oz - Dark Cobalt', 'Eternal', 28.99, 12, 'The eternal dark cobalt is a deep, cool blue shade similar to a dark navy. For your convenience as a tattoo artist we supply this ink in a wide selection of sizes so as to suit your individual needs, regardless of whether you intent to use the ink for a few smaller touch-ups or whether it will be one of the base colours for a large back piece, the selection of sizes allows you to keep your costs and wastage to a minimum while getting all the ink you need. The ink itself is a very popular one, due to the general purpose of the shade and the high quality of the ink. The dark cobalt colour is a popular one and can be incorporated into a number of designs, offering a dark but not black alternative for shadowing, providing easy blending with a wide range of complementing and contracting shades and even could be used to draw attention to smaller details in the design. Of course the ink is produced, as are all eternal inks, using a selection of the best possible organic materials to provide a non-toxic option. As a result of the care that goes into producing the ink it is less abrasive on the skin and less likely to cause irritation to the skin.', 24),
    ('Eternal Ink 1 Oz - Motor City Galaxy Blue', 'Eternal', 12.99, 4, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 24),
    -- Green - 25
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Everglades Green', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 25),
    ('World Famous Ink 1 Oz - Vegas Green', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 25),
    ('World Famous Ink 1 Oz - Sicilian Olive', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 25),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Jungle Green', 'Eternal', 8.99, 12, 'When it comes to finding a good shade of jungle green you are of course looking for a warmer, softer shade of green like this, which provides the vibrant lively colour of the jungle without appearing too bold. This is an ideal colour for a wide variety of uses and offers a long lasting, deep colour that is sure to remain attractive for years to come, without being so vibrant or dark as to draw attention away from the finer details of a design. This is of course a high quality ink, as are all eternal inks, produced using a selection of the best possible natural ingredients to ensure not only the attractiveness and durability of the colour, but also to ensure that the ink itself is a non-toxic and organic option. It is the organic nature of the ink that helps to make it quite such a desirable option, as this reduces the chances that the ink will cause a reaction on the skin. We further reduce this risk by sterilizing all of our inks, something very few suppliers do; the sterilization process uses gamma radiation to eliminate bacteria within the ink. It is most commonly this bacteria that would have otherwise been the cause of irritation, allergic reaction and even infection.', 25),
    ('Eternal Ink 1 Oz - Jungle Green', 'Eternal', 18.99, 14, 'When it comes to finding a good shade of jungle green you are of course looking for a warmer, softer shade of green like this, which provides the vibrant lively colour of the jungle without appearing too bold. This is an ideal colour for a wide variety of uses and offers a long lasting, deep colour that is sure to remain attractive for years to come, without being so vibrant or dark as to draw attention away from the finer details of a design. This is of course a high quality ink, as are all eternal inks, produced using a selection of the best possible natural ingredients to ensure not only the attractiveness and durability of the colour, but also to ensure that the ink itself is a non-toxic and organic option. It is the organic nature of the ink that helps to make it quite such a desirable option, as this reduces the chances that the ink will cause a reaction on the skin. We further reduce this risk by sterilizing all of our inks, something very few suppliers do; the sterilization process uses gamma radiation to eliminate bacteria within the ink. It is most commonly this bacteria that would have otherwise been the cause of irritation, allergic reaction and even infection.', 25),
    ('Eternal Ink 2 Oz - Jungle Green', 'Eternal', 28.99, 21, 'When it comes to finding a good shade of jungle green you are of course looking for a warmer, softer shade of green like this, which provides the vibrant lively colour of the jungle without appearing too bold. This is an ideal colour for a wide variety of uses and offers a long lasting, deep colour that is sure to remain attractive for years to come, without being so vibrant or dark as to draw attention away from the finer details of a design. This is of course a high quality ink, as are all eternal inks, produced using a selection of the best possible natural ingredients to ensure not only the attractiveness and durability of the colour, but also to ensure that the ink itself is a non-toxic and organic option. It is the organic nature of the ink that helps to make it quite such a desirable option, as this reduces the chances that the ink will cause a reaction on the skin. We further reduce this risk by sterilizing all of our inks, something very few suppliers do; the sterilization process uses gamma radiation to eliminate bacteria within the ink. It is most commonly this bacteria that would have otherwise been the cause of irritation, allergic reaction and even infection.', 25),
    ('Eternal Ink 4 Oz - Jungle Green', 'Eternal', 38.99, 26, 'When it comes to finding a good shade of jungle green you are of course looking for a warmer, softer shade of green like this, which provides the vibrant lively colour of the jungle without appearing too bold. This is an ideal colour for a wide variety of uses and offers a long lasting, deep colour that is sure to remain attractive for years to come, without being so vibrant or dark as to draw attention away from the finer details of a design. This is of course a high quality ink, as are all eternal inks, produced using a selection of the best possible natural ingredients to ensure not only the attractiveness and durability of the colour, but also to ensure that the ink itself is a non-toxic and organic option. It is the organic nature of the ink that helps to make it quite such a desirable option, as this reduces the chances that the ink will cause a reaction on the skin. We further reduce this risk by sterilizing all of our inks, something very few suppliers do; the sterilization process uses gamma radiation to eliminate bacteria within the ink. It is most commonly this bacteria that would have otherwise been the cause of irritation, allergic reaction and even infection.', 25),
    ('Eternal Ink 1 Oz - Motor City Classic Emerald', 'Eternal', 12.99, 4, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 25),
    -- Purple - 26
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Galaxy Purple', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 26),
    ('World Famous Ink 1 Oz - Amsterdam Purple', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 26),
    ('World Famous Ink 1 Oz - Rolls Royce Purple', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 26),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Dark Purple', 'Eternal', 7.99, 4, 'The eternal dark purple is a strong, cool shade of purple and part of the eternal inks complete range of colours. The ink is supplied in a selection of sizes, allowing you to select that which best suits your individual needs, without producing more cost or waste material than you need to. Of course the colour itself has a wide variety of uses, either to highlight and attract attention to the use of darker and lighter shades, or to fill in segments or a larger design. The ink is organic and non-toxic, thanks to the fact it is produced using a selection of the best possible organic materials, this helps to ensure that when the ink is applied to the skin it is less likely to cause a reaction. To further reduce the chances of a reaction, or infection, we ensure that all of our inks are sterilized before distribution. This is done using gamma ray technology to eliminate any potentially harmful bacteria that might have otherwise been present in the ink. We also refuse to freeze our ink at any point in the process, which means that you can be completely confident in the freshness of the ink you order from us.', 26),
    ('Eternal Ink 1 Oz - Dark Purple', 'Eternal', 17.99, 4, 'The eternal dark purple is a strong, cool shade of purple and part of the eternal inks complete range of colours. The ink is supplied in a selection of sizes, allowing you to select that which best suits your individual needs, without producing more cost or waste material than you need to. Of course the colour itself has a wide variety of uses, either to highlight and attract attention to the use of darker and lighter shades, or to fill in segments or a larger design. The ink is organic and non-toxic, thanks to the fact it is produced using a selection of the best possible organic materials, this helps to ensure that when the ink is applied to the skin it is less likely to cause a reaction. To further reduce the chances of a reaction, or infection, we ensure that all of our inks are sterilized before distribution. This is done using gamma ray technology to eliminate any potentially harmful bacteria that might have otherwise been present in the ink. We also refuse to freeze our ink at any point in the process, which means that you can be completely confident in the freshness of the ink you order from us.', 26),
    ('Eternal Ink 2 Oz - Dark Purple', 'Eternal', 27.99, 4, 'The eternal dark purple is a strong, cool shade of purple and part of the eternal inks complete range of colours. The ink is supplied in a selection of sizes, allowing you to select that which best suits your individual needs, without producing more cost or waste material than you need to. Of course the colour itself has a wide variety of uses, either to highlight and attract attention to the use of darker and lighter shades, or to fill in segments or a larger design. The ink is organic and non-toxic, thanks to the fact it is produced using a selection of the best possible organic materials, this helps to ensure that when the ink is applied to the skin it is less likely to cause a reaction. To further reduce the chances of a reaction, or infection, we ensure that all of our inks are sterilized before distribution. This is done using gamma ray technology to eliminate any potentially harmful bacteria that might have otherwise been present in the ink. We also refuse to freeze our ink at any point in the process, which means that you can be completely confident in the freshness of the ink you order from us.', 26),
    ('Eternal Ink 4 Oz - Dark Purple', 'Eternal', 37.99, 4, 'The eternal dark purple is a strong, cool shade of purple and part of the eternal inks complete range of colours. The ink is supplied in a selection of sizes, allowing you to select that which best suits your individual needs, without producing more cost or waste material than you need to. Of course the colour itself has a wide variety of uses, either to highlight and attract attention to the use of darker and lighter shades, or to fill in segments or a larger design. The ink is organic and non-toxic, thanks to the fact it is produced using a selection of the best possible organic materials, this helps to ensure that when the ink is applied to the skin it is less likely to cause a reaction. To further reduce the chances of a reaction, or infection, we ensure that all of our inks are sterilized before distribution. This is done using gamma ray technology to eliminate any potentially harmful bacteria that might have otherwise been present in the ink. We also refuse to freeze our ink at any point in the process, which means that you can be completely confident in the freshness of the ink you order from us.', 26),
    ('Eternal Ink 1/2 Oz - Lavender', 'Eternal', 7.99, 4, 'Lavender is a beautiful, soft shade of purple that can be ideal for a wide range of designs, regardless of whether that means featuring the colour in a more subtle and small area to draw attention to a particular detail or section of the design, or whether that means using it to fill a larger area. The colour is strong enough alone to stand out, but soft enough to blend well with other colours without drawing attention away from the finer details of your designs. The ink is available in a selection of sizes, allowing you to order as much as you need without cause excess costs or waste materials that aren’t needed. The ink is of a high quality, much like all eternal inks, and is produced using a selection of natural ingredients which help to ensure that the ink itself is not only strong of colour and long lasting but also non-toxic and organic. It is the organic quality of the ink in particular that can be useful, as this reduces the chances of the ink causing irritation to the skin. The risk is then further reduced by our process of sterilizing the ink, something that very few suppliers invest in, this includes the use of gamma radiation to eliminate any potentially harmful bacteria in the ink. Bacteria in the ink is the most common cause of irritation, allergic reaction and infection rather than the actual ink itself, so this process is extremely beneficial to you and your customers.', 26),
    ('Eternal Ink 1 Oz - Lavender', 'Eternal', 17.99, 4, 'Lavender is a beautiful, soft shade of purple that can be ideal for a wide range of designs, regardless of whether that means featuring the colour in a more subtle and small area to draw attention to a particular detail or section of the design, or whether that means using it to fill a larger area. The colour is strong enough alone to stand out, but soft enough to blend well with other colours without drawing attention away from the finer details of your designs. The ink is available in a selection of sizes, allowing you to order as much as you need without cause excess costs or waste materials that aren’t needed. The ink is of a high quality, much like all eternal inks, and is produced using a selection of natural ingredients which help to ensure that the ink itself is not only strong of colour and long lasting but also non-toxic and organic. It is the organic quality of the ink in particular that can be useful, as this reduces the chances of the ink causing irritation to the skin. The risk is then further reduced by our process of sterilizing the ink, something that very few suppliers invest in, this includes the use of gamma radiation to eliminate any potentially harmful bacteria in the ink. Bacteria in the ink is the most common cause of irritation, allergic reaction and infection rather than the actual ink itself, so this process is extremely beneficial to you and your customers.', 26),
    ('Eternal Ink 2 Oz - Lavender', 'Eternal', 27.99, 4, 'Lavender is a beautiful, soft shade of purple that can be ideal for a wide range of designs, regardless of whether that means featuring the colour in a more subtle and small area to draw attention to a particular detail or section of the design, or whether that means using it to fill a larger area. The colour is strong enough alone to stand out, but soft enough to blend well with other colours without drawing attention away from the finer details of your designs. The ink is available in a selection of sizes, allowing you to order as much as you need without cause excess costs or waste materials that aren’t needed. The ink is of a high quality, much like all eternal inks, and is produced using a selection of natural ingredients which help to ensure that the ink itself is not only strong of colour and long lasting but also non-toxic and organic. It is the organic quality of the ink in particular that can be useful, as this reduces the chances of the ink causing irritation to the skin. The risk is then further reduced by our process of sterilizing the ink, something that very few suppliers invest in, this includes the use of gamma radiation to eliminate any potentially harmful bacteria in the ink. Bacteria in the ink is the most common cause of irritation, allergic reaction and infection rather than the actual ink itself, so this process is extremely beneficial to you and your customers.', 26),
    ('Eternal Ink 4 Oz - Lavender', 'Eternal', 37.99, 4, 'Lavender is a beautiful, soft shade of purple that can be ideal for a wide range of designs, regardless of whether that means featuring the colour in a more subtle and small area to draw attention to a particular detail or section of the design, or whether that means using it to fill a larger area. The colour is strong enough alone to stand out, but soft enough to blend well with other colours without drawing attention away from the finer details of your designs. The ink is available in a selection of sizes, allowing you to order as much as you need without cause excess costs or waste materials that aren’t needed. The ink is of a high quality, much like all eternal inks, and is produced using a selection of natural ingredients which help to ensure that the ink itself is not only strong of colour and long lasting but also non-toxic and organic. It is the organic quality of the ink in particular that can be useful, as this reduces the chances of the ink causing irritation to the skin. The risk is then further reduced by our process of sterilizing the ink, something that very few suppliers invest in, this includes the use of gamma radiation to eliminate any potentially harmful bacteria in the ink. Bacteria in the ink is the most common cause of irritation, allergic reaction and infection rather than the actual ink itself, so this process is extremely beneficial to you and your customers.', 26),
    ('Eternal Ink 1 Oz - Motor City Cuda Purple', 'Eternal', 12.99, 4, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 26),
    -- White - 27
    -- Dynamic
    ('Dynamic Tattoo Ink 1 Oz - White', 'Dynamic', 19.99, 95, 'This is a fantastic white tattoo ink option, providing you with a popular favourite among a wide variety of tattoo artists around the world. This is part of a range that was developed specifically to provide a more intense and vibrant shade of white to work with, regardless of whether this was to create white tattoo designs, or to offer highlights in other tattoo designs, where it has found particular popularity among black and grey tattoos. Unlike some of the other white inks on the market that heal a sickly cream or dirty grey this really does heal white, and it retains the vibrancy of the colour for considerably longer than many of the alternatives. This is of course part of the dynamic inks range produced by Technical Tattoo Supplies, specifically for the purpose of providing new, bolder and more vibrant colour on the skin than ever before, and this is certainly something that they have accomplished. This is not just a fantastic colour, but a fantastic ink, available in either 1oz or 8oz bottles you are sure to get the right amount for your particular needs, and this ink offers the ideal consistency, pushing into the skin smoothly and easily while providing an ink that retains the fantastic white, ideal for both white tattoos and white colouring in a variety of other tattoos.', 27),
    ('Dynamic Tattoo Ink 8 Oz - White', 'Dynamic', 72.99, 15, 'This is a fantastic white tattoo ink option, providing you with a popular favourite among a wide variety of tattoo artists around the world. This is part of a range that was developed specifically to provide a more intense and vibrant shade of white to work with, regardless of whether this was to create white tattoo designs, or to offer highlights in other tattoo designs, where it has found particular popularity among black and grey tattoos. Unlike some of the other white inks on the market that heal a sickly cream or dirty grey this really does heal white, and it retains the vibrancy of the colour for considerably longer than many of the alternatives. This is of course part of the dynamic inks range produced by Technical Tattoo Supplies, specifically for the purpose of providing new, bolder and more vibrant colour on the skin than ever before, and this is certainly something that they have accomplished. This is not just a fantastic colour, but a fantastic ink, available in either 1oz or 8oz bottles you are sure to get the right amount for your particular needs, and this ink offers the ideal consistency, pushing into the skin smoothly and easily while providing an ink that retains the fantastic white, ideal for both white tattoos and white colouring in a variety of other tattoos.', 27),
    ('Dynamic Tattoo Ink 1 Oz - Heavy White', 'Dynamic', 21.99, 45, 'White the White tattoo Ink is popular and durable, this is an even more vibrant selection; the Dynamic Heavy White Tattoo ink. While white inks may be famous for their incredibly short life on this skin this particular option pushes all of the boundaries, it offers a fantastic, pure and clear white, which heals fantastically well on the skin to maintain that vibrant white colouration. However with the heavy white the healed colour is even brighter, crisper an clearer, to provide a colour that lasts even longer on the skin and provides the ideal option for work with white ink tattoo designs. This is of course part of the dynamic inks range produced by Technical Tattoo Supplies, specifically for the purpose of providing new, bolder and more vibrant colour on the skin than ever before, and this is certainly something that they have accomplished. This is not just a fantastic colour, but a fantastic ink, available in either 1oz or 8oz bottles you are sure to get the right amount for your particular needs, and this ink offers the ideal consistency, pushing into the skin smoothly and easily while providing an ink that retains the fantastic white, ideal for both white tattoos and white colouring in a variety of other tattoos.', 27),
    ('Dynamic Tattoo Ink 8 Oz - Heavy White', 'Dynamic', 75.99, 32, 'White the White tattoo Ink is popular and durable, this is an even more vibrant selection; the Dynamic Heavy White Tattoo ink. While white inks may be famous for their incredibly short life on this skin this particular option pushes all of the boundaries, it offers a fantastic, pure and clear white, which heals fantastically well on the skin to maintain that vibrant white colouration. However with the heavy white the healed colour is even brighter, crisper an clearer, to provide a colour that lasts even longer on the skin and provides the ideal option for work with white ink tattoo designs. This is of course part of the dynamic inks range produced by Technical Tattoo Supplies, specifically for the purpose of providing new, bolder and more vibrant colour on the skin than ever before, and this is certainly something that they have accomplished. This is not just a fantastic colour, but a fantastic ink, available in either 1oz or 8oz bottles you are sure to get the right amount for your particular needs, and this ink offers the ideal consistency, pushing into the skin smoothly and easily while providing an ink that retains the fantastic white, ideal for both white tattoos and white colouring in a variety of other tattoos.', 27),
    -- World Famous Ink
    ('World Famous Ink 1 Oz - White House', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 27),
    -- Eternal
    ('Eternal Ink 1/2 Oz - White', 'Eternal', 7.99, 4, 'White is one of the colours you may find yourself using more often than you first thought, so it is important that you have some at hand for when you need it. This is of course a particular good option for white, with it being a long lasting and particularly bold shade, but it still heals well to appear natural on the skin when applied. There are plenty of uses for this particular shade of ink and to be certain that you have what you need regardless of how you intend to use it, or how often, we supply the ink in a selection of the most popular sizes. The ink is, like all eternal inks, produced using a selection of natural materials which help to ensure that it is not only a long lasting and beautiful colour, but also that the ink itself is a non-toxic and organic solution, which means that it is less abrasive against the skin and less likely to cause irritation. To further ensure the comfort and quality the ink provides we sterilize all of our inks, which removes any potentially harmful bacteria that might have otherwise been the cause of irritation, allergic reaction and even infection. We also never freeze our inks, so you can be completely confident in the freshness of the products you order from us.', 27),
    ('Eternal Ink 1 Oz - White', 'Eternal', 17.99, 5, 'White is one of the colours you may find yourself using more often than you first thought, so it is important that you have some at hand for when you need it. This is of course a particular good option for white, with it being a long lasting and particularly bold shade, but it still heals well to appear natural on the skin when applied. There are plenty of uses for this particular shade of ink and to be certain that you have what you need regardless of how you intend to use it, or how often, we supply the ink in a selection of the most popular sizes. The ink is, like all eternal inks, produced using a selection of natural materials which help to ensure that it is not only a long lasting and beautiful colour, but also that the ink itself is a non-toxic and organic solution, which means that it is less abrasive against the skin and less likely to cause irritation. To further ensure the comfort and quality the ink provides we sterilize all of our inks, which removes any potentially harmful bacteria that might have otherwise been the cause of irritation, allergic reaction and even infection. We also never freeze our inks, so you can be completely confident in the freshness of the products you order from us.', 27),
    ('Eternal Ink 2 Oz - White', 'Eternal', 27.99, 6, 'White is one of the colours you may find yourself using more often than you first thought, so it is important that you have some at hand for when you need it. This is of course a particular good option for white, with it being a long lasting and particularly bold shade, but it still heals well to appear natural on the skin when applied. There are plenty of uses for this particular shade of ink and to be certain that you have what you need regardless of how you intend to use it, or how often, we supply the ink in a selection of the most popular sizes. The ink is, like all eternal inks, produced using a selection of natural materials which help to ensure that it is not only a long lasting and beautiful colour, but also that the ink itself is a non-toxic and organic solution, which means that it is less abrasive against the skin and less likely to cause irritation. To further ensure the comfort and quality the ink provides we sterilize all of our inks, which removes any potentially harmful bacteria that might have otherwise been the cause of irritation, allergic reaction and even infection. We also never freeze our inks, so you can be completely confident in the freshness of the products you order from us.', 27),
    ('Eternal Ink 4 Oz - White', 'Eternal', 37.99, 7, 'White is one of the colours you may find yourself using more often than you first thought, so it is important that you have some at hand for when you need it. This is of course a particular good option for white, with it being a long lasting and particularly bold shade, but it still heals well to appear natural on the skin when applied. There are plenty of uses for this particular shade of ink and to be certain that you have what you need regardless of how you intend to use it, or how often, we supply the ink in a selection of the most popular sizes. The ink is, like all eternal inks, produced using a selection of natural materials which help to ensure that it is not only a long lasting and beautiful colour, but also that the ink itself is a non-toxic and organic solution, which means that it is less abrasive against the skin and less likely to cause irritation. To further ensure the comfort and quality the ink provides we sterilize all of our inks, which removes any potentially harmful bacteria that might have otherwise been the cause of irritation, allergic reaction and even infection. We also never freeze our inks, so you can be completely confident in the freshness of the products you order from us.', 27),
    -- Pink - 28
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Flying Pig Pink', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 28),
    ('World Famous Ink 1 Oz - Prince Albert Pink', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 28),
    ('World Famous Ink 1 Oz - Pink Floyd', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 28),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Pink', 'Eternal', 7.99, 41, 'This is an attractive and bold option of pink, providing the classic, soft and feminine interpretation of the colour as part of the eternal inks classic primary colours range. The colour is a soft, delicate option that offers the femininity and beauty the shade always offers, alongside the long lasting and easy blending qualities that eternal inks provide it. This is an effective colour to be included in a wide range of designs, regardless of whether you choose to use it in a large or small area of a tattoo of just about any size. To ensure that all of your needs are met, regardless of what they may be, we ensure that the ink is supplied in a wide variety of the most popular sizes, allowing you to not only order as much as you might need in any given space of time, but also to provide you with the opportunity to keep your costs and waste materials as low as possible. The ink is produced using a selection of natural materials which help to ensure that it is not only an attractive and long lasting colour, but also to ensure that it is a non-toxic and organic solution to your tattoo ink needs.', 28),
    ('Eternal Ink 1 Oz - Pink', 'Eternal', 17.99, 34, 'This is an attractive and bold option of pink, providing the classic, soft and feminine interpretation of the colour as part of the eternal inks classic primary colours range. The colour is a soft, delicate option that offers the femininity and beauty the shade always offers, alongside the long lasting and easy blending qualities that eternal inks provide it. This is an effective colour to be included in a wide range of designs, regardless of whether you choose to use it in a large or small area of a tattoo of just about any size. To ensure that all of your needs are met, regardless of what they may be, we ensure that the ink is supplied in a wide variety of the most popular sizes, allowing you to not only order as much as you might need in any given space of time, but also to provide you with the opportunity to keep your costs and waste materials as low as possible. The ink is produced using a selection of natural materials which help to ensure that it is not only an attractive and long lasting colour, but also to ensure that it is a non-toxic and organic solution to your tattoo ink needs.', 28),
    ('Eternal Ink 2 Oz - Pink', 'Eternal', 27.99, 44, 'This is an attractive and bold option of pink, providing the classic, soft and feminine interpretation of the colour as part of the eternal inks classic primary colours range. The colour is a soft, delicate option that offers the femininity and beauty the shade always offers, alongside the long lasting and easy blending qualities that eternal inks provide it. This is an effective colour to be included in a wide range of designs, regardless of whether you choose to use it in a large or small area of a tattoo of just about any size. To ensure that all of your needs are met, regardless of what they may be, we ensure that the ink is supplied in a wide variety of the most popular sizes, allowing you to not only order as much as you might need in any given space of time, but also to provide you with the opportunity to keep your costs and waste materials as low as possible. The ink is produced using a selection of natural materials which help to ensure that it is not only an attractive and long lasting colour, but also to ensure that it is a non-toxic and organic solution to your tattoo ink needs.', 28),
    ('Eternal Ink 4 Oz - Pink', 'Eternal', 37.99, 54, 'This is an attractive and bold option of pink, providing the classic, soft and feminine interpretation of the colour as part of the eternal inks classic primary colours range. The colour is a soft, delicate option that offers the femininity and beauty the shade always offers, alongside the long lasting and easy blending qualities that eternal inks provide it. This is an effective colour to be included in a wide range of designs, regardless of whether you choose to use it in a large or small area of a tattoo of just about any size. To ensure that all of your needs are met, regardless of what they may be, we ensure that the ink is supplied in a wide variety of the most popular sizes, allowing you to not only order as much as you might need in any given space of time, but also to provide you with the opportunity to keep your costs and waste materials as low as possible. The ink is produced using a selection of natural materials which help to ensure that it is not only an attractive and long lasting colour, but also to ensure that it is a non-toxic and organic solution to your tattoo ink needs.', 28),
    ('Eternal Ink 1/2 Oz - Cotton Candy', 'Eternal', 7.99, 41, 'There are plenty of bright colours to choose from in the eternal inks complete colours range, one popular option of which is this cotton candy shade. The ink is a soft, feminine pink and a popular option to feature in a variety of women’s tattoos. The ink is available, as are many of the eternal inks selection, in a variety of sizes to allow the most convenience possible in selection which you need to limit your costs and the amount of waste material you may produce. These vary from 1oz bottles, which will provide you with everything you need for a few details on smaller tattoos, to 4oz bottles, perfect for anyone filling a section of pink in a larger design. The ink itself is produced using a selection of the best possible organic materials in order to ensure that the tattoo produced is non-toxic, the materials are also less likely to cause irritation to your customer’s skin during the tattooing process and the healing process while the quality of the ink ensures that it retains the vibrant colouration. To further ensure your confidence in the ink’s suitability we never freeze our inks, so you know that all the ink you receive from us is as fresh as it possible could be and we sterilize our inks. Sterilization of the inks is done using gamma radiation to eliminate any potentially harmful bacteria that might otherwise be present within the ink.', 28),
    ('Eternal Ink 1 Oz - Cotton Candy', 'Eternal', 16.99, 21, 'There are plenty of bright colours to choose from in the eternal inks complete colours range, one popular option of which is this cotton candy shade. The ink is a soft, feminine pink and a popular option to feature in a variety of women’s tattoos. The ink is available, as are many of the eternal inks selection, in a variety of sizes to allow the most convenience possible in selection which you need to limit your costs and the amount of waste material you may produce. These vary from 1oz bottles, which will provide you with everything you need for a few details on smaller tattoos, to 4oz bottles, perfect for anyone filling a section of pink in a larger design. The ink itself is produced using a selection of the best possible organic materials in order to ensure that the tattoo produced is non-toxic, the materials are also less likely to cause irritation to your customer’s skin during the tattooing process and the healing process while the quality of the ink ensures that it retains the vibrant colouration. To further ensure your confidence in the ink’s suitability we never freeze our inks, so you know that all the ink you receive from us is as fresh as it possible could be and we sterilize our inks. Sterilization of the inks is done using gamma radiation to eliminate any potentially harmful bacteria that might otherwise be present within the ink.', 28),
    ('Eternal Ink 2 Oz - Cotton Candy', 'Eternal', 24.99, 1, 'There are plenty of bright colours to choose from in the eternal inks complete colours range, one popular option of which is this cotton candy shade. The ink is a soft, feminine pink and a popular option to feature in a variety of women’s tattoos. The ink is available, as are many of the eternal inks selection, in a variety of sizes to allow the most convenience possible in selection which you need to limit your costs and the amount of waste material you may produce. These vary from 1oz bottles, which will provide you with everything you need for a few details on smaller tattoos, to 4oz bottles, perfect for anyone filling a section of pink in a larger design. The ink itself is produced using a selection of the best possible organic materials in order to ensure that the tattoo produced is non-toxic, the materials are also less likely to cause irritation to your customer’s skin during the tattooing process and the healing process while the quality of the ink ensures that it retains the vibrant colouration. To further ensure your confidence in the ink’s suitability we never freeze our inks, so you know that all the ink you receive from us is as fresh as it possible could be and we sterilize our inks. Sterilization of the inks is done using gamma radiation to eliminate any potentially harmful bacteria that might otherwise be present within the ink.', 28),
    -- Yellow - 29
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Great Wall Yellow', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 29),
    ('World Famous Ink 1 Oz - Michelangelo Yellow', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 29),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Lightening Yellow', 'Eternal', 7.99, 45, 'There are plenty of different shades of yellow available from eternal inks, including this particularly popular and incredibly bold one. Lightening yellow is an intense, vibrant option that is certain to attract attention and really add a lively effect to just about any tattoo design you might plan to include it in. Of course the colour is available in a selection of sizes, this allows you to order as much ink as you actually need for whatever design you plan to incorporate the ink in, regardless of whether it’s a small detail or a big area of fill and shading, so you know you have plenty of ink without increasing costs or waste material any more than you have to. The ink itself is a high quality option produced using a selection of natural ingredients to ensure that the end result it not only a long lasting, bold colour but also that the ink itself is an organic, non-toxic option. It is the organic nature of the ink that provides one of its most desirable traits, as this reduces the chances of the ink causing a reaction on the skin. The risk is then further reduced by our sterilization process, something that very few suppliers implement despite the benefits. The sterilization process uses gamma radiation to eliminate potentially harmful bacteria within the ink that would have otherwise been the most likely cause of irritation, allergic reaction and even infection.', 29),
    ('Eternal Ink 1 Oz - Lightening Yellow', 'Eternal', 14.99, 45, 'There are plenty of different shades of yellow available from eternal inks, including this particularly popular and incredibly bold one. Lightening yellow is an intense, vibrant option that is certain to attract attention and really add a lively effect to just about any tattoo design you might plan to include it in. Of course the colour is available in a selection of sizes, this allows you to order as much ink as you actually need for whatever design you plan to incorporate the ink in, regardless of whether it’s a small detail or a big area of fill and shading, so you know you have plenty of ink without increasing costs or waste material any more than you have to. The ink itself is a high quality option produced using a selection of natural ingredients to ensure that the end result it not only a long lasting, bold colour but also that the ink itself is an organic, non-toxic option. It is the organic nature of the ink that provides one of its most desirable traits, as this reduces the chances of the ink causing a reaction on the skin. The risk is then further reduced by our sterilization process, something that very few suppliers implement despite the benefits. The sterilization process uses gamma radiation to eliminate potentially harmful bacteria within the ink that would have otherwise been the most likely cause of irritation, allergic reaction and even infection.', 29),
    ('Eternal Ink 2 Oz - Lightening Yellow', 'Eternal', 24.99, 45, 'There are plenty of different shades of yellow available from eternal inks, including this particularly popular and incredibly bold one. Lightening yellow is an intense, vibrant option that is certain to attract attention and really add a lively effect to just about any tattoo design you might plan to include it in. Of course the colour is available in a selection of sizes, this allows you to order as much ink as you actually need for whatever design you plan to incorporate the ink in, regardless of whether it’s a small detail or a big area of fill and shading, so you know you have plenty of ink without increasing costs or waste material any more than you have to. The ink itself is a high quality option produced using a selection of natural ingredients to ensure that the end result it not only a long lasting, bold colour but also that the ink itself is an organic, non-toxic option. It is the organic nature of the ink that provides one of its most desirable traits, as this reduces the chances of the ink causing a reaction on the skin. The risk is then further reduced by our sterilization process, something that very few suppliers implement despite the benefits. The sterilization process uses gamma radiation to eliminate potentially harmful bacteria within the ink that would have otherwise been the most likely cause of irritation, allergic reaction and even infection.', 29),
    ('Eternal Ink 4 Oz - Lightening Yellow', 'Eternal', 34.99, 45, 'There are plenty of different shades of yellow available from eternal inks, including this particularly popular and incredibly bold one. Lightening yellow is an intense, vibrant option that is certain to attract attention and really add a lively effect to just about any tattoo design you might plan to include it in. Of course the colour is available in a selection of sizes, this allows you to order as much ink as you actually need for whatever design you plan to incorporate the ink in, regardless of whether it’s a small detail or a big area of fill and shading, so you know you have plenty of ink without increasing costs or waste material any more than you have to. The ink itself is a high quality option produced using a selection of natural ingredients to ensure that the end result it not only a long lasting, bold colour but also that the ink itself is an organic, non-toxic option. It is the organic nature of the ink that provides one of its most desirable traits, as this reduces the chances of the ink causing a reaction on the skin. The risk is then further reduced by our sterilization process, something that very few suppliers implement despite the benefits. The sterilization process uses gamma radiation to eliminate potentially harmful bacteria within the ink that would have otherwise been the most likely cause of irritation, allergic reaction and even infection.', 29),
    ('Eternal Ink 1/2 Oz - Golden Yellow', 'Eternal', 7.99, 45, 'When it comes to finding a bold, vibrant shade of golden yellow you have a selection of options, but the eternal golden yellow is one of the best quality, long lasting inks you will find. This is produced using a selection of natural ingredients to ensure the best possible results, ensuring you receive a high standard of bold colour as well as a non-toxic, organic ink so the chances of it causing irritation to your customer’s skin are reduced. This is a softer shade of golden yellow which helps to ensure that it can be used over a larger area without drawing attention away from the finer details of the design, but bright enough to stand out against the skin and other colours. To further ensure your confidence in using this particular selection of ink we ensure, as we do with all of our inks, that it is supplied in a selection of the most popular sizes. This allows you to order the amount of ink you need without pushing waste materials and costs any higher than you have to. We also ensure that all of our inks are sterilized before distribution, using gamma radiation to destroy any potentially harmful bacteria that might have been present within the ink otherwise. We don’t freeze our ink either, so you can have complete confidence in not just the cleanliness of the ink you order from us, but the freshness too.', 29),
    ('Eternal Ink 1 Oz - Golden Yellow', 'Eternal', 17.99, 45, 'When it comes to finding a bold, vibrant shade of golden yellow you have a selection of options, but the eternal golden yellow is one of the best quality, long lasting inks you will find. This is produced using a selection of natural ingredients to ensure the best possible results, ensuring you receive a high standard of bold colour as well as a non-toxic, organic ink so the chances of it causing irritation to your customer’s skin are reduced. This is a softer shade of golden yellow which helps to ensure that it can be used over a larger area without drawing attention away from the finer details of the design, but bright enough to stand out against the skin and other colours. To further ensure your confidence in using this particular selection of ink we ensure, as we do with all of our inks, that it is supplied in a selection of the most popular sizes. This allows you to order the amount of ink you need without pushing waste materials and costs any higher than you have to. We also ensure that all of our inks are sterilized before distribution, using gamma radiation to destroy any potentially harmful bacteria that might have been present within the ink otherwise. We don’t freeze our ink either, so you can have complete confidence in not just the cleanliness of the ink you order from us, but the freshness too.', 29),
    ('Eternal Ink 2 Oz - Golden Yellow', 'Eternal', 27.99, 45, 'When it comes to finding a bold, vibrant shade of golden yellow you have a selection of options, but the eternal golden yellow is one of the best quality, long lasting inks you will find. This is produced using a selection of natural ingredients to ensure the best possible results, ensuring you receive a high standard of bold colour as well as a non-toxic, organic ink so the chances of it causing irritation to your customer’s skin are reduced. This is a softer shade of golden yellow which helps to ensure that it can be used over a larger area without drawing attention away from the finer details of the design, but bright enough to stand out against the skin and other colours. To further ensure your confidence in using this particular selection of ink we ensure, as we do with all of our inks, that it is supplied in a selection of the most popular sizes. This allows you to order the amount of ink you need without pushing waste materials and costs any higher than you have to. We also ensure that all of our inks are sterilized before distribution, using gamma radiation to destroy any potentially harmful bacteria that might have been present within the ink otherwise. We don’t freeze our ink either, so you can have complete confidence in not just the cleanliness of the ink you order from us, but the freshness too.', 29),
    ('Eternal Ink 4 Oz - Golden Yellow', 'Eternal', 37.99, 45, 'When it comes to finding a bold, vibrant shade of golden yellow you have a selection of options, but the eternal golden yellow is one of the best quality, long lasting inks you will find. This is produced using a selection of natural ingredients to ensure the best possible results, ensuring you receive a high standard of bold colour as well as a non-toxic, organic ink so the chances of it causing irritation to your customer’s skin are reduced. This is a softer shade of golden yellow which helps to ensure that it can be used over a larger area without drawing attention away from the finer details of the design, but bright enough to stand out against the skin and other colours. To further ensure your confidence in using this particular selection of ink we ensure, as we do with all of our inks, that it is supplied in a selection of the most popular sizes. This allows you to order the amount of ink you need without pushing waste materials and costs any higher than you have to. We also ensure that all of our inks are sterilized before distribution, using gamma radiation to destroy any potentially harmful bacteria that might have been present within the ink otherwise. We don’t freeze our ink either, so you can have complete confidence in not just the cleanliness of the ink you order from us, but the freshness too.', 29),
    -- Orange - 30
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Thailand Sunset', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 30),
    ('World Famous Ink 1 Oz - Everest Orange', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 30),
    ('World Famous Ink 1 Oz - Rust', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 30),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Orange', 'Eternal', 7.99, 45, 'This vibrant shade of orange makes a fantastic addition to a wide variety of tattoo designs, offering a bolder shade than might be available within some of the alternative ranges. The colour is bright enough to attract attention to the smaller features of a tattoo design, while it could also provide a soft enough option to work well in larger areas, or even for blending with a selection of other colours. To ensure your convenience this is available in a selection of the most popular sizes, allowing you to meet your needs regardless of how many tattoo you plan to design, or their size, and gives you the opportunity to reduce costs and waste materials. The ink is produced using a selection of natural materials which help to ensure that the end result is a non-toxic and organic option, as well as ensuring that the colour itself is bold and long lasting. The organic nature of the ink is a particularly desirable trait as organic pigment inks are less abrasive against the skin, which means the chances of irritation occurring when the ink is applied is reduces and the tattoo is more likely to heal well. To further ensure the success of the tattooing process for you we also sterilize all of our inks.', 30),
    ('Eternal Ink 1 Oz - Orange', 'Eternal', 17.99, 44, 'This vibrant shade of orange makes a fantastic addition to a wide variety of tattoo designs, offering a bolder shade than might be available within some of the alternative ranges. The colour is bright enough to attract attention to the smaller features of a tattoo design, while it could also provide a soft enough option to work well in larger areas, or even for blending with a selection of other colours. To ensure your convenience this is available in a selection of the most popular sizes, allowing you to meet your needs regardless of how many tattoo you plan to design, or their size, and gives you the opportunity to reduce costs and waste materials. The ink is produced using a selection of natural materials which help to ensure that the end result is a non-toxic and organic option, as well as ensuring that the colour itself is bold and long lasting. The organic nature of the ink is a particularly desirable trait as organic pigment inks are less abrasive against the skin, which means the chances of irritation occurring when the ink is applied is reduces and the tattoo is more likely to heal well. To further ensure the success of the tattooing process for you we also sterilize all of our inks.', 30),
    ('Eternal Ink 2 Oz - Orange', 'Eternal', 27.99, 15, 'This vibrant shade of orange makes a fantastic addition to a wide variety of tattoo designs, offering a bolder shade than might be available within some of the alternative ranges. The colour is bright enough to attract attention to the smaller features of a tattoo design, while it could also provide a soft enough option to work well in larger areas, or even for blending with a selection of other colours. To ensure your convenience this is available in a selection of the most popular sizes, allowing you to meet your needs regardless of how many tattoo you plan to design, or their size, and gives you the opportunity to reduce costs and waste materials. The ink is produced using a selection of natural materials which help to ensure that the end result is a non-toxic and organic option, as well as ensuring that the colour itself is bold and long lasting. The organic nature of the ink is a particularly desirable trait as organic pigment inks are less abrasive against the skin, which means the chances of irritation occurring when the ink is applied is reduces and the tattoo is more likely to heal well. To further ensure the success of the tattooing process for you we also sterilize all of our inks.', 30),
    ('Eternal Ink 4 Oz - Orange', 'Eternal', 37.99, 75, 'This vibrant shade of orange makes a fantastic addition to a wide variety of tattoo designs, offering a bolder shade than might be available within some of the alternative ranges. The colour is bright enough to attract attention to the smaller features of a tattoo design, while it could also provide a soft enough option to work well in larger areas, or even for blending with a selection of other colours. To ensure your convenience this is available in a selection of the most popular sizes, allowing you to meet your needs regardless of how many tattoo you plan to design, or their size, and gives you the opportunity to reduce costs and waste materials. The ink is produced using a selection of natural materials which help to ensure that the end result is a non-toxic and organic option, as well as ensuring that the colour itself is bold and long lasting. The organic nature of the ink is a particularly desirable trait as organic pigment inks are less abrasive against the skin, which means the chances of irritation occurring when the ink is applied is reduces and the tattoo is more likely to heal well. To further ensure the success of the tattooing process for you we also sterilize all of our inks.', 30),
    ('Eternal Ink 1 Oz - Motor City Eternal Orange', 'Eternal', 12.99, 4, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 30),
    -- Brown - 31
    -- World Famous Ink
    ('World Famous Ink 1 Oz - Brooklyn Brownstone', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 31),
    ('World Famous Ink 1 Oz - Napa Valley', 'World Famous Ink', 15.99, 25, 'These Inks boast to create darker, bolder, brighter and stronger tattoos. The proprietary formula combines the highest quality tattoo ink with the most solid viscosity of any ink available today. these inks boast the highest pigment content to guarantee rich hues and a bright palette that flows in and heals bright and consistent. World Famous Inks are backed by the most sought after artists around the globe because they amplify their designs, evolving them into something darker, bolder, brighter and stronger. Worldfamous Inks pass the resAP2008 regulations for Europe, sterilized with gamma radiation, and are vegan friendly! CTL approved. All inks are vegan and cruelty-free.', 31),
    -- Eternal
    ('Eternal Ink 1/2 Oz - Brown', 'Eternal', 7.99, 25, 'The eternal brown is a warmer shade of brown and part of the primary colours range. The ink provides a good, bold brown that will last and retain the quality of its colour for a considerable time after being applied to the skin. The ink itself is produced using high quality, natural materials so as to ensure that the end result is an organic, non-toxic pigment ink that is less likely to cause a reaction on the skin. There are a variety of sizes available so as to ensure you can purchase the amount of ink you need for the task at hand, regardless of whether you’re filling in a large area of a full back piece or just touching up a few smaller details, while keeping cost and waste materials down. Aside from being organic the ink is also sterilized, using gamma radiation and some of the latest technologies we sterilize all of our inks to ensure that any potentially harmful bacteria within them are eliminated. We also refuse to freeze any of our inks during any part of the process, so you can be confident in the freshness as well as cleanliness of the inks you select to purchase from us.', 31),
    ('Eternal Ink 1 Oz - Brown', 'Eternal', 17.99, 5, 'The eternal brown is a warmer shade of brown and part of the primary colours range. The ink provides a good, bold brown that will last and retain the quality of its colour for a considerable time after being applied to the skin. The ink itself is produced using high quality, natural materials so as to ensure that the end result is an organic, non-toxic pigment ink that is less likely to cause a reaction on the skin. There are a variety of sizes available so as to ensure you can purchase the amount of ink you need for the task at hand, regardless of whether you’re filling in a large area of a full back piece or just touching up a few smaller details, while keeping cost and waste materials down. Aside from being organic the ink is also sterilized, using gamma radiation and some of the latest technologies we sterilize all of our inks to ensure that any potentially harmful bacteria within them are eliminated. We also refuse to freeze any of our inks during any part of the process, so you can be confident in the freshness as well as cleanliness of the inks you select to purchase from us.', 31),
    ('Eternal Ink 2 Oz - Brown', 'Eternal', 27.99, 45, 'The eternal brown is a warmer shade of brown and part of the primary colours range. The ink provides a good, bold brown that will last and retain the quality of its colour for a considerable time after being applied to the skin. The ink itself is produced using high quality, natural materials so as to ensure that the end result is an organic, non-toxic pigment ink that is less likely to cause a reaction on the skin. There are a variety of sizes available so as to ensure you can purchase the amount of ink you need for the task at hand, regardless of whether you’re filling in a large area of a full back piece or just touching up a few smaller details, while keeping cost and waste materials down. Aside from being organic the ink is also sterilized, using gamma radiation and some of the latest technologies we sterilize all of our inks to ensure that any potentially harmful bacteria within them are eliminated. We also refuse to freeze any of our inks during any part of the process, so you can be confident in the freshness as well as cleanliness of the inks you select to purchase from us.', 31),
    ('Eternal Ink 4 Oz - Brown', 'Eternal', 37.99, 26, 'The eternal brown is a warmer shade of brown and part of the primary colours range. The ink provides a good, bold brown that will last and retain the quality of its colour for a considerable time after being applied to the skin. The ink itself is produced using high quality, natural materials so as to ensure that the end result is an organic, non-toxic pigment ink that is less likely to cause a reaction on the skin. There are a variety of sizes available so as to ensure you can purchase the amount of ink you need for the task at hand, regardless of whether you’re filling in a large area of a full back piece or just touching up a few smaller details, while keeping cost and waste materials down. Aside from being organic the ink is also sterilized, using gamma radiation and some of the latest technologies we sterilize all of our inks to ensure that any potentially harmful bacteria within them are eliminated. We also refuse to freeze any of our inks during any part of the process, so you can be confident in the freshness as well as cleanliness of the inks you select to purchase from us.', 31),
    ('Eternal Ink 1 Oz - Motor City Mudflap Brown', 'Eternal', 12.99, 4, 'Eternal Inks new set inspired by Vintage Sheet Metal fantasies, high gloss paint and all the reckless joys of a fine ride. Detroit put a nation on wheels and rolled us through a lifetime of memories. Eternal''s Motor City Ink Set is a flashback to Detroit speed.', 31);

INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Rotary Machines - 32
    -- sabre air
    ('Sabre Air Rotary Tattoo Machine - Cobalt Blue', 'Sabre', 199.99, 23, 'The latest UK machine from the innovators at Sabre. It is made from the same high quality materials and is best described as a minimalist workhorse. It is a no frills machine but does boast high end components and build quality in a lightweight machine that packs a punch. It''s direct hit is powered by a strong 4.5W Maxon Swiss motor. Simply but very effective!', 32),
    ('Sabre Air Rotary Tattoo Machine - Signal Red', 'Sabre', 199.99, 13, 'The latest UK machine from the innovators at Sabre. It is made from the same high quality materials and is best described as a minimalist workhorse. It is a no frills machine but does boast high end components and build quality in a lightweight machine that packs a punch. It''s direct hit is powered by a strong 4.5W Maxon Swiss motor. Simply but very effective!', 32),
    ('Sabre Air Rotary Tattoo Machine - Graphite', 'Sabre', 199.99, 7, 'The latest UK machine from the innovators at Sabre. It is made from the same high quality materials and is best described as a minimalist workhorse. It is a no frills machine but does boast high end components and build quality in a lightweight machine that packs a punch. It''s direct hit is powered by a strong 4.5W Maxon Swiss motor. Simply but very effective!', 32),
    ('Sabre Air Rotary Tattoo Machine - Polar White', 'Sabre', 199.99, 3, 'The latest UK machine from the innovators at Sabre. It is made from the same high quality materials and is best described as a minimalist workhorse. It is a no frills machine but does boast high end components and build quality in a lightweight machine that packs a punch. It''s direct hit is powered by a strong 4.5W Maxon Swiss motor. Simply but very effective!', 32),
    ('Sabre Air Rotary Tattoo Machine - Magenta', 'Sabre', 199.99, 17, 'The latest UK machine from the innovators at Sabre. It is made from the same high quality materials and is best described as a minimalist workhorse. It is a no frills machine but does boast high end components and build quality in a lightweight machine that packs a punch. It''s direct hit is powered by a strong 4.5W Maxon Swiss motor. Simply but very effective!', 32),
    ('Sabre Air Rotary Tattoo Machine - Lava Orange', 'Sabre', 199.99, 0, 'The latest UK machine from the innovators at Sabre. It is made from the same high quality materials and is best described as a minimalist workhorse. It is a no frills machine but does boast high end components and build quality in a lightweight machine that packs a punch. It''s direct hit is powered by a strong 4.5W Maxon Swiss motor. Simply but very effective!', 32),
    -- dragonfly
    ('Dragonfly X2 Rotary Tattoo Machine - Evil Black', 'Dragonfly', 409.99, 6, 'The Next Evolution of the Dragonfly Machine X2 with the new strong Swiss X2 motor, exclusive for the X2 models. Hi-performance motor with 6W mechanical output and high energy efficiency (86%). Optimal for battery operation with the RPS-600. Runs all type of standard and cartridge needles. New 4mm stroke stainless steel cam. The standard cam has been replaced with a new 4mm stroke cam made from stainless steel to enhance durability and lining performance. Easy to convert between standard and cartridge needles. When using cartridges the Stay up spring must be removed to prevent strain on the motor and to function properly. The X2 version has a lid in the frame that allows quick access to the Stay up spring. Easy to remove and insert when choosing between standard and cartridge needles. The X2 models have several improvements regarding component materials and precision with a higher precision and finish.', 32),
    ('Dragonfly X2 Rotary Tattoo Machine - Deep Purple', 'Dragonfly', 409.99, 2, 'The Next Evolution of the Dragonfly Machine X2 with the new strong Swiss X2 motor, exclusive for the X2 models. Hi-performance motor with 6W mechanical output and high energy efficiency (86%). Optimal for battery operation with the RPS-600. Runs all type of standard and cartridge needles. New 4mm stroke stainless steel cam. The standard cam has been replaced with a new 4mm stroke cam made from stainless steel to enhance durability and lining performance. Easy to convert between standard and cartridge needles. When using cartridges the Stay up spring must be removed to prevent strain on the motor and to function properly. The X2 version has a lid in the frame that allows quick access to the Stay up spring. Easy to remove and insert when choosing between standard and cartridge needles. The X2 models have several improvements regarding component materials and precision with a higher precision and finish.', 32),
    ('Dragonfly X2 Rotary Tattoo Machine - Crazy Lime', 'Dragonfly', 409.99, 1, 'The Next Evolution of the Dragonfly Machine X2 with the new strong Swiss X2 motor, exclusive for the X2 models. Hi-performance motor with 6W mechanical output and high energy efficiency (86%). Optimal for battery operation with the RPS-600. Runs all type of standard and cartridge needles. New 4mm stroke stainless steel cam. The standard cam has been replaced with a new 4mm stroke cam made from stainless steel to enhance durability and lining performance. Easy to convert between standard and cartridge needles. When using cartridges the Stay up spring must be removed to prevent strain on the motor and to function properly. The X2 version has a lid in the frame that allows quick access to the Stay up spring. Easy to remove and insert when choosing between standard and cartridge needles. The X2 models have several improvements regarding component materials and precision with a higher precision and finish.', 32),
    ('Dragonfly X2 Rotary Tattoo Machine - Demonic Blue', 'Dragonfly', 409.99, 5, 'The Next Evolution of the Dragonfly Machine X2 with the new strong Swiss X2 motor, exclusive for the X2 models. Hi-performance motor with 6W mechanical output and high energy efficiency (86%). Optimal for battery operation with the RPS-600. Runs all type of standard and cartridge needles. New 4mm stroke stainless steel cam. The standard cam has been replaced with a new 4mm stroke cam made from stainless steel to enhance durability and lining performance. Easy to convert between standard and cartridge needles. When using cartridges the Stay up spring must be removed to prevent strain on the motor and to function properly. The X2 version has a lid in the frame that allows quick access to the Stay up spring. Easy to remove and insert when choosing between standard and cartridge needles. The X2 models have several improvements regarding component materials and precision with a higher precision and finish.', 32),
    ('Dragonfly X2 Rotary Tattoo Machine - Seductive Pink', 'Dragonfly', 409.99, 5, 'The Next Evolution of the Dragonfly Machine X2 with the new strong Swiss X2 motor, exclusive for the X2 models. Hi-performance motor with 6W mechanical output and high energy efficiency (86%). Optimal for battery operation with the RPS-600. Runs all type of standard and cartridge needles. New 4mm stroke stainless steel cam. The standard cam has been replaced with a new 4mm stroke cam made from stainless steel to enhance durability and lining performance. Easy to convert between standard and cartridge needles. When using cartridges the Stay up spring must be removed to prevent strain on the motor and to function properly. The X2 version has a lid in the frame that allows quick access to the Stay up spring. Easy to remove and insert when choosing between standard and cartridge needles. The X2 models have several improvements regarding component materials and precision with a higher precision and finish.', 32),
    ('Dragonfly X2 Rotary Tattoo Machine - Devilish Red', 'Dragonfly', 409.99, 5, 'The Next Evolution of the Dragonfly Machine X2 with the new strong Swiss X2 motor, exclusive for the X2 models. Hi-performance motor with 6W mechanical output and high energy efficiency (86%). Optimal for battery operation with the RPS-600. Runs all type of standard and cartridge needles. New 4mm stroke stainless steel cam. The standard cam has been replaced with a new 4mm stroke cam made from stainless steel to enhance durability and lining performance. Easy to convert between standard and cartridge needles. When using cartridges the Stay up spring must be removed to prevent strain on the motor and to function properly. The X2 version has a lid in the frame that allows quick access to the Stay up spring. Easy to remove and insert when choosing between standard and cartridge needles. The X2 models have several improvements regarding component materials and precision with a higher precision and finish.', 32),
    -- Diablo
    ('Diablo V2 Kami Rotary Tattoo Machine - Black', 'Diablo', 179.99, 12, 'The Diablo v2 KAMI adjustable rotary machine delivers the performance of an expensive high-end tattoo machine at a much lower price point. Featuring a custom-made Japanese motor, an improved runner, and a sturdier give knob, the Diablo v2 KAMI is one of the most versatile machines on the market. From color packing to greywash to linework, this machine takes all of the capabilities of the original Diablo KAMI to the next level. The Diablo v2 KAMI is proudly assembled in the USA.', 32),
    ('Diablo V2 Kami Rotary Tattoo Machine - Red', 'Diablo', 179.99, 8, 'The Diablo v2 KAMI adjustable rotary machine delivers the performance of an expensive high-end tattoo machine at a much lower price point. Featuring a custom-made Japanese motor, an improved runner, and a sturdier give knob, the Diablo v2 KAMI is one of the most versatile machines on the market. From color packing to greywash to linework, this machine takes all of the capabilities of the original Diablo KAMI to the next level. The Diablo v2 KAMI is proudly assembled in the USA.', 32),
    ('Diablo V2 Swiss Rotary Tattoo Machine - Black', 'Diablo', 319.99, 4, 'If you''ve been in business a while, then you''ve burned through a few rotary motors. With the Diablo Rotary Swiss you''ll get a top-quality motor for real longevity. For those who like the Diablo Kami, you''re going to love the Diablo Swiss. This machine has many of the great features of the Kami with one striking difference -the motor. Built using what some call ''the Ferrari of motors'', this Swiss Maxon motor has been tailored to the Diablo for maximum punch and smoothness thanks to 12,000 RPM. The Diablo Rotary Swiss Tattoo Machine comes in both black and red. If you''re not afraid of the higher price tag and you shouldn''t be afraid since this machine will make your job easier, choose this machine for all your colour packing, greywash, and lining.', 32),
    -- Stealth
    ('Stealth II Rotary Tattoo Machine - Black', 'Stealth', 99.99, 12, 'When It Comes to Packing and Blending, Think Stealth. Stealth II is the second generation of the Stealth Series Rotary Tattoo Machines. You''ll be impressed with the improvements made to the already popular Stealth. Fluid design and a strong high-performance rotary motor. Lighter than the first version and comes with RCA and clip cord dual connection. Complete with three bearings for set up as a liner, shader and all rounder. Available in seven vibrant colours: blue, black, red, purple, pink, green and grey.', 32),
    ('Stealth II Rotary Tattoo Machine - Blue', 'Stealth', 99.99, 12, 'When It Comes to Packing and Blending, Think Stealth. Stealth II is the second generation of the Stealth Series Rotary Tattoo Machines. You''ll be impressed with the improvements made to the already popular Stealth. Fluid design and a strong high-performance rotary motor. Lighter than the first version and comes with RCA and clip cord dual connection. Complete with three bearings for set up as a liner, shader and all rounder. Available in seven vibrant colours: blue, black, red, purple, pink, green and grey.', 32),
    ('Stealth II Rotary Tattoo Machine - Purple', 'Stealth', 99.99, 12, 'When It Comes to Packing and Blending, Think Stealth. Stealth II is the second generation of the Stealth Series Rotary Tattoo Machines. You''ll be impressed with the improvements made to the already popular Stealth. Fluid design and a strong high-performance rotary motor. Lighter than the first version and comes with RCA and clip cord dual connection. Complete with three bearings for set up as a liner, shader and all rounder. Available in seven vibrant colours: blue, black, red, purple, pink, green and grey.', 32),
    ('Stealth II Rotary Tattoo Machine - Grey', 'Stealth', 99.99, 12, 'When It Comes to Packing and Blending, Think Stealth. Stealth II is the second generation of the Stealth Series Rotary Tattoo Machines. You''ll be impressed with the improvements made to the already popular Stealth. Fluid design and a strong high-performance rotary motor. Lighter than the first version and comes with RCA and clip cord dual connection. Complete with three bearings for set up as a liner, shader and all rounder. Available in seven vibrant colours: blue, black, red, purple, pink, green and grey.', 32),
    ('Stealth II Rotary Tattoo Machine - Red', 'Stealth', 99.99, 12, 'When It Comes to Packing and Blending, Think Stealth. Stealth II is the second generation of the Stealth Series Rotary Tattoo Machines. You''ll be impressed with the improvements made to the already popular Stealth. Fluid design and a strong high-performance rotary motor. Lighter than the first version and comes with RCA and clip cord dual connection. Complete with three bearings for set up as a liner, shader and all rounder. Available in seven vibrant colours: blue, black, red, purple, pink, green and grey.', 32),
    ('Stealth II Rotary Tattoo Machine - Green', 'Stealth', 99.99, 12, 'When It Comes to Packing and Blending, Think Stealth. Stealth II is the second generation of the Stealth Series Rotary Tattoo Machines. You''ll be impressed with the improvements made to the already popular Stealth. Fluid design and a strong high-performance rotary motor. Lighter than the first version and comes with RCA and clip cord dual connection. Complete with three bearings for set up as a liner, shader and all rounder. Available in seven vibrant colours: blue, black, red, purple, pink, green and grey.', 32),
    ('Stealth II Rotary Tattoo Machine - Pink', 'Stealth', 99.99, 12, 'When It Comes to Packing and Blending, Think Stealth. Stealth II is the second generation of the Stealth Series Rotary Tattoo Machines. You''ll be impressed with the improvements made to the already popular Stealth. Fluid design and a strong high-performance rotary motor. Lighter than the first version and comes with RCA and clip cord dual connection. Complete with three bearings for set up as a liner, shader and all rounder. Available in seven vibrant colours: blue, black, red, purple, pink, green and grey.', 32),
    ('Stealth III Rotary Tattoo Machine - Black', 'Stealth', 149.99, 12, '3rd Generation has arrived! When It Comes to Packing and Colour Blending, Always Think Stealth. Stealth III is the 3rd generation in the Stealth Series Rotary Tattoo Machines. Enhanced Japanese Rotary Motor. Frame material - CNC''d from Aircraft Aluminium. Lightest version in the range at 120g. Both RCA and CC connection in one. 3.2mm cam bearing, 3.6mm cam bearing (installed on machine), & 4mm cam bearing. Available in six Vibrant colours: Black, Blue, Green, Purple, Red and Silver.', 32),
    ('Stealth III Rotary Tattoo Machine - Blue', 'Stealth', 149.99, 12, '3rd Generation has arrived! When It Comes to Packing and Colour Blending, Always Think Stealth. Stealth III is the 3rd generation in the Stealth Series Rotary Tattoo Machines. Enhanced Japanese Rotary Motor. Frame material - CNC''d from Aircraft Aluminium. Lightest version in the range at 120g. Both RCA and CC connection in one. 3.2mm cam bearing, 3.6mm cam bearing (installed on machine), & 4mm cam bearing. Available in six Vibrant colours: Black, Blue, Green, Purple, Red and Silver.', 32),
    ('Stealth III Rotary Tattoo Machine - Green', 'Stealth', 149.99, 12, '3rd Generation has arrived! When It Comes to Packing and Colour Blending, Always Think Stealth. Stealth III is the 3rd generation in the Stealth Series Rotary Tattoo Machines. Enhanced Japanese Rotary Motor. Frame material - CNC''d from Aircraft Aluminium. Lightest version in the range at 120g. Both RCA and CC connection in one. 3.2mm cam bearing, 3.6mm cam bearing (installed on machine), & 4mm cam bearing. Available in six Vibrant colours: Black, Blue, Green, Purple, Red and Silver.', 32),
    ('Stealth III Rotary Tattoo Machine - Purple', 'Stealth', 149.99, 12, '3rd Generation has arrived! When It Comes to Packing and Colour Blending, Always Think Stealth. Stealth III is the 3rd generation in the Stealth Series Rotary Tattoo Machines. Enhanced Japanese Rotary Motor. Frame material - CNC''d from Aircraft Aluminium. Lightest version in the range at 120g. Both RCA and CC connection in one. 3.2mm cam bearing, 3.6mm cam bearing (installed on machine), & 4mm cam bearing. Available in six Vibrant colours: Black, Blue, Green, Purple, Red and Silver.', 32),
    ('Stealth III Rotary Tattoo Machine - Red', 'Stealth', 149.99, 12, '3rd Generation has arrived! When It Comes to Packing and Colour Blending, Always Think Stealth. Stealth III is the 3rd generation in the Stealth Series Rotary Tattoo Machines. Enhanced Japanese Rotary Motor. Frame material - CNC''d from Aircraft Aluminium. Lightest version in the range at 120g. Both RCA and CC connection in one. 3.2mm cam bearing, 3.6mm cam bearing (installed on machine), & 4mm cam bearing. Available in six Vibrant colours: Black, Blue, Green, Purple, Red and Silver.', 32),
    ('Stealth III Rotary Tattoo Machine - Silver', 'Stealth', 149.99, 12, '3rd Generation has arrived! When It Comes to Packing and Colour Blending, Always Think Stealth. Stealth III is the 3rd generation in the Stealth Series Rotary Tattoo Machines. Enhanced Japanese Rotary Motor. Frame material - CNC''d from Aircraft Aluminium. Lightest version in the range at 120g. Both RCA and CC connection in one. 3.2mm cam bearing, 3.6mm cam bearing (installed on machine), & 4mm cam bearing. Available in six Vibrant colours: Black, Blue, Green, Purple, Red and Silver.', 32),
    -- Tattoo Pen - 33
    -- Sabre
    ('Sabre Reign Pen Machine - Black', 'Sabre', 259.99, 13, 'Sabre are back with another high-end, innovative tattoo product. Introducing, the Sabre Reign Pen Machine. Designed and produced using knowledge and advice from a selection of top tattoo artists around the world. The pen features a German Hollow Cup Motor and an ‘all-rounder’ 3.5mm stroke with a needle depth adjustment of 3-4mm. It comes complete with two additional, autoclavable grips and a 3.5mm jack power cord. The Reign Pen weighs only 195 grams thanks to the aircraft aluminium casing, making it super comfortable to hold and work with. It’s one of the most adaptable tattoo machines of late thanks to the starting voltage of 3V, an operating voltage of between 8V and 12V and an notable 12,000 RPM. The machine is powered by a 3.5mm jack socket cable which is included in the box.', 33),
    ('Sabre Reign Pen Machine - Gun Metal Grey', 'Sabre', 259.99, 13, 'Sabre are back with another high-end, innovative tattoo product. Introducing, the Sabre Reign Pen Machine. Designed and produced using knowledge and advice from a selection of top tattoo artists around the world. The pen features a German Hollow Cup Motor and an ‘all-rounder’ 3.5mm stroke with a needle depth adjustment of 3-4mm. It comes complete with two additional, autoclavable grips and a 3.5mm jack power cord. The Reign Pen weighs only 195 grams thanks to the aircraft aluminium casing, making it super comfortable to hold and work with. It’s one of the most adaptable tattoo machines of late thanks to the starting voltage of 3V, an operating voltage of between 8V and 12V and an notable 12,000 RPM. The machine is powered by a 3.5mm jack socket cable which is included in the box.', 33),
    -- FK Irons
    ('FK Irons Spektra Xion Pen - Seafoam', 'FK Irons', 459.99, 13, 'After over three years of extensive research and development, FK Irons is proud to announce the highly anticipated release of the new Spektra Xion. Spektra Xion is the first of its kind to have been designed, engineered and beta tested in cooperation with top, reputable tattoo artists from around the world. The collaboration enabled FK Irons to design a machine that caters to a broad scope of tattooing styles while giving the artist more control over the machine and their art.', 33),
    ('FK Irons Spektra Xion Pen - Pink', 'FK Irons', 459.99, 13, 'After over three years of extensive research and development, FK Irons is proud to announce the highly anticipated release of the new Spektra Xion. Spektra Xion is the first of its kind to have been designed, engineered and beta tested in cooperation with top, reputable tattoo artists from around the world. The collaboration enabled FK Irons to design a machine that caters to a broad scope of tattooing styles while giving the artist more control over the machine and their art.', 33),
    ('FK Irons Spektra Xion Pen - Kryptonite', 'FK Irons', 459.99, 13, 'After over three years of extensive research and development, FK Irons is proud to announce the highly anticipated release of the new Spektra Xion. Spektra Xion is the first of its kind to have been designed, engineered and beta tested in cooperation with top, reputable tattoo artists from around the world. The collaboration enabled FK Irons to design a machine that caters to a broad scope of tattooing styles while giving the artist more control over the machine and their art.', 33),
    ('FK Irons Spektra Xion Pen - Tangerine', 'FK Irons', 459.99, 13, 'After over three years of extensive research and development, FK Irons is proud to announce the highly anticipated release of the new Spektra Xion. Spektra Xion is the first of its kind to have been designed, engineered and beta tested in cooperation with top, reputable tattoo artists from around the world. The collaboration enabled FK Irons to design a machine that caters to a broad scope of tattooing styles while giving the artist more control over the machine and their art.', 33),
    ('FK Irons Spektra Xion Pen - Nebula', 'FK Irons', 459.99, 13, 'After over three years of extensive research and development, FK Irons is proud to announce the highly anticipated release of the new Spektra Xion. Spektra Xion is the first of its kind to have been designed, engineered and beta tested in cooperation with top, reputable tattoo artists from around the world. The collaboration enabled FK Irons to design a machine that caters to a broad scope of tattooing styles while giving the artist more control over the machine and their art.', 33),
    -- Hand Poking - 34
    ('Sabre Dotwork Pen', 'Sabre', 39.99, 4, 'Sabre Designed in the UK. Ergonomically designed for perfect Dotwork. The flat back has been designed for securing your needle during use and comfort. Machined from aircraft grade aluminium. Durable black anodised Finish.', 34);
INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Needles - 35
    ('Sabre Needles - Size 8 - 3 Linear - Pack of 10', 'Sabre', 4.99, 12, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Sabre Needles - Size 8 - 3 Linear - Box of 50', 'Sabre', 12.99, 2, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Sabre Needles - Size 8 - 5 Linear - Pack of 10', 'Sabre', 4.99, 12, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Sabre Needles - Size 8 - 5 Linear - Box of 50', 'Sabre', 12.99, 2, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Sabre Needles - Size 8 - 7 Linear - Pack of 10', 'Sabre', 4.99, 12, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Sabre Needles - Size 8 - 7 Linear - Box of 50', 'Sabre', 12.99, 2, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Sabre Needles - Size 8 - 9 Linear - Pack of 10', 'Sabre', 4.99, 12, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Sabre Needles - Size 8 - 9 Linear - Box of 50', 'Sabre', 12.99, 2, 'Get a Crisp Outline and the Best Ink Flow with Sabre Needles. Sabre needles give less pain for your client and crisper outlines. How can you be sure the Sabre Tattoo Needles are as good as they claim? Each needle is checked by microscope to ensure its perfection. The First Tattoo Needle of a Kind.', 35),
    ('Flux Tattoo Needles - Size 10 - 3 Linear - Pack of 10', 'Flux Tattoo', 5.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    ('Flux Tattoo Needles - Size 10 - 3 Linear - Box of 50', 'Flux Tattoo', 15.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    ('Flux Tattoo Needles - Size 10 - 5 Linear - Pack of 10', 'Flux Tattoo', 5.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    ('Flux Tattoo Needles - Size 10 - 5 Linear - Box of 50', 'Flux Tattoo', 15.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    ('Flux Tattoo Needles - Size 10 - 7 Linear - Pack of 10', 'Flux Tattoo', 5.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    ('Flux Tattoo Needles - Size 10 - 7 Linear - Box of 50', 'Flux Tattoo', 15.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    ('Flux Tattoo Needles - Size 10 - 9 Linear - Pack of 10', 'Flux Tattoo', 5.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    ('Flux Tattoo Needles - Size 10 - 9 Linear - Box of 50', 'Flux Tattoo', 15.99, 2, 'For an Artist Who Wants Proven Reliability. Our Tattoo Shop needles have been re-branded to FLUX. These are a time-tested and trusted needle with a new look and improved features. The Tattoo Shop have sold these tattoo needles for many years as one of our most preferred needles.', 35),
    -- Cartridges - 36
    ('Sabre Cartridges - 3 Linear Bugpin - Box of 20', 'Sabre', 15.99, 2, 'Sabre’s original tattoo cartridges are a cost effective solution for tattooing using the cartridge system. The Sabre Cartridges are made from 316L surgical stainless steel and medical grade clear plastic, manufactured, assembled and quality checked by the Sabre team in the UK. The quality pins allow for precise punctures enabling all types of artwork to be completed no matter how intricate. The Sabre Cartridges are compatible with most cartridge machines and grips. They come in packs of 20 with some configurations available in a 50 pack. Each tattoo cartridge is individually blister packaged and EO gas sterilised. You can expect the usual Sabre quality with the Sabre Cartridges and can be sure all styles of tattooing can be accomplished.', 36),
    ('Sabre Cartridges - 3 Linear Bugpin - Box of 50', 'Sabre', 15.99, 2, 'Sabre’s original tattoo cartridges are a cost effective solution for tattooing using the cartridge system. The Sabre Cartridges are made from 316L surgical stainless steel and medical grade clear plastic, manufactured, assembled and quality checked by the Sabre team in the UK. The quality pins allow for precise punctures enabling all types of artwork to be completed no matter how intricate. The Sabre Cartridges are compatible with most cartridge machines and grips. They come in packs of 20 with some configurations available in a 50 pack. Each tattoo cartridge is individually blister packaged and EO gas sterilised. You can expect the usual Sabre quality with the Sabre Cartridges and can be sure all styles of tattooing can be accomplished.', 36),
    ('Sabre Cartridges - 5 Linear Bugpin - Box of 50', 'Sabre', 15.99, 2, 'Sabre’s original tattoo cartridges are a cost effective solution for tattooing using the cartridge system. The Sabre Cartridges are made from 316L surgical stainless steel and medical grade clear plastic, manufactured, assembled and quality checked by the Sabre team in the UK. The quality pins allow for precise punctures enabling all types of artwork to be completed no matter how intricate. The Sabre Cartridges are compatible with most cartridge machines and grips. They come in packs of 20 with some configurations available in a 50 pack. Each tattoo cartridge is individually blister packaged and EO gas sterilised. You can expect the usual Sabre quality with the Sabre Cartridges and can be sure all styles of tattooing can be accomplished.', 36),
    ('Sabre Cartridges - 5 Linear Bugpin - Box of 50', 'Sabre', 15.99, 2, 'Sabre’s original tattoo cartridges are a cost effective solution for tattooing using the cartridge system. The Sabre Cartridges are made from 316L surgical stainless steel and medical grade clear plastic, manufactured, assembled and quality checked by the Sabre team in the UK. The quality pins allow for precise punctures enabling all types of artwork to be completed no matter how intricate. The Sabre Cartridges are compatible with most cartridge machines and grips. They come in packs of 20 with some configurations available in a 50 pack. Each tattoo cartridge is individually blister packaged and EO gas sterilised. You can expect the usual Sabre quality with the Sabre Cartridges and can be sure all styles of tattooing can be accomplished.', 36),
    ('Sabre Cartridges - 7 Linear Bugpin - Box of 50', 'Sabre', 15.99, 2, 'Sabre’s original tattoo cartridges are a cost effective solution for tattooing using the cartridge system. The Sabre Cartridges are made from 316L surgical stainless steel and medical grade clear plastic, manufactured, assembled and quality checked by the Sabre team in the UK. The quality pins allow for precise punctures enabling all types of artwork to be completed no matter how intricate. The Sabre Cartridges are compatible with most cartridge machines and grips. They come in packs of 20 with some configurations available in a 50 pack. Each tattoo cartridge is individually blister packaged and EO gas sterilised. You can expect the usual Sabre quality with the Sabre Cartridges and can be sure all styles of tattooing can be accomplished.', 36),
    ('Sabre Cartridges - 7 Linear Bugpin - Box of 50', 'Sabre', 15.99, 2, 'Sabre’s original tattoo cartridges are a cost effective solution for tattooing using the cartridge system. The Sabre Cartridges are made from 316L surgical stainless steel and medical grade clear plastic, manufactured, assembled and quality checked by the Sabre team in the UK. The quality pins allow for precise punctures enabling all types of artwork to be completed no matter how intricate. The Sabre Cartridges are compatible with most cartridge machines and grips. They come in packs of 20 with some configurations available in a 50 pack. Each tattoo cartridge is individually blister packaged and EO gas sterilised. You can expect the usual Sabre quality with the Sabre Cartridges and can be sure all styles of tattooing can be accomplished.', 36);

INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Grips 37
    ('FK Irons Ergo Cartridge Grips - 24 Pack', 'FK Irons', 50.99, 12, 'The popular Ergonomic RPG Click Grips are now available in Disposable Form! Designed to fit all hand sizes with it’s widest point being a chunky 32mm and needle depth control of up to 4mm, the FK Irons Click Ergo Disposable Cartridge Grips come in an assorted colour selection with 24 individually packaged and sterile grips each complete with its own drive/plunger bar.', 37),
    ('Lauro Paolini Slim Bob Cartridge Grips', 'Lauro Paolini', 32.99, 2, 'Italian designers of premium tattoo equipment bring you the Slim Bob 30mm grip which is made of ergal aluminium alloy and anodized. Suitable for all types of cartridge''s needle systems on the market today.', 37),
    -- Tips 38
    ('Sabre Disposable Tips - 13F - Box of 50', 'Sabre', 12.99, 34, 'These tips have a transparent tip to allow for a more crystal clear view of your needle and ink flow. Available in round and flat configurations. These tips come from the innovators at Sabre and are disposable and hygienic. All tips are individually sealed in sterile blister packs.', 38),
    ('Sabre Disposable Tips - 3R - Box of 50', 'Sabre', 12.99, 34, 'These tips have a transparent tip to allow for a more crystal clear view of your needle and ink flow. Available in round and flat configurations. These tips come from the innovators at Sabre and are disposable and hygienic. All tips are individually sealed in sterile blister packs.', 38),
    ('Sabre Disposable Tips - 5R - Box of 50', 'Sabre', 12.99, 34, 'These tips have a transparent tip to allow for a more crystal clear view of your needle and ink flow. Available in round and flat configurations. These tips come from the innovators at Sabre and are disposable and hygienic. All tips are individually sealed in sterile blister packs.', 38),
    ('Sabre Disposable Tips - 7F - Box of 50', 'Sabre', 12.99, 34, 'These tips have a transparent tip to allow for a more crystal clear view of your needle and ink flow. Available in round and flat configurations. These tips come from the innovators at Sabre and are disposable and hygienic. All tips are individually sealed in sterile blister packs.', 38),
    -- Tubes - 39
    ('Sabre Atom - 11 Flat', 'Sabre', 2.99, 25, 'UK Designed Grips Fit Your Hand Better Than Any Other. Sabre designed the newly released Trident and Atom Grips specifically to fit the tattoo artist''s hand. Real comfort has arrived. Both the Trident Grip and Atom Grip come from the genius innovators at UK based Sabre. These new grips, which we have found to work with the same excellence as our Ultra grips but with more comfort because of the ergonomic designs and an extra wide diameter.That''s something you don''t get with all tattoo grips.', 39),
    ('Sabre Atom - 13 Flat', 'Sabre', 2.99, 25, 'UK Designed Grips Fit Your Hand Better Than Any Other. Sabre designed the newly released Trident and Atom Grips specifically to fit the tattoo artist''s hand. Real comfort has arrived. Both the Trident Grip and Atom Grip come from the genius innovators at UK based Sabre. These new grips, which we have found to work with the same excellence as our Ultra grips but with more comfort because of the ergonomic designs and an extra wide diameter.That''s something you don''t get with all tattoo grips.', 39),
    ('Sabre Atom - 14 Round', 'Sabre', 2.99, 25, 'UK Designed Grips Fit Your Hand Better Than Any Other. Sabre designed the newly released Trident and Atom Grips specifically to fit the tattoo artist''s hand. Real comfort has arrived. Both the Trident Grip and Atom Grip come from the genius innovators at UK based Sabre. These new grips, which we have found to work with the same excellence as our Ultra grips but with more comfort because of the ergonomic designs and an extra wide diameter.That''s something you don''t get with all tattoo grips.', 39),
    ('Sabre Atom - 18 Round', 'Sabre', 2.99, 25, 'UK Designed Grips Fit Your Hand Better Than Any Other. Sabre designed the newly released Trident and Atom Grips specifically to fit the tattoo artist''s hand. Real comfort has arrived. Both the Trident Grip and Atom Grip come from the genius innovators at UK based Sabre. These new grips, which we have found to work with the same excellence as our Ultra grips but with more comfort because of the ergonomic designs and an extra wide diameter.That''s something you don''t get with all tattoo grips.', 39),
    ('Sabre Atom - 14 Diamond', 'Sabre', 2.99, 25, 'UK Designed Grips Fit Your Hand Better Than Any Other. Sabre designed the newly released Trident and Atom Grips specifically to fit the tattoo artist''s hand. Real comfort has arrived. Both the Trident Grip and Atom Grip come from the genius innovators at UK based Sabre. These new grips, which we have found to work with the same excellence as our Ultra grips but with more comfort because of the ergonomic designs and an extra wide diameter.That''s something you don''t get with all tattoo grips.', 39),
    ('1 1/4 Ultra - 11F', 'Ultra', 1.99, 4, 'Few Tattoo Products Promise You This Much. You have your choice in tubes. But once you see the clarity that disposable Ultra Tubes give you, you won''t want to choose another. When you''re looking to buy tubes, what do you look for besides an easy, accurate view?', 39),
    ('1 1/4 Ultra - 13F', 'Ultra', 1.99, 6, 'Few Tattoo Products Promise You This Much. You have your choice in tubes. But once you see the clarity that disposable Ultra Tubes give you, you won''t want to choose another. When you''re looking to buy tubes, what do you look for besides an easy, accurate view?', 39),
    ('1 1/4 Ultra - 15F', 'Ultra', 1.99, 7, 'Few Tattoo Products Promise You This Much. You have your choice in tubes. But once you see the clarity that disposable Ultra Tubes give you, you won''t want to choose another. When you''re looking to buy tubes, what do you look for besides an easy, accurate view?', 39);

INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Arm/Leg Rests - 40
    ('Compact Tattoo Arm/Leg Rest', 'Compact Tattoo', 60.00, 3, 'Portable Compact Tattoo Arm/Leg Rest that works well to support the foot, leg, or arm of your customer. When you are working conventions you need an arm/leg rest that is easy travel with. The rest must fold and easily adjust. You get both of those features with the Compact Tattoo Arm/Leg Rest.', 40),
    -- Artist Chairs/Stools - 41
    ('Tat Tech Duotone Artists Stool', 'Tat Tech', 94.99, 2, 'Finished in red and black this ultra cool ergonomic artists stool is designed to keep you tattooing for longer in more comfort. With the fully adjustable back rest rest you can use the stool as a back rest or straddle it in reverse to support your chest whilst working.', 41),
    -- Chairs/Beds - 42
    ('Tat Tech Premium Client Chair', 'Tat Tech', 729.99, 1, 'This is a complete studio solution, a new multi functional hydraulic chair like no other. It allows customer to be able to sit, straddle or lay in multiple positions. The arm rests are mounted on omni directional balls allowing 360° movement. The raising and lowering of the legs are powered by hydraulics and the legs can also move left and right so that any position is achievable. The head rest pad can also be removed, which will allow your client to place their head comfortably in the head rest hole.', 42),
    ('570 TATsoul Client Chair', 'TATSoul', 1000.99, 2, 'The 570 Client Chair by TATSoul exists at the cutting edge of tattoo furniture design. The customer comfort offered by the 570 Client Chair is matched only by its versatility; the 570 provides ergonomic support to clients while sitting, laying down, or straddling. Every foot rest, leg rest, and headrest is independently adjustable to customize the tattooing experience for each client. The luxurious cushioning system is upholstered with smooth PVC vinyl to ensure clients are calm and comfortable throughout the duration of their session.', 42),
    -- Lamps - 43
    ('MAG Lamp S', 'MAG', 70.00, 2, 'The MAG Lamp S is a modern and attractive slim design magnifier, ideal to see and work on projects where detail is key. It has 2 brightness levels and a 12.7cm (5”) diameter, 3 diopter (1.75X) glass lens. The adjustable spring arm will allow you to position the magnifier exactly where you need it.', 43),
    -- Workstation/Trolleys - 44
    ('Tat Tech Stainless Steel Workstation', 'Tat Tech', 119.99, 19, 'A fantastic studio addition. It''s rollable so you can move it around the studio whilst you work, fully height adjustable and even has a removable medical grade stainless steel tray for easy cleaning.', 44);

INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Balm Tattoo - 45
    ('Balm Tattoo Original - 30g', 'Balm Tattoo', 8.99, 12, 'Balm Tattoo Original is an aftercare cream with a high content of Panthenol (5%) and SEPITONIC M3 working together to promote skin regeneration & moisturisation while keeping colour vibrancy within the tattoo. The cream also contains Lanolin and Sweet Almond Oil. Available in 30g and 100g tubes as well as 8g ‘shots’ as singles or multiple choices of quantities. It is also completely free of Parabens, Perfume, Propylene Glycol, Silicones, Colourants, Phthalates and salt. Balm Tattoo creams have been developed with the advice of some of the most recognized tattoo artists in the tattoo industry. Produced by DelabCare Company in which all products are dermatologically tested by external laboratories guaranteeing the best results and the necessary safety for skin care. Balm Tattoo products are present in more than 50 countries and are used by over 50,000 professional Tattoo Artists.', 45),
    ('Balm Tattoo Vegan - 30g', 'Balm Tattoo', 9.99, 12, 'Balm Tattoo Original is an aftercare cream with a high content of Panthenol (5%) and SEPITONIC M3 working together to promote skin regeneration & moisturisation while keeping colour vibrancy within the tattoo. The cream also contains Lanolin and Sweet Almond Oil. Available in 30g and 100g tubes as well as 8g ‘shots’ as singles or multiple choices of quantities. It is also completely free of Parabens, Perfume, Propylene Glycol, Silicones, Colourants, Phthalates and salt. Balm Tattoo creams have been developed with the advice of some of the most recognized tattoo artists in the tattoo industry. Produced by DelabCare Company in which all products are dermatologically tested by external laboratories guaranteeing the best results and the necessary safety for skin care. Balm Tattoo products are present in more than 50 countries and are used by over 50,000 professional Tattoo Artists.', 45),
    -- Hustle Butter - 46
    ('Hustle Butter Deluxe Organic Tattoo Care', 'Hustle Butter', 5.99, 21, 'Hustle Butter Deluxe® is designed for use before, during and after the tattoo session. It’s a 100% natural, 100% organic and vegan-friendly replacement for all petroleum-based products. Available in 5oz and 1oz tubs as well as 0.25oz sachets. Studio packs of 10 (for the 5oz tubs) and 25 (for the 1oz tubs) are also available with the 1oz tubs pack coming with a display box.', 46),
    -- Tattoo Goo - 47
    ('Tattoo Goo Original', 'Tattoo Goo', 6.99, 31, 'Tattoo Goo is both pharmacist and dermatologist approved, meaning that it will suit a wide variety of customers and ensure that their tattoos will heal properly. Tattoo Goo promotes faster healing times, as well as reduced itching and discomfort during the process. This can make a huge difference in the overall appearance of the tattoo once it has healed, as itching and scratching the sensitive skin can easily damage and distort the tattoo''s design. This formula is enriched with a variety of vitamins to ensure that your skin gains the nutrients it needs to heal quickly and thoroughly. Tattoo Goo can also be used for minor skin irritations such as scrapes, bruises, windburn and sunburn.', 47),
    ('Tattoo Goo Complete Tattoo Aftercare Kit', 'Tattoo Goo', 18.99, 31, 'Tattoo Goo is both pharmacist and dermatologist approved, meaning that it will suit a wide variety of customers and ensure that their tattoos will heal properly. Tattoo Goo promotes faster healing times, as well as reduced itching and discomfort during the process. This can make a huge difference in the overall appearance of the tattoo once it has healed, as itching and scratching the sensitive skin can easily damage and distort the tattoo''s design. This formula is enriched with a variety of vitamins to ensure that your skin gains the nutrients it needs to heal quickly and thoroughly. Tattoo Goo can also be used for minor skin irritations such as scrapes, bruises, windburn and sunburn.', 47),
    -- Aftercare Company - 48
    ('THC Aftercare', 'Aftercare Company', 7.99, 12, 'Tattoo Aftercare contains a unique blend of ingredients that can be used to care for your skin over the life of your tattoo. It adapts and suits exactly what your skin needs over the healing process after your tattoo. This means that your skin always gets what it needs and you only ever need to purchase one product. Happy customers have reported that they experienced faster healing times with less itching and discomfort during the process. Winner of the first BUAV Golden Bunny Award, Tattoo Aftercare is approved by Cruelty Free International, this product is not tested on animals. It also does not contain paraben preservatives, petroleum, lanolin, food colours or nut oils.', 48);
INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Gloves - 49
    ('Uniglove Latex Gloves', 'Uniglove', 5.49, 34, 'Choose these professional grade latex gloves from a premium medical supply manufacturer. Their products are often used in hospitals and surgical operations so you can be sure that they are of a high quality level and can always be relied on. These gloves offer a superior fit, featuring five different sizes suitable for everyone. Offering both comfort and protection, these gloves are ideal for use in the tattoo industry. With tactile sensitivity for delicate and intricate tattoo work, as well as confidence that you will be able to efficiently change your equipment whilst wearing these gloves.', 49),
    -- Masks - 50
    ('Surgical Mask for Tattoo Artists', 'Artifact Ink', 9.99, 20, 'This surgical mask is especially good for tattoo and piercing studios, thanks to the black colour and the dispenser packaging. The surgical mask is optionally available with earloops or ties.', 50),
    -- Skin Preparation - 51
    ('Tek15 Tattoo Green Soap', 'Tek15', 21.99, 13, 'The Tattoo Shop have re-formulated Tek15 into a more powerful and effective green soap, in fact we''d say it''s the best out there. It''s now available in more sizes and the 1 litre version comes with a handy dispenser to measure out the solution before diluting. It''s 100% natural oil based, Biodegradable, Anti-microbial and contains Glycerine.', 51),
    ('Penny Black Foam Wash 200ml', 'Penny Black', 7.99, 9, 'Penny Black bring you a bubble-gum essence foam wash to be used before, during or after the tattoo process to clean and soothe the skin. Coming in a 200ml pump bottle, the foam wash should be applied as desired, gently massaged into the skin and then wiped away. For external use only, contains Aqua, Sodium Laureth Sulphate, Cocomidopropy, Betaine Polysorbate 20, Parfum, Cocamide DEA, Glycerine(Veg), Sodium Chloride, Phenoxyethanol, Sodium Benzoate, Potassium Sorbate, Citric Acid, Citral, Geraniol, Citronellal.', 51),
    -- Bottles/Containers - 52
    ('Empty Bottle with Twist Top - 1 oz', 'Artifact Ink', 3.99, 12, 'An empty twist top bottle ideal for mixing inks or for dispensing, this bottle is an ideal product for all tattoo shops. The bottle comes with a white twist top closure and is made of LDPE plastic, which makes the bottle squeezable.', 52),
    -- Couch Roll - 53
    ('Couch Rolls', 'Artifact Ink', 9.99, 12, 'Use these handy couch rolls in your studio to help keep the environment sanitary and presentable at all times. By having a disposable barrier on your tattoo furniture, you can quickly discard any areas that have become soiled or dirty with ink or bodily fluids. This also makes it much easier to remove the risk of cross-contamination between clients during the day. You will simply be able to wipe down the tattoo furniture so it is sterile before replacing the couch roll so it is ready for the next client. Couch Roll also doubles up as a cleaning supply and is very absorbent, making it ideal for cleaning up spillages of ink or other chemicals.', 53),
    -- Disinfectants - 54
    ('Viroklenz Skin Safe Disinfectant Cleaner', 'Viroklenz', 12.99, 33, 'Laboratory proven, new generation, enviro-friendly bio steriliser. Used as a versatile and safe biocidal cleanser which has a broad spectrum of activity against bacteria, fungi viruses including MRSA and HIV. Can be used directly on work surfaces, worktops, sinks etc. Ideal for use on surfaces that come into contact with skin.', 54),
    -- Hygyene - 55
    ('Sharps Bin for safe needle disposal', 'Sharps', 21.99, 2, 'For safe needle disposal. Once full, the trap door can be fastened securely shut to prevent needles falling or poking out. Most local councils will collect these bins, when full, for the correct disposal method through incineration.', 55);
INSERT INTO "item" ("name", "brand", "price", "stock", "description", "id_category") VALUES
    -- Stencil Making - 56
    ('Repro FX Spirit Purple Carbon Paper 11', 'Repro FX', 21.99, 32, 'For making stencils by hand, without the need for a thermal copier. These sheets use pressure instead of heat to make the transfer.', 56),
    ('Stencil Spray Stuff 8oz', 'Spray Stuff', 23.99, 12, 'A revolutionary product that keeps your marker and pen drawings on longer while you work on your free hand tattoos. Spray Stuff "Draw it on... Keep it on!" Spray Stuff® allows you to work more confidently from the start tattooing.', 56),
    -- Fake Skin - 57
    ('Synthetic Tattoo Hands', 'Artifact Ink', 33.99, 2, 'The next best thing to real skin. Perfect for practicing your tattoos on, especially in places where you possibly haven''t done tattooing on before which will also create an amazing 3D piece once you have finished. This life like body part has been made from a rubber and silicone synthetic material and has been made to mimic the look and feel of tattooing on real skin. This product is ideal for both apprentice and experienced tattoo artists.', 57),
    ('Sketch Tattoo Practice Skin', 'Artifact Ink', 23.99, 2, 'Synthetic Tattoo Skins from a Trusted Industry Name - Sketch.Practice tattoo skins that have all the features you need. What''s one of the biggest complaints tattoo artists have about skins? You guessed it. Thickness. These practice tattoo skins are as thick as human skin and can even be strapped to an arm or leg to simulate the actual experience.', 57),
    -- Books - 58
    ('PDF Tattoo Disclaimer Sheet', 'Artifact Ink', 1.99, 100, 'The disclaimer sheet helps to cover both artist and customer by providing a contract informing of any health issues from the customer and ensuring safe equipment is used by the artist. This legal document provides evidence that the customer has signed and granted full permission for the tattoo procedure to be carried out, knowing that the effects are irreversible. The aftercare pad should also be provided as this is mentioned with the disclaimer sheet.', 58);
-------- item_purchase --------
INSERT INTO "item_purchase" ("id_item", "id_order", "price", "quantity") VALUES
    (231, 8, 151.7, 2),
    (109, 25, 162.64, 2),
    (213, 28, 121.19, 5),
    (13, 10, 57.85, 4),
    (147, 21, 13.89, 4),
    (219, 30, 195.17, 1),
    (79, 26, 190.77, 4),
    (22, 24, 47.42, 4),
    (74, 24, 141.92, 5),
    (32, 2, 201.59, 3),
    (21, 6, 6.16, 3),
    (30, 14, 176.48, 2),
    (44, 19, 13.61, 4),
    (235, 2, 139.56, 5),
    (170, 16, 198.21, 1),
    (218, 28, 116.24, 1),
    (44, 26, 144.5, 4),
    (173, 7, 241.36, 5),
    (233, 10, 65.93, 2),
    (110, 16, 131.09, 2),
    (33, 25, 147.55, 5),
    (105, 13, 58.01, 3),
    (153, 3, 244.15, 3),
    (82, 10, 102.29, 1),
    (94, 22, 206.48, 3),
    (173, 21, 163.49, 3),
    (232, 24, 126.8, 3),
    (199, 21, 241.5, 5),
    (30, 10, 229.01, 3),
    (165, 1, 99.99, 1),
    (100, 1, 7.99, 1),
    (106, 11, 7.99, 1),
    (100, 4, 7.99, 1),
    (100, 5, 7.99, 1),
    (101, 9, 7.99, 1),
    (101, 12, 7.99, 1),
    (111, 15, 17.99, 1),
    (111, 17, 17.99, 1),
    (111, 18, 17.99, 1),
    (110, 20, 17.99, 1),
    (110, 23, 17.99, 1),
    (112, 27, 17.99, 1),
    (110, 29, 17.99, 1);

-------- review --------
ALTER SEQUENCE review_id_seq RESTART WITH 1;
INSERT INTO "review" ("id_item", "id_user", "title", "body", "score", "date") VALUES
    (148, 31, 'Suspendisse potenti.', 'Aenean fermentum.', 2, '2020-03-16'),
    (226, 98, 'Etiam vel augue.', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 5, '2020-03-08'),
    (160, 10, 'Etiam pretium iaculis justo.', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', 1, '2020-03-28'),
    (174, 5, 'Suspendisse accumsan tortor quis turpis.', 'Quisque ut erat.', 4, '2020-03-15'),
    (208, 53, 'Pellentesque viverra pede ac diam.', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 4, '2020-03-20'),
    (46, 45, 'Fusce consequat.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 2, '2020-02-28'),
    (69, 8, 'In congue.', 'Morbi a ipsum. Integer a nibh.', 2, '2020-03-07'),
    (165, 63, 'Curabitur at ipsum ac tellus semper interdum.', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 3, '2020-03-15'),
    (78, 15, 'Morbi non quam nec dui luctus rutrum.', 'Quisque ut erat.', 2, '2020-03-10'),
    (187, 29, 'Phasellus id sapien in sapien iaculis congue.', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', 1, '2020-03-23'),
    (20, 20, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae, Duis faucibus accumsan odio.', 4, '2020-03-09'),
    (164, 43, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', 'Vestibulum sed magna at nunc commodo placerat. Praesent blandit.', 1, '2020-03-24'),
    (93, 56, 'Nunc purus.', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 3, '2020-03-12'),
    (30, 17, 'Curabitur gravida nisi at nibh.', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices.', 2, '2020-03-07');
-------- cart --------
INSERT INTO "cart" ("id_user", "id_item", "quantity", "date_added") VALUES
    (1, 36, 2, '2020-03-29'),
    (1, 26, 1, '2020-03-29'),
    (2, 57, 4, '2020-03-25'),
    (3, 87, 2, '2020-03-23');
-------- wishlist --------
INSERT INTO "wishlist" ("id_user", "id_item") VALUES
    (1, 36),
    (1, 26),
    (2, 57),
    (3, 87);
-------- item_picture --------
ALTER SEQUENCE item_picture_id_seq RESTART WITH 1;
INSERT INTO "item_picture" ("id_item", "link") VALUES
    -- Traditional/Old School - 10
    (1, '1_mom_love.jpg'),
    (2, '2_lucky_ace.jpg'),
    (3, '3_dagger.png'),
    -- Realism - 11
    (4, '4_wolf.jpg'),
    (5, '5_heath_ledger_joker.jpg'),
    (6, '6_skull.jpg'),
    -- Watercolor - 12
    (7, '7_dog_paw.jpg'),
    (8, '8_tree.jpg'),
    (9, '9_bird.jpg'),
    -- Tribal - 13
    (10, '10_leg_tribal.jpg'),
    (11, '11_arm_tribal.jpg'),
    (12, '12_arm_and_chest_tribal.jpg'),
    -- Cartoon/New School - 14
    (13, '13_homer_simpson.jpg'),
    (14, '14_spiderman.jpg'),
    (15, '15_batman.jpg'),
    -- Japanese - 15
    (16, '16_full_body_temple.jpg'),
    (17, '17_buda.jpg'),
    (18, '18_farmer.jpg'),
    -- Dotwork - 16
    (19, '19_mandala.jpg'),
    (20, '20_hive.jpg'),
    (21, '21_skull.jpg'),
    -- Blackwork - 17
    (22, '22_floating_house.jpg'),
    (23, '23_skeleton_with_geometry.png'),
    (24, '24_smoking_heart.jpg'),
    -- Illustrative - 18
    (25, '25_typing_machine.jpg'),
    (26, '26_sleepy_cat.jpg'),
    (27, '27_beetle.jpg'),
    -- Chicano - 19
    (28, '28_la_passion.jpg'),
    (29, '29_jesus_on_cross.jpg'),
    (30, '30_gang_queen.jpg'),
    -- Neo Traditional - 20
    (31, '31_wolf.jpg'),
    (32, '32_hawk.jpg'),
    (33, '33_lion.jpg'),
    -- Black Ink - 21
    -- Dynamic
    (34, '34_dynamic_ink_black.jpg'),
    (35, '34_dynamic_ink_black.jpg'),
    (36, '35_dynamic_ink_triple_black.jpg'),
    (37, '35_dynamic_ink_triple_black.jpg'),
    -- World Famous Ink
    (38, '36_world_famous_ink_pitch_black.jpg'),
    (39, '36_world_famous_ink_pitch_black.jpg'),
    -- Eternal
    (40, '37_eternal_ink_maxx_black.jpg'),
    (41, '37_eternal_ink_maxx_black.jpg'),
    (42, '37_eternal_ink_maxx_black.jpg'),
    (43, '37_eternal_ink_maxx_black.jpg'),
    (44, '38_eternal_ink_motor_city_blackbird.jpg'),
    (45, '39_eternal_ink_lining_black.jpg'),
    (46, '39_eternal_ink_lining_black.jpg'),
    (47, '39_eternal_ink_lining_black.jpg'),
    (48, '39_eternal_ink_lining_black.jpg'),
    (49, '39_eternal_ink_lining_black.jpg'),
    (50, '40_eternal_ink_liner_black.jpg'),
    (51, '40_eternal_ink_liner_black.jpg'),
    (52, '40_eternal_ink_liner_black.jpg'),
    -- Kuro Sumi
    (53, '41_kuro_sumi_outline_black.jpg'),
    (54, '41_kuro_sumi_outline_black.jpg'),
    (55, '41_kuro_sumi_outline_black.jpg'),
    (56, '41_kuro_sumi_outline_black.jpg'),
    -- Grey - 22
    -- World Famous Ink
    (57, '42_world_famous_ink_rolling_stone.jpg'),
    -- Eternal
    (58, '43_eternal_ink_motor_city_bondo.jpg'),
    (59, '44_eternal_ink_smoke.jpg'),
    (60, '44_eternal_ink_smoke.jpg'),
    (61, '44_eternal_ink_smoke.jpg'),
    -- Red
    -- World Famous Ink
    (62, '45_world_famous_ink_red_hot_chili_pepper.jpg'),
    (63, '46_world_famous_ink_sailor_jerry_red.jpg'),
    (64, '47_world_famous_ink_burgundy_wine.jpg'),
    -- Eternal
    (65, '48_eternal_ink_lipstick_red.jpg'),
    (66, '48_eternal_ink_lipstick_red.jpg'),
    (67, '48_eternal_ink_lipstick_red.jpg'),
    (68, '48_eternal_ink_lipstick_red.jpg'),
    (69, '49_eternal_ink_crimson_red.jpg'),
    (70, '49_eternal_ink_crimson_red.jpg'),
    (71, '49_eternal_ink_crimson_red.jpg'),
    (72, '49_eternal_ink_crimson_red.jpg'),
    (73, '50_eternal_ink_motor_city_vette_red.jpg'),
    -- Blue
    -- World Famous Ink
    (74, '51_world_famous_ink_bahama_blue.jpg'),
    (75, '52_world_famous_ink_miami_blue.jpg'),
    (76, '53_world_famous_ink_niagara_blue.jpg'),
    (77, '54_world_famous_ink_fountain_blue.jpg'),
    -- Eternal
    (78, '55_eternal_ink_peackock_blue.jpg'),
    (79, '55_eternal_ink_peackock_blue.jpg'),
    (80, '55_eternal_ink_peackock_blue.jpg'),
    (81, '56_eternal_ink_dark_cobalt.jpg'),
    (82, '56_eternal_ink_dark_cobalt.jpg'),
    (83, '56_eternal_ink_dark_cobalt.jpg'),
    (84, '57_eternal_ink_motor_city_galaxy_blue.jpg'),
    -- Green
    -- Wold Famous Ink
    (85, '58_world_famous_ink_everglades_green.jpg'),
    (86, '59_world_famous_ink_vegas_green.jpg'),
    (87, '60_world_famous_ink_sicilian_olive.jpg'),
    -- Eternal
    (88, '61_eternal_ink_jungle_green.jpg'),
    (89, '61_eternal_ink_jungle_green.jpg'),
    (90, '61_eternal_ink_jungle_green.jpg'),
    (91, '61_eternal_ink_jungle_green.jpg'),
    (92, '62_eternal_ink_motor_city_classic_emerald.jpg'),
    -- Purple
    -- World Famous Ink
    (93, '63_world_famous_ink_galaxy_purple.jpg'),
    (94, '64_world_famous_ink_amsterdam_purple.jpg'),
    (95, '65_world_famous_ink_rolls_royce_purple.jpg'),
    -- Eternal
    (96, '66_eternal_ink_dark_purple.jpg'),
    (97, '66_eternal_ink_dark_purple.jpg'),
    (98, '66_eternal_ink_dark_purple.jpg'),
    (99, '66_eternal_ink_dark_purple.jpg'),
    (100, '67_eternal_ink_lavender.jpg'),
    (101, '67_eternal_ink_lavender.jpg'),
    (102, '67_eternal_ink_lavender.jpg'),
    (103, '67_eternal_ink_lavender.jpg'),
    (104, '68_eternal_ink_motor_city_cuda_purple.jpg'),
    -- White
    -- Dynamic
    (105, '69_dynamic_ink_white.jpg'),
    (106, '69_dynamic_ink_white.jpg'),
    (107, '70_dynamic_ink_heavy_white.jpg'),
    (108, '70_dynamic_ink_heavy_white.jpg'),
    -- World Famous Ink
    (109, '71_world_famous_ink_white_house.jpg'),
    -- Eternal
    (110, '72_eternal_ink_white.jpg'),
    (111, '72_eternal_ink_white.jpg'),
    (112, '72_eternal_ink_white.jpg'),
    (113, '72_eternal_ink_white.jpg'),
    -- Pink
    -- World Famous Ink
    (114, '73_world_famous_ink_flying_pig_pink.jpg'),
    (115, '74_world_famous_ink_prince_albert_pink.jpg'),
    (116, '75_world_famous_ink_pink_floyd.jpg'),
    -- Eternal
    (117, '76_eternal_ink_pink.jpg'),
    (118, '76_eternal_ink_pink.jpg'),
    (119, '76_eternal_ink_pink.jpg'),
    (120, '76_eternal_ink_pink.jpg'),
    (121, '77_eternal_ink_cotton_candy.jpg'),
    (122, '77_eternal_ink_cotton_candy.jpg'),
    (123, '77_eternal_ink_cotton_candy.jpg'),
    -- Yellow
    -- World Famous Ink
    (124, '78_world_famous_ink_great_wall_yellow.jpg'),
    (125, '79_world_famous_ink_michelangelo_yellow.jpg'),
    -- Eternal
    (126, '80_eternal_ink_lightening_yellow.jpg'),
    (127, '80_eternal_ink_lightening_yellow.jpg'),
    (128, '80_eternal_ink_lightening_yellow.jpg'),
    (129, '80_eternal_ink_lightening_yellow.jpg'),
    (130, '81_eternal_ink_golden_yellow.jpg'),
    (131, '81_eternal_ink_golden_yellow.jpg'),
    (132, '81_eternal_ink_golden_yellow.jpg'),
    (133, '81_eternal_ink_golden_yellow.jpg'),
    -- Orange - 30
    -- World Famous Ink
    (134, '82_world_famous_ink_thailand_sunset.jpg'),
    (135, '83_world_famous_ink_everest_orange.jpg'),
    (136, '84_world_famous_ink_rust.jpg'),
    -- Eternal
    (137, '85_eternal_ink_orange.jpg'),
    (138, '85_eternal_ink_orange.jpg'),
    (139, '85_eternal_ink_orange.jpg'),
    (140, '85_eternal_ink_orange.jpg'),
    (141, '86_eternal_ink_motor_city_eternal_orange.jpg'),
    -- Brown - 31
    -- World Famous Ink
    (142, '87_world_famous_ink_brooklyn_brownstone.jpg'),
    (143, '88_world_famous_ink_napa_valley.jpg'),
    -- Eternal
    (144, '89_eternal_ink_brown.jpg'),
    (145, '89_eternal_ink_brown.jpg'),
    (146, '89_eternal_ink_brown.jpg'),
    (147, '89_eternal_ink_brown.jpg'),
    (148, '90_eternal_ink_motor_city_mudflap_brown.jpg'),
    -- Rotary Machines - 32
    -- Sabre Air
    (149, '91_sabre_air_cobalt_blue.jpg'),
    (150, '92_sabre_air_signal_red.jpg'),
    (151, '93_sabre_air_graphite.jpg'),
    (152, '94_sabre_air_polar_white.jpg'),
    (153, '95_sabre_air_magenta.jpg'),
    (154, '96_sabre_air_lava_orange.jpg'),
    -- Dragonfly X2
    (155, '97_dragonfly_x2_evil_black.jpg'),
    (156, '98_dragonfly_x2_deep_purple.jpg'),
    (157, '99_dragonfly_x2_crazy_lime.jpg'),
    (158, '100_dragonfly_x2_demonic_blue.jpg'),
    (159, '101_dragonfly_x2_seductive_pink.jpg'),
    (160, '102_dragonfly_x2_devilish_red.jpg'),
    -- Diablo
    (161, '103_diablo_v2_kami_black.jpg'),
    (162, '104_diablo_v2_kami_red.jpg'),
    (163, '105_diablo_v2_swiss_black.jpg'),
    -- Stealth II
    (164, '106_stealth_ii_black.jpg'),
    (165, '107_stealth_ii_blue.jpg'),
    (166, '108_stealth_ii_purple.jpg'),
    (167, '109_stealth_ii_grey.jpg'),
    (168, '110_stealth_ii_red.jpg'),
    (169, '111_stealth_ii_green.jpg'),
    (170, '112_stealth_ii_pink.jpg'),
    -- Stealth III
    (171, '113_stealth_iii_black.jpg'),
    (172, '114_stealth_iii_blue.jpg'),
    (173, '115_stealth_iii_green.jpg'),
    (174, '116_stealth_iii_purple.jpg'),
    (175, '117_stealth_iii_red.jpg'),
    (176, '118_stealth_iii_silver.jpg'),
    -- Tattoo Pen
    -- Sabre
    (177, '119_sabre_reign_pen_black.jpg'),
    (178, '120_sabre_reign_pen_gun_metal_grey.jpg'),
    -- FK Irons
    (179, '121_fk_irons_spektra_xion_seafom.jpg'),
    (180, '122_fk_irons_spektra_xion_pink.jpg'),
    (181, '123_fk_irons_spektra_xion_kryptonite.jpg'),
    (182, '124_fk_irons_spektra_xion_tangerine.jpg'),
    (183, '125_fk_irons_spektra_xion_nebula.jpg'),
    -- Hand Poking
    (184, '126_sabre_dotwork_pen.jpg'),
    -- Needles
    (185, '127_sabre_needles_size_8.jpg'),
    (186, '127_sabre_needles_size_8.jpg'),
    (187, '127_sabre_needles_size_8.jpg'),
    (188, '127_sabre_needles_size_8.jpg'),
    (189, '127_sabre_needles_size_8.jpg'),
    (190, '127_sabre_needles_size_8.jpg'),
    (191, '127_sabre_needles_size_8.jpg'),
    (192, '127_sabre_needles_size_8.jpg'),
    (193, '128_flux_tattoo_needles_size_10.jpg'),
    (194, '128_flux_tattoo_needles_size_10.jpg'),
    (195, '128_flux_tattoo_needles_size_10.jpg'),
    (196, '128_flux_tattoo_needles_size_10.jpg'),
    (197, '128_flux_tattoo_needles_size_10.jpg'),
    (198, '128_flux_tattoo_needles_size_10.jpg'),
    (199, '128_flux_tattoo_needles_size_10.jpg'),
    (200, '128_flux_tattoo_needles_size_10.jpg'),
    -- Cartridges
    (201, '129_sabre_cartridges.jpg'),
    (202, '129_sabre_cartridges.jpg'),
    (203, '129_sabre_cartridges.jpg'),
    (204, '129_sabre_cartridges.jpg'),
    (205, '129_sabre_cartridges.jpg'),
    (206, '129_sabre_cartridges.jpg'),
    -- Grips
    (207, '130_fk_irons_ergo_cartridges_grips.jpg'),
    (208, '131_lauro_paolini_bob_cartridges_grips.jpg'),
    -- Tips
    (209, '132_sabre_disposable_tips.jpg'),
    (210, '132_sabre_disposable_tips.jpg'),
    (211, '132_sabre_disposable_tips.jpg'),
    (212, '132_sabre_disposable_tips.jpg'),
    -- Tubes
    (213, '133_sabre_atom_tubes.jpg'),
    (214, '133_sabre_atom_tubes.jpg'),
    (215, '133_sabre_atom_tubes.jpg'),
    (216, '133_sabre_atom_tubes.jpg'),
    (217, '133_sabre_atom_tubes.jpg'),
    (218, '134_ultra_tubes.jpg'),
    (219, '134_ultra_tubes.jpg'),
    (220, '134_ultra_tubes.jpg'),
    -- Arm/Leg Rests
    (221, '135_compact_tattoo_arm_leg_rest.jpg'),
    -- Artists Chairs/Stools
    (222, '136_tat_tech_duotone_artist_stool.jpg'),
    -- Chairs/Beds
    (223, '137_tat_tech_premium_client_chair.jpg'),
    (224, '138_tatsoul_client_chair.jpg'),
    -- Lamps
    (225, '139_mag_lamp.jpg'),
    -- Workstations Trolleys
    (226, '140_tat_tech_stainless_steel_workstation.jpg'),
    -- Balm Tattoo
    (227, '141_balm_tattoo_original.jpg'),
    (228, '142_balm_tattoo_vegan.jpg'),
    -- Hustle Butter
    (229, '143_hustle_butter.jpg'),
    -- Tattoo Goo
    (230, '144_tattoo_goo.jpg'),
    (231, '145_tattoo_goo_complete_kit.jpg'),
    -- Aftercare Company
    (232, '146_aftercare.jpg'),
    -- Gloves
    (233, '147_uniglove_latex_gloves.jpg'),
    -- Masks
    (234, '148_surgical_mask.jpg'),
    -- Skin Preparation
    (235, '149_tek15_green_soap.jpg'),
    (236, '150_penny_black_foam_wash.jpg'),
    -- Bottles/Containers
    (237, '151_empty_bottle_twist_top.jpg'),
    -- Couch Rolls
    (238, '152_couch_rolls.jpg'),
    -- Disinfectants
    (239, '153_viroklenz_skin_safe_disinfectant_cleaner.jpg'),
    -- Hygyene
    (240, '154_disposal_bin.jpg'),
    -- Stencil Making
    (241, '155_reprofx_paper.jpg'),
    (242, '156_stencil_spray_stuff.jpg'),
    -- Fake Skin
    (243, '157_synthetic_tattoo_hands.jpg'),
    (244, '158_practice_skin.jpg'),
    -- Books
    (245, '159_disclaimer.jpg');
-------- admin_notification --------
ALTER SEQUENCE admin_notification_id_seq RESTART WITH 1;
INSERT INTO "admin_notification" ("body", "sent") VALUES
    ('Item #34 out of stock', '2020-03-22 19:10:25-00'),
    ('Report notification on review #1', '2020-03-25 14:10:25-00'),
    ('Item #14 out of stock', '2020-03-24 15:10:45-00'),
    ('Item #24 out of stock', '2020-03-22 11:0:25-00');
-------- out_of_stock_notification --------
INSERT INTO "out_of_stock_notification" ("id_notif", "id_item") VALUES
    (1, 34),
    (3, 14),
    (4, 24);
-------- report_notification --------
INSERT INTO "report_notification" ("id_notif", "id_review") VALUES
    (2, 1);
-------- sale --------
ALTER SEQUENCE sale_id_seq RESTART WITH 1;
INSERT INTO "sale" ("name", "start", "end", "type", "fixed_amount", "percentage_amount") VALUES
    ('Black Devil Sale', '2020-03-20', '2020-03-30', 'percentage', null, 30),
    ('Crazy Machine Sale', '2020-03-01', '2020-04-01', 'fixed', 50, null);
-------- item_sale --------
INSERT INTO "item_sale" ("id_item", "id_sale") VALUES 
    -- Black Devil Sale
    (34, 1), (35, 1), (36, 1), (37, 1), (38, 1), (39, 1), (40, 1), (41, 1), (42, 1), (43, 1), (44, 1), (45, 1), (46, 1), (47, 1), (48, 1), (49, 1), (50, 1), (51, 1), (52, 1), (53, 1), (54, 1), (55, 1), (56, 1), (57, 1), (58, 1), (59, 1),
    -- Crazy Machine Sale
    (162, 2), (163, 2), (164, 2), (165, 2), (166, 2), (167, 2);
-------- item_subscriber --------
INSERT INTO "item_subscriber" ("email", "date") VALUES
    ('mmiell0@phpbb.com', '2020-03-25'),
    ('gashpole1@sfgate.com', '2020-03-18'),
    ('sduckers2@cbc.ca', '2020-03-15'),
    ('roakeby3@google.ru', '2020-03-16'),
    ('jpoundesford4@ehow.com', '2020-03-26'),
    ('gpilch5@upenn.edu', '2020-03-25'),
    ('sdomonkos6@marriott.com', '2020-03-02'),
    ('clown7@reuters.com', '2020-03-28'),
    ('nlitchfield8@mail.ru', '2020-03-09'),
    ('qdobrovolski9@unblog.fr', '2020-03-17'),
    ('emacclenana@php.net', '2020-03-07'),
    ('nmuggachb@wired.com', '2020-03-01'),
    ('cbavinc@businessweek.com', '2020-03-02'),
    ('blaxed@berkeley.edu', '2020-03-07'),
    ('swhitakere@ibm.com', '2020-03-26'),
    ('tbrantonf@rakuten.co.jp', '2020-03-24'),
    ('lleppingwellg@cdbaby.com', '2020-03-27'),
    ('fwodhamh@yahoo.com', '2020-03-02'),
    ('cderingi@fastcompany.com', '2020-03-01'),
    ('acossellj@cam.ac.uk', '2020-03-16'),
    ('bdufallk@china.com.cn', '2020-03-21'),
    ('mbunnyl@ycombinator.com', '2020-03-27'),
    ('tlintallm@nps.gov', '2020-03-05'),
    ('epockettn@flavors.me', '2020-03-08'),
    ('rheildso@goodreads.com', '2020-03-25'),
    ('dyeskinp@cocolog-nifty.com', '2020-03-12'),
    ('maxtellq@yahoo.com', '2020-02-29'),
    ('sackeryr@latimes.com', '2020-03-05'),
    ('ltibbs@com.com', '2020-02-28'),
    ('btwydellt@vinaora.com', '2020-03-28');
-------- item_subscription --------
INSERT INTO "item_subscription" ("id_item", "email_subscriber") VALUES
    (34, 'mmiell0@phpbb.com'),
    (45, 'gashpole1@sfgate.com'),
    (67, 'sduckers2@cbc.ca'),
    (98, 'roakeby3@google.ru'),
    (123, 'jpoundesford4@ehow.com'),
    (32, 'gpilch5@upenn.edu'),
    (224, 'sdomonkos6@marriott.com'),
    (123, 'clown7@reuters.com'),
    (98, 'nlitchfield8@mail.ru'),
    (76, 'qdobrovolski9@unblog.fr'),
    (24, 'emacclenana@php.net'),
    (87, 'nmuggachb@wired.com'),
    (98, 'cbavinc@businessweek.com'),
    (75, 'blaxed@berkeley.edu'),
    (67, 'swhitakere@ibm.com'),
    (97, 'tbrantonf@rakuten.co.jp'),
    (67, 'lleppingwellg@cdbaby.com'),
    (58, 'fwodhamh@yahoo.com'),
    (54, 'cderingi@fastcompany.com'),
    (3, 'acossellj@cam.ac.uk'),
    (96, 'bdufallk@china.com.cn'),
    (45, 'mbunnyl@ycombinator.com'),
    (165, 'tlintallm@nps.gov'),
    (187, 'epockettn@flavors.me'),
    (74, 'rheildso@goodreads.com'),
    (75, 'dyeskinp@cocolog-nifty.com'),
    (85, 'maxtellq@yahoo.com'),
    (86, 'sackeryr@latimes.com'),
    (75, 'ltibbs@com.com'),
    (82, 'btwydellt@vinaora.com');
-------- user_address --------
INSERT INTO "user_address" ("id_user", "id_address") VALUES
    (90, 1),
    (14, 2),
    (43, 3),
    (6, 4),
    (76, 5),
    (66, 6),
    (56, 7),
    (82, 8),
    (19, 9),
    (57, 10),
    (95, 11),
    (19, 12),
    (30, 13),
    (57, 14),
    (48, 15),
    (83, 16),
    (66, 17),
    (77, 18),
    (75, 19),
    (83, 20),
    (51, 21),
    (27, 22),
    (34, 23),
    (98, 24),
    (13, 25),
    (47, 26),
    (89, 27),
    (57, 28),
    (33, 29),
    (99, 30);
-------- user_payment_method --------
INSERT INTO "user_payment_method" ("id_user", "id_payment_method") VALUES
    (22, 1),
    (99, 2),
    (42, 3),
    (69, 4),
    (22, 5),
    (93, 6),
    (2, 7),
    (58, 8),
    (98, 9),
    (74, 10),
    (63, 11),
    (53, 12),
    (69, 13),
    (6, 14),
    (69, 15),
    (60, 16),
    (5, 17),
    (60, 18),
    (99, 19),
    (26, 20),
    (79, 21),
    (66, 22),
    (100, 23),
    (65, 24),
    (3, 25),
    (96, 26),
    (100, 27),
    (88, 28),
    (15, 29),
    (80, 30),
    (96, 31),
    (96, 32),
    (14, 33),
    (77, 34),
    (66, 35),
    (20, 36),
    (49, 37),
    (56, 38),
    (56, 39),
    (34, 40),
    (24, 41),
    (6, 42),
    (57, 43),
    (95, 44),
    (89, 45),
    (67, 46),
    (6, 47),
    (90, 48),
    (51, 49),
    (88, 50);
-------- support_chat_message --------
ALTER SEQUENCE support_chat_message_id_seq RESTART WITH 1;
INSERT INTO "support_chat_message" ("id_user", "time", "body", "sender") VALUES
    (1, '2020-03-22 19:10:25-00', 'Help me please!!! Do needles hurt? :(', 'user'),
    (1, '2020-03-22 19:10:25-00', 'Hello, thank you for contacting us, yes they do go ''ouch''', 'admin');
-------- newsletter_subscriber --------
ALTER SEQUENCE newsletter_subscriber_id_seq RESTART WITH 1;
INSERT INTO "newsletter_subscriber" ("email", "date") VALUES
    ('mmiell0@phpbb.com', '2020-03-25'),
    ('gashpole1@sfgate.com', '2020-03-18'),
    ('sduckers2@cbc.ca', '2020-03-15'),
    ('roakeby3@google.ru', '2020-03-16'),
    ('jpoundesford4@ehow.com', '2020-03-26'),
    ('gpilch5@upenn.edu', '2020-03-25'),
    ('sdomonkos6@marriott.com', '2020-03-02'),
    ('clown7@reuters.com', '2020-03-28'),
    ('nlitchfield8@mail.ru', '2020-03-09'),
    ('qdobrovolski9@unblog.fr', '2020-03-17'),
    ('emacclenana@php.net', '2020-03-07'),
    ('nmuggachb@wired.com', '2020-03-01'),
    ('cbavinc@businessweek.com', '2020-03-02'),
    ('blaxed@berkeley.edu', '2020-03-07'),
    ('swhitakere@ibm.com', '2020-03-26'),
    ('tbrantonf@rakuten.co.jp', '2020-03-24'),
    ('lleppingwellg@cdbaby.com', '2020-03-27'),
    ('fwodhamh@yahoo.com', '2020-03-02'),
    ('cderingi@fastcompany.com', '2020-03-01'),
    ('acossellj@cam.ac.uk', '2020-03-16'),
    ('bdufallk@china.com.cn', '2020-03-21'),
    ('mbunnyl@ycombinator.com', '2020-03-27'),
    ('tlintallm@nps.gov', '2020-03-05'),
    ('epockettn@flavors.me', '2020-03-08'),
    ('rheildso@goodreads.com', '2020-03-25'),
    ('dyeskinp@cocolog-nifty.com', '2020-03-12'),
    ('maxtellq@yahoo.com', '2020-02-29'),
    ('sackeryr@latimes.com', '2020-03-05'),
    ('ltibbs@com.com', '2020-02-28'),
    ('btwydellt@vinaora.com', '2020-03-28');
-------- admin --------
INSERT INTO "admin" ("username", "password") VALUES
    ('diogosmac', '$2y$10$66cJggj3GqLz9vTwcW8LyeSIihZDUOk.OceXbapUDk9Fpnu/4hEau'), -- lbawefixe
    ('gustavonrm', '$2y$10$7M71G6Jom.Nyi9q5jaL8yeJANqpGP7fSxHtAuoroslOmmhpAEJv2e'), -- hipster
    ('otiago', '$2y$10$8qMUqVA3xyS9ad1q0DOgYuHZUvfnO9FCK2IHeJozfrzYzsgSVCB.C'), -- banana
    ('marantesss', '$2y$10$4D5FL8HDWUPLGzPmlo.qAu53msLM1AZHSTTLoQZ0A6u5hSAYDuTdG'); -- lmao
-------- faq --------
ALTER SEQUENCE faq_id_seq RESTART WITH 1;
INSERT INTO "faq" ("order", "question", "answer") VALUES
    (1, 'How long does my item take to arrive?', 'About 5 to 7 business days after purchase.'),
    (2, 'What is your return policy?', 'There is none, lmaaaooo!'),
    (3, 'Can i submit my own designs for sale?', 'No, our designs are exclusive and we don''t accept designs from other people.');
-------- store --------
INSERT INTO "store" ("id_address", "phone") VALUES
    (1, '935697241');
