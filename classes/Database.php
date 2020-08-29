<?php

namespace ITEC301_CA_WarthogExpressLiner\classes;

class Database
{
    // Database Properties
    const HOST = "localhost";
    const DBNAME = "users_database";
    const USERNAME = "root";
    const PASSWORD = "password";

    private $conn;

    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getConnection()
    {
        /**
         * @return \mysqli
         */
        $conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);
        if (mysqli_connect_errno()) {
            trigger_error("There was a problem while trying to connect to the database.");
        }
        $conn->set_charset("utf8");
        return $conn;
    }

    /**
     * Get database results
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function select($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);
        if (!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resulset[] = $row;
            }
        }

        if (!empty($resulset)) {
            return $resulset;
        }
    }

    /**
     * Insert
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return int
     */
    public function insert($query, $paramType, $paramArray)
    {
        print $query;
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt, $paramType, $paramArray);
        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }

    /**
     * Execute Query
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     */
    public function execute($query, $paramType, $paramArray)
    {
        $stmt = $this->conn->prepare($query);

        if (!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType = "", $paramArray = array());
        }

        $stmt->execute();
    }

    /**
     * Prepare Param Binding
     * Bind Parameters to SQL Statement
     * @param string $stmt
     * @param string $paramType
     * @param array $paramArray
     */
    public function bindQueryParams($stmt, $paramType, $paramArray = array())
    {
        $paramValueReference[] = &$paramType;
        for ($i = 0; $i < count($paramArray); $i++) {
            $paramValueReference[] = &$paramType[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }
    /**
     * Get database results
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function numRows($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare(($query));
        if (!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows();

        return $recordCount;
    }
}
