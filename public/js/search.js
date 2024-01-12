document
  .getElementById("searchInput")
  .addEventListener("input", async function (e) {
    try {
      const query = e.target.value.trim();

      const response = await fetch(`http://localhost/wiki/search/?q=${query}`);

      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }

      const data = await response.json();
      console.log(data);

      displayResults(data);
    } catch (error) {
      console.error("An error occurred:", error);
    }
  });


  

function displayResults(results) {
  const resultsDiv = document.getElementById("searchResults");
  resultsDiv.innerHTML = "";

  if (results.length === 0) {
    resultsDiv.innerHTML = "No results found.";
  } else {
    results.map((item) => {
      resultsDiv.innerHTML = `<p>Title: ${item.title}<br>Content: ${item.content}</p>`;
    });
  }
}
