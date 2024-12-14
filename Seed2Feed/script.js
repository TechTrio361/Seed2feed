// Get all feature cards
const featureCards = document.querySelectorAll('.feature-card');

// Add event listeners to all feature cards
featureCards.forEach(card => {
  card.addEventListener('click', function() {
    // Remove 'active' class from all other cards
    featureCards.forEach(c => {
      c.classList.remove('active');
      c.querySelector('.additional-info').style.display = 'none'; // Hide additional info
    });
    
    // Add 'active' class to clicked card
    card.classList.add('active');
    
    // Show the additional information
    const info = card.querySelector('.additional-info');
    info.style.display = 'block'; // Show additional info
    
    // Pause for 5 seconds before allowing another click
    setTimeout(() => {
      // Allow clicking on other features after the pause
    }, 5000); // 5000 ms pause
  });
});