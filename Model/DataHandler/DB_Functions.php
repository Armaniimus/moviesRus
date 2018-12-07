<?php
    /**
     *
     */
    class DB_Functions extends DB_Support {

        public function __construct() {}

        public function countDataResults($tablename, $columnName = "*", $where = "") {
            $sql = "SELECT " . "count" . "($columnName) FROM $tablename $where";
            $sth = $this->PDO->query($sql);
            return $sth->fetchColumn();
        }

        public function createPagination($tablename, $resAmountPerPage, $where = "", $styleName, $currentPage = NULL, $urlEnd = "") {
            $totalItems = $this->countDataResults($tablename, $where);

            // Set total pagination numbers
            $restItems = $totalItems % $resAmountPerPage;
            $totalPagination = floor($totalItems / $resAmountPerPage);

            if ($restItems > 0) {
                $totalPagination++;
            }

            // generateTable
            $forStart = 0;
            $pageTable = [];
            if ($currentPage > 1) {
                $pageCount = $currentPage-1;
                $pageTable[0] = "<a class='$styleName $styleName--start $styleName--bothEnds' href='" . $urlStart . $pageCount . $urlEnd . "'>&lt;&lt;</a>";

                $forStart++;
                $totalPagination++;
            }

            $pageCount = 1;
            $currentPageCheck = $currentPage;
            if ($forStart == 0) {
                $currentPageCheck--;
            }

            for ($i=$forStart; $i<$totalPagination; $i++) {
                if (($currentPageCheck) == ($i) ) {
                    $pageTable[$i] = "<a class='$styleName--Current'>$pageCount</a>";
                    $pageCount++;

                } else {
                    $pageTable[$i] = "<a class='$styleName' href='" . $urlStart . $pageCount . $urlEnd . "'>$pageCount</a>";
                    $pageCount++;
                }
            }

            if ($currentPage < $totalPagination-1) {
                $pageCount = 1+$currentPage;
                $pageTable[$i] = "<a class='$styleName $styleName--end $styleName--bothEnds' href='" . $urlStart . $pageCount . $urlEnd . "'>&gt;&gt;</a>";
            }

            return $pageTable;
        }

        /**
         * exports data to CSV
         *
         * @param array $data the data you want to export, must be 2d array
         * @return string $csv csv formatted data
         */
        public function exportToCSV(array $data) {

            function addQuotes($val) {
                return "\"$val\"";
            }

            $csv = "";
            foreach ($data as $value) {
                $csv .= implode(", ", array_map("addQuotes", array_keys($value))) . "\r\n";
                break;
            }

            foreach ($data as $value) {
                $csv .= implode(", ", array_map("addQuotes", array_values($value))) . "\r\n";
            }

            return $csv;
        }
    }

?>
