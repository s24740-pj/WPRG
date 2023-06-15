<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel='stylesheet' href='style.css'>
    <title>Projekt - Birdder</title>
</head>
<body>

<?php
    session_start();

    $username = $_COOKIE['username'];
    $username_color = $_COOKIE['username_color'];

    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_database = 'birdder';

    $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = 'SELECT * FROM posts';

    $result = $conn->query($sql);

    function isCredentialsValid($conn, $username, $password) {
        $username = mysqli_real_escape_string($conn, $username);
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $check_password = $row['password'];
            if ($check_password == $password) {
                $validUsername = $username;
                $validPassword = $check_password;

                global $username_color;
                $username_color = $row['color'];
                setcookie("username_color", $username_color, time() + (86400 * 30));
                return true;
            }
        }
        return false;
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (isCredentialsValid($conn, $username, $password)) {
            $_SESSION['username'] = $username;
            unset($_COOKIE['username']);
            setcookie("username", $username, time() + (86400 * 30));
        } else {
            echo "<div class='login_failed'>
            <h2>Nie udało się zalogować.</h2>
            </div>";
        }
    }

    if (isset($_SESSION['username'])) {
        $first_Letter_username = strtoupper(substr($username, 0, 1));

        if (isset($_POST['logout'])) {
            unset($_COOKIE['username']);
            session_destroy();
            header("Refresh:0");
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['Submit'])) {
                $user_color = $username_color;
                $content = $_POST['post_content'];
                $post_username = $_COOKIE['username'];
                $date = date('jS F Y h:i:s A');
                $comments = rand(0, 5000);
                $rebird = rand(0, 1000);
                $likes = rand(0, 100000);
                $views = rand(100000, 1000000);
        
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        
                $sql = "INSERT INTO posts (user_color, content, username, date, comments, rebird, likes, views) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                $stmt->bind_param("sssssiii",$user_color, $content, $post_username, $date, $comments, $rebird, $likes, $views);
        
                if ($stmt->execute()) {
                    header("Refresh:0");
                } else {
                    echo "Error inserting data: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            }

            if(isset($_POST['like_btn'])){
                $post_id = $_POST['like_btn'];                

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                $sql = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $post_id);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                header("Refresh:0");
            }

            if(isset($_POST['delete_btn'])){

                $post_id = $_POST['delete_btn'];                

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "DELETE FROM posts WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $post_id);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                header("Refresh:0");
            }

            if (isset($_POST['save_btn'])) {
                $mysql_host = 'localhost';
                $mysql_username = 'root';
                $mysql_password = '';
                $mysql_database = 'birdder';
            
                $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            
                $file_path = '/Applications/XAMPP/xamppfiles/htdocs/Studia/Projekt/bazaDanych.sql';
            
                if (file_exists($file_path)) {
                    if (!unlink($file_path)) {
                        echo "Error deleting the existing file.";
                        exit;
                    }
                }
            
                $sql = "SELECT * INTO OUTFILE '$file_path' FROM posts";
            
                if ($conn->query($sql) === FALSE) {
                    echo "Error loading data: " . $conn->error;
                }
            
                $conn->close();
                header("Refresh: 0");
            }
        }

        echo"<div class='container'>
        <div class='left_container'>
            <div class='left_container_upper'>
                <div class='logo'>
                    <i class='fas fa-dove'></i>
                </div>
                <div class='button'>
                    <i class='fas fa-home'></i><input type='submit' name='' value='Główna'><br>
                    <i class='fas fa-compass'></i><input type='submit' name='' value='Eksploruj'><br>
                    <i class='far fa-bell'></i><input type='submit' name='' value='Powiadomienia'><br>
                    <i class='far fa-envelope'></i><input type='submit' name='' value='Wiadomości'><br>
                    <i class='fas fa-list'></i><input type='submit' name='' value='Lista'><br>
                    <i class='far fa-bookmark'></i><input type='submit' name='' value='Zakładki'><br>
                    <i class='fas fa-dove' id='purple'></i><input type='submit' name='' value='Birdder purple'><br>
                    <i class='far fa-user'></i><input type='submit' name='' value='Profil'><br>
                    <i class='fas fa-ellipsis-h'></i><input type='submit' name='' value='Więcej'><br>
                </div>
            </div>
            <div class='avatar_container'>
                <div class='avatar' style='background-color:$username_color;'>$first_Letter_username</div>
                <div>
                    <h2>$username</h2>
                    <p>@$username</p>
                </div>
            </div>
            <div class='logout'>
                <form method='post' action=''>
                    <input type='submit' name='logout' value='Wyloguj'>
                    <input type='Submit' name='save_btn' value='Zapisz'>
                </form>
            </div>
        </div>
        
        <div class='middle_container'>
            <h2>Główna</h2>
            <div class='write_post_container'>
                <div class='write_post_avatar' style='background-color:$username_color;'>$first_Letter_username</div>
                <div class='write_post_input'>
                    <form method='post'>
                        <textarea class='write_post_textarea_text' type='text' name='post_content' placeholder='Co tam dzisiaj u Ciebie słychać?'></textarea>
                        <div class='line'></div>
                        <div class='write_post_icons'>
                            <i class='fas fa-photo-video' title='Media'></i>
                            <i class='far fa-file-image' title='Zdjęcie''></i>
                            <i class='far fas fa-poll' title='Ankieta'></i>
                            <i class='far fa-smile' title='Emoji'></i>
                            <i class='far fa-calendar-alt' title='Harmonogram'></i>
                            <i class='far fa-thumbtack' title='Pinezka'></i>
                            
                            <input class='write_post_input_submit' type='Submit' name='Submit' value='Bird'>
                        </div>
                    </form>
                </div>
            </div>
            ";

            if ($result->num_rows > 0) {
                $posts = [];
                while ($row = $result->fetch_assoc()) {
                    $posts[] = $row;
                }
                
                $posts = array_reverse($posts);
                
                foreach ($posts as $row) {
                    $post_id = $row['id'];
                    $p_username = $row['username'];
                    $first_Letter_p_username = strtoupper(substr($p_username, 0, 1));
                    $content = $row['content'];
                    if(empty(trim($content))){
                        $content = "{{Pusta wiadomość}}";
                    }
                    $date = $row['date'];
                    $comments = $row['comments'];
                    $rebird = $row['rebird'];
                    $likes = $row['likes'];
                    $views = $row['views'];
                    $user_color = $row['user_color'];
            
                    echo "
                        <div class='post'>
                            <div class='post_avatar' style='background-color:$user_color;'>$first_Letter_p_username</div>
                            <div class='post_content'>
                                <div class='post_username'>
                                    <h2>$p_username</h2>
                                    <h2 id='darker'>@$p_username</h2>
                                    <h2 id='darker'>&middot; $date</h2>
                                </div>
                                
                                <p>$content</p>
            
                                <div class='post_icons'>
                                    <form method='post' action=''>
                                    <button><i class='far fa-comment' title='Komentarz'>&nbsp;&nbsp;$comments</i></button>
                                    <button><i class='fas fa-retweet' title='Rebird'>&nbsp;&nbsp;$rebird</i></button>
                                    <button type='submit' name='like_btn' value='$post_id'><i class='far fa-heart' title='Polubienie'>&nbsp;&nbsp;$likes</i></button>
                                    <button><i class='far fa-eye' title='Wyświetlenia'>&nbsp;&nbsp;$views</i></button>
                                    <button><i class='fas fa-upload' title='Udostępnij'></i></button>
                                    <button type='submit' name='delete_btn' value='$post_id'><i class='far fa-trash' title='Usuń'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ";
                }
            } else {
                echo "<h1 class='no_posts'>Nie ma postów do wyświetlenia</h1>";

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "ALTER TABLE posts AUTO_INCREMENT = 1";
                $conn->query($sql);
                $conn->close();
            }
            
        echo"
        </div>
        <div class='right_container'>
            <div>
                <input class='search' type='text' name='post' placeholder='Szukaj na birdder'>
                <div class='trend_start'>
                    <h2>Trendy dla Ciebie</h2>
                </div>
                <div class='trend'>
                    <p>Trending w Polsce</p>
                    <h3>Trend 1</h3>
                    <p>30.5K Birdów</p>
                </div>
                <div class='trend'>
                    <p>Trending w Polsce</p>
                    <h3>Trend 2</h3>
                    <p>23.4K Birdów</p>
                </div>
                <div class='trend'>
                    <p>Trending w Polsce</p>
                    <h3>Trend 3</h3>
                    <p>14.2K Birdów</p>
                </div>
                <div class='trend'>
                    <p>Trending w Polsce</p>
                    <h3>Trend 4</h3>
                    <p>3000 Birdów</p>
                </div>
                <div class='trend'>
                    <p>Trending w Polsce</p>
                    <h3>Trend 5</h3>
                    <p>1234 Birdów</p>
                </div>
                <div class='trend_end'>
                    <a>Pokaz więcej</a>
                </div>
            </div>
        </div>
        </div>";


    } else {
        //Etap logowania
        echo "<form method='post' action='' class='login'>
                <div class='login_content'>
                    <h1>Zaloguj się do Birddy!</h1>
                    <input id='write' type='text' name='username' placeholder='Nazwa użytkownika' required><br>
                    <input id='write' type='password' name='password' placeholder='Hasło' required><br>
                    <input type='submit' name='login' value='Zaloguj'>
                </div>
              </form>";
    }

?>
</body>
</html>