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

        public function Queries($mode) {
            switch ($mode) {
                case '11':
                    $data = $this->DataHandler->readData(
                        "SELECT mov_year, dir_fname, dir_lname, act_fname, act_lname, role
                        FROM (((( movie INNER JOIN movie_cast on movie.mov_id = movie_cast.mov_id)
                        INNER JOIN actor ON actor.act_id = movie_cast.act_id)
                        INNER JOIN movie_direction ON movie.mov_id = movie_direction.mov_id)
                        INNER JOIN director ON movie_direction.dir_id = director.dir_id)
                        WHERE mov_time = (SELECT min(mov_time)
                        	FROM movie
                        )"
                    );
                    break;

                case '12':
                    $data = $this->DataHandler->readData(
                        "SELECT mov_year, mov_title, rev_stars
                        FROM movie, rating
                        WHERE movie.mov_id = rating.mov_id
                        AND (rev_stars = 3 OR rev_stars = 4);"
                    );
                    break;

                case '13':
                $data = $this->DataHandler->readData(
                    "SELECT rev_name, mov_title, rev_stars
                    FROM movie, rating, reviewer
                    WHERE movie.mov_id = rating.mov_id
                    AND rating.rev_id = reviewer.rev_id
                    ORDER BY rev_name, mov_title, rev_stars ASC"
                );
                    break;

                case '14':
                $data = $this->DataHandler->readData(
                    "SELECT mov_title, rev_stars
                    FROM movie, rating
                    WHERE movie.mov_id = rating.mov_id
                    AND rev_stars = (SELECT max(rev_stars)
                    FROM rating
                    )
                    ORDER BY mov_title"
                );
                    break;

                case '15':
                    $data = $this->DataHandler->readData(
                        "SELECT dir_fname, dir_lname, mov_title, rev_stars
                        FROM (((director INNER JOIN movie_direction ON director.dir_id = movie_direction.dir_id)
                        INNER JOIN movie ON movie_direction.mov_id = movie.mov_id)
                        INNER JOIN rating ON movie.mov_id = rating.mov_id)"
                    );
                    break;

                case '16':
                    $data = $this->DataHandler->readData(
                        "SELECT act_fname, act_lname, role, mov_title
                        FROM ((actor INNER JOIN movie_cast ON actor.act_id = movie_cast.act_id)
                        INNER JOIN movie ON movie_cast.mov_id = movie.mov_id)
                        HAVING count(actor.act_id) > 0
                        ORDER BY act_fname ASC"
                    );
                    break;

                case '17':
                    $data = $this->DataHandler->readData(
                        ""
                    );
                    break;

                case '18':
                    $data = $this->DataHandler->readData(
                        ""
                    );
                    break;

                case '19':
                    $data = $this->DataHandler->readData(
                        ""
                    );
                    break;

                case '20':
                    $data = $this->DataHandler->readData(
                        ""
                    );
                    break;
            }
            if ($data) {
                if (isset($data[0]["Film lengte"])) {
                    for ($i=0; $i < count($data); $i++) {
                        $data[$i]["Film lengte"] = $data[$i]["Film lengte"] . " min";
                    }
                }

                return $this->htmlElements->generateButtonedTable($data, 'result-table', [1,0,0]);
            } else {
                return "Er zijn geen zoek resultaten gevonden";
            }

        }
    }




?>
