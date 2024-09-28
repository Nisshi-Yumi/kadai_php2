document.getElementById('survey-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    const starCount = checkboxes.length;
    
    document.getElementById('stars').textContent = starCount;
    
    let stars = '☆☆☆☆☆'.split('');
    for (let i = 0; i < starCount; i++) {
        stars[i] = '★';
    }
    document.getElementById('star-display').textContent = stars.join('');
});
