
const HOST = "localhost";
const USERNAME = "test_food";
const PASSWORD = "Daanish8@";
const DATABASE = "root";

// Create connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
