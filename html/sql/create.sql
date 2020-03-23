-- Types

CREATE TYPE OrderStatus AS ENUM ('processing', 'shipped', 'received');

CREATE TYPE MessageSender AS ENUM ('user', 'admin');


-- Tables

CREATE TABLE "user" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    dateOfBirth DATE,
    email text NOT NULL CONSTRAINT user_email_uk UNIQUE,
    phone text,
    password text NOT NULL
);

CREATE TABLE "country" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE "city" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    idCountry INTEGER REFERENCES "country" (id) ON UPDATE CASCADE
);

CREATE TABLE "address" (
    id SERIAL PRIMARY KEY,
    street text NOT NULL,
    postalCode text NOT NULL,
    idCity INTEGER REFERENCES "city" (id) ON UPDATE CASCADE
);

CREATE TABLE "credit_card" (
    id SERIAL PRIMARY KEY,
    name text,
    number text NOT NULL,
    expiration DATE NOT NULL,
    cvv text NOT NULL
);

CREATE TABLE "paypal" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL
);

CREATE TABLE "payment_method" (
    id SERIAL PRIMARY KEY,
    idCC INTEGER REFERENCES "credit_card" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idPP INTEGER REFERENCES "paypal" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT paymentmethod_xor_ck CHECK (
        (idCC is NULL and idPP is NOT NULL) or (idCC is NOT NULL and idPP is NULL)
    )
);

CREATE TABLE "order" (
    id SERIAL PRIMARY KEY,
    date DATETIME NOT NULL DEFAULT NOW() CONSTRAINT review_date_ck CHECK date <= NOW(),
    total FLOAT NOT NULL CONSTRAINT order_total_ck CHECK total > 0,
    status OrderStatus DEFAULT 'processing' NOT NULL,
    idUser INTEGER REFERENCES "user" (id) ON UPDATE CASCADE,
    idAddress INTEGER REFERENCES "address" (id) ON UPDATE CASCADE,
    idPaymentMethod INTEGER REFERENCES "payment_method" (id) ON UPDATE CASCADE
);

CREATE TABLE "category" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE "subcategory" (
    idCategory INTEGER PRIMARY KEY REFERENCES "category" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idParent INTEGER NOT NULL REFERENCES "category" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "item" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    price FLOAT CONSTRAINT item_price_ck CHECK price > 0,
    stock INTEGER CONSTRAINT item_stock_ck CHECK stock >= 0,
    description text,
    rating FLOAT CONSTRAINT item_rating_ck CHECK (
        (rating is NULL) or (rating is NOT NULL and rating > 0 and rating <= 0)
    ),
    idCategory INTEGER REFERENCES "category" (id) ON UPDATE CASCADE
);

CREATE TABLE "archived_item" (
    id INTEGER PRIMARY KEY REFERENCES "item" (id) ON UPDATE CASCADE
);

CREATE TABLE "item_purchase" (
    id SERIAL PRIMARY KEY,
    idItem INTEGER NOT NULL REFERENCES "item" (id) ON UPDATE CASCADE,
    idOrder INTEGER NOT NULL REFERENCES "order" (id) ON UPDATE CASCADE,
    price FLOAT NOT NULL,
    quantity INTEGER NOT NULL,
    CONSTRAINT itempurchase_combination_uk UNIQUE(idItem, idOrder)
);

CREATE TABLE "review" (
    idItemPurchase INTEGER PRIMARY KEY REFERENCES "item_purchase" (id) ON UPDATE CASCADE,
    idUser INTEGER REFERENCES "user" (id) ON UPDATE CASCADE,
    title text NOT NULL,
    body text NOT NULL,
    score INTEGER NOT NULL CONSTRAINT review_score_ck CHECK score > 0 and score <= 5,
    date DATETIME NOT NULL DEFAULT now() CONSTRAINT review_date_ck CHECK date <= now()
);

CREATE TABLE "cart" (
    idUser INTEGER REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idItem INTEGER REFERENCES "item" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    quantity INTEGER CONSTRAINT cart_quantity_ck CHECK quantity > 0,
    dateAdded DATETIME NOT NULL,
    PRIMARY KEY (idUser, idItem)
);

CREATE TABLE "wishlist" (
    idUser INTEGER REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idItem INTEGER REFERENCES "item" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (idUser, idItem)
);

CREATE TABLE "picture" (
    id SERIAL PRIMARY KEY,
    link text NOT NULL
);

CREATE TABLE "item_picture" (
    idPicture INTEGER PRIMARY KEY REFERENCES "picture" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idItem INTEGER NOT NULL REFERENCES "item" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "profile_picture" (
    idUser INTEGER PRIMARY KEY REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idPicture INTEGER DEFAULT 0 NOT NULL REFERENCES "picture" (id) ON UPDATE CASCADE
);

CREATE TABLE "admin_notification" (
    id SERIAL PRIMARY KEY,
    body text NOT NULL,
    sent DATETIME NOT NULL DEFAULT now()
);

CREATE TABLE "out_of_stock_notification" (
    idNotif INTEGER PRIMARY KEY REFERENCES "admin_notification" (id) ON UPDATE CASCADE,
    idItem INTEGER NOT NULL REFERENCES "item" (id) ON UPDATE CASCADE
);

CREATE TABLE "report_notification" (
    idNotif INTEGER PRIMARY KEY REFERENCES "admin_notification" (id) ON UPDATE CASCADE,
    idReview INTEGER NOT NULL REFERENCES "review" (idItemPurchase) ON UPDATE CASCADE
);

CREATE TABLE "sale" (
    id SERIAL PRIMARY KEY,
    name text,
    start DATE NOT NULL,
    end DATE NOT NULL,
    CONSTRAINT sale_date_ck CHECK start < end
);

CREATE TABLE "fixed_sale" (
    idSale INTEGER PRIMARY KEY REFERENCES "sale" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    amount FLOAT NOT NULL CONSTRAINT fixedsale_amount_ck CHECK amount > 0
);

CREATE TABLE "percentage_sale" (
    idSale INTEGER PRIMARY KEY REFERENCES "sale" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    percent FLOAT NOT NULL CONSTRAINT percentagesale_percent_ck CHECK percent > 0
);

CREATE TABLE "item_subscriber" (
    idItem INTEGER REFERENCES "item" (id) ON UPDATE CASCADE,
    email text,
    PRIMARY KEY (idItem, email)
);

CREATE TABLE "user_address" (
    idUser INTEGER REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idAddress INTEGER REFERENCES "address" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "user_payment_method" (
    idUser INTEGER REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idPaymentMethod INTEGER REFERENCES "payment_method" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "support_chat_message" (
    id SERIAL PRIMARY KEY,
    idUser INTEGER REFERENCES "user" (id) ON UPDATE CASCADE,
    time DATETIME NOT NULL,
    body text NOT NULL,
    sender MessageSender NOT NULL
);

CREATE TABLE "newsletter_subscriber" (
    email text PRIMARY KEY,
    date DATE NOT NULL DEFAULT now()
);

CREATE TABLE "admin" (
    username text PRIMARY KEY,
    password text NOT NULL
);

CREATE TABLE "faq" (
    id SERIAL PRIMARY KEY,
    question text UNIQUE NOT NULL,
    answer NOT NULL
);
