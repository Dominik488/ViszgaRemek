document.getElementById("modositogomb").addEventListener("click", function () {
  const inputok = document.querySelectorAll(".ujjelszoinput");  
  inputok.forEach(input => {
    // Ürítjük, mivel ez az alap érték
    input.value = "";
    input.dispatchEvent(new Event("input", { bubbles: true })); // szükséges!
  });

  const inputok2 = document.querySelectorAll(".neszinezd");
  inputok2.forEach(input => {
    input.value = input.defaultValue; // vagy kezdetiErtekek[input.name], ha globálisan elérhető
    input.dispatchEvent(new Event("input", { bubbles: true })); // szükséges!
  });

  const gomb = document.getElementById("modositogomb");
  let lathato = inputok[0].style.display === "block";

  inputok.forEach(input => {
    input.style.display = lathato ? "none" : "block";
  });

  gomb.textContent = lathato ? "Módosítás" : "❌";
  

});
