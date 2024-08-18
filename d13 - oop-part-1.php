<?php  
    namespace myInfo1;
    class myInfo {
        public $name = "Asif Abir";
        protected $myDaughter = "Amrin";
        private $mySon = "Aryan";

        public function myName () 
        {
            return "My Name is ".$this->name.", my daughter's name is ".$this->myDaughter." and my son's name is ".$this->mySon."<br>";
        }

        public function __construct($msg)
        {
            echo $msg;
        }

        public function __destruct()
        {
            echo "This is a destructor<br>";
        }
    }

    $myObj = new myInfo("constructor function<br>");

    echo $myObj->name;
    echo "<br>";
    echo $myObj->myName();
    // echo $myObj->myDaughter;
    // echo $myObj->mySon;
    // $myOtherObj = new myInfo;

    class myChild extends myInfo {
        public function myChildFatherName ()
        {
            return "Father : ".$this->name." and Daughter : ".$this->myDaughter."<br>";
        }

        public function __construct()
        {
            return ;
        }

        public function __destruct()
        {
            return ;
        }
    }

    $myChildObj = new myChild;
    echo $myChildObj->myChildFatherName();
    echo "<br>";

    class myStudents {

        public static $student1 = "Dipto";
        public const student2 = "Rakib";
        private function __construct()
        {
           return ;
        }
    }

    myStudents::$student1 = "Dipto Dhar";
    echo myStudents::$student1;
    echo "<br>";
    echo myStudents::student2;


?>