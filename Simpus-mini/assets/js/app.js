// ===== Hamburger menu =====
function initNavToggle() {
  const toggleBtn = document.getElementById("nav-toggle-btn");
  const nav = document.querySelector("header nav");
  if (!toggleBtn || !nav) return;
  toggleBtn.addEventListener("click", function () {
    nav.classList.toggle("nav-open");
  });
}

// ===== Delete confirmation (event delegation) =====
function initDeleteConfirm() {
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-delete");
    if (!btn) return;
    const row = btn.closest("tr");
    const name = row ? row.querySelector("td")?.textContent : "this item";
    if (confirm("Are you sure you want to delete \"" + name + "\"?") && row) {
      row.remove();
    }
  });
}

// ===== Table filter (satu kolom, ditentukan data-col pada input) =====
function initTableFilter() {
  const input = document.getElementById("search-input");
  const table = document.querySelector(".table-responsive table");
  if (!input || !table) return;
  const col = Number(input.dataset.col || 0);
  input.addEventListener("keyup", function () {
    const keyword = input.value.toLowerCase();
    table.querySelectorAll("tbody tr").forEach(function (row) {
      const cell = row.querySelectorAll("td")[col];
      const text = cell ? cell.textContent.toLowerCase() : "";
      row.style.display = text.includes(keyword) ? "" : "none";
    });
  });
}

// ===== Form validation =====
function showError(input, message) {
  clearError(input);
  const span = document.createElement("span");
  span.className = "error";
  span.textContent = message;
  input.insertAdjacentElement("afterend", span);
}

function clearError(input) {
  const next = input.nextElementSibling;
  if (next && next.classList.contains("error")) next.remove();
}

function initFormValidation() {
  const form = document.getElementById("form-add");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    let valid = true;

    // field teks wajib diisi (Add Book: title, author | Add Member: name, member_no, address, phone_no)
    ["title", "name", "author", "member_no", "address", "phone_no"].forEach(function (n) {
      const f = form.querySelector("[name='" + n + "']");
      if (!f) return;
      if (f.value.trim() === "") {
        showError(f, "This field is required.");
        valid = false;
      } else {
        clearError(f);
      }
    });

    const year = form.querySelector("[name='year']");
    if (year) {
      const v = parseInt(year.value, 10);
      if (isNaN(v) || v < 1900 || v > 2026) {
        showError(year, "Year must be between 1900 and 2026.");
        valid = false;
      } else clearError(year);
    }

    const stock = form.querySelector("[name='stock']");
    if (stock) {
      const v = parseInt(stock.value, 10);
      if (isNaN(v) || v < 0) {
        showError(stock, "Stock cannot be negative.");
        valid = false;
      } else clearError(stock);
    }

    // Latihan 1: ISBN opsional, hanya angka dan tanda hubung
    const isbn = form.querySelector("[name='isbn']");
    if (isbn) {
      const v = isbn.value.trim();
      if (v !== "" && !/^[0-9-]+$/.test(v)) {
        showError(isbn, "ISBN may only contain digits and hyphens (-).");
        valid = false;
      } else clearError(isbn);
    }

    if (!valid) e.preventDefault();
  });
}

document.addEventListener("DOMContentLoaded", function () {
  initNavToggle();
  initDeleteConfirm();
  initTableFilter();
  initFormValidation();
});