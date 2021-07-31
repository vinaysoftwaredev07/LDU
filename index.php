<?php

echo "========================== Excerise 1 ======================";

function isBitten(){
    return number_format(rand(1, 10)/10 * 100, 2) ;
}

$isBitten = isBitten();

if((int) isBitten() > 50){
    echo "\nCharlie bit your finger!\n";
}else{
    echo "\nCharlie did not bit your finger!\n";
}


echo "========================== Excerise 1  end ======================";

echo "========================== Excerise 2 ======================";


function countWord($str){
    $arrStr = explode(" ", $str);
    $countWord = array();
    foreach($arrStr as $word){
        foreach($arrStr as $key => $wordCnt){
            echo strtolower($word) . "==". strtolower($wordCnt) . "\n";
            if(strtolower($word) == strtolower($wordCnt)){
                $countWord[$word] += 1;
                unset($arrStr{$key});
            }
        }
    }
    return $countWord;
}

$str = "This is a sensible sentance & also this is a another sentance.";

print_r(countWord($str));

echo "========================== Excerise 2 end ======================";

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>">
    <input type="text" name="name" id="name" value="" />
    <input type="submit" value="Submit" />
</form>

<?php

echo "========================== Excerise 3 end ======================";

if(@$_POST['login'] == 'login'){
    $conn = mysqli_connect("localhost", "root", "", "iv2db");
	print_r($conn);
    if(!$conn){
        die("error in connection with database");
    }

	$password = md5($_POST['password']);
	$query = "SELECT * FROM users WHERE username = '".htmlspecialchars($_POST["username"], ENT_QUOTES, "utf-8")."' AND password = '".$password."'";
	$data = mysqli_query($conn, $query);
	if(!empty($data)){
		echo "User authenticated successfully";
	}else{
		echo "Username or password incorrect";
	}
}
?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="POST">
    <input type="text" name="email" id="email" value="" />
    <input type="text" name="password" id="password" value="" />
    <input type="hidden" name="login" id="login" value="login" />
    <input type="submit" value="Submit" />
</form>

