// Get the HTML elements
const quoteBlock = document.getElementById('quote-block');
const arrowUp = document.getElementById('arrow-up');
const arrowDown = document.getElementById('arrow-down');

// Load the JSON data
const jsonData = [
    {
        "fio": "Эдвард Стенли, режиссер, актер, сценарист",
        "avatar": "./assets/images/Edvard_Stenli.jpg",
        "quote": "«Те, кто не могут найти время для тренировок, придется искать время для того, чтобы болеть!»"
      },
      {
        "fio": "Винсент Ломбарди - тренер",
        "avatar": "./assets/images/Vince-Lombardi.jpg",
        "quote": "«Бог дал вам тело, которое может вынести почти все! Ваша задача – убедить в этом свой разум!»"
      }
]; // replace with your JSON data

// Initialize the current index
let currentIndex = 0;

// Function to display the quote, avatar, and FIO
function displayQuote() {
  const currentData = jsonData[currentIndex];
  quoteBlock.innerHTML = `
    <img src="${currentData.avatar}" alt="${currentData.fio}">
    <blockquote>${currentData.quote}</blockquote>
    <p>${currentData.fio}</p>
  `;
}

// Display the initial quote
displayQuote();

// Add event listeners to the arrow buttons
arrowUp.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + jsonData.length) % jsonData.length;
  displayQuote();
});

arrowDown.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % jsonData.length;
  displayQuote();
});
