const mysql = require("mysql");

const connection = mysql.createConnection({
  host: "localhost", // Ensure this points to your local database
  user: "root",
  password: "",
  database: "pokedex1",
  port: 3306,
});

connection.connect((err) => {
  if (err) {
    console.error("Error connecting to the database:", err.message);
    process.exit(1);
  }
  console.log("Connected to the local database.");

  const query = "UPDATE pokemon SET image_url = REPLACE(image_url, '.png', '.webp')";
  console.log("Executing query:", query);

  connection.query(query, (error, results) => {
    if (error) {
      console.error("Error updating image URLs:", error.message);
    } else {
      console.log("Image URLs updated successfully. Rows affected:", results.affectedRows);
    }
    connection.end();
  });
});
