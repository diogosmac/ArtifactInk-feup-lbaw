-- Drop Tables

DROP TABLE IF EXISTS 'item_sale';
DROP TABLE IF EXISTS 'store';
DROP TABLE IF EXISTS 'faq';
DROP TABLE IF EXISTS 'admin';
DROP TABLE IF EXISTS 'newsletter_subscriber';
DROP TABLE IF EXISTS 'support_chat_message';
DROP TABLE IF EXISTS 'user_payment_method';
DROP TABLE IF EXISTS 'user_address';
DROP TABLE IF EXISTS 'item_subscription';
DROP TABLE IF EXISTS 'item_subscriber';
DROP TABLE IF EXISTS 'sale';
DROP TABLE IF EXISTS 'report_notification';
DROP TABLE IF EXISTS 'out_of_stock_notification';
DROP TABLE IF EXISTS 'admin_notification';
DROP TABLE IF EXISTS 'profile_picture';
DROP TABLE IF EXISTS 'item_picture';
DROP TABLE IF EXISTS 'wishlist';
DROP TABLE IF EXISTS 'cart';
DROP TABLE IF EXISTS 'review';
DROP TABLE IF EXISTS 'item_purchase';
DROP TABLE IF EXISTS 'item';
DROP TABLE IF EXISTS 'order';
DROP TABLE IF EXISTS 'category';
DROP TABLE IF EXISTS 'payment_method';
DROP TABLE IF EXISTS 'paypal';
DROP TABLE IF EXISTS 'credit_card';
DROP TABLE IF EXISTS 'address';
DROP TABLE IF EXISTS 'country';
DROP TABLE IF EXISTS 'user';

-- Drop Types

DROP TYPE IF EXISTS ITEM_STATUS;
DROP TYPE IF EXISTS SALE_TYPE;
DROP TYPE IF EXISTS ORDER_STATUS;
DROP TYPE IF EXISTS MESSAGE_SENDER;

-- Types

CREATE TYPE ITEM_STATUS AS ENUM ('active', 'archived');
CREATE TYPE SALE_TYPE AS ENUM ('fixed', 'percentage');
CREATE TYPE ORDER_STATUS AS ENUM ('processing', 'shipped', 'received');
CREATE TYPE MESSAGE_SENDER AS ENUM ('user', 'admin');

-- Tables

CREATE TABLE 'user' (
    'id' SERIAL PRIMARY KEY,
    'name' TEXT NOT NULL,
    'id_picture' INTEGER NOT NULL REFERENCES 'profile_picture' ('id') ON UPDATE CASCADE,
    'date_of_birth' DATE NOT NULL CONSTRAINT user_dob_ck CHECK (date_part('year', age(now(), date_of_birth)) >= 18),
    'email' TEXT NOT NULL CONSTRAINT user_email_uk UNIQUE,
    'phone' TEXT,
    'password' TEXT NOT NULL
);

CREATE TABLE 'address' (
    'id' SERIAL PRIMARY KEY,
    'street' TEXT NOT NULL,
    'postal_code' TEXT NOT NULL,
    'city' TEXT NOT NULL,
    'id_country' INTEGER NOT NULL REFERENCES 'country' ('id') ON UPDATE CASCADE
);

CREATE TABLE 'country' (
    'id' SERIAL PRIMARY KEY,
    'name' TEXT NOT NULL
);

CREATE TABLE 'payment_method' (
    'id' SERIAL PRIMARY KEY,
    'id_cc' INTEGER REFERENCES 'credit_card' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_pp' INTEGER REFERENCES 'paypal' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT paymentmethod_xor_ck CHECK (
        ('id_cc' is NULL and 'id_pp' is NOT NULL) or ('id_cc' is NOT NULL and 'id_pp' is NULL)
    )
);

CREATE TABLE 'credit_card' (
    'id' SERIAL PRIMARY KEY,
    'name' TEXT,
    'number' TEXT NOT NULL,
    'expiration' DATE NOT NULL,
    'cvv' TEXT NOT NULL
);

CREATE TABLE 'paypal' (
    'id' SERIAL PRIMARY KEY,
    'email' TEXT NOT NULL
);

CREATE TABLE 'order' (
    'id' SERIAL PRIMARY KEY,
    'date' TIMESTAMP NOT NULL DEFAULT now() CONSTRAINT order_date_ck CHECK ('date' <= now()),
    'total' FLOAT NOT NULL CONSTRAINT order_total_ck CHECK ('total' > 0),
    'status' ORDER_STATUS DEFAULT 'processing' NOT NULL,
    'id_user' INTEGER REFERENCES 'user' ('id') ON UPDATE CASCADE ON DELETE SET NULL,
    'id_address' INTEGER REFERENCES 'address' ('id') ON UPDATE CASCADE,
    'id_payment_method' INTEGER REFERENCES 'payment_method' ('id') ON UPDATE CASCADE
);

CREATE TABLE 'category' (
    'id' SERIAL PRIMARY KEY,
    'name' TEXT NOT NULL CONSTRAINT category_name_uk UNIQUE,
    'id_parent' INTEGER REFERENCES 'category' ('id') ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE 'item' (
    'id' SERIAL PRIMARY KEY,
    'name' TEXT NOT NULL,
    'brand' TEXT NOT NULL,
    'price' FLOAT NOT NULL CONSTRAINT item_price_ck CHECK ('price' > 0),
    'stock' INTEGER NOT NULL CONSTRAINT item_stock_ck CHECK ('stock' >= 0),
    'description' TEXT,
    'rating' FLOAT CONSTRAINT item_rating_ck CHECK (
        ('rating' is NULL) or ('rating' is NOT NULL and 'rating' > 0 and 'rating' <= 0)
    ),
    'status' ITEM_STATUS NOT NULL DEFAULT 'active',
    'id_category' INTEGER REFERENCES 'category' ('id') ON UPDATE CASCADE,
);

CREATE TABLE 'item_purchase' (
    'id_item' INTEGER REFERENCES 'item' ('id') ON UPDATE CASCADE,
    'id_order' INTEGER REFERENCES 'order' ('id') ON UPDATE CASCADE,
    'price' FLOAT NOT NULL CONSTRAINT item_purchase_price_ck CHECK ('price' >= 0),
    'quantity' INTEGER NOT NULL CONSTRAINT item_purchase_quantity_ck CHECK ('quantity' >= 0),
    PRIMARY KEY ('id_item', 'id_order')
);

CREATE TABLE 'review' (
    'id' SERIAL PRIMARY KEY,
    'id_item' INTEGER NOT NULL REFERENCES 'item' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_user' INTEGER REFERENCES 'user' ('id') ON UPDATE CASCADE ON DELETE SET NULL,
    'title' TEXT NOT NULL,
    'body' TEXT NOT NULL,
    'score' INTEGER NOT NULL CONSTRAINT review_score_ck CHECK ('score' >= 0 and 'score' <= 5),
    'date' TIMESTAMP NOT NULL DEFAULT now() CONSTRAINT review_date_ck CHECK ('date' <= now())
);

CREATE TABLE 'cart' (
    'id_user' INTEGER REFERENCES 'user' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_item' INTEGER REFERENCES 'item' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'quantity' INTEGER NOT NULL CONSTRAINT cart_quantity_ck CHECK (quantity > 0),
    'date_added' TIMESTAMP NOT NULL DEFAULT now(),
    PRIMARY KEY ('id_user', 'id_item')
);

CREATE TABLE 'wishlist' (
    'id_user' INTEGER REFERENCES 'user' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_item' INTEGER REFERENCES 'item' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ('id_user', 'id_item')
);

CREATE TABLE 'item_picture' (
    'id' SERIAL PRIMARY KEY,
    'id_item' INTEGER NOT NULL REFERENCES 'item' ('id') ON UPDATE CASCADE ON DELETE CASCADE
    'link' TEXT NOT NULL,
);

CREATE TABLE 'profile_picture' (
    'id' SERIAL PRIMARY KEY,
    'link' TEXT
);

CREATE TABLE 'admin_notification' (
    'id' SERIAL PRIMARY KEY,
    'body' TEXT NOT NULL,
    'sent' TIMESTAMP NOT NULL DEFAULT now()
);

CREATE TABLE 'out_of_stock_notification' (
    'id_notif' INTEGER PRIMARY KEY REFERENCES 'admin_notification' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_item' INTEGER NOT NULL REFERENCES 'item' ('id') ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE 'report_notification' (
    'id_notif' INTEGER PRIMARY KEY REFERENCES 'admin_notification' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_review' INTEGER NOT NULL REFERENCES 'review' ('id') ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE 'sale' (
    'id' SERIAL PRIMARY KEY,
    'name' TEXT,
    'start' DATE NOT NULL,
    'end' DATE NOT NULL,
    CONSTRAINT sale_date_ck CHECK ('start' < 'end'),
    'type' SALE_TYPE NOT NULL,
    'fixed_amount' FLOAT CONSTRAINT sale_fixed_ck CHECK (('fixed_amount' IS NULL) or ('fixed_amount' > 0)),
    'percentage_amount' FLOAT CONSTRAINT sale_percentage_ck CHECK (('percentage_amount' IS NULL) or ('percentage_amount' > 0)),
    CONSTRAINT sale_xor_ck CHECK (
        (('fixed_amount' IS NULL) and ('percentage_amount' IS NOT NULL))
        or
        (('fixed_amount' IS NOT NULL) and ('percentage_amount' IS NULL))
    )
);

CREATE TABLE 'item_subscriber' (
    'email' TEXT PRIMARY KEY,
    'date' DATE NOT NULL DEFAULT now()
);

CREATE TABLE 'item_subscription' (
    'id_item' INTEGER REFERENCES 'item' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'email_subscriber' INTEGER REFERENCES 'item_subscriber' ('email') ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ('id_item', 'id_subscriber')
);

CREATE TABLE 'user_address' (
    'id_user' INTEGER REFERENCES 'user' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_address' INTEGER REFERENCES 'address' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ('id_user', 'id_address')
);

CREATE TABLE 'user_payment_method' (
    'id_user' INTEGER REFERENCES 'user' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_payment_method' INTEGER REFERENCES 'payment_method' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ('id_user', 'id_payment_method')
);

CREATE TABLE 'support_chat_message' (
    'id' SERIAL PRIMARY KEY,
    'id_user' INTEGER REFERENCES 'user' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'time' TIMESTAMP NOT NULL,
    'body' TEXT NOT NULL,
    'sender' MESSAGE_SENDER NOT NULL
);

CREATE TABLE 'newsletter_subscriber' (
    'email' TEXT PRIMARY KEY,
    'date' DATE NOT NULL DEFAULT now()
);

CREATE TABLE 'admin' (
    'username' TEXT PRIMARY KEY,
    'password' TEXT NOT NULL
);

CREATE TABLE 'faq' (
    'id' SERIAL PRIMARY KEY,
    'order' INTEGER NOT NULL CONSTRAINT faq_order_uk UNIQUE,
    CONSTRAINT faq_order_ck CHECK ('order' >= 1),
    'question' TEXT NOT NULL CONSTRAINT faq_question_uk UNIQUE,
    'answer' TEXT NOT NULL
);

CREATE TABLE 'store' (
    'id_address' INTEGER PRIMARY KEY REFERENCES 'address' ('id') ON UPDATE CASCADE,
    'phone' TEXT NOT NULL
);

CREATE TABLE 'item_sale' (
    'id_item' INTEGER REFERENCES 'item' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    'id_sale' INTEGER REFERENCES 'sale' ('id') ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY ('id_item', 'id_sale')
);
