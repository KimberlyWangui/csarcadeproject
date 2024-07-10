document.addEventListener('DOMContentLoaded', function() {
    const datePicker = document.querySelector('.date-picker');
    const selectedDateInput = document.querySelector('.selected-date');
    const calendar = document.getElementById('calendar');
  
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
  
    selectedDateInput.addEventListener('click', toggleCalendar);
  
    function toggleCalendar() {
      if (calendar.style.display === 'none' || calendar.style.display === '') {
        calendar.style.display = 'block';
        updateCalendar();
      } else {
        calendar.style.display = 'none';
      }
    }
  
    function updateCalendar() {
      const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
      const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
      
      const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  
      let calendarHTML = `
        <div class="calendar-header">
          <button onclick="changeMonth(-1)">&lt;</button>
          <span>${monthNames[currentMonth]} ${currentYear}</span>
          <button onclick="changeMonth(1)">&gt;</button>
        </div>
        <div class="calendar-grid">
      `;
  
      dayNames.forEach(day => {
        calendarHTML += `<div class="day-name">${day}</div>`;
      });
  
      for (let i = 0; i < firstDayOfMonth; i++) {
        calendarHTML += '<div></div>';
      }
  
      for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(currentYear, currentMonth, day);
        const isDisabled = date < currentDate;
        const isSelected = selectedDateInput.value === formatDate(date);
        
        calendarHTML += `
          <div class="day${isDisabled ? ' disabled' : ''}${isSelected ? ' selected' : ''}" 
               ${!isDisabled ? `onclick="selectDate(${day})"` : ''}>
            ${day}
          </div>
        `;
      }
  
      calendarHTML += '</div>';
      calendar.innerHTML = calendarHTML;
    }
  
    window.changeMonth = function(delta) {
      currentMonth += delta;
      if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
      } else if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      updateCalendar();
    }
  
    window.selectDate = function(day) {
      const selectedDate = new Date(currentYear, currentMonth, day);
      selectedDateInput.value = formatDate(selectedDate);
      calendar.style.display = 'none';
    }
  
    function formatDate(date) {
      const day = date.getDate().toString().padStart(2, '0');
      const month = (date.getMonth() + 1).toString().padStart(2, '0');
      const year = date.getFullYear();
      return `${day}/${month}/${year}`;
    }
  });

  //games-ticket 
  



    // Promotional code application
    document.querySelector('.apply-promo-code').addEventListener('click', function(e) {
        e.preventDefault();
        const promoCode = document.getElementById('promo-code').value;
        // Here you would typically send an AJAX request to validate the promo code
        // For this example, we'll just simulate a successful application
        document.getElementById('promo-code-result').innerHTML = `<p>Promo code <strong>${promoCode}</strong> applied successfully!</p>`;
    });

    // Proceed button functionality
    document.querySelector('.proceed-btn').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.checkout-section').style.display = 'block';
        window.scrollTo({
            top: document.querySelector('.checkout-section').offsetTop,
            behavior: 'smooth'
        });
    });

    // Checkout form submission
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        e.preventDefault();
        // Here you would typically send the form data to the server
        // For this example, we'll just show an alert
        alert('Thank you for your purchase!');
    });
