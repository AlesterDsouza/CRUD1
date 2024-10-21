<?php
require_once 'db.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new db();
    }

    public function create($firstName, $lastName, $mobileNumber, $email, $address, $profilePic) {
        $stmt = $this->db->conn->prepare("INSERT INTO tblusers (FirstName, LastName, MobileNumber, Email, Address, ProfilePic) VALUES (?, ?, ?, ?, ?, ?)");
        // $stmt->bind_param("ssisss", $firstName, $lastName, $mobileNumber, $email, $address, $profilePic);
        $stmt->bind_param("ssisss", $firstName, $lastName, $mobileNumber, $email, $address, $profilePic);
        return $stmt->execute();
    }

    public function read() {
        $result = $this->db->conn->query("SELECT * FROM tblusers");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function update($id, $firstName, $lastName, $mobileNumber, $email, $address, $profilePic) {
        $stmt = $this->db->conn->prepare("UPDATE tblusers SET FirstName = ?, LastName = ?, MobileNumber = ?, Email = ?, Address = ?, ProfilePic = ? WHERE ID = ?");
        $stmt->bind_param("ssisssi", $firstName, $lastName, $mobileNumber, $email, $address, $profilePic, $id);
        return $stmt->execute();
    }

    public function mobileNumberExists($mobileNumber) {
        // Fix: Access conn through $this->db
        $stmt = $this->db->conn->prepare("SELECT * FROM tblusers WHERE MobileNumber = ?");
        $stmt->bind_param('s', $mobileNumber);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; // Returns true if the mobile number exists
    }

    public function emailExists($email){

        $stmt = $this->db->conn->prepare("SELECT * FROM tblusers WHERE Email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; // Returns true if the email exists
    
    }

    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM tblusers WHERE ID = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function find($id) {
        $stmt = $this->db->conn->prepare("SELECT * FROM tblusers WHERE ID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
