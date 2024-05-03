<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'card_data';
$db_port = '3307';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Chair Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body style="max-width: 1880px">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="z-index: 1000;">
    <div class="container">
        <a class="navbar-brand" href="index.html" data-bs-toggle="offcanvas" data-bs-target="#demo">COUCH CORNER</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogmain.php">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.html">About-Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="redirectToWrite()">Write</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div class="carousel-container mb-5">
    <div class="left-section"></div>
    <div id="carousel-slide" class="carousel slide" data-bs-ride="carousel" style="max-width: 1700px; margin: auto;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-slide" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carousel-slide" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel-slide" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carousel-slide" data-bs-slide-to="3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/20337842/pexels-photo-20337842/free-photo-of-a-soft-light-colored-sofa-and-a-wooden-chair-in-a-modern-living-room.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="COD_WW2" class="d-block w-100" style="max-height: 850px;">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/20337840/pexels-photo-20337840/free-photo-of-view-of-a-loft-style-living-room-with-a-brown-leather-sofa.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="CS2" class="d-block w-100" style="max-height: 850px;">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1239221/pexels-photo-1239221.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="BloonsTD6" class="d-block w-100" style="max-height: 850px;">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1631918/pexels-photo-1631918.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Batman_AK" class="d-block w-100" style="max-height: 850px;">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-slide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-slide" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="right-section"></div>
</div>
<br>
<br>
<h3 class="card-showcase text-center">Recent Articles</h3>

<div class="center-grid">
    <div class="card-body mt-5" id="cardContainer">
    </div>
</div>

<script>
    function redirectToWrite() {
            // Check if the user is logged in (you can adjust this condition based on your actual login status check)
            var userLoggedIn = true; // Assume the user is logged in for demonstration purposes

            if (!userLoggedIn) {
                // If the user is not logged in, prompt them to log in
                var proceed = confirm("You need to log in to write a blog. Do you want to proceed to login?");
                if (proceed) {
                    // Redirect to the login page
                    window.location.href = "http://localhost/ANIS%20WORK/login.php";
                }
            } else {
                // If the user is logged in, redirect them to the write page
                window.location.href = "http://localhost/ANIS%20WORK/submit.php";
            }
        }
    document.addEventListener("DOMContentLoaded", function() {
        // Your JSON variable containing offcanvas data
        const offcanvasData = {
            title: "Quote of the Day",
            bodyContent: [
                "\"Victory is always possible for the person who refuses to stop fighting.\" ",
                "- Napoleon Hill"
            ],
            buttonText: "A Button",
            imageUrl: "https://example.com/image.jpg"
        };

        // Populate offcanvas title
        const offcanvasTitle = document.getElementById('offcanvasTitle');
        offcanvasTitle.textContent = offcanvasData.title;

        // Populate offcanvas body content
        const offcanvasBody = document.getElementById('offcanvasBody');
        offcanvasData.bodyContent.forEach(paragraph => {
            const p = document.createElement('p');
            p.textContent = paragraph;
            offcanvasBody.appendChild(p);
        });

        // Create and populate offcanvas image
        // const offcanvasImage = document.createElement('img');
        // offcanvasImage.src = offcanvasData.imageUrl;
        // offcanvasImage.alt = 'Offcanvas Image';
        // offcanvasBody.appendChild(offcanvasImage);
        //
        // // Create and populate offcanvas button
        // const offcanvasButton = document.createElement('button');
        // offcanvasButton.className = 'btn btn-secondary';
        // offcanvasButton.type = 'button';
        // offcanvasButton.textContent = offcanvasData.buttonText;
        // offcanvasBody.appendChild(offcanvasButton);

        const cardData = [
            { header: "Top 2024 Furniture Trends To Decorate Your Home", body: "https://images.pexels.com/photos/7195536/pexels-photo-7195536.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", footer: "10/10- Times Of India", class: "card2" },
            { header: "The Craftsmanship Behind Quality Furniture", body: "https://media.istockphoto.com/id/1133113582/photo/scandinavian-style-livingroom-with-fabric-sofa-sofa-table-morning-image-with-plant-sofa-table.jpg?s=2048x2048&w=is&k=20&c=i74rMOccCWw_XQrc3-jBm6-MRqRTOZ__1cJkVUhpLUc=", footer: "Posted By: Jain, Deepak on 2024-01-29", class: "card3" },
            { header: "Gaming Chairs Vs Office Chair", body: "https://i.ytimg.com/vi/4LGVUK65wUM/maxresdefault.jpg", footer: "Recommended", class: "card1" },
            { header: "Importance of choosing the write leather", body: "https://www.industrybuying.com/wp-content/uploads/2023/04/Office-Chair-HighBack-Leatherite.png", footer: "Curated for corporate needs", class: "card1" },
            { header: "Plan Your Living Room With A Mood Board", body: "https://images.pexels.com/photos/6758245/pexels-photo-6758245.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", footer: "Posted By: Jain, Deepak on 2024-01-20", class: "card2" },
            { header: "5 Tips For Decorating A Small Space", body: "https://images.pexels.com/photos/6958126/pexels-photo-6958126.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", footer: "Posted By: Jain, Deepak on 2024-01-13", class: "card3" }
        ];

        const cardContainer = document.getElementById('cardContainer');

        let currentRow;

        cardData.forEach((data, index) => {
            if (index % 2 === 0) {
                currentRow = document.createElement('div');
                currentRow.classList.add('row', 'mt-3');
                cardContainer.appendChild(currentRow);
            }

            const cardColumn = document.createElement('div');
            cardColumn.classList.add('col-md-6', 'mt-3');

            const cardDiv = document.createElement('div');
            cardDiv.classList.add('card', data.class);

            const header = document.createElement('div');
            header.classList.add('card-header');
            header.textContent = data.header;
            header.style.backgroundColor = "#FAB162";
            header.style.color = "#000000";
            header.style.fontFamily = "BlogFont";
            header.style.fontSize = "30px";
            header.style.height = "40px";
            header.style.paddingBottom= "7%"

            const body = document.createElement('div');
            body.classList.add('card-body');
            const image = document.createElement('img');
            image.src = data.body;
            image.classList.add('card-img-top');
            body.appendChild(image);
            body.style.backgroundColor = "black";
            image.style.height = "350px";

            const footer = document.createElement('div');
            footer.classList.add('card-footer');
            footer.textContent = data.footer;
            footer.style.backgroundColor = "#000000";
            footer.style.color = "#FFFFFF";
            footer.style.fontFamily = "BlogFont";
            footer.style.fontSize = "20px";
            footer.style.height = "40px";

            const button = document.createElement('button');
            button.textContent = 'Read More';
            button.classList.add('btn', 'btn-primary');
            button.style.fontFamily = "BlogFont";
            button.style.fontSize = "30px";
            button.style.fontStretch = "extra-expanded";
            button.style.height = "40px";
            button.style.borderRadius = "0";
            button.style.backgroundColor = "black";
            button.style.color = "white";
            button.style.borderColor = "black";
            button.addEventListener('mouseover', function() {
                button.style.backgroundColor = "#D3D3D3";
                button.style.color = "black";
            });
            button.addEventListener('mouseout', function() {
                button.style.backgroundColor = "black";
                button.style.color = "white";
            });
            button.addEventListener('click', function() {
                window.location.href = `blogpage.html?id=${index + 1}`;
            });

            cardDiv.appendChild(header);
            cardDiv.appendChild(body);
            cardDiv.appendChild(footer);
            cardDiv.appendChild(button);

            cardColumn.appendChild(cardDiv);

            currentRow.appendChild(cardColumn);
        });

        let comments = [];

        function displayComments() {
            const commentsSection = document.getElementById('commentsSection');
            commentsSection.innerHTML = '';

            const colors = ['#CCCCCC', '#2F4F4F', '#556B2F', '#6A5ACD'];

            comments.forEach((comment, index) => {
                const commentDiv = document.createElement('div');
                commentDiv.classList.add('card', 'mt-3');
                commentDiv.style.width = "700px";
                commentDiv.style.backgroundColor = "black";

                const cardBody = document.createElement('div');
                cardBody.classList.add('card-body');
                cardBody.style.backgroundColor = colors[index % colors.length];
                cardBody.style.borderRadius = "10px";

                const commenterInfo = document.createElement('p');
                commenterInfo.innerHTML = `<strong>${comment.name}</strong> (${comment.email})`;

                const commentContent = document.createElement('p');
                commentContent.textContent = comment.content;

                cardBody.appendChild(commenterInfo);
                cardBody.appendChild(commentContent);
                commentDiv.appendChild(cardBody);

                commentsSection.appendChild(commentDiv);
            });

            if (comments.length > 0) {
                const commentsTitle = document.createElement('h2');
                commentsTitle.classList.add('text-center');
                commentsTitle.textContent = "Comments";
                commentsTitle.style.fontFamily = "DOOMFont, sans-serif";
                commentsTitle.style.color = "white";
                commentsTitle.style.fontSize = "20px";
                commentsTitle.style.justifyContent = "center";
                commentsSection.insertBefore(commentsTitle, commentsSection.firstChild);
            }
        }


        const commentForm = document.getElementById('commentForm');
        commentForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('commentName').value;
            const email = document.getElementById('commentEmail').value;
            const content = document.getElementById('commentContent').value;

            comments.push({ name, email, content });

            displayComments();

            document.getElementById('commentName').value = '';
            document.getElementById('commentEmail').value = '';
            document.getElementById('commentContent').value = '';
        });
    });
</script>

<div class="offcanvas offcanvas-start" id="demo">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasTitle"></h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body" id="offcanvasBody">
    </div>
</div>

<br>
<br>
<form id="commentForm">
    <h2 class="comment-form-title text-center mt-5">Share Your Thoughts</h2>
    <div class="form-group">
        <label for="commentName" style="color: #D3D3D3;">Name:</label>
        <input type="text" class="form-control" id="commentName" required>
    </div>
    <div class="form-group">
        <label for="commentEmail" style="color: #D3D3D3;">Email:</label>
        <input type="email" class="form-control" id="commentEmail" required>
    </div>
    <div class="form-group">
        <label for="commentContent" style="color: #D3D3D3;">Comment:</label>
        <textarea class="form-control" id="commentContent" rows="3" required></textarea>
    </div>
    <br>
    <button type="submit" class="btn submit-btn">Submit</button>
</form>

<div id="commentsContainer" class="container mt-5">
    <div id="commentsSection" class="row justify-content-center">

    </div>
</div>


<footer class="footer mt-5">
    <div class="container text-center">
        <span class="text-muted" style="color: white !important;">© 2024 Dynamic Blog. All rights reserved.</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>