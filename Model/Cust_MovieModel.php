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
                    AND rev_name IS NOT NULL
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
                        FROM director
                        INNER JOIN movie_direction ON director.dir_id = movie_direction.dir_id
                        INNER JOIN movie ON movie_direction.mov_id = movie.mov_id
                        INNER JOIN rating ON movie.mov_id = rating.mov_id"
                    );
                    break;

                case '16':
                    $data = $this->DataHandler->readData(
                        "SELECT act_fname, act_lname, role, mov_title
                        FROM movie
                        INNER JOIN movie_cast ON movie.mov_id = movie_cast.mov_id
                        INNER JOIN actor ON movie_cast.act_id = actor.act_id
                        WHERE actor.act_id IN(
                            SELECT act_id
                            FROM movie_cast
                            GROUP BY act_id
                            HAVING COUNT(*) >= 2
                        )"
                    );
                    break;

                case '17':
                    $data = $this->DataHandler->readData(
                        "SELECT dir_fname, dir_lname, mov_title, act_fname, act_lname, role
                        FROM movie
                        INNER JOIN movie_direction USING(mov_id)
                        INNER JOIN movie_cast USING(mov_id)
                        INNER JOIN actor USING(act_id)
                        INNER JOIN director USING(dir_id)
                        WHERE act_fname = 'claire'"
                    );
                    break;

                case '18':
                    $data = $this->DataHandler->readData(
                        "SELECT dir_fname, dir_lname, mov_title, act_fname, act_lname, role
                        FROM movie
                        INNER JOIN movie_direction USING(mov_id)
                        INNER JOIN movie_cast USING(mov_id)
                        INNER JOIN actor USING(act_id)
                        INNER JOIN director USING(dir_id)
                        WHERE act_fname = dir_fname
                        AND act_lname = dir_lname"
                    );
                    break;

                case '19':
                    $data = $this->DataHandler->readData(
                        "SELECT act_fname, act_lname, mov_title
                        FROM movie
                        INNER JOIN movie_cast USING(mov_id)
                        INNER JOIN actor USING(act_id)
                        WHERE mov_title = 'Chinatown'"
                    );
                    break;

                case '20':
                    $data = $this->DataHandler->readData(
                        "SELECT act_fname, act_lname, mov_title
                        FROM movie
                        INNER JOIN movie_cast USING(mov_id)
                        INNER JOIN actor USING(act_id)
                        WHERE act_fname = 'Harrison'
                        AND act_lname = 'Ford'"
                    );
                    break;
            }
            if ($data) {
                if (isset($data[0]["Film lengte"])) {
                    for ($i=0; $i < count($data); $i++) {
                        $data[$i]["Film lengte"] = $data[$i]["Film lengte"] . " min";
                    }
                }

                return $this->htmlElements->advancedTable($data, 'result-table', [1,1,0]);
            } else {
                return "Er zijn geen zoek resultaten gevonden";
            }

        }
    }




?>
