document.addEventListener('DOMContentLoaded', function() {
  const calendar = document.getElementById('calendar');
  const header = document.getElementById('calendar-header');
  const iconPicker = document.getElementById('icon-picker');
  let selectedDay = null;
  
  let current = new Date();
  let icons = JSON.parse(localStorage.getItem('calendarIcons')) || {};

  const months = [
    "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
    "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"
  ];

  // Creazione header mese
  function headerMese() {
    header.innerHTML = `
      <button id="prev-month" class="freccia">🠐</button>
      <h2>${months[current.getMonth()]} ${current.getFullYear()}</h2>
      <button id="next-month" class="freccia">🠒</button>
    `;

    document.getElementById('prev-month').onclick = () => changeMonth(-1);
    document.getElementById('next-month').onclick = () => changeMonth(1);
  }

  function changeMonth(delta) {
    current.setMonth(current.getMonth() + delta);
    renderCalendar();
  }
  //render Calendario
  function renderCalendar() {
    calendar.innerHTML = '';
    headerMese();

    const year = current.getFullYear();
    const month = current.getMonth();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    
    for (let i = 1; i <= daysInMonth; i++) {
      const day = document.createElement('div');
      day.className = 'day';
      day.innerHTML = `<div class="date">${i}</div>`;

      const key = `${year}-${month + 1}-${i}`;
      
      if (icons[key]) {
        const img = document.createElement('img');
        img.src = icons[key];
        img.className = 'emoji';
        day.appendChild(img);
      }

      day.addEventListener('click', () => {
        selectedDay = key;
        iconPicker.classList.remove('hidden');
      });

      calendar.appendChild(day);
    }
  }
  
  //Scelta icona
  iconPicker.querySelectorAll('img').forEach(img => {
    img.addEventListener('click', () => {
      icons[selectedDay] = img.src;
      localStorage.setItem('calendarIcons', JSON.stringify(icons));
      renderCalendar();
      iconPicker.classList.add('hidden');
    });
  });

  renderCalendar();
});
