// Custom JavaScript for the application

// Example: Log a message to the console
console.log('Custom JavaScript loaded.');

function toggleClass() {
    const element = document.getElementById('targetElement');
    element.classList.toggle('active');
}

// Example: AJAX request using jQuery
$(document).ready(function () {
    $.ajax({
        url: '/api/data',
        method: 'GET',
        success: function (data) {
            console.log('Data received:', data);
            
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });
});

document.getElementById('myButton').addEventListener('click', function () {
    alert('Button clicked!');
  
});
