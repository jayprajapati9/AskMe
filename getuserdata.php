<?php 

    include 'connection.php';
    $username = "iam_jay";
    
    $stmt = $conn->prepare("SELECT `fullname`, `followers`, `following`, `totalpost` FROM `users` WHERE username = ?");
    $stmt->bind_param("s", $username);  // Bind "$username" to parameter.
    $stmt->execute();    // Execute the prepared query.
    
    $stmt->store_result();
    if( $stmt->num_rows > 0 ) {
        $stmt->bind_result($fullname,$followers,$following,$totalpost);
        $stmt->fetch();
        // while( $stmt->fetch() ) {
        //     echo $fullname;
        // }
        // No Need To Iteration if Unique
        echo $fullname;
        echo "<br>";
        echo $followers;
        echo "<br>";
        echo $following;
        echo "<br>";
        echo $totalpost;
    }


    $stmt->close();
    // if($stmt->execute()){
    //     $result=$stmt->get_result();
    //     $rows[]=$result->fetch_assoc();
    // }else{
    //     echo "execute failed";  // but I don't think this is your problem
    // }
    // // $rows['topic']
    // // $rows['detail']
    // // $rows['email']
    // // $rows['name']
    // // $rows['datetime']
?>