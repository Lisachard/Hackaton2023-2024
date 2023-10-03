<?php
class DBHandler
{
    private $name;
    private $user;
    private $password;
    private $host;

    function __construct()
    {
        $this->name = "client";
        $this->user = "root";
        $this->password = "";
        $this->host = "localhost";
    }

    public function connect()
    {
        try {
            $link = mysqli_connect($this->host, $this->user, $this->password, $this->name);
        } catch (Exception $e) {
            echo $e;
            die("Couldn't connect to db");
        }
        return $link;
    }

    public function insert(array $data, string $table)
    {
        $con = $this->connect();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $columns = array_keys($data);
        $values = array_values($data);
        $sql = "INSERT INTO client.$table (" . implode(',', $columns) . ") VALUES (\"" . implode("\", \"", $values) . "\" )";
        $stmt = $con->prepare($sql);
        if (($stmt = $con->prepare($sql))) {
            $stmt->execute();
        } else {
            error_reporting(E_ALL);
            echo "there has been an issue with : " . $sql . " " . mysqli_error($con);
        }
        mysqli_close($con);
    }

    public function getFromDbByParam(string $table, string $param, string $condition)
    {
        $con = $this->connect();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM " . $table . " WHERE " . $param . " = '" . $condition . "'";
        if ($request = $con->prepare($sql)) {
            $request->execute();
            $result = $request->get_result();
        } else {
            die("Can't prepare the sql request properly : " . $sql . " " . mysqli_error($con));
        }
        mysqli_close($con);
        return $result->fetch_assoc();
    }

    public function getDataWithLimit($limit, $page)
    {
        $con = $this->connect();
        $answerArray = array();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        if ($request = $con->prepare($sql)) {
            $request->execute();
            $result = $request->get_result();
            while ($row = mysqli_fetch_assoc($result)) {
                $answerArray[] = $row;
            }
        } else {
            die("there has been an error in the process of : " . $sql . " " . mysqli_error($con));
        }
        mysqli_close($con);
        return $answerArray;
    }

    public function getDistinctFromDB($column)
    {
        $con = $this->connect();
        $answerArray = array();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $sql = "SELECT DISTINCT " . $column . " FROM `client`";
        if ($request = $con->prepare($sql)) {
            $request->execute();
            $result = $request->get_result();
            while ($row = mysqli_fetch_assoc($result)) {
                $answerArray[] = $row;
            }
        } else {
            die("there has been an error in the process of : " . $sql . " " . mysqli_error($con));
        }
        mysqli_close($con);
        return $answerArray;
    }
    public function getClientCount($colon, $toCount)
    {
        $con = $this->connect();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $sql = "SELECT COUNT(*) FROM client WHERE " . $colon . "='" . $toCount . "'";
        if ($request = $con->prepare($sql)) {
            $request->execute();
            $result = $request->get_result();
        } else {
            die(error_log("Can't prepare the sql request properly : " . $sql . " " . mysqli_error($con)));
        }
        mysqli_close($con);
        return $result->fetch_assoc();
    }
    public function getLength()
    {
        $con = $this->connect();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $sql = "SELECT COUNT(*) FROM client";
        if ($request = $con->prepare($sql)) {
            $request->execute();
            $result = $request->get_result();
        } else {
            die("Can't prepare the sql request properly : " . $sql . " " . mysqli_error($con));
        }
        mysqli_close($con);
        return $result->fetch_assoc();
    }
    public function getMultipleParamFromAll(array $params)
    {
        $con = $this->connect();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $sql = "SELECT " . implode(",", $params) . " FROM client";
        if ($request = $con->prepare($sql)) {
            $request->execute();
            $result = $request->get_result();
            while ($row = mysqli_fetch_assoc($result)) {
                $answerArray[] = $row;
            }
        } else {
            die("there has been an error in the process of : " . $sql . " " . mysqli_error($con));
        }
        mysqli_close($con);
        return $answerArray;
    }
    public function insertPerId(array $data, $id)
    {
        $con = $this->connect();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $columns = array_keys($data);
        $values = array_values($data);
        $sql = "UPDATE client.client SET " . implode(',', $columns) . "=\"" . implode("\", \"", $values) . "\" WHERE id=" . $id;
        if ($id == 1) {
            error_log($sql);
        }
        $stmt = $con->prepare($sql);
        if (($stmt = $con->prepare($sql))) {
            $stmt->execute();
        } else {
            error_reporting(E_ALL);
            echo "there has been an issue with : " . $sql . " " . mysqli_error($con);
        }
        mysqli_close($con);
    }
    public function getSearchedClient($input)
    {
        $con = $this->connect();
        if ($con == false) {
            die("ERROR : couldn't connect properly to database : " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM client WHERE last_name LIKE '%" . $input . "%' OR first_name LIKE '%" . $input . "%'";
        if ($request = $con->prepare($sql)) {
            $request->execute();
            $result = $request->get_result();
            while ($row = mysqli_fetch_assoc($result)) {
                $answerArray[] = $row;
            }
        } else {
            die("there has been an error in the process of : " . $sql . " " . mysqli_error($con));
        }
        mysqli_close($con);
        return $answerArray;
    }
}
