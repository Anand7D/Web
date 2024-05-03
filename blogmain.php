<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="blogmainstyle.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Blogs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about-us.html">About-Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<br>
<br>
<div class="center-grid">
    <br>
    <br>
    <br>
    <br>

    <h1 class="hot-cards text-center" id="color-changing-heading">Explore</h1>
    <br>
    <br>
    <div class="container mt-5">
        <input type="text" id="searchInput" class="form-control" placeholder="Search for blogs..." onkeyup="searchBlogs()">
        <!-- <div class="btn-group mt-3" role="group">
            <button type="button" class="btn btn-secondary" onclick="filterByCategory('Gameplay')">Gameplay</button>
            <button type="button" class="btn btn-secondary" onclick="filterByCategory('Survival')">Survival</button>
            <button type="button" class="btn btn-secondary" onclick="filterByCategory('Player Count')">Player Count</button>
        </div>
        <div class="btn-group mt-3" role="group">
            <button type="button" class="btn btn-secondary" onclick="sortByDate()">Sort by Date</button>
            <button type="button" class="btn btn-secondary" onclick="sortByCategory()">Sort by Category</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href = 'blogmain.html';">Revert to Original</button>
        </div> -->
    </div>
    <div class="card-body mt-5" id="cardContainer">
    <?php
        $conn = new mysqli("localhost", "root", "", "card_data", "3307");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM card_data";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $counter = 0; // Initialize counter
            while($row = $result->fetch_assoc()) {
                // Open a new row every third card
                if ($counter % 2 == 0) {
                    echo '<div class="row mt-3">';
                }

                echo '<div class="col-md-6 mt-3">';
                echo '<div class="card ' . $row["class"] . '" style="background-color: black; margin-bottom: 30px;">';
                echo '<div class="card-header" style="background-color: #FF5722; color: #FFFFFF; font-family: Bruno Ace SC, sans-serif; font-size: 20px; height: 63px; padding: 2px; padding-left: 10px; padding-right: 10px; border-radius: 20px;">' . $row["header"] . '</div>';
                echo '<div class="card-body" style="background-color: black;"><img src="' . $row["body"] . '" class="card-img-top" style="height: 350px; border-radius: 10px;"></div>';
                echo '<div class="card-footer" style="background-color: #9C27B0; color: #FFFFFF; font-family: Bruno Ace SC, sans-serif; font-size: 20px; height: 35px; padding: 0; padding-left: 20px; border-radius: 20px;">' . $row["footer"] . '</div>';
                echo '<button class="btn btn-primary" style="font-family: Sixtyfour, sans-serif; font-size: 20px; font-stretch: extra-expanded; height: 40px; width: 250px; align-self: center; border-radius: 20px; background-color: black; color: white; border-color: black;" onclick="window.location.href=\'blogPage.php?id=' . $row["id"] . '\'" onmouseover="this.style.backgroundColor=\'#D3D3D3\'; this.style.color=\'black\'; this.style.fontWeight=\'bold\'; this.style.boxShadow=\'0 0 100px 20px rgba(255, 255, 255, 0.7)\';" onmouseout="this.style.backgroundColor=\'black\'; this.style.color=\'white\'; this.style.fontWeight=\'normal\'; this.style.boxShadow=\'none\';">READ MORE</button>';
                echo '</div>';
                echo '</div>';

                if ($counter % 2 == 1 || $counter == $result->num_rows - 1) {
                    echo '</div>';
                }

                $counter++;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="blogmainscript.js"></script> -->
</body>
</html>