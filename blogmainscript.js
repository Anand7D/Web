document.addEventListener("DOMContentLoaded", function() {
    fetch('cardData.json')
        .then(response => response.json())
        .then(data => {
            const cardData = data;

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
                cardDiv.style.borderColor = "black";
                cardDiv.style.width = "100%";
                cardDiv.style.height = "60%";

                const header = document.createElement('div');
                header.classList.add('card-header');
                header.textContent = data.header;
                header.style.backgroundColor = "#FAB162";
                header.style.color = "black";
                header.style.fontFamily = "BlogFont";
                header.style.fontSize = "30px";
                header.style.height = "40px";
                header.style.paddingBottom= "7%";

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
                footer.style.color = "white";
                footer.style.fontFamily = "BlogFont";
                footer.style.fontSize = "20px";
                footer.style.height = "40px";
                footer.setAttribute('data-date', data.date);

                const button = document.createElement('button');
                button.textContent = 'Read More';
                button.classList.add('btn', 'btn-primary');
                button.style.fontFamily = "BlogFont";
                button.style.fontSize = "30px";
                button.style.fontStretch = "extra-expanded";
                button.style.height = "40px";
                button.style.borderRadius = "0";
                button.style.paddingBottom = "7%";
                button.style.backgroundColor = "black";
                button.style.color = "white";
                button.style.borderColor = "black";
                button.addEventListener('mouseover', function () {
                    button.style.backgroundColor = "#D3D3D3";
                    button.style.color = "black";
                });
                button.addEventListener('mouseout', function () {
                    button.style.backgroundColor = "black";
                    button.style.color = "white";
                });
                button.addEventListener('click', function () {
                    window.location.href = `blogpage.html?id=${index + 1}`;
                });

                cardDiv.appendChild(header);
                cardDiv.appendChild(body);
                cardDiv.appendChild(footer);
                cardDiv.appendChild(button);

                cardColumn.appendChild(cardDiv);

                currentRow.appendChild(cardColumn);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});

function searchBlogs() {
    const searchQuery = document.getElementById('searchInput').value.toLowerCase();
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        const headerText = card.querySelector('.card-header').textContent.toLowerCase();
        if (headerText.includes(searchQuery)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

function filterByCategory(category) {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        const footerText = card.querySelector('.card-footer').textContent.toLowerCase();
        if (footerText.includes(category.toLowerCase())) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

function sortByDate() {
    const cardContainer = document.getElementById('cardContainer');
    cardContainer.classList.add('justify-content-center');
    const cards = Array.from(cardContainer.querySelectorAll('.card'));
    const originalWidth = cards[0].offsetWidth;
    cards.sort((a, b) => {
        const dateA = new Date(a.querySelector('.card-footer').getAttribute('data-date'));
        const dateB = new Date(b.querySelector('.card-footer').getAttribute('data-date'));
        return dateB - dateA;
    });
    cards.forEach(card => {
        cardContainer.appendChild(card);
        card.style.width = originalWidth + 'px';
    });
}

function sortByCategory() {
    const cardContainer = document.getElementById('cardContainer');
    const cards = Array.from(cardContainer.querySelectorAll('.card'));
    const originalWidth = cards[0].offsetWidth;
    cards.sort((a, b) => {
        const categoryA = a.querySelector('.card-footer').textContent.toLowerCase();
        const categoryB = b.querySelector('.card-footer').textContent.toLowerCase();
        return categoryA.localeCompare(categoryB);
    });
    cards.forEach(card => {
        cardContainer.appendChild(card);
        card.style.width = originalWidth + 'px';
    });
}
