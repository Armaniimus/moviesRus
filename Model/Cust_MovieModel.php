<?Php
    /**
     * This class is used to service the movie table in the moviesRus Database
     */
    class Cust_MovieModel {
        public function __construct() {
            $this->DataHandler = new Datahandler(DB_SERVER_ADRESS, DB_NAME, DB_USERNAME, DB_PASS, DB_TYPE);
            $this->htmlElements = new htmlElements();
        }

        public function SearchName() {

            if (isset($_POST['name'])) {
                $_POST['name'] = trim($_POST['name'], " ");
            }

            if (isset($_POST['submit'])
            && isset($_POST['name'])
            &&  $_POST['name'] !== "") {
                $name = $_POST['name'];

                $data = $this->DataHandler->readData(
                    "SELECT mov_title AS 'Titel', mov_year AS 'Release year', mov_time AS 'Film lengte'
                    FROM movie
                    WHERE mov_title LIKE :name",
                    ['name' => "%$name%"]
                );

                if ($data) {
                    for ($i=0; $i < count($data); $i++) {
                        $data[$i]["Film lengte"] = $data[$i]["Film lengte"] . " min";
                    }

                    return $this->htmlElements->generateButtonedTable($data, 'result-table', [1,0,0]);
                } else {
                    return "Er zijn geen zoek resultaten gevonden";
                }

            } else {
                return 'Hier komen de resultaten van je zoek opdracht';
            }
        }
    }


?>
