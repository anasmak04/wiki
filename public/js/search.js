document
  .getElementById("searchInput")
  .addEventListener("keyup", async function (e) {
    try {
      const query = e.target.value;
      const response = await fetch(
        "http://localhost/wiki/search/?q=" + encodeURIComponent(query)
      );
      console.log(response);
      if (response.ok) {
        const data = await response.json();
        console.log(data);

        const searchResults = document.getElementById("searchResults");
        searchResults.innerHTML = "";

        data.forEach((item) => {
          const resultDiv = document.createElement("div");
          resultDiv.innerHTML = `<h3>${item.title}</h3><p>${item.content}</p>`;
          searchResults.appendChild(resultDiv);
        });
      } else {
        console.error("Network response was not ok.");
      }
    } catch (error) {
      console.error("An error occurred:", error);
    }
  });
