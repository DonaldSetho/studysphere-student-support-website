/* 
 * document.addEventListener("DOMContentLoaded", function () {
const form = document.getElementById("contactForm");
const feedback = document.getElementById("formFeedback");

form.addEventListener("submit", function (e) {
const name = form.name.value.trim();
const email = form.email.value.trim();
const subject = form.subject.value.trim();
const message = form.message.value.trim();

if (!name || !email || !subject || !message) {
e.preventDefault();
feedback.textContent = "⚠️ Please fill in all fields.";
feedback.style.color = "red";
return;
}

const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
if (!email.match(emailPattern)) {
e.preventDefault();
feedback.textContent = "⚠️ Enter a valid email address.";
feedback.style.color = "red";
return;
}

feedback.textContent = "⏳ Sending message...";
feedback.style.color = "blue";
});
});
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


