<?php

namespace ITEC301_CA_WarthogExpressLiner\functions;

use ITEC301_CA_WarthogExpressLiner\classes\Database;



class Validate
{

    private $dbConn;

    private $ds;


    function __construct()
    {
        require_once "classes/Database.php";
        // Database Object
        $this->ds = new Database();
    }

    function validateUser()
    {
        $valid = true;
        $errorMessage = array();
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $valid = false;
            }
        }

        if ($valid == true) {
            // Email Validation
            if (!isset($error_message)) {
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $errorMessage[] = "Invalid email address.";
                    $valid = false;
                }
            }
        } else {
            $errorMessage[] = "All fields are required.";
        }

        if ($valid == false) {
            return $errorMessage;
        }

        return;
    }
    // Check if user already exists
    public function doesMemberExist($sa_id, $email)
    {
        $query = "SELECT * FROM registration WHERE sa_id = ? OR email = ?";
        $paramType = "ss";
        $paramArray = array($sa_id, $email);
        $userCount = $this->ds->numRows($query, $paramType, $paramArray);

        return $userCount;
    }

    public function insertUser($sa_id, $name, $email, $cell)
    {
        // Insert Query
        $query = "INSERT INTO registration (sa_id,name,email,cell) VALUES ('?','?','?','?')";
        $paramType = "ssss";
        $paramArray = array(
            $sa_id,
            $name,
            $email,
            $cell
        );
        $insertId = $this->ds->insert($query, $paramType, $paramArray);
        return $insertId;
    }
}
