function playNutritionGame() {
    document.getElementById('game-container').style.display = 'block';
    document.querySelector('.nutrition-game button').style.display = 'none';
}

function checkAnswer(answer) {
    const resultText = document.getElementById('game-result');

    if (answer === 'orange') {
        resultText.textContent = "Correct! Oranges are rich in Vitamin C.";
        resultText.style.color = 'green';
    } else {
        resultText.textContent = "Oops! That's incorrect. Try again!";
        resultText.style.color = 'red';
    }
}
