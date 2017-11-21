<?php


include 'src/database.php';
include '../settings.php';

$db = new DbConnect($settings);
$user = new User($db);
//1
loadUser("John", "Le", "john.le.@sjsu.edu", "5102341232", "4354532901", "94632", "1033 Lincoln Ave", "Oakland", "CA");
//2
loadUser("Bobby", "Le", "Bobby.le.@sjsu.edu", "5102641232", "4334532901","94652", "1013 Lincoln Ave", "Oakland", "CA");
//3
loadUser("Jessica", "Johnson", "Jessica.johnson.@sjsu.edu","3213095489","8884540348", "94651", "1013 Park Ave", "New York", "NY");
//4

loadUser("Sarah", "Smith",
    "Sarah.smith@sjsu.edu",
    "5107521212",
    "1134520909",
    "42451",
    "242 Golden St",
    "Orlando",
    "FL"
);

loadUser("Ryan", "Green",
    "Ryan.green@sjsu.edu",
    "5107121212",
    "1134543909",
    "41451",
    "242 Park St",
    "Orlando",
    "FL"
);

loadUser("Bob", "Dylan",
    "Bob.dylan@sjsu.edu",
    "5107111212",
    "1134543909",
    "41451",
    "341 Southpark Ave",
    "Orlando",
    "FL"
);



loadUser("Bob", "Dylan",
    "Bob.dylan.123@sjsu.edu",
    "5107111202",
    "1131543909",
    "41451",
    "341 Southpark Ave",
    "Orlando",
    "FL"
);


loadUser("Billy", "Dylan",
    "Billy.dylan@sjsu.edu",
    "5117111212",
    "4034543909",
    "41451",
    "341 Southpark Ave",
    "Orlando",
    "NY"
);

loadUser("John", "Le",
    "hian@sjsu.edu",
    "5147111212",
    "4034543509",
    "41451",
    "311 Southpark Ave",
    "Orlando",
    "NY"
);



loadUser("Jon", "Lee",
    "Jon.lee@sjsu.edu",
    "5347331212",
    "1134543509",
    "41441",
    "312 Lincoln Street",
    "Orlando",
    "FL"
);



loadUser("Jessica", "Parker",
    "Jessica.parker@sjsu.edu",
    "5347331202",
    "1494543509",
    "41422",
    "101 Lincoln Ave",
    "San Jose",
    "FL"
);

loadUser("Tony", "Parker",
    "Tonyr.parker@sjsu.edu",
    "5311441202",
    "1494151239",
    "41421",
    "102 Lincoln Ave",
    "San Jose",
    "CA"
);

loadUser("Tony", "Stark",
    "Tony.parker@sjsu.edu",
    "5311441102",
    "1494151219",
    "41421",
    "1 Lincoln Ave",
    "San Jose",
    "CA"
);

loadUser("Sarah", "Connor",
    "Sarah.conner@sjsu.edu",
    "5311412302",
    "1492351219",
    "23421",
    "12 Alameda Ave",
    "San Jose",
    "CA"
);


loadUser("Hal", "Connor",
    "Hal.conner@sjsu.edu",
    "5311212302",
    "1492351219",
    "21121",
    "123 Alameda St",
    "San Jose",
    "CA"
);



loadUser("Mike", "McLee",
    "Mike.mclee@sjsu.edu",
    "5311212322",
    "1412351219",
    "21101",
    "123 Oakland St",
    "Alameda",
    "CA"
);

loadUser("Adam", "Yim",
    "Adam.yim@sjsu.edu",
    "5311232132",
    "1492351219",
    "11101",
    "13 Alameda St",
    "Alameda",
    "CA"
);

loadUser("Bobby", "Johnson",
    "nobony332@sjsu.edu",
    "5311234302",
    "1421321219",
    "11111",
    "133 Alameda St",
    "Sunnyvale",
    "CA"
);


loadUser("Steve", "Bone",
    "Steve.bone@sjsu.edu",
    "5123212302",
    "1412321219",
    "21121",
    "12 Park St",
    "San Jose",
    "CA"
);

loadUser("Trung", "Vo",
    "Trung.vo@sjsu.edu",
    "5123123212",
    "1142421219",
    "94501",
    "111 Pacific St",
    "Alameda",
    "CA"
);


function loadUser($firstName, $lastName, $email, $home, $mobile, $zip, $address, $city, $state){
	global $user; 
	$user->insertUser($firstName, $lastName, $email, $mobile, $home, $zip, $address, $city, $state);
}



echo "Status = OK!";






?>