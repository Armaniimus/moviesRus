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
                    $andBindingsArray['name'] = "%" . $name . "%";
                    $_SESSION['name'] = $name;
                } else {
                    $andBindingsArray['name'] = "%%";
                }


                if (isset($_POST['year'])) {
                    $year = trim($_POST['year'], " ");
                    if ($year !== "") {
                        $andBindingsArray['year'] = $year;
                        $andString .= " AND mov_year = :year";
                        $_SESSION["year"] = $year;
                    }
                }

                if (isset($_POST['month'])) {
                    $month = trim($_POST['month'], " ");
                    if ($month !== "") {
                        $andBindingsArray['month'] = $month;
                        $andString .= " AND MONTH(mov_dt_rel) = :month";
                        $_SESSION["month"] = $month;
                    }
                }

                if (isset($_POST['day'])) {
                    $day = trim($_POST['day'], " ");
                    if ($day !== "") {
                        $andBindingsArray['day'] = $day;
                        $andString .= " AND DAY(mov_dt_rel) = :day";
                        $_SESSION["day"] = $day;
                    }
                }

                if (isset($_POST['act_fname'])) {
                    $act_fname = trim($_POST['act_fname'], " ");
                    if ($act_fname !== "") {
                        $andBindingsArray['act_fname'] = "%$act_fname%";
                        $andString .= " AND act_fname LIKE :act_fname";
                        $_SESSION["act_fname"] = $act_fname;
                    }
                }

                if (isset($_POST['act_lname'])) {
                    $act_lname = trim($_POST['act_lname'], " ");
                    if ($act_lname !== "") {
                        $andBindingsArray['act_lname'] = "%$act_lname%";
                        $andString .= " AND act_lname LIKE :act_lname";
                        $_SESSION["act_lname"] = $act_lname;
                    }
                }

                if (isset($_POST['rating'])) {
                    $rating = trim($_POST['rating'], " ");
                    if ($rating !== "") {
                        $andBindingsArray['rating'] = $rating;
                        $andString .= " AND rev_stars = :rating";
                        $_SESSION["rating"] = $rating;
                    }
                }

                // echo $andString . "<pre>";
                // var_dump($andBindingsArray);
                // echo "</pre>";
            }

            if (isset($_POST['submit'])) {
                $data = $this->DataHandler->readData(
                    "SELECT
                        mov_title AS 'Titel'
                        ,DATE_FORMAT(mov_dt_rel, '%d-%m-%Y' ) AS 'Datum van uitgave'
                        ,mov_time AS 'Film lengte'
                        ,rev_stars AS 'Beoordeling'
                        ,act_fname AS 'Voornaam acteur'
                        ,act_lname AS 'Achternaam acteur'
                        ,role AS 'rol'

                    FROM movie
                    LEFT JOIN movie_cast USING(mov_id)
                    LEFT JOIN actor USING(act_id)
                    LEFT JOIN rating USING(mov_id)
                    WHERE mov_title LIKE :name
                    $andString
                    ORDER BY mov_title
                    ",
                    $andBindingsArray
                );
                echo $andString;


                if ($data) {
                    $_SESSION['resCount'] = count($data);
                    for ($i=0; $i < count($data); $i++) {
                        $data[$i]["Film lengte"] = $data[$i]["Film lengte"] . " min";
                        if ($data[$i]["Datum van uitgave"] == "00-00-0000") {
                            $data[$i]["Datum van uitgave"] = "";
                        }
                    }

                    return $this->htmlElements->customAdvancedTable($data, 'result-table', [1,1,0]);
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
