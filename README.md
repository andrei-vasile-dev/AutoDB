
# 🚗 AutoDB – Car Models Database Web Application

## 📄 Project Description

This project is a web application that provides information about car models, built using **PHP, HTML, and CSS**, without using any framework.

The interface is intentionally simple, as the main focus was placed on the design of the **MySQL database** to which the website is connected, as well as on the operations performed on it. Basically, through this web application, the user can view the information stored in the database about the selected car model in a more **user-friendly** format.

---

## 🗄️ Database Design

The relational diagram (**ERD – Entity Relationship Diagram**) can be seen in the following video:

![Relational Diagram](Imagini/video1.gif)

The project was designed so that, through the website, the user can perform database queries that illustrate the **basic operations of relational algebra**, namely:

1. At least one operation for **union**, **difference**, **selection**, **projection**, and **join**
2. Two **join operations** that involve at least two other intermediate operations (**union, difference, selection, projection**) performed before the join

Additionally, the database has gone through the **normalization process** and was brought up to the **Third Normal Form (3NF)**.

---

## 🎬 Application Preview

In the following video, you can see how a part of the web application looks  
(please be patient, as the GIF loads slowly and may take **1–2 minutes** to appear):

![Web Application GIF](Imagini/video2.gif)

---

## ⚙️ Installation and Running

1. **Clone the repository**  
```bash
   git clone https://github.com/andrei-vasile-dev/AutoDB.git
```

2. **Configure the database**

• Create a MySQL database

• Import the masinibd.sql file

• Update the config.php file with your MySQL credentials

3. **Run the application**

• Place the project on a local server (e.g. XAMPP, WAMP, MAMP)

• Access it in the browser at:
```bash
    http://localhost/project-name/
```
