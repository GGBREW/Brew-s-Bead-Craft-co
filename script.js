// A tiny snippet to maybe highlight the form on focus
document.querySelectorAll('input, textarea').forEach(el => {
  el.addEventListener('focus', () => el.classList.add('focused'));
  el.addEventListener('blur',  () => el.classList.remove('focused'));
});
