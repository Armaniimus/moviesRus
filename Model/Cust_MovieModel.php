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
                if (isset($_POST['name'])) {
                    $_POST['name'] = trim($_POST['name'], " ");
                    $name = $_POST['name'];
                } else {
                    $name = '';
                }

                if (isset($_POST['year'])) {
                    $_POST['year'] = trim($_POST['year'], " ");
                    $year = $_POST['year'];
                } else {
                    $year = '';
                }

                if (isset($_POST['lenght'])) {
                    $_POST['length'] = trim($_POST['length'], " ");
                    $length = $_POST['lenght'];
                } else {
                    $length = '';
                }

                echo $length;
            }

            if (isset($_POST['submit'])) {
                $data = $this->DataHandler->readData(
                    "SELECT mov_title AS 'Titel', mov_year AS 'Release year', mov_time AS 'Film lengte'
                    FROM movie
                    WHERE mov_title LIKE :name
                    AND mov_year LIKE :year
                    AND mov_time LIKE :length
                    ",
                    [
                        'name' => "%$name%"
                        ,'year' => "%$year%"
                        ,'length' => "%$length%"
                    ]
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
