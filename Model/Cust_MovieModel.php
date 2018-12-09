<?Php
    /**
     * This class is used to service the movie table in the moviesRus Database
     */
    class Cust_MovieModel {
        public function __construct() {
            $this->DataHandler = new Datahandler(DB_SERVER_ADRESS, DB_NAME, DB_USERNAME, DB_PASS, DB_TYPE);
        }

        public function SearchName() {
            if (isset($_POST['submit'])
            && isset($_POST['name'])
            &&  $_POST['name'] !== "") {

                $name = $_POST['name'];

                $sql = "SELECT mov_title
                FROM movie
                WHERE mov_title = 'vertigo'";

                return $this->DataHandler->readData(
                    "SELECT * FROM movie"
                );
            } else {
                // echo 'hi';
                return 'Please insert your query';
            }
        }
    }


?>
