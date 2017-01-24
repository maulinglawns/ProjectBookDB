<?php

class BookDB
{
    //// Private vars for the database
    //private $db_host = "localhost";
    //private $db_user = "bookuser";
    //private $db_pass = "lövblås";
    //private $db_base = "bookstore";
    
    //// Uncomment these for use with XAMPP
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_base = "bookstore";
    
    protected function Connect()
    {
        /*
         * Connect to database.
         * Return values:
         * true: we have successfully connected
         * false: could not connect 
         */
        $mysqli = new mysqli();
        $mysqli->connect($this->db_host, $this->db_user, $this->db_pass,
                         $this->db_base);
        // Apparently I need to FORCE utf-8, why???
        $mysqli->set_charset("utf8");
        
        if ($mysqli->connect_error) {
            // Trigger something here if we fail to connect
            return false;
            $mysqli->close();
        }
        return $mysqli;
    }
    
    public function getSearchQuery($getArr)
    {
        /* Create a query string for searching database.
         * 
         * Arguments:
         * The entire $_GET array
         * 
         * Return values:
         * The query as string
         */
        
        $query = "";
        $conn = $this->Connect();
        
        // Get values from $_GET array
        $queryInit = "SELECT * FROM books";
        $author = $conn->real_escape_string($getArr['Author']);
        $title  = $conn->real_escape_string($getArr['Title']);
        $descr  = $conn->real_escape_string($getArr['Descr']);
        $comm   = $conn->real_escape_string($getArr['Comm']);
        $price  = $conn->real_escape_string($getArr['Price']);
        $bookID = $conn->real_escape_string($getArr['BookID']);
        $image  = $conn->real_escape_string($getArr['Image']);
        $year   = $conn->real_escape_string($getArr['Year']);
        
        $conn->close();
        
        //http://stackoverflow.com/a/15794249/7156944
        if ($author) {
            $sql[] = " auth LIKE '%$author%' ";
        }
        if ($title) {
            $sql[] = " title LIKE '%$title%' ";
        }
        if ($descr) {
            $sql[] = " descr LIKE '%$descr%' ";
        }
        if ($comm) {
            $sql[] = " comm LIKE '%$comm%' ";
        }
        if ($price) {
            $sql[] = " price LIKE '%$price%' ";
        }
        if ($bookID) {
            $sql[] = " bookID LIKE '%$bookID%' ";
        }
        if ($image) {
            $sql[] = " image LIKE '%$image%' ";
        }
        if ($year) {
            $sql[] = " year LIKE '%$year%' ";
        }
        if (! empty($sql)) {
            $query = $queryInit .= " WHERE " . implode(" AND ", $sql);
        }
        
        return $query;
    }
    
    public function getInsertQuery($postArr)
    {
        /* Create a query string for inserting into database.
         * 
         * Arguments:
         * The entire $_POST array
         * 
         * Return values:
         * The query as string
         */
        
        $conn = $this->Connect();
        
        // Get values from $_POST array
        $author = $conn->real_escape_string($postArr['Author']);
        $title  = $conn->real_escape_string($postArr['Title']);
        $descr  = $conn->real_escape_string($postArr['Descr']);
        $comm   = $conn->real_escape_string($postArr['Comm']);
        $price  = $conn->real_escape_string($postArr['Price']);
        $bookID = $conn->real_escape_string($postArr['BookID']);
        $image  = $conn->real_escape_string($postArr['Image']);
        $year   = $conn->real_escape_string($postArr['Year']);
        
        $conn->close();
        
        // Create insert query
        $query = "INSERT INTO books 
                 (auth, title, descr, comm, price, bookID, image, year)
                 VALUES
                 ('$author', '$title', '$descr', '$comm', '$price', 
                  '$bookID', '$image', '$year')";
        
        return $query;
    }
    
    
    public function getUpdateQuery($postArr)
    {
        /* Create a query string for inserting into database.
         * 
         * Arguments:
         * The uniq book id & the entire $_POST array
         * 
         * Return values:
         * The query as string
         */
        
        $conn = $this->Connect();
        
        // Get values from $_POST array
        $author = $conn->real_escape_string($postArr['Author']);
        $title  = $conn->real_escape_string($postArr['Title']);
        $descr  = $conn->real_escape_string($postArr['Descr']);
        $comm   = $conn->real_escape_string($postArr['Comm']);
        $price  = $conn->real_escape_string($postArr['Price']);
        $bookID = $conn->real_escape_string($postArr['BookID']);
        $image  = $conn->real_escape_string($postArr['Image']);
        $year   = $conn->real_escape_string($postArr['Year']);
        $id     = $conn->real_escape_string($postArr['UniqID']);
        $qty    = $conn->real_escape_string($postArr['Qty']);
        
        $conn->close();
        
        // Create update query
        $query = "UPDATE books 
                  SET auth='$author', title='$title', descr='$descr', comm='$comm',
                  price='$price', bookID='$bookID', image='$image', year='$year', 
                  qty='$qty'
                  WHERE uniqID=$id";
        
        return $query;
    }
    
    public function getFreeQuery($getArr)
    {
        /* Get the free search query
         * 
         * Arguments:
         * The search string via $_GET
         * 
         * Return values:
         * The query as string
         */
         
         $conn = $this->Connect();
         
         $freeQuery = $conn->real_escape_string($getArr['freeSearchQuery']);
         
         $conn->close();
         
         // Create full-text query
         $query = "SELECT * FROM books
                   WHERE MATCH (auth,title,descr)
                   AGAINST ('{$freeQuery}*' IN BOOLEAN MODE)";
         
         return $query;
     }
    
    public function doSqlInsert($insertQuery)
    {
        /* Perform an insert query into database.
         * 
         * Arguments:
         * The insert query as string.
         * 
         * Return values:
         * Success: The id of newly created record.
         * Failur on sql connection: -2
         * Failure on sql insert: -1 (integer)
         */
         
        // Create mysqli object
        $conn = $this->Connect();
        // Check if we have an object
        if (! is_object($conn)) {
            // If _not_ return immediately
            return -2;
        }
        // Get the query
        $dbQuery = $insertQuery;
        
        if ($conn->query($dbQuery)) {
            return $conn->insert_id;
        } else {
            echo $conn->error;
            return -1;
        }
        $conn->close();
    }
    
    public function doSqlUpdate($updateQuery)
    {
        /* Perform an update query into database.
         * 
         * Arguments:
         * The insert query as string.
         * 
         * Return values:
         * Success: 0 (integer)
         * Failur on sql connection: -2 (integer)
         * Failure on sql update: -1 (integer)
         */
         
        // Create mysqli object
        $conn = $this->Connect();
        // Check if we have an object
        if (! is_object($conn)) {
            // If _not_ return immediately
            return -2;
        }
        // Get the query
        $dbQuery = $updateQuery;
        
        if ($conn->query($dbQuery)) {
            return 0;
        } else {
            echo $conn->error;
            return -1;
        }
        $conn->close();
    }
         
    
    public function listSearchQuery($queryString)
    {
        /* List the results from a mysql query
         * 
         * Arguments:
         * The query as string
         * 
         * Return values:
         * Success: 0
         * Failure: 1 */
        
        // Create mysqli object
        $conn = $this->Connect();
        // Check if we have an object
        if (! is_object($conn)) {
            // If _not_ return immediately
            return 1;
        }
        // Get the query
        $dbQuery = $queryString;
        if (! empty($dbQuery)) {
            // Get results
            $result = $conn->query($dbQuery);
            // Do we have any results?
            if ($result->num_rows < 1) {
                echo "<p>No records found!</p>";
            } else {
                //echo $result->num_rows . " records found";
                // Show the results
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['auth'] . "</td>";
                    echo "<td>" . 
                    // Create link of the title, pass uniqID as $_GET parameter
                    "<a href=\"single.php?uniqID={$row['uniqID']}\">" .
                    $row['title'] . "</a></td>";
                    echo "<td>" . $row['descr'] . "</td>";
                    echo "<td>" . $row['bookID'] . "</td>";
                    echo "<td>" . $row['price'] . ":-</td>";
                    // If we have an image, display 'image' in green text
                    if ($row['image']) {
                        echo "<td><img class=\"bookImg\" src=\"{$row['image']}\" alt=\"book image\"></td>";
                    } else {
                        echo "<td><span style=\"color: red;\">No image</span></td>";
                    }
                    echo "</tr>";
                }
                $result->free();
                $conn->close();
            }
        } else {
            echo "<p>Please enter at least one search parameter!</p>";
        }
        return 0;
    }
    
    public function singleBook($id)
    {
        /* Get a single book (record) from
         * database.
         * 
         * Arguments:
         * The uniq bookID as integer
         * 
         * Return values:
         * Error: 1 (integer)
         * Success: All information of single record in an array
         */
         
        // Create mysqli object
        $conn = $this->Connect();
        // Check if we have an object
        if (! is_object($conn)) {
            // If _not_ return immediately
            return 1;
        }
        
        // Create query
        $dbQuery = "SELECT * FROM books WHERE uniqID = {$id}";
        
        // Get result
        $result = $conn->query($dbQuery);
        
        // Error check, we should only have ONE row
        if ($result->num_rows != 1) {
            echo "<p>Oops! Something went wrong!</p>";
        } else {
            return $result->fetch_array(MYSQLI_ASSOC);
        }
        
        $result->free();
        $conn->close();
    }
}

?>
