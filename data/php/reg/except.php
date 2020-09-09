<?php
    /**
     *
     */
    class RegistryExc
    {
        private $excCatcher= false;

        public function checkPhone(string $stringToCheck, string $stringToWrite) {

            if (!$this->excCatcher) {
                if (!preg_match("/^[1-9][0-9]{10}$|^[1-9]\s[0-9]{3}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$|^[1-9]-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}$/", $stringToCheck)) {
                    echo "<div class='error'>".$stringToWrite."</div>";
                    $this->excCatcher = true;
                }
            }
        }

        public function checkEmail(string $stringToCheck, string $stringToWrite) {

            if (!$this->excCatcher) {
                if (!preg_match("/^[a-zA-Z0-9]{3,}@[a-zA-Z]{3,}.[a-zA-Z]{2,}$/", $stringToCheck)) {
                    echo "<div class='error'>".$stringToWrite."</div>";
                    $this->excCatcher = true;
                }
            }
        }

        public function checkAge(string $stringToCheck, string $stringToWrite) {
            if (!$this->excCatcher) {
                if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $stringToCheck)) {
                    echo "<div class='error'>".$stringToWrite."</div>";
                    $this->excCatcher = true;
                }
            }
        }

        public function checkName(string $stringToCheck, string $stringToWrite) {
            if (!$this->excCatcher) {
                if (!preg_match("/^\S{3,}/", $stringToCheck)) {
                    echo "<div class='error'>".$stringToWrite."</div>";
                    $this->excCatcher = true;
                }
            }
        }

        public function checkPassword(string $firstPassword, string $secondPassword, string $firstString, string $secondString, string $thirtdString) {
            if (!$this->excCatcher) {
                if (!preg_match("/^\S{8,}$/", $firstPassword)) {
                    echo "<div class='error'>".$firstString."</div>";
                    $this->excCatcher = true;
                }
                else if (!preg_match("/^[0-9a-zA-Z?!%-\.\^\+\(\)\&\[\]<>\$\#\@\№\*\'\"\{\}\,\|\/\:\_]+$/", $firstPassword)) {
                    echo "<div class='error'>".$secondString."</div>";
                    $this->excCatcher = true;
                }
                else if ($firstPassword != $secondPassword) {
                    echo "<div class='error'>".$thirtdString."</div>";
                    $this->excCatcher = true;
                }
            }
        }

        public function checkExistence($existance, string $stringToWrite) {
            if (!$this->excCatcher) {
                if ($existance) {
                    echo "<div class='error'>".$stringToWrite."</div>";
                    $this->excCatcher = true;
                }
            }
        }

        public function getExceptions() {
            return $this->excCatcher;
        }
    }

?>
