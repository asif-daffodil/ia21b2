<?php  
    namespace myInfo2;
    abstract class myInfo {
        abstract public function myName();
    }

    interface myOtherInfo {
        public function myCompany();
        public function myAddress();
    }

    trait myFamilyInfo {
        public function myFamily()
        {
            return "My Family is a happy family<br>";
        }
    }

    class myChild extends myInfo implements myOtherInfo {
        public function myName()
        {
            return "My Name is Asif Abir<br>";
        }

        public function myCompany()
        {
            return "My Company is ABC<br>";
        }

        public function myAddress()
        {
            return "My Address is Dhaka<br>";
        }

        use myFamilyInfo;

        public function myColor (string $c = "Black", string $d = "green"): string {
            return "My favorite color is $c and $d<br>";
        }
    }

    $myObj = new myChild;
    echo $myObj->myName();
    echo $myObj->myCompany();
    echo $myObj->myAddress();
    echo $myObj->myFamily();
    echo $myObj->myColor("Blue", "Red");
?>