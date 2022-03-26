
const SERVERNAME = "sql1.njit.edu";
const USERNAME = "dq33";
const PASSWORD = "Manchester990103@";
const DATABASE = "dq33";

// Create connection
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>