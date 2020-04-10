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

-- Drop Types

DROP TYPE IF EXISTS ITEM_STATUS;
DROP TYPE IF EXISTS SALE_TYPE;
DROP TYPE IF EXISTS ORDER_STATUS;
DROP TYPE IF EXISTS MESSAGE_SENDER;

-- Drop Triggers

DROP TRIGGER IF EXISTS update_rating on "review";
DROP TRIGGER IF EXISTS add_to_cart on "cart";
DROP TRIGGER IF EXISTS new_oos_notification on "out_of_stock_notification";
DROP TRIGGER IF EXISTS new_report_notification on "report_notification";
DROP TRIGGER IF EXISTS new_item_sale on "item_sale";


-- Types

CREATE TYPE ITEM_STATUS AS ENUM ('active', 'archived');
CREATE TYPE SALE_TYPE AS ENUM ('fixed', 'percentage');
CREATE TYPE ORDER_STATUS AS ENUM ('processing', 'shipped', 'received');
CREATE TYPE MESSAGE_SENDER AS ENUM ('user', 'admin');

-- Tables

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
    "password" TEXT NOT NULL
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
    "date" TIMESTAMP NOT NULL DEFAULT now() CONSTRAINT review_date_ck CHECK ("date" <= now())
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
    "email" TEXT PRIMARY KEY,
    "date" DATE NOT NULL DEFAULT now()
);

CREATE TABLE "admin" (
    "username" TEXT PRIMARY KEY,
    "password" TEXT NOT NULL
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
CREATE INDEX search_idx ON item USING GIST (to_tsvector('english',"item"."name" || ' ' || "item"."brand"|| ' ' || "item"."description"))


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

CREATE OR REPLACE FUNCTION add_to_cart()
  RETURNS trigger AS
$$
BEGIN
    IF (SELECT stock FROM "item" WHERE id=NEW.id_item) < NEW.quantity
	  THEN 
		  RAISE EXCEPTION 'Not enough stock';
    END IF;
  RETURN NEW;
END;
$$
LANGUAGE 'plpgsql';

CREATE TRIGGER add_to_cart
  BEFORE INSERT
  ON "cart"
  FOR EACH ROW
  EXECUTE PROCEDURE add_to_cart();


-- TRIGGER03 --

CREATE OR REPLACE FUNCTION new_oos_notification()
  RETURNS trigger AS
$$
BEGIN
    IF EXISTS (SELECT id_notif FROM "report_notification" WHERE id_notif=NEW.id_notif) 
	  THEN 
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
    IF EXISTS (SELECT id_notif FROM "out_of_stock_notification" WHERE id_notif=NEW.id_notif) 
	  THEN 
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

    IF EXISTS (SELECT * FROM "item", "sale", "item_sale" WHERE item.id=item_sale.id_item AND sale.id=item_sale.id_sale AND sale.start <= sale_end AND sale.end >= sale_start) 
	  THEN 
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
        UPDATE order SET total=order_total WHERE id=currval('order_id_seq');

        DELETE FROM "cart" WHERE id_user = user_id;
	END IF;
END;
$$ LANGUAGE plpgsql;
