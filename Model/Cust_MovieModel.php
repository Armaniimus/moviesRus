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

            if (isset($_POST['submit']) ) {
                $andBindingsArray = [];
                $andString = '';



                if (isset($_POST['name'])) {
                    $name = trim($_POST['name'], " ");
                    $andBindingsArray['name'] = "%$name%";
                } else {
                    $andBindingsArray['name'] = "%%";
                }


                if (isset($_POST['year'])) {
                    $year = trim($_POST['year'], " ");
                    if ($year !== "") {
                        $andBindingsArray['year'] = $_POST['year'];
                        $andString .= " AND mov_year = :year";
                    }
                }

                if (isset($_POST['month'])) {
                    $month = trim($_POST['month'], " ");
                    if ($month !== "") {
                        $andBindingsArray['month'] = $_POST['month'];
                        $andString .= " AND MONTH(mov_dt_rel) = :month";
                    }
                }

                if (isset($_POST['day'])) {
                    $day = trim($_POST['day'], " ");
                    if ($day !== "") {
                        $andBindingsArray['day'] = $_POST['day'];
                        $andString .= " AND DAY(mov_dt_rel) = :day";
                    }
                }

                // echo $andString . "<pre>";
                // var_dump($andBindingsArray);
                // echo "</pre>";
            }

            if (isset($_POST['submit'])) {
                $data = $this->DataHandler->readData(
                    "SELECT mov_title AS 'Titel', mov_dt_rel AS 'Release date', mov_time AS 'Film lengte'
                    FROM movie
                    WHERE mov_title LIKE :name
                    $andString
                    ",
                    $andBindingsArray
                );


                if ($data) {
                    for ($i=0; $i < count($data); $i++) {
                        $data[$i]["Film lengte"] = $data[$i]["Film lengte"] . " min";
                    }

                    return $this->htmlElements->advancedTable($data, 'result-table', [1,1,0]);
                    // return $this->htmlElements->simpleTable($data, 'result-table');
                } else {
                    return "<p>Er zijn geen zoek resultaten gevonden</p>";
                }

            } else {
                return '<p>Hier komen de resultaten van je zoek opdracht</p>';
            }
        }
    }




?>
