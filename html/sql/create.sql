-- Types

CREATE TYPE OrderStatus AS ENUM ('Processing', 'Shipped', 'Received');

CREATE TYPE MessageSender AS ENUM ('User', 'Admin');


-- Tables

CREATE TABLE "User" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    dateOfBirth DATE,
    email text NOT NULL CONSTRAINT user_email_uk UNIQUE,
    phone text,
    password text NOT NULL
);

CREATE TABLE "Country" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE "City" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    idCountry INTEGER REFERENCES "Country" (id) ON UPDATE CASCADE
);

CREATE TABLE "Address" (
    id SERIAL PRIMARY KEY,
    street text NOT NULL,
    postalCode text NOT NULL,
    idCity INTEGER REFERENCES "City" (id) ON UPDATE CASCADE
);

CREATE TABLE "CreditCard" (
    id SERIAL PRIMARY KEY,
    name text,
    number text NOT NULL,
    expiration DATE NOT NULL,
    cvv text NOT NULL
);

CREATE TABLE "PayPal" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL
);

CREATE TABLE "PaymentMethod" (
    id SERIAL PRIMARY KEY,
    idCC INTEGER REFERENCES "CreditCard" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idPP INTEGER REFERENCES "PayPal" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT paymentmethod_xor_ck CHECK (
        (idCC is NULL and idPP is NOT NULL) or (idCC is NOT NULL and idPP is NULL)
    )
);

CREATE TABLE "Order" (
    id SERIAL PRIMARY KEY,
    date DATETIME NOT NULL DEFAULT NOW() CONSTRAINT review_date_ck CHECK date <= NOW(),
    total FLOAT NOT NULL CONSTRAINT order_total_ck CHECK total > 0,
    status OrderStatus DEFAULT 'Processing' NOT NULL,
    idUser INTEGER REFERENCES "User" (id) ON UPDATE CASCADE,
    idAddress INTEGER REFERENCES "Address" (id) ON UPDATE CASCADE,
    idPaymentMethod INTEGER REFERENCES "PaymentMethod" (id) ON UPDATE CASCADE
);

CREATE TABLE "Category" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL
);

CREATE TABLE "Subcategory" (
    idCategory INTEGER PRIMARY KEY REFERENCES "Category" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idParent INTEGER NOT NULL REFERENCES "Category" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "Item" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    price FLOAT CONSTRAINT item_price_ck CHECK price > 0,
    stock INTEGER CONSTRAINT item_stock_ck CHECK stock >= 0,
    description text,
    rating FLOAT CONSTRAINT item_rating_ck CHECK (
        (rating is NULL) or (rating is NOT NULL and rating > 0 and rating <= 0)
    ),
    idCategory INTEGER REFERENCES "Category" (id) ON UPDATE CASCADE
);

CREATE TABLE "ArchivedItem" (
    id INTEGER PRIMARY KEY REFERENCES "Item" (id) ON UPDATE CASCADE
);

CREATE TABLE "ItemPurchase" (
    id SERIAL PRIMARY KEY,
    idItem INTEGER NOT NULL REFERENCES "Item" (id) ON UPDATE CASCADE,
    idOrder INTEGER NOT NULL REFERENCES "Order" (id) ON UPDATE CASCADE,
    price FLOAT NOT NULL,
    quantity INTEGER NOT NULL,
    CONSTRAINT itempurchase_combination_uk UNIQUE(idItem, idOrder)
);

CREATE TABLE "Review" (
    idItemPurchase INTEGER PRIMARY KEY REFERENCES "ItemPurchase" (id) ON UPDATE CASCADE,
    idUser INTEGER REFERENCES "User" (id) ON UPDATE CASCADE,
    title text NOT NULL,
    body text NOT NULL,
    score INTEGER NOT NULL CONSTRAINT review_score_ck CHECK score > 0 and score <= 5,
    date DATETIME NOT NULL DEFAULT now() CONSTRAINT review_date_ck CHECK date <= now()
);

CREATE TABLE "Cart" (
    idUser INTEGER REFERENCES "User" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idItem INTEGER REFERENCES "Item" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    quantity INTEGER CONSTRAINT cart_quantity_ck CHECK quantity > 0,
    dateAdded DATETIME NOT NULL,
    PRIMARY KEY (idUser, idItem)
);

CREATE TABLE "Wishlist" (
    idUser INTEGER REFERENCES "User" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idItem INTEGER REFERENCES "Item" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (idUser, idItem)
);

CREATE TABLE "Picture" (
    id SERIAL PRIMARY KEY,
    link text NOT NULL
);

CREATE TABLE "ItemPicture" (
    idPicture INTEGER PRIMARY KEY REFERENCES "Picture" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idItem INTEGER NOT NULL REFERENCES "Item" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "ProfilePicture" (
    idUser INTEGER PRIMARY KEY REFERENCES "User" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idPicture INTEGER DEFAULT 0 NOT NULL REFERENCES "Picture" (id) ON UPDATE CASCADE
);

CREATE TABLE "AdminNotification" (
    id SERIAL PRIMARY KEY,
    body text NOT NULL,
    sent DATETIME NOT NULL DEFAULT now()
);

CREATE TABLE "OutOfStockNotification" (
    idNotif INTEGER PRIMARY KEY REFERENCES "AdminNotification" (id) ON UPDATE CASCADE,
    idItem INTEGER NOT NULL REFERENCES "Item" (id) ON UPDATE CASCADE
);

CREATE TABLE "ReportNotification" (
    idNotif INTEGER PRIMARY KEY REFERENCES "AdminNotification" (id) ON UPDATE CASCADE,
    idReview INTEGER NOT NULL REFERENCES "Review" (idItemPurchase) ON UPDATE CASCADE
);

CREATE TABLE "Sale" (
    id SERIAL PRIMARY KEY,
    name text,
    start DATE NOT NULL,
    end DATE NOT NULL,
    CONSTRAINT sale_date_ck CHECK start < end
);

CREATE TABLE "FixedSale" (
    idSale INTEGER PRIMARY KEY REFERENCES "Sale" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    amount FLOAT NOT NULL CONSTRAINT fixedsale_amount_ck CHECK amount > 0
);

CREATE TABLE "PercentageSale" (
    idSale INTEGER PRIMARY KEY REFERENCES "Sale" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    percent FLOAT NOT NULL CONSTRAINT percentagesale_percent_ck CHECK percent > 0
);

CREATE TABLE "ItemSubscriber" (
    idItem INTEGER REFERENCES "Item" (id) ON UPDATE CASCADE,
    email text,
    PRIMARY KEY (idItem, email)
);

CREATE TABLE "UserAddress" (
    idUser INTEGER REFERENCES "User" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idAddress INTEGER REFERENCES "Address" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "UserPaymentMethod" (
    idUser INTEGER REFERENCES "User" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    idPaymentMethod INTEGER REFERENCES "PaymentMethod" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "SupportChatMessage" (
    id SERIAL PRIMARY KEY,
    idUser INTEGER REFERENCES "User" (id) ON UPDATE CASCADE,
    time DATETIME NOT NULL,
    body text NOT NULL,
    sender MessageSender NOT NULL
);

CREATE TABLE "NewsletterSubscriber" (
    email text PRIMARY KEY,
    date DATE NOT NULL DEFAULT now()
);

CREATE TABLE "Admin" (
    username text PRIMARY KEY,
    password text NOT NULL
);

CREATE TABLE "FAQ" (
    id SERIAL PRIMARY KEY,
    question text UNIQUE NOT NULL,
    answer NOT NULL
);
