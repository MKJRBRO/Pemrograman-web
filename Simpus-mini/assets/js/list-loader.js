const SIMULATED_DELAY_MS = 600; // Latihan 3

async function loadList(url, keys) {
  const tbody = document.querySelector(".table-responsive table tbody");
  const loading = document.getElementById("loading-indicator");
  if (!tbody || !loading) return;

  loading.style.display = "block";
  tbody.innerHTML = "";
  const totalColumns = keys.length + 1;

  try {
    await new Promise((resolve) => setTimeout(resolve, SIMULATED_DELAY_MS));
    const res = await fetch(url);
    if (!res.ok) throw new Error("Failed to fetch data (status " + res.status + ")");
    const dataList = await res.json();

    dataList.forEach(function (item) {
      const tr = document.createElement("tr");
      keys.forEach(function (key) {
        const td = document.createElement("td");
        td.textContent = item[key];
        tr.appendChild(td);
      });
      const tdAction = document.createElement("td");
      tdAction.innerHTML =
        "<button type=\"button\">Edit</button> " +
        "<button type=\"button\" class=\"btn-delete\">Delete</button>";
      tr.appendChild(tdAction);
      tbody.appendChild(tr);
    });
  } catch (err) {
    tbody.innerHTML =
      "<tr><td colspan=\"" + totalColumns + "\">Failed to load data: " + err.message + "</td></tr>";
  } finally {
    loading.style.display = "none";
  }
}