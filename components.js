// Navbar e footer comuni a tutte le pagine.
// Uso: <script src="components.js" defer></script> nell'<head> di ogni pagina.

const NAVBAR_HTML = `
<nav class="navbar">
  <a class="navbar-brand" href="index.php">Il mio sito</a>
  <ul class="navbar-links">
    <li><a href="index.php">Home</a></li>
    <li><a href="menu.php">Menu</a></li>
    <li><a href="#contatti">Contatti</a></li>
    <li><a href="login.html">Accedi</a></li>
    <li><a href="signup.html">Registrati</a></li>
    <li><a href="logout.php">Esci</a></li>
  </ul>
</nav>`;

const FOOTER_HTML = `
<footer class="footer" id="contatti">
  <p>&copy; 2026 Andrea N. Scianatico · <a href="https://www.github.com/Scianny08">Github</a></p>
</footer>`;

document.addEventListener("DOMContentLoaded", () => {
  // navbar come primo figlio del body, footer come ultimo
  // (il CSS si aspetta che siano figli diretti del body)
  document.body.insertAdjacentHTML("afterbegin", NAVBAR_HTML);
  document.body.insertAdjacentHTML("beforeend", FOOTER_HTML);

  // evidenzia il link della pagina corrente (ignora i link con #)
  const paginaCorrente = location.pathname.split("/").pop() || "index.php";
  document.querySelectorAll(".navbar-links a").forEach((a) => {
    if (a.getAttribute("href") === paginaCorrente) a.classList.add("active");
  });
});