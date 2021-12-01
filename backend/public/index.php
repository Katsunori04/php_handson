<html>

  <body>

    <?php
      class Human {
        private $name;
        private $birthday;
        private $gender;

        public function __construct($name, $birthday, $gender){
          $this->name = $name;
          $this->birthdat = $birthday;
          $this->gender = $gender;
        }

        public function walk(){
          echo "{$this->name}は歩きます<br/>";
        }

        public function eat(){
          echo '食べます<br/>';
        }
      }
      $human = new Human('なまええ', '1995/4/28', '男');
      $human->eat();
      $human->walk();
    ?>

  </body>

</html>
