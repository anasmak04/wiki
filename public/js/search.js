document
  .getElementById("searchInput")
  .addEventListener("input", async function (e) {
    try {
      const query = e.target.value.trim();
      const searchResults = document.getElementById("searchResults");

      // Clear searchResults and hide existing cards
      searchResults.innerHTML = "";
      hideExistingCards();

      if (query === "") {
        showExistingCards();
        return;
      }

      const response = await fetch(
        `http://localhost/wiki/search/?q=${encodeURIComponent(query)}`
      );

      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      const data = await response.json();
      console.log(data);

      const uniqueTitles = new Set();

      data.forEach((item) => {
        const title = item.title;

        if (!uniqueTitles.has(title)) {
          uniqueTitles.add(title);

          const cardDiv = document.createElement("div");
          cardDiv.classList.add("card", "mb-3", "search-result-card");

          const cardBodyDiv = document.createElement("div");
          cardBodyDiv.classList.add("card-body");

          cardBodyDiv.innerHTML = `<h5 class="card-title">${title}</h5><p class="card-text">${item.content}</p>
                <p class="card-text">${item.category_name}</p>  <p class="card-text">${item.tag_name}</p>`;

          cardDiv.appendChild(cardBodyDiv);
          searchResults.appendChild(cardDiv);
        }
      });
    } catch (error) {
      console.error("An error occurred:", error);
    }
  });

function hideExistingCards() {
  const existingCards = document.querySelectorAll(".existing-card");
  existingCards.forEach((card) => {
    card.style.display = "none";
  });
}

function showExistingCards() {
  const existingCards = document.querySelectorAll(".existing-card");
  existingCards.forEach((card) => {
    card.style.display = "block";
  });
}
