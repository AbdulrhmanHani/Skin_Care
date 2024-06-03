-- Create the Admin table
CREATE TABLE Admin (
  AdminID int PRIMARY KEY,
  Username nvarchar(50) UNIQUE,
  Password nvarchar(50),
  Email nvarchar(50) UNIQUE,
  PhoneNumber nvarchar(50)
);

-- Insert data into the Admin table
INSERT INTO Admin (AdminID, Username, Password, Email, PhoneNumber) VALUES
(1, 'Razan', '123456', 'Razan@gmail.com', '555-555-5555'),
(2, 'ryhanah', 'ra123456', 'ryhanah@gmail.com', '555-555-5556');

-- Create the Customer table
CREATE TABLE Customer (
  CustomerID int PRIMARY KEY,
  Email nvarchar(50) UNIQUE,
  Password nvarchar(50),
  Address nvarchar(255),
  City nvarchar(50),
  PhoneNumber nvarchar(50)
);

-- Insert data into the Customer table
INSERT INTO Customer (CustomerID, Email, Password, Address, City, PhoneNumber) VALUES
(1, 'Norah7m@hotmail.com', 'N12347', '123 Main Street', 'Anytown', '555-555-5557'),
(2, 'Zainab44h@gmail.com', 'Zai4545', '456 Elm Street', 'Anytown', '555-555-5558'),
(3, 'SarahAl@gmail.com', 'Sa95142', '789 Oak Street', 'Anytown', '555-555-5559');

-- Create the Category table
CREATE TABLE Category (
  CategoryID int PRIMARY KEY,
  CategoryName nvarchar(50)
);

-- Create the Product table
CREATE TABLE Product (
  ProductID int PRIMARY KEY,
  Name nvarchar(50),
  Description text,
  Price float,
  Quantity int,
  CategoryID int,
  Image nvarchar(255),
  FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
);

-- Insert data into the Product table
INSERT INTO Product (ProductID, Name, Description, Price, Quantity ,CategoryID, Image) VALUES
(1, 'Cleanser ', 'A specially formulated, low lather gel deep cleans and minimizes the appearance of pores without stripping skin of natural moisture.', 19.99, 105, 1, 'product1.jpg'),
(2, 'Oil Based Cleanser', 'A gentle cleansing oil. Delicate but effective; this cleansing oil works hard to remove all impurities from the skin. Using micellar cleansing technology and soybean oil; it breaks down dirt; sebum; makeup; SPF; and both oil and waterbased impurities; while ginseng seed oil provides lasting skin protection. The silky texture and cosy grass scent make this a calming and enjoyable cleansing experience.', 29.99, 200, 2, 'product2.jpg'),
(3, 'Tea Tree Toner ', 'Get rid of dirt and grime lurking around your pores. Our Tea Tree Skin Clearing Mattifying Toner helps purify, refresh and prep the skin. Our vegan tea tree face toner is enriched with Community Fair Trade tea tree oil from Kenya. Our formula is perfect for everyday use and our tea tree toner won’t dry out your skin in the process.', 39.99, 78, 3, 'product3.jpg'),
(4, 'Clay Face Mask', 'A detoxifying deep cleaning volcanic mask that intensely treats breakouts, loosens blackheads, and puts over abundant oil in check with natural clays, while comforting the irritation that can often arise in blemish-prone skin', 49.99, 64, 4, 'product4.jpg'),
(5, 'Niacinamide serum', 'for blemish-prone skin that smooths, brightens, and supports. Niacinamide (Vitamin B3) is indicated to reduce the appearance of skin blemishes and congestion. A high 10% concentration of this vitamin is supported in the formula by zinc salt of pyrrolidone carboxylic acid to balance visible aspects of sebum activity.', 59.99, 59, 5, 'product5.jpg'),
(6, 'Collagen cream', 'Supremely Nourishing, Age Defying, Rejuvenating Complex - Meet Collagen ++ Collagen ++ brings you a nourishing anti-aging complex - formulated with Collagen peptide and enriched with skin rejuvenating ingredients. Enjoy silky smooth, glowing skin, and luxuriate in your new self-care skin routine. Collagen ++ Skin Care Highlights-Beautifully Absorbed - Perfect creamy consistency.
- 1,7 fl oz - A little bit goes a long way.-Age Defying - Strengthening and firming skin ingredients.- Reduce Wrinkles - Collagen peptide promote skin rejuvenation. - Designed for normal to dry skinCollagen ++ Deeply Moisturizing Formula Give your skin exactly what it needs. Our deeply moisturizing formula also contains Centella Asiatica, Dead Sea minerals, Argan oil, Vitamin E, Aloe Vera, Chamomile, Coconut oil, 
and Sweet Almond oil. Relieve dryness, and restore your skin elasticity with its plumping hydration. Give Your Skin a Boost Hexapeptide-9 is a collagen peptide that helps contribute to skin rejuvenation. As your skin matures and you notice sagging, 
fine lines, and wrinkles - Collagen peptide can help boost your skins elasticity, and firmness. Additionally, these ingredients can help skin renewal, 
which creates a more youthful complexion.' , 55, 67, 6, 'product.jpg');


-- Create the Order table
CREATE TABLE Orders (
  OrderID int PRIMARY KEY,
  CustomerID int,
  OrderDate date,
  Payment_method nvarchar(50),
  TotalAmount float,
  FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
);

-- Insert data into the Order table
INSERT INTO Orders (OrderID, CustomerID, OrderDate, Payment_method, TotalAmount) VALUES
(1, 1, '2023-01-01', 'Apple Pay', 19.99),
(2, 2, '2023-01-02', 'Apple Pay', 29.99),
(3, 3, '2023-01-03', 'Pay Pal', 39.99),
(4, 1, '2023-01-04', 'Credit Card', 49.99),
(5, 2, '2023-01-05', 'Pay Pal', 59.99);

-- Create the Order Item table
CREATE TABLE OrderItem (
  OrderItemID int PRIMARY KEY,
  OrderID int,
  ProductID int,
  Quantity int,
  UnitPrice float,
  FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
  FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);

-- Insert data into the Order Item table
INSERT INTO OrderItem (OrderItemID, OrderID, ProductID, Quantity, UnitPrice) VALUES
(1, 1, 1, 1, 19.99),
(2, 2, 2, 1, 29.99),
(3, 3, 3, 1, 39.99),
(4, 4, 4, 1, 49.99),
(5, 5, 5, 1, 59.99);

-- Insert data into the Category table
INSERT INTO Category (CategoryID, CategoryName) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3'),
(4, 'Category 4'),
(5, 'Category 5'),
(6, 'Category 6' );

-- Create the Payment table
CREATE TABLE Payment (
  PaymentID int PRIMARY KEY,
  OrderID int,
  CustomerID int,
  PaymentType nvarchar(50),
  Amount float,
  CVV nvarchar(50),
  CardNumber nvarchar(50),
  FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
  FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
);
-- Insert data into the Payment table
INSERT INTO Payment (PaymentID, OrderID, CustomerID, PaymentType, Amount, CVV, CardNumber) VALUES
(1, 1, 1, 'Visa', 19.99, '123', '4567890123456789'),
(2, 2, 2, 'Mastercard', 29.99, '456', '1234567890123456'),
(3, 3, 3, 'American Express', 39.99, '789', '9876543210987654'),
(4, 4, 1, 'Visa', 49.99, '234', '6789012345678901'),
(5, 5, 2, 'Mastercard', 59.99, '567', '2345678901234567');

-- Create the Shipping Address table
CREATE TABLE ShippingAddress (
  ShippingAddressID int PRIMARY KEY,
  OrderID int,
  Shipping_method nvarchar(50),
  Address nvarchar(255),
  City nvarchar(50),
  FOREIGN KEY (OrderID) REFERENCES orders(OrderID)
);

-- Insert data into the Shipping Address table
INSERT INTO ShippingAddress (ShippingAddressID, OrderID, Shipping_method, Address, City) VALUES
(1, 1, 'Aramex', '123 Main Street', 'Anytown'),
(2, 2, 'SMSA', '456 Elm Street', 'Anytown'),
(3, 3, 'DHL', '789 Oak Street', 'Anytown'),
(4, 4, 'Aramex', '123 Main Street', 'Anytown'),
(5, 5, 'SMSA', '456 Elm Street', 'Anytown');

-- Create the Review table
CREATE TABLE Review (
  ReviewID int PRIMARY KEY,
  ProductID int,
  CustomerID int,
  Rating int,
  Comment nvarchar(255),
  ReviewDate date,
  FOREIGN KEY (ProductID) REFERENCES Product(ProductID),
  FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
);

-- Insert data into the Review table
INSERT INTO Review (ReviewID, ProductID, CustomerID, Rating, Comment, ReviewDate) VALUES
(1, 1, 1, 5, 'This is a great product!', '2023-01-01'),
(2, 2, 2, 4, 'This product is okay.', '2023-01-02'),
(3, 3, 3, 3, 'This product is not very good.', '2023-01-03'),
(4, 4, 1, 5, 'This product is amazing!', '2023-01-04'),
(5, 5, 2, 4, 'This product is pretty good.', '2023-01-05');


