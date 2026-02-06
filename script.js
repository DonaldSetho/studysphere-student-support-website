//home page popup message
function showMessage() {
    const overlay = document.createElement('div');
    overlay.classList.add('overlay');

    // Create popup container
    const popup = document.createElement('div');
    popup.classList.add('popup-box');
    popup.innerHTML = `
    <h2>Welcome to StudySphere!</h2>
    <p>Ready to learn smarter? Explore our resources, take interactive quizzes, and boost your productivity!</p>
    <button id="goToAbout">Let's Go!</button>
  `;

    // Add popup and overlay to the document
    document.body.appendChild(overlay);
    document.body.appendChild(popup);

    // Animate popup
    setTimeout(() => popup.classList.add('show'), 100);

    // Redirect button functionality
    document.getElementById('goToAbout').addEventListener('click', () => {
        popup.classList.remove('show');
        overlay.classList.add('fade');
        setTimeout(() => {
            window.location.href = 'about.html';
        }, 400);
    });
}
//Scroll effect for header
window.addEventListener('scroll', () => {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
// Smooth Page Fade Transition
document.addEventListener("DOMContentLoaded", () => {
    // Fade in when page loads
    document.body.classList.add("fade-in");
    // When user clicks any internal link
    const links = document.querySelectorAll("a[href]");
    links.forEach(link => {
        link.addEventListener("click", e => {
            const href = link.getAttribute("href");
            // Only apply to internal links (not external or #)
            if (href && !href.startsWith("#") && !href.startsWith("http")) {
                e.preventDefault(); // Stop instant navigation
                document.body.classList.add("fade-out");
                setTimeout(() => {
                    window.location.href = href;
                }, 300); // Wait for fade-out animation
            }
        });
    });
});

// Scroll effect for team members
window.addEventListener('scroll', () => {
    const members = document.querySelectorAll('.team-member');
    const triggerPoint = window.innerHeight * 0.9;

    members.forEach(member => {
        const top = member.getBoundingClientRect().top;
        if (top < triggerPoint) {
            member.classList.add('show');
        }
    });
});

// FLASHCARD FUNCTIONALITY
const flashcards = document.querySelectorAll('.flashcard');
flashcards.forEach(card => {
    card.addEventListener('click', () => {
        card.classList.toggle('flipped');
    });
});

// TIMER FUNCTIONALITY
let hours = 0, minutes = 0, seconds = 0;
let timerInterval = null;

const timerDisplay = document.getElementById('timer-display');
const startBtn = document.getElementById('start-btn');
const pauseBtn = document.getElementById('pause-btn');
const resetBtn = document.getElementById('reset-btn');

function updateDisplay() {
    let h = hours.toString().padStart(2, '0');
    let m = minutes.toString().padStart(2, '0');
    let s = seconds.toString().padStart(2, '0');
    timerDisplay.textContent = `${h}:${m}:${s}`;
}

function startTimer() {
    if (timerInterval) return; // prevent multiple intervals
    timerInterval = setInterval(() => {
        seconds++;
        if (seconds >= 60) { seconds = 0; minutes++; }
        if (minutes >= 60) { minutes = 0; hours++; }
        updateDisplay();
    }, 1000);
}

function pauseTimer() {
    clearInterval(timerInterval);
    timerInterval = null;
}

function resetTimer() {
    pauseTimer();
    hours = 0; minutes = 0; seconds = 0;
    updateDisplay();
}

startBtn.addEventListener('click', startTimer);
pauseBtn.addEventListener('click', pauseTimer);
resetBtn.addEventListener('click', resetTimer);

// FAQ FUNCTIONALITY
const faqQuestions = document.querySelectorAll('.faq-question');
faqQuestions.forEach(q => {
    q.addEventListener('click', () => {
        const answer = q.nextElementSibling;
        answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
    });
});

