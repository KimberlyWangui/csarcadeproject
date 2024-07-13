document.addEventListener('DOMContentLoaded', function() {
    // Date picker functionality
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
  
    // Quantity buttons functionality
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('.quantity-input');
            const value = parseInt(input.value);
            if (this.classList.contains('plus')) {
                input.value = Math.min(value + 1, 10);  // Max 10 tickets
            } else if (this.classList.contains('minus')) {
                input.value = Math.max(value - 1, 1);  // Min 1 ticket
            }
        });
    });
  
    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const ticketId = this.getAttribute('href').split('/').pop();
            const quantity = this.closest('.card-body').querySelector('.quantity-input').value;
            
            fetch(`/cart/add/${ticketId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // You can replace this with updating a mini cart or displaying a success message
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
  
    // Promotional code application
   
  // public/assets/js/tickets.js
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...

    const applyPromoCodeBtn = document.querySelector('.apply-promo-code');
    if (applyPromoCodeBtn) {
        applyPromoCodeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const promoCode = document.getElementById('promo-code').value;
            
            fetch('/apply-promo-code', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ promo_code: promoCode })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('promo-code-result').innerHTML = `
                        <p class="text-success">Promo code applied successfully!</p>
                        <p>Discount: ${data.discount_amount} KSH</p>
                        <p>New Total: ${data.new_total} KSH</p>
                    `;
                    // Update the total amount displayed on the page
                    document.getElementById('total-amount').textContent = data.new_total;
                } else {
                    document.getElementById('promo-code-result').innerHTML = `
                        <p class="text-danger">${data.error}</p>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('promo-code-result').innerHTML = `
                    <p class="text-danger">An error occurred. Please try again.</p>
                `;
            });
        });
    }
});
    // Proceed button functionality
    const proceedBtn = document.querySelector('.proceed-btn');
    if (proceedBtn) {
        proceedBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const checkoutSection = document.querySelector('.checkout-section');
            if (checkoutSection) {
                checkoutSection.style.display = 'block';
                window.scrollTo({
                    top: checkoutSection.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    }
  
    // Checkout form submission
    // This part should be handled by your existing HTML form and Laravel backend
  });
  