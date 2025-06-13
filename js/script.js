const menuBar = document.getElementById('menuBar');
const navBar = document.getElementById('navBar');
const xRegular = document.getElementById('xRegular');
const faqs = document.querySelectorAll(".faq");

menuBar.addEventListener("click", function () {
    navBar.classList.toggle('active');
    xRegular.classList.toggle('active');
    menuBar.classList.toggle('active');
});

xRegular.addEventListener("click", function() {
    navBar.classList.toggle('active');
    xRegular.classList.toggle('active');
    menuBar.classList.toggle('active');
})

faqs.forEach(faq => {
    faq.addEventListener("click", () => {
        faq.classList.toggle("active");
    })
})




const testDateInput = document.getElementById('test-date');

    // Get all valid test dates (first and last Fridays) within a date range
    function getValidFridays(startDate, monthsAhead = 12) {
      const validDates = [];
      let date = new Date(startDate);
      date.setDate(1); // Go to the first of the month

      for (let i = 0; i < monthsAhead; i++) {
        const year = date.getFullYear();
        const month = date.getMonth();

        // First Friday
        const firstFriday = new Date(year, month, 1);
        while (firstFriday.getDay() !== 5) {
          firstFriday.setDate(firstFriday.getDate() + 1);
        }
        validDates.push(firstFriday.toISOString().split('T')[0]);

        // Last Friday
        const lastDay = new Date(year, month + 1, 0); // Last day of the month
        while (lastDay.getDay() !== 5) {
          lastDay.setDate(lastDay.getDate() - 1);
        }
        validDates.push(lastDay.toISOString().split('T')[0]);

        // Move to next month
        date.setMonth(date.getMonth() + 1);
      }

      return validDates;
    }

    const validFridays = getValidFridays(new Date());

    testDateInput.addEventListener('input', () => {
      const selected = testDateInput.value;
      if (!validFridays.includes(selected)) {
        alert("Please select only the first or last Friday of the month.");
        testDateInput.value = '';
      }
    });

    // Optional: restrict min and max date
    testDateInput.setAttribute("min", validFridays[0]);
    testDateInput.setAttribute("max", validFridays[validFridays.length - 1]);