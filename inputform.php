<?php
class FormHandler {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function processFormData($name, $email, $subscribe, $gender, $browser, $ip) {
        // Validasi data
        if (!$this->validateData($name, $email, $gender)) {
            return false;
        }

        // Simpan data ke basis data
        $this->saveToDatabase($name, $email, $subscribe, $gender, $browser, $ip);
        return true;
    }

    private function validateData($name, $email, $gender) {
        // Implementasikan validasi sesuai kebutuhan
        if (empty($name) || empty($email) || empty($gender)) {
            return false;
        }
        return true;
    }

    private function saveToDatabase($name, $email, $subscribe, $gender, $browser, $ip)
    {
        // Implementasikan penyimpanan ke basis data sesuai kebutuhan
        // Contoh menggunakan PDO untuk MySQL
        $stmt = $this->db->prepare("INSERT INTO user_data (name, email, subscribe, gender, browser, ip) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subscribe, $gender, $browser, $ip]);
    }
}

?>
